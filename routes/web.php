<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

// Route::get('/', 'HomeController@index')->name('home');

Route::get('/', 'HomeController@project')->name('project');
Route::post('/','HomeController@menu')->name('menu');
Route::get('/main', 'HomeController@index')->name('home');

/* Routes Roles */
Route::resource('roles','RoleController');
Route::get('/roles/activate/{role}/{value}','RoleController@activate')->name('roles.activate');
Route::get('/role/destroy/{role}','RoleController@destroy')->name('roles.destroy');

/* Routes Roles Menus  */
Route::get('/roleMenus/{role}','Admin\RoleMenuController@index')->name('roleMenus.index');
Route::get('/create/menu/{role}','Admin\RoleMenuController@create')->name('roleMenus.create');
Route::post('/roleMenus/{role}','Admin\RoleMenuController@store')->name('roleMenus.store');
Route::get('/roleMenus/destroy/{roleMenu}','Admin\RoleMenuController@destroy')->name('roleMenus.destroy');

/* Routes Users */
Route::resource('users','UserController');
Route::get('/users/activate/{user}/{value}','UserController@activate')->name('users.activate');
Route::get('/user/destroy/{user}','UserController@destroy')->name('users.destroy');

/* Routes Users Projects  */
Route::get('/userProjects/{user}','Admin\UserProjectController@index')->name('userProjects.index');
Route::get('/create/project/{user}','Admin\UserProjectController@create')->name('userProjects.create');
Route::post('/userProjects/{user}','Admin\UserProjectController@store')->name('userProjects.store');
Route::get('/userProjects/destroy/{userProject}','Admin\UserProjectController@destroy')->name('userProjects.destroy');

/* Routes Menus */
Route::resource('menus','Admin\MenuController');
Route::get('/menus/activate/{menu}/{value}','Admin\MenuController@activate')->name('menus.activate');
Route::get('/menus/destroy/{menu}','Admin\MenuController@destroy')->name('menus.destroy');

/* Routes Profiles */
Route::resource('profiles','Admin\ProfileController');

/* Routes Companies */
Route::resource('companies','Admin\CompanyController');
Route::get('/companies/activate/{company}/{value}','Admin\CompanyController@activate')->name('companies.activate');
Route::get('/companies/lock/{company}/{value}','Admin\CompanyController@lock')->name('companies.lock');
Route::get('/companies/destroy/{company}','Admin\CompanyController@destroy')->name('companies.destroy');

/* Routes Divisions */
Route::resource('divisions','Admin\DivisionController');
Route::get('/division/destroy/{division}','Admin\DivisionController@destroy')->name('divisions.destroy');

/* Routes Subsidiary */
Route::resource('subsidiaries','Admin\SubsidiaryController');
Route::get('/subsidiary/destroy/{subsidiary}','Admin\SubsidiaryController@destroy')->name('subsidiaries.destroy');

/* Routes Regions */
Route::resource('regions','Admin\RegionController');
Route::get('/region/destroy/{region}','Admin\RegionController@destroy')->name('regions.destroy');

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

/* Routes Areas */
Route::resource('areas','Admin\AreaController');
Route::get('/areas/destroy/{country}','Admin\AreaController@destroy')->name('areas.destroy');

/* Routes Project */
Route::get('/project/show','Settings\ProjectController@show')->name('project.show');
Route::get('/project/edit/{project}','Settings\ProjectController@edit')->name('project.edit');
Route::patch('project/update/{project}','Settings\ProjectController@update')->name('project.update');

/* Routes Zones */
Route::resource('zones','Settings\ZoneController');
Route::get('/zones/destroy/{zone}','Settings\ZoneController@destroy')->name('zones.destroy');

/* Routes Contractors */
/* Route::resource('contractors','Agreement\ContractorController');
/* Route::get('/contractor/destroy/{contractor}','Agreement\ContractorController@destroy')->name('contractors.destroy'); 

/* Routes Equipments */
/* Route::resource('equipments','Agreement\EquipmentController');
/* Route::get('/equipment/destroy/{equipment}','EquipmentController@destroy')->name('equipments.destroy');

/* Routes Positions */
/* Route::resource('positions','PositionController');
/* Route::get('/position/destroy/{position}','PositionController@destroy')->name('positions.destroy');

/* Routes Sectors */
Route::resource('sectors','SectorController');
Route::get('/sector/destroy/{sector}','SectorController@destroy')->name('sectors.destroy');

/* Routes Locations */
Route::resource('locations','Settings\LocationController');
Route::get('/location/destroy/{location}','Settings\LocationController@destroy')->name('locations.destroy');

/* Routes Turns */
Route::resource('turns','TurnController');
Route::get('/turns/destroy/{turn}','TurnController@destroy')->name('turns.destroy');

/* Routes Folios */
Route::get('folios/{location_id?}','FolioController@index')->name('folios.index');
Route::get('create','FolioController@create')->name('folios.create');
Route::get('folios/edit/{folio}','FolioController@edit')->name('folios.edit');
Route::post('/folios','FolioController@store')->name('folios.store');
Route::get('filterFoliosXLocation','FolioController@filterLocation')->name('folios.filterLocation');
Route::get('getNumber/{location}','FolioController@getNumber')->name('folios.getNumber');
Route::get('folios/print/{folio}','FolioController@print')->name('folios.print');
Route::patch('folios/updateNumber/{folio}','FolioController@update')->name('folios.update');

