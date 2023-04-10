<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\MainController;
use Illuminate\Http\Request;
use App\Models\SigniflyersModel;
use App\Models\ProjectsModel;
use App\Models\JobRolesModel;

class SigniflyersController extends MainController {

    public function index(Request $request){
        return view('signiflyers.index');
    }

    public function edit(Request $request, $id){
        $user = SigniflyersModel::find($id);
        $roles = JobRolesModel::get()->pluck('role', 'id')->toArray();
        return view('signiflyers.edit', [
            'user' => $user,
            'roles' => $roles
        ]);
    }

    public function update(Request $request, $id){
        $user = SigniflyersModel::find($id);

        $data = $request->all();
        if($request->file('file')){
            $file = $request->file('file');
            $fileName = $file->getClientOriginalName();
            $file->move('local', $fileName);
            $data['profile_picture'] = $fileName;
        }

        $user->update($data);
        return redirect()->route('signifly.signiflyers.index');
    }

    public function create(){
        $roles = JobRolesModel::get()->pluck('role', 'id')->toArray();
        return view('signiflyers.create', [
            'roles' => $roles
        ]);
    }

    public function store(Request $request){
        $data = $request->all();
        if($request->file('file')){
            $file = $request->file('file');
            $fileName = $file->getClientOriginalName();
            $file->move('local', $fileName);
            $data['profile_picture'] = $fileName;
        }
    
        SigniflyersModel::create($data);
        return redirect()->route('signifly.signiflyers.index');
    }

    public function get(Request $request){
        set_time_limit(300); // 5 minutes.

        $signiflyers = SigniflyersModel::get();
        if(isset($request->only_available) && $request->only_available) {
            $signiflyers = $signiflyers->filter(function($s){
                return $s->available();
            });
        }

        $totalData = $signiflyers->count();

        $start = $request->input('start');
        $length = $request->input('length');

        $filteredData = $signiflyers->skip($start)->take($length);

        foreach($filteredData as $s) {
            $nestedData[0] = empty($s->team) ? 'Yes' : "No";
            $nestedData[1] = $s->first_name;
            $nestedData[2] = $s->last_name;
            $nestedData[3] = $s->email;
            $nestedData[4] = $s->phone_number;
            $nestedData[5] = $s->education; 
            $nestedData[6] = $s->skillset; 
            $nestedData[7] = '<a href="'.route('signifly.signiflyers.edit', ['id' => $s->id]).'" class="btn btn-primary">Edit</a>';
            $data[] = $nestedData;
        }

        $tableContent = [
            "draw" => intval($request->input('draw')), // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw.
            "recordsTotal" => intval($totalData), // total number of records
            "recordsFiltered" => intval($totalData),
            "data" => isset($data) ? $data : [],
        ];

        return response()->json($tableContent);
    }
}