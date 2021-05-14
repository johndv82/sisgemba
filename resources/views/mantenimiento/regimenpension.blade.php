@extends('layout.dash')

@section('titulo')
    Mantenimiento de Regímenes de Pensión
@endsection

@section('contenido')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Mantenimiento de Regímenes de Pensión</strong>
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
                            <table class="table table-borderless table-data3" id="tblRegimenPension" data-toggle="tblRegimenPension">
                                <thead>
                                <tr>
                                    <th data-field="id" style="display:none">Id</th>
                                    <th data-field="nombre" data-width="400">Nombre</th>
                                    <th data-field="abreviacion">Abreviación</th>
                                    <th data-field="observaciones" data-width="400">Observaciones</th>
                                    <th data-field="created_at">Creado</th>
                                    <th data-field="operate" data-formatter="operateFormatter" data-events="operateEvents" data-halign="center">Acción</th>
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
    <div class="modal fade" id="modalRegistroRegimenPension" tabindex="-1" role="dialog"
         aria-labelledby="mediumModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mediumModalLabel">Registro de Régimen de Pensión</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formMantenimientoRegimenPension" name="formMantenimientoRegimenPension" autocomplete="off" onsubmit="return false;">
                        @csrf
                        <div class="row form-group">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="nombre" class="form-control-label">Nombre:</label>
                                    <input type="text" id="nombre" name="nombre" class="form-control" maxlength="250">
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="abreviacion" class="form-control-label">Abreviacion:</label>
                                    <input type="text" id="abreviacion" name="abreviacion" class="form-control" maxlength="25">
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="observaciones" class="form-control-label">Observaciones:</label>
                                    <textarea rows="3" id="observaciones" name="observaciones" class="form-control" style="resize: none;" maxlength="500"></textarea>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" id="btnRegistrar"></button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script type="text/javascript">
        var idRegistro = 0;

        function operateFormatter(value, row, index) {
            return '<a class="edit btn btn-sm btn-warning" href="javascript:void(0)">Editar</a> ' +
                '<a class="delete btn btn-sm btn-danger" href="javascript:void(0)">Eliminar</a>';
        }
        window.operateEvents = {
            'click .edit': function (e, value, row, index) {
                idRegistro = row.id;
                $('.badge').css('display', 'none');
                $('#nombre').val(row.nombre);
                $('#nombre').prop('readonly', true);
                $('#abreviacion').val(row.abreviacion);
                $('#observaciones').val(row.observaciones);
                $('#btnRegistrar').text('Actualizar')
                $("#modalRegistroRegimenPension").modal('show');
            },
            'click .delete': function (e, value, row, index) {
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
                            url: "{{ route('deleteRegimenPension', 'idReg') }}".replace('idReg', row.id),
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
                                    );
                                    //Actualizar grid
                                    CargarTablaRegimenPension();
                                }
                            }
                        });
                    }
                })
            }
        }

        $('#btnNuevo').click(function(){
            idRegistro = 0;
            $('.badge').css('display', 'none');
            $('#nombre').val('');
            $('#nombre').prop('readonly', false);
            $('#abreviacion').val('');
            $('#observaciones').val('');
            $('#btnRegistrar').text('Registrar')
            $("#modalRegistroRegimenPension").modal('show');
        });

        CargarTablaRegimenPension = function(){
            let _token = $('input[name="_token"]').val();
            $.ajax({
                url: "{{ route('listadoRegimenPension') }}",
                method: "POST",
                data: {_token: _token},
                dataType: 'json',
                success: function (response) {
                    $tabla = $("#tblRegimenPension");
                    $tabla.bootstrapTable('destroy');
                    if(response.code === 200){
                        $tabla.bootstrapTable({data: response.regimenes_pension,
                            formatLoadingMessage: function() {
                                return '';
                            },
                            formatNoMatches: function(){
                                return 'No se han encontrado registros.'
                            }
                        });
                        $tabla.bootstrapTable('hideColumn', 'id');
                    }
                }
            });
        }

        $(function(){
            idRegistro = 0;
            CargarTablaRegimenPension();
        });

        $('#btnRegistrar').click(function(){
            //Ingresar / Editar
            if ($("#formMantenimientoRegimenPension").valid()) {
                let _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "{{ route('saveRegimenPension') }}",
                    method: "POST",
                    data: {
                        id: idRegistro,
                        nombre: $('#nombre').val(),
                        abreviacion: $('#abreviacion').val(),
                        observaciones: $('#observaciones').val(),
                        _token: _token
                    },
                    dataType: 'json',
                    success: function (response) {
                        if (response.code === 200) {
                            //Sweet Alert
                            swal.fire(
                                'Éxito!',
                                'Registro Guardado Correctamente',
                                'success'
                            );
                            //Actualizar tabla
                            CargarTablaRegimenPension();
                            //Ocultar Modal
                            $('#modalRegistroRegimenPension').modal('hide');
                        }
                    }
                });
            }
        });

        if ($("#formMantenimientoRegimenPension").length > 0) {
            $.validator.addMethod("valueNotEquals", function (value, element, arg) {
                return arg !== value;
            });

            $('#formMantenimientoRegimenPension').validate({
                rules: {
                    nombre: {
                        required: true,
                        maxlength: 250
                    },
                    abreviacion: {
                        required: true,
                        maxlength: 25
                    }
                },
                messages: {
                    nombre: {
                        required: "Por favor, rellene este campo.",
                        maxlength: "Este campo no puede contener mas de 250 caracteres.",
                    },
                    abreviacion: {
                        required: "Por favor, rellene este campo.",
                        maxlength: "Este campo no puede contener mas de 25 caracteres.",
                    }
                },
                errorPlacement: function (label, element) {
                    label.addClass('badge badge-danger');
                    label.insertAfter(element);
                },
                wrapper: 'span'
            });
        }
    </script>
@endsection
