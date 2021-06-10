<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Ecology</title>
    <link rel="shortcut icon" type="text/css" href="../img/logo.png">

    <link rel="stylesheet" href="{{asset('css/VistaNoticia.css')}}">
  

</head>
<body><br>
<img class="wave" src="{{asset('img/wave.png')}}">


<div class="container">
  <br>
  <div class="row">
    <div class="container">


      <div class="row">

        <div class="col-8 fondo shadow p-3 mb-5 rounded ">
          <h1 class="text-center">Eco<span>logy</span></h1>
          <br>

          <div class="row"> 
            <div class="col"><img src="{{asset('storage').'/'.$noticiaVista->foto}}" alt="" class=" rounded img"/></div>
            <div class="col-7"><h2 class="titulo"><b>{{ $noticiaVista->titulo }}</b></h2><div class="texto">{{ $noticiaVista->introduccion }}</div></div>
          </div>
          
          <div class="row">
            <div class="col">
              <div class="texto narracion2">{{ $noticiaVista->contexto }}</div><br>
            </div>
          </div>

        </div>

        <!--  Espaciado blanco entre los dos "contenedores" :) ------>
        <div class="col "></div>

        <div class="col-3 fondo2 shadow p-3 mb-5 rounded">
          <div class="container centrado">

            <h1>Información</h1>
            <hr>

            <img src="{{asset('img/perfildeusuario.jpg')}}" class="img">
            <br><br>

            <b class="subtitulo">Publicado Por:</b> <br>
            <b><i class="fas fa-arrow-right"></i>{{$usuario->name}}</b>

            <br><br>

            <b class="subtitulo">Fecha de Publicación:</b> <br>
            <b><i class="fas fa-arrow-right"></i>{{$noticiaVista->Fecha}}</b>
            <b><i class="fas fa-arrow-right"></i>{{$usuario->id_institucion}}</b>

            @if($usuario->id_institucion == NULL)
              <div><b></b></div>
            @else
            <br><br>

            <b class="subtitulo">Institución:</b> <br>
            
            <b><i class="fa fa-arrow-right"></i>{{$institucion->nombre}}</b>
            
            @endif
            <br><br>

            <a href="{{ url('/login') }}" class="btn btn-success form-control">Iniciar Sesión</a>
            <br>
            <a href="{{ route('/')}}" class="btn btn-light form-control narracion2">Atrás</a>

          </div>
          
        </div>

      </div>

    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>