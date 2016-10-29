<?php
use Illuminate\Routing\Router;

Route::group(['prefix' => 'install', 'namespace' => 'Vcord\Larastall\Http\Controllers'], function () {
    Route::get('/', 'WelcomeController@welcome')->name('larastall_welcome');
    Route::match(['get', 'post'], '/database-config', 'DatabaseController@store')->name('larastall_database');
    Route::match(['get', 'post'], '/site-settings', 'SiteController@store')->name('larastall_site');
    Route::match(['get', 'post'],'/complete', 'SiteController@complete')->name('larastall_complete');

});
