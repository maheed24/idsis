<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OfficeTableSeeder extends Seeder
{
    public function run()
    {
        
        DB::table('offices')->insert([
            [
                'id' => 1,
                'office_desc' => 'BANGSAMORO MARITIME INDUSTRY AUTHORITY',
                'office_code' => '14',
                'office_place' => 'COTABATO CITY',
                'office_address' => 'BARMM Compound, Rosary Height 7, Cotabato City',
                'status_id' => 1,
                'office_abbr' => 'BMARINA',
            ],
            [
                'id' => 2,
                'office_desc' => 'MARINA REGIONAL OFFICE I AND II',
                'office_code' => '01',
                'office_place' => 'LA UNION',
                'office_address' => '3F Tan Bldg., Quezon Ave., Sevilla Center, San Fernando City, La Union',
                'status_id' => 1,
                'office_abbr' => 'MROIANDII',
            ],
            // Add more data entries here
        ]);
    }
}

