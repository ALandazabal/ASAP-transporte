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

use App\Mail\Transfer;

Auth::routes();

Route::get('/', 'HomeController@index')->name('index');

Route::post('/contizacionForm', 'HomeController@contizacionForm')->name('contizacionForm');


Route::post('/transfer/contact', 'TransferController@ContactForm')->name('transfer.contact');
Route::get('/transfer/contact', 'TransferController@ContactForm')->name('transfer.contact');
Route::get('/transfer/create', 'TransferController@create')->name('transfer.create');

Route::post('/transfer/result', 'TransferController@result')->name('transfer.result');
Route::get('/transfer/result', 'TransferController@result')->name('transfer.result');

//Route::resource('transfer', 'TransferController');

//-- Para todos cualquiera con sesión iniciada
Route::group(['middleware' => ['auth']], function () {
	Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');
	//Transfers
	Route::post('/transfer', 'TransferController@store')->name('transfer.store');
});

//-- Administradores
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    /*Route::resource('users','UsersController');*/
    Route::resource('sliderconfig', 'SliderController');
    Route::resource('comuna', 'ComunaController');
    Route::resource('vehicle', 'VehicleController');
    //Transfers
    Route::get('transfer', 'TransferController@index')->name('transfer.index');
    Route::patch('transfer/{transfer}', 'TransferController@update')->name('transfer.update');
    Route::get('transfer/{transfer}/show', 'TransferController@show');
   /* Route::get('transfer/{transfer}/edit', 'TransferController@edit');*/
});
Route::resource('users','UsersController');

/*Route::get('transfer', 'TransferController@index')->name('transfer.index');
    Route::patch('transfer/{transfer}', 'TransferController@update')->name('transfer.update');
    Route::get('transfer/{transfer}/show', 'TransferController@show');*/
    Route::get('transfer/{transfer}/edit', 'TransferController@edit');

Route::get('/dahboard', 'TransferController@indexu')->name('transfer.indexu');
Route::patch('/transfer/{transfer}', 'TransferController@cancel')->name('transfer.cancel');

Route::get('/servicio', function () {
    return view('servicio');
});

Route::get('/galeria', function () {
    return view('galeria');
});

Route::get('/contacto', function () {
    return view('contacto');
});

Route::get('/info', function () {
    return view('info');
});

Route::get('email', function(){
    $user = new App\User(['name'=>'admin']);
    return new Transfer($user);
});

Route::post('/pagar', function () {
    return view('transfer/accept');
});
/*Route::post('/pagar', 'HomeController@contizacionForm')->name('contizacionForm');*/

Route::resource('precios', 'PrecioController');

Route::get('comunas/{id}','HomeController@getComunas');
Route::get('/transfer-comuna/{id}','TransferController@getComunas');