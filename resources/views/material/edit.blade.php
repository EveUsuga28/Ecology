<form action="{{url('/material/'.$material->id)}}" method="post"  enctype="multipart/form-data">
    @csrf
    {{method_field('PATCH')}}


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
        <img class="wave" src="/img/wave.png">
        <div class="contenedor">
            <div class="img">
                <img src="/img/planet-earth.svg">
            </div>
            <div class="login-content">
          <div  class="form-group">
            <h5 class="title">Editar Material </h5>

            <div class="div">
    <label For="NomreMaterial" >Nombre Material

        <div class=" alert-danger">
            @error('NomreMaterial')
            <br>
            <small>*{{$message}}</small>
            <br>
            @enderror
        </div>

    </label>
        <input type="text"  class="form-control"name="NomreMaterial"   value="{{old('NomreMaterial',$material->NomreMaterial)}}"  id="NomreMaterial" required  >
            </div>
            <div class="div">
        <label For="Puntaje" >Puntaje

            <div class=" alert-danger">
                @error('Puntaje')
                <br>
                <small>*{{$message}}</small>
                <br>
                @enderror
            </div>
        </label>
        <input type="number" class="form-control"name="Puntaje"  value="{{ old( 'Puntaje' ,$material->Puntaje) }}" id="Puntaje" required disabled=»disabled>
         </div>

         <div class="div">
        <label For="Kilos" >Kilos
            <div class=" alert-danger">
                @error('Kilos')
                <br>
                <small>*{{$message}}</small>
                <br>
                @enderror
            </div>

        </label>
        <input type="number" class="form-control"name="Kilos" value="{{ old( 'Kilos' ,$material->Kilos)}}" id="Kilos" required>
         </div>
         <div class="div">
    <br>
        @if(isset($material->Foto))
        <label For="Foto" >Foto</label>
          <!--{{$material->Foto}}-->

        <img src="{{asset('storage').'/'.$material->Foto}}"  width="100" alt="">

          @endif
        <input type="file" name="Foto" value="" id="Foto" >
       </div>
        </br>
        <input type="submit"value="Guardar Datos" >

    </form>

