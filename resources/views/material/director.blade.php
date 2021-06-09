@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{asset('css/estilo.css')}}">
@endsection

@section('content')

<!--Encabezado-->
<x-datos datos="Materiales"/> <!--componentes laravel con envio de datos-->
<!--Encabezado-->
<br>
    <div class="body">
        <div class="container">
            <div class="row">
                @foreach($material as $material)

                <div class="card col-3">
                    <figure>
                        <br>
                        <img src="{{asset('storage').'/'.$material->Foto}}" class="estilon">
                    </figure>
                    <div class="contenido" style="text-align:center">
                       <h3>Nombre Material: {{$material->NomreMaterial}}</h3>
                       <h3>Puntaje: {{$material->Puntaje}} </h3>
                    </div>
                </div>
            @endforeach
        </div>
        </div>
    </div>
@endsection
