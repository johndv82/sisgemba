@extends('layout.dash')

@section('titulo')
    Actualización de Usuario
@endsection

@section('contenido')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <strong>Datos de Actualización de Usuario</strong>
            </div>
            <form id="formUsuario" name="formUsuario" autocomplete="off" onsubmit="return false;">
                @csrf
                <div class="card-body card-block">
                    <div class="row form-group">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="label_usuario" class=" form-control-label">Nombre de Usuario: </label>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <strong>
                                <p id="label_usuario" class="form-control-static">{{$usuario->name}}</p>
                            </strong>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nombres" class=" form-control-label">Nombres</label>
                                <input type="text" id="nombres" name="nombres" class="form-control" value="{{$usuario->nombres}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="apellidos" class=" form-control-label">Apellidos</label>
                                <input type="text" id="apellidos" name="apellidos" class="form-control" value="{{$usuario->apellidos}}">
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email" class=" form-control-label">Email</label>
                                <input type="text" id="email" name="email" class="form-control" value="{{$usuario->email}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="rol" class=" form-control-label">Rol</label>
                                <select name="rol" id="rol" class="form-control combo">
                                    <option value="0">Seleccione Rol</option>
                                    @foreach($roles as $item)
                                        <option value="{{$item->id}}" {{($item->id==$usuario->rol_id)?"selected":""}}>{{$item->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card-footer">
                    <div class="row form-group">
                        <div class="col-md-10">
                            <button type="submit" class="btn btn-success btn-sm" onclick="actualizarUsuario()">
                                <i class="fa fa-dot-circle-o"></i> Actualizar
                            </button>
                            <button type="reset" class="btn btn-danger btn-sm" onclick="confirmEliminarUsuario()">
                                <i class="fa fa-ban"></i> Eliminar
                            </button>
                        </div>

                        <div class="col-md-2 text-right">
                            <button type="reset" class="btn btn-secondary btn-sm" onclick="window.location='{{ route("listadoUsuarios") }}'">
                                <i class="fa fa-ban"></i> Cancelar
                            </button>
                        </div>
                    </div>
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
                    email: {
                        required: true,
                        email: true,
                        maxlength: 250
                    },
                    rol:{
                        valueNotEquals: "0"
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
                    email: {
                        required: "Por favor, rellene este campo",
                        email: "Solo Email valido",
                        maxlength: "No escriba mas de 250 caracteres"
                    },
                    rol:{
                        valueNotEquals: "Por favor, seleccione un Rol"
                    }
                },
                errorPlacement: function(label, element) {
                    label.addClass('badge badge-danger');
                    label.insertAfter(element);
                },
                wrapper: 'span'
            });
        }

        function actualizarUsuario() {
            let _token = $('input[name="_token"]').val();
            let idUsuario = {{$usuario->id}};
            if ($("#formUsuario").valid()) {
                $.ajax({
                    url: '{{route('updateUsuario')}}',
                    method: "POST",
                    data: {
                        idUsuario: idUsuario,
                        nombres: $('#nombres').val(),
                        apellidos: $('#apellidos').val(),
                        email: $('#email').val(),
                        rol: $('#rol').val(),
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

        function confirmEliminarUsuario(){
            swal.fire({
                title: '¿Está seguro que desea eliminar el registro?',
                text: "No se podrá revertir esta acción!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, eliminar ahora!',
                cancelButtonText: 'No, cancelar!'
            }).then((result) => {
                if (result.isConfirmed) {
                    let _token = $('input[name="_token"]').val();
                    $.ajax({
                        url: "{{ route('deleteUsuario', $usuario->id) }}",
                        method: "POST",
                        data: {_token: _token},
                        dataType: 'json',
                        success: function (response) {
                            if (response.code === 200) {
                                //Sweet Alert
                                swal.fire(
                                    'Eliminado!',
                                    'Su registro ha sido borrado.',
                                    'success'
                                ).then(function(){
                                    //Redirigir a listado de usuarios
                                    window.location='{{ route("listadoUsuarios") }}'
                                });
                            }
                        }
                    });
                }
            })
        }
    </script>
@endsection
