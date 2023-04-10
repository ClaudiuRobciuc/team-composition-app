<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\SigniflyersTableSeeder;
use Database\Seeders\JobRolesTableSeeder;
use Database\Seeders\ProjectTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([JobRolesTableSeeder::class]);
        $this->command->info('Job roles table seeded!');
        $this->call([SigniflyersTableSeeder::class]);
        $this->command->info('Signiflyers table seeded!');
        $this->call([ProjectTableSeeder::class]);
        $this->command->info('Project table seeded!');
    }
}