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
        <a href="{{ route('reciclajeGrupo.create') }}" class="btn btn-light">Nuevo</a>
    </div>
    <div class="card">
        <div class="card-body">
            <div>
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
    </div>
@endsection

@section('js')

    <script>
        $(document).ready(function() {
            $('#reciclajeGrupo').DataTable( {
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json'
                }
            } );
        } );
    </script>

@endsection





