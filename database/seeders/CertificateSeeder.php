<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CertificateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cert_types')->insert([
            [
                'id' => 1,
                'cert_type_desc' => 'CERTIFICATE OF OWNERSHIP',
                'cert_type_abbr' => 'CO',
                'cert_type_code' => 1,
                'status_id' => 1,
            ],
            [
                'id' => 2,
                'cert_type_desc' => 'CERTIFICATE OF PHILIPPINE REGISTRY',
                'cert_type_abbr' => 'CO',
                'cert_type_code' => 1,
                'status_id' => 1,
            ],
            [
                'id' => 3,
                'cert_type_desc' => 'BAY AND RIVER LICENSE',
                'cert_type_abbr' => 'CO',
                'cert_type_code' => 1,
                'status_id' => 1,
            ],
            [
                'id' => 4,
                'cert_type_desc' => 'COASTWISE LICENSE',
                'cert_type_abbr' => 'CO',
                'cert_type_code' => 1,
                'status_id' => 1,
            ],
            [
                'id' => 5,
                'cert_type_desc' => 'CERTIFICATE OF OWNERSHIP RECREATIONAL BOAT',
                'cert_type_abbr' => 'CO',
                'cert_type_code' => 1,
                'status_id' => 1,
            ],
            [
                'id' => 6,
                'cert_type_desc' => 'RECREATIONAL BOAT CERTIFICATE',
                'cert_type_abbr' => 'CO',
                'cert_type_code' => 1,
                'status_id' => 1,
            ],
            [
                'id' => 7,
                'cert_type_desc' => 'FISHING VESSEL SAFETY CERTIFICATE',
                'cert_type_abbr' => 'CO',
                'cert_type_code' => 1,
                'status_id' => 1,
            ],
            [
                'id' => 8,
                'cert_type_desc' => 'CARGO SAFETY VESSEL',
                'cert_type_abbr' => 'CO',
                'cert_type_code' => 1,
                'status_id' => 1,
            ],
            [
                'id' => 9,
                'cert_type_desc' => 'PERMIT TO OPERATE',
                'cert_type_abbr' => 'CO',
                'cert_type_code' => 1,
                'status_id' => 1,
            ],
            [
                'id' => 10,
                'cert_type_desc' => 'TONNAGE MEASUREMENT CERTIFICATE',
                'cert_type_abbr' => 'CO',
                'cert_type_code' => 1,
                'status_id' => 1,
            ],
            [
                'id' => 11,
                'cert_type_desc' => 'MINIMUM SAFE MANNING CERTIFICATE',
                'cert_type_abbr' => 'CO',
                'cert_type_code' => 1,
                'status_id' => 1,
            ],
          
        ]);
    }
}
