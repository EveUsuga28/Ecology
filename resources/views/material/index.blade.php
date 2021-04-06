@extends('layouts.app')

@section('content')
Mostrar Materiales Lista

@if(Session::has('mensaje'))
{{session::get('mensaje')}}


@endif

<a href="{{url('material/create') }}">Crear Material</a>
<table class="table table-light">

   <thead class="thead-light">
       <tr>
           <th>#</th>
           <th>Nombre Material</th>
           <th>Puntaje</th>
           <th>Kilos</th>
           <th>Fotos</th>
           <th>Acciones</th>
        </tr>
   </thead>
   <tbody>
    @foreach($materials as $material)
        <tr>
           <th>{{$material->id}}</th>
           <td>{{$material->NomreMaterial}}</td>
           <td>{{$material->Puntaje}}</td>
           <td>{{$material->Kilos}}</td>

           <td>
           <img src="{{asset('storage').'/'.$material->Foto}}" width="100"alt="">
            <!-- {{$material->Foto}}-->
           </td>
           <td>
            <a href="{{Route('puntajeMaterial.Crear',$material->id)}}">Crear Nuevo Puntaje</a>
           <br>
           <a href="{{url('/material/'.$material->id.'/edit')}}">
                  Editar
           </a>

           </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
