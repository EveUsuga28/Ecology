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
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <table id="institucion" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Foto</th>
                            <th>Nombre</th>
                            <th>Teléfono</th>
                            <th>Dirección</th>
                            <th>Fecha Registro</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody align="center">
                        @foreach( $institucion as $instituciones )
                            <tr>
                                <td>{{ $instituciones->id }}</td>
                                <td>
                                    <img src="{{ asset('storage').'/'.$instituciones->Foto }}" alt="" width="100">
                                </td>
                                <td>{{ $instituciones->Nombre }}</td>
                                <td>{{ $instituciones->Telefono }}</td>
                                <td>{{ $instituciones->direccion }}</td>
                                <td>{{ $instituciones->fechaRegistro }}</td>
                                <td>
                                    <a href="{{ url('/institucion/'.$instituciones->id.'/edit') }}" class="btn btn-primary mx-1"><i class="fa fa-edit"></i></a>
                                </td>
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
