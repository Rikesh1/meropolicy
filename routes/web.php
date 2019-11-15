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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


/** Admin Login/Registr */
Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm');
Route::post('/login/admin', 'Auth\LoginController@adminLogin');
Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm');
Route::post('/register/admin', 'Auth\RegisterController@adminRegister');

/** Merchant Login/Register */
Route::get('/login/merchant', 'Auth\LoginController@showMerchantLoginForm');
Route::post('/login/merchant', 'Auth\LoginController@merchantLogin');
Route::get('/register/merchant', 'Auth\RegisterController@showMerchantRegisterForm');
Route::post('/register/merchant', 'Auth\RegisterController@merchantRegister');

/** Agent Login/Register */
Route::get('/login/agent', 'Auth\LoginController@showAgentLoginForm');
Route::post('/login/agent', 'Auth\LoginController@agentLogin');
Route::get('/register/agent', 'Auth\RegisterController@showAgentRegisterForm');
Route::post('/register/agent', 'Auth\RegisterController@agentRegister');

/** Admin Routes */
Route::redirect('/admin', '/admin/dashboard');

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::any('/update-types', 'InsuranceTypeController@update_types')->name('insurance.update-types');
});

/** Merchant Routes */
Route::redirect('/merchant', '/merchant/dashboard');

Route::group(['namespace' => 'Merchant', 'prefix' => 'merchant', 'as' => 'merchant'], function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
});

/** Agent Routes */
Route::redirect('/agent', '/agent/dashboard');

Route::group(['namespace' => 'Agent', 'prefix' => 'agent', 'as' => 'agent'], function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
});
