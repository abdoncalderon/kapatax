<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Auth::routes();

/* Start */
Route::get('/', 'HomeController@project')->name('project');
Route::post('/','HomeController@menu')->name('menu');
Route::get('/main', 'HomeController@index')->name('home');

/********************************************* SESSION ROUTES *************************************************************** */

/* Routes My Need Requests */
Route::resource('myNeedRequests','Session\NeedRequestController');
Route::get('/myNeedRequests/modify/{myNeedRequest}','Session\NeedRequestController@modify')->name('myNeedRequests.modify');
Route::get('/myNeedRequests/destroy/{myNeedRequest}','Session\NeedRequestController@destroy')->name('myNeedRequests.destroy');

/* Routes My Need Requests Items */
Route::resource('myNeedRequestItems','Session\NeedRequestItemController');
Route::get('/myNeedRequestItems/destroy/{myNeedRequestItem}','Session\NeedRequestItemController@destroy')->name('myNeedRequestItems.destroy');

/********************************************* SETTINGS ROUTES *************************************************************** */

/* Routes Genders */
Route::resource('genders','Settings\GenderController');

/* Route Parameters */
Route::get('/settings/parameters','Settings\ParameterController@index')->name('settings.parameters.index');
Route::post('/regionsImport','Settings\ParameterController@regionsImport')->name('parameters.regionsImport');
Route::post('/countriesImport','Settings\ParameterController@countriesImport')->name('parameters.countriesImport');
Route::post('/statesImport','Settings\ParameterController@statesImport')->name('parameters.statesImport');
Route::post('/citiesImport','Settings\ParameterController@citiesImport')->name('parameters.citiesImport');
Route::post('/brandsImport','Settings\ParameterController@brandsImport')->name('parameters.brandsImport');
Route::post('/modelsImport','Settings\ParameterController@modelsImport')->name('parameters.modelsImport');
Route::post('/unitiesImport','Settings\ParameterController@unitiesImport')->name('parameters.unitiesImport');

/* Routes Menus */
Route::resource('menus','Settings\MenuController');
Route::get('/menus/activate/{menu}/{value}','Settings\MenuController@activate')->name('menus.activate');
Route::get('/menus/destroy/{menu}','Settings\MenuController@destroy')->name('menus.destroy');

/* Routes Roles */
Route::resource('roles','Settings\RoleController');
Route::get('/roles/activate/{role}/{value}','Settings\RoleController@activate')->name('roles.activate');
Route::get('/role/destroy/{role}','Settings\RoleController@destroy')->name('roles.destroy');
Route::post('/role/add','Settings\RoleController@add')->name('roles.add');

/* Routes Profiles */
Route::resource('profiles','Settings\ProfileController');

/* Routes Companies */
Route::resource('companies','Settings\CompanyController');
Route::get('/companies/activate/{company}/{value}','Settings\CompanyController@activate')->name('companies.activate');
Route::get('/companies/lock/{company}/{value}','Settings\CompanyController@lock')->name('companies.lock');
Route::get('/companies/destroy/{company}','Settings\CompanyController@destroy')->name('companies.destroy');
Route::post('/companies/add','Settings\CompanyController@add')->name('companies.add');

/* Routes Divisions */
Route::resource('divisions','Settings\DivisionController');
Route::get('/division/destroy/{division}','Settings\DivisionController@destroy')->name('divisions.destroy');
Route::post('/division/add','Settings\DivisionController@add')->name('divisions.add');

/* Routes Subsidiary */
Route::resource('subsidiaries','Settings\SubsidiaryController');
Route::get('/subsidiary/destroy/{subsidiary}','Settings\SubsidiaryController@destroy')->name('subsidiaries.destroy');

/* Routes Regions */
Route::resource('regions','Settings\RegionController');
Route::get('/region/destroy/{region}','Settings\RegionController@destroy')->name('regions.destroy');
Route::post('/region/add','Settings\RegionController@add')->name('regions.add');
Route::get('getCountries/{region}','Settings\RegionController@getCountries')->name('regions.getCountries');

/* Routes Countries */
Route::resource('countries','Settings\CountryController');
Route::get('/countries/destroy/{country}','Settings\CountryController@destroy')->name('countries.destroy');
Route::post('/countries/add','Settings\CountryController@add')->name('countries.add');
Route::get('getStates/{country}','Settings\CountryController@getStates')->name('countries.getStates');

