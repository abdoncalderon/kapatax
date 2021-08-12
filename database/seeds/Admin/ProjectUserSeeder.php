<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectUserSeeder extends Seeder
{
    
    public function run()
    {
        DB::table('project_users')->insert([
            'user_id' => '1',
            'project_id' => '1',
            'role_id' => '1',
        ]);
    }
}
