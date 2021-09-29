<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pais;

class PaisController extends Controller
{
    public function index()
    {
        return view('mantenimiento.pais');
    }

    public function listado(Request $request)
    {
        $respuesta = 404;
        $paises = Pais::where('estado', true)->orderBy('id', 'asc')->get(['id', 'nombre','created_at']);
        if($paises != null){
            $respuesta = 200;
        }
        return response()->json(['paises' => $paises, 'code' => $respuesta]);
    }

    public function save(Request $request){
        $respuesta = 404;
        $pais = new Pais();
        $pais->nombre = $request->input('nombre');
        $pais->estado = true;

        if ($pais->save()){
            $respuesta = 200;
        }
        return response()->json(['code' => $respuesta]);
    }

    public function delete($id){
        $respuesta = 404;
        $paisBuscado = Pais::find($id);
        $paisBuscado->estado = false;
        if ($paisBuscado->save()){
            $respuesta = 200;
        }
        return response()->json(['code' => $respuesta]);
    }
}
