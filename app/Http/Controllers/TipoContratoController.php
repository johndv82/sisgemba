<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TipoContrato;


class TipoContratoController extends Controller
{

    public function index()
    {
        return view('mantenimiento.tipocontrato');
    }

    public function listado(Request $request)
    {
        $respuesta = 404;
        $tipos_contrato = TipoContrato::where('estado', true)->orderBy('id', 'asc')->get(['id', 'nombre', 'observaciones', 'created_at']);
        if($tipos_contrato != null){
            $respuesta = 200;
        }
        return response()->json(['tipos_contrato' => $tipos_contrato, 'code' => $respuesta]);
    }

    public function save(Request $request){
        $id = $request->input('id');
        $respuesta = 404;
        if ($id == 0){
            $tipocontrato = new TipoContrato();
            $tipocontrato->nombre = $request->input('nombre');
            $tipocontrato->observaciones = $request->input('observaciones');
            $tipocontrato->estado = true;

            if ($tipocontrato->save()){
                $respuesta = 200;
            }
        }else{
            $tipocontratoBuscado = TipoContrato::find($id);
            $tipocontratoBuscado->nombre = $request->input('nombre');
            $tipocontratoBuscado->observaciones = $request->input('observaciones');
            $tipocontratoBuscado->estado = true;
            if ($tipocontratoBuscado->save()){
                $respuesta = 200;
            }
        }
        return response()->json(['code' => $respuesta]);
    }

    public function delete($id){
        $respuesta = 404;
        $tipocontratoBuscado = TipoContrato::find($id);
        $tipocontratoBuscado->estado = false;
        if ($tipocontratoBuscado->save()){
            $respuesta = 200;
        }
        return response()->json(['code' => $respuesta]);
    }
}
