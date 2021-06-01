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
    <x-datos datos="Grupos"/> <!--componentes laravel con envio de datos-->
    <!--Encabezado-->

    <!--Cuerpo de Pagina (Body)-->
    <br>
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div>
                    <a href="{{ route('grupo.create') }}" class="btn btn-success">Nuevo</a>
                </div>
                <hr>
                <table id="grupos" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Grupo</th>
                            <th>id</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody align="center">
                        @foreach( $grupo as $grupos )
                            <tr>
                                <td>{{ $grupos->id }}</td>
                                <td>{{ $grupos->Grupo }}</td>
                                <td>{{ $grupos->id }}</td>
                                <td>{{ $grupos->Estado }}</td>
                                <td>
                                    <a href="{{ url('/grupo/'.$grupos->id.'/edit') }}" class="btn btn-outline-success">Editar</a>
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

    <script>
        $(document).ready(function() {
            $('#grupos').DataTable( {
                responsive: true,
                autoWidth: false,
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json'
                }
            } );
        } );
    </script>

@endsection
