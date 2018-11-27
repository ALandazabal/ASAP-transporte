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

Auth::routes();

Route::get('/', 'HomeController@index')->name('index');

Route::post('/contizacionForm', 'HomeController@contizacionForm')->name('contizacionForm');


Route::post('/transfer/contact', 'TransferController@ContactForm')->name('transfer.contact');
Route::get('/transfer/contact', 'TransferController@ContactForm')->name('transfer.contact');
Route::get('/transfer/create', 'TransferController@create')->name('transfer.create');
//Route::resource('transfer', 'TransferController');

//-- Para todos cualquiera con sesión iniciada
Route::group(['middleware' => ['auth']], function () {
	Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');
	//Transfers
	Route::post('/transfer', 'TransferController@store')->name('transfer.store');
});

//-- Administradores
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    Route::resource('users','UsersController');
    Route::resource('sliderconfig', 'SliderController');
    Route::resource('comuna', 'ComunaController');
    Route::resource('vehicle', 'VehicleController');
    //Transfers
    Route::get('transfer', 'TransferController@index')->name('transfer.index');
    Route::patch('transfer/{transfer}', 'TransferController@update')->name('transfer.update');
    Route::get('transfer/{transfer}', 'TransferController@show')->name('transfer.show');
    Route::get('transfer/{transfer}/edit', 'TransferController@edit');
});

Route::get('/servicio', function () {
    return view('servicio');
});

Route::get('/contacto', function () {
    return view('contacto');
});

Route::get('/info', function () {
    return view('info');
});