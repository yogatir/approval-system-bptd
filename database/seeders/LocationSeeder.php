<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('locations')->insert([
            ['id' => 1, 'name' => 'TERMINAL MENGWI', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'name' => 'PELABUHAN PADANGBAI', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'name' => 'PELABUHAN SAMPALAN', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 4, 'name' => 'PELABUHAN BIAS MUNJUL', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 5, 'name' => 'PELABUHAN GILIMANUK', 'created_at' => now(), 'updated_at' => now()]
        ]);
    }
}
