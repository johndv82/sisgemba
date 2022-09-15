@extends('layout.dash')

@section('titulo')
    Listado de Usuarios
@endsection

@section('contenido')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Listado de Usuarios</strong>
            </div>
            <div class="card-body">
                <div class="row form-group">
                    <div class="col-md-3">
                        <button class="btn btn-outline-secondary" id="btnNuevo">Nuevo Registro</button>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-12">
                        <form id="formListadoUsuario" name="formListadoUsuario" autocomplete="off" onsubmit="return false;">
                            @csrf
                            <div class="table-responsive table--no-card m-b-30">
                                <table class="table table-borderless table-data3" id="tblUsuarios" style="width: 100%;">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nombre</th>
                                        <th>Email</th>
                                        <th>Rol</th>
                                        <th>Creado</th>
                                        <th>Contraseña</th>
                                        <th>Acción</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('scripts')
    <script type="text/javascript">
        var table;
        $(function () {
            table = $('#tblUsuarios').DataTable({
                processing: true,
                serverSide: true,
                paging: true,
                ajax: "{{ route('listadoUsuarios') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'name', name: 'name'},
                    {data: 'email', name: 'email'},
                    {data: 'rol', name: 'rol'},
                    {data: 'created_at', name: 'created_at'},
                    {
                        data: 'password',
                        name: 'password'
                    },
                    {
                        data: 'action',
                        name: 'action'
                    },
                ],
                pagingType: "simple",
                language: {
                    info: "Mostrando página _PAGE_ de _PAGES_",
                    infoEmpty: "Mostrando 0 registros",
                    search: "Buscar: ",
                    emptyTable: "No hay ningún registro",
                    paginate:{
                        "next": "<ul class='pagination'><li class='page-item'><a class='page-link' href='#'>Siguiente</a></li></ul>",
                        "previous": "<ul class='pagination'><li class='page-item'><a class='page-link' href='#'>Anterior</a></li></ul>"
                    },
                    lengthMenu: 'Mostrar &nbsp;<select class="form-control">'+
                        '<option value="5">5</option>'+
                        '<option value="10">10</option>'+
                        '<option value="15">15</option>'+
                        '</select> &nbsp;registros'
                }
            });
            table.columns([0]).visible(false);
            $("#tblUsuarios_filter input[type=\"search\"]").addClass("form-control");
        });

        $("#btnNuevo").click(function(){
            window.location.href = "{{ route('addUsuario')}}";
        });

        $("body").on("click", ".resetear_password", function(){
            var data = table.row( $(this).parents('tr') ).data();
            swal.fire({
                title: 'Ingrese la nueva contraseña de apertura para el usuario: '+data.name,
                input: 'text',
                inputAttributes: {
                    autocapitalize: 'off',
                },
                inputValidator: (value) => {
                    if (value.length > 18) {
                        return 'La contraseña no puede tener mas de 18 digitos'
                    }
                    if (value.length < 6) {
                        return 'La contraseña no puede tener menos de 6 digitos'
                    }
                },
                showCancelButton: true,
                confirmButtonText: 'Aceptar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    let _token = $('input[name="_token"]').val();
                    $.ajax({
                        url: "{{ route('resetpwdUsuario') }}",
                        method: "POST",
                        data: {
                            idUsuario: data.id,
                            new_password: result.value,
                            _token: _token
                        },
                        dataType: 'json',
                        success: function (response) {
                            if (response.code === 200) {
                                //Sweet Alert
                                swal.fire(
                                    'Correcto!',
                                    response.message,
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
        });

    </script>

@endsection
