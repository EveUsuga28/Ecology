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
        <h5 class="title">Editar Material </h5>

<form action="{{url('/puntajeMaterial/'.$puntajeMaterial->idPuntajeMaterail)}}" method="post">
   @csrf
   {{method_field('PATCH')}}
<div class="div">
   <label form="id_materials" >IdMaterial</label>
   <input type=""  class="form-control"value="{{isset($puntajeMaterial->id_materials)?$puntajeMaterial->id_materials:'' }}"  name="id_materials" id="id_materials" required>
</div>
<div class="div">
   <label form="Fecha_Inicio">Fecha_Inicio</label>
   <input type="datetime" class="form-control"value="{{isset($puntajeMaterial->Fecha_Inicio)?$puntajeMaterial->Fecha_Inicio:''}}" name="Fecha_Inicio" id="Fecha_Inicio" required>
   <br>
</div>
<div class="div">
   <label form="Fecha_Inicio" >Fecha_Fin</label>
   <input type="datetime" value="{{isset($puntajeMaterial->Fecha_Fin)?$puntajeMaterial->Fecha_Fin:''}}"  name="Fecha_Fin" id="Fecha_Fin"  required>
</div>
<div>
   <label form="Puntaje">Puntaje

    <div class=" alert-danger">
        @error('Puntaje')
        <br>
        <small>*{{$message}}</small>
        <br>
        @enderror
    </div>
   </label>
   <input type="number"  class="form-control" value="{{old('Puntaje',$puntajeMaterial->Puntaje)}}" name="Puntaje" id="Puntaje" required>
</div>
<br>
   <input type="submit"  value="Guardar Datos " >

</form>
