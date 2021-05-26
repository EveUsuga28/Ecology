<form action="{{url('/puntajeProducto')}}" method="POST">
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
                <img src="/img/planet-earth.svg">
            </div>
            <div class="login-content">
          <div  class="form-group">
            <h5 class="title">Registrar PuntajeProducto</h5>
    
    
            <div class="div">
     <label form="idproducto" >IdProducto</label>
     <input type=""  class="form-control"value="{{$id}}"  name="idproducto" id="idproducto" disabled>
    </div>
    
    <div class="div">
     <?php
    date_default_timezone_set('America/Bogota');
    $fechaInicio =date("Y-m-d H:i:s");
    ?>
    
     <label form="fechaInicio">Fecha_Inicio</label>
     <input type="datetime"  class="form-control"value="<?= $fechaInicio ?>" name="fechaInicio" id="fechaInicio" >
    </div>
    
    
    <div class="div">
        <label form="fechaInicio">Fecha_Fin</label>
        <input type="datetime" class="form-control" value="" name="fechaFin" id="fechaFin" >
    </div>
    
    <div class="div">
     <label form="puntaje">Puntaje</label>
     <input type="number" class="form-control"value="" name="puntaje" id="puntaje" >
     <br>
     <input type="submit" class="form-control" value="Guardar Datos">
    </div>
     <a href="{{url('puntajeProducto/') }}" >Atrás</a>
    
    </form>