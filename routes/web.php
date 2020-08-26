<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', 'HomeController@index')->name('/');




Route::resource('roles', 'RolesController');
Route::get('roles/{id}/destroy', 'RolesController@destroy');

/*--------------------Titles-----------------------*/
Route::resource('titles', 'TitlesController');

/*--------------------nationalities-----------------------*/
Route::resource('nationalities', 'NationalitiesController');
/*--------------------countries-----------------------*/
Route::resource('countries', 'CountriesController');
/*--------------------cities-----------------------*/
Route::resource('cities', 'CitiesController');
/*--------------------crm_users-----------------------*/
Route::resource('crm-users', 'CrmUserController');
/*--------------------company-----------------------*/
Route::resource('company', 'CompanyController');
/*--------------------client-----------------------*/
Route::resource('client', 'ClientController');
Route::get('add-activity/{id}', 'ClientController@addActivity')->name('add-activity');
Route::post('saveActivity', 'ClientController@saveActivity')->name('saveActivity');
Route::get('dynamicService/fetch', 'ClientController@dynamicService')->name('dynamicService.fetch');
Route::delete('delete-activity/{id}', 'ClientController@deleteActivity')->name('delete-activity');
Route::get('edit-activity/{id}', 'ClientController@editActivity')->name('edit-activity');
Route::post('update-activity', 'ClientController@updateActivity')->name('update-activity');
/*--------------------lead-----------------------*/
Route::resource('lead', 'LeadController');
Route::get('add-lead-activity/{id}', 'LeadController@addActivity')->name('add-lead-activity');
Route::post('saveLeadActivity', 'LeadController@saveActivity')->name('saveLeadActivity');
Route::get('dynamicServiceLead/fetch', 'LeadController@dynamicService')->name('dynamicServiceLead.fetch');
Route::post('convert-to-client', 'LeadController@convertToClient')->name('convert-to-client');
Route::delete('delete-lead-activity/{id}', 'LeadController@deleteActivity')->name('delete-lead-activity');
Route::get('edit-lead-activity/{id}', 'LeadController@editActivity')->name('edit-lead-activity');
Route::post('update-lead-activity', 'LeadController@updateActivity')->name('update-lead-activity');
Route::get('fetch_allLead', 'LeadController@fetch_allLead')->name('fetch_allLead');

/*--------------------fqa-----------------------*/
Route::resource('fqa', 'FqaController');

Route::resource('source', 'Reach_SourcesController');
Route::resource('activities', 'activitiesController');
Route::resource('services', 'servicesController');

Route::resource('status', 'statusController');


Route::get('roles/{id}/destroy', 'RolesController@destroy');
