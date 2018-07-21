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
    Route::Post('conductores','Voyager\ConductorController@inicioNew');
    Route::get('asignacion','Voyager\ConductorController@asignacion');
    Route::post('asignacion','Voyager\ConductorController@asignacionNew');
    Route::get('clientes','Voyager\ClienteController@inicio');
    Route::post('clientes','Voyager\ClienteController@inicioNew');
    Route::get('validar','Voyager\UsuarioController@validar');
    Route::post('validar','Voyager\UsuarioController@validarNew');
    Route::get('tipos-servicio','Voyager\ServicioController@tipoServicio');
    Route::post('tipos-servicio','Voyager\ServicioController@tipoServicioNew');
    Route::get('tipo-auto','Voyager\CarController@tipoAuto');
    Route::post('tipo-auto','Voyager\CarController@tipoAutoNew');
    Route::get('tipos-de-pago','Voyager\PagoController@tipoPago');
    Route::post('tipos-de-pago','Voyager\PagoController@tipoPagoNew');
    Route::get('configuraciones','Voyager\ConfiguracionController@configurar');
    Route::post('configuraciones','Voyager\ConfiguracionController@configurarNew');
    Route::get('promociones','Voyager\PromocionController@mostrar');
    Route::post('promociones','Voyager\PromocionController@mostrarNew');
    Route::get('contacto','Voyager\ContactoController@mostrar');
    Route::post('contacto','Voyager\ContactoController@contactoNew');
    Route::get('servicio-panico/clientes','Voyager\ServicioController@servicioPanicoCliente');
    Route::post('servicio-panico/clientes','Voyager\ServicioController@servicioPanicoClienteNew');
    Route::get('servicio-panico/taxistas','Voyager\ServicioController@servicioPanicoTaxi');
    Route::post('servicio-panico/taxistas','Voyager\ServicioController@servicioPanicoTaxiNew');
    Route::get('color','Voyager\CarController@autoColor');
    Route::post('color','Voyager\CarController@autoColorNew');
    Route::get('modelo','Voyager\CarController@autoModelo');
    Route::post('modelo','Voyager\CarController@autoModeloNew');
    Route::get('marca','Voyager\CarController@autoMarca');
    Route::post('marca','Voyager\CarController@autoMarcaNew');
    Route::get('notificaciones','Voyager\NotificacionController@mostrar');
    Route::post('notificaciones','Voyager\NotificacionController@mostrarNew');
    Route::get('asignaciones','Voyager\AsignacionController@mostrar');
    Route::post('asignaciones','Voyager\AsignacionController@mostrarNew');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

