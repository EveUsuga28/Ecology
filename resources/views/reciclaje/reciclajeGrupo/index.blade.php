@extends('layouts.app')

@section('css')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Varela+Round&display=swap');
    </style>
@endsection


@section('content')

    <!--Estilos del DataTable-->
    <style>
        table thead {
            background-color:#39A131 ;
            color: white;
        }
    </style>

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
                        <option value="">Seleccione un Grupo</option>
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
            @if(session('estado')!='ENVIADO' && session('estado')!='CONFIRMADO')
            <a href="javascript:void(0)" onclick="CrearReciclaje()" class="btn btn-success">
                <b>Nuevo Reciclaje Grupo</b>
            </a>
            @endif
            <hr>
                <table id="reciclajeGrupo" class="table table-striped" style="width:100%">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Grupo</th>
                        <th>Materiales</th>
                        <th>Puntaje Materiales</th>
                        <th>Productos</th>
                        <th>Puntaje Productos</th>
                        <th>Fecha Registro</th>
                        <th>Total</th>
                        <th>Estado</th>
                        <th>Acciones</th>
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
                            <td> @if($reciclaje->estado == 1)Habilitado @else Deshabilitado @endif</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    @if(session('estado')!='ENVIADO' && session('estado')!='CONFIRMADO')
                                    @if($reciclaje->estado == 1)
                                <a href="{{route('reciclajeGrupo.Editar',$reciclaje->id)}}" class="btn btn-primary"><i class="fas fa-edit"></i>&nbsp;Editar</a> &nbsp;
                                    @endif&nbsp;
                                <form action="{{ route('reciclajeGrupo.deshabilitar_habilitarGrupo', $reciclaje->id)}}" method="POST" class="formulario-deshabilitar_habilitar_grupo">
                                    @csrf
                                    @method('PUT')
                                    @if($reciclaje->estado == 1)
                                        <button type="submit" class="btn btn-danger"><i class="fas fa-times-circle"></i>&nbsp;Deshabilitar</button>&nbsp;&nbsp;&nbsp;
                                    @else
                                        <button type="submit" class="btn btn-success"><i class="fas fa-check"></i>&nbsp;Habilitar</button>&nbsp;&nbsp;&nbsp;
                                    @endif
                                </form>
                                    @endif
                                        <a type="button" href="{{route('reciclajeGrupo.DetalleReciclajeGrupo',$reciclaje->id)}}" class="btn btn-dark"><i class="far fa-eye"></i>&nbsp;Detalle</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection

@section('js')

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

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

    <script>
        $('.formulario-deshabilitar_habilitar_grupo').submit(function (e){
            e.preventDefault();

            Swal.fire({
                title: 'Está seguro?',
                text: "",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#dd3333',
                confirmButtonText: 'Sí, Hazlo!',
                cancelButtonText: 'cancelar!',
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            })


        });
    </script>

    @if(session('deshabilitado_habilitado') == 'true')
        <script>
            Swal.fire(
                'Exito!',
                'Estado Cambiado',
                'success'
            )
        </script>
    @endif

@endsection





