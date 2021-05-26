@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html>
<head>
	<title>Ecology</title>
	<link rel="shortcut icon" type="text/css" href="../img/logo.png">

	<link href="{{ asset('css/style.css') }}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <img class="wave" src="/img/wave.png">
	<div class="contenedor">
		<div class="img">
			<img src="/img/planet-earth.svg">
		</div>
        <div class="login-content">
      <div  class="form-group">
        <h5 class="title">Editar Producto </h5>

<form action="{{url('/puntajeProducto/'.$puntajeProducto->idPuntajeProducto)}}" method="post">
   @csrf
   {{method_field('PATCH')}}
<div class="div">
   <label form="idproducto" >IdProducto</label>
   <input type=""  class="form-control"value="{{isset($puntajeProducto->idproducto)?$puntajeProducto->idproducto:'' }}"  name="idproducto" id="idproducto" disabled>
</div>
<div class="div">
   <label form="fechaInicio">Fecha_Inicio</label>
   <input type="datetime" class="form-control"value="{{isset($puntajeProducto->fechaInicio)?$puntajeProducto->fechaInicio:''}}" name="fechaInicio" id="fechaInicio" >
   <br>
</div>
<div class="div">
   <label form="fechaInicio">Fecha_Fin</label>
   <input type="datetime" class="form-control"value="{{isset($puntajeProducto->fechaFin)?$puntajeProducto->fechaFin:''}}"  name="fechaFin" id="fechaFin" >
</div>
<div>
   <label form="puntaje">Puntaje</label>
   <input type="number"  class="form-control"value="{{isset($puntajeProducto->puntaje)?$puntajeProducto->puntaje:''}}" name="puntaje" id="puntaje" >
</div>
<br>
   <input type="submit" class="form-control"  value="Guardar Datos " >

</form>