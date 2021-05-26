@extends('layouts.app')

@section('css')

@endsection

@section('content')
    <style>
        table thead {
            background-color:#39A131 ;
            color: white;
        }
    </style>
    <div>
    <div>
         <a href="{{url('material/create') }}" class="btn btn-light " >NUEVO</a>
    </div>
    <div class="card">
        <div class="card-body" >
            <table id="materiales" class="table table-striped" style="width:100%">
            <thead align="center">
            <tr>
                <th>Id</th>
                <th> Nombre Material</th>
                <th> Puntaje</th>
                <th>Kilos</th>
                <th>Foto</th>
                <th>Acción</th>
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
            <a class="btn btn-outline-warning formulario-registro" href="{{Route('puntajeMaterial.Crear',$material->id) }}"   >Crear Nuevo Puntaje<a>
           <br>
           <a  class="btn btn-outline-success" href="{{url('/material/'.$material->id.'/edit') }}">
                  Editar
           </a>

           </td>
        </tr>
        @endforeach
     </tbody>
 </table>
  </div>
</div>
@endsection

@section('js')

    <script>
        $(document).ready(function() {
            $('#materiales').DataTable( {
                responsive: true,
                autoWidth: false,
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json'
                }
            } );
        } );
    </script>

@endsection

