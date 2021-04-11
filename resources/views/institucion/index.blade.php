@extends('layouts.app')

@section('content')
<style>
*{
    color: black;
}
</style>

<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Teléfono</th>
            <th>Fecha Registro</th>
            <th>Foto</th>
            <th>Dirección</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
        @foreach( $institucion as $instituciones )
        <tr>
            <td>{{ $instituciones->ID_instituciones }}</td>
            <td>{{ $instituciones->Nombre }}</td>
            <td>{{ $instituciones->Telefono }}</td>
            <td>{{ $instituciones->fecha_Registro }}</td>
            <td>{{ $instituciones->Foto }}</td>
            <td>{{ $instituciones->direccion }}</td>
            <td>Editar | Borrar </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection