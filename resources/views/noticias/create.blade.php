<form action="{{url('/noticias')}}" method="post" enctype="multipart/form-data">
@extends('layouts.app')

@section('content')

@csrf
<!DOCTYPE html>
<html>
<head>
	<title>Ecology</title>
	<link rel="shortcut icon" type="text/css" href="../img/logo.png">

	<link href="{{ asset('css/style.css') }}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <img class="wave" src="../img/wave.png">
	<div class="contenedor">
	<div >
	</div>
        <div class="login-content">
      <div  class="form-group">
        <h3 class="title">Registrar Noticia</h3>


  <div class="div">
        <label for="titulo">Titulo</label>
        <input type="text" name="titulo" id="titulo">
  </div>

  <div class="div">
        <label for="contexto">Contexto</label>
        <textarea name="contexto" id="contexto" cols="30" rows="10"></textarea>
  </div>

  <div class="div">
        <label for="fecha">Fecha</label>
        <input type="date" name="fecha" id="titulo">
  </div>

  <div class="div">
        <label for="estado">Estado</label>
        <input type="text" name="estado" id="titulo">
  </div>

  <div class="div">
        <label for="Foto">Foto</label>
        <input type="file" name="Foto" id="Foto">
  </div>
        <input type="submit" value="Guardar Datos">

</form>
