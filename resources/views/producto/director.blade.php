@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{asset('css/estilo.css')}}">
@endsection

@section('content')

<!--Encabezado-->
<x-datos datos="Productos"/> <!--componentes laravel con envio de datos-->
<!--Encabezado-->
<br>
    <div class="body">
        <div class="container">
            <div class="row">
            @foreach($productos as $producto)
              
                <div class="card col-3">
                    <figure>
                         <img src="{{asset('storage').'/'.$producto->foto}}" class="estilon">
                         <!-- {{$producto->foto}}-->
                    </figure>
                    <div class="contenido">
                       <h3>Producto N° {{$producto->id}}</h3>
                       <h3>Nombre del Producto: {{$producto->nombre}}</h3> 
                       <h3>Puntaje: {{$producto->puntaje}} </h3>
                       <br>
                       <a href="https://www.youtube.com/watch?v=75B8pGCk4Y4&ab_channel=Ronycreativamanualidades"><button class="btn btn-dark" type="button"><i class="fa fa-play"></i> Ver Procedimiento</button></a>
                    </div>
                </div>
            @endforeach
        </div>
        </div>
    </div>
@endsection