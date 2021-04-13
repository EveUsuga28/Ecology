
@extends('layouts.app')

@section('content')
<form action="{{url('/noticias')}}" method="post" enctype="multipart/form-data">
@csrf

<label for="titulo">Titulo</label>
<input type="text" name="titulo" id="titulo">
<br>
<label for="contexto">Contexto</label>
<textarea name="contexto" id="contexto" cols="30" rows="10"></textarea>


<br>
<label for="fecha">Fecha</label>
<input type="date" name="fecha" id="titulo">
<br>
<label for="estado">Estado</label>
<input type="text" name="estado" id="titulo">
<br>
<label for="Foto">Foto</label>
<input type="file" name="Foto" id="Foto">
<br>
<input type="submit" value="Guardar Datos">

</form>