/* Routes States */
Route::resource('states','Settings\StateController');
Route::get('/states/destroy/{state}','Settings\StateController@destroy')->name('states.destroy');
Route::post('/states/add','Settings\StateController@add')->name('states.add');
Route::get('getCities/{state}','Settings\StateController@getCities')->name('states.getCities');

/* Routes Cities */
Route::resource('cities','Settings\CityController');
Route::get('/cities/destroy/{city}','Settings\CityController@destroy')->name('cities.destroy');
Route::post('/cities/add','Settings\CityController@add')->name('cities.add');

/* Routes Projects */
Route::resource('projects','Settings\ProjectController');
Route::get('/projects/activate/{project}/{value}','Settings\ProjectController@activate')->name('projects.activate');
Route::get('projects/lock/{project}/{value}','Settings\ProjectController@lock')->name('projects.lock');
Route::get('/projects/destroy/{project}','Settings\ProjectController@destroy')->name('projects.destroy');

/* Routes Project Roles  */
Route::get('/projectRoles/{project}','Settings\ProjectRoleController@index')->name('projectRoles.index');
Route::get('/create/projectRole/{project}','Settings\ProjectRoleController@create')->name('projectRoles.create');
Route::post('/projectRoles/{project}','Settings\ProjectRoleController@store')->name('projectRoles.store');
Route::get('/projectRoles/edit/{projectRole}','Settings\ProjectRoleController@edit')->name('projectRoles.edit');
Route::patch('/projectRole/{projectRole}','Settings\ProjectRoleController@update')->name('projectRoles.update');
Route::get('/projectRoles/destroy/{projectRole}','Settings\ProjectRoleController@destroy')->name('projectRoles.destroy');
Route::get('getRoles/{project}','Settings\ProjectRoleController@getRoles')->name('projectRoles.getRoles');

/* Routes Unities */
Route::resource('unities','Settings\UnityController');
Route::get('/unity/destroy/{unity}','Settings\UnityController@destroy')->name('unities.destroy');
Route::post('/unities/add','Settings\UnityController@add')->name('unities.add');

/* Routes Brands */
Route::resource('brands','Settings\BrandController');
Route::get('/brand/destroy/{brand}','Settings\BrandController@destroy')->name('brands.destroy');
Route::post('/brands/add','Settings\BrandController@add')->name('brands.add');
Route::get('getModels/{brand}','Settings\BrandController@getModels')->name('brands.getModels');

/* Routes Models */
Route::resource('models','Settings\ModelController');
Route::get('/model/destroy/{model}','Settings\ModelController@destroy')->name('models.destroy');
Route::post('/models/add','Settings\ModelController@add')->name('models.add');

/* Routes Permits */
Route::resource('permits','Settings\PermitController');
Route::get('/permit/destroy/{permit}','Settings\PermitController@destroy')->name('permits.destroy');

/* Routes Roles Permits  */
Route::get('/rolePermits/{role}','Settings\RolePermitController@index')->name('rolePermits.index');
Route::get('/create/permit/{role}','Settings\RolePermitController@create')->name('rolePermits.create');
Route::post('/rolePermits/{role}','Settings\RolePermitController@store')->name('rolePermits.store');
Route::get('/rolePermits/destroy/{rolePermit}','Settings\RolePermitController@destroy')->name('rolePermits.destroy');
Route::get('/rolePermits/activate/{rolePermit}/{value}','Settings\RolePermitController@activate')->name('rolePermits.activate');
Route::post('/cloneRolePermits','Settings\RolePermitController@clone')->name('rolePermits.clone');

/* Routes Roles Menus  */
Route::get('/roleMenus/{role}','Settings\RoleMenuController@index')->name('roleMenus.index');
Route::get('/create/menu/{role}','Settings\RoleMenuController@create')->name('roleMenus.create');
Route::post('/roleMenus/{role}','Settings\RoleMenuController@store')->name('roleMenus.store');
Route::get('/roleMenus/destroy/{roleMenu}','Settings\RoleMenuController@destroy')->name('roleMenus.destroy');
Route::get('/roleMenus/activate/{roleMenu}/{value}','Settings\RoleMenuController@activate')->name('roleMenus.activate');
Route::post('/cloneRoleMenus','Settings\RoleMenuController@clone')->name('roleMenus.clone');
Route::get('setOpen/{roleMenu}','Settings\RoleMenuController@setOpen')->name('roleMenus.setOpen');

