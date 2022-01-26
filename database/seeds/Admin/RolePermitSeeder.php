<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolePermitSeeder extends Seeder
{
    
    public function run()
    {
        DB::table('role_permits')->insert([
            'role_id' => '1',
            'permit_id' => '1',
        ]);

        DB::table('role_permits')->insert([
            'role_id' => '1',
            'permit_id' => '2',
        ]);

        DB::table('role_permits')->insert([
            'role_id' => '1',
            'permit_id' => '3',
        ]);

        DB::table('role_permits')->insert([
            'role_id' => '1',
            'permit_id' => '4',
        ]);

        DB::table('role_permits')->insert([
            'role_id' => '1',
            'permit_id' => '5',
        ]);

        DB::table('role_permits')->insert([
            'role_id' => '1',
            'permit_id' => '6',
        ]);

        DB::table('role_permits')->insert([
            'role_id' => '1',
            'permit_id' => '7',
        ]);

        DB::table('role_permits')->insert([
            'role_id' => '1',
            'permit_id' => '8',
        ]);
    }
}
