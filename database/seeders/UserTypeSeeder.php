<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('user_types')->insert([
            [
                'id' => 1,
                'user_type_desc' => 'ADMIN',
                'status_id' => 1,
                
            ],
            [
                'id' => 2,
                'user_type_desc' => 'USER',
                'status_id' => 1,
            ],
           
        ]);
    }
}
