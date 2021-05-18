@extends('layouts.app')

@section('css')
    <style>
        table thead {
            background-color:#39A131 ;
            color: white;
        }
    </style>
@endsection


@section('content')


    <div class="container-fluid">
    <a href="javascript:void(0)" onclick="CrearReciclaje()" class="btn btn-primary">
        Nuevo
    </a>
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
    <div class="card">
        <div class="card-body">
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
                            <td>Puntaje Material</td>
                            <td>{{$reciclaje->total_cantidad_productos_grupo}}</td>
                            <td>Puntaje Productos</td>
                            <td>Fecha registro</td>
                            <td>Total</td>
                            <td><a href="" class="btn btn-light">editar</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
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





