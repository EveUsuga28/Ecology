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
    <x-datos datos="Instituciones"/> <!--componentes laravel con envio de datos-->
    <!--Encabezado-->

    <!--Cuerpo de Pagina (Body)-->
    <br>
    <div class="container">
        <div class="card">
            <div class="encabezado-formularios">
                <h1 class="text-white bg-success text-center padding">nombre de la institucion que le pertenece al usuario</h1>
            </div>
            <div class="car-body">
                <div class="row">
                    <div class="col-3">
                        <img src="https://img.icons8.com/ios/452/kawaii-ice-cream.png" class="img-thumbnail" alt="">
                    </div>
                    <div class="col-9">
                        <div class="input-div one">
                            <div class="i">
                                <i class="fas fa-school"></i> Nombre de la Institución
                            </div>

                            <div class="div">
                                <input class="form-control" type="text" value="{{$institucion->nombre}}">
                            </div>
                        </div><br>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

    @section('js')

        <script>
            $(document).ready(function() {
                $('#institucion').DataTable( {
                    responsive: true,
                    autoWidth: false,
                    language: {
                        url: 'https://cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json'
                    }
                } );
            } );
        </script>

         
    @endsection