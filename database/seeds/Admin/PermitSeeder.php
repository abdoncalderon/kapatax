<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    
    public function run()
    {
        DB::table('permits')->insert([
            'name' => 'workbook_create_folio',
            'menu_id' => 32,
        ]);

        DB::table('permits')->insert([
            'name' => 'workbook_create_dailyreport',
            'menu_id' => 32,
        ]);

        DB::table('permits')->insert([
            'name' => 'workbook_create_note',
            'menu_id' => 32,
        ]);

        DB::table('permits')->insert([
            'name' => 'workbook_create_comment',
            'menu_id' => 32,
        ]);

        DB::table('permits')->insert([
            'name' => 'workbook_print_dailyreport',
            'menu_id' => 32,
        ]);

        DB::table('permits')->insert([
            'name' => 'workbook_print_note',
            'menu_id' => 32,
        ]);

        DB::table('permits')->insert([
            'name' => 'workbook_print_folio',
            'menu_id' => 32,
        ]);

        DB::table('permits')->insert([
            'name' => 'workbook_edit_sequence',
            'menu_id' => 32,
        ]);

    }
}
