@extends('layouts.app')

@section('content')


    <!--Encabezado-->
    <x-datos datos="Materiales y Productos grupo"/> <!--componentes laravel con envio de datos-->
    <!--Encabezado-->
    <br>
    <div class="container-fluid">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Materiales</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Productos</button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <!--Abre-->
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <br>
                <br>
                <br>
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6">
                            <form id="detalle-material">
                                @csrf
                                <input type="hidden" value="{{$id}}" id="id_grupo" name="id_grupo">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Crear Material</label>
                                    <select class="form-select" aria-label="Default select example" id="material" name="material" required>
                                        <option value="">Seleccione un Material</option>
                                        @foreach($materiales as $material)
                                            <option value="{{$material->id}}">{{$material->NomreMaterial}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">kilos</label>
                                    <input type="number" class="form-control" id="kilos" name="kilos" required>
                                </div>

                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </form>
                        </div>
                        <div class="col-xl-6">
                            <div class="card">
                                <div class="card-body">
                                    <table id="table-materiales" class="table table-hover">
                                        <thead>
                                        <td>Material</td>
                                        <td>Kilos</td>
                                        <td>Puntaje</td>
                                        <td>Acciones</td>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <br>
                <div class="text-center">
                    <a href="{{ route('reciclaje.Editar', session('id_reciclaje'))}}" class="btn btn-info">Volver</a>
                </div>
            </div>

            <!--modal para editar datos Material-->

            <!-- Modal -->
            <div class="modal fade" id="detalle_material_edit_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Editar Material Grupo</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form id="editar_material_form">
                            <div class="modal-body">
                                @csrf
                                <input name="id_edit" id="id_edit" type="hidden">
                                <input name="id_material_edit" id="id_material_edit" type="hidden">
                                <label for="exampleInputEmail1" class="form-label">kilos</label>
                                <input type="number" class="form-control" id="kilos_edit" name="kilos_edit" required>
                                <br>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Actualizar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Modal cierra -->
            <!--Cierra-->
            <!--Abre-->
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                <h1>Productos en construccion</h1>
            </div>
            <!--Cierra-->
        </div>
    </div>





@endsection

@section('js')

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    @if(session('registradoGrupo') == 'true')
        <script>
            Command: toastr["success"]("¡Creado Exitosamente!", "Reciclaje Grupo")

            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": true,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
        </script>
    @endif

    <script>
        //LISTAR REGISTROS CON DATATABLE
        $(document).ready(function(){
            var tablaMateriales = $('#table-materiales').DataTable({
                processing:true,
                serverSide:true,
                responsive: true,
                autoWidth: false,
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json'
                },
                ajax:{
                    url: "{{ route('reciclajeGrupo.indexMateriales',$id) }}",
                },
                columns:[
                    {data: 'nombre'},
                    {data: 'kilos'},
                    {data: 'puntaje'},
                    {data: 'action', orderable: false}
                ]
            });
        });
    </script>

    <script>
        //CREAR DETALLE MATERIAL
        $('#detalle-material').submit(function(e){
            e.preventDefault();
            var material = $('#material').val();
            var kilos = $('#kilos').val();
            var id_grupo = $('#id_grupo').val();
            var _token = $("input[name=_token]").val();
            $.ajax({
                url: "{{ route('reciclajeGrupo.crearDetalle') }}",
                type: "POST",
                data:{
                    material: material,
                    kilos: kilos,
                    idGrupo: id_grupo,
                    _token:_token
                }
            }).done(function (res){
                if(res == 1){
                    Command: toastr["info"]("Este material ya existe en este reciclaje", "Material ya creado")

                    toastr.options = {
                        "closeButton": true,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": false,
                        "positionClass": "toast-bottom-right",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "1000",
                        "timeOut": "5000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    }
                }else{
                    $('#detalle-material')[0].reset();
                    toastr.success('Material creado exitosamente.', 'Nuevo Registro', {timeOut:10000});
                    $('#table-materiales').DataTable().ajax.reload();
                }
            });
        });
    </script>

    <script>
        //EDITAR DETALLE MATERIAL
        function editarDetalleMaterial(id){
            $.get('/reciclajeGrupo/enviarEditarDetalleMaterial/'+id, function(detalleReciclajeGrupo){
                //asignar los datos recuperados a la ventana modal
                $('#id_edit').val(detalleReciclajeGrupo[0].id);
                $('#kilos_edit').val(detalleReciclajeGrupo[0].kilos);
                $('#id_material_edit').val(detalleReciclajeGrupo[0].id_materiales);
                $("input[name=_token]").val();
                $('#detalle_material_edit_modal').modal('toggle');
            })
        }
    </script>


    <script>
        //ACTUALIZAR DETALLE MATERIAL
        $('#editar_material_form').submit(function(e){
            e.preventDefault();
            var id2 = $('#id_edit').val();
            var kilos2 = $('#kilos_edit').val();
            var id_material2 = $('#id_material_edit').val();
            var id_grupo2 = $('#id_grupo').val();
            var _token2 = $("input[name=_token]").val();

            $.ajax({
                url: "{{ route('reciclajeGrupo.ActualizarDetalleMaterial') }}",
                type: "POST",
                data:{
                    id:id2,
                    kilos:kilos2,
                    id_material:id_material2,
                    id_grupo:id_grupo2,
                    _token:_token2
                },
                success:function(response){
                    if(response){
                        $('#detalle_material_edit_modal').modal('hide');
                        toastr.info('El Material fue actualizado correctamente.', 'Actualizar Registro', {timeOut:10000});
                        $('#table-materiales').DataTable().ajax.reload();
                    }
                }
            })

        });
    </script>

    <script>
        //HABILITAR/DESHABILITAR DETALLE MATERIAL
        function deshabilitar_habilitar(id){

            var material_id = id;

            $.ajax({
                url:"/reciclajeGrupo/deshabilitar/"+material_id,
                success:function (){
                    $('#table-materiales').DataTable().ajax.reload();
                    Swal.fire(
                        '¡EXITO!',
                        'Estado cambiado',
                        'success'
                    )
                }
            });
        }



       function AlertaDeshabilitar(id) {
           Swal.fire({
               title: '¿Está seguro?',
               text: "El puntaje y cantidad ya no contaran para el reciclaje grupo",
               icon: 'warning',
               showCancelButton: true,
               confirmButtonColor: '#3085d6',
               cancelButtonColor: '#d33',
               confirmButtonText: 'si, hazlo!',
               cancelButtonText: 'cancelar!'
           }).then((result) => {
               if (result.isConfirmed) {
                   deshabilitar_habilitar(id);
               }
           })
       }

        function AlertaHabilitar(id) {
            Swal.fire({
                title: '¿Está seguro?',
                text: "Que desea habilitar material",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'si, hazlo!',
                cancelButtonText: 'cancelar!'
            }).then((result) => {
                if (result.isConfirmed) {
                    deshabilitar_habilitar(id);
                }
            })
        }
    </script>

@endsection





