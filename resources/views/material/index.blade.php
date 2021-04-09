@extends('layouts.app')

@section('content')

@if(Session::has('mensaje'))
{{session::get('mensaje')}}


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
<form >
    <div class="container mt-4" align="right"
        <input type="submit" class="btn btn-dark" value="Buscar">
    </div>
    </form>
    <div class="container mt-4">
    <div class="card border-info" >
        <div class="card-header bg-info text-white" >

            <a href="{{url('material/create') }}" class="btn btn-light">NUEVO</a>
        </div>
        <div class="card-body" >
        <table border="1" class="table table-sriped table-bordered" id="Materiales" >
            <thead align="center">

                <th>
                    Id
                </th>
                <th>
                    Nombre Material
                </th>
                <th>
                    Puntaje
                </th>
                <th>
                   Kilos
                </th>
                <th>
                    Foto
                </th>
                <th>
                    Acción
                </th>
            </tr>
        </thead>
        <tbody>


    @foreach($materials as $material)
        <tr>
           <th>{{$material->id}}</th>
           <td>{{$material->NomreMaterial}}</td>
           <td>{{$material->Puntaje}}</td>
           <td>{{$material->Kilos}}</td>

           <td>
           <img src="{{asset('storage').'/'.$material->Foto}}" width="100"alt="">
            <!-- {{$material->Foto}}-->
           </td>
           <td>
            <a class="btn btn-outline-warning" href="{{Route('puntajeMaterial.Crear',$material->id) }}">Crear Nuevo Puntaje</a>
           <br>
           <a  class="btn btn-outline-success" href="{{url('/material/'.$material->id.'/edit') }}">
                  Editar
           </a>

           </td>
        </tr>
        @endforeach
    </form>
