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
            'city_id' => '1',
        ]);

        DB::table('subsidiaries')->insert([
            'name' => 'PROJECT EXAMPLE',
            'code' => 'EXAMPLE',
            'city_id' => '1',
            'company_id' => '1',
        ]);

        DB::table('users')->insert([
            'name' => 'SUPERUSER',
            'user' => 'superuser',
            'email' => 'example@email.com',
            'password' => Hash::make('IdonSoft'),
            'role_id' => '1',
        ]);

        DB::table('subsidiary_users')->insert([
            'user_id' => '1',
            'subsidiary_id' => '1',
        ]);
    }
}
