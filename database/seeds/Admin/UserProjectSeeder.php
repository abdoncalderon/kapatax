<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserProjectSeeder extends Seeder
{
    
    public function run()
    {
        DB::table('user_projects')->insert([
            'user_id' => '1',
            'project_id' => '1',
            'role_id' => '1',
        ]);
    }
}
