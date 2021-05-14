<?php

namespace App\Http\Controllers;

use App\Distrito;
use App\EstadoCivil;
use App\EstadoTrabajador;
use App\HijosTrabajador;
use App\NivelEstudios;
use App\Pais;
use App\Provincia;
use App\TipoDocumento;
use App\Trabajador;
use App\Departamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class TrabajadoresController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $model = Trabajador::with(['tipodocumento', 'estadotrabajador'])->where('estado', true)->get();
            return DataTables::of($model)
                ->addIndexColumn()
                ->addColumn('tipodocumento', function (Trabajador $trabajador) {
                    return $trabajador->tipodocumento->abreviacion;
                })
                ->addColumn('estadotrabajador', function (Trabajador $trabajador) {
                    //return $trabajador->estadotrabajador->nombre;
                    $link = '<label data-id="'.$trabajador->id.'" data-idestado="'.$trabajador->estadotrabajador_id.'" class="badge badge-info estadoTrabajador" style="cursor:pointer">'.$trabajador->estadotrabajador->nombre.'</label>';
                    return $link;
                })
                ->addColumn('action', function($row){
                    //$btn = '<a href="/trabajadores/edit/'.$row->id.'" class="btn btn-warning btn-sm">Editar</a>';
                    $btn = '<a href='.url('trabajadores/edit/'.$row->id).' class="btn btn-warning btn-sm">Editar</a>';
                    return $btn;
                })
                ->rawColumns(['action', 'estadotrabajador'])
                ->make(true);
        }
        return view('trabajador.listado');
    }

    public function add(){
        $paises = Pais::all();
        $tipos_documentos = TipoDocumento::all();
        $estados_civil = EstadoCivil::all();
        $nivel_estudios = NivelEstudios::all();
        return view('trabajador.registro', compact('tipos_documentos', 'estados_civil', 'nivel_estudios', 'paises'));
    }

    public function edit($id){
        $trabajador = Trabajador::find($id);
        $paises = Pais::all();
        $departamentos_origen = Departamento::get()->where('pais_id',$trabajador->paisorigen);
        $provincias_origen = Provincia::get()->where('departamento_id',$trabajador->departamentoorigen);
        $distritos_origen = Distrito::get()->where('provincia_id',$trabajador->provinciaorigen);

        $departamentos_residencia = Departamento::get()->where('pais_id',$trabajador->paisresidencia);
        $provincias_residencia = Provincia::get()->where('departamento_id',$trabajador->departamentoresidencia);
        $distritos_residencia = Distrito::get()->where('provincia_id',$trabajador->provinciaresidencia);



        $tipos_documentos = TipoDocumento::all();
        $estados_civil = EstadoCivil::all();
        $nivel_estudios = NivelEstudios::all();

        $hijos = HijosTrabajador::where('trabajador_id', $trabajador->id)->get();
        return view("trabajador.actualizacion",
            compact(
                'trabajador',
                'paises',
                'departamentos_origen',
                'departamentos_residencia',
                'tipos_documentos',
                'estados_civil',
                'provincias_origen',
                'distritos_origen',
                'provincias_residencia',
                'distritos_residencia',
                'nivel_estudios',
                'hijos'
            ));
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

    public function save(Request $request){
        $code = 0;
        $message = "";
        $trabajador = new Trabajador();
        $datos_conyugue = json_encode(array(
            'apellidopaterno' => $request->input('apellido_paterno_conyugue'),
            'apellidomaterno' => $request->input('apellido_materno_conyugue'),
            'nombres' => $request->input('nombres_conyugue'),
            'fechanacimiento' => $request->input('fecha_nacimiento_conyugue'),
            'tipodocumento' => $request->input('tipo_documento_conyugue'),
            'numerodocumento' => $request->input('numero_documento_conyugue'),
            'numerofijo' => $request->input('numero_fijo_conyugue'),
            'numerocelular' => $request->input('numero_celular_conyugue')
        ));

        $datos_emergencia = json_encode(array(
            'apellidopaterno' => $request->input('apellido_paterno_emergencia'),
            'apellidomaterno' => $request->input('apellido_materno_emergencia'),
            'nombres' => $request->input('nombres_emergencia'),
            'parentesco' => $request->input('parentesco_emergencia'),
            'tipodocumento' => $request->input('tipo_documento_emergencia'),
            'numerodocumento' => $request->input('numero_documento_emergencia'),
            'direccion' => $request->input('direccion_emergencia'),
            'numerofijo' => $request->input('numero_fijo_emergencia'),
            'numerocelular' => $request->input('numero_celular_emergencia')
        ));

        $datos_estudio = json_encode(array(
            'nivelestudios' => $request->input('nivel_estudios'),
            'centroestudios' => $request->input('centro_estudios'),
            'fechainicio' => $request->input('fecha_inicio_estudios'),
            'fechafin' => $request->input('fecha_fin_estudios'),
            'nivelalcanzado' => $request->input('nivel_alcanzado_estudios'),
        ));

        $trabajador->apellidopaterno = $request->get('apellido_paterno');
        $trabajador->apellidomaterno = $request->get('apellido_materno');
        $trabajador->nombres = $request->get('nombres');
        $trabajador->tipodocumento_id = $request->get('tipo_documento');
        $trabajador->numerodocumento = $request->get('numero_documento');
        $trabajador->paisorigen = $request->get('pais_origen');
        $trabajador->paisresidencia = $request->get('pais_residencia');
        $trabajador->fechanacimiento = $request->get('fecha_nacimiento');
        $trabajador->domicilioorigen = $request->get('domicilio_origen');
        $trabajador->distritoorigen = $request->get('distrito_origen');
        $trabajador->provinciaorigen = $request->get('provincia_origen');
        $trabajador->departamentoorigen = $request->get('departamento_origen');
        $trabajador->domicilioresidencia = $request->get('domicilio_residencia');
        $trabajador->distritoresidencia = $request->get('distrito_residencia');
        $trabajador->provinciaresidencia = $request->get('provincia_residencia');
        $trabajador->departamentoresidencia = $request->get('departamento_residencia');
        $trabajador->estadocivil_id = $request->get('estado_civil');
        $trabajador->email = $request->get('email');
        $trabajador->numerofijo = $request->get('numero_fijo');
        $trabajador->numerocelular = $request->get('numero_celular');
        $trabajador->datosconyugue = $datos_conyugue;
        $trabajador->datosemergencia = $datos_emergencia;
        $trabajador->datosestudio = $datos_estudio;
        $trabajador->estado = true;
        $trabajador->estadotrabajador_id = 1;

        $hijos_agregados = json_decode($request->get('hijos_agregados'), true);
        $hijosModel = [];
        if(is_array($hijos_agregados)){
            foreach ($hijos_agregados as $item) {
                $hijo = new  HijosTrabajador();
                $hijo->apellidopaterno = $item['apellido_paterno'];
                $hijo->apellidomaterno = $item['apellido_materno'];
                $hijo->nombres = $item['nombres'];
                $hijo->tipodocumento_id = $item['tipo_documento_id'];
                $hijo->numerodocumento = $item['numero_documento'];
                $hijo->fechanacimiento = $item['fecha_nacimiento'];
                $hijo->ocupacion = $item['ocupacion'];
                $hijo->estado = true;
                $hijosModel[] = $hijo;
            }
        }

        DB::beginTransaction();
        try {
            $trabajador->save();
            $trabajador->hijos()->saveMany($hijosModel);
            DB::commit();
            $code = 200;
            $message = "Registro Guardado con Éxito";
        } catch (\Exception $e) {
            DB::rollback();
            $code = 500;
            $message = $e->getMessage();
        }
        return response()->json(['code'=>$code, 'message'=>$message]);
    }

    public function update(Request $request, $id){
        $trabajador = Trabajador::find($id);
        $datos_conyugue = json_encode(array(
            'apellidopaterno' => $request->input('apellido_paterno_conyugue'),
            'apellidomaterno' => $request->input('apellido_materno_conyugue'),
            'nombres' => $request->input('nombres_conyugue'),
            'fechanacimiento' => $request->input('fecha_nacimiento_conyugue'),
            'tipodocumento' => $request->input('tipo_documento_conyugue'),
            'numerodocumento' => $request->input('numero_documento_conyugue'),
            'numerofijo' => $request->input('numero_fijo_conyugue'),
            'numerocelular' => $request->input('numero_celular_conyugue')
        ));

        $datos_emergencia = json_encode(array(
            'apellidopaterno' => $request->input('apellido_paterno_emergencia'),
            'apellidomaterno' => $request->input('apellido_materno_emergencia'),
            'nombres' => $request->input('nombres_emergencia'),
            'parentesco' => $request->input('parentesco_emergencia'),
            'tipodocumento' => $request->input('tipo_documento_emergencia'),
            'numerodocumento' => $request->input('numero_documento_emergencia'),
            'direccion' => $request->input('direccion_emergencia'),
            'numerofijo' => $request->input('numero_fijo_emergencia'),
            'numerocelular' => $request->input('numero_celular_emergencia')
        ));

        $datos_estudio = json_encode(array(
            'nivelestudios' => $request->input('nivel_estudios'),
            'centroestudios' => $request->input('centro_estudios'),
            'fechainicio' => $request->input('fecha_inicio_estudios'),
            'fechafin' => $request->input('fecha_fin_estudios'),
            'nivelalcanzado' => $request->input('nivel_alcanzado_estudios'),
        ));

        $trabajador->apellidopaterno = $request->get('apellido_paterno');
        $trabajador->apellidomaterno = $request->get('apellido_materno');
        $trabajador->nombres = $request->get('nombres');
        $trabajador->tipodocumento_id = $request->get('tipo_documento');
        $trabajador->numerodocumento = $request->get('numero_documento');
        $trabajador->paisorigen = $request->get('pais_origen');
        $trabajador->paisresidencia = $request->get('pais_residencia');
        $trabajador->fechanacimiento = $request->get('fecha_nacimiento');
        $trabajador->domicilioorigen = $request->get('domicilio_origen');
        $trabajador->distritoorigen = $request->get('distrito_origen');
        $trabajador->provinciaorigen = $request->get('provincia_origen');
        $trabajador->departamentoorigen = $request->get('departamento_origen');
        $trabajador->domicilioresidencia = $request->get('domicilio_residencia');
        $trabajador->distritoresidencia = $request->get('distrito_residencia');
        $trabajador->provinciaresidencia = $request->get('provincia_residencia');
        $trabajador->departamentoresidencia = $request->get('departamento_residencia');
        $trabajador->estadocivil_id = $request->get('estado_civil');
        $trabajador->email = $request->get('email');
        $trabajador->numerofijo = $request->get('numero_fijo');
        $trabajador->numerocelular = $request->get('numero_celular');
        $trabajador->datosconyugue = $datos_conyugue;
        $trabajador->datosemergencia = $datos_emergencia;
        $trabajador->datosestudio = $datos_estudio;

        $trabajador->save();
        return redirect('/trabajadores')->with('success', 'Trabajador Actualizado!!');
    }

    public function comboestado(Request $request){
        $estadosTrabajador = EstadoTrabajador::all();

        $output = '<option value="0">Seleccione Estado</option>';
        foreach($estadosTrabajador as $row){
            $selectEstado = ($request->get('idestado') == $row->id) ? "selected" : "";
            $output .= '<option value="'.$row->id.'" '.$selectEstado.'>'.$row->nombre.'</option>';
        }
        return $output;
    }

    public function cambioestado(Request $request, $id){
        $trabajador = Trabajador::find($id);
        $trabajador->estadotrabajador_id = $request->get('estadoSeleccionado');
        $trabajador->save();
        return response()->json(['code' => 200]);
    }

    public function delete($id){
        $trabajador = Trabajador::find($id);
        $trabajador->estado = false;
        $trabajador->save();
        return redirect('/trabajadores')->with('success', 'Trabajador Eliminado!!');
    }
}
