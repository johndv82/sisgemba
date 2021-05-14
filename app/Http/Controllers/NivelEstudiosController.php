<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\NivelEstudios;

class NivelEstudiosController extends Controller
{
    public function index()
    {
        return view('mantenimiento.nivelestudios');
    }

    public function listado(Request $request)
    {
        $respuesta = 404;
        $niveles_estudios = NivelEstudios::where('estado', true)->orderBy('id', 'asc')->get(['id', 'nombre', 'observaciones', 'created_at']);
        if($niveles_estudios != null){
            $respuesta = 200;
        }
        return response()->json(['niveles_estudios' => $niveles_estudios, 'code' => $respuesta]);
    }

    public function save(Request $request){
        $id = $request->input('id');
        $respuesta = 404;
        if ($id == 0){
            $nivelestudios = new NivelEstudios();
            $nivelestudios->nombre = $request->input('nombre');
            $nivelestudios->observaciones = $request->input('observaciones');
            $nivelestudios->estado = true;

            if ($nivelestudios->save()){
                $respuesta = 200;
            }
        }else{
            $nivelestudiosBuscado = NivelEstudios::find($id);
            $nivelestudiosBuscado->nombre = $request->input('nombre');
            $nivelestudiosBuscado->observaciones = $request->input('observaciones');
            $nivelestudiosBuscado->estado = true;
            if ($nivelestudiosBuscado->save()){
                $respuesta = 200;
            }
        }
        return response()->json(['code' => $respuesta]);
    }

    public function delete($id){
        $respuesta = 404;
        $nivelestudiosBuscado = NivelEstudios::find($id);
        $nivelestudiosBuscado->estado = false;
        if ($nivelestudiosBuscado->save()){
            $respuesta = 200;
        }
        return response()->json(['code' => $respuesta]);
    }
}
