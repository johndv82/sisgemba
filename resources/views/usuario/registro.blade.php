@extends('layout.dash')

@section('titulo')
    Registro de Usuario
@endsection

@section('contenido')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <strong>Datos de Nuevo Usuario</strong>
            </div>
            <form id="formUsuario" name="formUsuario" autocomplete="off" onsubmit="return false;">
                @csrf
                <div class="card-body card-block">
                    <div class="row form-group">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nombres" class=" form-control-label">Nombres</label>
                                <input type="text" id="nombres" name="nombres" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="apellidos" class=" form-control-label">Apellidos</label>
                                <input type="text" id="apellidos" name="apellidos" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="dni" class=" form-control-label">DNI</label>
                                <input type="text" id="dni" name="dni" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="rol" class=" form-control-label">Rol</label>
                                <select name="rol" id="rol" class="form-control combo">
                                    <option value="0">Seleccione Departamento</option>
                                    @foreach($roles as $item)
                                        <option value="{{$item->id}}">{{$item->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="email" class=" form-control-label">Email</label>
                                <input type="text" id="email" name="email" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nombre_usuario" class=" form-control-label">Nombre de Usuario</label>
                                <input type="text" id="nombre_usuario" name="nombre_usuario" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="password_aper" class=" form-control-label">Contraseña de Apertura</label>
                                <input type="text" id="password_aper" name="password_aper" class="form-control">
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success btn-sm" onclick="guardarRegistroUsuarios()">
                        <i class="fa fa-dot-circle-o"></i> Guardar
                    </button>
                    <button type="reset" class="btn btn-secondary btn-sm" onclick="window.location='{{ route("listadoUsuarios") }}'">
                        <i class="fa fa-ban"></i> Cancelar
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        //Validate Form
        if ($("#formUsuario").length > 0) {
            $.validator.addMethod("valueNotEquals", function(value, element, arg){
                return arg !== value;
            });

            $('#formUsuario').validate({
                rules: {
                    nombres: {
                        required: true,
                        maxlength: 250
                    },
                    apellidos: {
                        required: true,
                        maxlength: 250
                    },
                    dni:{
                        required: true,
                        maxlength: 8,
                        minlength: 8,
                        number: true
                    },
                    email: {
                        required: true,
                        email: true,
                        maxlength: 250
                    },
                    rol:{
                        valueNotEquals: "0"
                    },
                    nombre_usuario:{
                        required: true,
                        maxlength: 25,
                    },
                    password_aper:{
                        required: true,
                        minlength: 6,
                        maxlength: 18,
                    }
                },
                messages: {
                    nombres: {
                        required: "Por favor, rellene este campo",
                        maxlength: "No escriba mas de 250 caracteres"
                    },
                    apellidos: {
                        required: "Por favor, rellene este campo",
                        maxlength: "No escriba mas de 250 caracteres"
                    },
                    dni:{
                        required: "Por favor, rellene este campo",
                        maxlength: "El DNI solo es de 8 caracteres",
                        minlength: "El DNI solo es de 8 caracteres",
                        number: "Solo números"
                    },
                    email: {
                        required: "Por favor, rellene este campo",
                        email: "Solo Email valido",
                        maxlength: "No escriba mas de 250 caracteres"
                    },
                    rol:{
                        valueNotEquals: "Por favor, seleccione un Rol"
                    },
                    nombre_usuario:{
                        required: "Por favor, rellene este campo",
                        maxlength: "No escriba mas de 25 caracteres",
                    },
                    password_aper:{
                        required: "Por favor, rellene este campo",
                        minlength: "La contraseña no puedes tener menos de 6 caracteres",
                        maxlength: "No escriba mas de 18 caracteres",
                    }
                },
                errorPlacement: function(label, element) {
                    label.addClass('badge badge-danger');
                    label.insertAfter(element);
                },
                wrapper: 'span'
            });
        }

        function guardarRegistroUsuarios() {
            let _token = $('input[name="_token"]').val();
            if ($("#formUsuario").valid()) {
                $.ajax({
                    url: '{{route('saveUsuario')}}',
                    method: "POST",
                    data: {
                        nombres: $('#nombres').val(),
                        apellidos: $('#apellidos').val(),
                        dni: $('#dni').val(),
                        email: $('#email').val(),
                        rol: $('#rol').val(),
                        nombre_usuario: $('#nombre_usuario').val(),
                        password_aper: $('#password_aper').val(),
                        _token: _token
                    },
                    dataType: "json",
                    success: function (response) {
                        if (response.code === 200) {
                            //SweetAlert Success
                            swal.fire({
                                title: 'Información',
                                text: response.message,
                                icon: 'success'
                            }).then(function(){
                                window.location = '{{ route('listadoUsuarios') }}';
                            });
                        }else if(response.code === 406){
                            //SweetAlert Error 406
                            swal.fire(
                                'Error de duplicidad!',
                                'Se ha producido un error: '+response.message,
                                'error'
                            );
                        }
                    }
                });
            }
        }
    </script>
@endsection
