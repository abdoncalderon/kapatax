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

                        // 2

                        DB::table('menus')->insert([
                            'code' => 'administration.regions',
                            'showName' => 'content.regions',
                            'menu_id' => '1',
                            'route' => 'regions.index',
                            'icon' => 'fa fa-circle-o',
                        ]);

                        // 3

                        DB::table('menus')->insert([
                            'code' => 'administration.countries',
                            'showName' => 'content.countries',
                            'menu_id' => '1',
                            'route' => 'countries.index',
                            'icon' => 'fa fa-circle-o',
                        ]);

                        // 4

                        DB::table('menus')->insert([
                            'code' => 'administration.states',
                            'showName' => 'content.states',
                            'menu_id' => '1',
                            'route' => 'states.index',
                            'icon' => 'fa fa-circle-o',
                        ]);

                        // 5

                        DB::table('menus')->insert([
                            'code' => 'administration.cities',
                            'showName' => 'content.cities',
                            'menu_id' => '1',
                            'route' => 'cities.index',
                            'icon' => 'fa fa-circle-o',
                        ]);

                        // 6

                        DB::table('menus')->insert([
                            'code' => 'administration.companies',
                            'showName' => 'content.companies',
                            'menu_id' => '1',
                            'route' => 'companies.index',
                            'icon' => 'fa fa-circle-o',
                        ]);

                        // 7

                        DB::table('menus')->insert([
                            'code' => 'administration.divisions',
                            'showName' => 'content.divisions',
                            'menu_id' => '1',
                            'route' => 'divisions.index',
                            'icon' => 'fa fa-circle-o',
                        ]);

                        // 8

                        DB::table('menus')->insert([
                            'code' => 'administration.subsidiaries',
                            'showName' => 'content.subsidiaries',
                            'menu_id' => '1',
                            'route' => 'subsidiaries.index',
                            'icon' => 'fa fa-circle-o',
                        ]);

                        // 9

                        DB::table('menus')->insert([
                            'code' => 'administration.roles',
                            'showName' => 'content.roles',
                            'menu_id' => '1',
                            'route' => 'roles.index',
                            'icon' => 'fa fa-circle-o',
                        ]);
                        
                        // 10

                        DB::table('menus')->insert([
                            'code' => 'administration.projects',
                            'showName' => 'content.projects',
                            'menu_id' => '1',
                            'route' => 'projects.index',
                            'icon' => 'fa fa-circle-o',
                        ]);


                        // 11

                        DB::table('menus')->insert([
                            'code' => 'administration.menus',
                            'showName' => 'content.menus',
                            'menu_id' => '1',
                            'route' => 'menus.index',
                            'icon' => 'fa fa-circle-o',
                        ]);

                        // 12

                        DB::table('menus')->insert([
                            'code' => 'administration.permits',
                            'showName' => 'content.permits',
                            'menu_id' => '1',
                            'route' => 'permits.index',
                            'icon' => 'fa fa-circle-o',
                        ]);

                        // 13

                        DB::table('menus')->insert([
                            'code' => 'administration.people',
                            'showName' => 'content.people',
                            'menu_id' => '1',
                            'route' => 'people.index',
                            'icon' => 'fa fa-circle-o',
                        ]);

                        // 14

                        DB::table('menus')->insert([
                            'code' => 'administration.users',
                            'showName' => 'content.users',
                            'menu_id' => '1',
                            'route' => null,
                            'icon' => 'fa fa-circle-o',
                        ]);

                        // 15

                        DB::table('menus')->insert([
                            'code' => 'administration.brands',
                            'showName' => 'content.brands',
                            'menu_id' => '1',
                            'route' => 'brands.index',
                            'icon' => 'fa fa-circle-o',
                        ]);

                        // 16

                        DB::table('menus')->insert([
                            'code' => 'administration.models',
                            'showName' => 'content.models',
                            'menu_id' => '1',
                            'route' => 'models.index',
                            'icon' => 'fa fa-circle-o',
                        ]);

                        // 17
                        
                        DB::table('menus')->insert([
                            'code' => 'administration.unities',
                            'showName' => 'content.unities',
                            'menu_id' => '1',
                            'route' => 'unities.index',
                            'icon' => 'fa fa-circle-o',
                        ]);

        // Settings Menu

        // 18

        DB::table('menus')->insert([
            'code' => 'settings',
            'showName' => 'content.setting',
            'route' => null,
            'icon' => 'fa fa-sliders',
        ]);

                        // 19

                        DB::table('menus')->insert([
                            'code' => 'settings.project',
                            'showName' => 'content.project',
                            'menu_id' => '18',
                            'route' => 'project.index',
                            'icon' => 'fa fa-circle-o',
                        ]);

                        // 20

                        DB::table('menus')->insert([
                            'code' => 'settings.stakeholders',
                            'showName' => 'content.stakeholders',
                            'menu_id' => '18',
                            'route' => 'stakeholders.index',
                            'icon' => 'fa fa-circle-o',
                        ]);

                        // 21

                        DB::table('menus')->insert([
                            'code' => 'settings.functions',
                            'showName' => 'content.functions',
                            'menu_id' => '18',
                            'route' => 'functions.index',
                            'icon' => 'fa fa-circle-o',
                        ]);

                        // 22

                        DB::table('menus')->insert([
                            'code' => 'settings.positions',
                            'showName' => 'content.positions',
                            'menu_id' => '18',
                            'route' => 'positions.index',
                            'icon' => 'fa fa-circle-o',
                        ]);

                        // 23

                        DB::table('menus')->insert([
                            'code' => 'settings.sectors',
                            'showName' => 'content.sectors',
                            'menu_id' => '18',
                            'route' => 'sectors.index',
                            'icon' => 'fa fa-circle-o',
                        ]);

                        // 24

                        DB::table('menus')->insert([
                            'code' => 'settings.departments',
                            'showName' => 'content.departments',
                            'menu_id' => '18',
                            'route' => 'departments.index',
                            'icon' => 'fa fa-circle-o',
                        ]);

                        // 25

                        DB::table('menus')->insert([
                            'code' => 'settings.zones',
                            'showName' => 'content.zones',
                            'menu_id' => '18',
                            'route' => 'zones.index',
                            'icon' => 'fa fa-circle-o',
                        ]);

                        // 26

                        DB::table('menus')->insert([
                            'code' => 'settings.locations',
                            'showName' => 'content.locations',
                            'menu_id' => '18',
                            'route' => 'locations.index',
                            'icon' => 'fa fa-circle-o',
                        ]);

                        // 27

                        DB::table('menus')->insert([
                            'code' => 'settings.projectPeople',
                            'showName' => 'content.people',
                            'menu_id' => '18',
                            'route' => 'projectPeople.index',
                            'icon' => 'fa fa-circle-o',
                        ]);

                        // 28

                        DB::table('menus')->insert([
                            'code' => 'settings.projectUsers',
                            'showName' => 'content.users',
                            'menu_id' => '18',
                            'route' => 'projectUsers.index',
                            'icon' => 'fa fa-circle-o',
                        ]);

                        // 29

                        DB::table('menus')->insert([
                            'code' => 'settings.families',
                            'showName' => 'content.families',
                            'menu_id' => '18',
                            'route' => 'families.index',
                            'icon' => 'fa fa-circle-o',
                        ]);

                        // 30

                        DB::table('menus')->insert([
                            'code' => 'settings.categories',
                            'showName' => 'content.categories',
                            'menu_id' => '18',
                            'route' => 'categories.index',
                            'icon' => 'fa fa-circle-o',
                        ]);

                        // 31

                        DB::table('menus')->insert([
                            'code' => 'settings.periods',
                            'showName' => 'content.periods',
                            'menu_id' => '18',
                            'route' => null,
                            'icon' => 'fa fa-circle-o',
                        ]);

                        // 32

                        DB::table('menus')->insert([
                            'code' => 'settings.shifts',
                            'showName' => 'content.shifts',
                            'menu_id' => '18',
                            'route' => 'turns.index',
                            'icon' => 'fa fa-circle-o',
                        ]);

                        // 33

                        DB::table('menus')->insert([
                            'code' => 'settings.equipments',
                            'showName' => 'content.equipments',
                            'menu_id' => '18',
                            'route' => 'equipments.index',
                            'icon' => 'fa fa-circle-o',
                        ]);

        // Production Menu 

        // 34

        DB::table('menus')->insert([
            'code' => 'production',
            'showName' => 'content.production',
            'route' => null,
            'icon' => 'fa fa-industry',
        ]);

                        // 35

                        DB::table('menus')->insert([
                            'code' => 'production.workbook',
                            'showName' => 'content.workbook',
                            'menu_id' => '34',
                            'route' => null,
                            'icon' => 'fa fa-book',
                        ]);

                                        // 36

                                        DB::table('menus')->insert([
                                            'code' => 'production.workbook.documents',
                                            'showName' => 'content.documents',
                                            'menu_id' => '35',
                                            'route' => null,
                                            'icon' => 'fa fa-file-text',
                                        ]);

                                                        // 37

                                                        DB::table('menus')->insert([
                                                            'code' => 'production.workbook.documents.folios',
                                                            'showName' => 'content.folios',
                                                            'menu_id' => '36',
                                                            'route' => 'folios.index',
                                                            'icon' => 'fa fa-circle-o',
                                                        ]);

                                                        // 38

                                                        DB::table('menus')->insert([
                                                            'code' => 'production.workbook.documents.dailyReports',
                                                            'showName' => 'content.dailyreports',
                                                            'menu_id' => '36',
                                                            'route' => 'dailyReports.index',
                                                            'icon' => 'fa fa-circle-o',
                                                        ]);

                                                        // 39

                                                        DB::table('menus')->insert([
                                                            'code' => 'production.workbook.documents.notes',
                                                            'showName' => 'content.notes',
                                                            'menu_id' => '36',
                                                            'route' => 'notes.index',
                                                            'icon' => 'fa fa-circle-o',
                                                        ]);

                                        // 40

                                        DB::table('menus')->insert([
                                            'code' => 'production.workbook.reports',
                                            'showName' => 'content.reports',
                                            'menu_id' => '35',
                                            'route' => null,
                                            'icon' => 'fa fa-print',
                                        ]);

                                                        // 41

                                                        DB::table('menus')->insert([
                                                            'code' => 'production.workbook.reports.folios',
                                                            'showName' => 'content.folios',
                                                            'menu_id' => '40',
                                                            'route' => null,
                                                            'icon' => 'fa fa-circle-o',
                                                        ]);

                                                        // 42

                                                        DB::table('menus')->insert([
                                                            'code' => 'production.workbook.reports.dailyReports',
                                                            'showName' => 'content.dailyreports',
                                                            'menu_id' => '40',
                                                            'route' => null,
                                                            'icon' => 'fa fa-circle-o',
                                                        ]);

                                                        // 43

                                                        DB::table('menus')->insert([
                                                            'code' => 'production.workbook.reports.notes',
                                                            'showName' => 'content.notes',
                                                            'menu_id' => '40',
                                                            'route' => null,
                                                            'icon' => 'fa fa-circle-o',
                                                        ]);

                                        // 44
                                        
                                        DB::table('menus')->insert([
                                            'code' => 'production.workbook.settings',
                                            'showName' => 'content.settings',
                                            'menu_id' => '35',
                                            'route' => null,
                                            'icon' => 'fa fa-cogs',
                                        ]);

                                                        // 45

                                                        DB::table('menus')->insert([
                                                            'code' => 'production.workbook.settings.users',
                                                            'showName' => 'content.users',
                                                            'menu_id' => '44',
                                                            'route' => 'workbook_settings_users',
                                                            'icon' => 'fa fa-circle-o',
                                                        ]);

                                                        // 46

                                                        DB::table('menus')->insert([
                                                            'code' => 'production.workbook.settings.locations',
                                                            'showName' => 'content.locations',
                                                            'menu_id' => '44',
                                                            'route' => 'workbook_settings_locations',
                                                            'icon' => 'fa fa-circle-o',
                                                        ]);

        // Commercial Menu
        
        // 47

        DB::table('menus')->insert([
            'code' => 'commercial',
            'showName' => 'content.commercial',
            'route' => null,
            'icon' => 'fa fa-money',
        ]);

                        // 48
                        
                        DB::table('menus')->insert([
                            'code' => 'commercial.purchases',
                            'showName' => 'content.purchases',
                            'menu_id' => '47',
                            'route' => null,
                            'icon' => 'fa fa-shopping-cart',
                        ]);

                                        // 49
                        
                                        DB::table('menus')->insert([
                                            'code' => 'commercial.purchases.orders',
                                            'showName' => 'content.orders',
                                            'menu_id' => '48',
                                            'route' => null,
                                            'icon' => 'fa fa-check-square',
                                        ]);

                                        // 50

                                        DB::table('menus')->insert([
                                            'code' => 'commercial.purchases.agreements',
                                            'showName' => 'content.agreements',
                                            'menu_id' => '48',
                                            'route' => null,
                                            'icon' => 'fa fa-file',
                                        ]);

                                        // 51

                                        DB::table('menus')->insert([
                                            'code' => 'commercial.purchases.reports',
                                            'showName' => 'content.reports',
                                            'menu_id' => '48',
                                            'route' => null,
                                            'icon' => 'fa fa-print',
                                        ]);
                        
                        // 52

                        DB::table('menus')->insert([
                            'code' => 'commercial.warehouse',
                            'showName' => 'content.warehouse',
                            'menu_id' => '47',
                            'route' => null,
                            'icon' => 'fa fa-industry',
                        ]);

                                        // 53

                                        DB::table('menus')->insert([
                                            'code' => 'commercial.warehouse.warehouses',
                                            'showName' => 'content.warehouses',
                                            'menu_id' => '52',
                                            'route' => null,
                                            'icon' => 'fa fa-industry',
                                        ]);

                                        // 54

                                        DB::table('menus')->insert([
                                            'code' => 'commercial.warehouse.materials',
                                            'showName' => 'content.materials',
                                            'menu_id' => '52',
                                            'route' => null,
                                            'icon' => 'fa fa-cubes',
                                        ]);

                                        // 55

                                        DB::table('menus')->insert([
                                            'code' => 'commercial.warehouse.reports',
                                            'showName' => 'content.reports',
                                            'menu_id' => '52',
                                            'route' => null,
                                            'icon' => 'fa fa-print',
                                        ]);

                        // 56

                        DB::table('menus')->insert([
                            'code' => 'commercial.assets',
                            'showName' => 'content.assets',
                            'menu_id' => '47',
                            'route' => null,
                            'icon' => 'fa fa-cube',
                        ]);

                                        DB::table('menus')->insert([
                                            'code' => 'commercial.assets.record',
                                            'showName' => 'content.record',
                                            'menu_id' => '56',
                                            'route' => null,
                                            'icon' => 'fa fa-pencil',
                                        ]);

                                        DB::table('menus')->insert([
                                            'code' => 'commercial.assets.assigments',
                                            'showName' => 'content.assignments',
                                            'menu_id' => '56',
                                            'route' => null,
                                            'icon' => 'fa fa-check-square',
                                        ]);

                                        DB::table('menus')->insert([
                                            'code' => 'commercial.assets.updates',
                                            'showName' => 'content.updates',
                                            'menu_id' => '56',
                                            'route' => null,
                                            'icon' => 'fa fa-refresh',
                                        ]);

                                        DB::table('menus')->insert([
                                            'code' => 'commercial.assets.reports',
                                            'showName' => 'content.reports',
                                            'menu_id' => '56',
                                            'route' => null,
                                            'icon' => 'fa fa-print',
                                        ]);


        // Persons Menu 

        // 61

        DB::table('menus')->insert([
            'code' => 'people',
            'showName' => 'content.people',
            'route' => null,
            'icon' => 'fa fa-user',
        ]);
                        // 62

                        DB::table('menus')->insert([
                            'code' => 'people.record',
                            'showName' => 'content.record',
                            'menu_id' => '61',
                            'route' => null,
                            'icon' => 'fa fa-pencil',
                        ]);

                        // 63

                        DB::table('menus')->insert([
                            'code' => 'people.payroll',
                            'showName' => 'content.payroll',
                            'menu_id' => '61',
                            'route' => null,
                            'icon' => 'fa fa-list',
                        ]);

                        // 64

                        DB::table('menus')->insert([
                            'code' => 'people.timesheet',
                            'showName' => 'content.timesheet',
                            'menu_id' => '61',
                            'route' => null,
                            'icon' => 'fa fa-table',
                        ]);
        
        // Safety & Health Menu 

        // 65

        DB::table('menus')->insert([
            'code' => 'shw',
            'showName' => 'content.safetyAndHealth',
            'route' => null,
            'icon' => 'fa fa-stethoscope',
        ]);

                        // 66

                        DB::table('menus')->insert([
                            'code' => 'shw.ppes',
                            'showName' => 'content.ppes',
                            'menu_id' => '65',
                            'route' => null,
                            'icon' => 'fa fa-medkit',
                        ]);

                                        DB::table('menus')->insert([
                                            'code' => 'shw.ppes.assigments',
                                            'showName' => 'content.assignments',
                                            'menu_id' => '66',
                                            'route' => null,
                                            'icon' => 'fa fa-check-square',
                                        ]);

                                        DB::table('menus')->insert([
                                            'code' => 'shw.ppes.rules',
                                            'showName' => 'content.rules',
                                            'menu_id' => '66',
                                            'route' => null,
                                            'icon' => 'fa fa-list',
                                        ]);

                                        DB::table('menus')->insert([
                                            'code' => 'shw.ppes.reports',
                                            'showName' => 'content.reports',
                                            'menu_id' => '66',
                                            'route' => null,
                                            'icon' => 'fa fa-print',
                                        ]);

                        // 70

                        DB::table('menus')->insert([
                            'code' => 'shw.health',
                            'showName' => 'content.health',
                            'menu_id' => '65',
                            'route' => null,
                            'icon' => 'fa fa-heart',
                        ]);

                                        DB::table('menus')->insert([
                                            'code' => 'shw.health.history',
                                            'showName' => 'content.history',
                                            'menu_id' => '70',
                                            'route' => null,
                                            'icon' => 'fa fa-folder-open',
                                        ]);

                                        DB::table('menus')->insert([
                                            'code' => 'shw.health.record',
                                            'showName' => 'content.record',
                                            'menu_id' => '70',
                                            'route' => null,
                                            'icon' => 'fa fa-list',
                                        ]);

                                        DB::table('menus')->insert([
                                            'code' => 'shw.health.reports',
                                            'showName' => 'content.reports',
                                            'menu_id' => '70',
                                            'route' => null,
                                            'icon' => 'fa fa-print',
                                        ]);

                        // 74

                        DB::table('menus')->insert([
                            'code' => 'shw.access',
                            'showName' => 'content.access',
                            'menu_id' => '65',
                            'route' => null,
                            'icon' => 'fa fa-sign-in',
                        ]);

                                        DB::table('menus')->insert([
                                            'code' => 'shw.access.requirements',
                                            'showName' => 'content.requirements',
                                            'menu_id' => '74',
                                            'route' => null,
                                            'icon' => 'fa fa-list',
                                        ]);

                                        DB::table('menus')->insert([
                                            'code' => 'shw.access.profiles',
                                            'showName' => 'content.profiles',
                                            'menu_id' => '74',
                                            'route' => null,
                                            'icon' => 'fa fa-user',
                                        ]);


                                        DB::table('menus')->insert([
                                            'code' => 'shw.access.organizations',
                                            'showName' => 'content.organizations',
                                            'menu_id' => '74',
                                            'route' => null,
                                            'icon' => 'fa fa-institution',
                                        ]);

                                        DB::table('menus')->insert([
                                            'code' => 'shw.access.checkings',
                                            'showName' => 'content.checkings',
                                            'menu_id' => '74',
                                            'route' => null,
                                            'icon' => 'fa fa-search',
                                        ]);

                                        DB::table('menus')->insert([
                                            'code' => 'shw.access.reports',
                                            'showName' => 'content.reports',
                                            'menu_id' => '74',
                                            'route' => null,
                                            'icon' => 'fa fa-print',
                                        ]);
    }
}
