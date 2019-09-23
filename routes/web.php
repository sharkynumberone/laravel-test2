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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true, 'register' => false]);

Route::get('/dev-tools/swagger-file', 'SwaggerController@file')->name('swagger-file');
Route::get('/dev-tools/docs', 'SwaggerController@docsForm')->name('swagger-file');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/projects', 'ProjectController@index')->name('project.index');
Route::get('/project/create', 'ProjectController@createForm')->name('project.create.form');
Route::post('/project/create', 'ProjectController@store')->name('project.create');
Route::get('/project/{project}', 'ProjectController@updateForm');
Route::put('/project/{project}', 'ProjectController@update')->name('project.update');
Route::get('/project/{project}/delete', 'ProjectController@destroy')->name('project.delete');
Route::get('/logs', 'ProjectEventLogController@index')->name('project_event_log.index');
Route::get('/project/{project}/statistics', 'ProjectEventLogStatisticsController@getStatistics');
