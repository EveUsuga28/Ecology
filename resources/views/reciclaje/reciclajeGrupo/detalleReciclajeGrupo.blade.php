@extends('layouts.app')

@section('content')

    <!--Estilos del DataTable-->
    <style>
        table thead {
            background-color:#39A131 ;
            color: white;
        }
    </style>

    <!--Encabezado-->
    <x-datos datos="Materiales y Productos Grupo"/> <!--componentes laravel con envio de datos-->
    <!--Encabezado-->
    <br>
    <div>
        <h1 align="center">Productos</h1>
    </div>
    <br>
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
    <table id="table_productos" class="table table-striped" style="width:100%">
        <thead>
        <tr>
        <thead>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Puntaje</th>
            <th>Estado</th>
        </thead>
        </tr>
        </thead>
        <tbody>
        @foreach($reciclajeGrupoProductos as $reciclaje)
            <tr>
                <td>{{$reciclaje->nombre}}</td>
                <td>{{$reciclaje->cantidad}}</td>
                <td>{{$reciclaje->puntaje}}</td>
                @if($reciclaje->estado)
                    <td>Habilitado</td>
                @else
                    <td>Deshabilitado</td>
                @endif
            <tr>
        @endforeach
        </tbody>
    </table>
    </div>
    </div>

    </div>
    <br>
    <div>
        <h1 align="center">Materiales</h1>
    </div>
    <br>
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <table id="tabla_materiales>" class="table table-striped" style="width:100%">
                    <thead>
                    <tr>
                    <thead>
                    <th>Materiales</th>
                    <th>Cantidad</th>
                    <th>Puntaje</th>
                    <th>Estado</th>
                    </thead>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($reciclajeGrupoMateriales as $reciclaje)
                        <tr>
                            <td>{{$reciclaje->nombre}}</td>
                            <td>{{$reciclaje->kilos}}</td>
                            <td>{{$reciclaje->puntaje}}</td>
                            @if($reciclaje->estado)
                                <td>Habilitado</td>
                            @else
                                <td>Deshabilitado</td>
                        @endif
                        <tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <div class="text-center">
        <br>
        <br>
        <a href="{{ route('reciclaje.Editar', session('id_reciclaje'))}}" class="btn btn-info">Volver</a>
    </div>

@endsection

@section('js')

    <script>
        $(document).ready(function() {
            $('#table_productos').DataTable( {
                responsive: true,
                autoWidth: false,
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json'
                }
            } );
        } );
    </script>

@endsection



