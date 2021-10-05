@extends('layout.dash')

@section('titulo')
    Listado de Trabajadores
@endsection

@section('contenido')
    <div class="col-sm-12">
        @if(session()->get('success'))
            <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                <span class="badge badge-pill badge-success">Éxito</span>
                {{ session()->get('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        @endif
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Listado de Trabajadores</strong>
            </div>
            <div class="card-body">
                <div class="row form-group">
                    <div class="col-md-3">
                        <button class="btn btn-outline-secondary" id="btnNuevo">Nuevo Registro</button>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-12">
                        <div class="table-responsive table--no-card m-b-30">
                            <table class="table table-borderless table-data3" id="tblTrabajadores" style="width: 100%;">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Apellido Pat.</th>
                                    <th>Apellido Mat.</th>
                                    <th>Nombres</th>
                                    <th>Tipo Doc.</th>
                                    <th>Número de Doc.</th>
                                    <th>Email</th>
                                    <th>Estado</th>
                                    <th>Acción</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('modal')
    <div class="modal fade" id="modalCambioEstado" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true"
         data-backdrop="static">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticModalLabel">Actualización de Estado de Trabajador</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form name="frmActualizacionEstado">
                        @csrf
                        <div class="row form-group">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="comboEstado" class=" form-control-label">Estado de Trabajador</label>
                                    <select name="comboEstado" id="comboEstado" class="form-control">
                                        <option value="0">Seleccione Estado</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button class="btn btn-danger" id="btnGuardarEstado" type="submit">Guardar</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">

        var idEstadoTrabajador = 0;
        var table;

        $(function () {
            table = $('#tblTrabajadores').DataTable({
                processing: true,
                serverSide: true,
                paging: true,
                ajax: "{{ route('listadoTrabajadores') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'apellidopaterno', name: 'apellidopaterno'},
                    {data: 'apellidomaterno', name: 'apellidomaterno'},
                    {data: 'nombres', name: 'nombres'},
                    {data: 'tipodocumento', name: 'tipodocumento'},
                    {data: 'numerodocumento', name: 'numerodocumento'},
                    {data: 'email', name: 'email'},
                    {data: 'estadotrabajador', name: 'estadotrabajador'},
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
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
            $("#tblTrabajadores_filter input[type=\"search\"]").addClass("form-control");
        });

        $('body').on('click', '.estadoTrabajador', function () {
            idEstadoTrabajador = $(this).data('id');
            let idestado = $(this).data('idestado');

            $('#modalCambioEstado').modal('show');
            //Peticion ajax para traer el listado de estados de trabajador
            let _token = $('input[name="_token"]').val();
            $.ajax({
                url: "{{ route('trabajador.comboestado') }}",
                method: "POST",
                data: {idestado: idestado, _token: _token},
                success: function (result) {
                    $('#comboEstado').html(result);
                }
            });
        });

        $("#btnGuardarEstado").click(function(){
            let _token = $('input[name="_token"]').val();
            let estadoSeleccionado = $("#comboEstado").val();
            $.ajax({
                url: "{{ route('cambioestadoTrabajador', 'id') }}".replace('id', idEstadoTrabajador),
                method: "POST",
                data: {estadoSeleccionado: estadoSeleccionado, _token: _token},
                success: function (response) {
                    if(response.code === 200){
                        swal.fire(
                            'Éxito!',
                            'Estado actualizado correctamente!!',
                            'success'
                        );
                        $('#modalCambioEstado').modal('hide');
                        table.ajax.reload();
                    }
                }
            });
        });

        $("#btnNuevo").click(function(){
            window.location.href = "{{ route('addTrabajador')}}";
        });
    </script>

@endsection
