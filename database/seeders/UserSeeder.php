<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'id' => 1,
                'name' => 'BMARINA',
                'last_name' => 'Bagundang',
                'first_name' => 'Maheed',
                'middle_initial' => 'P',
                'email' => 'admin@gmail.com',
                'office_id' => 1,
                'status_id' => 1,
                'user_type_id' => 1,
                'password' => Hash::make('password'),
         
            ],
        ]);
    }
}
