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

<form class="container" action="{{ url('/grupo/'.$grupo->id_grupo ) }} " method="post" enctype="multipart/form-data">
@csrf

{{ method_field('PATCH') }}

<div class="form-group">
<label for="Grupo">Grupo</label><br>
<input type="text" name="Grupo" id="Grupo" value="{{$grupo->Grupo}}" required maxLength="4"><br>
</div>
<div class="form-group">
<label for="ID_Instituciones">Institución</label><br>
<input type="text" name="ID_Instituciones" id="ID_Instituciones" value="{{$grupo->ID_Instituciones}}" readonly><br>
</div>
<div class="form-group">
<label for="Estado">Estado</label><br>
<select name="Estado" id="Estado">
        <option value="1">habilitado</option>
        <option value="0">deshabilitado</option>
</select><br>
</div>
<input class="btn btn-success" type="submit" value="Actualizar">

</form>

</div>
</div>
</body>
@endsection