<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banco;

class BancoController extends Controller
{
    public function index()
    {
        return view('mantenimiento.banco');
    }

    public function listado(Request $request)
    {
        $respuesta = 404;
        $bancos = Banco::where('estado', true)->orderBy('id', 'asc')->get(['id', 'nombre', 'observaciones', 'abreviacion','created_at']);
        if($bancos != null){
            $respuesta = 200;
        }
        return response()->json(['bancos' => $bancos, 'code' => $respuesta]);
    }

    public function save(Request $request){
        $id = $request->input('id');
        $respuesta = 404;
        if ($id == 0){
            $banco = new Banco();
            $banco->nombre = $request->input('nombre');
            $banco->abreviacion = $request->input('abreviacion');
            $banco->observaciones = $request->input('observaciones');
            $banco->estado = true;

            if ($banco->save()){
                $respuesta = 200;
            }
        }else{
            $bancoBuscado = Banco::find($id);
            $bancoBuscado->nombre = $request->input('nombre');
            $bancoBuscado->abreviacion = $request->input('abreviacion');
            $bancoBuscado->observaciones = $request->input('observaciones');
            $bancoBuscado->estado = true;
            if ($bancoBuscado->save()){
                $respuesta = 200;
            }
        }
        return response()->json(['code' => $respuesta]);
    }

    public function delete($id){
        $respuesta = 404;
        $bancoBuscado = Banco::find($id);
        $bancoBuscado->estado = false;
        if ($bancoBuscado->save()){
            $respuesta = 200;
        }
        return response()->json(['code' => $respuesta]);
    }
}
