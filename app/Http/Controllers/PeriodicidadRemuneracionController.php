<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PeriodicidadRemuneracion;

class PeriodicidadRemuneracionController extends Controller
{
    public function index()
    {
        return view('mantenimiento.periodicidadremuneracion');
    }

    public function listado(Request $request)
    {
        $respuesta = 404;
        $periodicidades_remuneracion = PeriodicidadRemuneracion::where('estado', true)->orderBy('id', 'asc')->get(['id', 'nombre', 'cantidaddias', 'observaciones', 'created_at']);
        if($periodicidades_remuneracion != null){
            $respuesta = 200;
        }
        return response()->json(['periodicidades_remuneracion' => $periodicidades_remuneracion, 'code' => $respuesta]);
    }

    public function save(Request $request){
        $id = $request->input('id');
        $respuesta = 404;
        if ($id == 0){
            $periodicidadremuneracion = new PeriodicidadRemuneracion();
            $periodicidadremuneracion->nombre = $request->input('nombre');
            $periodicidadremuneracion->cantidaddias = $request->input('cantidaddias');
            $periodicidadremuneracion->observaciones = $request->input('observaciones');
            $periodicidadremuneracion->estado = true;

            if ($periodicidadremuneracion->save()){
                $respuesta = 200;
            }
        }else{
            $periodicidadremuneracionBuscado = PeriodicidadRemuneracion::find($id);
            $periodicidadremuneracionBuscado->nombre = $request->input('nombre');
            $periodicidadremuneracionBuscado->cantidaddias = $request->input('cantidaddias');
            $periodicidadremuneracionBuscado->observaciones = $request->input('observaciones');
            $periodicidadremuneracionBuscado->estado = true;
            if ($periodicidadremuneracionBuscado->save()){
                $respuesta = 200;
            }
        }
        return response()->json(['code' => $respuesta]);
    }

    public function delete($id){
        $respuesta = 404;
        $periodicidadremuneracionBuscado = PeriodicidadRemuneracion::find($id);
        $periodicidadremuneracionBuscado->estado = false;
        if ($periodicidadremuneracionBuscado->save()){
            $respuesta = 200;
        }
        return response()->json(['code' => $respuesta]);
    }
}
