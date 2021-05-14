<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\RegimenSalud;

class RegimenSaludController extends Controller
{
    public function index()
    {
        return view('mantenimiento.regimensalud');
    }

    public function listado(Request $request)
    {
        $respuesta = 404;
        $regimenes_salud = RegimenSalud::where('estado', true)->orderBy('id', 'asc')->get(['id', 'nombre', 'abreviacion', 'observaciones', 'created_at']);
        if($regimenes_salud != null){
            $respuesta = 200;
        }
        return response()->json(['regimenes_salud' => $regimenes_salud, 'code' => $respuesta]);
    }

    public function save(Request $request){
        $id = $request->input('id');
        $respuesta = 404;
        if ($id == 0){
            $regimensalud = new RegimenSalud();
            $regimensalud->nombre = $request->input('nombre');
            $regimensalud->abreviacion = $request->input('abreviacion');
            $regimensalud->observaciones = $request->input('observaciones');
            $regimensalud->estado = true;

            if ($regimensalud->save()){
                $respuesta = 200;
            }
        }else{
            $regimensaludBuscado = RegimenSalud::find($id);
            $regimensaludBuscado->nombre = $request->input('nombre');
            $regimensaludBuscado->abreviacion = $request->input('abreviacion');
            $regimensaludBuscado->observaciones = $request->input('observaciones');
            $regimensaludBuscado->estado = true;
            if ($regimensaludBuscado->save()){
                $respuesta = 200;
            }
        }
        return response()->json(['code' => $respuesta]);
    }

    public function delete($id){
        $respuesta = 404;
        $regimensaludBuscado = RegimenSalud::find($id);
        $regimensaludBuscado->estado = false;
        if ($regimensaludBuscado->save()){
            $respuesta = 200;
        }
        return response()->json(['code' => $respuesta]);
    }
}
