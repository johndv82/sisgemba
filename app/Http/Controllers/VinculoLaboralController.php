<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\VinculoLaboral;

class VinculoLaboralController extends Controller
{
    public function index()
    {
        return view('mantenimiento.vinculolaboral');
    }

    public function listado(Request $request)
    {
        $respuesta = 404;
        $vinculos_laborales = VinculoLaboral::where('estado', true)->orderBy('id', 'asc')->get(['id', 'nombre', 'observaciones', 'created_at']);
        if($vinculos_laborales != null){
            $respuesta = 200;
        }
        return response()->json(['vinculos_laborales' => $vinculos_laborales, 'code' => $respuesta]);
    }

    public function save(Request $request){
        $id = $request->input('id');
        $respuesta = 404;
        if ($id == 0){
            $vinculolaboral = new VinculoLaboral();
            $vinculolaboral->nombre = $request->input('nombre');
            $vinculolaboral->observaciones = $request->input('observaciones');
            $vinculolaboral->estado = true;

            if ($vinculolaboral->save()){
                $respuesta = 200;
            }
        }else{
            $vinculolaboralBuscado = VinculoLaboral::find($id);
            $vinculolaboralBuscado->nombre = $request->input('nombre');
            $vinculolaboralBuscado->observaciones = $request->input('observaciones');
            $vinculolaboralBuscado->estado = true;
            if ($vinculolaboralBuscado->save()){
                $respuesta = 200;
            }
        }
        return response()->json(['code' => $respuesta]);
    }

    public function delete($id){
        $respuesta = 404;
        $vinculolaboralBuscado = VinculoLaboral::find($id);
        $vinculolaboralBuscado->estado = false;
        if ($vinculolaboralBuscado->save()){
            $respuesta = 200;
        }
        return response()->json(['code' => $respuesta]);
    }
}
