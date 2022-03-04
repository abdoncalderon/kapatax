<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Auth::routes();

/* Start */
Route::get('/', 'HomeController@project')->name('project');
Route::post('/','HomeController@menu')->name('menu');
Route::get('/main', 'HomeController@index')->name('home');

/********************************************* ADMIN ROUTES *************************************************************** */

/* Routes Gender */
Route::resource('genders','Admin\GenderController');

/* Routes Menus */
Route::resource('menus','Admin\MenuController');
Route::get('/menus/activate/{menu}/{value}','Admin\MenuController@activate')->name('menus.activate');
Route::get('/menus/destroy/{menu}','Admin\MenuController@destroy')->name('menus.destroy');

/* Routes Roles */
Route::resource('roles','Admin\RoleController');
Route::get('/roles/activate/{role}/{value}','Admin\RoleController@activate')->name('roles.activate');
Route::get('/role/destroy/{role}','Admin\RoleController@destroy')->name('roles.destroy');
Route::post('/role/add','Admin\RoleController@add')->name('roles.add');

/* Routes Profiles */
Route::resource('profiles','Admin\ProfileController');

/* Routes Companies */
Route::resource('companies','Admin\CompanyController');
Route::get('/companies/activate/{company}/{value}','Admin\CompanyController@activate')->name('companies.activate');
Route::get('/companies/lock/{company}/{value}','Admin\CompanyController@lock')->name('companies.lock');
Route::get('/companies/destroy/{company}','Admin\CompanyController@destroy')->name('companies.destroy');
Route::post('/companies/add','Admin\CompanyController@add')->name('companies.add');

/* Routes Divisions */
Route::resource('divisions','Admin\DivisionController');
Route::get('/division/destroy/{division}','Admin\DivisionController@destroy')->name('divisions.destroy');
Route::post('/division/add','Admin\DivisionController@add')->name('divisions.add');

/* Routes Subsidiary */
Route::resource('subsidiaries','Admin\SubsidiaryController');
Route::get('/subsidiary/destroy/{subsidiary}','Admin\SubsidiaryController@destroy')->name('subsidiaries.destroy');

/* Routes Regions */
Route::resource('regions','Admin\RegionController');
Route::get('/region/destroy/{region}','Admin\RegionController@destroy')->name('regions.destroy');
Route::post('/region/add','Admin\RegionController@add')->name('regions.add');
Route::get('getCountries/{region}','Admin\RegionController@getCountries')->name('regions.getCountries');
Route::post('/regionsImport','Admin\RegionController@import')->name('regions.import');

/* Routes Countries */
Route::resource('countries','Admin\CountryController');
Route::get('/countries/destroy/{country}','Admin\CountryController@destroy')->name('countries.destroy');
Route::post('/countries/add','Admin\CountryController@add')->name('countries.add');
Route::get('getStates/{country}','Admin\CountryController@getStates')->name('countries.getStates');
Route::post('/countriesImport','Admin\CountryController@import')->name('countries.import');

/* Routes States */
Route::resource('states','Admin\StateController');
Route::get('/states/destroy/{state}','Admin\StateController@destroy')->name('states.destroy');
Route::post('/states/add','Admin\StateController@add')->name('states.add');
Route::get('getCities/{state}','Admin\StateController@getCities')->name('states.getCities');

/* Routes Cities */
Route::resource('cities','Admin\CityController');
Route::get('/cities/destroy/{city}','Admin\CityController@destroy')->name('cities.destroy');
Route::post('/cities/add','Admin\CityController@add')->name('cities.add');

/* Routes Projects */
Route::resource('projects','Admin\ProjectController');
Route::get('/projects/activate/{project}/{value}','Admin\ProjectController@activate')->name('projects.activate');
Route::get('projects/lock/{project}/{value}','Admin\ProjectController@lock')->name('projects.lock');
Route::get('/projects/destroy/{project}','Admin\ProjectController@destroy')->name('projects.destroy');

