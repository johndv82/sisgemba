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
    return view('index');
});

/** Rutas Cliente*/
Route::get('/clientes', [\App\Http\Controllers\ClientesController::class, 'index'])->name('listadoClientes');
Route::get('/clientes/edit/{id}', [\App\Http\Controllers\ClientesController::class, 'edit'])->name('editCliente');
Route::post('/clientes/update/{id}', [\App\Http\Controllers\ClientesController::class, 'update'])->name('updateCliente');
Route::get('/clientes/add', [\App\Http\Controllers\ClientesController::class, 'add'])->name('addCliente');
Route::post('/clientes/save', [\App\Http\Controllers\ClientesController::class, 'save'])->name('saveCliente');
Route::post('/clientes/combodepend', [\App\Http\Controllers\ClientesController::class, 'combodepend'])->name('cliente.combodepend');
Route::post('/clientes/delete/{id}', [\App\Http\Controllers\ClientesController::class, 'delete'])->name('deleteCliente');

/** Rutas Trabajador*/
Route::get('/trabajadores', [\App\Http\Controllers\TrabajadoresController::class, 'index'])->name('listadoTrabajadores');
Route::get('/trabajadores/edit/{id}', [\App\Http\Controllers\TrabajadoresController::class, 'edit'])->name('editTrabajador');
Route::post('/trabajadores/update/{id}', [\App\Http\Controllers\TrabajadoresController::class, 'update'])->name('updateTrabajador');
Route::get('/trabajadores/add', [\App\Http\Controllers\TrabajadoresController::class, 'add'])->name('addTrabajador');
Route::post('/trabajadores/save', [\App\Http\Controllers\TrabajadoresController::class, 'save'])->name('saveTrabajador');
Route::post('/trabajadores/combodepend', [\App\Http\Controllers\TrabajadoresController::class, 'combodepend'])->name('trabajador.combodepend');
Route::post('/trabajadores/delete/{id}', [\App\Http\Controllers\TrabajadoresController::class, 'delete'])->name('deleteTrabajador');
