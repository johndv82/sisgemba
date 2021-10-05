<?php

namespace App\Http\Controllers;

use App\Provincia;
use App\Pais;
use App\Departamento;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ProvinciaController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $model = Provincia::with('departamento', 'pais')->where('estado', true)->get();
            return DataTables::of($model)
                ->addIndexColumn()
                ->addColumn('departamento', function (Provincia $prov) {
                    return $prov->departamento->nombre;
                })
                ->addColumn('pais', function (Provincia $prov) {
                    return $prov->pais->nombre;
                })
                ->addColumn('action', function($row){
                    return '<button class="btn btn-sm btn-danger" onclick="EliminarRegistro('.$row->id.')">Eliminar</button>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        $paises = Pais::all();
        return view('ubigeo.provincia', compact('paises'));
    }

    public function listadoDepartamentos(Request $request){
        $pais_id = $request->get('pais_id');
        $data = Departamento::where('pais_id', $pais_id)->get(['id', 'nombre']);

        $output = '<option value="0">Seleccione Departamento</option>';
        foreach($data as $row){
            $output .= '<option value="'.$row->id.'">'.$row->nombre.'</option>';
        }
        return $output;
    }


    public function save(Request $request){
        $respuesta = 404;
        $provincia = new Provincia();
        $provincia->nombre = $request->input('nombre');
        $provincia->departamento_id = $request->input('departamento_id');
        $provincia->pais_id = $request->input('pais_id');
        $provincia->estado = true;

        if ($provincia->save()){
            $respuesta = 200;
        }
        return response()->json(['code' => $respuesta]);
    }

    public function delete($id){
        $respuesta = 404;
        $provinciaBuscada = Provincia::find($id);
        $provinciaBuscada->estado = false;
        if ($provinciaBuscada->save()){
            $respuesta = 200;
        }
        return response()->json(['code' => $respuesta]);
    }
}
