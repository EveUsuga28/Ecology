@extends('layouts.app')

@section('content')

<form action="{{ url('institucion') }} " method="post" enctype="multipart/form-data">
@csrf

<label for="foto"> Foto</label><br>
<input type="file" name="foto" id="foto"><br>

<label for="nombre">Nombre</label><br>
<input type="text" name="nombre" id="nombre"><br>

<label for="telefono">Teléfono</label><br>
<input type="text" name="telefono" id="telefono"><br>

<label for="fecha_Registro">Fecha Registro</label><br>
<input type="date" name="fecha_Registro" id="fecha_Registro"><br>

<label for="direccion">Dirección</label><br>
<input type="text" name="direccion" id="direccion"><br><br>


<input type="submit" value="Enviar">

</form>

@endsection