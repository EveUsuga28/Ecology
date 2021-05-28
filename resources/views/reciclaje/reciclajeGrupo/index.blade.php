@extends('layouts.app')

@section('css')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Varela+Round&display=swap');
    </style>
@endsection


@section('content')

    <!--Encabezado-->
    <x-datos datos="Reciclaje Grupo"/> <!--componentes laravel con envio de datos-->
    <!--Encabezado-->

    <br>
    <div class="container-fluid">

    </div>
    <!-- Modal -->
    <div class="modal fade" id="grupo_crear" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Crear Reciclaje Grupo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="registrar_reciclaje_grupo" method="POST" action="{{ route('reciclajeGrupo.store')}}">
                <div class="modal-body">
                    @csrf
                    <label>Grupo</label>
                    <select class="form-select" aria-label="Default select example" id="grupo" name="grupo" required>
                        <option value="">Seleccione un grupo</option>
                        @foreach($grupos as $grupo)
                            <option value="{{$grupo->id}}">{{$grupo->grupo}}</option>
                        @endforeach
                    </select>
                    <br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Crear</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <br>
    <div class="container-fluid">
    <div class="card">

        <div class="card-body">
            <a href="javascript:void(0)" onclick="CrearReciclaje()" class="btn btn-success">
                <b>Nuevo Reciclaje Grupo</b>
            </a>
            <hr>
                <table id="reciclajeGrupo" class="table table-striped" style="width:100%">
                    <thead>
                    <tr>
                        <td>Id</td>
                        <td>grupo</td>
                        <td>Materiales</td>
                        <td>Puntaje Materiales</td>
                        <td>Productos</td>
                        <td>Puntaje Productos</td>
                        <td>Fecha registro</td>
                        <td>Total</td>
                        <td>acciones</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($reciclajeGrupo as $reciclaje)
                        <tr>
                            <td>{{$reciclaje->id}}</td>
                            <td>{{$reciclaje->grupo}}</td>
                            <td>{{$reciclaje->total_kilos_material_grupo}}</td>
                            <td>{{$reciclaje->total_puntaje_material_grupo}}</td>
                            <td>{{$reciclaje->total_cantidad_productos_grupo}}</td>
                            <td>{{$reciclaje->total_puntaje_productos_grupo}}</td>
                            <td>{{$reciclaje->fecha}}</td>
                            <td>{{$reciclaje->total_puntaje_grupo}}</td>
                            <td><a href="{{route('reciclajeGrupo.Editar',$reciclaje->id)}}" class="btn btn-light">editar</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection

@section('js')

    <script>
        $(document).ready(function() {


            $('#reciclajeGrupo').DataTable( {
                responsive: true,
                autoWidth: false,
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json'
                }
            } );
        } );
    </script>

    <script>
        function CrearReciclaje(){
            $('#grupo_crear').modal('toggle');
        }
    </script>
    @if(session('invalido') == 'true')
        <script>
            Command: toastr["warning"]("Reciclaje grupo ya creado", "Error")

            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toast-bottom-full-width",
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
        </script>
    @endif
    @if(session('creado') == 'true')
    <script>
            Command: toastr["success"]("¡Creado Exitosamente!", "Reciclaje Institución")

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

@endsection





