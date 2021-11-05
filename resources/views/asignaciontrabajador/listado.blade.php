@extends('layout.dash')

@section('titulo')
    Listado de Trabajadores Asignados
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
                <strong class="card-title">Listado de Trabajadores Asignados</strong>
            </div>
            <div class="card-body">
                <form id="formBusquedaCliente" name="formBusquedaCliente" autocomplete="off"
                      onsubmit="return false;">
                    @csrf
                    <div class="row form-group">
                        <div class="col-md-2">
                            <label for="inputRucCliente" class="pr-1 form-control-label">RUC del Cliente:</label>
                        </div>
                        <div class="col-md-2">
                            <input type="text" id="inputRucCliente" name="inputRucCliente" class="form-control">
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-primary" id="btnBuscarCliente">Buscar</button>
                        </div>
                        <div class="col-md-6">
                            <label for="lblNombreCliente" class="pr-1 form-control-label" id="lblEtiquetaCliente">Cliente:</label>
                            <strong>
                                <label class="pr-1 form-control-label" id="lblNombreCliente"></label>
                            </strong>
                        </div>
                    </div>
                </form>
                <div class="row form-group">
                    <div class="col-md-3">
                        <button class="btn btn-outline-secondary" id="btnNuevo">Asignar Trabajador</button>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-12">
                        <div class="table-responsive table--no-card m-b-30">
                            <table class="table table-borderless table-data3" id="tblTrabajadoresAsignados" style="width: 100%;">
                                <thead>
                                <tr>
                                    <th data-field="id" style="display:none">Id</th>
                                    <th data-field="trabajador.apellidopaterno">Apellido Paterno</th>
                                    <th data-field="trabajador.apellidomaterno">Apellido Materno</th>
                                    <th data-field="trabajador.nombres">Nombres</th>
                                    <th data-field="trabajador.tipodocumento.abreviacion">Tipo Doc.</th>
                                    <th data-field="trabajador.numerodocumento">Número Doc.</th>
                                    <th data-field="fechaingreso">Fecha Ingreso</th>
                                    <th data-field="cargolaboral.nombre">Cargo Laboral</th>
                                    <th data-field="horario">Horario Trabajo</th>
                                    <th data-field="operate" data-formatter="operateFormatter" data-events="operateEvents">Acción</th>
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


@section('scripts')
    <script type="text/javascript">
        var cliente = null;

        $(function(){
            $("#btnNuevo").hide();
        });

        function operateFormatter(value, row, index) {
            return '<a class="edit btn btn-sm btn-warning" href="javascript:void(0)">Editar</a>';
        }

        window.operateEvents = {
            /*'click .edit': function (e, value, row, index) {
                $("#hidAsignacion").val(row.id);
                $("#modalConfirmacion").modal();
            }*/
            'click .edit': function (e, value, row, index) {
                window.location='{{ url('/asignaciontrabajador/edit/id') }}'.replace('id', row.id);
            }
        }

        $("#btnBuscarCliente").click(function(){
            if ($("#formBusquedaCliente").valid()) {
                let _token = $('input[name="_token"]').val();
                let ruc = $("#inputRucCliente").val();
                $.ajax({
                    url: "{{ route('listadoTrabajadoresAsignados') }}",
                    method: "POST",
                    data: {ruc_cliente: ruc, _token: _token},
                    dataType: 'json',
                    success: function (response) {
                        $tabla = $("#tblTrabajadoresAsignados");
                        $tabla.bootstrapTable('destroy');
                        if(response.code === 200){
                            cliente = response.cliente;
                            $("#lblEtiquetaCliente").show();
                            $("#lblNombreCliente").css('color', 'black');
                            $("#lblNombreCliente").text(cliente['razonsocial'] + " - " + cliente['nombrecomercial']);

                            $tabla.bootstrapTable({data: response.trabajadores_asignados,
                                formatLoadingMessage: function() {
                                    return '';
                                },
                                formatNoMatches: function () {
                                    return "No hay registros";
                                }
                            });
                            $("#btnNuevo").show();
                            $tabla.bootstrapTable('hideColumn', 'id');
                        }else{
                            $("#lblNombreCliente").css('color', 'red');
                            $("#lblNombreCliente").text('Cliente no encontrado !!!');
                            $("#lblEtiquetaCliente").hide();
                            $tabla.bootstrapTable('destroy');
                        }
                    }
                });
            }
        });

        if ($("#formBusquedaCliente").length > 0) {
            $.validator.addMethod("valueNotEquals", function (value, element, arg) {
                return arg !== value;
            });

            $('#formBusquedaCliente').validate({
                rules: {
                    inputRucCliente: {
                        required: true,
                        number:true,
                        minlength: 8,
                        maxlength: 50
                    }
                },
                messages: {
                    inputRucCliente: {
                        required: "Por favor, rellene este campo.",
                        number: "Este campo solo puede contener números.",
                        maxlength: "Este campo no puede contener mas de 50 dígitos.",
                        minlength: "Este campo no puede contener menos de 8 dígitos."
                    }
                },
                errorPlacement: function (label, element) {
                    label.addClass('badge badge-danger');
                    label.insertAfter(element);
                },
                wrapper: 'span'
            });
        }

        $('#btnNuevo').click(function(){
            if(cliente != null){
                window.location.href = "{{route('addAsignacionTrabajador', 'idCliente')}}".replace('idCliente', cliente.id);
            }
        });
    </script>
@endsection
