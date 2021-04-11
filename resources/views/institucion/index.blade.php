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
            <td>{{ $instituciones->ID_Instituciones }}</td>
            <td>{{ $instituciones->Nombre }}</td>
            <td>{{ $instituciones->Telefono }}</td>
            <td>{{ $instituciones->fecha_Registro }}</td>
            <td>{{ $instituciones->Foto }}</td>
            <td>{{ $instituciones->direccion }}</td>
            <td>
            
            <a href="{{ url('/institucion/'.$instituciones->ID_Instituciones.'/edit') }}">
                Editar
            </a>

             | 
            
            <form action="{{ url('/institucion/'.$instituciones->ID_Instituciones ) }}" method="post">

            @csrf
            
            {{ method_field('DELETE') }}

                <input type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar">

            </form>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection