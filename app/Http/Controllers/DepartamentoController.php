<?php

namespace App\Http\Controllers;

use App\Departamento;
use App\Pais;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class DepartamentoController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $model = Departamento::with('pais')->where('estado', true)->get();
            return DataTables::of($model)
                ->addIndexColumn()
                ->addColumn('pais', function (Departamento $dep) {
                    return $dep->pais->nombre;
                })
                ->addColumn('action', function($row){
                    return '<button class="btn btn-sm btn-danger" onclick="EliminarRegistro('.$row->id.')">Eliminar</button>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        $paises = Pais::all();
        return view('ubigeo.departamento', compact('paises'));
    }


    public function save(Request $request){
        $respuesta = 404;
        $departamento = new Departamento();
        $departamento->nombre = $request->input('nombre');
        $departamento->pais_id = $request->input('pais_id');
        $departamento->estado = true;

        if ($departamento->save()){
            $respuesta = 200;
        }
        return response()->json(['code' => $respuesta]);
    }

    public function delete($id){
        $respuesta = 404;
        $departamentoBuscado = Departamento::find($id);
        $departamentoBuscado->estado = false;
        if ($departamentoBuscado->save()){
            $respuesta = 200;
        }
        return response()->json(['code' => $respuesta]);
    }
}
