@extends('layout.dash')

@section('titulo')
    Registro de Trabajador
@endsection

@section('contenido')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <strong>Datos de Nuevo Trabajador</strong>
            </div>

            <div class="card-body card-block">
                <form id="formTrabajador" name="formTrabajador" autocomplete="off">
                    @csrf
                    <div class="row form-group">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="apellido_paterno" class="form-control-label">Apellido Paterno</label>
                                <input type="text" id="apellido_paterno" name="apellido_paterno" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="apellido_materno" class="form-control-label">Apellido Materno</label>
                                <input type="text" id="apellido_materno" name="apellido_materno" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nombres" class="form-control-label">Nombres</label>
                                <input type="text" id="nombres" name="nombres" class="form-control">
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
                                        <option value="{{$item->id}}">{{$item->abreviacion}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="numero_documento" class="form-control-label">Número de Documento</label>
                                <input type="text" id="numero_documento" name="numero_documento" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="pais_origen" class="form-control-label">País de Origen</label>
                                <select name="pais_origen" id="pais_origen"
                                        class="form-control combo_depend"
                                        data-dependent="ciudad_origen">
                                    <option value="0">Seleccione País</option>
                                    @foreach($paises as $item)
                                        <option value="{{$item->id}}">{{$item->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="ciudad_origen" class="form-control-label">Ciudad de Origen</label>
                                <select name="ciudad_origen" id="ciudad_origen" class="form-control">
                                    <option value="0">Seleccione Ciudad</option>
                                </select>
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
                                           class="date form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="estado_civil" class="form-control-label">Estado Civil</label>
                                <select name="estado_civil" id="estado_civil" class="form-control combo">
                                    <option value="0">Seleccione Estado Civil</option>
                                    @foreach($estados_civil as $item)
                                        <option value="{{$item->id}}">{{$item->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="email" class="form-control-label">Email</label>
                                <input type="text" id="email" name="email" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="numero_fijo" class=" form-control-label">Número Fijo</label>
                                <input type="text" id="numero_fijo" name="numero_fijo" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="numero_celular" class=" form-control-label">Número Celular</label>
                                <input type="text" id="numero_celular" name="numero_celular" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="card-subtitle">
                        <h4 class="text-left">Dirección de Origen</h4>
                        <hr/>
                    </div>
                    <div class="form-group">
                        <label for="domicilio_origen" class=" form-control-label">Domicilio de Origen</label>
                        <input type="text" id="domicilio_origen" name="domicilio_origen" class="form-control">
                    </div>

                    <div class="row form-group">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="departamento_origen" class=" form-control-label">Departamento Orígen</label>
                                <select name="departamento_origen" id="departamento_origen"
                                        class="form-control combo_depend"
                                        data-dependent="provincia_origen">
                                    <option value="0">Seleccione Departamento</option>
                                    @foreach($departamentos as $item)
                                        <option value="{{$item->id}}">{{$item->nombre}}</option>
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
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="distrito_origen" class=" form-control-label">Distrito Origen</label>
                                <select name="distrito_origen" id="distrito_origen" class="form-control">
                                    <option value="0">Seleccione Distrito</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="card-subtitle">
                        <h4 class="text-left">Dirección de Residencia</h4>
                        <hr/>
                    </div>
                    <div class="form-group">
                        <label for="domicilio_residencia" class=" form-control-label">Domicilio de Residencia</label>
                        <input type="text" id="domicilio_residencia" name="domicilio_residencia" class="form-control">
                    </div>

                    <div class="row form-group">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="departamento_residencia" class=" form-control-label">Departamento
                                    Residencia</label>
                                <select name="departamento_residencia" id="departamento_residencia"
                                        class="form-control combo_depend"
                                        data-dependent="provincia_residencia">
                                    <option value="0">Seleccione Departamento</option>
                                    @foreach($departamentos as $item)
                                        <option value="{{$item->id}}">{{$item->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="provincia_residencia" class=" form-control-label">Provincia
                                    Residencia</label>
                                <select name="provincia_residencia" id="provincia_residencia"
                                        class="form-control combo_depend"
                                        data-dependent="distrito_residencia">
                                    <option value="0">Seleccione Provincia</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="distrito_residencia" class=" form-control-label">Distrito Residencia</label>
                                <select name="distrito_residencia" id="distrito_residencia" class="form-control">
                                    <option value="0">Seleccione Distrito</option>
                                </select>
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
                                       class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="apellido_materno_conyugue" class="form-control-label">Apellido
                                    Materno</label>
                                <input type="text" id="apellido_materno_conyugue" name="apellido_materno_conyugue"
                                       class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nombres_conyugue" class="form-control-label">Nombres</label>
                                <input type="text" id="nombres_conyugue" name="nombres_conyugue" class="form-control">
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
                                           class="date form-control">
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
                                        <option value="{{$item->id}}">{{$item->abreviacion}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="numero_documento_conyugue" class="form-control-label">Número de
                                    Documento</label>
                                <input type="text" id="numero_documento_conyugue" name="numero_documento_conyugue"
                                       class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="numero_fijo_conyugue" class=" form-control-label">Número Fijo</label>
                                <input type="text" id="numero_fijo_conyugue" name="numero_fijo_conyugue"
                                       class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="numero_celular_conyugue" class=" form-control-label">Número Celular</label>
                                <input type="text" id="numero_celular_conyugue" name="numero_celular_conyugue"
                                       class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4"></div>
                    </div>

                    <div class="card-subtitle">
                        <h4 class="text-left">Datos de Hijos del Trabajador</h4>
                        <hr/>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-4">
                            <a class="btn btn-info btn-sm" id="btnNuevoRegistroHijo" data-toggle="modal"
                               data-target="#registroHijoTrabajadorModal">Nuevo Registro</a>
                            <a class="btn btn-danger btn-sm" id="btnRemoverRegistroHijo">Remover</a>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <div class="table-responsive table--no-card m-b-30">
                                <table class="table table-borderless table-data3" id="tblHijosTrabajador"
                                       style="width: 100%;">
                                    <thead>
                                    <tr>
                                        <th data-field="select" data-checkbox="true"></th>
                                        <th data-field="apellido_paterno">Apellido Paterno</th>
                                        <th data-field="apellido_materno">Apellido Materno</th>
                                        <th data-field="nombres">Nombres</th>
                                        <th data-field="tipo_documento_id">Doc_id</th>
                                        <th data-field="tipo_documento">Tipo Doc.</th>
                                        <th data-field="numero_documento">Número Doc.</th>
                                        <th data-field="fecha_nacimiento">Fecha Nac.</th>
                                        <th data-field="ocupacion">Ocupación</th>
                                    </tr>
                                    </thead>
                                    <tbody>
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
                                       class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="apellido_materno_emergencia" class="form-control-label">Apellido
                                    Materno</label>
                                <input type="text" id="apellido_materno_emergencia" name="apellido_materno_emergencia"
                                       class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nombres_emergencia" class="form-control-label">Nombres</label>
                                <input type="text" id="nombres_emergencia" name="nombres_emergencia"
                                       class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="parentesco_emergencia" class="form-control-label">Parentesco</label>
                                <input type="text" id="parentesco_emergencia" name="parentesco_emergencia"
                                       class="form-control">
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
                                        <option value="{{$item->id}}">{{$item->abreviacion}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="numero_documento_emergencia" class="form-control-label">Número de
                                    Documento</label>
                                <input type="text" id="numero_documento_emergencia" name="numero_documento_emergencia"
                                       class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="direccion_emergencia" class=" form-control-label">Dirección</label>
                                <input type="text" id="direccion_emergencia" name="direccion_emergencia"
                                       class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="numero_fijo_emergencia" class=" form-control-label">Número Fijo</label>
                                <input type="text" id="numero_fijo_emergencia" name="numero_fijo_emergencia"
                                       class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="numero_celular_emergencia" class=" form-control-label">Número
                                    Celular</label>
                                <input type="text" id="numero_celular_emergencia" name="numero_celular_emergencia"
                                       class="form-control">
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
                                        <option value="{{$item->id}}">{{$item->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="centro_estudios" class=" form-control-label">Centro de Estudios</label>
                                <input type="text" id="centro_estudios" name="centro_estudios" class="form-control">
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
                                           class="date form-control">
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
                                           class="date form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nivel_alcanzado_estudios" class=" form-control-label">Nivel
                                    Alcanzado</label>
                                <input type="text" id="nivel_alcanzado_estudios" name="nivel_alcanzado_estudios"
                                       class="form-control">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success btn-sm" onclick="guardarRegistroTrabajadores()">
                    <i class="fa fa-dot-circle-o"></i> Guardar
                </button>
                <button type="reset" class="btn btn-secondary btn-sm"
                        onclick="window.location='{{ route("listadoTrabajadores") }}'">
                    <i class="fa fa-ban"></i> Cancelar
                </button>
            </div>
        </div>
    </div>
@endsection

@section('modal')
    <div class="modal fade" id="registroHijoTrabajadorModal" tabindex="-1" role="dialog"
         aria-labelledby="mediumModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mediumModalLabel">Registro de Hijos del Trabajador</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formHijosTrabajador" name="formHijosTrabajador" autocomplete="off">
                        <div class="row form-group">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="apellido_paterno_hijo" class="form-control-label">Apellido
                                        Paterno</label>
                                    <input type="text" id="apellido_paterno_hijo" name="apellido_paterno_hijo"
                                           class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="apellido_materno_hijo" class="form-control-label">Apellido
                                        Materno</label>
                                    <input type="text" id="apellido_materno_hijo" name="apellido_materno_hijo"
                                           class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="nombres_hijo" class="form-control-label">Nombres</label>
                                    <input type="text" id="nombres_hijo" name="nombres_hijo" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="tipo_documento_hijo" class="form-control-label">Tipo de
                                        Documento</label>
                                    <select name="tipo_documento_hijo" id="tipo_documento_hijo"
                                            class="form-control combo">
                                        <option value="0">Seleccione Tipo Doc.</option>
                                        @foreach($tipos_documentos as $item)
                                            <option value="{{$item->id}}">{{$item->abreviacion}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="numero_documento_hijo" class="form-control-label">Número de
                                        Documento</label>
                                    <input type="text" id="numero_documento_hijo" name="numero_documento_hijo"
                                           class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="fecha_nacimiento_hijo" class="form-control-label">Fecha de
                                        Nacimiento</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar-o"></i>
                                        </div>
                                        <input type="text" id="fecha_nacimiento_hijo" name="fecha_nacimiento_hijo"
                                               class="date form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="ocupacion_hijo" class="form-control-label">Ocupación</label>
                                    <input type="text" id="ocupacion_hijo" name="ocupacion_hijo" class="form-control">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" id="btnAgregarHijos">Aceptar</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $('.date').datepicker({
            format: 'yyyy-mm-dd'
        });

        $(function () {
            $('#departamento_origen').val('0');
            $('#departamento_residencia').val('0');
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

        function guardarRegistroTrabajadores() {
            let _token = $('input[name="_token"]').val();
            if ($("#formTrabajador").valid()) {
                $.ajax({
                    url: '{{route('saveTrabajador')}}',
                    method: "POST",
                    data: {
                        apellido_paterno: $('#apellido_paterno').val(),
                        apellido_materno: $('#apellido_materno').val(),
                        nombres: $('#nombres').val(),
                        tipo_documento: $('#tipo_documento').val(),
                        numero_documento: $('#numero_documento').val(),
                        pais_origen: $('#pais_origen').val(),
                        ciudad_origen: $('#ciudad_origen').val(),
                        fecha_nacimiento: $('#fecha_nacimiento').val(),
                        estado_civil: $('#estado_civil').val(),
                        email: $('#email').val(),
                        numero_fijo: $('#numero_fijo').val(),
                        numero_celular: $('#numero_celular').val(),
                        //Datos Direccion
                        domicilio_origen: $('#domicilio_origen').val(),
                        departamento_origen: $('#departamento_origen').val(),
                        provincia_origen: $('#provincia_origen').val(),
                        distrito_origen: $('#distrito_origen').val(),
                        domicilio_residencia: $('#domicilio_residencia').val(),
                        departamento_residencia: $('#departamento_residencia').val(),
                        provincia_residencia: $('#provincia_residencia').val(),
                        distrito_residencia: $('#distrito_residencia').val(),
                        //Datos Conyugue
                        apellido_paterno_conyugue: $('#apellido_paterno_conyugue').val(),
                        apellido_materno_conyugue: $('#apellido_materno_conyugue').val(),
                        nombres_conyugue: $('#nombres_conyugue').val(),
                        fecha_nacimiento_conyugue: $('#fecha_nacimiento_conyugue').val(),
                        tipo_documento_conyugue: $('#tipo_documento_conyugue').val(),
                        numero_documento_conyugue: $('#numero_documento_conyugue').val(),
                        numero_fijo_conyugue: $('#numero_fijo_conyugue').val(),
                        numero_celular_conyugue: $('#numero_celular_conyugue').val(),

                        //Hijos
                        hijos_agregados: JSON.stringify($('#tblHijosTrabajador').bootstrapTable('getData')),

                        //Datos de Notificacion Emergencia
                        apellido_paterno_emergencia: $('#apellido_paterno_emergencia').val(),
                        apellido_materno_emergencia: $('#apellido_materno_emergencia').val(),
                        nombres_emergencia: $('#nombres_emergencia').val(),
                        parentesco_emergencia: $('#parentesco_emergencia').val(),
                        tipo_documento_emergencia: $('#tipo_documento_emergencia').val(),
                        numero_documento_emergencia: $('#numero_documento_emergencia').val(),
                        direccion_emergencia: $('#direccion_emergencia').val(),
                        numero_fijo_emergencia: $('#numero_fijo_emergencia').val(),
                        numero_celular_emergencia: $('#numero_celular_emergencia').val(),

                        //Datos de Estudios
                        nivel_estudios: $('#nivel_estudios').val(),
                        centro_estudios: $('#centro_estudios').val(),
                        fecha_inicio_estudios: $('#fecha_inicio_estudios').val(),
                        fecha_fin_estudios: $('#fecha_fin_estudios').val(),
                        nivel_alcanzado_estudios: $('#nivel_alcanzado_estudios').val(),
                        _token: _token
                    },
                    dataType: "json",
                    success: function (response) {
                        if (response.code === 200) {
                            //SweetAlert Success
                            //window.location = '{{ route('listadoTrabajadores') }}';
                            swal.fire({
                                title: 'Información',
                                text: response.message,
                                icon: 'success'
                            }).then(function(){
                                window.location = '{{ route('listadoTrabajadores') }}';
                            });
                        }else if(response.code === 500){
                            //SweetAlert Error 500
                            swal.fire(
                                'Error!',
                                'Se ha producido un error: '+response.message,
                                'error'
                            );
                        }
                    }
                });
            }
        }

        const modelTable = [];
        $('#tblHijosTrabajador').bootstrapTable({
            modelTable,
            formatLoadingMessage: function () {
                return '';
            },
            formatNoMatches: function () {
                return "No hay registros agregados";
            }
        });
        $('#tblHijosTrabajador').bootstrapTable('hideColumn', 'tipo_documento_id');

        var indice = 0;
        $("#btnAgregarHijos").click(function () {
            if ($("#formHijosTrabajador").valid()) {
                $('#tblHijosTrabajador').bootstrapTable('insertRow', {
                    index: indice,
                    row: {
                        apellido_paterno: $('#apellido_paterno_hijo').val(),
                        apellido_materno: $('#apellido_materno_hijo').val(),
                        nombres: $('#nombres_hijo').val(),
                        tipo_documento_id: $('#tipo_documento_hijo').val(),
                        tipo_documento: $("#tipo_documento_hijo option:selected").text(),
                        numero_documento: $('#numero_documento_hijo').val(),
                        fecha_nacimiento: $('#fecha_nacimiento_hijo').val(),
                        ocupacion: $('#ocupacion_hijo').val()
                    }
                });
                $('#registroHijoTrabajadorModal').modal('hide');
                indice++;
            }
        });

        $("#btnRemoverRegistroHijo").click(function () {
            var ids = $.map($('#tblHijosTrabajador').bootstrapTable('getSelections'), function (row) {
                return row.numero_documento
            });

            $('#tblHijosTrabajador').bootstrapTable('remove', {
                field: 'numero_documento',
                values: ids
            });
        });

        $("#btnNuevoRegistroHijo").click(function () {
            $('#apellido_paterno_hijo').val('');
            $('#apellido_materno_hijo').val('');
            $('#nombres_hijo').val('');
            $('#tipo_documento_hijo').val(0);
            $('#numero_documento_hijo').val('');
            $('#fecha_nacimiento_hijo').val('');
            $('#ocupacion_hijo').val('');
        });

        //Validate Form
        if ($("#formTrabajador").length > 0) {
            $.validator.addMethod("valueNotEquals", function (value, element, arg) {
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
                    tipo_documento: {
                        valueNotEquals: "0"
                    },
                    numero_documento: {
                        required: true,
                        number: true,
                        maxlength: 50,
                        minlength: 8
                    },
                    pais_origen: {
                        valueNotEquals: "0"
                    },
                    ciudad_origen: {
                        valueNotEquals: "0"
                    },
                    fecha_nacimiento: {
                        required: true,
                        date: true
                    },
                    estado_civil: {
                        valueNotEquals: "0"
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    numero_fijo: {
                        required: true,
                        minlength: 5,
                        maxlength: 50
                    },
                    numero_celular: {
                        required: true,
                        minlength: 5,
                        maxlength: 50
                    },
                    domicilio_origen: {
                        required: true,
                        maxlength: 250
                    },
                    departamento_origen: {
                        valueNotEquals: "0"
                    },
                    provincia_origen: {
                        valueNotEquals: "0"
                    },
                    distrito_origen: {
                        valueNotEquals: "0"
                    },
                    domicilio_residencia: {
                        required: true,
                        maxlength: 250
                    },
                    departamento_residencia: {
                        valueNotEquals: "0"
                    },
                    provincia_residencia: {
                        valueNotEquals: "0"
                    },
                    distrito_residencia: {
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
                    tipo_documento: {
                        valueNotEquals: "Por favor, seleccione un tipo de documento."
                    },
                    numero_documento: {
                        required: "Por favor, rellene este campo.",
                        number: "Este campo solo puede contener números.",
                        maxlength: "Este campo no puede contener mas de 50 dígitos.",
                        minlength: "Este campo no puede contener menos de 8 dígitos."
                    },
                    pais_origen: {
                        valueNotEquals: "Por favor, seleccione un país."
                    },
                    ciudad_origen: {
                        valueNotEquals: "Por favor, seleccione una ciudad."
                    },
                    fecha_nacimiento: {
                        required: "Por favor, rellene este campo.",
                        date: "Fecha inválida."
                    },
                    domicilio_origen: {
                        required: "Por favor, rellene este campo.",
                    },
                    departamento_origen: {
                        valueNotEquals: "Por favor, seleccione un departamento."
                    },
                    provincia_origen: {
                        valueNotEquals: "Por favor, seleccione una provincia."
                    },
                    distrito_origen: {
                        valueNotEquals: "Por favor, seleccione un distrito."
                    },
                    estado_civil: {
                        valueNotEquals: "Por favor, seleccione un estado civíl."
                    },
                    email: {
                        required: "Por favor, rellene este campo.",
                        email: "Por favor, ingrese un e-mail válido."
                    },
                    numero_fijo: {
                        required: "Por favor, rellene este campo.",
                        minlength: "Este campo no puede contener menos de 5 dígitos.",
                        maxlength: "Este campo no puede contener mas de 50 dígitos.",
                    },
                    numero_celular: {
                        required: "Por favor, rellene este campo.",
                        minlength: "Este campo no puede contener menos de 5 dígitos.",
                        maxlength: "Este campo no puede contener mas de 50 dígitos.",
                    },
                    domicilio_residencia: {
                        required: "Por favor, rellene este campo.",
                    },
                    departamento_residencia: {
                        valueNotEquals: "Por favor, seleccione un departamento."
                    },
                    provincia_residencia: {
                        valueNotEquals: "Por favor, seleccione una provincia."
                    },
                    distrito_residencia: {
                        valueNotEquals: "Por favor, seleccione un distrito."
                    },
                },
                errorPlacement: function (label, element) {
                    label.addClass('badge badge-danger');
                    label.insertAfter(element);
                },
                wrapper: 'span'
            });
        }

        if ($("#formHijosTrabajador").length > 0){
            $.validator.addMethod("valueNotEquals", function (value, element, arg) {
                return arg !== value;
            });

            $('#formHijosTrabajador').validate({
                rules: {
                    apellido_paterno_hijo: {
                        required: true,
                        maxlength: 250
                    },
                    apellido_materno_hijo: {
                        required: true,
                        maxlength: 250
                    },
                    nombres_hijo: {
                        required: true,
                        maxlength: 250
                    },
                    tipo_documento_hijo: {
                        valueNotEquals: "0"
                    },
                    numero_documento_hijo: {
                        required: true,
                        number: true,
                        maxlength: 50,
                        minlength: 8
                    },
                    fecha_nacimiento_hijo: {
                        required: true,
                        date: true
                    },
                    ocupacion_hijo:{
                        required: true,
                        maxlength: 250
                    }
                },
                messages: {
                    apellido_paterno_hijo: {
                        required: "Por favor, rellene este campo.",
                    },
                    apellido_materno_hijo: {
                        required: "Por favor, rellene este campo.",
                    },
                    nombres_hijo: {
                        required: "Por favor, rellene este campo.",
                    },
                    tipo_documento_hijo: {
                        valueNotEquals: "Por favor, seleccione un elemento"
                    },
                    numero_documento_hijo: {
                        required: "Por favor, rellene este campo.",
                        number: "Solo puede contener números.",
                        maxlength: "No puede contener mas de 50 dígitos.",
                        minlength: "No puede contener menos de 8 dígitos."
                    },
                    fecha_nacimiento_hijo:{
                        required: "Por favor, rellene este campo.",
                        date: "Fecha inválida."
                    },
                    ocupacion_hijo:{
                        required: "Por favor, rellene este campo.",
                    }
                },
                errorPlacement: function (label, element) {
                    label.addClass('badge badge-danger');
                    label.insertAfter(element);
                },
                wrapper: 'span'
            });
        }
    </script>
@endsection
