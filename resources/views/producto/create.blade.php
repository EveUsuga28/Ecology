<form action="{{url('/producto')}}" method="post" enctype="multipart/form-data">
    @csrf
  
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
    <img class="wave" src="../img/wave.png">
	<div class="contenedor">
		<div class="img">
			<img src="../img/planet-earth.svg">
		</div>
        <div class="login-content">
      <div  class="form-group">
        <h5 class="title">Registrar Nuevo Producto</h5>

        <div class="div">
<label For="nombre" >Nombre Producto</label>
    <input type="text"  class="form-control"name="nombre"  value="" id="nombre" required>
        </div>
        <div class="div">
    <label For="puntaje" >Puntaje</label>
    <input type="number" class="form-control"name="puntaje"  value="" id="puntaje" required>
     </div>

     <div class="div">
<br>
    @if(isset($producto->foto))
    <label For="foto" >Foto</label>
      <!--{{$producto->foto}}-->

    <img src="{{asset('storage').'/'.$producto->foto}}"  width="100" alt="">

      @endif
    <input type="file" class="form-control" name="foto" value="" id="foto" required>
   </div>
   <br>

    <input type="submit" class="form-control" value="Guardar Datos">
  
  </form>