@extends('layout.dash')

@section('titulo')
    Cambio de Contraseña
@endsection

@section('contenido')
    <div class="col-sm-12" id="divAdvertencia">
        <div class="sufee-alert alert with-close alert-warning alert-dismissible fade show">
            <span class="badge badge-pill badge-warning">Advertencia</span>
            Se recomienda cerrar sesión y volver a ingresar con la nueva contraseña para mejor seguridad.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Cambio de Contraseña</strong>
            </div>
            <form id="formCambioPwd" name="formCambioPwd" autocomplete="off" onsubmit="return false;">
                @csrf
                <div class="card-body">
                    <div class="row form-group">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="password_actual" class="form-control-label">Contraseña Actual</label>
                                <input type="password" id="password_actual" name="password_actual" class="form-control" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="nuevo_password" class="form-control-label">Nueva Contraseña</label>
                                <input type="password" id="nuevo_password" name="nuevo_password" class="form-control" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="rep_nuevo_password" class="form-control-label">Repetir Nueva Contraseña</label>
                                <input type="password" id="rep_nuevo_password" name="rep_nuevo_password" class="form-control" autocomplete="off">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success btn-sm" onclick="ActualizarPassword()">
                        <i class="fa fa-dot-circle-o"></i> Guardar
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(function(){
           $("#divAdvertencia").hide();
        });
        //Validate Form
        if ($("#formCambioPwd").length > 0) {
            $.validator.addMethod("valueNotEquals", function(value, element, arg){
                return arg !== value;
            });

            $.validator.methods.password_validate = function( value, element ) {
                return this.optional( element ) || /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{6,}$/.test( value );
            }

            $('#formCambioPwd').validate({
                rules: {
                    password_actual: {
                        required: true,
                        maxlength: 18,
                        minlength: 6
                    },
                    nuevo_password: {
                        required: true,
                        maxlength: 18,
                        minlength: 6,
                        password_validate: true
                    },
                    rep_nuevo_password: {
                        required: true,
                        maxlength: 18,
                        minlength: 6,
                        equalTo: "#nuevo_password"
                    },
                },
                messages: {
                    password_actual: {
                        required: "Por favor, rellene este campo",
                        maxlength: "No escriba mas de 18 caracteres",
                        minlength: "No escriba menos de 6 caracteres"
                    },
                    nuevo_password: {
                        required: "Por favor, rellene este campo",
                        maxlength: "No escriba mas de 18 caracteres",
                        minlength: "No escriba menos de 6 caracteres",
                        password_validate: "La contraseña debe contener al menos un número, una letra minuscula y mayuscula."
                    },
                    rep_nuevo_password: {
                        required: "Por favor, rellene este campo",
                        maxlength: "No escriba mas de 18 caracteres",
                        minlength: "No escriba menos de 6 caracteres",
                        equalTo: "La contraseñas no coincide"
                    }
                },
                errorPlacement: function(label, element) {
                    label.addClass('badge badge-danger');
                    label.insertAfter(element);
                },
                wrapper: 'span'
            });
        }

        function ActualizarPassword() {
            let _token = $('input[name="_token"]').val();
            let idUsuario = {{Auth::User()->id}};
            if ($("#formCambioPwd").valid()) {
                $.ajax({
                    url: '{{route('cambiopwdUsuario')}}',
                    method: "POST",
                    data: {
                        pwd_actual: $('#password_actual').val(),
                        idUsuario: idUsuario,
                        new_password: $('#nuevo_password').val(),
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
                                //Limpiar campos
                                $('#password_actual').val('');
                                $('#nuevo_password').val('');
                                $('#rep_nuevo_password').val('');
                                $("#divAdvertencia").show();
                            });
                        }else if(response.code === 404){
                            //SweetAlert Error 404
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
    </script>
@endsection
