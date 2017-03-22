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

        Route::get('/login', function () {
            return redirect('/');
        });


//  Routes des Operateurs...
        Route::middleware(['auth', 'role:op'])->namespace('Callcenter')->prefix('op')->group(function () {
            Route::get('/', 'DashboardController@index');
            Route::get('/clients', 'ClientsController@index')->name('op');
            Route::get('/client/create', 'ClientsController@create')->name('addClientForm');
    

            Route::post('/client/create', 'ClientsController@store')->name('createClient');
            Route::post('/client/update', 'ClientsController@update')->name('updateClient');


            Route::get('/client/{client}', 'ClientsController@show')->name('showClient');
            Route::post('/client/{client}', 'ClientsController@delete')->name('deleteClient');
            Route::get('/client/{client}/edit', 'ClientsController@edit')->name('editClientForm');

            Route::post('/setappointment', 'AppointmentsController@setAppointment')->name('setAppointment');
            Route::post('/updateappointment', 'AppointmentsController@updateAppointment')->name('updateAppointment');
            Route::post('/checkavailable', 'AppointmentsController@checkAvailable');
            Route::post('/updateapptime', 'AppointmentsController@updateTime');
        });

//  Routes des Commerciaux...
        Route::middleware(['auth', 'role:com'])->namespace('Commercial')->prefix('com')->group(function () {
            Route::get('/', 'DashboardController@index')->name('com');
            Route::get('/appointments', 'AppointmentsController@index')->name('apps');
            Route::post('/updatestatus', 'AppointmentsController@updateStatus')->name('updateStatus');
            Route::post('/getevents', 'AppointmentsController@getEvents')->name('getEvents');
        });


//  Routes des Marketeurs..
        Route::middleware(['auth', 'role:mark'])->namespace('Marketer')->prefix('mark')->group(function () {
            Route::get('/', 'DashboardController@index')->name('mark');
            Route::get('/api', 'DashboardController@getBarData');
        });
