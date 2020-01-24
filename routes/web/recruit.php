<?php



Route::group(['as' => 'recruit.'], function () {

    Route::get('/', 'RecruitController@index')->name('index');

    Route::get('/application', 'RecruitController@showApplicationForm')->name('showApplicationForm');
    Route::post('/application/create', 'RecruitController@createApplication')->name('createApplication');
    Route::post('/application/edit', 'RecruitController@editApplication')->name('editApplication');
});