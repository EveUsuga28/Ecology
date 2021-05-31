@extends('layouts.app')

@section('css')

@endsection

@section('content')

    <!--Estilos del DataTable-->
    <style>
        table thead {
            background-color:#39A131 ;
            color: white;
        }
    </style>
    <!--Estilos del DataTable-->

    <!--Encabezado-->
    <x-datos datos="Materiales"/> <!--componentes laravel con envio de datos-->
    <!--Encabezado-->

    <!--Cuerpo de Pagina (Body)-->
    <br>
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div>
                    <a href="{{url('material/create') }}" class="btn btn-success " >Nuevo</a>
                    <a href="{{url('puntajeMaterial') }}" class="btn btn-light " >Puntajes</a>
                </div>
                <hr>
                <table id="materiales" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre Material</th>
                            <th>Puntaje</th>
                            <th>Kilos</th>
                            <th>Foto</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($materials as $material)
                            <tr>
                                <td>{{$material->id}}</td>
                                <td>{{$material->NomreMaterial}}</td>
                                <td>{{$material->Puntaje}}</td>
                                <td>{{$material->Kilos}}</td>
                                <td>
                                    <img src="{{asset('storage').'/'.$material->Foto}}" width="100"alt="">
                                </td>
                                <td>
                                    <a  class="btn btn-outline-info" href="{{url('/material/'.$material->id.'/edit')}}" title="
                                        Editar">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a class="btn btn-outline-secondary formulario-registro" href="{{Route('puntajeMaterial.Crear',$material->id) }}"   >Crear Nuevo Puntaje<a>
                                <br>
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
            $('#materiales').DataTable( {
                responsive: true,
                autoWidth: false,
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json'
                }
            } );
        } );
    </script>
    @if(session('material'))
    <script>
        Command: toastr["success"]("¡Creado Exitosamente!", "Material")

        toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-bottom-left",
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

@endsection

