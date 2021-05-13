<form action="{{url('/puntajeMaterial')}}" method="POST">
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
        <img class="wave" src="/img/wave.png">
        <div class="contenedor">
            <div class="img">

            </div>
            <div class="login-content">
          <div  class="form-group">
            <h5 class="title">Registrar Usuario</h5>


            <div class="div">
     <label form="id_materials" >IdMaterial</label>
     <input type=""  class="form-control"value="{{$id}}"  name="id_materials" id="id_materials" required >
    </div>

    <div class="div">
     <?php
    date_default_timezone_set('America/Bogota');
    $Fecha_Inicio =date("Y-m-d H:i:s");
    ?>

     <label form="Fecha_Inicio">Fecha_Inicio</label>
     <input type="datetime"  class="form-control"value="<?= $Fecha_Inicio ?>" name="Fecha_Inicio" id="Fecha_Inicio" required>
    </div>


    <div class="div">
        <label form="Fecha_Inicio">Fecha_Fin</label>
        <input type="datetime" class="form-control" value="" name="Fecha_Fin" id="Fecha_Fin" required>
    </div>

    <div class="div">
     <label form="Puntaje">Puntaje

        <div class=" alert-danger">
            @error('Puntaje')
            <br>
            <small>*{{$message}}</small>
            <br>
            @enderror
        </div>
     </label>
     <input type="number" class="form-control"value="{{old('Puntaje')}}" name="Puntaje" id="Puntaje" required >
     <br>
     <input type="submit"  value="Guardar Datos " >
    </div>
     <a href="{{url('puntajeMaterial/') }}">Atrás</a>

    </form>
