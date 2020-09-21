@extends('layout.dash')

@section('titulo')
    Actualización de Hijo de Trabajador
@endsection

@section('contenido')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <strong>Datos de Actualización de Hijo de Trabajador</strong>
            </div>
            <form method="POST" id="formHijosTrabajador" name="formHijosTrabajador" action="{{route('updateHijosTrabajador', $hijo->id)}}"
                  autocomplete="off">
                @csrf
                <div class="card-body card-block">
                    <div class="row form-group">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="apellido_paterno_hijo" class="form-control-label">Apellido
                                    Paterno</label>
                                <input type="text" id="apellido_paterno_hijo" name="apellido_paterno_hijo"
                                       class="form-control" value="{{$hijo->apellidopaterno}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="apellido_materno_hijo" class="form-control-label">Apellido
                                    Materno</label>
                                <input type="text" id="apellido_materno_hijo" name="apellido_materno_hijo"
                                       class="form-control" value="{{$hijo->apellidomaterno}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nombres_hijo" class="form-control-label">Nombres</label>
                                <input type="text" id="nombres_hijo" name="nombres_hijo"
                                       class="form-control" value="{{$hijo->nombres}}">
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
                                        <option value="{{$item->id}}" {{($item->id==$hijo->tipodocumento_id)?"selected":""}}>{{$item->abreviacion}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="numero_documento_hijo" class="form-control-label">Número de
                                    Documento</label>
                                <input type="text" id="numero_documento_hijo" name="numero_documento_hijo"
                                       class="form-control" value="{{$hijo->numerodocumento}}">
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
                                           class="date form-control" value="{{$hijo->fechanacimiento}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="ocupacion_hijo" class="form-control-label">Ocupación</label>
                                <input type="text" id="ocupacion_hijo" name="ocupacion_hijo"
                                       class="form-control" value="{{$hijo->ocupacion}}">
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
                            <button type="reset" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalConfirmacion">
                                <i class="fa fa-ban"></i> Eliminar
                            </button>
                        </div>
                        <div class="col-md-2 text-right">
                            <button type="reset" class="btn btn-secondary btn-sm" onclick="window.location='{{ route("hijosTrabajador.index") }}'">
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
                    <form action="{{ route('deleteHijosTrabajador', $hijo->id)}}" method="post">
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
            format: 'yyyy-mm-dd'
        });

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
