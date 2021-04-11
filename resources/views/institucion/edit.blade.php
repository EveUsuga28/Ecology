@extends('layouts.app')

@section('content')

<form action="{{ url('institucion'.$institucion->ID_Instituciones ) }} " method="post" enctype="multipart/form-data">
@csrf

<label for="foto"> Foto</label><br>
<input type="file" name="foto" id="foto">
{{ $institucion->Foto }}
<br>

<label for="nombre">Nombre</label><br>
<input type="text" name="nombre" id="nombre" value="{{ $institucion-> Nombre}}"><br>

<label for="telefono">Teléfono</label><br>
<input type="text" name="telefono" id="telefono" value="{{ $institucion-> Telefono}}"><br>

<label for="fecha_Registro">Fecha Registro</label><br>
<input type="date" name="fecha_Registro" id="fecha_Registro" value="{{ $institucion->fecha_Registro }}"><br>

<label for="direccion">Dirección</label><br>
<input type="text" name="direccion" id="direccion" value="{{ $institucion->direccion }}"><br><br>


<input type="submit" value="Enviar">

</form>

@endsection