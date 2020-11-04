<?php

namespace App\Http\Controllers;

use App\HijosTrabajador;
use App\TipoDocumento;
use App\Trabajador;
use Illuminate\Http\Request;

class HijosTrabajadorController extends Controller
{
    public function index()
    {
        return view('hijostrabajador.listado');
    }

    public function listadoHijos(Request $request)
    {
        $trabajador = Trabajador::where('numerodocumento', $request->get('documento_trabajador'))->get(['id', 'nombres', 'apellidopaterno', 'apellidomaterno'])->first();
        $hijos = null;
        $respuesta = 200;
        if ($trabajador != null) {
            $hijos = HijosTrabajador::with('tipodocumento')->where([['trabajador_id', $trabajador->id],['estado', 1]])->get();
        } else {
            $respuesta = 404;
        }
        return response()->json(['trabajador' => $trabajador, 'code' => $respuesta, 'hijos' => $hijos]);
    }

    public function edit($id)
    {
        $hijo = HijosTrabajador::find($id);
        $tipos_documentos = TipoDocumento::all();
        return view('hijostrabajador.actualizacion', compact('hijo', 'tipos_documentos'));
    }

    public function update(Request $request, $id)
    {
        $hijo = HijosTrabajador::find($id);
        $hijo->apellidopaterno = $request->get('apellido_paterno_hijo');
        $hijo->apellidomaterno = $request->get('apellido_materno_hijo');
        $hijo->nombres = $request->get('nombres_hijo');
        $hijo->tipodocumento_id = $request->get('tipo_documento_hijo');
        $hijo->numerodocumento = $request->get('numero_documento_hijo');
        $hijo->fechanacimiento = $request->get('fecha_nacimiento_hijo');
        $hijo->ocupacion = $request->get('ocupacion_hijo');

        $hijo->save();
        return redirect('/hijostrabajador')->with('success', 'Hijo de Trabajador Actualizado!!');
    }

    public function add($id)
    {
        $idTrabajador = $id;
        $tipos_documentos = TipoDocumento::all();
        return view('hijostrabajador.registro', compact('tipos_documentos','idTrabajador'));
    }

    public function save(Request $request){
        $hijo = new HijosTrabajador();
        $hijo->trabajador_id = $request->get('hidIdTrabajador');
        $hijo->apellidopaterno = $request->get('apellido_paterno_hijo');
        $hijo->apellidomaterno = $request->get('apellido_materno_hijo');
        $hijo->nombres = $request->get('nombres_hijo');
        $hijo->tipodocumento_id = $request->get('tipo_documento_hijo');
        $hijo->numerodocumento = $request->get('numero_documento_hijo');
        $hijo->fechanacimiento = $request->get('fecha_nacimiento_hijo');
        $hijo->ocupacion = $request->get('ocupacion_hijo');
        $hijo->estado = true;

        $hijo->save();
        return redirect('/hijostrabajador')->with('success', 'Hijo de Trabajador Registrado!!');
    }
    public function delete($id){
        $hijo = HijosTrabajador::find($id);
        $hijo->estado = false;
        $hijo->save();
        return redirect('/hijostrabajador')->with('success', 'Hijo de Trabajador Eliminado!!');
    }
}
