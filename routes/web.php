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

    Route::get('/dash','Voyager\DashboardController@inicio');

    Route::get('conductores','Voyager\ConductorController@inicio');
    Route::post('conductores','Voyager\ConductorController@inicioNew');
    Route::get('conductores/detalles/{id}','Voyager\ConductorController@inicioEdit');
    Route::put('conductores/{id}','Voyager\ConductorController@inicioUpdate');
    Route::delete('conductores/{id}','Voyager\ConductorController@inicioDelete');
    
    Route::get('busqueda','Voyager\BusquedaController@inicio')->name('voyager.busqueda.crear');
    Route::post('busqueda','Voyager\BusquedaController@salvar')->name('voyager.busqueda.salvar');
    Route::get('conductores/{word}','Voyager\BusquedaController@busqueda');
    Route::get('conductores/{id}','Voyager\ConductorController@getdatos');
    Route::post('conductores/mapa','Voyager\ConductorController@viajemapa')->name('voyager.conductor.viajemapa');
    Route::put('conductores/sendestado/{id}','Voyager\ConductorController@sendestado');
    
    Route::get('asignacion','Voyager\AsignacionController@mostrar');
    Route::post('asignacion','Voyager\AsignacionController@asignacionNew');
    Route::get('asignacion/{id}/edit','Voyager\AsignacionController@asignacionEdit');
    Route::put('asignacion/{id}','Voyager\AsignacionController@asignacionUpdate');
    Route::delete('asignacion/{id}','Voyager\AsignacionController@asignacionDelete');
    
    Route::get('clientes','Voyager\ClienteController@inicio');
    Route::post('clientes','Voyager\ClienteController@inicioNew');
    Route::get('clientes/{id}/edit','Voyager\ClienteController@inicioEdit');
    Route::put('clientes/{id}','Voyager\ClienteController@inicioUpdate');
    Route::delete('clientes/{id}','Voyager\ClienteController@deleteuser');

    Route::get('clientes/viajes/{id}','Voyager\ClienteController@viajes');
    
    Route::get('validar','Voyager\UsuarioController@validar');
    Route::post('validar','Voyager\UsuarioController@validarNew');
    Route::get('validar/{id}/edit','Voyager\UsuarioController@validarEdit');
    Route::put('validar/{id}','Voyager\UsuarioController@validarUpdate');
    Route::delete('validar/{id}','Voyager\UsuarioController@validarDelete');

    Route::get('tipos-servicio','Voyager\ServicioController@tipoServicio');
    Route::post('tipos-servicio','Voyager\ServicioController@tipoServicioNew');
    Route::get('tipos-servicio/{id}/edit','Voyager\ServicioController@tipoServicioEdit');
    Route::put('tipos-servicio/{id}','Voyager\ServicioController@tipoServicioUpdate');
    Route::delete('tipos-servicio/{id}','Voyager\ServicioController@tipoServicioDelete');

    Route::get('tipo-auto','Voyager\CarController@tipoAuto');
    Route::post('tipo-auto','Voyager\CarController@tipoAutoNew');
    Route::get('tipo-auto/{id}/edit','Voyager\CarController@tipoAutoEdit');
    Route::put('tipo-auto/{id}','Voyager\CarController@tipoAutoUpdate');
    Route::delete('tipo-auto/{id}','Voyager\CarController@tipoAutoDelete');

    Route::get('tipos-de-pago','Voyager\PagoController@tipoPago');
    Route::post('tipos-de-pago','Voyager\PagoController@tipoPagoNew');
    Route::get('tipos-de-pago/{id}/edit','Voyager\PagoController@tipoPagoEdit');
    Route::put('tipos-de-pago/{id}','Voyager\PagoController@tipoPagoUpdate');
    Route::delete('tipos-de-pago/{id}','Voyager\PagoController@tipoPagoDelete');

    Route::get('configuraciones','Voyager\ConfiguracionController@configurar');
    Route::post('configuraciones','Voyager\ConfiguracionController@configurarNew');
    Route::get('configuraciones/{id}/edit','Voyager\ConfiguracionController@configurarEdit');
    Route::put('configuraciones/{id}','Voyager\ConfiguracionController@configurarUpdate');
    Route::delete('configuraciones/{id}','Voyager\ConfiguracionController@configurarDelete');

    Route::get('promociones','Voyager\PromocionController@mostrar');
    Route::post('promociones','Voyager\PromocionController@mostrarNew');
    Route::get('promociones/{id}/edit','Voyager\PromocionController@mostrarNEdit');
    Route::put('promociones/{id}','Voyager\PromocionController@mostrarUpdate');
    Route::delete('promociones/{id}','Voyager\PromocionController@mostrarDelete');

    Route::get('contacto','Voyager\ContactoController@mostrar');
    Route::post('contacto','Voyager\ContactoController@contactoNew');
    Route::get('contacto/{id}/edit','Voyager\ContactoController@getedit');
    Route::put('contacto/{id}','Voyager\ContactoController@contactoUpdate');
    Route::delete('contacto/{id}','Voyager\ContactoController@contactoDelete');

    Route::get('servicio-panico/clientes','Voyager\ServicioController@servicioPanicoCliente');
    Route::post('servicio-panico/clientes','Voyager\ServicioController@servicioPanicoClienteNew');
    Route::get('servicio-panico/clientes/{id}/edit','Voyager\ServicioController@servicioPanicoClienteEdit');
    Route::put('servicio-panico/clientes/{id}','Voyager\ServicioController@servicioPanicoClienteUpdate');
    Route::delete('servicio-panico/clientes/{id}','Voyager\ServicioController@servicioPanicoClienteDelete');

    Route::get('servicio-panico/taxistas','Voyager\ServicioController@servicioPanicoTaxi');
    Route::post('servicio-panico/taxistas','Voyager\ServicioController@servicioPanicoTaxiNew');
    Route::get('servicio-panico/taxistas/{id}/edit','Voyager\ServicioController@servicioPanicoTaxiEdit');
    Route::put('servicio-panico/taxistas/{id}','Voyager\ServicioController@servicioPanicoTaxiUpdate');
    Route::delete('servicio-panico/taxistas/{id}','Voyager\ServicioController@servicioPanicoTaxiDelete');

    Route::get('color','Voyager\CarController@autoColor');
    Route::post('color','Voyager\CarController@autoColorNew');
    Route::get('color/{id}/edit','Voyager\CarController@autoColorEdit');
    Route::put('color/{id}','Voyager\CarController@autoColorUpdate');
    Route::delete('color/{id}','Voyager\CarController@autoColorDelete');

    Route::get('modelo','Voyager\CarController@autoModelo');
    Route::post('modelo','Voyager\CarController@autoModeloNew');
    Route::get('modelo/{id}/edit','Voyager\CarController@autoModeloEdit');
    Route::put('modelo/{id}','Voyager\CarController@autoModeloUpdate');
    Route::delete('modelo/{id}','Voyager\CarController@autoModeloDelete');

    Route::get('marca','Voyager\CarController@autoMarca');
    Route::post('marca','Voyager\CarController@autoMarcaNew');
    Route::get('marca/{id}/edit','Voyager\CarController@autoMarcaEdit');
    Route::put('marca/{id}','Voyager\CarController@autoMarcaUpdate');
    Route::delete('marca/{id}','Voyager\CarController@autoMarcaDelete');

    Route::get('notificaciones','Voyager\NotificacionController@mostrar');
    Route::post('notificaciones','Voyager\NotificacionController@mostrarNew');
    Route::get('notificaciones/{id}/edit','Voyager\NotificacionController@mostrarEdit');
    Route::put('notificaciones/{id}','Voyager\NotificacionController@mostrarUpdate');
    Route::delete('notificaciones/{id}','Voyager\NotificacionController@mostrarDelete');

    Route::get('asignaciones','Voyager\AsignacionController@mostrar');
    Route::post('asignaciones','Voyager\AsignacionController@mostrarNew');
    Route::get('asignaciones/{id}/edit','Voyager\AsignacionController@mostrarEdit');
    Route::put('asignaciones/{id}','Voyager\AsignacionController@mostrarUpdate');
    Route::delete('asignaciones/{id}','Voyager\AsignacionController@mostrarDelete');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');