@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noticias</title>
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
    <form action="{{route('noticias.index')}}" method="GET">
    <div class="container mt-4" align="right">
        <input type="text" name="texto" value="{{$texto}}">
        <input type="submit" class="btn btn-dark" value="Buscar">
    </div>
    </form>
    <div class="container mt-4">
    <div class="card border-sucess" > <!--success contenido verde-->
        <div class="card-header bg-success text-white" >

        <a href="{{url('noticias/create')}}" class="btn btn-light">NUEVO</a>

    </div>
    <div class="card-body" >
    <table border="1" class="table table-sriped table-bordered" id="noticias" >
        <thead align="center">
            <tr>
                <th>
                    Id
                </th>
                <th>
                    Titulo
                </th>
                <th>
                    Introducción
                </th>
                <th>
                   Fecha
                </th>
                <th>
                    Estado
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
            @if(count($noticias)<=0)
                <tr>
                    <td colspan="8">Noticia no encontrada</td>
                </tr>
            @else
            @foreach ($noticias as  $noticia)
                <tr align="center">
                    <td>{{$noticia->id}}</td>
                    <td>{{$noticia->titulo}}</td>
                    <td>{{$noticia->introduccion}}</td>
                    <td>{{$noticia->Fecha}}</td>
                    @if($noticia->estado == 1)
                     <td bgcolor="#81F79F">Habilitado</td>

                    @else
                    <td bgcolor="#FA5858">Deshabilitar</td>
                    @endif

                    @if ($noticia->estado == 0)
                    <td>
                        <form action="{{ route('noticias.Deshabilitar', $noticia->id)}}" method="POST" class="formulario-eliminar">


                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-success ">habilitar</button>
                        </form>
                    </td>

                    @else
                <td>
                    <img src="{{asset('storage').'/'.$noticia->Foto}}" width="100"alt="">
                </td>

                    <td>
                        <a  class="btn btn-outline-success" href="{{url('/noticias/'.$noticia->id.'/edit') }}">
                            Editar
                        </a>
                        <form action="{{ route('noticias.Deshabilitar', $noticia->id)}}" method="POST" class="formulario-eliminar">


                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-danger">Deshabilitar</button>
                        </form>
                    </td>

                    @endif


            @endforeach
            @endif

        </tbody>
    </table>
    {{$noticias->links()}}
    </div>
    </div>


</body>
</html>
