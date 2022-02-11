<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genders')->insert([
            'name' => __('content.male'),
        ]);

        DB::table('genders')->insert([
            'name' => __('content.female'),
        ]);

        DB::table('genders')->insert([
            'name' => __('content.other'),
        ]);
        
    }
}
