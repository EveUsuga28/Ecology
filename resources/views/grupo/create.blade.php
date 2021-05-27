@extends('layouts.app')

@section('css')

@endsection

@section('content')

@if(Session::has('mensaje'))
{{ Session::get('mensaje') }}

@endif

<div class="container mt-4">
    <div class="card border-info" >
    <div class="card-header bg-success text-white" >
        <h1>crear Grupo</h1>
</div>

<form class="container" action="{{ url('grupo') }} " method="post" enctype="multipart/form-data">
@csrf

    <div class="form-group">
        <label for="Grupo">Grupo</label>
        <br>
        <input type="text" name="Grupo" id="Grupo" required maxLength="4">
        <br>
    </div>

    <div class="form-group">
        <label for="id_institucion">institución</label>
        <br>
        
        <select name="id_institucion" id="id_institucion">
            <option value="">Selecciona una opcion</option>
            @foreach ($datos as $grupos)
                <option value="{{ $grupos->id}}">{{ $grupos->nombre}}</option>
            @endforeach
        </select>
        
        <br>
    </div>

    <div class="form-group">
        <label for="Estado">Estado</label>
        <br>

        <select name="Estado" id="Estado">
            <option value="1">habilitado</option>
            <option value="0">deshabilitado</option>
        </select>
        <br>
    </div>

    <input class="btn btn-success" type="submit" value="Enviar"><br><br>

</form>

@endsection
@section('js')
@endsection