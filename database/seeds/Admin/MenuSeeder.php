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
        
        // Production Menu 

        DB::table('menus')->insert([
            'code' => 'production',
            'showName' => 'Producción',
            'route' => null,
            'icon' => 'fa fa-industry',
        ]);

        DB::table('menus')->insert([
            'code' => 'production.workbook',
            'showName' => 'Libro de Obra',
            'menu_id' => '1',
            'route' => null,
            'icon' => 'fa fa-book',
        ]);

        DB::table('menus')->insert([
            'code' => 'production.workbook.documents',
            'showName' => 'Documentos',
            'menu_id' => '2',
            'route' => null,
            'icon' => 'fa fa-file-text',
        ]);

        DB::table('menus')->insert([
            'code' => 'production.workbook.documents.folios',
            'showName' => 'Folios',
            'menu_id' => '3',
            'route' => null,
            'icon' => 'fa fa-circle-o',
        ]);

        DB::table('menus')->insert([
            'code' => 'production.workbook.documents.dailyReports',
            'showName' => 'Reportes Diarios',
            'menu_id' => '3',
            'route' => null,
            'icon' => 'fa fa-circle-o',
        ]);

        DB::table('menus')->insert([
            'code' => 'production.workbook.documents.notes',
            'showName' => 'Anotaciones',
            'menu_id' => '3',
            'route' => null,
            'icon' => 'fa fa-circle-o',
        ]);

        DB::table('menus')->insert([
            'code' => 'production.workbook.reports',
            'showName' => 'Reportes',
            'menu_id' => '2',
            'route' => null,
            'icon' => 'fa fa-print',
        ]);

        DB::table('menus')->insert([
            'code' => 'production.workbook.reports.folios',
            'showName' => 'Folios',
            'menu_id' => '7',
            'route' => null,
            'icon' => 'fa fa-circle-o',
        ]);

        DB::table('menus')->insert([
            'code' => 'production.workbook.reports.dailyReports',
            'showName' => 'Reportes Diarios',
            'menu_id' => '7',
            'route' => null,
            'icon' => 'fa fa-circle-o',
        ]);

        DB::table('menus')->insert([
            'code' => 'production.workbook.reports.notes',
            'showName' => 'Anotaciones',
            'menu_id' => '7',
            'route' => null,
            'icon' => 'fa fa-circle-o',
        ]);

        DB::table('menus')->insert([
            'code' => 'production.workbook.settings',
            'showName' => 'Reportes',
            'menu_id' => '2',
            'route' => null,
            'icon' => 'fa fa-cogs',
        ]);

        DB::table('menus')->insert([
            'code' => 'production.workbook.settings.assigments',
            'showName' => 'Folios',
            'menu_id' => '11',
            'route' => null,
            'icon' => 'fa fa-circle-o',
        ]);

        DB::table('menus')->insert([
            'code' => 'production.workbook.settings.permits',
            'showName' => 'Reportes Diarios',
            'menu_id' => '11',
            'route' => null,
            'icon' => 'fa fa-circle-o',
        ]);

        DB::table('menus')->insert([
            'code' => 'production.workbook.settings.locations',
            'showName' => 'Anotaciones',
            'menu_id' => '11',
            'route' => null,
            'icon' => 'fa fa-circle-o',
        ]);

        // Commercial Menu 

        DB::table('menus')->insert([
            'code' => 'commercial',
            'showName' => 'Comercial',
            'route' => null,
            'icon' => 'fa fa-money',
        ]);

        DB::table('menus')->insert([
            'code' => 'commercial.purchases',
            'showName' => 'Compras',
            'menu_id' => '15',
            'route' => null,
            'icon' => 'fa fa-shopping-cart',
        ]);

        DB::table('menus')->insert([
            'code' => 'commercial.purchases.orders',
            'showName' => 'Pedidos',
            'menu_id' => '16',
            'route' => null,
            'icon' => 'fa fa-check-square',
        ]);

        DB::table('menus')->insert([
            'code' => 'commercial.purchases.agreements',
            'showName' => 'Contratos',
            'menu_id' => '16',
            'route' => null,
            'icon' => 'fa fa-file',
        ]);

        DB::table('menus')->insert([
            'code' => 'commercial.purchases.reports',
            'showName' => 'Reportes',
            'menu_id' => '16',
            'route' => null,
            'icon' => 'fa fa-print',
        ]);

        DB::table('menus')->insert([
            'code' => 'commercial.warehouse',
            'showName' => 'Almacen',
            'menu_id' => '15',
            'route' => null,
            'icon' => 'fa fa-industry',
        ]);

        DB::table('menus')->insert([
            'code' => 'commercial.warehouse.warehouses',
            'showName' => 'Almacenes',
            'menu_id' => '20',
            'route' => null,
            'icon' => 'fa fa-industry',
        ]);

        DB::table('menus')->insert([
            'code' => 'commercial.warehouse.materials',
            'showName' => 'Materiales',
            'menu_id' => '20',
            'route' => null,
            'icon' => 'fa fa-cubes',
        ]);

        DB::table('menus')->insert([
            'code' => 'commercial.warehouse.reports',
            'showName' => 'Reportes',
            'menu_id' => '20',
            'route' => null,
            'icon' => 'fa fa-print',
        ]);

        DB::table('menus')->insert([
            'code' => 'commercial.assets',
            'showName' => 'Activos',
            'menu_id' => '15',
            'route' => null,
            'icon' => 'fa fa-cube',
        ]);

        DB::table('menus')->insert([
            'code' => 'commercial.assets.record',
            'showName' => 'Registro',
            'menu_id' => '24',
            'route' => null,
            'icon' => 'fa fa-pencil',
        ]);

        DB::table('menus')->insert([
            'code' => 'commercial.assets.assigments',
            'showName' => 'Asignaciones',
            'menu_id' => '24',
            'route' => null,
            'icon' => 'fa fa-check-square',
        ]);

        DB::table('menus')->insert([
            'code' => 'commercial.assets.updates',
            'showName' => 'Actualizaciones',
            'menu_id' => '24',
            'route' => null,
            'icon' => 'fa fa-refresh',
        ]);

        DB::table('menus')->insert([
            'code' => 'commercial.assets.reports',
            'showName' => 'Reportes',
            'menu_id' => '24',
            'route' => null,
            'icon' => 'fa fa-print',
        ]);

        // Administration Menu

        DB::table('menus')->insert([
            'code' => 'administration',
            'showName' => 'Administración',
            'route' => null,
            'icon' => 'fa fa-lock',
        ]);

        DB::table('menus')->insert([
            'code' => 'administration.companies',
            'showName' => 'Empresas',
            'menu_id' => '29',
            'route' => 'companies.index',
            'icon' => 'fa fa-circle-o',
        ]);

        DB::table('menus')->insert([
            'code' => 'administration.divisions',
            'showName' => 'Divisiones',
            'menu_id' => '29',
            'route' => 'divisions.index',
            'icon' => 'fa fa-circle-o',
        ]);

        DB::table('menus')->insert([
            'code' => 'administration.regions',
            'showName' => 'Regiones',
            'menu_id' => '29',
            'route' => 'regions.index',
            'icon' => 'fa fa-circle-o',
        ]);

        DB::table('menus')->insert([
            'code' => 'administration.countries',
            'showName' => 'Paises',
            'menu_id' => '29',
            'route' => 'countries.index',
            'icon' => 'fa fa-circle-o',
        ]);

        DB::table('menus')->insert([
            'code' => 'administration.states',
            'showName' => 'Estados',
            'menu_id' => '29',
            'route' => 'states.index',
            'icon' => 'fa fa-circle-o',
        ]);

        DB::table('menus')->insert([
            'code' => 'administration.cities',
            'showName' => 'Ciudades',
            'menu_id' => '29',
            'route' => null,
            'icon' => 'fa fa-circle-o',
        ]);

        DB::table('menus')->insert([
            'code' => 'administration.subsidiaries',
            'showName' => 'Subsidiarias',
            'menu_id' => '29',
            'route' => null,
            'icon' => 'fa fa-circle-o',
        ]);

        DB::table('menus')->insert([
            'code' => 'administration.projects',
            'showName' => 'Proyectos',
            'menu_id' => '29',
            'route' => null,
            'icon' => 'fa fa-circle-o',
        ]);

        DB::table('menus')->insert([
            'code' => 'administration.sectors',
            'showName' => 'Sectores',
            'menu_id' => '29',
            'route' => null,
            'icon' => 'fa fa-circle-o',
        ]);

        DB::table('menus')->insert([
            'code' => 'administration.unities',
            'showName' => 'Unidades',
            'menu_id' => '29',
            'route' => null,
            'icon' => 'fa fa-circle-o',
        ]);

        DB::table('menus')->insert([
            'code' => 'administration.roles',
            'showName' => 'Roles',
            'menu_id' => '29',
            'route' => 'roles.index',
            'icon' => 'fa fa-circle-o',
        ]);

        DB::table('menus')->insert([
            'code' => 'administration.menus',
            'showName' => 'Menus',
            'menu_id' => '29',
            'route' => 'menus.index',
            'icon' => 'fa fa-circle-o',
        ]);

        DB::table('menus')->insert([
            'code' => 'administration.users',
            'showName' => 'Usuarios',
            'menu_id' => '29',
            'route' => 'users.index',
            'icon' => 'fa fa-circle-o',
        ]);

        DB::table('menus')->insert([
            'code' => 'administration.parameters',
            'showName' => 'Parametros',
            'menu_id' => '29',
            'route' => null,
            'icon' => 'fa fa-circle-o',
        ]);

    }
}
