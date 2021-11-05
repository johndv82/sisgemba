<?php

namespace App\Http\Controllers;

use App\AsignacionTrabajador;
use App\Banco;
use App\CargoLaboral;
use App\Cliente;
use App\PeriodicidadRemuneracion;
use App\RegimenPension;
use App\RegimenSalud;
use App\TipoContrato;
use App\TipoTrabajadorAsig;
use App\Trabajador;
use App\VinculoLaboral;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AsignacionTrabajadorController extends Controller
{
    public function index()
    {
        return view('asignaciontrabajador.listado');
    }

    public function listadoTrabajadores(Request $request)
    {
        $cliente = Cliente::where('ruc', $request->get('ruc_cliente'))->get(['id', 'razonsocial', 'nombrecomercial', 'ruc'])->first();
        $trabajadoresAsig = null;
        $respuesta = 200;
        if ($cliente != null) {
            $trabajadoresAsig = AsignacionTrabajador::with(['cargolaboral', 'trabajador', 'trabajador.tipodocumento'])
                ->where([['cliente_id', $cliente->id], ['estado', 1]])
                ->get();
        } else {
            $respuesta = 404;
        }
        return response()->json(['cliente' => $cliente, 'code' => $respuesta, 'trabajadores_asignados' => $trabajadoresAsig]);
    }

    public function add($id) //Id de Cliente
    {
        $cliente = Cliente::find($id);
        $trabajadores = Trabajador::has('asignaciones','=', 0)->get();
        $cargos_laborales = CargoLaboral::all();
        $vinculos_laborales = VinculoLaboral::all();
        $regimenes_pension = RegimenPension::all();
        $regimenes_salud = RegimenSalud::all();
        $tipos_contrato = TipoContrato::all();
        $periodicidades_remuneracion = PeriodicidadRemuneracion::all();
        $tipos_trabajador_asig = TipoTrabajadorAsig::all();
        $bancos = Banco::all();
        return view('asignaciontrabajador.registro',
            compact(
                'cargos_laborales',
                'cliente',
                'trabajadores',
                'cargos_laborales',
                'vinculos_laborales',
                'regimenes_pension',
                'regimenes_salud',
                'tipos_contrato',
                'periodicidades_remuneracion',
                'tipos_trabajador_asig',
                'bancos'));
    }

    public function edit($id){ //Id de Asignacion
        $asignacion = AsignacionTrabajador::with(['cliente', 'trabajador'])->find($id);
        $cargos_laborales = CargoLaboral::all();
        $vinculos_laborales = VinculoLaboral::all();
        $regimenes_pension = RegimenPension::all();
        $regimenes_salud = RegimenSalud::all();
        $tipos_contrato = TipoContrato::all();
        $periodicidades_remuneracion = PeriodicidadRemuneracion::all();
        $tipos_trabajador_asig = TipoTrabajadorAsig::all();
        $bancos = Banco::all();
        return view('asignaciontrabajador.actualizacion',
            compact(
                'asignacion',
                'cargos_laborales',
                'cargos_laborales',
                'vinculos_laborales',
                'regimenes_pension',
                'regimenes_salud',
                'tipos_contrato',
                'periodicidades_remuneracion',
                'tipos_trabajador_asig',
                'bancos'));
    }

    public function save(Request $request){
        $asignacion_trabajador = new AsignacionTrabajador();

        $deposito_sueldo = json_encode(array(
            'banco' => $request->input('banco'),
            'numerocuenta' => $request->input('numero_cuenta'),
            'cuentacci' => $request->input('cuenta_cci'),
        ));

        $material_trabajo = json_encode(array(
            'equipomovil' => $request->input('equipo_movil'),
            'laptop' => $request->input('laptop'),
            'correocorporativo' => $request->input('correo_corporativo'),
        ));

        $documentacion = json_encode(array(
            'cv' => $request->exists('cv'),
            'dni' => $request->exists('dni_fisico'),
            'reciboservicios' => $request->exists('recibo_servicios'),
            'fichaingreso' => $request->exists('ficha_ingreso'),
            'contrato' => $request->exists('contrato'),
            'consultaequifax' => $request->exists('consulta_equifax'),
        ));

        $motivo_cese = json_encode(array(
            'motivo' => $request->input('motivo_cese'),
            'sinrenovacioncontrato' => $request->exists('sin_renovacion'),
            'fechaentregaliquidacion' => $request->input('fecha_entrega_liquidacion'),
        ));

        $asignacion_trabajador->trabajador_id = $request->get('trabajador');
        $asignacion_trabajador->fechaingreso = Carbon::createFromFormat('d/m/Y', $request->get('fecha_ingreso'))->format('Y-m-d');
        $asignacion_trabajador->cargolaboral_id = $request->get('cargo_laboral');
        $asignacion_trabajador->vinculolaboral_id = $request->get('vinculo_laboral');
        $asignacion_trabajador->remuneracion = $request->get('remuneracion');
        $asignacion_trabajador->horario = $request->get('horario');
        $asignacion_trabajador->cliente_id = $request->get('hidIdCliente');
        $asignacion_trabajador->regimenpension_id = $request->get('regimen_pension');
        $asignacion_trabajador->regimensalud_id = $request->get('regimen_salud');
        $asignacion_trabajador->periodicidadremuneracion_id = $request->get('periodicidad_remuneracion');
        $asignacion_trabajador->tipocontrato_id = $request->get('tipo_contrato');
        $asignacion_trabajador->tipotrabajadorasig_id = $request->get('tipo_trabajo');
        $asignacion_trabajador->depositosueldo = $deposito_sueldo;
        $asignacion_trabajador->materialtrabajo = $material_trabajo;
        $asignacion_trabajador->documentacion = $documentacion;
        $asignacion_trabajador->motivocese = $motivo_cese;
        $asignacion_trabajador->estado = true;
        $asignacion_trabajador->save();

        return redirect('/asignaciontrabajador')->with('success', 'Trabajador Asignado correctamente!!');
    }


    public function update(Request $request, $id){
        $asignacion_trabajador_buscado = AsignacionTrabajador::find($id);

        $deposito_sueldo = json_encode(array(
            'banco' => $request->input('banco'),
            'numerocuenta' => $request->input('numero_cuenta'),
            'cuentacci' => $request->input('cuenta_cci'),
        ));

        $material_trabajo = json_encode(array(
            'equipomovil' => $request->input('equipo_movil'),
            'laptop' => $request->input('laptop'),
            'correocorporativo' => $request->input('correo_corporativo'),
        ));

        $documentacion = json_encode(array(
            'cv' => $request->exists('cv'),
            'dni' => $request->exists('dni_fisico'),
            'reciboservicios' => $request->exists('recibo_servicios'),
            'fichaingreso' => $request->exists('ficha_ingreso'),
            'contrato' => $request->exists('contrato'),
            'consultaequifax' => $request->exists('consulta_equifax'),
        ));

        $motivo_cese = json_encode(array(
            'motivo' => $request->input('motivo_cese'),
            'sinrenovacioncontrato' => $request->exists('sin_renovacion'),
            'fechaentregaliquidacion' => $request->input('fecha_entrega_liquidacion'),
        ));

        $asignacion_trabajador_buscado->fechaingreso = Carbon::createFromFormat('d/m/Y', $request->get('fecha_ingreso'))->format('Y-m-d');
        $asignacion_trabajador_buscado->cargolaboral_id = $request->get('cargo_laboral');
        $asignacion_trabajador_buscado->vinculolaboral_id = $request->get('vinculo_laboral');
        $asignacion_trabajador_buscado->remuneracion = $request->get('remuneracion');
        $asignacion_trabajador_buscado->horario = $request->get('horario');
        $asignacion_trabajador_buscado->regimenpension_id = $request->get('regimen_pension');
        $asignacion_trabajador_buscado->regimensalud_id = $request->get('regimen_salud');
        $asignacion_trabajador_buscado->periodicidadremuneracion_id = $request->get('periodicidad_remuneracion');
        $asignacion_trabajador_buscado->tipocontrato_id = $request->get('tipo_contrato');
        $asignacion_trabajador_buscado->tipotrabajadorasig_id = $request->get('tipo_trabajo');
        $asignacion_trabajador_buscado->depositosueldo = $deposito_sueldo;
        $asignacion_trabajador_buscado->materialtrabajo = $material_trabajo;
        $asignacion_trabajador_buscado->documentacion = $documentacion;
        $asignacion_trabajador_buscado->motivocese = $motivo_cese;
        $asignacion_trabajador_buscado->save();

        return redirect('/asignaciontrabajador')->with('success', 'Asignación actualizada correctamente!!');
    }

    public function delete($id){
        $asignacion_trabajador = AsignacionTrabajador::find($id);
        $asignacion_trabajador->estado = false;
        $asignacion_trabajador->save();
        return redirect('/asignaciontrabajador')->with('success', 'Asignación de Trabajador anulada correctamente!!');
    }
}
