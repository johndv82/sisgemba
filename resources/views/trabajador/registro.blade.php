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
            <form id="formTrabajador" name="formTrabajador" autocomplete="off">
                @csrf
                <div class="card-body card-block">
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
                                <input type="text" id="apellido_materno" name="nombre_comercial" class="form-control">
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
                                <label for="tipo_doc" class="form-control-label">Tipo de Documento</label>
                                <select name="tipo_doc" id="tipo_doc" class="form-control combo">
                                    <option value="0">Seleccione Tipo Doc.</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="numero_doc" class="form-control-label">Número de Documento</label>
                                <input type="text" id="numero_doc" name="numero_doc" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="pais_origen" class="form-control-label">País de Origen</label>
                                <input type="text" id="pais_origen" name="pais_origen" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="ciudad_origen" class="form-control-label">Ciudad de Origen</label>
                                <input type="text" id="ciudad_origen" name="ciudad_origen" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="fecha_nacimiento" class="form-control-label">Fecha de Nacimiento</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar-o"></i>
                                    </div>
                                    <input type="text" id="fecha_nacimiento" name="fecha_nacimiento" class="date form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="estado_civil" class="form-control-label">Estado Civil</label>
                                <select name="estado_civil" id="estado_civil" class="form-control combo">
                                    <option value="0">Seleccione Estado Civil</option>
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
                                <select name="departamento_origen" id="departamento_origen" class="form-control combo_origen"
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
                                <select name="provincia_origen" id="provincia_origen" class="form-control combo_origen"
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

                    <div class="form-group">
                        <label for="domicilio_residencia" class=" form-control-label">Domicilio de Residencia</label>
                        <input type="text" id="domicilio_residencia" name="domicilio_residencia" class="form-control">
                    </div>

                    <div class="row form-group">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="departamento_residencia" class=" form-control-label">Departamento Residencia</label>
                                <select name="departamento_residencia" id="departamento_residencia" class="form-control combo_origen"
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
                                <label for="provincia_residencia" class=" form-control-label">Provincia Residencia</label>
                                <select name="provincia_residencia" id="provincia_residencia" class="form-control combo_origen"
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
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success btn-sm">
                        <i class="fa fa-dot-circle-o"></i> Guardar
                    </button>
                    <button type="reset" class="btn btn-secondary btn-sm" onclick="window.location='{{ route("listadoClientes") }}'">
                        <i class="fa fa-ban"></i> Cancelar
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $('.date').datepicker({
            format: 'mm-dd-yyyy'
        });

        $(function () {
            $('#departamento_origen').val('0');
        });
        $('.combo_origen').change(function () {
            if ($(this).val() !== '') {
                var select = $(this).attr("id");
                var value = $(this).val();
                var dependent = $(this).data('dependent');
                var _token = $('input[name="_token"]').val();
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
            $('#provincia_origen').val('0');
            $('#distrito_origen').val('0');
        });

        $('#provincia_origen').change(function () {
            $('#distrito_origen').val('0');
        });
    </script>
@endsection
