@extends('layouts.app')
@section('css')
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
@endsection


@section('content')
<form action="{{url('/noticias')}}" method="post" enctype="multipart/form-data">
@csrf

<!-------------------------------------------------------------------------------->
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
        <label for="introduccion">Introducción</label>
        <textarea name="introduccion" id="introduccion" cols="30" rows="10"></textarea>
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

  <div class="div"><!--MODIFICANDOOOOOOOOOOOOOOOOOOOOOOO-->
        <label for="id_users">Autor: </label>
        <label for="">{{Auth::user()->name}}</label>
        <input type="text" name="id_users" id="id_users" value="{{ Auth::user()->id }}" hidden>
  </div>
        <input type="submit" value="Guardar Datos">

</form>
@endsection

@section('js')
@endsection