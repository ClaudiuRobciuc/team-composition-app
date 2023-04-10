<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProjectsModel;
use DB;

class ProjectTableSeeder extends Seeder {

    public function run()
    {
        DB::table('projects')->truncate();

        ProjectsModel::create([
            'title' => 'First Project',
            'description' => 'Basic project description',
            'start_date' => date("Y-m-d H:i:s"),
            'end_date' => date('Y-m-d', strtotime("+3 months", strtotime(date("Y-m-d H:i:s")))),
            'requirements' => "scrum, agile, devops, php, integration"
        ]);

        ProjectsModel::create([
            'title' => 'Second Project',
            'description' => 'Second project description',
            'start_date' => date("Y-m-d H:i:s"),
            'end_date' => date('Y-m-d', strtotime("+2 months", strtotime(date("Y-m-d H:i:s")))),
            'requirements' => "scrum, agile, devops, php, integration, react, frontend"
        ]);
    }
}