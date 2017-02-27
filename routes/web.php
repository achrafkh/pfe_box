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

// Authentication Routes...
Route::get('/', 'Auth\LoginController@showLoginForm')->name('loginview');
Route::post('login', 'Auth\LoginController@login')->name('login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');


//  Routes des Operateurs...
Route::middleware('IsCallcenter')->namespace('Callcenter')->prefix('op')->group(function () {
    Route::get('/', 'DashboardController@index');
});

//  Routes des Commerciaux...
Route::middleware('IsCommercial')->namespace('Commercial')->prefix('com')->group(function () {
    Route::get('/', 'DashboardController@index');
});


//  Routes des Marketeurs..
Route::middleware('IsMarketer')->namespace('Marketer')->prefix('mark')->group(function () {
    Route::get('/', 'DashboardController@index');
});
