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
    Route::get('conductores','Voyager\ConductorController@index');
    Route::get('asignacion','Voyager\ConductorController@index');
    Route::get('clientes','Voyager\ConductorController@index');
    Route::get('validar','Voyager\ConductorController@index');
    Route::get('tipos-servicio','Voyager\ConductorController@index');
    Route::get('tipo-auto','Voyager\ConductorController@index');
    Route::get('tipos-de-pago','Voyager\ConductorController@index');
    Route::get('configuraciones','Voyager\ConductorController@index');
    Route::get('promociones','Voyager\ConductorController@index');
    Route::get('contacto','Voyager\ConductorController@index');
    Route::get('servicio-panico/clientes','Voyager\ConductorController@index');
    Route::get('servicio-panico/taxistas','Voyager\ConductorController@index');
    Route::get('color','Voyager\ConductorController@index');
    Route::get('modelo','Voyager\ConductorController@index');
    Route::get('notificaciones','Voyager\ConductorController@index');
    Route::get('asignaciones','Voyager\ConductorController@index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/contacto/sendcontact','ContactoController@sendcontact');
Route::get('/contacto','ContactoController@index');
