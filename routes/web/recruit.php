<?php



Route::group(['as' => 'recruit.'], function () {

    Route::get('/', 'RecruitController@index')->name('index');

    Route::get('/status', 'RecruitController@showStatus')->name('showStatus');
    Route::get('/application', 'RecruitController@showAppplicationForm')->name('showAppplicationForm');
    Route::post('/application/create', 'RecruitController@createApplication')->name('createApplication');
    Route::put('/application/edit', 'RecruitController@editApplication')->name('editApplication');
});