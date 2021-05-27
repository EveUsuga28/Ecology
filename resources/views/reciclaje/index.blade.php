@extends('layouts.app')

@section('css')

@endsection

@section('content')
    <style>
        table thead {
            background-color:#39A131 ;
            color: white;
        }
    </style>
    <div>
        <a href="{{ route('reciclaje.crear')}}" class="btn btn-light">NUEVO</a>
    </div>
    <div class="card">
        <div class="card-body">
            <table id="reciclaje" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <td>Id</td>
                        <td>Fecha Inicio</td>
                        <td>Fecha Fin</td>
                        <td>Estado</td>
                        <td>Acciones</td>
                    </tr>
                </thead>
                <tbody>
                @foreach($reciclaje_institucion as $reciclaje)
                    <tr>
                        <td>{{$reciclaje->id}}</td>
                        <td>{{$reciclaje->fechaInicio}}</td>
                        <td>{{$reciclaje->fechaFin}}</td>
                        <td>{{$reciclaje->estado}}</td>
                        <td><a href="{{ route('reciclaje.Editar', $reciclaje->id)}}" class="btn btn-light" >editar</a></td>
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
            $('#reciclaje').DataTable( {
                responsive: true,
                autoWidth: false,
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json'
                }
            } );
        } );
    </script>
    @if(session('institucion') == 'true')
        <script>
            Command: toastr["warning"]("Necesita tener una institución asociada para generar reciclaje", "Error")

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


