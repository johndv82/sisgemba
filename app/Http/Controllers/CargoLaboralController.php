<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\CargoLaboral;

class CargoLaboralController extends Controller
{
    public function index()
    {
        return view('mantenimiento.cargolaboral');
    }

    public function listado(Request $request)
    {
        $respuesta = 404;
        $cargos_laborales = CargoLaboral::where('estado', true)->orderBy('id', 'asc')->get(['id', 'nombre', 'observaciones', 'created_at']);
        if($cargos_laborales != null){
            $respuesta = 200;
        }
        return response()->json(['cargos_laborales' => $cargos_laborales, 'code' => $respuesta]);
    }

    public function save(Request $request){
        $id = $request->input('id');
        $respuesta = 404;
        if ($id == 0){
            $cargolaboral = new CargoLaboral();
            $cargolaboral->nombre = $request->input('nombre');
            $cargolaboral->observaciones = $request->input('observaciones');
            $cargolaboral->estado = true;

            if ($cargolaboral->save()){
                $respuesta = 200;
            }
        }else{
            $cargolaboralBuscado = CargoLaboral::find($id);
            $cargolaboralBuscado->nombre = $request->input('nombre');
            $cargolaboralBuscado->observaciones = $request->input('observaciones');
            $cargolaboralBuscado->estado = true;
            if ($cargolaboralBuscado->save()){
                $respuesta = 200;
            }
        }
        return response()->json(['code' => $respuesta]);
    }

    public function delete($id){
        $respuesta = 404;
        $cargolaboralBuscado = CargoLaboral::find($id);
        $cargolaboralBuscado->estado = false;
        if ($cargolaboralBuscado->save()){
            $respuesta = 200;
        }
        return response()->json(['code' => $respuesta]);
    }
}