/* Routes Users */
Route::resource('users','Settings\UserController');
Route::get('/users/activate/{user}/{value}','Settings\UserController@activate')->name('users.activate');
Route::get('/user/destroy/{user}','Settings\UserController@destroy')->name('users.destroy');
Route::post('/users/add','Settings\UserController@add')->name('users.add');

/* Routes User Projects  */
Route::get('/userProjects/{user}','Settings\UserProjectController@index')->name('userProjects.index');
Route::get('/create/userProject/{user}','Settings\UserProjectController@create')->name('userProjects.create');
Route::post('/userProjects/{user}','Settings\UserProjectController@store')->name('userProjects.store');
Route::get('/userProjects/edit/{projectUser}','Settings\UserProjectController@edit')->name('userProjects.edit');
Route::patch('/userProject/{projectUser}','Settings\UserProjectController@update')->name('userProjects.update');
Route::get('/userProjects/destroy/{projectUser}','Settings\UserProjectController@destroy')->name('userProjects.destroy');


/********************************************* PROJECT ROUTES *************************************************************** */

/* Route Parameters */
Route::get('/project/parameters','Project\ParameterController@index')->name('project.parameters.index');
Route::patch('/project/parameters/edit','Project\ParameterController@update')->name('project.parameters.update');

Route::post('/functionsImport','Project\ParameterController@functionsImport')->name('parameters.functionsImport');
Route::post('/positionsImport','Project\ParameterController@positionsImport')->name('parameters.positionsImport');
Route::post('/sectorsImport','Project\ParameterController@sectorsImport')->name('parameters.sectorsImport');
Route::post('/departmentsImport','Project\ParameterController@departmentsImport')->name('parameters.departmentsImport');
Route::post('/zonesImport','Project\ParameterController@zonesImport')->name('parameters.zonesImport');
Route::post('/locationsImport','Project\ParameterController@locationsImport')->name('parameters.locationsImport');
Route::post('/familiesImport','Project\ParameterController@familiesImport')->name('parameters.familiesImport');
Route::post('/categoriesImport','Project\ParameterController@categoriesImport')->name('parameters.categoriesImport');
Route::post('/equipmentsImport','Project\ParameterController@equipmentsImport')->name('parameters.equipmentsImport');
Route::post('/turnsImport','Project\ParameterController@turnsImport')->name('parameters.turnsImport');

Route::post('/functionsClone','Project\ParameterController@functionsClone')->name('parameters.functionsClone');
Route::post('/sectorsClone','Project\ParameterController@sectorsClone')->name('parameters.sectorsClone');
Route::post('/zonesClone','Project\ParameterController@zonesClone')->name('parameters.zonesClone');
Route::post('/familiesClone','Project\ParameterController@familiesClone')->name('parameters.familiesClone');
Route::post('/equipmentsClone','Project\ParameterController@equipmentsClone')->name('parameters.equipmentsClone');
Route::post('/turnsClone','Project\ParameterController@turnsClone')->name('parameters.turnsClone');




/* Routes Project */
Route::get('/project','Project\ProjectController@index')->name('project.index');
Route::get('/project/show','Project\ProjectController@show')->name('project.show');
Route::get('/project/edit/{project}','Project\ProjectController@edit')->name('project.edit');
Route::patch('project/update/{project}','Project\ProjectController@update')->name('project.update');

/* Routes Functions */
Route::resource('functions','Project\FunctionController');
Route::get('/functions/destroy/{function}','Project\FunctionController@destroy')->name('functions.destroy');
Route::post('/function/add','Project\FunctionController@add')->name('functions.add'); 
Route::get('getPositions/{function}','Project\FunctionController@getPositions')->name('functions.getPositions');

/* Routes Sectors */
Route::resource('sectors','Project\SectorController');
Route::get('/sector/destroy/{sector}','Project\SectorController@destroy')->name('sectors.destroy');
Route::post('/sector/add','Project\SectorController@add')->name('sectors.add'); 
Route::get('getDepartments/{sector}','Project\SectorController@getDepartments')->name('sectors.getDepartments');

/* Routes Departments */
Route::resource('departments','Project\DepartmentController');
Route::get('/departments/destroy/{country}','Project\DepartmentController@destroy')->name('departments.destroy');
Route::post('/department/add','Project\DepartmentController@add')->name('departments.add');

