@extends('layout.dash')

@section('titulo')
    Asignación de Trabajador
@endsection

@section('contenido')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <strong>Datos de Asignación de Trabajador</strong>
            </div>
            <form method="POST" id="formAsignacionTrabajador" name="formAsignacionTrabajador"
                  action="{{route('saveAsignacionTrabajador')}}"
                  autocomplete="off">
                @csrf
                <div class="card-body card-block">
                    <div class="row form-group">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="cliente" class="form-control-label">Cliente</label>
                                <input type="text" readonly id="cliente" name="cliente"
                                       class="form-control"
                                       value="{{$cliente->razonsocial." - ".$cliente->nombrecomercial}}">
                                <input type="hidden" id="hidIdCliente" name="hidIdCliente" value="{{$cliente->id}}"/>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="trabajador" class="form-control-label">Trabajador</label>
                                <select name="trabajador" id="trabajador"
                                        class="form-control combo">
                                    <option value="0">Seleccione Trabajador</option>
                                    @foreach($trabajadores as $item)
                                        <option
                                            value="{{$item->id}}">{{$item->nombres.", ".$item->apellidopaterno}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="fecha_ingreso" class="form-control-label">Fecha de Ingreso</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar-o"></i>
                                        </div>
                                        <input type="text" id="fecha_ingreso" name="fecha_ingreso"
                                               class="date form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="cargo_laboral" class="form-control-label">Cargo Laboral</label>
                                <select name="cargo_laboral" id="cargo_laboral"
                                        class="form-control combo">
                                    <option value="0">Seleccione Cargo Laboral</option>
                                    @foreach($cargos_laborales as $item)
                                        <option value="{{$item->id}}">{{$item->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="vinculo_laboral" class="form-control-label">Vínculo Laboral</label>
                                <select name="vinculo_laboral" id="vinculo_laboral"
                                        class="form-control combo">
                                    <option value="0">Seleccione Vínculo Laboral</option>
                                    @foreach($vinculos_laborales as $item)
                                        <option value="{{$item->id}}">{{$item->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="remuneracion" class="form-control-label">Remuneración</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        S/.
                                    </div>
                                    <input type="text" id="remuneracion" name="remuneracion" class="form-control">
                                    <div class="input-group-addon">.00</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="horario" class="form-control-label">Horario</label>
                                <input type="text" id="horario" name="horario"
                                       class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="regimen_pension" class="form-control-label">Régimen de Pensión</label>
                                <select name="regimen_pension" id="regimen_pension"
                                        class="form-control combo">
                                    <option value="0">Seleccione Régimen Pensión</option>
                                    @foreach($regimenes_pension as $item)
                                        <option value="{{$item->id}}">{{$item->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="regimen_salud" class="form-control-label">Régimen de Salud</label>
                                <select name="regimen_salud" id="regimen_salud"
                                        class="form-control combo">
                                    <option value="0">Seleccione Régimen Salud</option>
                                    @foreach($regimenes_salud as $item)
                                        <option value="{{$item->id}}">{{$item->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="periodicidad_remuneracion" class="form-control-label">Periodicidad de
                                    Remuneración</label>
                                <select name="periodicidad_remuneracion" id="periodicidad_remuneracion"
                                        class="form-control combo">
                                    <option value="0">Seleccione Banco</option>
                                    @foreach($periodicidades_remuneracion as $item)
                                        <option value="{{$item->id}}">{{$item->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="tipo_contrato" class="form-control-label">Tipo de Contrato</label>
                                <select name="tipo_contrato" id="tipo_contrato"
                                        class="form-control combo">
                                    <option value="0">Seleccione Banco</option>
                                    @foreach($tipos_contrato as $item)
                                        <option value="{{$item->id}}">{{$item->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="tipo_trabajo" class="form-control-label">Tipo de Trabajo</label>
                                <select name="tipo_trabajo" id="tipo_trabajo"
                                        class="form-control combo">
                                    <option value="0">Seleccione Banco</option>
                                    @foreach($tipos_trabajador_asig as $item)
                                        <option value="{{$item->id}}">{{$item->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card-subtitle">
                        <h4 class="text-left">Depósito de Sueldo</h4>
                        <hr/>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="banco" class="form-control-label">Banco</label>
                                <select name="banco" id="banco"
                                        class="form-control combo">
                                    <option value="0">Seleccione Banco</option>
                                    @foreach($bancos as $item)
                                        <option value="{{$item->id}}">{{$item->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="numero_cuenta" class="form-control-label">Número de Cuenta</label>
                                <input type="text" id="numero_cuenta" name="numero_cuenta"
                                       class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="cuenta_cci" class="form-control-label">Cuenta CCI</label>
                                <input type="text" id="cuenta_cci" name="cuenta_cci"
                                       class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="card-subtitle">
                        <h4 class="text-left">Material de Trabajo</h4>
                        <hr/>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="equipo_movil" class="form-control-label">Equipo Móvil</label>
                                <input type="text" id="equipo_movil" name="equipo_movil"
                                       class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="laptop" class="form-control-label">Laptop</label>
                                <input type="text" id="laptop" name="laptop"
                                       class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="correo_corporativo" class="form-control-label">Correo Corporativo</label>
                                <input type="text" id="correo_corporativo" name="correo_corporativo"
                                       class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="card-subtitle">
                        <h4 class="text-left">Presentación de Documentación de Personal</h4>
                        <hr/>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-2">
                            <div class="form-group">
                                <div class="form-check">
                                    <div class="checkbox">
                                        <label for="cv" class="form-check-label ">
                                            <input type="checkbox" id="cv" name="cv" class="form-check-input">CV
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <div class="form-check">
                                    <div class="checkbox">
                                        <label for="dni_fisico" class="form-check-label ">
                                            <input type="checkbox" id="dni_fisico" name="dni_fisico" class="form-check-input">DNI Físico
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <div class="form-check">
                                    <div class="checkbox">
                                        <label for="recibo_servicios" class="form-check-label ">
                                            <input type="checkbox" id="recibo_servicios" name="recibo_servicios" class="form-check-input">Recibo de Servicios
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <div class="form-check">
                                    <div class="checkbox">
                                        <label for="ficha_ingreso" class="form-check-label ">
                                            <input type="checkbox" id="ficha_ingreso" name="ficha_ingreso" class="form-check-input">Ficha de Ingreso
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <div class="form-check">
                                    <div class="checkbox">
                                        <label for="contrato" class="form-check-label ">
                                            <input type="checkbox" id="contrato" name="contrato" class="form-check-input">Contrato
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <div class="form-check">
                                    <div class="checkbox">
                                        <label for="consulta_equifax" class="form-check-label ">
                                            <input type="checkbox" id="consulta_equifax" name="consulta_equifax" class="form-check-input">Consulta Equifax
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-subtitle">
                        <h4 class="text-left">Motivo de Cese</h4>
                        <hr/>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-3">
                            <div class="form-check">
                                <div class="radio">
                                    <label for="renuncia" class="form-check-label ">
                                        <input type="radio" id="renuncia" name="motivo_cese" value="renuncia" class="form-check-input">Renuncia
                                    </label>
                                </div>
                                <div class="radio">
                                    <label for="despido" class="form-check-label ">
                                        <input type="radio" id="despido" name="motivo_cese" value="despido" class="form-check-input">Despido
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <div class="form-check">
                                    <div class="checkbox">
                                        <label for="sin_renovacion" class="form-check-label ">
                                            <input type="checkbox" id="sin_renovacion" name="sin_renovacion" class="form-check-input">Sin Renovación de Contrato
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="fecha_entrega_liquidacion" class="form-control-label">Fecha de Entrega de Liquidación</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar-o"></i>
                                    </div>
                                    <input type="text" id="fecha_entrega_liquidacion" name="fecha_entrega_liquidacion" class="date form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success btn-sm">
                        <i class="fa fa-dot-circle-o"></i> Guardar
                    </button>
                    <button type="reset" class="btn btn-secondary btn-sm"
                            onclick="window.location='{{ route("asignaciontrabajador.index") }}'">
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
            format: 'yyyy-mm-dd'
        });

        //Validate Form
        if ($("#formAsignacionTrabajador").length > 0) {
            $.validator.addMethod("valueNotEquals", function (value, element, arg) {
                return arg !== value;
            });

            $('#formAsignacionTrabajador').validate({
                rules: {
                    trabajador: {
                        valueNotEquals: "0"
                    },
                    fecha_ingreso: {
                        required: true,
                        date: true
                    },
                    cargo_laboral:{
                        valueNotEquals: "0"
                    },
                    vinculo_laboral:{
                        valueNotEquals: "0"
                    },
                    remuneracion:{
                        required: true,
                        number: true
                    },
                    horario:{
                        required: true,
                        maxlength: 250
                    },
                    regimen_pension:{
                        valueNotEquals: "0"
                    },
                    regimen_salud:{
                        valueNotEquals: "0"
                    },
                    periodicidad_remuneracion:{
                        valueNotEquals: "0"
                    },
                    tipo_contrato:{
                        valueNotEquals: "0"
                    },
                    tipo_trabajo:{
                        valueNotEquals: "0"
                    },
                    banco:{
                        valueNotEquals: "0"
                    },
                    numero_cuenta:{
                        required: true,
                        maxlength: 50
                    },
                    cuenta_cci:{
                        required: true,
                        maxlength: 50
                    },
                    equipo_movil:{
                        required: true,
                        maxlength: 250
                    },
                    laptop:{
                        required: true,
                        maxlength: 250
                    },
                    correo_corporativo:{
                        required: true,
                        maxlength: 250,
                        email: true
                    },
                    motivo_cese: {
                        required: true
                    },
                    fecha_entrega_liquidacion:{
                        required: true,
                        date: true
                    }
                },
                messages: {
                    trabajador: {
                        valueNotEquals: "Por favor, seleccione un elemento.",
                    },
                    fecha_ingreso:{
                        required: "Por favor, ingrese una fecha de ingreso.",
                        date: "Fecha inválida."
                    },
                    cargo_laboral:{
                        valueNotEquals: "Por favor, seleccione un elemento.",
                    },
                    vinculo_laboral:{
                        valueNotEquals: "Por favor, seleccione un elemento.",
                    },
                    remuneracion:{
                        required: "Por favor, rellene este campo.",
                        number: "Este campo solo puede contener números.",
                    },
                    horario: {
                        required: "Por favor, rellene este campo.",
                    },
                    regimen_pension:{
                        valueNotEquals: "Por favor, seleccione un elemento.",
                    },
                    regimen_salud:{
                        valueNotEquals: "Por favor, seleccione un elemento.",
                    },
                    periodicidad_remuneracion:{
                        valueNotEquals: "Por favor, seleccione un elemento.",
                    },
                    tipo_contrato:{
                        valueNotEquals: "Por favor, seleccione un elemento.",
                    },
                    tipo_trabajo:{
                        valueNotEquals: "Por favor, seleccione un elemento.",
                    },
                    banco:{
                        valueNotEquals: "Por favor, seleccione un elemento.",
                    },
                    numero_cuenta:{
                        required: "Por favor, rellene este campo.",
                        maxlenth: "Este campo no puede contener mas de 50 dígitos.",
                    },
                    cuenta_cci:{
                        required: "Por favor, rellene este campo.",
                        maxlenth: "Este campo no puede contener mas de 50 dígitos.",
                    },
                    equipo_movil:{
                        required: "Por favor, rellene este campo.",
                        maxlenth: "Este campo no puede contener mas de 250 dígitos.",
                    },
                    laptop:{
                        required: "Por favor, rellene este campo.",
                        maxlenth: "Este campo no puede contener mas de 250 dígitos.",
                    },
                    correo_corporativo:{
                        required: "Por favor, rellene este campo.",
                        maxlenth: "Este campo no puede contener mas de 50 dígitos.",
                        email: "Por favor, ingrese un e-mail válido."
                    },
                    motivo_cese: {
                        required: "Por favor, seleccione un elemento.",
                    },
                    fecha_entrega_liquidacion:{
                        required: "Por favor, ingrese este campo.",
                        date: "Fecha inválida."
                    }
                },
                errorPlacement: function (label, element) {
                    if (element.is(":radio") )
                    {
                        label.appendTo(element.parents('.form-check'));
                        label.addClass('badge badge-danger');
                    }
                    else
                    {
                        label.addClass('badge badge-danger');
                        label.insertAfter(element);
                    }
                },
                wrapper: 'span'
            });
        }
    </script>
@endsection
