@extends('layouts.app')

@section('content')

@if(Session::has('mensaje'))
{{ Session::get('mensaje') }}

@endif



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        
        .boton{
            width: 54%;
        }
        
    </style>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.22/datatables.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.22/datatables.min.js"></script>


</head>
<body>


<br>
<br>
<div class="container mt-4">
<h1>Instituciones</h1> <br>

<form action="{{ route('institucion.index')} }" method="get">
        <div class="form-row">
            <div class="col-sm-4 my-1">
                <input type="text" class="form-control" name="texto" placeholder="Buscar">
            </div>
            <div class="col-auto my-1">
                <input type="submit" class="btn btn-primary" value="Buscar">
            </div>
        </div>
</form>

    <div class="card border-info" >
        <div class="card-header bg-success text-white" >
<a href="{{ route('institucion.create') }}" class="btn btn-light">nuevo</a>
</div>
<table border="1" class="table table-sriped table-bordered">
    <thead align="center">
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Teléfono</th>
            <th>Fecha Registro</th>
            <th>Foto</th>
            <th>Dirección</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody align="center">
        @foreach( $institucion as $instituciones )
        <tr>
            <td>{{ $instituciones->ID_Instituciones }}</td>
            <td>{{ $instituciones->Nombre }}</td>
            <td>{{ $instituciones->Telefono }}</td>
            <td>{{ $instituciones->fecha_Registro }}</td>
            <td>
            <img src="{{ asset('storage').'/'.$instituciones->Foto }}" alt="" width="100">
            </td>
            <td>{{ $instituciones->direccion }}</td>
            <td>
            
            <a href="{{ url('/institucion/'.$instituciones->ID_Instituciones.'/edit') }}" class="btn btn-warning">
                Editar
            </a>

             | 
            
            <form action="{{ url('/institucion/'.$instituciones->ID_Instituciones ) }}" class="d-inline" method="post">

            @csrf
            
            {{ method_field('DELETE') }}

                <input class="btn btn-danger" type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar">

            </form>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
</div>
</body>
@endsection