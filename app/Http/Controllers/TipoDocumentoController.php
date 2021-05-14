<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\TipoDocumento;

class TipoDocumentoController extends Controller
{
    public function index()
    {
        return view('mantenimiento.tipodocumento');
    }

    public function listado(Request $request)
    {
        $respuesta = 404;
        $tipos_docs = TipoDocumento::where('estado', true)->orderBy('id', 'asc')->get(['id', 'nombre', 'abreviacion', 'observaciones', 'created_at']);
        if($tipos_docs != null){
            $respuesta = 200;
        }
        return response()->json(['tipos_docs' => $tipos_docs, 'code' => $respuesta]);
    }

    public function save(Request $request){
        $id = $request->input('id');
        $respuesta = 404;
        if ($id == 0){
            $tipodoc = new TipoDocumento();
            $tipodoc->nombre = $request->input('nombre');
            $tipodoc->abreviacion = $request->input('abreviacion');
            $tipodoc->observaciones = $request->input('observaciones');
            $tipodoc->estado = true;

            if ($tipodoc->save()){
                $respuesta = 200;
            }
        }else{
            $tipoDocBuscado = TipoDocumento::find($id);
            $tipoDocBuscado->nombre = $request->input('nombre');
            $tipoDocBuscado->abreviacion = $request->input('abreviacion');
            $tipoDocBuscado->observaciones = $request->input('observaciones');
            $tipoDocBuscado->estado = true;
            if ($tipoDocBuscado->save()){
                $respuesta = 200;
            }
        }
        return response()->json(['code' => $respuesta]);
    }

    public function delete($id){
        $respuesta = 404;
        $tipoDocBuscado = TipoDocumento::find($id);
        $tipoDocBuscado->estado = false;
        if ($tipoDocBuscado->save()){
            $respuesta = 200;
        }
        return response()->json(['code' => $respuesta]);
    }
}
