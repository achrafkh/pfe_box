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

Route::get('/fb', 'TestController@test');
Route::get('/fb2', 'TestController@test2');

Route::get('test', 'TestController@index')->name('test');





// Authentication Routes...
Route::get('/', 'Auth\LoginController@showLoginForm')->name('loginview');
Route::post('login', 'Auth\LoginController@login')->name('login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/login', function () {
    return redirect('/');
});


//  Routes des Operateurs...
Route::middleware('auth', 'IsCallcenter')->namespace('Callcenter')->prefix('op')->group(function () {
    Route::get('/', 'DashboardController@index');
    Route::get('/clients', 'ClientsController@index')->name('op');
    Route::get('/client/create', 'ClientsController@create')->name('addClientForm');
    

    Route::post('/client/create', 'ClientsController@store')->name('createClient');
    Route::post('/client/update', 'ClientsController@update')->name('updateClient');


    Route::get('/client/{client}', 'ClientsController@show')->name('showClient');
    Route::post('/client/{client}', 'ClientsController@delete')->name('deleteClient');
    Route::get('/client/{client}/edit', 'ClientsController@edit')->name('editClientForm');

    Route::post('/setappointment', 'AppointmentsController@setappointment')->name('setAppointment');
});

//  Routes des Commerciaux...
Route::middleware('auth', 'IsCommercial')->namespace('Commercial')->prefix('com')->group(function () {
    Route::get('/', 'DashboardController@index');
});


//  Routes des Marketeurs..
Route::middleware('auth', 'IsMarketer')->namespace('Marketer')->prefix('mark')->group(function () {
    Route::get('/', 'DashboardController@index');
});
