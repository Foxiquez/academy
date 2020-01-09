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
    return view('main');
});

Auth::routes();


Route::group(['prefix' => 'panel', 'as' => 'panel.', 'namespace' => 'Panel', 'middleware' => ['auth', 'active']], function () {
    Route::get('/', function () {
        return view('panel.home');
    })->name('home');

    Route::resource('application', 'ApplicationController');
    Route::resource('curators', 'CuratorsController');
    Route::resource('lections', 'LectionsController');
    Route::resource('test', 'TestsController');

    Route::post('test/answer', 'TestsController@storeAnswer')->name('test.store.answer');

    Route::get('/chat', 'ChatController@index')->name('chat.index');
    Route::post('/messages/send', 'ChatController@send')->name('chat.send');
    Route::get('/messages/json', 'ChatController@messages')->name('chat.json');
    Route::get('/messages/count', 'ChatController@countMessages')->name('chat.countMessages');

    Route::resource('map', 'MapController');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/recruit', 'RecruitController@index')->name('recruit');

    Route::post('application/create', 'Panel\ApplicationController@store')->name('application.store');
    Route::patch('application/update', 'Panel\ApplicationController@update')->name('application.update');
});