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
        $lista_periodos = [];

        if ($trabajador != null) {
            $asignacion = AsignacionTrabajador::where([['estado', true], ['trabajador_id', $trabajador->id]])->first();
            //Si no esta asignado retorna 404
            if ($asignacion != null){
                $vacacion_ganada = generarVacacionTrabajador($asignacion->fechaingreso);
                $vacaciones_trabajador = Vacacion::where([['trabajador_id', $trabajador->id],['estado', true]])->get();

                //Recorrer vacaciones ganadas adjuntando dias tomados registrados en BD
                $vacacion_agrupada = Vacacion::where([['trabajador_id', $trabajador->id],['estado', true]])
                    ->groupBy('periodo')
                    ->selectRaw('sum(dias_tomados) as sum_dias, periodo')
                    ->get();

                foreach($vacacion_ganada as $index=>$vacacion){
                    foreach ($vacacion_agrupada as $vac_tra){
                        if($vac_tra->periodo == $vacacion['periodo']){
                            $vacacion_ganada[$index]['dias_tomados'] = $vac_tra->sum_dias;
                            $vacacion_ganada[$index]['dias_restantes'] = intval($vacacion_ganada[$index]['dias_ganados']) - intval($vac_tra->sum_dias);
                            break;
                        }
                    }
                    array_push($lista_periodos, $vacacion['periodo']);
                }
            }else{
                $respuesta = 408;
            }
        } else {
            $respuesta = 404;
        }
        return response()->json(
            [
                'trabajador' => $trabajador,
                'code' => $respuesta,
                'vacacion_ganada' => json_encode($vacacion_ganada),
                'vacaciones_trabajador' => $vacaciones_trabajador,
                'lista_periodos' => $lista_periodos]);
    }

    public function save(Request $request){
        $vacacion = new Vacacion();
        $vacacion->trabajador_id = $request->get('trabajador_id');
        $vacacion->periodo = $request->get('periodo');
        $vacacion->dias_tomados = $request->get('dias_tomados');
        $vacacion->fecha_inicio = $request->get('fecha_inicio');
        $vacacion->observaciones = $request->get('observaciones');
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
