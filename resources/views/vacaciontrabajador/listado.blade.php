@extends('layout.dash')

@section('titulo')
    Vacaciones de Trabajador
@endsection

@section('contenido')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Vacaciones de Trabajador</strong>
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
                    <div class="col-md-12">
                        <div class="table-responsive table--no-card m-b-30">
                            <table class="table table-borderless table-data1" id="tblVacacionesGanadas" style="width: 100%;" data-toggle="tblVacacionesGanadas"
                                   data-show-footer="true">
                                <thead>
                                <tr>
                                    <th data-field="periodo">Periodo</th>
                                    <th data-field="fecha_inicio">Fecha Inicio</th>
                                    <th data-field="fecha_fin">Fecha Fin</th>
                                    <th data-field="dias_ganados" data-footer-formatter="total_dias_ganados">Dias Ganados</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-3">
                        <a class="btn btn-outline-secondary" id="btnNuevoRegistro" data-toggle="modal"
                                data-target="#registroVacacion">Nuevo Registro</a>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-12">
                        <div class="table-responsive table--no-card m-b-30">
                            <table class="table table-borderless table-data3" id="tblVacaciones" style="width: 100%;" data-toggle="tblVacaciones">
                                <thead>
                                <tr>
                                    <th data-field="id" style="display:none">Id</th>
                                    <th data-field="dias_tomados">Días Tomados</th>
                                    <th data-field="motivo">Motivo</th>
                                    <th data-field="observaciones">Observaciones</th>
                                    <th data-field="es_permiso">¿Es permiso?</th>
                                    <th data-field="fecha_inicio">Fecha Inicio</th>
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

