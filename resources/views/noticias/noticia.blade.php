<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Ecology</title>
    <link rel="shortcut icon" type="text/css" href="../img/logo.png">
  
    <style>
    @import 'https://fonts.googleapis.com/css?family=UnifrakturMaguntia';
    body{
      background-image: url("{{asset('img/wave.png')}}");
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-size: cover;
    }

    .text-center{
      border-bottom: 2px solid #54605E;
      padding-bottom: 1%;
    }

    img{
      border-radius: 8px;
    }

    </style>

</head>
<body><br>


<div class="container">

  <div class="row">
    <div class="col"></div>
    <div class="col-1 "><a href="#" class="btn btn-info">atras</a></div>
  </div>
  <br>
  <div class="row">
    <div class="container">

      <div class="row">

        <div class="col-8 bg-secondary bg-gradient shadow p-3 mb-5 rounded">

          <br>
          <h1 class="text-center">Ecology</h1>
          <br><br>

          <div class="row"> 
            <div class="col"><img src="{{asset('storage').'/'.$noticiaVista->foto}}" alt="" width="300" class=" shadow mb-5 rounded"/></div>
            <div class="col-7"><h2>{{ $noticiaVista->titulo }}</h2><br><div>{{ $noticiaVista->introduccion }}</div></div>
          </div>
          
          <div class="row">
            <div class="col">
              <div class="maximo">{{ $noticiaVista->contexto }}</div><br>
            </div>
          </div>

        </div>

        <!--  Espaciado blanco entre los dos "contenedores" :) ------>
        <div class="col "></div>

        <div class="col-3 bg-success bg-gradient shadow p-3 mb-5 rounded">
          Column
        </div>

      </div>

    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>