/* Routes Project Roles  */
Route::get('/projectRoles/{project}','Admin\ProjectRoleController@index')->name('projectRoles.index');
Route::get('/create/projectRole/{project}','Admin\ProjectRoleController@create')->name('projectRoles.create');
Route::post('/projectRoles/{project}','Admin\ProjectRoleController@store')->name('projectRoles.store');
Route::get('/projectRoles/edit/{projectRole}','Admin\ProjectRoleController@edit')->name('projectRoles.edit');
Route::patch('/projectRole/{projectRole}','Admin\ProjectRoleController@update')->name('projectRoles.update');
Route::get('/projectRoles/destroy/{projectRole}','Admin\ProjectRoleController@destroy')->name('projectRoles.destroy');
Route::get('getRoles/{project}','Admin\ProjectRoleController@getRoles')->name('projectRoles.getRoles');

/* Routes Unities */
Route::resource('unities','Admin\UnityController');
Route::get('/unity/destroy/{unity}','Admin\UnityController@destroy')->name('unities.destroy');
Route::post('/unitiesImport','Admin\UnityController@import')->name('unities.import');

/* Routes Brands */
Route::resource('brands','Admin\BrandController');
Route::get('/brand/destroy/{brand}','Admin\BrandController@destroy')->name('brands.destroy');
Route::post('/brands/add','Admin\BrandController@add')->name('brands.add');
Route::post('/brandsImport','Admin\BrandController@import')->name('brands.import');

/* Routes Models */
Route::resource('models','Admin\ModelController');
Route::get('/model/destroy/{model}','Admin\ModelController@destroy')->name('models.destroy');
Route::post('/models/add','Admin\ModelController@add')->name('models.add');

/* Routes Permits */
Route::resource('permits','Admin\PermitController');
Route::get('/permit/destroy/{permit}','Admin\PermitController@destroy')->name('permits.destroy');

/* Routes Roles Permits  */
Route::get('/rolePermits/{role}','Admin\RolePermitController@index')->name('rolePermits.index');
Route::get('/create/permit/{role}','Admin\RolePermitController@create')->name('rolePermits.create');
Route::post('/rolePermits/{role}','Admin\RolePermitController@store')->name('rolePermits.store');
Route::get('/rolePermits/destroy/{rolePermit}','Admin\RolePermitController@destroy')->name('rolePermits.destroy');
Route::get('/rolePermits/activate/{rolePermit}/{value}','Admin\RolePermitController@activate')->name('rolePermits.activate');
Route::post('/cloneRolePermits','Admin\RolePermitController@clone')->name('rolePermits.clone');

/* Routes Roles Menus  */
Route::get('/roleMenus/{role}','Admin\RoleMenuController@index')->name('roleMenus.index');
Route::get('/create/menu/{role}','Admin\RoleMenuController@create')->name('roleMenus.create');
Route::post('/roleMenus/{role}','Admin\RoleMenuController@store')->name('roleMenus.store');
Route::get('/roleMenus/destroy/{roleMenu}','Admin\RoleMenuController@destroy')->name('roleMenus.destroy');
Route::get('/roleMenus/activate/{roleMenu}/{value}','Admin\RoleMenuController@activate')->name('roleMenus.activate');
Route::post('/cloneRoleMenus','Admin\RoleMenuController@clone')->name('roleMenus.clone');
Route::get('setOpen/{roleMenu}','Admin\RoleMenuController@setOpen')->name('roleMenus.setOpen');

/* Routes People */
Route::resource('people','Admin\PersonController');
Route::get('/person/destroy/{person}','Admin\PersonController@destroy')->name('people.destroy');


/* Routes Users */
Route::resource('users','Admin\UserController');
Route::get('/users/activate/{user}/{value}','Admin\UserController@activate')->name('users.activate');
Route::get('/user/destroy/{user}','Admin\UserController@destroy')->name('users.destroy');
Route::post('/users/add','Admin\UserController@add')->name('users.add');

/* Routes User Projects  */
Route::get('/userProjects/{user}','Admin\UserProjectController@index')->name('userProjects.index');
Route::get('/create/userProject/{user}','Admin\UserProjectController@create')->name('userProjects.create');
Route::post('/userProjects/{user}','Admin\UserProjectController@store')->name('userProjects.store');
Route::get('/userProjects/edit/{projectUser}','Admin\UserProjectController@edit')->name('userProjects.edit');
Route::patch('/userProject/{projectUser}','Admin\UserProjectController@update')->name('userProjects.update');
Route::get('/userProjects/destroy/{projectUser}','Admin\UserProjectController@destroy')->name('userProjects.destroy');


