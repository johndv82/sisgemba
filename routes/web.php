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

Route::get('/clientes', [\App\Http\Controllers\ClientesController::class, 'index'])->name('listadoClientes');

Route::get('/clientes/edit/{id}', [\App\Http\Controllers\ClientesController::class, 'edit'])->name('editCliente');
Route::get('/clientes/add', [\App\Http\Controllers\ClientesController::class, 'add'])->name('addCliente');
Route::post('/clientes/save', [\App\Http\Controllers\ClientesController::class, 'save'])->name('saveCliente');

Route::post('/clientes/combodepend', [\App\Http\Controllers\ClientesController::class, 'combodepend'])->name('cliente.combodepend');