@section('modal')
    <div class="modal fade" id="registroVacacion" tabindex="-1" role="dialog"
         aria-labelledby="mediumModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mediumModalLabel">Registro de Vacación</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formRegistroVacacion" name="formRegistroVacacion" autocomplete="off">
                        @csrf
                        <div class="row form-group">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="dias_tomados" class="form-control-label">Días Tomados</label>
                                    <input type="text" id="dias_tomados" name="dias_tomados"
                                           class="form-control">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="motivo" class="form-control-label">Motivo</label>
                                    <input type="text" id="motivo" name="motivo"
                                           class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="fecha_inicio" class="form-control-label">Fecha de Inicio</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar-o"></i>
                                        </div>
                                        <input type="text" id="fecha_inicio" name="fecha_inicio"
                                               class="date form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group align-items-end">
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label for="observaciones" class="form-control-label">Observaciones</label>
                                    <input type="text" id="observaciones" name="observaciones" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="form-check">
                                        <div class="checkbox">
                                            <label for="es_permiso" class="form-check-label ">
                                                <input type="checkbox" id="es_permiso" name="es_permiso" class="form-check-input">¿Es Permiso?
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" id="btnRegistrarVacacion">Aceptar</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script type="text/javascript">
    var trabajador = null;

    $('.date').datepicker({
        format: 'yyyy-mm-dd'
    });

    $(function(){
        $("#btnNuevoRegistro").hide();
    });

    function operateFormatter(value, row, index) {
        return '<a class="anular btn btn-sm btn-danger" href="javascript:void(0)">Anular</a>';
    }

    function total_dias_ganados(data) {
        var field = this.field
        return data.map(function (row) {
            return +row[field]
        }).reduce(function (sum, i) {
            return sum + i
        }, 0)
    }

    window.operateEvents = {
        'click .anular': function (e, value, row, index) {
            swal.fire({
                title: 'Confirmación',
                text: "¿Seguro que quiere anular este registro?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si anular!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    //Request Ajax para anular registro
                    let _token = $('input[name="_token"]').val();
                    $.ajax({
                        url: '{{route('deleteVacacion', 'id_vacacion')}}'.replace('id_vacacion', row.id),
                        method: "POST",
                        data: {
                            _token: _token
                        },
                        dataType: "json",
                        success: function (response) {
                            if (response.code === 200) {
                                swal.fire(
                                    'Información',
                                    'El registro fue anulado!',
                                    'success'
                                );
                                let documento = $("#inputNumeroDocumento").val();
                                cargarTablaVacacionesTrabajador(documento);
                            }
                        }
                    });
                }
            });
        }
    }

    function cargarTablaVacacionesTrabajador(documento){
        $.ajax({
            url: '{{ url('/vacacion/listadoVacacion/doc') }}'.replace('doc', documento),
            method: "GET",
            dataType: 'json',
            success: function (response) {
                $vacaciones_ganadas = $("#tblVacacionesGanadas");
                $vacaciones = $("#tblVacaciones");
                if(response.code === 200){
                    trabajador = response.trabajador;
                    $("#lblEtiquetaNombre").show();
                    $("#lblNombreTrabajador").css('color', 'black');
                    $("#lblNombreTrabajador").text(trabajador['nombres'] + " " + trabajador['apellidopaterno'] + " " + trabajador['apellidomaterno']);

                    $vacaciones_ganadas.bootstrapTable('destroy');
                    $vacaciones.bootstrapTable('destroy');
                    $vacaciones_ganadas.bootstrapTable({data: JSON.parse(response.vacacion_ganada),
                        formatLoadingMessage: function() {
                            return '';
                        }
                    });
                    $vacaciones.bootstrapTable({data: response.vacaciones_trabajador,
                        formatLoadingMessage: function() {
                            return '';
                        },
                        formatNoMatches: function () {
                            return "No hay registros guardados.";
                        }
                    });
                    $("#btnNuevoRegistro").show();
                    $vacaciones.bootstrapTable('hideColumn', 'id');
                }else{
                    $("#lblNombreTrabajador").css('color', 'red');
                    $("#lblNombreTrabajador").text('Trabajador no encontrado !!!');
                    $("#lblEtiquetaNombre").hide();
                    $vacaciones_ganadas.bootstrapTable('destroy');
                    $vacaciones.bootstrapTable('destroy');
                }
            }
        });
    }

    $("#btnBuscarTrabajador").click(function(){
        if ($("#formBusquedaTrabajador").valid()) {
            let documento = $("#inputNumeroDocumento").val();
            cargarTablaVacacionesTrabajador(documento);
        }
    });

    $("#btnRegistrarVacacion").click(function () {
        if ($("#formRegistroVacacion").valid()) {
            let _token = $('input[name="_token"]').val();
            $.ajax({
                url: '{{route('saveVacacion')}}',
                method: "POST",
                data: {
                    trabajador_id: trabajador['id'],
                    dias_tomados: $('#dias_tomados').val(),
                    motivo: $('#motivo').val(),
                    observaciones: $('#observaciones').val(),
                    fecha_inicio: $('#fecha_inicio').val(),
                    es_permiso: $('#es_permiso').is(':checked'),
                    _token: _token
                },
                dataType: "json",
                success: function (response) {
                    if (response.code === 200) {
                        //Sweet Alert
                        swal.fire(
                            'Éxito!',
                            'Vacación registrada correctamente!!',
                            'success'
                        );
                        //Actualizar tablas
                        let documento = $("#inputNumeroDocumento").val();
                        cargarTablaVacacionesTrabajador(documento);
                        //Ocultar Modal
                        $('#registroVacacion').modal('hide');
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

    if ($("#formRegistroVacacion").length > 0) {
        $.validator.addMethod("valueNotEquals", function (value, element, arg) {
            return arg !== value;
        });

        $('#formRegistroVacacion').validate({
            rules: {
                dias_tomados: {
                    required: true,
                    number:true,
                    min: 1,
                    max: 999
                },
                motivo: {
                    required: true,
                    maxlength: 100
                },
                observaciones: {
                    required: true,
                    maxlength: 250
                },
                fecha_inicio: {
                    required: true,
                    date: true
                }
            },
            messages: {
                dias_tomados: {
                    required: "Rellene este campo.",
                    number: "Solo números.",
                    min: "No puede ser 0.",
                    max: "No puede superar 999."
                },
                motivo: {
                    required: "Por favor, rellene este campo.",
                    maxlength: "Este campo no puede contener mas de 100 caracteres.",
                },
                observaciones: {
                    required: "Por favor, rellene este campo.",
                    maxlength: "Este campo no puede contener mas de 250 caracteres.",
                },
                fecha_inicio: {
                    required: "Por favor, rellene este campo.",
                    date: "Fecha inválida."
                }
            },
            errorPlacement: function (label, element) {
                label.addClass('badge badge-danger');
                label.insertAfter(element);
            },
            wrapper: 'span'
        });
    }

    $("#btnNuevoRegistro").click(function () {
        $('#dias_tomados').val('');
        $('#motivo').val('');
        $('#observaciones').val('');
        $('#fecha_inicio').val('');
        $('#es_permiso').prop( "checked", false);
    });
</script>
@endsection
