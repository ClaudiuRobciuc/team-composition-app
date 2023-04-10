<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JobRolesModel;
use DB;

class JobRolesTableSeeder extends Seeder {
    public function run()
    {
        DB::table('job_roles')->truncate();

        JobRolesModel::create([
            'role' => 'Backend Developer',
        ]);

        JobRolesModel::create([
            'role' => 'Frontend Developer',
        ]);

        JobRolesModel::create([
            'role' => 'Devops',
        ]);

        JobRolesModel::create([
            'role' => 'Project Manager',
        ]);

        JobRolesModel::create([
            'role' => 'Scrum Master',
        ]);

        JobRolesModel::create([
            'role' => 'QA Engineer',
        ]);
    }
}