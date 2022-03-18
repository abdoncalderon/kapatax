<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statuses')->insert([
            'name' => __('content.available'),
        ]);

        DB::table('statuses')->insert([
            'name' => __('content.inUse'),
        ]);

        DB::table('statuses')->insert([
            'name' => __('content.inMaintenance'),
        ]);

        DB::table('statuses')->insert([
            'name' => __('content.damaged'),
        ]);

        DB::table('statuses')->insert([
            'name' => __('content.sold'),
        ]);

        DB::table('statuses')->insert([
            'name' => __('content.stolen'),
        ]);

        DB::table('statuses')->insert([
            'name' => __('content.lost'),
        ]);
        
    }
}
