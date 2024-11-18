<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FloorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('floors')->insert([
            ['location_id' => 1, 'detail_location' => 'A 1', 'created_at' => now(), 'updated_at' => now()],
            ['location_id' => 1, 'detail_location' => 'A 2', 'created_at' => now(), 'updated_at' => now()],
            ['location_id' => 1, 'detail_location' => 'A 3', 'created_at' => now(), 'updated_at' => now()],
            ['location_id' => 1, 'detail_location' => 'A 4', 'created_at' => now(), 'updated_at' => now()],
            ['location_id' => 1, 'detail_location' => 'A 5', 'created_at' => now(), 'updated_at' => now()],
            ['location_id' => 1, 'detail_location' => 'A 6', 'created_at' => now(), 'updated_at' => now()],
            ['location_id' => 1, 'detail_location' => 'A 7', 'created_at' => now(), 'updated_at' => now()],
            ['location_id' => 1, 'detail_location' => 'A 8', 'created_at' => now(), 'updated_at' => now()]
        ]);
    }
}
