
<form action="{{url('/material')}}" method="post" enctype="multipart/form-data">
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
        <h5 class="title">Registrar Usuario</h5>

        <div class="div">
<label For="NomreMaterial" >Nombre Material</label>
    <input type="text"  class="form-control"name="NomreMaterial"  value="" id="NomreMaterial" required>
        </div>
        <div class="div">
    <label For="Puntaje" >Puntaje</label>
    <input type="number" class="form-control"name="Puntaje"  value="" id="Puntaje" required>
     </div>

     <div class="div">
    <label For="Kilos" >Kilos</label>
    <input type="number" class="form-control"name="Kilos" value="" id="Kilos" required>
     </div>
     <div class="div">
<br>
    @if(isset($material->Foto))
    <label For="Foto" >Foto</label>
      <!--{{$material->Foto}}-->

    <img src="{{asset('storage').'/'.$material->Foto}}"  width="100" alt="">

      @endif
    <input type="file" name="Foto" value="" id="Foto" required>
   </div>

    <input type="submit"value="Guardar Datos">
</form>
