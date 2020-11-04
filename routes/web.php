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
Route::post('/trabajadores/cambioestado/{id}', [\App\Http\Controllers\TrabajadoresController::class, 'cambioestado'])->name('cambioestadoTrabajador');
Route::post('/trabajadores/comboestado', [\App\Http\Controllers\TrabajadoresController::class, 'comboestado'])->name('trabajador.comboestado');

/** Rutas Hijos Trabajador */
Route::get('/hijostrabajador',[\App\Http\Controllers\HijosTrabajadorController::class, 'index'])->name('hijosTrabajador.index');
Route::post('/hijostrabajador/listadoHijos', [\App\Http\Controllers\HijosTrabajadorController::class, 'listadoHijos'])->name('listadoHijosTrabajador');
Route::get('/hijostrabajador/edit/{id}', [\App\Http\Controllers\HijosTrabajadorController::class, 'edit'])->name('editHijosTrabajador');
Route::post('/hijostrabajador/update/{id}', [\App\Http\Controllers\HijosTrabajadorController::class, 'update'])->name('updateHijosTrabajador');
Route::get('/hijostrabajador/add/{id}', [\App\Http\Controllers\HijosTrabajadorController::class, 'add'])->name('addHijosTrabajador');
Route::post('/hijostrabajador/save', [\App\Http\Controllers\HijosTrabajadorController::class, 'save'])->name('saveHijosTrabajador');
Route::post('/hijostrabajador/delete/{id}', [\App\Http\Controllers\HijosTrabajadorController::class, 'delete'])->name('deleteHijosTrabajador');

/** Rutas Asignacion Trabajador */
Route::get('/asignaciontrabajador',[\App\Http\Controllers\AsignacionTrabajadorController::class, 'index'])->name('asignaciontrabajador.index');
Route::post('/asignaciontrabajador/listadoTrabajadores', [\App\Http\Controllers\AsignacionTrabajadorController::class, 'listadoTrabajadores'])->name('listadoTrabajadoresAsignados');
Route::get('/asignaciontrabajador/add/{id}', [\App\Http\Controllers\AsignacionTrabajadorController::class, 'add'])->name('addAsignacionTrabajador');
Route::post('/asignaciontrabajador/save', [\App\Http\Controllers\AsignacionTrabajadorController::class, 'save'])->name('saveAsignacionTrabajador');
/*Route::post('/asignaciontrabajador/save', function(){
    dd(request()->all());
})->name('saveAsignacionTrabajador');*/
Route::post('/asignaciontrabajador/delete/{id}', [\App\Http\Controllers\AsignacionTrabajadorController::class, 'delete'])->name('deleteAsignacionTrabajador');

/** Rutas Vacaciones Trabajador */
Route::get('/vacacion',[\App\Http\Controllers\VacacionController::class, 'index'])->name('vacacion.index');
Route::get('/vacacion/listadoVacacion/{doc}', [\App\Http\Controllers\VacacionController::class, 'listadoVacacion'])->name('listadoVacacion');
Route::post('/vacacion/save', [\App\Http\Controllers\VacacionController::class, 'save'])->name('saveVacacion');
Route::post('/vacacion/delete/{id}', [\App\Http\Controllers\VacacionController::class, 'delete'])->name('deleteVacacion');
