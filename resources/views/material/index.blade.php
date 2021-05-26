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
    <br>
    <h1 align="center">Materiales</h1>
    <br>
         <a href="{{url('material/create') }}" class="btn btn-light " >NUEVO</a>
         <a href="{{url('puntajeMaterial') }}" class="btn btn-light " >PUNTAJES</a>
    </div>
<br>
    <div class="card">
        <div class="card-body" >
            <table id="materiales" class="table table-striped table-bordered" style="width:100%">
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
               <br>
               <a  class="btn btn-outline-info" href="{{url('/material/'.$material->id.'/edit')}}" title="
                Editar">
                <i class="fas fa-edit"></i>
               </a>
            <a class="btn btn-outline-secondary formulario-registro" href="{{Route('puntajeMaterial.Crear',$material->id) }}"   >Crear Nuevo Puntaje<a>
           <br>

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
    @if(session('material'))
    <script>
     Command: toastr["success"]("¡Creado Exitosamente!", "Material")

toastr.options = {
  "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-bottom-left",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}

</script>
@endif

@endsection

