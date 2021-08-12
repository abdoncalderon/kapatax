<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

// Route::get('/', 'HomeController@index')->name('home');

Route::get('/', 'HomeController@project')->name('project');
Route::post('/','HomeController@menu')->name('menu');
Route::get('/main', 'HomeController@index')->name('home');

/* Routes Roles */
Route::resource('roles','RoleController');


/* Routes Users */
Route::resource('users','UserController');

/* Routes Menus */
Route::resource('menus','Admin\MenuController');

/* Routes Profiles */
Route::resource('profiles','Admin\ProfileController');

/* Routes Companies */
Route::resource('companies','Admin\CompanyController');

/* Routes Divisions */
Route::resource('divisions','Admin\DivisionController');

/* Routes Regions */
Route::resource('regions','Admin\RegionController');

/* Routes Countries */
Route::resource('countries','Admin\CountryController');

/* Routes States */
Route::resource('states','Admin\StateController');

/* Routes Cities */
Route::resource('cities','Admin\CityController');

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

/* Routes Projects */
Route::resource('projects','ProjectController');

/* Routes Locations */
Route::resource('locations','LocationController');
Route::get('/location/destroy/{location}','LocationController@destroy')->name('locations.destroy');

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