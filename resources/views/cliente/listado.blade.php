@extends('layout.dash')

@section('titulo')
    Listado de Clientes
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
                <strong class="card-title">Listado de Clientes</strong>
            </div>
            <div class="card-body">
                <div class="row form-group">
                    <div class="col-md-3">
                        <button class="btn btn-outline-secondary" id="btnNuevo">Nuevo Registro</button>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-12">
                        <div class="table-responsive table--no-card m-b-30">
                            <table class="table table-borderless table-data3" id="tblClientes" style="width: 100%;">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Razon Social</th>
                                    <th>Nombre Comercial</th>
                                    <th>Ruc</th>
                                    <th>Domicilio</th>
                                    <th>Creado</th>
                                    <th>JSON Contacto</th>
                                    <th>Contacto</th>
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
    <div class="modal fade" id="modalContacto" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true"
         data-backdrop="static">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticModalLabel">Contacto de Cliente</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row form-group">
                        <div class="col-sm-5">
                            <label for="nombres_contacto" class=" form-control-label">Nombres:</label>
                        </div>
                        <div class="col-sm-7">
                            <p id="nombres_contacto" class="form-control-static"></p>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-5">
                            <label for="apellidos_contacto" class=" form-control-label">Apellidos:</label>
                        </div>
                        <div class="col-sm-7">
                            <p id="apellidos_contacto" class="form-control-static"></p>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-5">
                            <label for="email_contacto" class=" form-control-label">Email:</label>
                        </div>
                        <div class="col-sm-7">
                            <p id="email_contacto" class="form-control-static"></p>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-5">
                            <label for="movil_contacto" class=" form-control-label">Móvil:</label>
                        </div>
                        <div class="col-sm-7">
                            <p id="movil_contacto" class="form-control-static"></p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Aceptar</button>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('scripts')
    <script type="text/javascript">
        var table;
        $(function () {
            table = $('#tblClientes').DataTable({
                processing: true,
                serverSide: true,
                paging: true,
                ajax: "{{ route('listadoClientes') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'razonsocial', name: 'razonsocial'},
                    {data: 'nombrecomercial', name: 'nombrecomercial'},
                    {data: 'ruc', name: 'ruc'},
                    {data: 'domicilio', name: 'domicilio'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'contacto', name: 'contacto'},
                    {
                        data: 'viewContacto',
                        name: 'viewContacto',
                        orderable: true,
                        searchable: true},
                    {
                        data: 'action',
                        name: 'action',
                        orderable: true,
                        searchable: true
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
            table.columns([0, 6]).visible(false);
            $("#tblClientes_filter input[type=\"search\"]").addClass("form-control");
        });

        $("#btnNuevo").click(function(){
            window.location.href = "{{ route('addCliente')}}";
        });

        $("body").on("click", ".vercontacto", function(){
            var data = table.row( $(this).parents('tr') ).data();
            var contacto = JSON.parse(data.contacto.replace(/&quot;/g,'"'));
            $("#email_contacto").html(contacto.email);
            $("#movil_contacto").html(contacto.movil);
            $("#nombres_contacto").html(contacto.nombres);
            $("#apellidos_contacto").html(contacto.apellidos);
            $("#modalContacto").modal("show");
        });
    </script>

@endsection