/* Routes Permits */
/* Route::get('/permits/{user}','Agreement\PermitController@index')->name('permits.index');
/* Route::get('/permits/edit/{permit}','Agreement\PermitController@edit')->name('permits.edit');
/* Route::patch('/permits/{permit}','Agreement\PermitController@update')->name('permits.update');

/* Routes Locations x User */
Route::get('/locationsUsers/{user}','LocationUserController@index')->name('locationsUsers.index');
Route::get('/locationsUsers/create/{user}','LocationUserController@create')->name('locationsUsers.create');
Route::post('/locationsUsers/{user}','LocationUserController@store')->name('locationsUsers.store');
Route::get('/locationsUsers/edit/{locationUser}','LocationUserController@edit')->name('locationsUsers.edit');
Route::patch('/locationsUsers/{locationUser}','LocationUserController@update')->name('locationsUsers.update');
Route::get('/locationsUsers/destroy/{locationUser}','LocationUserController@destroy')->name('locationsUsers.destroy');

/* Routes Daily Reports */
Route::get('dailyReports/{location_id?}','DailyReportController@index')->name('dailyReports.index');
Route::get('filterDailyReportsXLocation','DailyReportController@filterLocation')->name('dailyReports.filterLocation');
Route::get('/dailyReports/create/{folio}','DailyReportController@create')->name('dailyReports.create');
Route::post('/dailyReports','DailyReportController@store')->name('dailyReports.store');
Route::get('/dailyReports/show/{dailyReport}','DailyReportController@show')->name('dailyReports.show');
Route::get('/dailyReports/review/{dailyReport}','DailyReportController@review')->name('dailyReports.review');
Route::get('/dailyReports/edit/{dailyReport}','DailyReportController@edit')->name('dailyReports.edit');
Route::patch('/dailyReports/{dailyReport}','DailyReportController@update')->name('dailyReports.update');

/* Routes Equipments x Daily Reports */
Route::post('/equipmentDailyReports','EquipmentDailyReportController@store')->name('equipmentDailyReports.store');
Route::get('/equipmentDailyReports/destroy/{equipmentDailyReport}','EquipmentDailyReportController@destroy')->name('equipmentDailyReports.destroy');
Route::post('/equipmentDailyReports/clone','EquipmentDailyReportController@clone')->name('equipmentDailyReports.clone');

/* Routes Positions x Daily Reports */
Route::post('/positionDailyReports','PositionDailyReportController@store')->name('positionDailyReports.store');
Route::get('/positionDailyReports/destroy/{positionDailyReport}','PositionDailyReportController@destroy')->name('positionDailyReports.destroy');
Route::post('/positionDailyReports/clone','PositionDailyReportController@clone')->name('positionDailyReports.clone');

/* Routes Events x Daily Reports */
Route::post('/eventDailyReports','EventDailyReportController@store')->name('eventDailyReports.store');
Route::get('/eventDailyReports/destroy/{eventDailyReport}','EventDailyReportController@destroy')->name('eventDailyReports.destroy');

/* Routes Attachments x Daily Reports */
Route::post('/attachmentDailyReports','AttachmentDailyReportController@store')->name('attachmentDailyReports.store');
Route::get('/attachmentDailyReports/destroy/{attachmentDailyReport}','AttachmentDailyReportController@destroy')->name('attachmentDailyReports.destroy');

/* Routes Comments x Daily Reports */
Route::post('/commentDailyReports','CommentDailyReportController@store')->name('commentDailyReports.store');
Route::get('/commentDailyReports/destroy/{commentDailyReport}','CommentDailyReportController@destroy')->name('commentDailyReports.destroy');

/* Routes Notes */
Route::get('notes/{location_id?}','NoteController@index')->name('notes.index');
Route::get('filterNotesXLocation','NoteController@filterLocation')->name('notes.filterLocation');
Route::get('/notes/create/{folio}','NoteController@create')->name('notes.create');
Route::post('/notes','NoteController@store')->name('notes.store');
Route::get('/notes/show/{note}','NoteController@show')->name('notes.show');
Route::get('/notes/edit/{note}','NoteController@edit')->name('notes.edit');
Route::patch('/notes/{note}','NoteController@update')->name('notes.update');

/* Routes Attachments x Note */
Route::post('/attachmentNotes','AttachmentNoteController@store')->name('attachmentNotes.store');
Route::get('/attachmentNotes/destroy/{attachmentNote}','AttachmentNoteController@destroy')->name('attachmentNotes.destroy');

/* Routes Comments x Note */
Route::post('/commentNotes','CommentNoteController@store')->name('commentNotes.store');
Route::get('/commentNotes/destroy/{commentNote}','CommentNoteController@destroy')->name('commentNotes.destroy');

/* Routes Locations x User */
Route::get('/turnsLocations/{location}','TurnLocationController@index')->name('turnsLocations.index');
Route::get('/turnsLocations/create/{location}','TurnLocationController@create')->name('turnsLocations.create');
Route::post('/turnsLocations/{location}','TurnLocationController@store')->name('turnsLocations.store');
Route::get('/turnsLocations/edit/{turnlocation}','TurnLocationController@edit')->name('turnsLocations.edit');
Route::patch('/turnsLocations/{turnlocation}','TurnLocationController@update')->name('turnsLocations.update');
Route::get('/turnsLocations/destroy/{turnlocation}','TurnLocationController@destroy')->name('turnsLocations.destroy');