/********************************************* SETTING ROUTES *************************************************************** */

/* Routes Project */
Route::get('/project','Setting\ProjectController@index')->name('project.index');
Route::get('/project/show','Setting\ProjectController@show')->name('project.show');
Route::get('/project/edit/{project}','Setting\ProjectController@edit')->name('project.edit');
Route::patch('project/update/{project}','Setting\ProjectController@update')->name('project.update');

/* Routes Functions */
Route::resource('functions','Setting\FunctionController');
Route::get('/functions/destroy/{function}','Setting\FunctionController@destroy')->name('functions.destroy');
Route::post('/function/add','Setting\FunctionController@add')->name('functions.add'); 
Route::post('/functionsImport','Setting\FunctionController@import')->name('functions.import');

/* Routes Sectors */
Route::resource('sectors','Setting\SectorController');
Route::get('/sector/destroy/{sector}','Setting\SectorController@destroy')->name('sectors.destroy');
Route::post('/sector/add','Setting\SectorController@add')->name('sectors.add'); 
Route::post('/sectorsImport','Setting\SectorController@import')->name('sectors.import');

/* Routes Departments */
Route::resource('departments','Setting\DepartmentController');
Route::get('/departments/destroy/{country}','Setting\DepartmentController@destroy')->name('departments.destroy');
Route::post('/department/add','Setting\DepartmentController@add')->name('departments.add');

/* Routes Stakeholders */
Route::resource('stakeholders','Setting\StakeholderController');
Route::get('/stakeholders/destroy/{stakeholder}','Setting\StakeholderController@destroy')->name('stakeholders.destroy'); 

/* Routes Zones */
Route::resource('zones','Setting\ZoneController');
Route::get('/zones/destroy/{zone}','Setting\ZoneController@destroy')->name('zones.destroy');
Route::post('/zones/add','Setting\ZoneController@add')->name('zones.add');
Route::post('/zonesImport','Setting\ZoneController@import')->name('zones.import');

/* Routes Positions */
Route::resource('positions','Setting\PositionController');
Route::get('/position/destroy/{position}','Setting\PositionController@destroy')->name('positions.destroy');

/* Routes Locations */
Route::resource('locations','Setting\LocationController');
Route::get('/location/destroy/{location}','Setting\LocationController@destroy')->name('locations.destroy');

/* Routes Equipments */
Route::resource('equipments','Setting\EquipmentController');
Route::get('/equipment/destroy/{equipment}','Setting\EquipmentController@destroy')->name('equipments.destroy');
Route::post('/equipmentsImport','Setting\EquipmentController@import')->name('equipments.import');

/* Routes Turns */
Route::resource('turns','Setting\TurnController');
Route::get('/turns/destroy/{turn}','Setting\TurnController@destroy')->name('turns.destroy');

/* Routes Families */
Route::resource('families','Setting\FamilyController');
Route::get('/families/destroy/{turn}','Setting\FamilyController@destroy')->name('families.destroy');
Route::post('/families/add','Setting\FamilyController@add')->name('families.add');
Route::post('/familiesImport','Setting\FamilyController@import')->name('families.import');

/* Routes Categories */
Route::resource('categories','Setting\CategoryController');
Route::get('/categories/destroy/{turn}','Setting\CategoryController@destroy')->name('categories.destroy');
Route::post('/categories/add','Setting\CategoryController@add')->name('categories.add');
Route::post('/categoriesImport','Setting\CategoryController@import')->name('categories.import');


/* Routes Project People */
Route::resource('projectPeople','Setting\PersonController');
Route::post('/searchProjectPerson','Setting\PersonController@search')->name('projectPeople.search');

