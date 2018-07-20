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

Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
    Route::get('conductores','Voyager\ConductorController@inicio');
    Route::get('asignacion','Voyager\ConductorController@asignacion');
    Route::get('clientes','Voyager\ClienteController@inicio');
    Route::get('validar','Voyager\UsuarioController@validar');
    Route::get('tipos-servicio','Voyager\ServicioController@tipoServicio');
    Route::get('tipo-auto','Voyager\CarController@tipoAuto');
    Route::get('tipos-de-pago','Voyager\PagoController@tipoPago');
    Route::get('configuraciones','Voyager\ConfiguracionController@configurar');
    Route::get('promociones','Voyager\PromocionController@mostrar');
    Route::get('contacto','Voyager\ContactoController@contacto');
    Route::get('servicio-panico/clientes','Voyager\ServicioClienteController@index');
    Route::get('servicio-panico/taxistas','Voyager\ServicioTaxistaController@index');
    Route::get('color','Voyager\ColorController@index');
    Route::get('modelo','Voyager\ModeloController@index');
    Route::get('notificaciones','Voyager\NotificacionController@index');
    Route::get('asignaciones','Voyager\AsignacionController@index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/contacto/sendcontact','ContactoController@sendcontact');
Route::get('/contacto','ContactoController@index');
