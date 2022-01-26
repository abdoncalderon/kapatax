<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

// Route::get('/', 'HomeController@index')->name('home');

/* Start */
Route::get('/', 'HomeController@project')->name('project');
Route::post('/','HomeController@menu')->name('menu');
Route::get('/main', 'HomeController@index')->name('home');

/* Routes Users */
Route::resource('users','UserController');
Route::get('/users/activate/{user}/{value}','UserController@activate')->name('users.activate');
Route::get('/user/destroy/{user}','UserController@destroy')->name('users.destroy');

/* Routes Menus */
Route::resource('menus','Admin\MenuController');
Route::get('/menus/activate/{menu}/{value}','Admin\MenuController@activate')->name('menus.activate');
Route::get('/menus/destroy/{menu}','Admin\MenuController@destroy')->name('menus.destroy');

/* Routes Roles */
Route::resource('roles','Admin\RoleController');
Route::get('/roles/activate/{role}/{value}','Admin\RoleController@activate')->name('roles.activate');
Route::get('/role/destroy/{role}','Admin\RoleController@destroy')->name('roles.destroy');

/* Routes Roles Menus  */
Route::get('/roleMenus/{role}','Admin\RoleMenuController@index')->name('roleMenus.index');
Route::get('/create/menu/{role}','Admin\RoleMenuController@create')->name('roleMenus.create');
Route::post('/roleMenus/{role}','Admin\RoleMenuController@store')->name('roleMenus.store');
Route::get('/roleMenus/destroy/{roleMenu}','Admin\RoleMenuController@destroy')->name('roleMenus.destroy');

/* Routes Users Projects  */
Route::get('/userProjects/{user}','Admin\UserProjectController@index')->name('userProjects.index');
Route::get('/create/project/{user}','Admin\UserProjectController@create')->name('userProjects.create');
Route::post('/userProjects/{user}','Admin\UserProjectController@store')->name('userProjects.store');
Route::get('/userProjects/destroy/{userProject}','Admin\UserProjectController@destroy')->name('userProjects.destroy');

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
Route::post('/regons/add','Admin\RegionController@add')->name('regions.add');

/* Routes Countries */
Route::resource('countries','Admin\CountryController');
Route::get('/countries/destroy/{country}','Admin\CountryController@destroy')->name('countries.destroy');

/* Routes States */
Route::resource('states','Admin\StateController');
Route::get('/states/destroy/{state}','Admin\StateController@destroy')->name('states.destroy');

/* Routes Cities */
Route::resource('cities','Admin\CityController');
Route::get('/cities/destroy/{city}','Admin\CityController@destroy')->name('cities.destroy');

/* Routes Projects */
Route::resource('projects','Admin\ProjectController');
Route::get('/projects/activate/{project}/{value}','Admin\ProjectController@activate')->name('projects.activate');
Route::get('projects/lock/{project}/{value}','Admin\ProjectController@lock')->name('projects.lock');
Route::get('/projects/destroy/{project}','Admin\ProjectController@destroy')->name('projects.destroy');

/* Routes Unities */
Route::resource('unities','Admin\UnityController');
Route::get('/unity/destroy/{unity}','Admin\UnityController@destroy')->name('unities.destroy');

/* Routes Organizations */
Route::resource('organizations','Admin\OrganizationController');
Route::get('/organization/destroy/{organization}','Admin\OrganizationController@destroy')->name('organizations.destroy');

/* Routes Contractors */
Route::resource('contractors','Admin\ContractorController');
Route::get('/contractor/destroy/{contractor}','Admin\ContractorController@destroy')->name('contractors.destroy'); 

/* Routes Sectors */
Route::resource('sectors','Admin\SectorController');
Route::get('/sector/destroy/{sector}','Admin\SectorController@destroy')->name('sectors.destroy');

