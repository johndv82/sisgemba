<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\RegimenPension;

class RegimenPensionController extends Controller
{
    public function index()
    {
        return view('mantenimiento.regimenpension');
    }

    public function listado(Request $request)
    {
        $respuesta = 404;
        $regimenes_pension = RegimenPension::where('estado', true)->orderBy('id', 'asc')->get(['id', 'nombre', 'abreviacion', 'observaciones', 'created_at']);
        if($regimenes_pension != null){
            $respuesta = 200;
        }
        return response()->json(['regimenes_pension' => $regimenes_pension, 'code' => $respuesta]);
    }

    public function save(Request $request){
        $id = $request->input('id');
        $respuesta = 404;
        if ($id == 0){
            $regimenpension = new RegimenPension();
            $regimenpension->nombre = $request->input('nombre');
            $regimenpension->abreviacion = $request->input('abreviacion');
            $regimenpension->observaciones = $request->input('observaciones');
            $regimenpension->estado = true;

            if ($regimenpension->save()){
                $respuesta = 200;
            }
        }else{
            $regimenpensionBuscado = RegimenPension::find($id);
            $regimenpensionBuscado->nombre = $request->input('nombre');
            $regimenpensionBuscado->abreviacion = $request->input('abreviacion');
            $regimenpensionBuscado->observaciones = $request->input('observaciones');
            $regimenpensionBuscado->estado = true;
            if ($regimenpensionBuscado->save()){
                $respuesta = 200;
            }
        }
        return response()->json(['code' => $respuesta]);
    }

    public function delete($id){
        $respuesta = 404;
        $regimenpensionBuscado = RegimenPension::find($id);
        $regimenpensionBuscado->estado = false;
        if ($regimenpensionBuscado->save()){
            $respuesta = 200;
        }
        return response()->json(['code' => $respuesta]);
    }
}
