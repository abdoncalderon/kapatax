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
        // Settings Menu

        DB::table('menus')->insert([
            'code' => 'settings',
            'showName' => 'content.settings',
            'route' => null,
            'icon' => 'fa fa-cogs',
        ]);

                        DB::table('menus')->insert([
                            'code' => 'settings.regions',
                            'showName' => 'content.regions',
                            'father' => 'settings',
                            'route' => 'regions.index',
                            'icon' => 'fa fa-circle-o',
                        ]);

                        DB::table('menus')->insert([
                            'code' => 'settings.countries',
                            'showName' => 'content.countries',
                            'father' => 'settings',
                            'route' => 'countries.index',
                            'icon' => 'fa fa-circle-o',
                        ]);

                        DB::table('menus')->insert([
                            'code' => 'settings.states',
                            'showName' => 'content.states',
                            'father' => 'settings',
                            'route' => 'states.index',
                            'icon' => 'fa fa-circle-o',
                        ]);

                        DB::table('menus')->insert([
                            'code' => 'settings.cities',
                            'showName' => 'content.cities',
                            'father' => 'settings',
                            'route' => 'cities.index',
                            'icon' => 'fa fa-circle-o',
                        ]);

                        DB::table('menus')->insert([
                            'code' => 'settings.companies',
                            'showName' => 'content.companies',
                            'father' => 'settings',
                            'route' => 'companies.index',
                            'icon' => 'fa fa-circle-o',
                        ]);

                        DB::table('menus')->insert([
                            'code' => 'settings.divisions',
                            'showName' => 'content.divisions',
                            'father' => 'settings',
                            'route' => 'divisions.index',
                            'icon' => 'fa fa-circle-o',
                        ]);

                        DB::table('menus')->insert([
                            'code' => 'settings.subsidiaries',
                            'showName' => 'content.subsidiaries',
                            'father' => 'settings',
                            'route' => 'subsidiaries.index',
                            'icon' => 'fa fa-circle-o',
                        ]);

                        DB::table('menus')->insert([
                            'code' => 'settings.roles',
                            'showName' => 'content.roles',
                            'father' => 'settings',
                            'route' => 'roles.index',
                            'icon' => 'fa fa-circle-o',
                        ]);
                        
                        DB::table('menus')->insert([
                            'code' => 'settings.projects',
                            'showName' => 'content.projects',
                            'father' => 'settings',
                            'route' => 'projects.index',
                            'icon' => 'fa fa-circle-o',
                        ]);

                        DB::table('menus')->insert([
                            'code' => 'settings.menus',
                            'showName' => 'content.menus',
                            'father' => 'settings',
                            'route' => 'menus.index',
                            'icon' => 'fa fa-circle-o',
                        ]);

                        DB::table('menus')->insert([
                            'code' => 'settings.permits',
                            'showName' => 'content.permits',
                            'father' => 'settings',
                            'route' => 'permits.index',
                            'icon' => 'fa fa-circle-o',
                        ]);

                        DB::table('menus')->insert([
                            'code' => 'settings.brands',
                            'showName' => 'content.brands',
                            'father' => 'settings',
                            'route' => 'brands.index',
                            'icon' => 'fa fa-circle-o',
                        ]);

                        DB::table('menus')->insert([
                            'code' => 'settings.models',
                            'showName' => 'content.models',
                            'father' => 'settings',
                            'route' => 'models.index',
                            'icon' => 'fa fa-circle-o',
                        ]);

                        DB::table('menus')->insert([
                            'code' => 'settings.unities',
                            'showName' => 'content.unities',
                            'father' => 'settings',
                            'route' => 'unities.index',
                            'icon' => 'fa fa-circle-o',
                        ]);

                        DB::table('menus')->insert([
                            'code' => 'settings.parameters',
                            'showName' => 'content.parameters',
                            'father' => 'settings',
                            'route' => 'settings.parameters.index',
                            'icon' => 'fa fa-circle-o',
                        ]);

        // Project Menu

        DB::table('menus')->insert([
            'code' => 'project',
            'showName' => 'content.project',
            'route' => null,
            'icon' => 'fa fa-sliders',
        ]);

                        DB::table('menus')->insert([
                            'code' => 'project.data',
                            'showName' => 'content.data',
                            'father' => 'project',
                            'route' => 'project.index',
                            'icon' => 'fa fa-circle-o',
                        ]);

                        DB::table('menus')->insert([
                            'code' => 'project.stakeholders',
                            'showName' => 'content.stakeholders',
                            'father' => 'project',
                            'route' => 'stakeholders.index',
                            'icon' => 'fa fa-circle-o',
                        ]);

                        DB::table('menus')->insert([
                            'code' => 'project.functions',
                            'showName' => 'content.functions',
                            'father' => 'project',
                            'route' => 'functions.index',
                            'icon' => 'fa fa-circle-o',
                        ]);

                        DB::table('menus')->insert([
                            'code' => 'project.positions',
                            'showName' => 'content.positions',
                            'father' => 'project',
                            'route' => 'positions.index',
                            'icon' => 'fa fa-circle-o',
                        ]);

                        DB::table('menus')->insert([
                            'code' => 'project.sectors',
                            'showName' => 'content.sectors',
                            'father' => 'project',
                            'route' => 'sectors.index',
                            'icon' => 'fa fa-circle-o',
                        ]);

                        DB::table('menus')->insert([
                            'code' => 'project.departments',
                            'showName' => 'content.departments',
                            'father' => 'project',
                            'route' => 'departments.index',
                            'icon' => 'fa fa-circle-o',
                        ]);

                        DB::table('menus')->insert([
                            'code' => 'project.zones',
                            'showName' => 'content.zones',
                            'father' => 'project',
                            'route' => 'zones.index',
                            'icon' => 'fa fa-circle-o',
                        ]);

                        DB::table('menus')->insert([
                            'code' => 'project.locations',
                            'showName' => 'content.locations',
                            'father' => 'project',
                            'route' => 'locations.index',
                            'icon' => 'fa fa-circle-o',
                        ]);

                        DB::table('menus')->insert([
                            'code' => 'project.equipments',
                            'showName' => 'content.equipments',
                            'father' => 'project',
                            'route' => 'equipments.index',
                            'icon' => 'fa fa-circle-o',
                        ]);
                        
                        DB::table('menus')->insert([
                            'code' => 'project.projectUsers',
                            'showName' => 'content.users',
                            'father' => 'project',
                            'route' => 'projectUsers.index',
                            'icon' => 'fa fa-circle-o',
                        ]);

                        DB::table('menus')->insert([
                            'code' => 'project.families',
                            'showName' => 'content.families',
                            'father' => 'project',
                            'route' => 'families.index',
                            'icon' => 'fa fa-circle-o',
                        ]);

                        DB::table('menus')->insert([
                            'code' => 'project.categories',
                            'showName' => 'content.categories',
                            'father' => 'project',
                            'route' => 'categories.index',
                            'icon' => 'fa fa-circle-o',
                        ]);

                        DB::table('menus')->insert([
                            'code' => 'project.periods',
                            'showName' => 'content.periods',
                            'father' => 'project',
                            'route' => null,
                            'icon' => 'fa fa-circle-o',
                        ]);

                        DB::table('menus')->insert([
                            'code' => 'project.shifts',
                            'showName' => 'content.shifts',
                            'father' => 'project',
                            'route' => 'turns.index',
                            'icon' => 'fa fa-circle-o',
                        ]);

                        DB::table('menus')->insert([
                            'code' => 'project.parameters',
                            'showName' => 'content.parameters',
                            'father' => 'project',
                            'route' => 'project.parameters.index',
                            'icon' => 'fa fa-circle-o',
                        ]);

                        

        // Administration Menu 

        DB::table('menus')->insert([
            'code' => 'administration',
            'showName' => 'content.administration',
            'route' => null,
            'icon' => 'fa fa-calendar',
        ]);

                        DB::table('menus')->insert([
                            'code' => 'administration.technology',
                            'showName' => 'content.technology',
                            'father' => 'administration',
                            'route' => null,
                            'icon' => 'fa fa-laptop',
                        ]);

                                        DB::table('menus')->insert([
                                            'code' => 'administration.technology.requests',
                                            'showName' => 'content.requests',
                                            'father' => 'administration.technology',
                                            'route' => null,
                                            'icon' => 'fa fa-ticket',
                                        ]);

                                        DB::table('menus')->insert([
                                            'code' => 'administration.technology.assignments.',
                                            'showName' => 'content.assignments',
                                            'father' => 'administration.technology',
                                            'route' => 'technology.stakeholderPeople.index',
                                            'icon' => 'fa fa-laptop',
                                        ]);

                        DB::table('menus')->insert([
                            'code' => 'administration.services',
                            'showName' => 'content.services',
                            'father' => 'administration',
                            'route' => null,
                            'icon' => 'fa fa-support',
                        ]);

                                        DB::table('menus')->insert([
                                            'code' => 'administration.services.requests',
                                            'showName' => 'content.requests',
                                            'father' => 'administration.services',
                                            'route' => null,
                                            'icon' => 'fa fa-ticket',
                                        ]);

                                        DB::table('menus')->insert([
                                            'code' => 'administration.services.catering',
                                            'showName' => 'content.catering',
                                            'father' => 'administration.services',
                                            'route' => null,
                                            'icon' => 'fa fa-cutlery',
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
                            'father' => 'production',
                            'route' => null,
                            'icon' => 'fa fa-book',
                        ]);

                                        DB::table('menus')->insert([
                                            'code' => 'production.workbook.documents',
                                            'showName' => 'content.documents',
                                            'father' => 'production.workbook',
                                            'route' => null,
                                            'icon' => 'fa fa-file-text',
                                        ]);

                                                        DB::table('menus')->insert([
                                                            'code' => 'production.workbook.documents.folios',
                                                            'showName' => 'content.folios',
                                                            'father' => 'production.workbook.documents',
                                                            'route' => 'folios.index',
                                                            'icon' => 'fa fa-circle-o',
                                                        ]);

                                                        DB::table('menus')->insert([
                                                            'code' => 'production.workbook.documents.dailyReports',
                                                            'showName' => 'content.dailyreports',
                                                            'father' => 'production.workbook.documents',
                                                            'route' => 'dailyReports.index',
                                                            'icon' => 'fa fa-circle-o',
                                                        ]);

                                                        DB::table('menus')->insert([
                                                            'code' => 'production.workbook.documents.notes',
                                                            'showName' => 'content.notes',
                                                            'father' => 'production.workbook.documents',
                                                            'route' => 'notes.index',
                                                            'icon' => 'fa fa-circle-o',
                                                        ]);

                                        DB::table('menus')->insert([
                                            'code' => 'production.workbook.reports',
                                            'showName' => 'content.reports',
                                            'father' => 'production.workbook',
                                            'route' => null,
                                            'icon' => 'fa fa-print',
                                        ]);

                                                        DB::table('menus')->insert([
                                                            'code' => 'production.workbook.reports.folios',
                                                            'showName' => 'content.folios',
                                                            'father' => 'production.workbook.reports',
                                                            'route' => null,
                                                            'icon' => 'fa fa-circle-o',
                                                        ]);

                                                        DB::table('menus')->insert([
                                                            'code' => 'production.workbook.reports.dailyReports',
                                                            'showName' => 'content.dailyreports',
                                                            'father' => 'production.workbook.reports',
                                                            'route' => null,
                                                            'icon' => 'fa fa-circle-o',
                                                        ]);

                                                        DB::table('menus')->insert([
                                                            'code' => 'production.workbook.reports.notes',
                                                            'showName' => 'content.notes',
                                                            'father' => 'production.workbook.reports',
                                                            'route' => null,
                                                            'icon' => 'fa fa-circle-o',
                                                        ]);

                                        DB::table('menus')->insert([
                                            'code' => 'production.workbook.settings',
                                            'showName' => 'content.settings',
                                            'father' => 'production.workbook',
                                            'route' => null,
                                            'icon' => 'fa fa-cogs',
                                        ]);

                                                        DB::table('menus')->insert([
                                                            'code' => 'production.workbook.settings.users',
                                                            'showName' => 'content.users',
                                                            'father' => 'production.workbook.settings',
                                                            'route' => 'workbook_settings_users',
                                                            'icon' => 'fa fa-circle-o',
                                                        ]);

                                                        DB::table('menus')->insert([
                                                            'code' => 'production.workbook.settings.locations',
                                                            'showName' => 'content.locations',
                                                            'father' => 'production.workbook.settings',
                                                            'route' => 'workbook_settings_locations',
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
                            'code' => 'commercial.controls',
                            'showName' => 'content.controls',
                            'father' => 'commercial',
                            'route' => null,
                            'icon' => 'fa fa-check-square-o',
                        ]);

                                        DB::table('menus')->insert([
                                            'code' => 'commercial.controls.needRequests',
                                            'showName' => 'messages.needRequests',
                                            'father' => 'commercial.controls',
                                            'route' => 'needRequests.index',
                                            'icon' => 'fa fa-list',
                                        ]);

                                        DB::table('menus')->insert([
                                            'code' => 'commercial.controls.receptions',
                                            'showName' => 'content.receptions',
                                            'father' => 'commercial.controls',
                                            'route' => 'receptions.index',
                                            'icon' => 'fa fa-inbox',
                                        ]);

                                        DB::table('menus')->insert([
                                            'code' => 'commercial.controls.destocking',
                                            'showName' => 'content.destocking',
                                            'father' => 'commercial.controls',
                                            'route' => 'destockingRequests.index',
                                            'icon' => 'fa fa-arrow-left',
                                        ]);



                        DB::table('menus')->insert([
                            'code' => 'commercial.materials',
                            'showName' => 'content.materials',
                            'father' => 'commercial',
                            'route' => null,
                            'icon' => 'fa fa-cubes',
                        ]);

                                        DB::table('menus')->insert([
                                            'code' => 'commercial.materials.record',
                                            'showName' => 'content.record',
                                            'father' => 'commercial.materials',
                                            'route' => 'materials.index',
                                            'icon' => 'fa fa-pencil',
                                        ]);

                                        DB::table('menus')->insert([
                                            'code' => 'commercial.materials.stockingUp',
                                            'showName' => 'messages.stockingUp',
                                            'father' => 'commercial.materials',
                                            'route' => null,
                                            'icon' => 'fa fa-arrow-right',
                                        ]);

                                        DB::table('menus')->insert([
                                            'code' => 'commercial.materials.reports',
                                            'showName' => 'content.reports',
                                            'father' => 'commercial.materials',
                                            'route' => null,
                                            'icon' => 'fa fa-print',
                                        ]);

                        DB::table('menus')->insert([
                            'code' => 'commercial.purchases',
                            'showName' => 'content.purchases',
                            'father' => 'commercial',
                            'route' => null,
                            'icon' => 'fa fa-shopping-cart',
                        ]);

                                        DB::table('menus')->insert([
                                            'code' => 'commercial.purchases.purchaseRequests',
                                            'showName' => 'messages.purchaseRequests',
                                            'father' => 'commercial.purchases',
                                            'route' => 'purchaseRequests.index',
                                            'icon' => 'fa fa-check-square',
                                        ]);

                                        DB::table('menus')->insert([
                                            'code' => 'commercial.purchases.quotations',
                                            'showName' => 'content.quotations',
                                            'father' => 'commercial.purchases',
                                            'route' => 'quotations.index',
                                            'icon' => 'fa fa-money',
                                        ]);
                                        
                                        DB::table('menus')->insert([
                                            'code' => 'commercial.purchases.purchaseOrders',
                                            'showName' => 'messages.purchaseOrders',
                                            'father' => 'commercial.purchases',
                                            'route' => 'purchaseOrders.index',
                                            'icon' => 'fa fa-file-text-o',
                                        ]);

                                        DB::table('menus')->insert([
                                            'code' => 'commercial.purchases.reports',
                                            'showName' => 'content.reports',
                                            'father' => 'commercial.purchases',
                                            'route' => null,
                                            'icon' => 'fa fa-print',
                                        ]);

                        /* DB::table('menus')->insert([
                            'code' => 'commercial.contracts',
                            'showName' => 'content.contracts',
                            'father' => 'commercial',
                            'route' => null,
                            'icon' => 'fa fa-bookmark',
                        ]);

                                        DB::table('menus')->insert([
                                            'code' => 'commercial.contracts.serviceRequests',
                                            'showName' => 'messages.serviceRequests',
                                            'father' => 'commercial.contracts',
                                            'route' => 'serviceRequests.index',
                                            'icon' => 'fa fa-check-square',
                                        ]);

                                        DB::table('menus')->insert([
                                            'code' => 'commercial.purchases.proposals',
                                            'showName' => 'content.proposals',
                                            'father' => 'commercial.contracts',
                                            'route' => 'serviceProposals.index',
                                            'icon' => 'fa fa-money',
                                        ]);

                                        DB::table('menus')->insert([
                                            'code' => 'commercial.contracts.serviceOrders',
                                            'showName' => 'messages.serviceOrders',
                                            'father' => 'commercial.contracts',
                                            'route' => 'purchaseOrders.index',
                                            'icon' => 'fa fa-file-text-o',
                                        ]);

                                        DB::table('menus')->insert([
                                            'code' => 'commercial.contracts.reports',
                                            'showName' => 'content.reports',
                                            'father' => 'commercial.contracts',
                                            'route' => null,
                                            'icon' => 'fa fa-print',
                                        ]); */
                        
                        DB::table('menus')->insert([
                            'code' => 'commercial.warehouses',
                            'showName' => 'content.warehouses',
                            'father' => 'commercial',
                            'route' => null,
                            'icon' => 'fa fa-industry',
                        ]);             

                                        DB::table('menus')->insert([
                                            'code' => 'commercial.warehouses.record',
                                            'showName' => 'content.record',
                                            'father' => 'commercial.warehouses',
                                            'route' => 'warehouses.index',
                                            'icon' => 'fa fa-pencil',
                                        ]);

                                        DB::table('menus')->insert([
                                            'code' => 'commercial.warehouses.reports',
                                            'showName' => 'content.reports',
                                            'father' => 'commercial.warehouses',
                                            'route' => null,
                                            'icon' => 'fa fa-print',
                                        ]);

                        DB::table('menus')->insert([
                            'code' => 'commercial.assets',
                            'showName' => 'content.assets',
                            'father' => 'commercial',
                            'route' => null,
                            'icon' => 'fa fa-cube',
                        ]);

                                        DB::table('menus')->insert([
                                            'code' => 'commercial.assets.record',
                                            'showName' => 'content.record',
                                            'father' => 'commercial.assets',
                                            'route' => null,
                                            'icon' => 'fa fa-pencil',
                                        ]);

                                        DB::table('menus')->insert([
                                            'code' => 'commercial.assets.assignments',
                                            'showName' => 'content.assignments',
                                            'father' => 'commercial.assets',
                                            'route' => null,
                                            'icon' => 'fa fa-check-square',
                                        ]);

                                        DB::table('menus')->insert([
                                            'code' => 'commercial.assets.updates',
                                            'showName' => 'content.updates',
                                            'father' => 'commercial.assets',
                                            'route' => null,
                                            'icon' => 'fa fa-refresh',
                                        ]);

                                        DB::table('menus')->insert([
                                            'code' => 'commercial.assets.reports',
                                            'showName' => 'content.reports',
                                            'father' => 'commercial.assets',
                                            'route' => null,
                                            'icon' => 'fa fa-print',
                                        ]);


        // Persons Menu 

        DB::table('menus')->insert([
            'code' => 'people',
            'showName' => 'content.people',
            'route' => null,
            'icon' => 'fa fa-user',
        ]);
                        DB::table('menus')->insert([
                            'code' => 'people.record',
                            'showName' => 'content.record',
                            'father' => 'people',
                            'route' => 'people.index',
                            'icon' => 'fa fa-pencil',
                        ]);

                        DB::table('menus')->insert([
                            'code' => 'people.payroll',
                            'showName' => 'content.payroll',
                            'father' => 'people',
                            'route' => 'employees.index',
                            'icon' => 'fa fa-list',
                        ]);

                        DB::table('menus')->insert([
                            'code' => 'people.timesheet',
                            'showName' => 'content.timesheet',
                            'father' => 'people',
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
                            'father' => 'shw',
                            'route' => null,
                            'icon' => 'fa fa-medkit',
                        ]);

                                        DB::table('menus')->insert([
                                            'code' => 'shw.ppes.assignments',
                                            'showName' => 'content.assignments',
                                            'father' => 'shw.ppes',
                                            'route' => null,
                                            'icon' => 'fa fa-check-square',
                                        ]);

                                        DB::table('menus')->insert([
                                            'code' => 'shw.ppes.rules',
                                            'showName' => 'content.rules',
                                            'father' => 'shw.ppes',
                                            'route' => null,
                                            'icon' => 'fa fa-list',
                                        ]);

                                        DB::table('menus')->insert([
                                            'code' => 'shw.ppes.reports',
                                            'showName' => 'content.reports',
                                            'father' => 'shw.ppes',
                                            'route' => null,
                                            'icon' => 'fa fa-print',
                                        ]);

                        DB::table('menus')->insert([
                            'code' => 'shw.health',
                            'showName' => 'content.health',
                            'father' => 'shw',
                            'route' => null,
                            'icon' => 'fa fa-heart',
                        ]);

                                        DB::table('menus')->insert([
                                            'code' => 'shw.health.history',
                                            'showName' => 'content.history',
                                            'father' => 'shw.health',
                                            'route' => null,
                                            'icon' => 'fa fa-folder-open',
                                        ]);

                                        DB::table('menus')->insert([
                                            'code' => 'shw.health.record',
                                            'showName' => 'content.record',
                                            'father' => 'shw.health',
                                            'route' => null,
                                            'icon' => 'fa fa-list',
                                        ]);

                                        DB::table('menus')->insert([
                                            'code' => 'shw.health.reports',
                                            'showName' => 'content.reports',
                                            'father' => 'shw.health',
                                            'route' => null,
                                            'icon' => 'fa fa-print',
                                        ]);

                        DB::table('menus')->insert([
                            'code' => 'shw.access',
                            'showName' => 'content.access',
                            'father' => 'shw',
                            'route' => null,
                            'icon' => 'fa fa-sign-in',
                        ]);

                                        DB::table('menus')->insert([
                                            'code' => 'shw.access.requirements',
                                            'showName' => 'content.requirements',
                                            'father' => 'shw.access',
                                            'route' => null,
                                            'icon' => 'fa fa-list',
                                        ]);

                                        DB::table('menus')->insert([
                                            'code' => 'shw.access.profiles',
                                            'showName' => 'content.profiles',
                                            'father' => 'shw.access',
                                            'route' => null,
                                            'icon' => 'fa fa-user',
                                        ]);


                                        DB::table('menus')->insert([
                                            'code' => 'shw.access.organizations',
                                            'showName' => 'content.organizations',
                                            'father' => 'shw.access',
                                            'route' => null,
                                            'icon' => 'fa fa-institution',
                                        ]);

                                        DB::table('menus')->insert([
                                            'code' => 'shw.access.checkings',
                                            'showName' => 'content.checkings',
                                            'father' => 'shw.access',
                                            'route' => null,
                                            'icon' => 'fa fa-search',
                                        ]);

                                        DB::table('menus')->insert([
                                            'code' => 'shw.access.reports',
                                            'showName' => 'content.reports',
                                            'father' => 'shw.access',
                                            'route' => null,
                                            'icon' => 'fa fa-print',
                                        ]);
    }
}
