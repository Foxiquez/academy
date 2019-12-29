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

Auth::routes();


Route::group(['prefix' => 'panel', 'as' => 'panel.', 'namespace' => 'Panel', 'middleware' => ['auth', 'active']], function () {
    // Panel routes;
});

Route::middleware(['auth'])->group(function () {
    Route::get('/recruit', 'RecruitController@index')->name('recruit');

    Route::post('application', 'Panel\ApplicationController@store')->name('application.store');
    Route::patch('application/{id}/update', 'Panel\ApplicationController@update')->name('application.update');
});