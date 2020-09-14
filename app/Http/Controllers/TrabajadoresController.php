<?php

namespace App\Http\Controllers;

use App\Departamento;
use App\Trabajador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class TrabajadoresController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $model = Trabajador::with('tiposdocumentos')->get();
            return DataTables::of($model)
                ->addIndexColumn()
                ->addColumn('tiposdocumentos', function (Trabajador $trabajador) {
                    return $trabajador->tiposdocumentos->abreviacion;
                })
                ->addColumn('action', function($row){
                    $btn = '<a href="/trabajadores/edit/'.$row->id.'" class="edit btn btn-warning btn-sm">Editar</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('trabajador.listado');
    }

    public function add(){
        return view('trabajador.registro', ['departamentos' => Departamento::all()]);
    }

    public function combodepend(Request $request){
        $select = ExtraerNombreSinSubGuion($request->get('select'));
        $value = $request->get('value');
        $dependent = ExtraerNombreSinSubGuion($request->get('dependent'));

        $data = DB::table($dependent)->where($select.'_id', $value)->get(['id', 'nombre']);

        $output = '<option value="0">Seleccione '.ucfirst($dependent).'</option>';
        foreach($data as $row){
            $output .= '<option value="'.$row->id.'">'.$row->nombre.'</option>';
        }
        return $output;
    }


}
