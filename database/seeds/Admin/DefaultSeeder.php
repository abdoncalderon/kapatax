<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DefaultSeeder extends Seeder
{
    
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'SUPERUSER',
        ]);

        DB::table('regions')->insert([
            'name' => 'LATIN AMERICA',
        ]);

        DB::table('regions')->insert([
            'name' => 'EUROPA',
        ]);

        DB::table('countries')->insert([
            'name' => 'ECUADOR',
            'region_id' => '1',
            'code' => 'EC',
            'ccc' => '593',
        ]);

        DB::table('countries')->insert([
            'name' => 'ESPAÑA',
            'region_id' => '2',
            'code' => 'ES',
            'ccc' => '34',
        ]);

        DB::table('states')->insert([
            'name' => 'PICHINCHA',
            'country_id' => '1',
        ]);

        DB::table('states')->insert([
            'name' => 'CATALUÑA',
            'country_id' => '2',
        ]);

        DB::table('cities')->insert([
            'name' => 'QUITO',
            'state_id' => '1',
        ]);

        DB::table('cities')->insert([
            'name' => 'BARCELONA',
            'state_id' => '2',
        ]);

        DB::table('companies')->insert([
            'name' => 'MY ENTERPRISE',
        ]);

        DB::table('divisions')->insert([
            'name' => 'INFRASTRUCTURE',
        ]);

        DB::table('subsidiaries')->insert([
            'name' => 'SUBSIDIARY EXAMPLE',
            'code' => 'SE',
            'company_id' => '1',
            'division_id' => '1',
        ]);

        DB::table('projects')->insert([
            'name' => 'PROJECT EXAMPLE',
            'code' => 'EXAMPLE',
            'city_id' => '1',
            'subsidiary_id' => '1',
            'startDate' => Carbon::create('1970', '01', '01'),
            'finishDate' => Carbon::create('2050', '12', '31')
        ]);

        DB::table('sectors')->insert([
            'name' => 'ADMINISTRACION',
        ]);

        DB::table('funct1ons')->insert([
            'name' => 'TECHNICIAN',
        ]);

        DB::table('equipments')->insert([
            'name' => 'TRUCK',
            'project_id' => '1',
        ]);

        DB::table('zones')->insert([
            'name' => 'ZONE EXAMPLE',
            'project_id' => '1',
        ]);

        DB::table('locations')->insert([
            'name' => 'LOCATION EXAMPLE',
            'code' => 'LEX',
            'zone_id' => '1',
            'startDate' => Carbon::create('1970', '01', '01'),
            'finishDate' => Carbon::create('2050', '12', '31')
        ]);

        DB::table('turns')->insert([
            'name' => 'DIURNO',
            'start' => '07:00',
            'finish' => '16:00',
        ]);

        DB::table('contractors')->insert([
            'name' => 'CONTRACTOR EXAMPLE',
            'project_id' => '1',
            'code' => 'CEX',
        ]);

        DB::table('project_functions')->insert([
            'project_id' => '1',
            'funct1on_id' => '1',
        ]);

        DB::table('project_sectors')->insert([
            'project_id' => '1',
            'sector_id' => '1',
        ]);

        DB::table('departments')->insert([
            'name' => 'INFORMATION TECHNOLOGY',
            'project_sector_id' => '1',
        ]);

        DB::table('positions')->insert([
            'name' => 'CAPATAZ',
            'project_function_id' => '1',
            'department_id' => '1',
        ]);

        DB::table('location_turns')->insert([
            'location_id' => '1',
            'turn_id' => '1',
            'dateFrom' => Carbon::create('1970', '01', '01'),
            'dateTo' => Carbon::create('2050', '12', '31')
        ]);


        
    }
}
