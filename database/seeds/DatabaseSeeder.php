<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'SUPERUSER',
        ]);

        DB::table('regions')->insert([
            'name' => 'LATIN AMERICA',
        ]);

        DB::table('countries')->insert([
            'name' => 'ECUADOR',
            'region_id' => '1',
            'code' => 'EC',
            'ccc' => '593',
        ]);

        DB::table('states')->insert([
            'name' => 'PICHINCHA',
            'country_id' => '1',
        ]);

        DB::table('cities')->insert([
            'name' => 'QUITO',
            'state_id' => '1',
        ]);

        DB::table('companies')->insert([
            'name' => 'MY ENTERPRISE',
        ]);

        DB::table('divisions')->insert([
            'name' => 'INFRASTRUCTURE',
        ]);

        DB::table('subsidiaries')->insert([
            'name' => 'SUBSIDIARY EXAMPLE',
            'code' => 'EXAMPLE',
            'country_id' => '1',
            'company_id' => '1',
            'division_id' => '1',
        ]);

        DB::table('projects')->insert([
            'name' => 'PROJECT EXAMPLE',
            'code' => 'EXAMPLE',
            'city_id' => '1',
            'subsidiary_id' => '1',
        ]);

        DB::table('users')->insert([
            'name' => 'SUPERUSER',
            'user' => 'superuser',
            'email' => 'example@email.com',
            'password' => Hash::make('IdonSoft'),
        ]);

        DB::table('project_users')->insert([
            'user_id' => '1',
            'project_id' => '1',
            'role_id' => '1',
        ]);

        
    }
}
