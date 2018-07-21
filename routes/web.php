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
    Route::post('conductores','Voyager\ConductorController@inicioNew');
    Route::get('conductores','Voyager\ConductorController@inicioEdit');
    Route::put('conductores','Voyager\ConductorController@inicioUpdate');
    Route::delete('conductores','Voyager\ConductorController@inicioDelete');
    
    Route::get('asignacion','Voyager\ConductorController@asignacion');
    Route::post('asignacion','Voyager\ConductorController@asignacionNew');
    Route::get('asignacion','Voyager\ConductorController@asignacionEdit');
    Route::put('asignacion','Voyager\ConductorController@asignacionUpdate');
    Route::delete('asignacion','Voyager\ConductorController@asignacionDelete');
    
    Route::get('clientes','Voyager\ClienteController@inicio');
    Route::post('clientes','Voyager\ClienteController@inicioNew');
    Route::get('clientes','Voyager\ClienteController@inicioEdit');
    Route::put('clientes','Voyager\ClienteController@inicioUpdate');
    Route::delete('clientes','Voyager\ClienteController@inicioDelete');
    
    Route::get('validar','Voyager\UsuarioController@validar');
    Route::post('validar','Voyager\UsuarioController@validarNew');
    Route::get('validar','Voyager\UsuarioController@validarEdit');
    Route::put('validar','Voyager\UsuarioController@validarUpdate');
    Route::delete('validar','Voyager\UsuarioController@validarDelete');

    Route::get('tipos-servicio','Voyager\ServicioController@tipoServicio');
    Route::post('tipos-servicio','Voyager\ServicioController@tipoServicioNew');
    Route::get('tipos-servicio','Voyager\ServicioController@tipoServicioEdit');
    Route::put('tipos-servicio','Voyager\ServicioController@tipoServicioUpdate');
    Route::delete('tipos-servicio','Voyager\ServicioController@tipoServicioDelete');

    Route::get('tipo-auto','Voyager\CarController@tipoAuto');
    Route::post('tipo-auto','Voyager\CarController@tipoAutoNew');
    Route::get('tipo-auto','Voyager\CarController@tipoAutoEdit');
    Route::put('tipo-auto','Voyager\CarController@tipoAutoUpdate');
    Route::delete('tipo-auto','Voyager\CarController@tipoAutoDelete');

    Route::get('tipos-de-pago','Voyager\PagoController@tipoPago');
    Route::post('tipos-de-pago','Voyager\PagoController@tipoPagoNew');
    Route::get('tipos-de-pago','Voyager\PagoController@tipoPagoEdit');
    Route::put('tipos-de-pago','Voyager\PagoController@tipoPagoUpdate');
    Route::delete('tipos-de-pago','Voyager\PagoController@tipoPagoDelete');

    Route::get('configuraciones','Voyager\ConfiguracionController@configurar');
    Route::post('configuraciones','Voyager\ConfiguracionController@configurarNew');
    Route::get('configuraciones','Voyager\ConfiguracionController@configurarEdit');
    Route::put('configuraciones','Voyager\ConfiguracionController@configurarUpdate');
    Route::delete('configuraciones','Voyager\ConfiguracionController@configurarDelete');

    Route::get('promociones','Voyager\PromocionController@mostrar');
    Route::post('promociones','Voyager\PromocionController@mostrarNew');
    Route::get('promociones','Voyager\PromocionController@mostrarNEdit');
    Route::put('promociones','Voyager\PromocionController@mostrarUpdate');
    Route::delete('promociones','Voyager\PromocionController@mostrarDelete');

    Route::get('contacto','Voyager\ContactoController@mostrar');
    Route::post('contacto','Voyager\ContactoController@contactoNew');
    Route::get('contacto','Voyager\ContactoController@contactoEdit');
    Route::put('contacto','Voyager\ContactoController@contactoUpdate');
    Route::delete('contacto','Voyager\ContactoController@contactoDelete');

    Route::get('servicio-panico/clientes','Voyager\ServicioController@servicioPanicoCliente');
    Route::post('servicio-panico/clientes','Voyager\ServicioController@servicioPanicoClienteNew');
    Route::get('servicio-panico/clientes','Voyager\ServicioController@servicioPanicoClienteEdit');
    Route::put('servicio-panico/clientes','Voyager\ServicioController@servicioPanicoClienteUpdate');
    Route::delete('servicio-panico/clientes','Voyager\ServicioController@servicioPanicoClienteDelete');

    Route::get('servicio-panico/taxistas','Voyager\ServicioController@servicioPanicoTaxi');
    Route::post('servicio-panico/taxistas','Voyager\ServicioController@servicioPanicoTaxiNew');
    Route::get('servicio-panico/taxistas','Voyager\ServicioController@servicioPanicoTaxiEdit');
    Route::put('servicio-panico/taxistas','Voyager\ServicioController@servicioPanicoTaxiUpdate');
    Route::delete('servicio-panico/taxistas','Voyager\ServicioController@servicioPanicoTaxiDelete');

    Route::get('color','Voyager\CarController@autoColor');
    Route::post('color','Voyager\CarController@autoColorNew');
    Route::get('color','Voyager\CarController@autoColorEdit');
    Route::put('color','Voyager\CarController@autoColorUpdate');
    Route::delete('color','Voyager\CarController@autoColorDelete');

    Route::get('modelo','Voyager\CarController@autoModelo');
    Route::post('modelo','Voyager\CarController@autoModeloNew');
    Route::get('modelo','Voyager\CarController@autoModeloEdit');
    Route::put('modelo','Voyager\CarController@autoModeloUpdate');
    Route::delete('modelo','Voyager\CarController@autoModeloDelete');

    Route::get('marca','Voyager\CarController@autoMarca');
    Route::post('marca','Voyager\CarController@autoMarcaNew');
    Route::get('marca','Voyager\CarController@autoMarcaEdit');
    Route::put('marca','Voyager\CarController@autoMarcaUpdate');
    Route::delete('marca','Voyager\CarController@autoMarcaDelete');

    Route::get('notificaciones','Voyager\NotificacionController@mostrar');
    Route::post('notificaciones','Voyager\NotificacionController@mostrarNew');
    Route::get('notificaciones','Voyager\NotificacionController@mostrarEdit');
    Route::put('notificaciones','Voyager\NotificacionController@mostrarUpdate');
    Route::delete('notificaciones','Voyager\NotificacionController@mostrarDelete');

    Route::get('asignaciones','Voyager\AsignacionController@mostrar');
    Route::post('asignaciones','Voyager\AsignacionController@mostrarNew');
    Route::get('asignaciones','Voyager\AsignacionController@mostrarEdit');
    Route::put('asignaciones','Voyager\AsignacionController@mostrarUpdate');
    Route::delete('asignaciones','Voyager\AsignacionController@mostrarDelete');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

