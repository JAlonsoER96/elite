<?php

use Illuminate\Support\Facades\Route;

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

/* Rutas para cliente */
Route::get('/clientes/index', 'ClienteController@index')->name('clientes');

Route::get('/clientes/alta','ClienteController@formAlta')->name('alta-clientes');

Route::post('/clientes/save', 'ClienteController@save')->name('saveCliente');

Route::get('/clientes/update/{id}', 'ClienteController@obtenerPorId')->name('updateCliente');

Route::post('/clientes/update', 'ClienteController@guardaCambios')->name('saveUpdatesCliente');

Route::get('/clientes/softDelete/{id}','ClienteController@eliminacionLogica')->name('softDeleteCliente');

Route::get('/clientes/restore/{id}', 'ClienteController@restore')->name('restoreCliente');

Route::get('/clientes/delete/{id}', 'ClienteController@delete')->name('deleteCliente');

Route::get('/clientes/pdf/{id}', 'ClienteController@generarCuestionario')->name('pdf-cuestionario');


