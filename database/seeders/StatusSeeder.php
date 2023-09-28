<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('statuses')->insert([
            [
                'id' => 1,
                'status_desc' => 'ACTIVE',    
            ],
            [
                'id' => 2,
                'status_desc' => 'INACTIVE',
            ],
           
        ]);
    }
}
