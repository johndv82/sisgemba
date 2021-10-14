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
                                    <th data-field="dias_tomados" data-footer-formatter="total_dias_tomados">Dias Tomados</th>
                                    <th data-field="dias_restantes" data-footer-formatter="total_dias_restantes">Dias Restantes</th>
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
                        <a class="btn btn-outline-secondary" id="btnNuevoRegistro">Nuevo Registro</a>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-12">
                        <div class="table-responsive table--no-card m-b-30">
                            <table class="table table-borderless table-data3" id="tblVacaciones" style="width: 100%;" data-toggle="tblVacaciones">
                                <thead>
                                <tr>
                                    <th data-field="id" style="display:none">Id</th>
                                    <th data-field="periodo">Periodo</th>
                                    <th data-field="dias_tomados">Días Tomados</th>
                                    <th data-field="fecha_inicio">Fecha Inicio</th>
                                    <th data-field="observaciones">Observaciones</th>
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
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="periodo" class="form-control-label">Periodo</label>
                                    <select name="periodo" id="periodo" class="form-control">
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="dias_tomados" class="form-control-label">Días Tomados</label>
                                    <input type="text" id="dias_tomados" name="dias_tomados"
                                           class="form-control">
                                </div>
                            </div>
                            <div class="col-md-5">
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
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="observaciones" class="form-control-label">Observaciones</label>
                                    <textarea name="observaciones" id="observaciones" rows="2" class="form-control" style="resize: none;">
                                    </textarea>
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
    var totalDiasGanados = 0;

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
        var field = this.field;
        totalDiasGanados = data.map(
            function (row) {
                return +row[field];
            }).reduce(
            function (sum, i) {
                return sum + i;
            }, 0);
        return totalDiasGanados;
    }

    function total_dias_tomados(data) {
        var field = this.field;
        return data.map(
            function (row) {
                return +row[field];
            }).reduce(
            function (sum, i) {
                return sum + i;
            }, 0);
    }
    function total_dias_restantes(data) {
        var field = this.field;
        return data.map(
            function (row) {
                return +row[field];
            }).reduce(
            function (sum, i) {
                return sum + i;
            }, 0);
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
                if(response.code === 200) {
                    trabajador = response.trabajador;
                    $("#lblEtiquetaNombre").show();
                    $("#lblNombreTrabajador").css('color', 'black');
                    $("#lblNombreTrabajador").text(trabajador['nombres'] + " " + trabajador['apellidopaterno'] + " " + trabajador['apellidomaterno']);

                    $vacaciones_ganadas.bootstrapTable('destroy');
                    $vacaciones.bootstrapTable('destroy');
                    $vacaciones_ganadas.bootstrapTable({
                        data: JSON.parse(response.vacacion_ganada),
                        formatLoadingMessage: function () {
                            return '';
                        }
                    });
                    $vacaciones.bootstrapTable({
                        data: response.vacaciones_trabajador,
                        formatLoadingMessage: function () {
                            return '';
                        },
                        formatNoMatches: function () {
                            return "No hay registros guardados.";
                        }
                    });
                    $("#btnNuevoRegistro").show();
                    $vacaciones.bootstrapTable('hideColumn', 'id');

                    //Cargar listado de Periodos
                    response.lista_periodos.forEach(function (element, index) {
                        $("#periodo").append('<option>' + element + '</option>');
                    });
                }else if(response.code === 408){
                    $("#lblNombreTrabajador").css('color', 'orange');
                    $("#lblNombreTrabajador").text('Trabajador no Asignado !!!');
                    $("#lblEtiquetaNombre").hide();
                    $vacaciones_ganadas.bootstrapTable('destroy');
                    $vacaciones.bootstrapTable('destroy');
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
                    periodo: $('#periodo').val(),
                    dias_tomados: $('#dias_tomados').val(),
                    fecha_inicio: $('#fecha_inicio').val(),
                    observaciones: $('#observaciones').val(),
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
                    min: 1
                },
                fecha_inicio: {
                    required: true,
                    date: true
                },
                observaciones: {
                    required: true,
                    maxlength: 250
                }
            },
            messages: {
                dias_tomados: {
                    required: "Rellene este campo.",
                    number: "Solo números.",
                    min: "No puede ser 0.",
                    max: "Cantidad exedida."
                },
                fecha_inicio: {
                    required: "Campo vacío.",
                    date: "Fecha inválida."
                },
                observaciones: {
                    required: "Por favor, rellene este campo.",
                    maxlength: "Este campo no puede contener mas de 250 caracteres.",
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
        $("#periodo option:first").attr("selected", "selected").trigger('change');
        $('#dias_tomados').val('');
        $('#fecha_inicio').val('');
        $('#observaciones').val('');
        if(totalDiasGanados >= 30){
            $("#registroVacacion").modal('show');
        }else{
            swal.fire(
                'Error!',
                'Aún no se puede registrar vacaciones por falta de dias ganados',
                'error'
            );
        }
    });

    $("#periodo").on('change', function(e){
        let valorSelect = this.value;
        //Validar máximo valor de dias a tomar
        $vacaciones_ganadas = $("#tblVacacionesGanadas");
        let dataVacacionGanada = $vacaciones_ganadas.bootstrapTable('getData');
        dataVacacionGanada.forEach(function(element, index){
            if(element.periodo == valorSelect){
                let maximoDiasATomar = element.dias_ganados - element.dias_tomados;
                $("#dias_tomados").rules('remove', 'max');
                $("#dias_tomados").rules('add', {max: maximoDiasATomar});
            }
        });
    });
</script>
@endsection
