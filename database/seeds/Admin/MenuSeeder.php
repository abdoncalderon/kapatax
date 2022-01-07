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
        // Administration Menu

        DB::table('menus')->insert([
            'code' => 'administration',
            'showName' => 'content.administration',
            'route' => null,
            'icon' => 'fa fa-lock',
        ]);

        DB::table('menus')->insert([
            'code' => 'administration.regions',
            'showName' => 'content.regions',
            'menu_id' => '1',
            'route' => 'regions.index',
            'icon' => 'fa fa-circle-o',
        ]);

        DB::table('menus')->insert([
            'code' => 'administration.countries',
            'showName' => 'content.countries',
            'menu_id' => '1',
            'route' => 'countries.index',
            'icon' => 'fa fa-circle-o',
        ]);

        DB::table('menus')->insert([
            'code' => 'administration.states',
            'showName' => 'content.states',
            'menu_id' => '1',
            'route' => 'states.index',
            'icon' => 'fa fa-circle-o',
        ]);

        DB::table('menus')->insert([
            'code' => 'administration.cities',
            'showName' => 'content.cities',
            'menu_id' => '1',
            'route' => 'cities.index',
            'icon' => 'fa fa-circle-o',
        ]);

        DB::table('menus')->insert([
            'code' => 'administration.companies',
            'showName' => 'content.companies',
            'menu_id' => '1',
            'route' => 'companies.index',
            'icon' => 'fa fa-circle-o',
        ]);

        DB::table('menus')->insert([
            'code' => 'administration.divisions',
            'showName' => 'content.divisions',
            'menu_id' => '1',
            'route' => 'divisions.index',
            'icon' => 'fa fa-circle-o',
        ]);

        DB::table('menus')->insert([
            'code' => 'administration.subsidiaries',
            'showName' => 'content.subsidiaries',
            'menu_id' => '1',
            'route' => 'subsidiaries.index',
            'icon' => 'fa fa-circle-o',
        ]);

        DB::table('menus')->insert([
            'code' => 'administration.projects',
            'showName' => 'content.projects',
            'menu_id' => '1',
            'route' => 'projects.index',
            'icon' => 'fa fa-circle-o',
        ]);

        DB::table('menus')->insert([
            'code' => 'administration.organizations',
            'showName' => 'content.organizations',
            'menu_id' => '16',
            'route' => 'organizations.index',
            'icon' => 'fa fa-circle-o',
        ]);

        DB::table('menus')->insert([
            'code' => 'administration.sectors',
            'showName' => 'content.sectors',
            'menu_id' => '1',
            'route' => 'sectors.index',
            'icon' => 'fa fa-circle-o',
        ]);

        DB::table('menus')->insert([
            'code' => 'administration.departments',
            'showName' => 'content.departments',
            'menu_id' => '16',
            'route' => 'departments.index',
            'icon' => 'fa fa-circle-o',
        ]);

        DB::table('menus')->insert([
            'code' => 'administration.unities',
            'showName' => 'content.unities',
            'menu_id' => '1',
            'route' => 'unities.index',
            'icon' => 'fa fa-circle-o',
        ]);

        DB::table('menus')->insert([
            'code' => 'administration.roles',
            'showName' => 'content.roles',
            'menu_id' => '1',
            'route' => 'roles.index',
            'icon' => 'fa fa-circle-o',
        ]);

        DB::table('menus')->insert([
            'code' => 'administration.menus',
            'showName' => 'content.menus',
            'menu_id' => '1',
            'route' => 'menus.index',
            'icon' => 'fa fa-circle-o',
        ]);

        DB::table('menus')->insert([
            'code' => 'administration.users',
            'showName' => 'content.users',
            'menu_id' => '1',
            'route' => 'users.index',
            'icon' => 'fa fa-circle-o',
        ]);

        DB::table('menus')->insert([
            'code' => 'administration.parameters',
            'showName' => 'content.parameters',
            'menu_id' => '1',
            'route' => null,
            'icon' => 'fa fa-circle-o',
        ]);

        // Settings Menu

        DB::table('menus')->insert([
            'code' => 'settings',
            'showName' => 'content.settings',
            'route' => null,
            'icon' => 'fa fa-sliders',
        ]);

        DB::table('menus')->insert([
            'code' => 'settings.project',
            'showName' => 'content.project',
            'menu_id' => '16',
            'route' => 'project.show',
            'icon' => 'fa fa-circle-o',
        ]);

        DB::table('menus')->insert([
            'code' => 'settings.zones',
            'showName' => 'content.zones',
            'menu_id' => '16',
            'route' => 'zones.index',
            'icon' => 'fa fa-circle-o',
        ]);

        DB::table('menus')->insert([
            'code' => 'settings.locations',
            'showName' => 'content.locations',
            'menu_id' => '16',
            'route' => 'locations.index',
            'icon' => 'fa fa-circle-o',
        ]);

        

        DB::table('menus')->insert([
            'code' => 'settings.positions',
            'showName' => 'content.positions',
            'menu_id' => '16',
            'route' => 'positions.index',
            'icon' => 'fa fa-circle-o',
        ]);

        DB::table('menus')->insert([
            'code' => 'settings.brands',
            'showName' => 'content.brands',
            'menu_id' => '16',
            'route' => 'brands.index',
            'icon' => 'fa fa-circle-o',
        ]);

        DB::table('menus')->insert([
            'code' => 'settings.models',
            'showName' => 'content.models',
            'menu_id' => '16',
            'route' => null,
            'icon' => 'fa fa-circle-o',
        ]);

        DB::table('menus')->insert([
            'code' => 'settings.categories',
            'showName' => 'content.categories',
            'menu_id' => '16',
            'route' => null,
            'icon' => 'fa fa-circle-o',
        ]);

        DB::table('menus')->insert([
            'code' => 'settings.types',
            'showName' => 'content.types',
            'menu_id' => '16',
            'route' => null,
            'icon' => 'fa fa-circle-o',
        ]);

        DB::table('menus')->insert([
            'code' => 'settings.periods',
            'showName' => 'content.periods',
            'menu_id' => '16',
            'route' => null,
            'icon' => 'fa fa-circle-o',
        ]);

        DB::table('menus')->insert([
            'code' => 'settings.shifts',
            'showName' => 'content.shifts',
            'menu_id' => '16',
            'route' => null,
            'icon' => 'fa fa-circle-o',
        ]);

        // Production Menu 

        DB::table('menus')->insert([
            'code' => 'production',
            'showName' => 'content.production',
            'route' => null,
            'icon' => 'fa fa-industry',
        ]);

        DB::table('menus')->insert([
            'code' => 'production.workbook',
            'showName' => 'content.workbook',
            'menu_id' => '29',
            'route' => null,
            'icon' => 'fa fa-book',
        ]);

        DB::table('menus')->insert([
            'code' => 'production.workbook.documents',
            'showName' => 'content.documents',
            'menu_id' => '30',
            'route' => null,
            'icon' => 'fa fa-file-text',
        ]);

        DB::table('menus')->insert([
            'code' => 'production.workbook.documents.folios',
            'showName' => 'content.folios',
            'menu_id' => '31',
            'route' => null,
            'icon' => 'fa fa-circle-o',
        ]);

        DB::table('menus')->insert([
            'code' => 'production.workbook.documents.dailyReports',
            'showName' => 'content.dailyreports',
            'menu_id' => '31',
            'route' => null,
            'icon' => 'fa fa-circle-o',
        ]);

        DB::table('menus')->insert([
            'code' => 'production.workbook.documents.notes',
            'showName' => 'content.notes',
            'menu_id' => '31',
            'route' => null,
            'icon' => 'fa fa-circle-o',
        ]);

        DB::table('menus')->insert([
            'code' => 'production.workbook.reports',
            'showName' => 'content.reports',
            'menu_id' => '30',
            'route' => null,
            'icon' => 'fa fa-print',
        ]);

        DB::table('menus')->insert([
            'code' => 'production.workbook.reports.folios',
            'showName' => 'content.folios',
            'menu_id' => '35',
            'route' => null,
            'icon' => 'fa fa-circle-o',
        ]);

        DB::table('menus')->insert([
            'code' => 'production.workbook.reports.dailyReports',
            'showName' => 'content.dailyreports',
            'menu_id' => '35',
            'route' => null,
            'icon' => 'fa fa-circle-o',
        ]);

        DB::table('menus')->insert([
            'code' => 'production.workbook.reports.notes',
            'showName' => 'content.notes',
            'menu_id' => '35',
            'route' => null,
            'icon' => 'fa fa-circle-o',
        ]);

        DB::table('menus')->insert([
            'code' => 'production.workbook.settings',
            'showName' => 'content.settings',
            'menu_id' => '30',
            'route' => null,
            'icon' => 'fa fa-cogs',
        ]);

        DB::table('menus')->insert([
            'code' => 'production.workbook.settings.assigments',
            'showName' => 'content.assignments',
            'menu_id' => '39',
            'route' => null,
            'icon' => 'fa fa-circle-o',
        ]);

        DB::table('menus')->insert([
            'code' => 'production.workbook.settings.permits',
            'showName' => 'content.permits',
            'menu_id' => '39',
            'route' => null,
            'icon' => 'fa fa-circle-o',
        ]);

        DB::table('menus')->insert([
            'code' => 'production.workbook.settings.locations',
            'showName' => 'content.locations',
            'menu_id' => '39',
            'route' => null,
            'icon' => 'fa fa-circle-o',
        ]);

        // Commercial Menu 

        DB::table('menus')->insert([
            'code' => 'commercial',
            'showName' => 'content.commercial',
            'route' => null,
            'icon' => 'fa fa-money',
        ]);

        DB::table('menus')->insert([
            'code' => 'commercial.purchases',
            'showName' => 'content.purchases',
            'menu_id' => '43',
            'route' => null,
            'icon' => 'fa fa-shopping-cart',
        ]);

        DB::table('menus')->insert([
            'code' => 'commercial.purchases.orders',
            'showName' => 'content.orders',
            'menu_id' => '44',
            'route' => null,
            'icon' => 'fa fa-check-square',
        ]);

        DB::table('menus')->insert([
            'code' => 'commercial.purchases.agreements',
            'showName' => 'content.agreements',
            'menu_id' => '44',
            'route' => null,
            'icon' => 'fa fa-file',
        ]);

        DB::table('menus')->insert([
            'code' => 'commercial.purchases.reports',
            'showName' => 'content.reports',
            'menu_id' => '44',
            'route' => null,
            'icon' => 'fa fa-print',
        ]);

        DB::table('menus')->insert([
            'code' => 'commercial.warehouse',
            'showName' => 'content.warehouse',
            'menu_id' => '43',
            'route' => null,
            'icon' => 'fa fa-industry',
        ]);

        DB::table('menus')->insert([
            'code' => 'commercial.warehouse.warehouses',
            'showName' => 'content.warehouses',
            'menu_id' => '48',
            'route' => null,
            'icon' => 'fa fa-industry',
        ]);

        DB::table('menus')->insert([
            'code' => 'commercial.warehouse.materials',
            'showName' => 'content.materials',
            'menu_id' => '48',
            'route' => null,
            'icon' => 'fa fa-cubes',
        ]);

        DB::table('menus')->insert([
            'code' => 'commercial.warehouse.reports',
            'showName' => 'content.reports',
            'menu_id' => '48',
            'route' => null,
            'icon' => 'fa fa-print',
        ]);

        DB::table('menus')->insert([
            'code' => 'commercial.assets',
            'showName' => 'content.assets',
            'menu_id' => '43',
            'route' => null,
            'icon' => 'fa fa-cube',
        ]);

        DB::table('menus')->insert([
            'code' => 'commercial.assets.record',
            'showName' => 'content.record',
            'menu_id' => '52',
            'route' => null,
            'icon' => 'fa fa-pencil',
        ]);

        DB::table('menus')->insert([
            'code' => 'commercial.assets.assigments',
            'showName' => 'content.assignments',
            'menu_id' => '52',
            'route' => null,
            'icon' => 'fa fa-check-square',
        ]);

        DB::table('menus')->insert([
            'code' => 'commercial.assets.updates',
            'showName' => 'content.updates',
            'menu_id' => '52',
            'route' => null,
            'icon' => 'fa fa-refresh',
        ]);

        DB::table('menus')->insert([
            'code' => 'commercial.assets.reports',
            'showName' => 'content.reports',
            'menu_id' => '52',
            'route' => null,
            'icon' => 'fa fa-print',
        ]);


        // Persons Menu 

        DB::table('menus')->insert([
            'code' => 'persons',
            'showName' => 'content.persons',
            'route' => null,
            'icon' => 'fa fa-user',
        ]);

        DB::table('menus')->insert([
            'code' => 'persons.payroll',
            'showName' => 'content.payroll',
            'menu_id' => '57',
            'route' => null,
            'icon' => 'fa fa-list',
        ]);

        DB::table('menus')->insert([
            'code' => 'persons.timesheet',
            'showName' => 'content.timesheet',
            'menu_id' => '57',
            'route' => null,
            'icon' => 'fa fa-table',
        ]);
        
        // Safety & Health Menu 

        DB::table('menus')->insert([
            'code' => 'shw',
            'showName' => 'content.safetyAndHealth',
            'route' => null,
            'icon' => 'fa fa-stethoscope',
        ]);

        DB::table('menus')->insert([
            'code' => 'shw.ppes',
            'showName' => 'content.ppes',
            'menu_id' => '60',
            'route' => null,
            'icon' => 'fa fa-medkit',
        ]);

        DB::table('menus')->insert([
            'code' => 'shw.ppes.assigments',
            'showName' => 'content.assignments',
            'menu_id' => '61',
            'route' => null,
            'icon' => 'fa fa-check-square',
        ]);

        DB::table('menus')->insert([
            'code' => 'shw.ppes.rules',
            'showName' => 'content.rules',
            'menu_id' => '61',
            'route' => null,
            'icon' => 'fa fa-list',
        ]);

        DB::table('menus')->insert([
            'code' => 'shw.ppes.reports',
            'showName' => 'content.reports',
            'menu_id' => '61',
            'route' => null,
            'icon' => 'fa fa-print',
        ]);

        DB::table('menus')->insert([
            'code' => 'shw.health',
            'showName' => 'content.health',
            'menu_id' => '60',
            'route' => null,
            'icon' => 'fa fa-heart',
        ]);

        DB::table('menus')->insert([
            'code' => 'shw.health.history',
            'showName' => 'content.history',
            'menu_id' => '65',
            'route' => null,
            'icon' => 'fa fa-folder-open',
        ]);

        DB::table('menus')->insert([
            'code' => 'shw.health.record',
            'showName' => 'content.record',
            'menu_id' => '65',
            'route' => null,
            'icon' => 'fa fa-list',
        ]);

        DB::table('menus')->insert([
            'code' => 'shw.health.reports',
            'showName' => 'content.reports',
            'menu_id' => '65',
            'route' => null,
            'icon' => 'fa fa-print',
        ]);

        DB::table('menus')->insert([
            'code' => 'shw.access',
            'showName' => 'content.access',
            'menu_id' => '60',
            'route' => null,
            'icon' => 'fa fa-sign-in',
        ]);

        DB::table('menus')->insert([
            'code' => 'shw.access.requirements',
            'showName' => 'content.requirements',
            'menu_id' => '69',
            'route' => null,
            'icon' => 'fa fa-list',
        ]);

        DB::table('menus')->insert([
            'code' => 'shw.access.profiles',
            'showName' => 'content.profiles',
            'menu_id' => '69',
            'route' => null,
            'icon' => 'fa fa-user',
        ]);


        DB::table('menus')->insert([
            'code' => 'shw.access.organizations',
            'showName' => 'content.organizations',
            'menu_id' => '69',
            'route' => null,
            'icon' => 'fa fa-institution',
        ]);

        DB::table('menus')->insert([
            'code' => 'shw.access.checkings',
            'showName' => 'content.checkings',
            'menu_id' => '69',
            'route' => null,
            'icon' => 'fa fa-search',
        ]);

        DB::table('menus')->insert([
            'code' => 'shw.access.reports',
            'showName' => 'content.reports',
            'menu_id' => '69',
            'route' => null,
            'icon' => 'fa fa-print',
        ]);
    }
}
