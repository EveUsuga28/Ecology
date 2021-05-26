@extends('layouts.app')

@section('content')
<form action="{{url('/noticias/'.$noticias->id)}}" method="post" enctype="multipart/form-data">
@csrf
{{method_field('PATCH')}}

    <label for="titulo">Titulo</label>
    <input type="text" value="{{$noticias->titulo}}"name="titulo" id="titulo">
    <br>
    <label for="contexto">Contexto</label>
    <textarea name="contexto" id="contexto" cols="30" rows="10" >{{$noticias->contexto}}</textarea >
    <br>
    <label for="fecha">Fecha</label>
    <input type="date"  value="{{$noticias->Fecha}}"name="fecha" id="titulo">
    <br>
    <label for="estado">Estado</label>
    <input type="text" value="{{$noticias->estado}}"name="estado" id="titulo">
    <br>
    <label for="Foto">Foto</label>
    {{$noticias->Foto}}
    <input type="file" name="Foto" id="Foto">
    <br>
    <input type="submit" value="Guardar Datos">

    </form>
