<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Departamento;
use App\Distrito;
use App\Provincia;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ClientesController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Cliente::where('estado','1')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('viewContacto', function($row){
                    $btn = '<a href="javascript:void(0)" class="edit btn btn-info btn-sm">Ver</a>';
                    return $btn;
                })
                ->addColumn('action', function($row){
                    $btn = '<a href="/clientes/edit/'.$row->id.'" class="edit btn btn-warning btn-sm">Editar</a>';
                    return $btn;
                })
                ->rawColumns(['viewContacto', 'action'])
                ->make(true);
        }
        return view('cliente.listado');
    }

    public function edit($id){
        $cliente = Cliente::find($id);
        $departamentos = Departamento::get();
        $provincias = Provincia::get()->where('departamento_id',$cliente->departamento);
        $distritos = Distrito::get()->where('provincia_id',$cliente->provincia);
        return view("cliente.actualizacion", compact("cliente", "departamentos", "provincias", "distritos"));
    }

    public function update(Request $request, $id){
        $cliente = Cliente::find($id);
        $cliente->razonsocial = $request->get('razon_social');
        $cliente->nombrecomercial = $request->get('nombre_comercial');
        $cliente->ruc = $request->get('ruc');
        $contacto = json_encode(array(
            'nombres' => $request->get('nombres_contacto'),
            'apellidos' => $request->get('apellidos_contacto'),
            'movil' => $request->get('movil_contacto'),
            'email' => $request->get('email_contacto')
        ));
        $cliente->contacto = $contacto;
        $cliente->domicilio = $request->get('domicilio');
        $cliente->departamento = $request->get('departamento');
        $cliente->provincia = $request->get('provincia');
        $cliente->distrito = $request->get('distrito');
        $cliente->estado = 1;

        $cliente->save();
        return redirect('/clientes')->with('success', 'Cliente Actualizado!!');
    }

    public function add(){
        return view('cliente.registro', ['departamentos' => Departamento::all()]);
    }

    public function save(Request $request){
        $cliente = new Cliente();
        $cliente->razonsocial = $request->input('razon_social');
        $cliente->nombrecomercial = $request->input('nombre_comercial');
        $cliente->ruc = $request->input('ruc');

        $contacto = json_encode(array(
            'nombres' => $request->input('nombres_contacto'),
            'apellidos' => $request->input('apellidos_contacto'),
            'movil' => $request->input('movil_contacto'),
            'email' => $request->input('email_contacto')
        ));
        $cliente->contacto = $contacto;
        $cliente->domicilio = $request->input('domicilio');
        $cliente->departamento = $request->input('departamento');
        $cliente->provincia = $request->input('provincia');
        $cliente->distrito = $request->input('distrito');
        $cliente->estado = 1;

        $cliente->save();
        return redirect()->route('listadoClientes')->with('success', 'Cliente Guardado!!');
    }

    public function combodepend(Request $request){
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');

        $data = DB::table($dependent)->where($select.'_id', $value)->get(['id', 'nombre']);

        $output = '<option value="0">Seleccione '.ucfirst($dependent).'</option>';
        foreach($data as $row){
            $output .= '<option value="'.$row->id.'">'.$row->nombre.'</option>';
        }
        return $output;
    }

    public function delete($id){
        $cliente = Cliente::find($id);
        $cliente->estado = 0;
        $cliente->save();
        return redirect('/clientes')->with('success', 'Cliente Eliminado!!');
    }
}
