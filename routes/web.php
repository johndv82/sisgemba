<?php

use Illuminate\Support\Facades\Route;

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

/** Rutas Mantenimiento */
//Estado Civil
Route::get('/estadocivil',[\App\Http\Controllers\EstadoCivilController::class, 'index'])->name('estadocivil');
Route::post('/estadocivil/listado', [\App\Http\Controllers\EstadoCivilController::class, 'listado'])->name('listadoEstadoCivil');
Route::post('/estadocivil/save', [\App\Http\Controllers\EstadoCivilController::class, 'save'])->name('saveEstadoCivil');
Route::post('/estadocivil/delete/{id}', [\App\Http\Controllers\EstadoCivilController::class, 'delete'])->name('deleteEstadoCivil');

//Nivel Estudios
Route::get('/nivelestudios',[\App\Http\Controllers\NivelEstudiosController::class, 'index'])->name('nivelestudios');
Route::post('/nivelestudios/listado', [\App\Http\Controllers\NivelEstudiosController::class, 'listado'])->name('listadoNivelEstudios');
Route::post('/nivelestudios/save', [\App\Http\Controllers\NivelEstudiosController::class, 'save'])->name('saveNivelEstudios');
Route::post('/nivelestudios/delete/{id}', [\App\Http\Controllers\NivelEstudiosController::class, 'delete'])->name('deleteNivelEstudios');

//Tipo Documento
Route::get('/tipodocumento',[\App\Http\Controllers\TipoDocumentoController::class, 'index'])->name('tipodocumento');
Route::post('/tipodocumento/listado', [\App\Http\Controllers\TipoDocumentoController::class, 'listado'])->name('listadoTipoDocumento');
Route::post('/tipodocumento/save', [\App\Http\Controllers\TipoDocumentoController::class, 'save'])->name('saveTipoDocumento');
Route::post('/tipodocumento/delete/{id}', [\App\Http\Controllers\TipoDocumentoController::class, 'delete'])->name('deleteTipoDocumento');

//Cargo Laboral
Route::get('/cargolaboral',[\App\Http\Controllers\CargoLaboralController::class, 'index'])->name('cargolaboral');
Route::post('/cargolaboral/listado', [\App\Http\Controllers\CargoLaboralController::class, 'listado'])->name('listadoCargoLaboral');
Route::post('/cargolaboral/save', [\App\Http\Controllers\CargoLaboralController::class, 'save'])->name('saveCargoLaboral');
Route::post('/cargolaboral/delete/{id}', [\App\Http\Controllers\CargoLaboralController::class, 'delete'])->name('deleteCargoLaboral');

//Vinculo Laboral
Route::get('/vinculolaboral',[\App\Http\Controllers\VinculoLaboralController::class, 'index'])->name('vinculolaboral');
Route::post('/vinculolaboral/listado', [\App\Http\Controllers\VinculoLaboralController::class, 'listado'])->name('listadoVinculoLaboral');
Route::post('/vinculolaboral/save', [\App\Http\Controllers\VinculoLaboralController::class, 'save'])->name('saveVinculoLaboral');
Route::post('/vinculolaboral/delete/{id}', [\App\Http\Controllers\VinculoLaboralController::class, 'delete'])->name('deleteVinculoLaboral');

//Regimen Pension
Route::get('/regimenpension',[\App\Http\Controllers\RegimenPensionController::class, 'index'])->name('regimenpension');
Route::post('/regimenpension/listado', [\App\Http\Controllers\RegimenPensionController::class, 'listado'])->name('listadoRegimenPension');
Route::post('/regimenpension/save', [\App\Http\Controllers\RegimenPensionController::class, 'save'])->name('saveRegimenPension');
Route::post('/regimenpension/delete/{id}', [\App\Http\Controllers\RegimenPensionController::class, 'delete'])->name('deleteRegimenPension');