/* Routes Stakeholders */
Route::resource('stakeholders','Project\StakeholderController');
Route::get('/stakeholders/destroy/{stakeholder}','Project\StakeholderController@destroy')->name('stakeholders.destroy'); 

/* Routes Zones */
Route::resource('zones','Project\ZoneController');
Route::get('/zones/destroy/{zone}','Project\ZoneController@destroy')->name('zones.destroy');
Route::post('/zones/add','Project\ZoneController@add')->name('zones.add');
Route::get('getLocations/{zone}','Project\ZoneController@getLocations')->name('zones.getLocations');

/* Routes Positions */
Route::resource('positions','Project\PositionController');
Route::get('/position/destroy/{position}','Project\PositionController@destroy')->name('positions.destroy');
Route::post('/positions/add','Project\PositionController@add')->name('positions.add');

/* Routes Locations */
Route::resource('locations','Project\LocationController');
Route::get('/location/destroy/{location}','Project\LocationController@destroy')->name('locations.destroy');

/* Routes Equipments */
Route::resource('equipments','Project\EquipmentController');
Route::get('/equipment/destroy/{equipment}','Project\EquipmentController@destroy')->name('equipments.destroy');

/* Routes Turns */
Route::resource('turns','Project\TurnController');
Route::get('/turns/destroy/{turn}','Project\TurnController@destroy')->name('turns.destroy');

/* Routes Families */
Route::resource('families','Project\FamilyController');
Route::get('/families/destroy/{turn}','Project\FamilyController@destroy')->name('families.destroy');
Route::post('/families/add','Project\FamilyController@add')->name('families.add');
Route::get('getCategories/{family}','Project\FamilyController@getCategories')->name('families.getCategories');

/* Routes Categories */
Route::resource('categories','Project\CategoryController');
Route::get('/categories/destroy/{turn}','Project\CategoryController@destroy')->name('categories.destroy');
Route::post('/categories/add','Project\CategoryController@add')->name('categories.add');
Route::get('getSubcategories/{category}','Project\CategoryController@getSubcategories')->name('categories.getSubcategories');

/* Routes Categories */
Route::resource('subcategories','Project\SubcategoryController');
Route::post('/subcategories/add','Project\SubcategoryController@add')->name('subcategories.add');

/* Routes Project Users  */
Route::get('/projectUsers','Project\ProjectUserController@index')->name('projectUsers.index');
Route::get('/create/project','Project\ProjectUserController@create')->name('projectUsers.create');
Route::post('/projectUsers','Project\ProjectUserController@store')->name('projectUsers.store');
Route::get('/projectUsers/destroy/{projectUser}','Project\ProjectUserController@destroy')->name('projectUsers.destroy');

/*********************************** WORKBOOK ROUTES ************************************************************************* */

/* Routes Folios */
Route::get('folios/{location_id?}','Workbook\FolioController@index')->name('folios.index');
Route::get('create','Workbook\FolioController@create')->name('folios.create');
Route::get('folios/edit/{folio}','Workbook\FolioController@edit')->name('folios.edit');
Route::post('/folios','Workbook\FolioController@store')->name('folios.store');
Route::get('filterFoliosXLocation','Workbook\FolioController@filterLocation')->name('folios.filterLocation');
Route::get('getNumber/{location}','Workbook\FolioController@getNumber')->name('folios.getNumber');
Route::get('folios/print/{folio}','Workbook\FolioController@print')->name('folios.print');
Route::patch('folios/updateNumber/{folio}','Workbook\FolioController@update')->name('folios.update');

/* Routes Location x Project Users */
Route::get('/locationProjectUsers/{projectUser}','Workbook\LocationProjectUserController@index')->name('locationProjectUsers.index');
Route::get('/locationProjectUsers/create/{projectUser}','Workbook\LocationProjectUserController@create')->name('locationProjectUsers.create');
Route::post('/locationProjectUsers/{projectUser}','Workbook\LocationProjectUserController@store')->name('locationProjectUsers.store');
Route::get('/locationProjectUsers/edit/{locationProjectUser}','Workbook\LocationProjectUserController@edit')->name('locationProjectUsers.edit');
Route::patch('/locationProjectUsers/{locationProjectUser}','Workbook\LocationProjectUserController@update')->name('locationProjectUsers.update');
Route::get('/locationProjectUsers/destroy/{locationProjectUser}','Workbook\LocationProjectUserController@destroy')->name('locationProjectUsers.destroy');

