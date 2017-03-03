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

Route::get('test', 'TestController@index')->name('test');


//  Routes des Operateurs...
Route::middleware('IsCallcenter')->namespace('Callcenter')->prefix('op')->group(function () {
    Route::get('/', 'DashboardController@index')->name('op');
    Route::get('/client/{lead}', 'DashboardController@show')->name('showClient');
    Route::post('/client/{lead}', 'DashboardController@delete')->name('deleteClient');
});

//  Routes des Commerciaux...
Route::middleware('IsCommercial')->namespace('Commercial')->prefix('com')->group(function () {
    Route::get('/', 'DashboardController@index');
});


//  Routes des Marketeurs..
Route::middleware('IsMarketer')->namespace('Marketer')->prefix('mark')->group(function () {
    Route::get('/', 'DashboardController@index');
});


Route::get('/testing', function () {
    $ad = new App\Ad;
    $ad->title = "the ad";
    $ad->description = "the desc";
    $ad->status = "active";
    $ad->save();

    $client = new App\Client;
    $client->name = "elpach";
    $client->email = "azee-".rand()."@azezae.ze";
    $client->phone = "232".rand()."3223";
    $client->address = "rue 118 charles";
    $client->city = "mahdia";
    $client->state = "mahdia";
    $client->save();
 
    $lead = new App\Lead;
    $lead->ad_id = $ad->id;
    $lead->client_id = $client->id;
    $lead->status = "unconfirmed";
    $lead->save();




    return "k";
});
