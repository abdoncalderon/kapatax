<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'SuperUser',
            'user' => 'su',
            'email' => 'example@email.com',
            'password' => Hash::make('IdonSoft'),
        ]);
    }
}