/* Routes StakeholderPeople */
Route::post('/stakeholderPeople','Setting\StakeholderPersonController@store')->name('stakeholderPeople.store');
Route::get('/stakeholderPeople/edit/{stakeholderPerson}','Setting\StakeholderPersonController@edit')->name('stakeholderPeople.edit');
Route::patch('/stakeholderPeople/{stakeholderPerson}','Setting\StakeholderPersonController@update')->name('stakeholderPeople.update');

/* Routes Project Users  */
Route::get('/projectUsers','Setting\ProjectUserController@index')->name('projectUsers.index');
Route::get('/create/project','Setting\ProjectUserController@create')->name('projectUsers.create');
Route::post('/projectUsers','Setting\ProjectUserController@store')->name('projectUsers.store');
Route::get('/projectUsers/destroy/{projectUser}','Setting\ProjectUserController@destroy')->name('projectUsers.destroy');

/*********************************** AGREEMENT ROUTES ************************************************************************* */

/* Routes Folios */
Route::get('folios/{location_id?}','Agreement\FolioController@index')->name('folios.index');
Route::get('create','Agreement\FolioController@create')->name('folios.create');
Route::get('folios/edit/{folio}','Agreement\FolioController@edit')->name('folios.edit');
Route::post('/folios','Agreement\FolioController@store')->name('folios.store');
Route::get('filterFoliosXLocation','Agreement\FolioController@filterLocation')->name('folios.filterLocation');
Route::get('getNumber/{location}','Agreement\FolioController@getNumber')->name('folios.getNumber');
Route::get('folios/print/{folio}','Agreement\FolioController@print')->name('folios.print');
Route::patch('folios/updateNumber/{folio}','Agreement\FolioController@update')->name('folios.update');

/* Routes Locations x User */
Route::get('/locationsUsers/{user}','Agreement\LocationUserController@index')->name('locationsUsers.index');
Route::get('/locationsUsers/create/{user}','Agreement\LocationUserController@create')->name('locationsUsers.create');
Route::post('/locationsUsers/{user}','Agreement\LocationUserController@store')->name('locationsUsers.store');
Route::get('/locationsUsers/edit/{locationUser}','Agreement\LocationUserController@edit')->name('locationsUsers.edit');
Route::patch('/locationsUsers/{locationUser}','Agreement\LocationUserController@update')->name('locationsUsers.update');
Route::get('/locationsUsers/destroy/{locationUser}','Agreement\LocationUserController@destroy')->name('locationsUsers.destroy');

/* Routes Daily Reports */
Route::get('dailyReports/{location_id?}','Agreement\DailyReportController@index')->name('dailyReports.index');
Route::get('filterDailyReportsXLocation','Agreement\DailyReportController@filterLocation')->name('dailyReports.filterLocation');
Route::get('/dailyReports/create/{folio}','Agreement\DailyReportController@create')->name('dailyReports.create');
Route::post('/dailyReports','Agreement\DailyReportController@store')->name('dailyReports.store');
Route::get('/dailyReports/show/{dailyReport}','Agreement\DailyReportController@show')->name('dailyReports.show');
Route::get('/dailyReports/review/{dailyReport}','Agreement\DailyReportController@review')->name('dailyReports.review');
Route::get('/dailyReports/edit/{dailyReport}','Agreement\DailyReportController@edit')->name('dailyReports.edit');
Route::patch('/dailyReports/{dailyReport}','Agreement\DailyReportController@update')->name('dailyReports.update');

/* Routes Equipments x Daily Reports */
Route::post('/equipmentDailyReports','Agreement\EquipmentDailyReportController@store')->name('equipmentDailyReports.store');
Route::get('/equipmentDailyReports/destroy/{equipmentDailyReport}','Agreement\EquipmentDailyReportController@destroy')->name('equipmentDailyReports.destroy');
Route::post('/equipmentDailyReports/clone','Agreement\EquipmentDailyReportController@clone')->name('equipmentDailyReports.clone');

/* Routes Positions x Daily Reports */
Route::post('/positionDailyReports','Agreement\PositionDailyReportController@store')->name('positionDailyReports.store');
Route::get('/positionDailyReports/destroy/{positionDailyReport}','Agreement\PositionDailyReportController@destroy')->name('positionDailyReports.destroy');
Route::post('/positionDailyReports/clone','Agreement\PositionDailyReportController@clone')->name('positionDailyReports.clone');

