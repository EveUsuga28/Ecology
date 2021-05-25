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

            </div>
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
                    toastr.warning('El material ya existe', 'Material ya creado', {timeOut:10000});
                }else{
                    $('#detalle-material')[0].reset();
                    toastr.success('Material creado exitosamente.', 'Nuevo Registro', {timeOut:10000});
                    $('#table-materiales').DataTable().ajax.reload();
                }
            });
        });
    </script>

@endsection

<!--,
success:function(response){
if(response){

}
}-->

