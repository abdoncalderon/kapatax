<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menus')->insert([
            'code' => 'home',
            'showName' => 'Inicio',
            'menu_id' => '',
            'route' => '',
            'icon' => 'fa fa-home',
        ]);

        DB::table('menus')->insert([
            'code' => 'home.profile',
            'showName' => 'Perfil',
            'menu_id' => '1',
            'route' => 'profiles.show',
            'icon' => 'fa fa-user',
        ]);

        DB::table('menus')->insert([
            'code' => 'home.myOrders',
            'showName' => 'Mis Pedidos',
            'menu_id' => '1',
            'route' => '',
            'icon' => 'fa fa-shopping-cart',
        ]);

        DB::table('menus')->insert([
            'code' => 'home.myNotifications',
            'showName' => 'Mis Motificaciones',
            'menu_id' => '1',
            'route' => '',
            'icon' => 'fa fa-envelope',
        ]);

        DB::table('menus')->insert([
            'code' => 'production',
            'showName' => 'Producción',
            'menu_id' => '',
            'route' => '',
            'icon' => 'fa fa-industry',
        ]);

        DB::table('menus')->insert([
            'code' => 'production.workbook',
            'showName' => 'Libro de Obra',
            'menu_id' => '5',
            'route' => '',
            'icon' => 'fa fa-book',
        ]);

        DB::table('menus')->insert([
            'code' => 'production.workbook.documents',
            'showName' => 'Documentos',
            'menu_id' => '6',
            'route' => '',
            'icon' => 'fa fa-file-text',
        ]);

        DB::table('menus')->insert([
            'code' => 'production.workbook.documents.folios',
            'showName' => 'Folios',
            'menu_id' => '7',
            'route' => '',
            'icon' => 'fa fa-circle-o',
        ]);

        DB::table('menus')->insert([
            'code' => 'production.workbook.documents.dailyReports',
            'showName' => 'Reportes Diarios',
            'menu_id' => '7',
            'route' => '',
            'icon' => 'fa fa-circle-o',
        ]);

        DB::table('menus')->insert([
            'code' => 'production.workbook.documents.notes',
            'showName' => 'Anotaciones',
            'menu_id' => '7',
            'route' => '',
            'icon' => 'fa fa-circle-o',
        ]);

        DB::table('menus')->insert([
            'code' => 'production.workbook.reports',
            'showName' => 'Reportes',
            'menu_id' => '6',
            'route' => '',
            'icon' => 'fa fa-file-text',
        ]);

        DB::table('menus')->insert([
            'code' => 'production.workbook.reports.folios',
            'showName' => 'Folios',
            'menu_id' => '11',
            'route' => '',
            'icon' => 'fa fa-circle-o',
        ]);

        DB::table('menus')->insert([
            'code' => 'production.workbook.reports.dailyReports',
            'showName' => 'Reportes Diarios',
            'menu_id' => '11',
            'route' => '',
            'icon' => 'fa fa-circle-o',
        ]);

        DB::table('menus')->insert([
            'code' => 'production.workbook.reports.notes',
            'showName' => 'Anotaciones',
            'menu_id' => '11',
            'route' => '',
            'icon' => 'fa fa-circle-o',
        ]);

        DB::table('menus')->insert([
            'code' => 'production.workbook.settings',
            'showName' => 'Reportes',
            'menu_id' => '6',
            'route' => '',
            'icon' => 'fa fa-file-text',
        ]);

        DB::table('menus')->insert([
            'code' => 'production.workbook.settings.assigments',
            'showName' => 'Folios',
            'menu_id' => '15',
            'route' => '',
            'icon' => 'fa fa-circle-o',
        ]);

        DB::table('menus')->insert([
            'code' => 'production.workbook.settings.permits',
            'showName' => 'Reportes Diarios',
            'menu_id' => '15',
            'route' => '',
            'icon' => 'fa fa-circle-o',
        ]);

        DB::table('menus')->insert([
            'code' => 'production.workbook.settings.locations',
            'showName' => 'Anotaciones',
            'menu_id' => '15',
            'route' => '',
            'icon' => 'fa fa-circle-o',
        ]);

    }
}
