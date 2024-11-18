<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(LocationSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(SurveySeeder::class);
        $this->call(FloorSeeder::class);
    }
}
