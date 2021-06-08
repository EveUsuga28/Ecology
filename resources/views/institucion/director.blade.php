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
    <x-datos datos="Institución"/> <!--componentes laravel con envio de datos-->
    <!--Encabezado-->

    <!--Cuerpo de Pagina (Body)-->
    <br>
    <div class="container">
        <div class="card">
            <div class="encabezado-formularios">
                <h1 class="text-white bg-success text-center padding">{{ $institucion-> nombre}}</h1>
            </div>
            <div class="car-body">
                <div class="row">
                    <div class="col-7">
                        <div class="container">
                            <div class="input-div one">
                                <div class="i"><br>
                                    <i class="fas fa-user"></i> Director Institucional
                                </div>

                                <div class="div">
                                    <div class="form-control">{{ Auth::user()->name }}</div>
                                </div>
                            </div><br>

                            <div class="input-div one">
                                <div class="i">
                                    <i class="fas fa-phone"></i> Teléfono de la Institución
                                </div>

                                <div class="div">
                                    <div class="form-control">{{ $institucion-> telefono}}</div>
                                </div>
                            </div><br>

                            <div class="input-div one">
                                <div class="i">
                                    <i class="fas fa-route"></i> Dirección de la Institución
                                </div>

                                <div class="div">
                                    <div class="form-control">{{ $institucion->direccion }}</div>
                                </div>
                            </div><br>

                            <div class="input-div one">
                                <div class="i">
                                    <i class="far fa-calendar-alt"></i> Fecha de Registo
                                </div>

                                <div class="div">
                                    <div class="form-control">{{ $institucion->fechaRegistro }}</div>
                                </div>
                            </div><br>

                            <a href="{{ url('/institucion/'.$institucion->id.'/edit') }}" class="btn btn-outline-success">Editar</a>
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="container">
                            <br>
                            <img src="{{asset('storage').'/'.$institucion->foto}}"  class="img-thumbnail"  alt="">
                        </div>
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