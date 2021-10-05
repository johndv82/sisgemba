@extends('layout.dash')

@section('titulo')
    Mantenimiento de Distritos
@endsection

@section('contenido')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Mantenimiento de Distritos</strong>
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
                            <table class="table table-borderless table-data3" id="tblDistritos" style="width: 100%;">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Provincia</th>
                                    <th>Departamento</th>
                                    <th>Creado</th>
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
    <div class="modal fade" id="modalRegistroDistrito" tabindex="-1" role="dialog"
         aria-labelledby="mediumModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mediumModalLabel">Registro de Distritos</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formMantenimientoDistrito" name="formMantenimientoDistrito" autocomplete="off" onsubmit="return false;">
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
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="pais" class="form-control-label">País:</label>
                                    <select name="pais" id="pais" class="form-control">
                                        <option value="0">Seleccione País</option>
                                        @foreach($paises as $item)
                                            <option value="{{$item->id}}">{{$item->nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="departamento" class=" form-control-label">Departamento</label>
                                    <select name="departamento" id="departamento" class="form-control">
                                        <option value="0">Seleccione Departamento</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="provincia" class=" form-control-label">Provincia</label>
                                    <select name="provincia" id="provincia" class="form-control">
                                        <option value="0">Seleccione Provincia</option>
                                    </select>
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
        var table;
        var datosDistritos = [];

        EliminarRegistro = function(id){
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
                        url: "{{ route('deleteDistrito', 'idReg') }}".replace('idReg', id),
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
                                table.ajax.reload();
                            }
                        }
                    });
                }
            })
        }

        $('#btnNuevo').click(function(){
            idRegistro = 0;
            $('.badge').css('display', 'none');
            $('#nombre').val('');
            $('#btnRegistrar').text('Registrar')
            $("#modalRegistroDistrito").modal('show');
            $("#modalRegistroDistrito").on('shown.bs.modal', function() {
                $('#nombre').focus()
            });
        });

        $('#pais').change(function () {
            if ($(this).val() !== '') {
                let _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "{{ route('listadoDepartamentosDistrito') }}",
                    method: "POST",
                    data: {pais_id: $(this).val(), _token: _token},
                    success: function (result) {
                        $('#departamento').html(result);
                    }
                });
            }
        });

        $('#departamento').change(function () {
            if ($(this).val() !== '') {
                let _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "{{ route('listadoProvinciasDistrito') }}",
                    method: "POST",
                    data: {departamento_id: $(this).val(), _token: _token},
                    success: function (result) {
                        $('#provincia').html(result);
                    }
                });
            }
        });

        $(function(){
            //Llamar a ajax de controlador para poblar array con datos
            $.ajax({
                url: "{{ route('distrito') }}",
                success: function(response){
                    datosDistritos = response.data;
                },
                dataType: 'json'
            });

            //Cargar Datatable con array poblado
            idRegistro = 0;
            table = $('#tblDistritos').DataTable({
                processing: true,
                serverSide: true,
                paging: true,
                ajax: datosDistritos,
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'nombre', name: 'nombre'},
                    {data: 'provincia', name: 'provincia'},
                    {data: 'departamento', name: 'departamento'},
                    {data: 'created_at', name: 'created_at'},
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
            $("#tblDistritos_filter input[type=\"search\"]").addClass("form-control");
        });

        EncontrarDistritoDuplicado = function(nombreDist){
            var container = JSON.stringify(datosDistritos);
            let encontrado = false;
            $.each(JSON.parse(container) , function (key, value) {
                if(value.nombre.trim().toUpperCase() === nombreDist.trim().toUpperCase()){
                    encontrado = true;
                    return false;
                }
            });
            return encontrado;
        }

        $('#btnRegistrar').click(function(){
            //Ingresar / Editar
            if ($("#formMantenimientoDistrito").valid()) {
                if (!EncontrarDistritoDuplicado($('#nombre').val())){
                    let _token = $('input[name="_token"]').val();
                    $.ajax({
                        url: "{{ route('saveDistrito') }}",
                        method: "POST",
                        data: {
                            nombre: $('#nombre').val(),
                            provincia_id: $('#provincia').val(),
                            departamento_id: $('#departamento').val(),
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
                                table.ajax.reload();
                                //Ocultar Modal
                                $('#modalRegistroDistrito').modal('hide');
                            }
                        }
                    });
                }else{
                    swal.fire('El nombre ya está en uso');
                }
            }
        });

        if ($("#formMantenimientoDistrito").length > 0) {
            $.validator.addMethod("valueNotEquals", function (value, element, arg) {
                return arg !== value;
            });

            $('#formMantenimientoDistrito').validate({
                rules: {
                    nombre: {
                        required: true,
                        maxlength: 250
                    },
                    pais: {
                        valueNotEquals: "0"
                    },
                    departamento: {
                        valueNotEquals: "0"
                    },
                    provincia: {
                        valueNotEquals: "0"
                    }
                },
                messages: {
                    nombre: {
                        required: "Por favor, rellene este campo.",
                        maxlength: "Este campo no puede contener mas de 250 caracteres.",
                    },
                    pais: {
                        valueNotEquals: "Por favor, seleccione un país."
                    },
                    departamento: {
                        valueNotEquals: "Por favor, seleccione un departamento."
                    },
                    provincia: {
                        valueNotEquals: "Por favor, seleccione una provincia."
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
