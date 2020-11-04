<?php

namespace App\Http\Controllers;

use App\AsignacionTrabajador;
use App\Trabajador;
use App\Vacacion;
use Illuminate\Http\Request;

class VacacionController extends Controller
{
    public function index()
    {
        return view('vacaciontrabajador.listado');
    }

    public function listadoVacacion($doc)
    {
        $trabajador = Trabajador::where('numerodocumento', $doc)->get(['id', 'nombres', 'apellidopaterno', 'apellidomaterno'])->first();
        $vacacion_ganada = [];
        $vacaciones_trabajador = null;
        $respuesta = 200;
        if ($trabajador != null) {
            $asignacion = AsignacionTrabajador::where([['estado', true], ['trabajador_id', $trabajador->id]])->first();
            $vacacion_ganada = generarVacacionTrabajador($asignacion->fechaingreso);
            $vacaciones_trabajador = Vacacion::where([['trabajador_id', $trabajador->id],['estado', true]])->get();
        } else {
            $respuesta = 404;
        }
        return response()->json(
            [
                'trabajador' => $trabajador,
                'code' => $respuesta,
                'vacacion_ganada' => $vacacion_ganada,
                'vacaciones_trabajador' => $vacaciones_trabajador]);
    }

    public function save(Request $request){
        $vacacion = new Vacacion();
        $vacacion->trabajador_id = $request->get('trabajador_id');
        $vacacion->dias_tomados = $request->get('dias_tomados');
        $vacacion->motivo = $request->get('motivo');
        $vacacion->observaciones = $request->get('observaciones');
        $vacacion->fecha_inicio = $request->get('fecha_inicio');
        $vacacion->es_permiso = $request->get('es_permiso');
        $vacacion->estado = true;

        $vacacion->save();
        return response()->json(['code' => 200]);
    }

    public function delete($id){
        $vacacion = Vacacion::find($id);
        $vacacion->estado = false;
        $vacacion->save();
        return response()->json(['code' => 200]);
    }
}