/* Routes Brands */
Route::resource('brands','Admin\BrandController');
Route::get('/brand/destroy/{brand}','Admin\BrandController@destroy')->name('brands.destroy');
Route::post('/regons/add','Admin\BrandController@add')->name('brands.add');

/* Routes Permits */
Route::resource('permits','Admin\PermitController');
Route::get('/permit/destroy/{permit}','Admin\PermitController@destroy')->name('permits.destroy');










/* Routes Departments */
Route::resource('departments','Setting\DepartmentController');
Route::get('/departments/destroy/{country}','Setting\DepartmentController@destroy')->name('departments.destroy');

/* Routes Project */
Route::get('/project/show','Setting\ProjectController@show')->name('project.show');
Route::get('/project/edit/{project}','Setting\ProjectController@edit')->name('project.edit');
Route::patch('project/update/{project}','Setting\ProjectController@update')->name('project.update');

/* Routes Zones */
Route::resource('zones','Setting\ZoneController');
Route::get('/zones/destroy/{zone}','Setting\ZoneController@destroy')->name('zones.destroy');
Route::post('/zones/add','Setting\ZoneController@add')->name('zones.add');

/* Routes Functions */
Route::resource('functions','FunctionController');
Route::get('/functions/destroy/{function}','FunctionController@destroy')->name('functions.destroy');
Route::post('/functions/add','FunctionController@add')->name('functions.add'); 

/* Routes Positions */
Route::resource('positions','Setting\PositionController');
Route::get('/position/destroy/{position}','Setting\PositionController@destroy')->name('positions.destroy');

/* Routes Locations */
Route::resource('locations','Setting\LocationController');
Route::get('/location/destroy/{location}','Settings\LocationController@destroy')->name('locations.destroy');

/* Routes Equipments */
Route::resource('equipments','Setting\EquipmentController');
Route::get('/equipment/destroy/{equipment}','Setting\EquipmentController@destroy')->name('equipments.destroy');

/* Routes Turns */
Route::resource('turns','Setting\TurnController');
Route::get('/turns/destroy/{turn}','Setting\TurnController@destroy')->name('turns.destroy');








/* Routes Folios */
Route::get('folios/{location_id?}','Agreement\FolioController@index')->name('folios.index');
Route::get('create','Agreement\FolioController@create')->name('folios.create');
Route::get('folios/edit/{folio}','Agreement\FolioController@edit')->name('folios.edit');
Route::post('/folios','FolioController@store')->name('folios.store');
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

/* Routes Locations x User */
Route::get('/turnsLocations/{location}','Agreement\TurnLocationController@index')->name('turnsLocations.index');
Route::get('/turnsLocations/create/{location}','Agreement\TurnLocationController@create')->name('turnsLocations.create');
Route::post('/turnsLocations/{location}','Agreement\TurnLocationController@store')->name('turnsLocations.store');
Route::get('/turnsLocations/edit/{turnlocation}','Agreement\TurnLocationController@edit')->name('turnsLocations.edit');
Route::patch('/turnsLocations/{turnlocation}','Agreement\TurnLocationController@update')->name('turnsLocations.update');
Route::get('/turnsLocations/destroy/{turnlocation}','Agreement\TurnLocationController@destroy')->name('turnsLocations.destroy');

/* Routes Workbook Users */
Route::get('/workbookUsers','Agreement\UserController@index')->name('workbook_settings_users');

/* Routes Workbook Users */
Route::get('/workbookLocations','Agreement\LocationController@index')->name('workbook_settings_locations');
Route::get('/workbookLocations/{location}','Agreement\LocationController@show')->name('workbook_settings_locations_show');
Route::get('/workbookLocations/edit/{location}','Agreement\LocationController@edit')->name('workbook_settings_locations_edit');
Route::patch('/workbookLocations/{location}','Agreement\LocationController@update')->name('workbook_settings_locations_update');
Route::get('/workbookLocations/destroy/{location}','Agreement\LocationController@destroy')->name('workbook_settings_locations_destroy');