/* Routes Events x Daily Reports */
Route::post('/eventDailyReports','Agreement\EventDailyReportController@store')->name('eventDailyReports.store');
Route::get('/eventDailyReports/destroy/{eventDailyReport}','Agreement\EventDailyReportController@destroy')->name('eventDailyReports.destroy');

/* Routes Attachments x Daily Reports */
Route::post('/attachmentDailyReports','Agreement\AttachmentDailyReportController@store')->name('attachmentDailyReports.store');
Route::get('/attachmentDailyReports/destroy/{attachmentDailyReport}','Agreement\AttachmentDailyReportController@destroy')->name('attachmentDailyReports.destroy');

/* Routes Comments x Daily Reports */
Route::post('/commentDailyReports','Agreement\CommentDailyReportController@store')->name('commentDailyReports.store');
Route::get('/commentDailyReports/destroy/{commentDailyReport}','Agreement\CommentDailyReportController@destroy')->name('commentDailyReports.destroy');

/* Routes Notes */
Route::get('notes/{location_id?}','Agreement\NoteController@index')->name('notes.index');
Route::get('filterNotesXLocation','Agreement\NoteController@filterLocation')->name('notes.filterLocation');
Route::get('/notes/create/{folio}','Agreement\NoteController@create')->name('notes.create');
Route::post('/notes','Agreement\NoteController@store')->name('notes.store');
Route::get('/notes/show/{note}','Agreement\NoteController@show')->name('notes.show');
Route::get('/notes/edit/{note}','Agreement\NoteController@edit')->name('notes.edit');
Route::patch('/notes/{note}','Agreement\NoteController@update')->name('notes.update');

/* Routes Attachments x Note */
Route::post('/attachmentNotes','Agreement\AttachmentNoteController@store')->name('attachmentNotes.store');
Route::get('/attachmentNotes/destroy/{attachmentNote}','Agreement\AttachmentNoteController@destroy')->name('attachmentNotes.destroy');

/* Routes Comments x Note */
Route::post('/commentNotes','Agreement\CommentNoteController@store')->name('commentNotes.store');
Route::get('/commentNotes/destroy/{commentNote}','Agreement\CommentNoteController@destroy')->name('commentNotes.destroy');

/* Routes Turns x Location */
Route::get('/locationTurns/{location}','Agreement\LocationTurnController@index')->name('locationTurns.index');
Route::get('/locationTurns/create/{location}','Agreement\LocationTurnController@create')->name('locationTurns.create');
Route::post('/locationTurns/{location}','Agreement\LocationTurnController@store')->name('locationTurns.store');
Route::get('/locationTurns/edit/{turnlocation}','Agreement\LocationTurnController@edit')->name('locationTurns.edit');
Route::patch('/locationTurns/{turnlocation}','Agreement\LocationTurnController@update')->name('locationTurns.update');
Route::get('/locationTurns/destroy/{turnlocation}','Agreement\LocationTurnController@destroy')->name('locationTurns.destroy');

/* Routes Workbook Users */
Route::get('/workbookUsers','Agreement\UserController@index')->name('workbook_settings_users');

/* Routes Workbook Users */
Route::get('/workbookLocations','Agreement\LocationController@index')->name('workbook_settings_locations');
Route::get('/workbookLocations/create','Agreement\LocationController@create')->name('workbook_settings_locations_create');
Route::post('/workbookLocations','Agreement\LocationController@store')->name('workbook_settings_locations_store');
Route::get('/workbookLocations/{location}','Agreement\LocationController@show')->name('workbook_settings_locations_show');
Route::get('/workbookLocations/edit/{location}','Agreement\LocationController@edit')->name('workbook_settings_locations_edit');
Route::patch('/workbookLocations/{location}','Agreement\LocationController@update')->name('workbook_settings_locations_update');
Route::get('/workbookLocations/destroy/{location}','Agreement\LocationController@destroy')->name('workbook_settings_locations_destroy');

/*********************************** PEOPLE ROUTES ************************************************************************* */








