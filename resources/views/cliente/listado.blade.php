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
                <div class="col-md-3">
                    <button class="btn btn-outline-secondary" id="btnNuevo">Nuevo Registro</button>
                </div>
                <div class="col-lg-12">
                    <div class="table-responsive table--no-card m-b-30">
                        <table class="table table-borderless table-data3" id="tblClientes" style="width: 100%;">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Razon Social</th>
                                <th>Nombre Comercial</th>
                                <th>Ruc</th>
                                <th>JSON Contacto</th>
                                <th>Creado</th>
                                <th>Contacto</th>
                                <th>Domicilio</th>
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
@endsection


@section('scripts')
    <script type="text/javascript">
        $(function () {
            var table = $('#tblClientes').DataTable({
                processing: true,
                serverSide: true,
                paging: false,
                ajax: "{{ route('listadoClientes') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'razonsocial', name: 'razonsocial'},
                    {data: 'nombrecomercial', name: 'nombrecomercial'},
                    {data: 'ruc', name: 'ruc'},
                    {data: 'contacto', name: 'contacto'},
                    {data: 'domicilio', name: 'domicilio'},
                    {data: 'created_at', name: 'created_at'},
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
                "language": {
                    "info": "Mostrando página _PAGE_ de _PAGES_",
                    "search": "Buscar: ",
                    "emptyTable": "No hay ningún registro",
                }
            });
            table.columns([0, 4]).visible(false);
            $("#tblClientes_filter input[type=\"search\"]").addClass("form-control");
        });

        $("#btnNuevo").click(function(){
            window.location.href = "{{ route('addCliente')}}";
        });
    </script>

@endsection
