@extends('layout.dash')

@section('titulo')
    Listado de Hijos de Trabajador
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
                <strong class="card-title">Listado de Hijos de Trabajador</strong>
            </div>
            <div class="card-body">
                <form id="formBusquedaTrabajador" name="formBusquedaTrabajador" autocomplete="off"
                      onsubmit="return false;">
                    @csrf
                    <div class="row form-group">
                        <div class="col-md-2">
                            <label for="inputNumeroDocumento" class="pr-1 form-control-label">Documento de
                                Trabajador:</label>
                        </div>
                        <div class="col-md-2">
                            <input type="text" id="inputNumeroDocumento" name="inputNumeroDocumento" class="form-control">
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-primary" id="btnBuscarTrabajador">Buscar</button>
                        </div>
                        <div class="col-md-6">
                            <label for="lblNombreTrabajador" class="pr-1 form-control-label" id="lblEtiquetaNombre">Nombre del Trabajador:</label>
                            <strong>
                                <label class="pr-1 form-control-label" id="lblNombreTrabajador"></label>
                            </strong>
                        </div>
                    </div>
                </form>
                <div class="row form-group">
                    <div class="col-md-3">
                        <button class="btn btn-outline-secondary" id="btnNuevo">Nuevo Registro</button>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-12">
                        <div class="table-responsive table--no-card m-b-30">
                            <table class="table table-borderless table-data3" id="tblHijosTrabajador" style="width: 100%;" data-toggle="tblHijosTrabajador">
                                <thead>
                                <tr>
                                    <th data-field="id" style="display:none">Id</th>
                                    <th data-field="apellidopaterno">Apellido Paterno</th>
                                    <th data-field="apellidomaterno">Apellido Materno</th>
                                    <th data-field="nombres">Nombres</th>
                                    <th data-field="tipodocumento.abreviacion">Tipo Doc.</th>
                                    <th data-field="numerodocumento">Número Doc.</th>
                                    <th data-field="fechanacimiento">Fecha Nac.</th>
                                    <th data-field="ocupacion">Ocupacion</th>
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
        var trabajador = null;

        $(function(){
            $("#btnNuevo").hide();
        });
        function operateFormatter(value, row, index) {
            return '<a class="edit btn btn-sm btn-danger" href="javascript:void(0)">Editar</a>';
        }

        window.operateEvents = {
            'click .edit': function (e, value, row, index) {
                window.location='{{ url('/hijostrabajador/edit/id') }}'.replace('id', row.id);
            }
        }

        $("#btnBuscarTrabajador").click(function(){
            if ($("#formBusquedaTrabajador").valid()) {
                let _token = $('input[name="_token"]').val();
                let documento = $("#inputNumeroDocumento").val();
                $.ajax({
                    url: "{{ route('listadoHijosTrabajador') }}",
                    method: "POST",
                    data: {documento_trabajador: documento, _token: _token},
                    dataType: 'json',
                    success: function (response) {
                        $tabla = $("#tblHijosTrabajador");
                        if(response.code === 200){
                            trabajador = response.trabajador;
                            $("#lblEtiquetaNombre").show();
                            $("#lblNombreTrabajador").css('color', 'black');
                            $("#lblNombreTrabajador").text(trabajador['nombres'] + " " + trabajador['apellidopaterno'] + " " + trabajador['apellidomaterno']);

                            $tabla.bootstrapTable({data: response.hijos,
                                formatLoadingMessage: function() {
                                    return '';
                                }
                            });
                            $("#btnNuevo").show();
                            $tabla.bootstrapTable('hideColumn', 'id');
                        }else{
                            $("#lblNombreTrabajador").css('color', 'red');
                            $("#lblNombreTrabajador").text('Trabajador no encontrado !!!');
                            $("#lblEtiquetaNombre").hide();
                            $tabla.bootstrapTable('destroy');
                        }
                    }
                });
            }
        });

        if ($("#formBusquedaTrabajador").length > 0) {
            $.validator.addMethod("valueNotEquals", function (value, element, arg) {
                return arg !== value;
            });

            $('#formBusquedaTrabajador').validate({
                rules: {
                    inputNumeroDocumento: {
                        required: true,
                        number:true,
                        minlength: 8,
                        maxlength: 50
                    }
                },
                messages: {
                    inputNumeroDocumento: {
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
            if(trabajador != null){
                window.location.href = "{{route('addHijosTrabajador', 'idTrabajador')}}".replace('idTrabajador', trabajador.id);
            }
        });
    </script>
@endsection
