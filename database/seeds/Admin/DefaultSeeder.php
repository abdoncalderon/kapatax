<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class DefaultSeeder extends Seeder
{
    
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'SuperUser',
        ]);

        DB::table('regions')->insert([
            'name' => 'América del Sur',
        ]);

        DB::table('regions')->insert([
            'name' => 'Europa occidental',
        ]);

        DB::table('countries')->insert([
            'name' => 'Ecuador',
            'region_id' => '1',
            'code' => 'EC',
            'ccc' => '593',
        ]);

        DB::table('countries')->insert([
            'name' => 'España',
            'region_id' => '2',
            'code' => 'ES',
            'ccc' => '34',
        ]);

        DB::table('states')->insert([
            'name' => 'Pichincha    ',
            'country_id' => '1',
        ]);

        DB::table('states')->insert([
            'name' => 'Cataluña',
            'country_id' => '2',
        ]);

        DB::table('cities')->insert([
            'name' => 'Quito',
            'state_id' => '1',
        ]);

        DB::table('cities')->insert([
            'name' => 'Barcelona',
            'state_id' => '2',
        ]);

        DB::table('companies')->insert([
            'name' => 'Enterprise',
        ]);

        DB::table('divisions')->insert([
            'name' => 'Infrastructure',
        ]);

        DB::table('subsidiaries')->insert([
            'name' => 'Subsidiary Example',
            'code' => 'SE',
            'company_id' => '1',
            'division_id' => '1',
        ]);

        DB::table('projects')->insert([
            'name' => 'Project Example',
            'code' => 'PROEXA',
            'city_id' => '1',
            'subsidiary_id' => '1',
            'startDate' => Carbon::create('1970', '01', '01'),
            'finishDate' => Carbon::create('2050', '12', '31'),
        ]);

        DB::table('sectors')->insert([
            'name' => 'Administration',
        ]);

        DB::table('funct1ons')->insert([
            'name' => 'Technician',
        ]);

        DB::table('equipments')->insert([
            'name' => 'Truck',
            'project_id' => '1',
        ]);

        DB::table('zones')->insert([
            'name' => 'Zone Example',
            'project_id' => '1',
        ]);

        DB::table('locations')->insert([
            'name' => 'Location Example',
            'code' => 'LEX',
            'zone_id' => '1',
            'startDate' => Carbon::create('1970', '01', '01'),
            'finishDate' => Carbon::create('2050', '12', '31')
        ]);

        DB::table('turns')->insert([
            'name' => 'Diurnal',
            'start' => '07:00',
            'finish' => '16:00',
        ]);

        DB::table('stakeholders')->insert([
            'name' => 'Contractor Example',
            'project_id' => '1',
            'city_id' => '1',
            'code' => 'CONEX',
            'stakeholder_types_id' => 1,
        ]);

        DB::table('stakeholders')->insert([
            'name' => 'Client Example',
            'project_id' => '1',
            'city_id' => '1',
            'code' => 'CLIEX',
            'stakeholder_types_id' => 2,
        ]);

        DB::table('stakeholders')->insert([
            'name' => 'Inspector Example',
            'project_id' => '1',
            'city_id' => '1',
            'code' => 'INSEX',
            'stakeholder_types_id' => 3,
        ]);

        DB::table('stakeholders')->insert([
            'name' => 'Supplier Example',
            'project_id' => '1',
            'city_id' => '1',
            'code' => 'SUPEX',
            'stakeholder_types_id' => 4,
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
            'name' => 'Information Technology',
            'project_sector_id' => '1',
        ]);

        DB::table('positions')->insert([
            'name' => 'Foreman',
            'project_function_id' => '1',
            'department_id' => '1',
        ]);

        DB::table('location_turns')->insert([
            'location_id' => '1',
            'turn_id' => '1',
            'dateFrom' => Carbon::create('1970', '01', '01'),
            'dateTo' => Carbon::create('2050', '12', '31')
        ]);

        DB::table('users')->insert([
            'name' => 'SuperUser',
            'user' => 'su',
            'email' => 'example@email.com',
            'password' => Hash::make('IdonSoft'),
        ]);

        DB::table('location_users')->insert([
            'location_id' => '1',
            'user_id' => '1',
            'dailyreport_collaborator' => '1',
            'dailyreport_approver' => '1',
            'folio_approver' => '1',
            'receive_notification' => '1',
        ]);


        
    }
}
