<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\EstadoCivil;

class EstadoCivilController extends Controller
{
    public function index()
    {
        return view('mantenimiento.estadocivil');
    }

    public function listado(Request $request)
    {
        $respuesta = 404;
        $estados_civiles = EstadoCivil::where('estado', true)->orderBy('id', 'asc')->get(['id', 'nombre', 'observaciones', 'created_at']);
        if($estados_civiles != null){
            $respuesta = 200;
        }
        return response()->json(['estados_civiles' => $estados_civiles, 'code' => $respuesta]);
    }

    public function save(Request $request){
        $id = $request->input('id');
        $respuesta = 404;
        if ($id == 0){
            $estadocivil = new EstadoCivil();
            $estadocivil->nombre = $request->input('nombre');
            $estadocivil->observaciones = $request->input('observaciones');
            $estadocivil->estado = true;

            if ($estadocivil->save()){
                $respuesta = 200;
            }
        }else{
            $estadocivilBuscado = EstadoCivil::find($id);
            $estadocivilBuscado->nombre = $request->input('nombre');
            $estadocivilBuscado->observaciones = $request->input('observaciones');
            $estadocivilBuscado->estado = true;
            if ($estadocivilBuscado->save()){
                $respuesta = 200;
            }
        }
        return response()->json(['code' => $respuesta]);
    }

    public function delete($id){
        $respuesta = 404;
        $estadocivilBuscado = EstadoCivil::find($id);
        $estadocivilBuscado->estado = false;
        if ($estadocivilBuscado->save()){
            $respuesta = 200;
        }
        return response()->json(['code' => $respuesta]);
    }
}
