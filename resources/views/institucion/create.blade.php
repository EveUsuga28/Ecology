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
            <h1>Crear Institución</h1>
        </div>

<form class="container" action="{{ url('institucion') }} " method="post" enctype="multipart/form-data">
@csrf

<div class="form-group">
<label for="foto"> Foto</label><br>
<input type="file" name="foto" id="foto"><br>
</div>

<div class="form-group">
<label for="nombre">Nombre</label><br>
<input type="text" name="nombre" id="nombre" required><br>
</div>

<div class="form-group">
<label for="telefono">Teléfono</label><br>
<input type="text" name="telefono" id="telefono" required><br>
</div>

<div class="form-group">
<label for="fecha_Registro">Fecha Registro</label><br>
<input type="date" name="fecha_Registro" id="fecha_Registro" required><br>
</div>

<div class="form-group">
<label for="direccion">Dirección</label><br>
<input type="text" name="direccion" id="direccion" required><br><br>
</div>

<input class="btn btn-success" type="submit" value="Enviar" required><br> <br>

</form>

</div>
</div>
</body>
@endsection