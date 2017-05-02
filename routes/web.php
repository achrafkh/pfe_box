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

Route::post('/getleads','Admin\FacebookController@HandleWebhook');
Route::get('/getleads','Admin\FacebookController@validateWH');

// Authentication Routes...
Route::get('/', 'Auth\LoginController@showLoginForm')->name('loginview');

Route::post('login', 'Auth\LoginController@login')->name('login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/login', function () {
    return redirect('/');
});
//  Routes des Operateurs...
Route::middleware(['auth', 'role:op'])->namespace('Callcenter')->prefix('op')->group(function () {
    Route::get('/dashboard', 'ClientsController@index')->name('op');
    Route::get('/client/create', 'ClientsController@create')->name('addClientForm');
    Route::get('/getclients', 'ClientsController@getClients')->name('getClients');
    Route::post('/client/create', 'ClientsController@store')->name('createClient');
    Route::post('/client/update', 'ClientsController@update')->name('updateClient');
    Route::get('/client/{client}', 'ClientsController@show')->name('showClient');
    Route::post('/client/{client}', 'ClientsController@delete')->name('deleteClient');
    Route::get('/client/{client}/edit', 'ClientsController@edit')->name('editClientForm');
    Route::post('/setappointment', 'AppointmentsController@setAppointment')->name('setAppointment');
    Route::post('/updateappointment', 'AppointmentsController@updateAppointment')->name('updateAppointment');
    Route::get('/checkavailable', 'AppointmentsController@checkAvailable');
    Route::post('/updateapptime', 'AppointmentsController@updateTime');
});
//  Routes des Commerciaux...
Route::middleware(['auth', 'role:com'])->namespace('Commercial')->prefix('com')->group(function () {
    Route::get('/getclients', 'ClientsController@getClients')->name('getClientsCom');
    Route::get('/clients', 'ClientsController@index')->name('ClientsCom');
    Route::get('/client/{client}', 'ClientsController@show')->name('showClientCom');
    Route::get('/appointments', 'AppointmentsController@index')->name('com');
    Route::post('/updatestatus', 'AppointmentsController@updateStatus')->name('updateStatus');
    Route::post('/getevents', 'AppointmentsController@getEvents')->name('getEvents');
});
//  Routes des Marketeurs..
Route::middleware(['auth', 'role:mark'])->namespace('Marketer')->prefix('mark')->group(function () {
    Route::get('/dashboard', 'DashboardController@index')->name('mark');
    Route::get('/showrooms', 'DashboardController@showrooms')->name('Showrooms');
    Route::get('/showroom/{showroom}', 'DashboardController@show')->name('singleShowroom');
    Route::get('/api', 'DashboardController@getBarData');
});


Route::middleware(['auth', 'role:admin'])->namespace('Admin')->prefix('admin')->group(function () {

    Route::get('/appointments', 'AppointmentsController@index')->name('admin');
    Route::post('/updatestatus', 'AppointmentsController@updateStatus');
    Route::post('/getevents', 'AppointmentsController@getEvents');
    Route::resource('users', 'UsersController');

    Route::get('/pages', 'FacebookController@index')->middleware('settings');
    Route::get('/pages/settings', 'FacebookController@settings');
    Route::post('/pages/settings', 'FacebookController@setSettings');
    Route::get('/pages/edit', 'FacebookController@edit');
    Route::patch('/pages/update', 'FacebookController@setSettings');
    Route::post('/leads/sync ', 'FacebookController@sync');
    Route::get('/pages/gettoken ', 'FacebookController@getPageToken');
    Route::delete('/form/delete/{id}', 'FacebookController@deleteFrom');
    Route::get('/leads/{id}', 'FacebookController@getLeads');
    Route::get('/forms/create', 'FacebookController@showForm');
    Route::post('/forms/create', 'FacebookController@store');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('invoices', 'InvoicesController');
    Route::get('invoice/{showroom}/{appointment}', 'InvoicesController@showInvoice');
    Route::get('invoice/{showroom}/{appointment}/create', 'InvoicesController@create');
    Route::post('invoice/create', 'InvoicesController@store');
});


Route::get('/getdb', function () {
    $connectstr_dbhost = '';
    $connectstr_dbname = '';
    $connectstr_dbusername = '';
    $connectstr_dbpassword = '';
    foreach ($_SERVER as $key => $value) {
        if (strpos($key, "MYSQLCONNSTR_") !== 0) {
            continue;
        }
        
        $connectstr_dbhost = preg_replace("/^.*Data Source=(.+?);.*$/", "\\1", $value);
        $connectstr_dbname = preg_replace("/^.*Database=(.+?);.*$/", "\\1", $value);
        $connectstr_dbusername = preg_replace("/^.*User Id=(.+?);.*$/", "\\1", $value);
        $connectstr_dbpassword = preg_replace("/^.*Password=(.+?)$/", "\\1", $value);
    }

    echo "host: " .$connectstr_dbhost;
    echo "<br>";
    echo "db name: " .$connectstr_dbname;
    echo "<br>";
    echo "user: " .$connectstr_dbusername;
    echo "<br>";
    echo "pwd: " .$connectstr_dbpassword;
    echo "<br>";
});
