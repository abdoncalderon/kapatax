<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StakeholderTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stakeholder_types')->insert([
            'name' => __('content.contractor'),
        ]);

        DB::table('stakeholder_types')->insert([
            'name' => __('content.client'),
        ]);

        DB::table('stakeholder_types')->insert([
            'name' => __('content.inspector'),
        ]);

        DB::table('stakeholder_types')->insert([
            'name' => __('content.supplier'),
        ]);

        DB::table('stakeholder_types')->insert([
            'name' => __('content.partner'),
        ]);

        DB::table('stakeholder_types')->insert([
            'name' => __('content.other'),
        ]);
    }
}
