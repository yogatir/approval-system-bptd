<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            ['id_card_no' => '000000000000', 'name' => 'Super Admin', 'email' => 'superadmin@admin.id', 'gender' => 'MALE', 'role' => 'OPERATOR', 'phone' => '000000000000', 'address' => null, 'password' => Hash::make('@dmin123'), 'remember_token' => null, 'created_at' => now(), 'updated_at' => now()]
        ]);
    }
}
