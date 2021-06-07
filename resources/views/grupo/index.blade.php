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
                @if(Auth()->user()->hasPermissionTo('institucionNull'))
                @else
                    <div>
                        <a href="{{ route('grupo.create') }}" class="btn btn-success">Nuevo</a>
                    </div>
                    <hr>
                @endif
                <table id="grupos" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Grupo</th>
                            <th>Institución</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody >
                    <div hidden>{{$contador = 0 }}</div>
                        @foreach( $grupo as $grupos )
                            <tr>
                                
                                <td>{{$contador += 1}}</td>
                                <td>{{ $grupos->grupo }}</td>

                                @foreach ($institucion as $nombreinstitucion)
                                    @if($nombreinstitucion->id == $grupos->id_institucion)
                                        <td>{{ $nombreinstitucion->nombre}}</td>
                                    @endif
                                @endforeach
                                
                                <td>
                                    @if($grupos->estado == 1)
                                        {{ __('Habilitado') }}
                                    @else
                                        {{ __('Deshabilitado') }}
                                    @endif
                                </td>

                                @if ($grupos->estado == 0)
                                    <td>
                                        <form action="{{ route('grupos.Deshabilitar', $grupos->id)}}" method="POST" class="formulario-eliminar">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-success ">Habilitar</button>
                                        </form>
                                    </td>
                                @else
                                    <td>
                                        <form action="{{ route('grupos.Deshabilitar', $grupos->id)}}" method="POST" class="formulario-eliminar">
                                            <a href="{{ url('/grupo/'.$grupos->id.'/edit') }}" class="btn btn-outline-success">Editar</a>
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-success ">Deshabilitar</button>
                                        </form>
                                    </td>
                                @endif
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
