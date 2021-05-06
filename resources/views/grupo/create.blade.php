@extends('layouts.app')

@section('content')

@if(Session::has('mensaje'))
{{ Session::get('mensaje') }}

@endif

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
        <h1>crear Grupo</h1>
</div>

<form class="container" action="{{ url('grupo') }} " method="post" enctype="multipart/form-data">
@csrf

<div class="form-group">
<label for="Grupo">Grupo</label><br>
<input type="text" name="Grupo" id="Grupo" required maxLength="4"><br>
</div>

<div class="form-group">
<label for="ID_Instituciones">institución</label><br>

<select name="ID_Instituciones" id="ID_Instituciones">
    @foreach ( $institucion as $grupos)
        <option value="{{ $grupos->ID_Instituciones}}">{{ $grupos->Nombre}}</option>
    @endforeach
</select><br>
</div>

<div class="form-group">
<label for="Estado">Estado</label><br>

<select name="Estado" id="Estado">
        <option value="1">habilitado</option>
        <option value="0">deshabilitado</option>
</select><br>
</div>

<input class="btn btn-success" type="submit" value="Enviar"><br><br>

</form>

</div>
</div>
</body>
@endsection