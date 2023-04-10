<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\MainController;
use Illuminate\Http\Request;
use App\Models\SigniflyersModel;
use App\Models\ProjectsModel;
use App\Models\TeamsModel;

class Controller extends MainController {

    public function index(Request $request){
        $projects = ProjectsModel::get();

        return view('dashboard.index',[
            'projects' => $projects
        ]);
    }

    public function viewProject(Request $request){
        $project = ProjectsModel::find($request->id);

        $signiflyers = SigniflyersModel::get();
        return view('projects.asignTeams', [
            'project' => $project,
            'signiflyers' => $signiflyers
        ]);
    }

    public function asign(Request $request, $projectid){
        $project = ProjectsModel::find($projectid);
        $signiflyer = SigniflyersModel::find($request->id);
       
        TeamsModel::create([
            'project_id' => $project->id,
            'signiflyer_id' => $signiflyer->id
        ]);

        return redirect()->back();
    }

    public function remove(Request $request, $projectid){
        $project = ProjectsModel::find($projectid);
        $signiflyer = SigniflyersModel::find($request->id);

        $teamMember = TeamsModel::where('project_id', $project->id)->where('signiflyer_id', $signiflyer->id)->delete();

        return redirect()->back();
    }
}