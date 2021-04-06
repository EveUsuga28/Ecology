@extends('layouts.app')

@section('content')

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


        </div>
        <div class="card-body" >
        <table border="1" class="table table-sriped table-bordered" id="Materiales" >
            <thead align="center">

                <th>
                    IdPuntajeMaterial
                </th>
                <th>
                    IdMaterial
                </th>
                <th>
                  Fecha_Inicio
                </th>
                <th>
                   Fecha_Fin
                </th>
                <th>
                    Puntaje
                </th>
                <th>
                    Acción
                </th>
            </tr>
        </thead>
        <tbody>
        @foreach ( $puntajeMaterials as $puntajeMaterial )


        <tr>
            <td>{{$puntajeMaterial->idPuntajeMaterail}}</td>
            <td>{{$puntajeMaterial->id_materials}}</td>
            <td>{{$puntajeMaterial->Fecha_Inicio}}</td>
            <td>{{$puntajeMaterial->Fecha_Fin}}</td>
            <td>{{$puntajeMaterial->Puntaje}}</td>
            <td>

            <a  class="btn btn-outline-success" href="{{url('/puntajeMaterial/'.$puntajeMaterial->idPuntajeMaterail.'/edit')}}">
                Editar
            </a>

         <form action="{{url('/puntajeMaterial/'.$puntajeMaterial->idPuntajeMaterail)}}"  method="post">
          @csrf

            {{method_field('DELETE')}}

           <input type="submit"   class="btn btn-outline-danger" onclick="return confirm('¿Quieres borrar el Puntaje?')"
           value="Borrar">


            </td>
        </tr>
        @endforeach
     </form>
