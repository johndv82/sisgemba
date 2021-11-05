@extends('layout.dash')

@section('titulo')
    Actualización de Trabajador
@endsection

@section('contenido')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <strong>Datos de Actualización de Trabajador</strong>
            </div>
            <form method="POST" id="formTrabajador" name="formTrabajador" action="{{route('updateTrabajador', $trabajador->id)}}" autocomplete="off">
                @csrf
                <div class="card-body card-block">
                    <div class="row form-group">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="apellido_paterno" class="form-control-label">Apellido Paterno</label>
                                <input type="text" id="apellido_paterno" name="apellido_paterno" class="form-control" value="{{$trabajador->apellidopaterno}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="apellido_materno" class="form-control-label">Apellido Materno</label>
                                <input type="text" id="apellido_materno" name="apellido_materno" class="form-control" value="{{$trabajador->apellidomaterno}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nombres" class="form-control-label">Nombres</label>
                                <input type="text" id="nombres" name="nombres" class="form-control" value="{{$trabajador->nombres}}">
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="tipo_documento" class="form-control-label">Tipo de Documento</label>
                                <select name="tipo_documento" id="tipo_documento" class="form-control combo">
                                    <option value="0">Seleccione Tipo Doc.</option>
                                    @foreach($tipos_documentos as $item)
                                        <option value="{{$item->id}}" {{($item->id==$trabajador->tipodocumento_id)?"selected":""}}>{{$item->abreviacion}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="numero_documento" class="form-control-label">Número de Documento</label>
                                <input type="text" id="numero_documento" name="numero_documento" class="form-control" value="{{$trabajador->numerodocumento}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="fecha_nacimiento" class="form-control-label">Fecha de Nacimiento</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar-o"></i>
                                    </div>
                                    <input type="text" id="fecha_nacimiento" name="fecha_nacimiento"
                                           class="date form-control" value="{{date('d/m/Y', strtotime($trabajador->fechanacimiento))}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="estado_civil" class="form-control-label">Estado Civil</label>
                                <select name="estado_civil" id="estado_civil" class="form-control combo">
                                    <option value="0">Seleccione Estado Civil</option>
                                    @foreach($estados_civil as $item)
                                        <option value="{{$item->id}}" {{($item->id==$trabajador->estadocivil_id)?"selected":""}}>{{$item->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="email" class="form-control-label">Email</label>
                                <input type="text" id="email" name="email" class="form-control" value="{{$trabajador->email}}">
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="numero_fijo" class=" form-control-label">Número Fijo</label>
                                <input type="text" id="numero_fijo" name="numero_fijo" class="form-control" value="{{$trabajador->numerofijo}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="numero_celular" class=" form-control-label">Número Celular</label>
                                <input type="text" id="numero_celular" name="numero_celular" class="form-control" value="{{$trabajador->numerocelular}}">
                            </div>
                        </div>
                    </div>

                    <div class="card-subtitle">
                        <h4 class="text-left">Dirección de Origen</h4>
                        <hr/>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="pais_origen" class="form-control-label">País de Origen</label>
                                <select name="pais_origen" id="pais_origen"
                                        class="form-control combo_depend"
                                        data-dependent="departamento_origen">
                                    <option value="0">Seleccione Pais</option>
                                    @foreach($paises as $item)
                                        <option value="{{$item->id}}" {{($item->id==$trabajador->paisorigen)?"selected":""}}>{{$item->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="departamento_origen" class=" form-control-label">Departamento Orígen</label>
                                <select name="departamento_origen" id="departamento_origen"
                                        class="form-control combo_depend"
                                        data-dependent="provincia_origen">
                                    <option value="0">Seleccione Departamento</option>
                                    @foreach($departamentos_origen as $item)
                                        <option value="{{$item->id}}" {{($item->id==$trabajador->departamentoorigen)?"selected":""}}>{{$item->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="provincia_origen" class=" form-control-label">Provincia Origen</label>
                                <select name="provincia_origen" id="provincia_origen" class="form-control combo_depend"
                                        data-dependent="distrito_origen">
                                    <option value="0">Seleccione Provincia</option>
                                    @foreach($provincias_origen as $item)
                                        <option value="{{$item->id}}" {{($item->id==$trabajador->provinciaorigen)?"selected":""}}>{{$item->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="distrito_origen" class=" form-control-label">Distrito Origen</label>
                                <select name="distrito_origen" id="distrito_origen" class="form-control">
                                    <option value="0">Seleccione Distrito</option>
                                    @foreach($distritos_origen as $item)
                                        <option value="{{$item->id}}" {{($item->id==$trabajador->distritoorigen)?"selected":""}}>{{$item->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="domicilio_origen" class=" form-control-label">Domicilio de Origen</label>
                                <input type="text" id="domicilio_origen" name="domicilio_origen" class="form-control" value="{{$trabajador->domicilioorigen}}">
                            </div>
                        </div>
                    </div>

                    <div class="card-subtitle">
                        <h4 class="text-left">Dirección de Residencia</h4>
                        <hr/>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="pais_origen" class="form-control-label">País de Residencia</label>
                                <select name="pais_residencia" id="pais_residencia"
                                        class="form-control combo_depend"
                                        data-dependent="departamento_residencia">
                                    <option value="0">Seleccione Pais</option>
                                    @foreach($paises as $item)
                                        <option value="{{$item->id}}" {{($item->id==$trabajador->paisresidencia)?"selected":""}}>{{$item->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="departamento_residencia" class=" form-control-label">Departamento Residencia</label>
                                <select name="departamento_residencia" id="departamento_residencia"
                                        class="form-control combo_depend"
                                        data-dependent="provincia_residencia">
                                    <option value="0">Seleccione Departamento</option>
                                    @foreach($departamentos_residencia as $item)
                                        <option value="{{$item->id}}" {{($item->id==$trabajador->departamentoresidencia)?"selected":""}}>{{$item->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="provincia_residencia" class=" form-control-label">Provincia Residencia</label>
                                <select name="provincia_residencia" id="provincia_residencia"
                                        class="form-control combo_depend"
                                        data-dependent="distrito_residencia">
                                    <option value="0">Seleccione Provincia</option>s
                                    @foreach($provincias_residencia as $item)
                                        <option value="{{$item->id}}" {{($item->id==$trabajador->provinciaresidencia)?"selected":""}}>{{$item->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="distrito_residencia" class=" form-control-label">Distrito Residencia</label>
                                <select name="distrito_residencia" id="distrito_residencia" class="form-control">
                                    <option value="0">Seleccione Distrito</option>
                                    @foreach($distritos_residencia as $item)
                                        <option value="{{$item->id}}" {{($item->id==$trabajador->distritoresidencia)?"selected":""}}>{{$item->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="domicilio_residencia" class=" form-control-label">Domicilio de Residencia</label>
                                <input type="text" id="domicilio_residencia" name="domicilio_residencia" class="form-control" value="{{$trabajador->domicilioresidencia}}">
                            </div>
                        </div>
                    </div>

                    <div class="card-subtitle">
                        <h4 class="text-left">Datos de Conyugue</h4>
                        <hr/>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="apellido_paterno_conyugue" class="form-control-label">Apellido
                                    Paterno</label>
                                <input type="text" id="apellido_paterno_conyugue" name="apellido_paterno_conyugue"
                                       class="form-control" value="{{json_decode($trabajador->datosconyugue, true)["apellidopaterno"]}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="apellido_materno_conyugue" class="form-control-label">Apellido
                                    Materno</label>
                                <input type="text" id="apellido_materno_conyugue" name="apellido_materno_conyugue"
                                       class="form-control" value="{{json_decode($trabajador->datosconyugue, true)["apellidomaterno"]}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nombres_conyugue" class="form-control-label">Nombres</label>
                                <input type="text" id="nombres_conyugue" name="nombres_conyugue"
                                       class="form-control" value="{{json_decode($trabajador->datosconyugue, true)["nombres"]}}">
                            </div>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="fecha_nacimiento_conyugue" class="form-control-label">Fecha de
                                    Nacimiento</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar-o"></i>
                                    </div>
                                    <input type="text" id="fecha_nacimiento_conyugue" name="fecha_nacimiento_conyugue"
                                           class="date form-control" value="{{json_decode($trabajador->datosconyugue, true)["fechanacimiento"]}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="tipo_documento_conyugue" class="form-control-label">Tipo de
                                    Documento</label>
                                <select name="tipo_documento_conyugue" id="tipo_documento_conyugue"
                                        class="form-control combo">
                                    <option value="0">Seleccione Tipo Doc.</option>
                                    @foreach($tipos_documentos as $item)
                                        <option value="{{$item->id}}" {{($item->id==json_decode($trabajador->datosconyugue, true)["tipodocumento"])?"selected":""}}>{{$item->abreviacion}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="numero_documento_conyugue" class="form-control-label">Número de
                                    Documento</label>
                                <input type="text" id="numero_documento_conyugue" name="numero_documento_conyugue"
                                       class="form-control" value="{{json_decode($trabajador->datosconyugue, true)["numerodocumento"]}}">
                            </div>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="numero_fijo_conyugue" class=" form-control-label">Número Fijo</label>
                                <input type="text" id="numero_fijo_conyugue" name="numero_fijo_conyugue"
                                       class="form-control" value="{{json_decode($trabajador->datosconyugue, true)["numerofijo"]}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="numero_celular_conyugue" class=" form-control-label">Número Celular</label>
                                <input type="text" id="numero_celular_conyugue" name="numero_celular_conyugue"
                                       class="form-control" value="{{json_decode($trabajador->datosconyugue, true)["numerocelular"]}}">
                            </div>
                        </div>
                        <div class="col-md-4"></div>
                    </div>

                    <div class="card-subtitle">
                        <h4 class="text-left">Datos de Hijos del Trabajador</h4>
                        <hr/>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <div class="table-responsive table--no-card m-b-30">
                                <table class="table table-borderless table-data3" id="tblHijosTrabajador"
                                       style="width: 100%;">
                                    <thead>
                                    <tr>
                                        <th>Apellido Paterno</th>
                                        <th>Apellido Materno</th>
                                        <th>Nombres</th>
                                        <th>Tipo Doc.</th>
                                        <th>Número Doc.</th>
                                        <th>Fecha Nac.</th>
                                        <th>Ocupacion</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($hijos as $item)
                                        <tr>
                                            <td>{{$item->apellidopaterno}}</td>
                                            <td>{{$item->apellidomaterno}}</td>
                                            <td>{{$item->nombres}}</td>
                                            <td>{{$item->tipodocumento->abreviacion}}</td>
                                            <td>{{$item->numerodocumento}}</td>
                                            <td>{{$item->fechanacimiento}}</td>
                                            <td>{{$item->ocupacion}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card-subtitle">
                        <h4 class="text-left">Datos de Notificación en caso de Emergencia</h4>
                        <hr/>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="apellido_paterno_emergencia" class="form-control-label">Apellido
                                    Paterno</label>
                                <input type="text" id="apellido_paterno_emergencia" name="apellido_paterno_emergencia"
                                       class="form-control" value="{{json_decode($trabajador->datosemergencia, true)["apellidopaterno"]}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="apellido_materno_emergencia" class="form-control-label">Apellido
                                    Materno</label>
                                <input type="text" id="apellido_materno_emergencia" name="apellido_materno_emergencia"
                                       class="form-control" value="{{json_decode($trabajador->datosemergencia, true)["apellidomaterno"]}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nombres_emergencia" class="form-control-label">Nombres</label>
                                <input type="text" id="nombres_emergencia" name="nombres_emergencia"
                                       class="form-control" value="{{json_decode($trabajador->datosemergencia, true)["nombres"]}}">
                            </div>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="parentesco_emergencia" class="form-control-label">Parentesco</label>
                                <input type="text" id="parentesco_emergencia" name="parentesco_emergencia"
                                       class="form-control" value="{{json_decode($trabajador->datosemergencia, true)["parentesco"]}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="tipo_documento_emergencia" class="form-control-label">Tipo de
                                    Documento</label>
                                <select name="tipo_documento_emergencia" id="tipo_documento_emergencia"
                                        class="form-control combo">
                                    <option value="0">Seleccione Tipo Doc.</option>
                                    @foreach($tipos_documentos as $item)
                                        <option value="{{$item->id}}" {{($item->id==json_decode($trabajador->datosemergencia, true)["tipodocumento"])?"selected":""}}>{{$item->abreviacion}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="numero_documento_emergencia" class="form-control-label">Número de
                                    Documento</label>
                                <input type="text" id="numero_documento_emergencia" name="numero_documento_emergencia"
                                       class="form-control" value="{{json_decode($trabajador->datosemergencia, true)["numerodocumento"]}}">
                            </div>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="direccion_emergencia" class=" form-control-label">Dirección</label>
                                <input type="text" id="direccion_emergencia" name="direccion_emergencia"
                                       class="form-control" value="{{json_decode($trabajador->datosemergencia, true)["direccion"]}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="numero_fijo_emergencia" class=" form-control-label">Número Fijo</label>
                                <input type="text" id="numero_fijo_emergencia" name="numero_fijo_emergencia"
                                       class="form-control" value="{{json_decode($trabajador->datosemergencia, true)["numerofijo"]}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="numero_celular_emergencia" class=" form-control-label">Número
                                    Celular</label>
                                <input type="text" id="numero_celular_emergencia" name="numero_celular_emergencia"
                                       class="form-control" value="{{json_decode($trabajador->datosemergencia, true)["numerocelular"]}}">
                            </div>
                        </div>
                    </div>

                    <div class="card-subtitle">
                        <h4 class="text-left">Datos de Estudios</h4>
                        <hr/>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nivel_estudios" class="form-control-label">Nivel de Estudios</label>
                                <select name="nivel_estudios" id="nivel_estudios" class="form-control combo">
                                    <option value="0">Seleccione Nivel</option>
                                    @foreach($nivel_estudios as $item)
                                        <option value="{{$item->id}}" {{($item->id==json_decode($trabajador->datosestudio, true)["nivelestudios"])?"selected":""}}>{{$item->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="centro_estudios" class=" form-control-label">Centro de Estudios</label>
                                <input type="text" id="centro_estudios" name="centro_estudios"
                                       class="form-control" value="{{json_decode($trabajador->datosestudio, true)["centroestudios"]}}">
                            </div>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="fecha_inicio_estudios" class="form-control-label">Fecha de Inicio</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar-o"></i>
                                    </div>
                                    <input type="text" id="fecha_inicio_estudios" name="fecha_inicio_estudios"
                                           class="date form-control" value="{{json_decode($trabajador->datosestudio, true)["fechainicio"]}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="fecha_fin_estudios" class="form-control-label">Fecha Fin</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar-o"></i>
                                    </div>
                                    <input type="text" id="fecha_fin_estudios" name="fecha_fin_estudios"
                                           class="date form-control" value="{{json_decode($trabajador->datosestudio, true)["fechafin"]}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nivel_alcanzado_estudios" class=" form-control-label">Nivel
                                    Alcanzado</label>
                                <input type="text" id="nivel_alcanzado_estudios" name="nivel_alcanzado_estudios"
                                       class="form-control" value="{{json_decode($trabajador->datosestudio, true)["nivelalcanzado"]}}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row form-group">
                        <div class="col-md-10">
                            <button type="submit" class="btn btn-success btn-sm">
                                <i class="fa fa-dot-circle-o"></i> Actualizar
                            </button>
                            <button type="reset" class="btn btn-danger btn-sm" data-toggle="modal"
                                    data-target="#modalConfirmacion">
                                <i class="fa fa-ban"></i> Eliminar
                            </button>
                        </div>
                        <div class="col-md-2 text-right">
                            <button type="reset" class="btn btn-secondary btn-sm"
                                    onclick="window.location='{{ route("listadoTrabajadores") }}'">
                                <i class="fa fa-ban"></i> Cancelar
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('modal')
    <div class="modal fade" id="modalConfirmacion" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true"
         data-backdrop="static">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticModalLabel">Confirmación</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>
                        Confirme si desea eliminar permanentemente esté registro:
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <form action="{{ route('deleteTrabajador', $trabajador->id)}}" method="post">
                        @csrf
                        <button class="btn btn-danger" type="submit">Confirmar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $('.date').datepicker({
            format: 'dd/mm/yyyy'
        });

        $('.combo_depend').change(function () {
            if ($(this).val() !== '') {
                let select = $(this).attr("id");
                let value = $(this).val();
                let dependent = $(this).data('dependent');
                let _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "{{ route('trabajador.combodepend') }}",
                    method: "POST",
                    data: {select: select, value: value, _token: _token, dependent: dependent},
                    success: function (result) {
                        $('#' + dependent).html(result);
                    }
                });
            }
        });

        $('#departamento_origen').change(function () {
            $('#distrito_origen').val('0');
            $('#distrito_origen')
                .empty()
                .append('<option value="0">Seleccione Distrito</option>');
        });

        $('#departamento_residencia').change(function () {
            $('#distrito_residencia').val('0');
            $('#distrito_residencia')
                .empty()
                .append('<option value="0">Seleccione Distrito</option>');
        });

        $('#pais_origen').change(function () {
            $('#provincia_origen').val('0');
            $('#provincia_origen')
                .empty()
                .append('<option value="0">Seleccione Provincia</option>');
            $('#distrito_origen').val('0');
            $('#distrito_origen')
                .empty()
                .append('<option value="0">Seleccione Distrito</option>');
        });

        $('#pais_residencia').change(function () {
            $('#provincia_residencia').val('0');
            $('#provincia_residencia')
                .empty()
                .append('<option value="0">Seleccione Distrito</option>');
            $('#distrito_residencia').val('0');
            $('#distrito_residencia')
                .empty()
                .append('<option value="0">Seleccione Distrito</option>');
        });

        //Validate Form
        if ($("#formTrabajador").length > 0) {
            $.validator.addMethod("valueNotEquals", function(value, element, arg){
                return arg !== value;
            });

            $('#formTrabajador').validate({
                rules: {
                    apellido_paterno: {
                        required: true,
                        maxlength: 250
                    },
                    apellido_materno: {
                        required: true,
                        maxlength: 250
                    },
                    nombres: {
                        required: true,
                        maxlength: 250
                    },
                    tipo_documento:{
                        valueNotEquals: "0"
                    },
                    numero_documento:{
                        required: true,
                        number: true,
                        maxlength: 50,
                        minlength: 8
                    },
                    pais_origen:{
                        valueNotEquals: "0"
                    },
                    pais_residencia:{
                        valueNotEquals: "0"
                    },
                    fecha_nacimiento:{
                        required: true,
                        date: false
                    },
                    estado_civil:{
                        valueNotEquals: "0"
                    },
                    email:{
                        required:true,
                        email:true
                    },
                    numero_fijo:{
                        required: true,
                        minlength: 5,
                        maxlength: 50
                    },
                    numero_celular:{
                        required: true,
                        minlength: 5,
                        maxlength: 50
                    },
                    domicilio_origen:{
                        required: true,
                        maxlength: 250
                    },
                    departamento_origen:{
                        valueNotEquals: "0"
                    },
                    provincia_origen:{
                        valueNotEquals: "0"
                    },
                    distrito_origen:{
                        valueNotEquals: "0"
                    },
                    domicilio_residencia:{
                        required: true,
                        maxlength: 250
                    },
                    departamento_residencia:{
                        valueNotEquals: "0"
                    },
                    provincia_residencia:{
                        valueNotEquals: "0"
                    },
                    distrito_residencia:{
                        valueNotEquals: "0"
                    },
                },
                messages: {
                    apellido_paterno: {
                        required: "Por favor, rellene este campo.",
                    },
                    apellido_materno: {
                        required: "Por favor, rellene este campo.",
                    },
                    nombres: {
                        required: "Por favor, rellene este campo.",
                    },
                    tipo_documento:{
                        valueNotEquals : "Por favor, seleccione un tipo de documento."
                    },
                    numero_documento:{
                        required: "Por favor, rellene este campo.",
                        number: "Este campo solo puede contener números.",
                        maxlength: "Este campo no puede contener mas de 50 dígitos.",
                        minlength: "Este campo no puede contener menos de 8 dígitos."
                    },
                    pais_origen:{
                        valueNotEquals: "Por favor, seleccione un país."
                    },
                    pais_residencia:{
                        valueNotEquals: "Por favor, seleccione un país."
                    },
                    fecha_nacimiento:{
                        required: "Por favor, rellene este campo.",
                        date: "Fecha inválida."
                    },
                    domicilio_origen:{
                        required: "Por favor, rellene este campo.",
                    },
                    departamento_origen:{
                        valueNotEquals: "Por favor, seleccione un departamento."
                    },
                    provincia_origen:{
                        valueNotEquals: "Por favor, seleccione una provincia."
                    },
                    distrito_origen:{
                        valueNotEquals: "Por favor, seleccione un distrito."
                    },
                    estado_civil:{
                        valueNotEquals: "Por favor, seleccione un estado civíl."
                    },
                    email:{
                        required: "Por favor, rellene este campo.",
                        email: "Por favor, ingrese un e-mail válido."
                    },
                    numero_fijo:{
                        required: "Por favor, rellene este campo.",
                        minlength: "Este campo no puede contener menos de 5 dígitos.",
                        maxlength: "Este campo no puede contener mas de 50 dígitos.",
                    },
                    numero_celular:{
                        required: "Por favor, rellene este campo.",
                        minlength: "Este campo no puede contener menos de 5 dígitos.",
                        maxlength: "Este campo no puede contener mas de 50 dígitos.",
                    },
                    domicilio_residencia:{
                        required: "Por favor, rellene este campo.",
                    },
                    departamento_residencia:{
                        valueNotEquals: "Por favor, seleccione un departamento."
                    },
                    provincia_residencia:{
                        valueNotEquals: "Por favor, seleccione una provincia."
                    },
                    distrito_residencia:{
                        valueNotEquals: "Por favor, seleccione un distrito."
                    },
                },
                errorPlacement: function(label, element) {
                    label.addClass('badge badge-danger');
                    label.insertAfter(element);
                },
                wrapper: 'span'
            });
        }
    </script>
@endsection