/* Routes Daily Reports */
Route::get('dailyReports/{location_id?}','Workbook\DailyReportController@index')->name('dailyReports.index');
Route::get('filterDailyReportsXLocation','Workbook\DailyReportController@filterLocation')->name('dailyReports.filterLocation');
Route::get('/dailyReports/create/{folio}','Workbook\DailyReportController@create')->name('dailyReports.create');
Route::post('/dailyReports','Workbook\DailyReportController@store')->name('dailyReports.store');
Route::get('/dailyReports/show/{dailyReport}','Workbook\DailyReportController@show')->name('dailyReports.show');
Route::get('/dailyReports/review/{dailyReport}','Workbook\DailyReportController@review')->name('dailyReports.review');
Route::get('/dailyReports/edit/{dailyReport}','Workbook\DailyReportController@edit')->name('dailyReports.edit');
Route::patch('/dailyReports/{dailyReport}','Workbook\DailyReportController@update')->name('dailyReports.update');

/* Routes Equipments x Daily Reports */
Route::post('/equipmentDailyReports','Workbook\EquipmentDailyReportController@store')->name('equipmentDailyReports.store');
Route::get('/equipmentDailyReports/destroy/{equipmentDailyReport}','Workbook\EquipmentDailyReportController@destroy')->name('equipmentDailyReports.destroy');
Route::post('/equipmentDailyReports/clone','Workbook\EquipmentDailyReportController@clone')->name('equipmentDailyReports.clone');

/* Routes Positions x Daily Reports */
Route::post('/positionDailyReports','Workbook\PositionDailyReportController@store')->name('positionDailyReports.store');
Route::get('/positionDailyReports/destroy/{positionDailyReport}','Workbook\PositionDailyReportController@destroy')->name('positionDailyReports.destroy');
Route::post('/positionDailyReports/clone','Workbook\PositionDailyReportController@clone')->name('positionDailyReports.clone');

/* Routes Events x Daily Reports */
Route::post('/eventDailyReports','Workbook\EventDailyReportController@store')->name('eventDailyReports.store');
Route::get('/eventDailyReports/destroy/{eventDailyReport}','Workbook\EventDailyReportController@destroy')->name('eventDailyReports.destroy');

/* Routes Attachments x Daily Reports */
Route::post('/attachmentDailyReports','Workbook\AttachmentDailyReportController@store')->name('attachmentDailyReports.store');
Route::get('/attachmentDailyReports/destroy/{attachmentDailyReport}','Workbook\AttachmentDailyReportController@destroy')->name('attachmentDailyReports.destroy');

/* Routes Comments x Daily Reports */
Route::post('/commentDailyReports','Workbook\CommentDailyReportController@store')->name('commentDailyReports.store');
Route::get('/commentDailyReports/destroy/{commentDailyReport}','Workbook\CommentDailyReportController@destroy')->name('commentDailyReports.destroy');

/* Routes Notes */
Route::get('notes/{location_id?}','Workbook\NoteController@index')->name('notes.index');
Route::get('filterNotesXLocation','Workbook\NoteController@filterLocation')->name('notes.filterLocation');
Route::get('/notes/create/{folio}','Workbook\NoteController@create')->name('notes.create');
Route::post('/notes','Workbook\NoteController@store')->name('notes.store');
Route::get('/notes/show/{note}','Workbook\NoteController@show')->name('notes.show');
Route::get('/notes/edit/{note}','Workbook\NoteController@edit')->name('notes.edit');
Route::patch('/notes/{note}','Workbook\NoteController@update')->name('notes.update');

/* Routes Attachments x Note */
Route::post('/attachmentNotes','Workbook\AttachmentNoteController@store')->name('attachmentNotes.store');
Route::get('/attachmentNotes/destroy/{attachmentNote}','Workbook\AttachmentNoteController@destroy')->name('attachmentNotes.destroy');

/* Routes Comments x Note */
Route::post('/commentNotes','Workbook\CommentNoteController@store')->name('commentNotes.store');
Route::get('/commentNotes/destroy/{commentNote}','Workbook\CommentNoteController@destroy')->name('commentNotes.destroy');

