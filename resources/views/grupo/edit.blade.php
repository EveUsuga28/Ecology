@extends('layouts.app')
@section('css')

@endsection

@section('content')


<div class="container mt-4">
    <div class="card border-info" >
    <div class="card-header bg-success text-white" >
            <h1>Editar Grupo</h1>
        </div>

<form class="container" action="{{ url('/grupo/'.$grupo->id ) }} " method="post" enctype="multipart/form-data">
@csrf

{{ method_field('PATCH') }}

<div class="form-group">
<label for="Grupo">Grupo</label><br>
<input type="text" name="Grupo" id="Grupo" value="{{$grupo->grupo}}" required maxLength="4"><br>
</div>
<div class="form-group">
<label for="id">Institución</label><br>
<input type="text" name="id" id="id" value="{{$grupo->id}}" readonly><br>
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

@endsection
@section('js')
@endsection