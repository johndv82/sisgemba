<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TipoTrabajadorAsig;

class TipoTrabajadorAsigController extends Controller
{
    public function index()
    {
        return view('mantenimiento.tipotrabajadorasig');
    }

    public function listado(Request $request)
    {
        $respuesta = 404;
        $tipos_trabajadorasig = TipoTrabajadorAsig::where('estado', true)->orderBy('id', 'asc')->get(['id', 'nombre', 'observaciones', 'created_at']);
        if($tipos_trabajadorasig != null){
            $respuesta = 200;
        }
        return response()->json(['tipos_trabajadorasig' => $tipos_trabajadorasig, 'code' => $respuesta]);
    }

    public function save(Request $request){
        $id = $request->input('id');
        $respuesta = 404;
        if ($id == 0){
            $tipotrabajadorAsig = new TipoTrabajadorAsig();
            $tipotrabajadorAsig->nombre = $request->input('nombre');
            $tipotrabajadorAsig->observaciones = $request->input('observaciones');
            $tipotrabajadorAsig->estado = true;

            if ($tipotrabajadorAsig->save()){
                $respuesta = 200;
            }
        }else{
            $tipotrabajadorAsigBuscado = TipoTrabajadorAsig::find($id);
            $tipotrabajadorAsigBuscado->nombre = $request->input('nombre');
            $tipotrabajadorAsigBuscado->observaciones = $request->input('observaciones');
            $tipotrabajadorAsigBuscado->estado = true;
            if ($tipotrabajadorAsigBuscado->save()){
                $respuesta = 200;
            }
        }
        return response()->json(['code' => $respuesta]);
    }

    public function delete($id){
        $respuesta = 404;
        $tipotrabajadorAsigBuscado = TipoTrabajadorAsig::find($id);
        $tipotrabajadorAsigBuscado->estado = false;
        if ($tipotrabajadorAsigBuscado->save()){
            $respuesta = 200;
        }
        return response()->json(['code' => $respuesta]);
    }
}