/* Routes Turns x Location */
Route::get('/locationTurns/{location}','Workbook\LocationTurnController@index')->name('locationTurns.index');
Route::get('/locationTurns/create/{location}','Workbook\LocationTurnController@create')->name('locationTurns.create');
Route::post('/locationTurns/{location}','Workbook\LocationTurnController@store')->name('locationTurns.store');
Route::get('/locationTurns/edit/{turnlocation}','Workbook\LocationTurnController@edit')->name('locationTurns.edit');
Route::patch('/locationTurns/{turnlocation}','Workbook\LocationTurnController@update')->name('locationTurns.update');
Route::get('/locationTurns/destroy/{turnlocation}','Workbook\LocationTurnController@destroy')->name('locationTurns.destroy');

/* Routes Workbook Users */
Route::get('/workbookUsers','Workbook\UserController@index')->name('workbook_settings_users');

/* Routes Workbook Users */
Route::get('/workbookLocations','Workbook\LocationController@index')->name('workbook_settings_locations');
Route::get('/workbookLocations/create','Workbook\LocationController@create')->name('workbook_settings_locations_create');
Route::post('/workbookLocations','Workbook\LocationController@store')->name('workbook_settings_locations_store');
Route::get('/workbookLocations/{location}','Workbook\LocationController@show')->name('workbook_settings_locations_show');
Route::get('/workbookLocations/edit/{location}','Workbook\LocationController@edit')->name('workbook_settings_locations_edit');
Route::patch('/workbookLocations/{location}','Workbook\LocationController@update')->name('workbook_settings_locations_update');
Route::get('/workbookLocations/destroy/{location}','Workbook\LocationController@destroy')->name('workbook_settings_locations_destroy');

/*********************************** TECHNOLOGY ROUTES ************************************************************************* */

/* Routes Stakeholder Person */
Route::get('/technology/stakeholderPeople','Technology\StakeholderPersonController@index')->name('technology.stakeholderPeople.index');

/* Routes Stakeholder Person Assets */
Route::get('/stakeholderPersonAssets/{stakeholderPerson}','Technology\StakeholderPersonAssetController@index')->name('technology.stakeholderPersonAssets.index');
Route::get('/stakeholderPersonAssets/create/{stakeholderPerson}','Technology\StakeholderPersonAssetController@create')->name('technology.stakeholderPersonAssets.create');
Route::post('/stakeholderPersonAssets/{stakeholderPerson}','Technology\StakeholderPersonAssetController@store')->name('technology.stakeholderPersonAssets.store');

/******************************************************** ASSET ROUTES ******************************************************* */

/* Routes Asset */
Route::get('getMaterial/{id}','Assets\AssetController@getMaterial')->name('assets.getMaterial');

/******************************************************** WAREHOUSE ROUTES ******************************************************* */

/* Routes Materials */
Route::resource('materials','Warehouse\MaterialController');

/******************************************************** EMPLOYEES ROUTES ******************************************************* */

/* Routes People */

Route::get('/people','People\PersonController@index')->name('people.index');
Route::get('/person/createNew','People\PersonController@createNew')->name('people.createNew');
Route::get('/person/createExist/{person}','People\PersonController@createExist')->name('people.createExist');
Route::get('/person/edit/{person}','People\PersonController@edit')->name('people.edit');
Route::post('/people/new','People\PersonController@storeNew')->name('people.storeNew');
Route::post('/people/exist','People\PersonController@storeExist')->name('people.storeExist');
Route::patch('/people/{person}','People\PersonController@update')->name('people.update');
Route::post('/person/search','People\PersonController@search')->name('people.search');

/* Routes StakeholderPeople */
Route::get('/stakeholderPeople/{person}','People\StakeholderPersonController@index')->name('stakeholderPeople.index');
Route::get('/stakeholderPeople/create/{person}','People\StakeholderPersonController@create')->name('stakeholderPeople.create');
Route::post('/stakeholderPeople','People\StakeholderPersonController@store')->name('stakeholderPeople.store');
Route::get('/stakeholderPeople/edit/{stakeholderPerson}','People\StakeholderPersonController@edit')->name('stakeholderPeople.edit');
Route::patch('/stakeholderPeople/{stakeholderPerson}','People\StakeholderPersonController@update')->name('stakeholderPeople.update');

/* Routes Employees */
Route::get('/employees','People\EmployeeController@index')->name('employees.index');
Route::get('/employee/edit/{stakeholderPerson}','People\EmployeeController@edit')->name('employees.edit');
Route::patch('/employees/{stakeholderPerson}','People\EmployeeController@update')->name('employees.update');

