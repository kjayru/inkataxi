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
    Route::get('validar','Voyager\ValidarController@index');
    Route::get('tipos-servicio','Voyager\TiposServicioController@index');
    Route::get('tipo-auto','Voyager\TipoAutoController@index');
    Route::get('tipos-de-pago','Voyager\TiposPagosController@index');
    Route::get('configuraciones','Voyager\ConfiguracionController@index');
    Route::get('promociones','Voyager\PromocionController@index');
    Route::get('contacto','Voyager\ContactoController@index');
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
