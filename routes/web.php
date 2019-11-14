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
//Language Route
Route::get('/lang/{lang}', ['Middleware' => 'LanguageSwitcher', 'uses' => 'LanguageController@change'])->name('langChange');
//

//Backend Routes//
Route::group(['namespace' => 'backend', 'prefix' => 'admin'], function () {
    Route::get('/', 'DashboardController@index')->name('dashboard');

    Route::group(['namespace' => 'InsuranceType', 'prefix' => 'insurance'], function () {
        Route::any('/update-types', 'InsuranceTypeController@update_types')->name('update-types');

    });
});
