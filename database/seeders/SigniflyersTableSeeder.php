<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SigniflyersModel;
use DB;

class SigniflyersTableSeeder extends Seeder {
    public function run()
    {
        DB::table('signiflyers')->truncate();

        SigniflyersModel::create([
            'email' => 'foo@bar.com',
            'first_name' => 'foo',
            'last_name' => 'bar',
            'phone_number' => '+45 50 32 84 21',
            'profile_picture' => '',
            'role_id' => 1,
            'education' => 'BA Software Development',
            'skillset' => "php, laravel, mysql, react, css, html, integration, 8 years experience"
        ]);

        SigniflyersModel::create([
            'email' => 'foo2@bar.com',
            'first_name' => 'foo2',
            'last_name' => 'bar2',
            'phone_number' => '+45 50 32 84 23',
            'profile_picture' => '',
            'role_id' => 4,
            'education' => 'IT Business Administration',
            'skillset' => "project management, scrum, agile, 6 years experience"
        ]);
    }
}