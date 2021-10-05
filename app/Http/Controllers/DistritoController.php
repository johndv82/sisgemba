<?php

namespace App\Http\Controllers;

use App\Pais;
use App\Departamento;
use App\Provincia;
use App\Distrito;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class DistritoController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $model = Distrito::with('provincia', 'departamento')->where('estado', true)->get();
            return DataTables::of($model)
                ->addIndexColumn()
                ->addColumn('provincia', function (Distrito $dist) {
                    return $dist->provincia->nombre;
                })
                ->addColumn('departamento', function (Distrito $dist) {
                    return $dist->departamento->nombre;
                })
                ->addColumn('action', function($row){
                    return '<button class="btn btn-sm btn-danger" onclick="EliminarRegistro('.$row->id.')">Eliminar</button>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        $paises = Pais::all();
        return view('ubigeo.distrito', compact('paises'));
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

    public function listadoProvincias(Request $request){
        $departamento_id = $request->get('departamento_id');
        $data = Provincia::where('departamento_id', $departamento_id)->get(['id', 'nombre']);

        $output = '<option value="0">Seleccione Provincia</option>';
        foreach($data as $row){
            $output .= '<option value="'.$row->id.'">'.$row->nombre.'</option>';
        }
        return $output;
    }


    public function save(Request $request){
        $respuesta = 404;
        $distrito = new Distrito();
        $distrito->nombre = $request->input('nombre');
        $distrito->provincia_id = $request->input('provincia_id');
        $distrito->departamento_id = $request->input('departamento_id');
        $distrito->estado = true;

        if ($distrito->save()){
            $respuesta = 200;
        }
        return response()->json(['code' => $respuesta]);
    }

    public function delete($id){
        $respuesta = 404;
        $distritoBuscado = Distrito::find($id);
        $distritoBuscado->estado = false;
        if ($distritoBuscado->save()){
            $respuesta = 200;
        }
        return response()->json(['code' => $respuesta]);
    }
}
