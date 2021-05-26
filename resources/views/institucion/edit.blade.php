@extends('layouts.app')

@section('content')


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        
        .boton{
            width: 54%;
        }
        
    </style>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.22/datatables.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.22/datatables.min.js"></script>


</head>
<body>


<br>
<br>
<div class="container mt-4">
    <div class="card border-info" >
    <div class="card-header bg-success text-white" >
            <h1>Editar Grupo</h1>
        </div>

<form class="container" action="{{ url('/institucion/'.$institucion->id ) }} " method="post" enctype="multipart/form-data">
@csrf

{{ method_field('PATCH') }}
<br>    
<div class="form-group">
<label for="foto"><img src="{{ asset('storage').'/'.$institucion->Foto }}" alt="" width="100"> </label><br>
<input type="file" name="foto" id="foto">

</div>

<div class="form-group">
<label for="nombre">Nombre</label><br>
<input type="text" name="nombre" id="nombre" value="{{ $institucion-> Nombre}}" required>
</div>

<div class="form-group">
<label for="telefono">Teléfono</label><br>
<input type="text" name="telefono" id="telefono" value="{{ $institucion-> Telefono}}" required>
</div>

<div class="form-group">
<label for="fechaRegistro">Fecha Registro</label><br>
<input type="date" name="fechaRegistro" id="fechaRegistro" value="{{ $institucion->fechaRegistro }}" required>
</div>

<div class="form-group">
<label for="direccion">Dirección</label><br>
<input type="text" name="direccion" id="direccion" value="{{ $institucion->direccion }}" required>
</div>

<input class="btn btn-success" type="submit" value="Actualizar"><br>

</form>

</div>
</div>
</body>
@endsection