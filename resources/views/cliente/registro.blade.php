@extends('layout.dash')

@section('titulo')
    Registro de Cliente
@endsection

@section('contenido')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <strong>Datos de Nuevo Cliente</strong>
            </div>
            <form method="POST" id="formCliente" name="formCliente" action="{{route('saveCliente')}}" autocomplete="off">
                @csrf
                <div class="card-body card-block">
                    <div class="row form-group">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="razon_social" class=" form-control-label">Razon Social</label>
                                <input type="text" id="razon_social" name="razon_social" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nombre_comercial" class=" form-control-label">Nombre Comercial</label>
                                <input type="text" id="nombre_comercial" name="nombre_comercial" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="ruc" class=" form-control-label">Ruc</label>
                                <input type="text" id="ruc" name="ruc" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="domicilio" class=" form-control-label">Domicilio</label>
                                <input type="text" id="domicilio" name="domicilio" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="departamento" class=" form-control-label">Departamento</label>
                                <select name="departamento" id="departamento" class="form-control combo"
                                        data-dependent="provincia">
                                    <option value="0">Seleccione Departamento</option>
                                    @foreach($departamentos as $item)
                                        <option value="{{$item->id}}">{{$item->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="provincia" class=" form-control-label">Provincia</label>
                                <select name="provincia" id="provincia" class="form-control combo"
                                        data-dependent="distrito">
                                    <option value="0">Seleccione Provincia</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="distrito" class=" form-control-label">Distrito</label>
                                <select name="distrito" id="distrito" class="form-control">
                                    <option value="0">Seleccione Distrito</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="card-subtitle">
                        <h4 class="text-left">Datos de Contacto</h4>
                        <hr/>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nombres_contacto" class=" form-control-label">Nombres</label>
                                <input type="text" id="nombres_contacto" name="nombres_contacto" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="apellidos_contacto" class=" form-control-label">Apellidos</label>
                                <input type="text" id="apellidos_contacto" name="apellidos_contacto" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="movil_contacto" class=" form-control-label">Nro Móvil</label>
                                <input type="text" id="movil_contacto" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email_contacto" class=" form-control-label">E-mail</label>
                                <input type="text" id="email_contacto" class="form-control">
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
        $(function () {
            $('#departamento').val('0');
        });
        $('.combo').change(function () {
            if ($(this).val() !== '') {
                let select = $(this).attr("id");
                let value = $(this).val();
                let dependent = $(this).data('dependent');
                let _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "{{ route('cliente.combodepend') }}",
                    method: "POST",
                    data: {select: select, value: value, _token: _token, dependent: dependent},
                    success: function (result) {
                        $('#' + dependent).html(result);
                    }
                });
            }
        });

        $('#departamento').change(function () {
            $('#distrito').val('0');
            $('#distrito')
                .empty()
                .append('<option value="0">Seleccione Distrito</option>');
        });

        //Validate Form
        if ($("#formCliente").length > 0) {
            $.validator.addMethod("valueNotEquals", function(value, element, arg){
                return arg !== value;
            });

            $('#formCliente').validate({
                rules: {
                    razon_social: {
                        required: true,
                        maxlength: 250
                    },
                    nombre_comercial: {
                        required: true,
                        maxlength: 250
                    },
                    ruc: {
                        number:true,
                        required: true,
                        maxlength: 11,
                        minlength: 11
                    },
                    domicilio:{
                        required: true,
                        maxlength: 500,
                    },
                    departamento:{
                        valueNotEquals: "0"
                    },
                    provincia:{
                        valueNotEquals: "0"
                    },
                    distrito:{
                        valueNotEquals: "0"
                    },
                    nombres_contacto:{
                        required: true,
                        maxlength: 250
                    },
                    apellidos_contacto:{
                        required: true,
                        maxlength: 250
                    }
                },
                messages: {

                    razon_social: {
                        required: "Por favor, rellene este campo.",
                    },
                    nombre_comercial: {
                        required: "Por favor, rellene este campo.",
                    },
                    ruc: {
                        required: "Por favor, rellene este campo.",
                        number: "RUC solo puede contener números.",
                        maxlength: "El RUC no puede contener mas de 11 dígitos.",
                        minlength: "El RUC no puede contener menos de 11 digitos.",
                    },
                    domicilio:{
                        required: "Por favor, rellene este campo.",
                    },
                    departamento: {
                        valueNotEquals: "Por favor, seleccione un departamento.",
                    },
                    provincia: {
                        valueNotEquals: "Por favor, seleccione una provincia.",
                    },
                    distrito: {
                        valueNotEquals: "Por favor, seleccione un distrito.",
                    },
                    nombres_contacto:{
                        required: "Por favor, rellene este campo.",
                    },
                    apellidos_contacto: {
                        required: "Por favor, rellene este campo.",
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