//Regimen Salud
Route::get('/regimensalud',[\App\Http\Controllers\RegimenSaludController::class, 'index'])->name('regimensalud');
Route::post('/regimensalud/listado', [\App\Http\Controllers\RegimenSaludController::class, 'listado'])->name('listadoRegimenSalud');
Route::post('/regimensalud/save', [\App\Http\Controllers\RegimenSaludController::class, 'save'])->name('saveRegimenSalud');
Route::post('/regimensalud/delete/{id}', [\App\Http\Controllers\RegimenSaludController::class, 'delete'])->name('deleteRegimenSalud');

//Periodicidad Remuneración
Route::get('/periodicidadremuneracion',[\App\Http\Controllers\PeriodicidadRemuneracionController::class, 'index'])->name('periodicidadremuneracion');
Route::post('/periodicidadremuneracion/listado', [\App\Http\Controllers\PeriodicidadRemuneracionController::class, 'listado'])->name('listadoPeriodicidadRemuneracion');
Route::post('/periodicidadremuneracion/save', [\App\Http\Controllers\PeriodicidadRemuneracionController::class, 'save'])->name('savePeriodicidadRemuneracion');
Route::post('/periodicidadremuneracion/delete/{id}', [\App\Http\Controllers\PeriodicidadRemuneracionController::class, 'delete'])->name('deletePeriodicidadRemuneracion');

//Tipo Contrato
Route::get('/tipocontrato',[\App\Http\Controllers\TipoContratoController::class, 'index'])->name('tipocontrato');
Route::post('/tipocontrato/listado', [\App\Http\Controllers\TipoContratoController::class, 'listado'])->name('listadoTipoContrato');
Route::post('/tipocontrato/save', [\App\Http\Controllers\TipoContratoController::class, 'save'])->name('saveTipoContrato');
Route::post('/tipocontrato/delete/{id}', [\App\Http\Controllers\TipoContratoController::class, 'delete'])->name('deleteTipoContrato');

//Tipo Trabajador Asignado
Route::get('/tipotrabajadorasig',[\App\Http\Controllers\TipoTrabajadorAsigController::class, 'index'])->name('tipotrabajadorasig');
Route::post('/tipotrabajadorasig/listado', [\App\Http\Controllers\TipoTrabajadorAsigController::class, 'listado'])->name('listadoTipoTrabajadorAsig');
Route::post('/tipotrabajadorasig/save', [\App\Http\Controllers\TipoTrabajadorAsigController::class, 'save'])->name('saveTipoTrabajadorAsig');
Route::post('/tipotrabajadorasig/delete/{id}', [\App\Http\Controllers\TipoTrabajadorAsigController::class, 'delete'])->name('deleteTipoTrabajadorAsig');

//Banco
Route::get('/banco',[\App\Http\Controllers\BancoController::class, 'index'])->name('banco');
Route::post('/banco/listado', [\App\Http\Controllers\BancoController::class, 'listado'])->name('listadoBanco');
Route::post('/banco/save', [\App\Http\Controllers\BancoController::class, 'save'])->name('saveBanco');
Route::post('/banco/delete/{id}', [\App\Http\Controllers\BancoController::class, 'delete'])->name('deleteBanco');

//Pais
Route::get('/pais',[\App\Http\Controllers\PaisController::class, 'index'])->name('pais');
Route::post('/pais/listado', [\App\Http\Controllers\PaisController::class, 'listado'])->name('listadoPais');
Route::post('/pais/save', [\App\Http\Controllers\PaisController::class, 'save'])->name('savePais');
Route::post('/pais/delete/{id}', [\App\Http\Controllers\PaisController::class, 'delete'])->name('deletePais');

//Departamento
Route::get('/departamento',[\App\Http\Controllers\DepartamentoController::class, 'index'])->name('departamento');
Route::post('/departamento/listado', [\App\Http\Controllers\DepartamentoController::class, 'listado'])->name('listadoDepartamento');
Route::post('/departamento/save', [\App\Http\Controllers\DepartamentoController::class, 'save'])->name('saveDepartamento');
Route::post('/departamento/delete/{id}', [\App\Http\Controllers\DepartamentoController::class, 'delete'])->name('deleteDepartamento');
