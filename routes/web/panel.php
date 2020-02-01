<?php

Route::group(['as' => 'panel.', 'namespace' => 'Panel'], function () {

    Route::get('/', 'HomeController@index')->name('index');
});