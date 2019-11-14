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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


/** Admin Login/Registr */
Route::get('/login/admin', 'Auth/LoginController@showAdminForm');
Route::post('/login/admin', 'Auth/LoginController@postAdminForm');
Route::get('/register/admin', 'Auth/RegisterController@showAdminForm');
Route::post('/register/admin', 'Auth/RegisterController@postAdminForm');

/** Merchant Login/Register */
Route::get('/login/merchant', 'Auth/LoginController@showMerchantForm');
Route::post('/login/merchant', 'Auth/LoginController@postMerchantForm');
Route::get('/register/merchant', 'Auth/RegisterController@showMerchantForm');
Route::post('/register/merchant', 'Auth/RegisterController@postMerchantForm');

/** Agent Login/Register */
Route::get('/login/agent', 'Auth/LoginController@showAgentForm');
Route::post('/login/agent', 'Auth/LoginController@postAgentForm');
Route::get('/register/agent', 'Auth/RegisterController@showAgentForm');
Route::post('/register/agent', 'Auth/RegisterController@postAgentForm');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
