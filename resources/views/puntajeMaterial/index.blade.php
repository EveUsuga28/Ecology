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
    <h1 align="center">Puntaje Materiales </h1>
     <a href="{{url('material') }}" class="btn btn-light " >Materiales</a>
    <div class="card">
        <div class="card-body" >
        <table id="PuntajesM" class="table table-sriped table-bordered" >
            <thead align="center">
            <tr>
                <th>IdPuntajeMaterial</th>
                <th>IdMaterial</th>
                <th>Fecha_Inicio</th>
                <th>Fecha_Fin</th>
                <th>Puntaje</th>
                <th>Estado</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            @if(count($puntajeMaterials)<=0)
            <tr>
                <td colspan="8">Material no encontrada</td>
            </tr>
        @else
        @foreach ( $puntajeMaterials as $puntajeMaterial )


        <tr>
            <td>{{$puntajeMaterial->idPuntajeMaterail}}</td>
            <td>{{$puntajeMaterial->id_materials}}</td>
            <td>{{$puntajeMaterial->Fecha_Inicio}}</td>
            <td>{{$puntajeMaterial->Fecha_Fin}}</td>
            <td>{{$puntajeMaterial->Puntaje}}</td>
            @if($puntajeMaterial->Estado == 'habilitado')
            <td >{{ $puntajeMaterial->Estado}}</td>

           @else
           <td >{{ $puntajeMaterial->Estado}}</td>
           @endif

           @if ($puntajeMaterial->Estado == 'Deshabilitado')
           <td>
               <form action="{{ route('puntajeMaterial.Deshabilitar', $puntajeMaterial->idPuntajeMaterail)}}" method="POST" class="formulario-eliminar">

                   @csrf
                   @method('PUT')
                   <button type="submit" class="btn btn-success boton">habilitar</button>
               </form>
           </td>
           @else
           <td>
               <form action="{{ route('puntajeMaterial.Deshabilitar', $puntajeMaterial->idPuntajeMaterail)}}" method="POST" class="formulario-eliminar">
                <a  class="btn btn-outline-info" href="{{url('/puntajeMaterial/'.$puntajeMaterial->idPuntajeMaterail.'/edit')}}">
                    <i class="fas fa-edit"></i>
                </a>

                   @csrf
                   @method('PUT')
                   <button type="submit" class="btn btn-danger">Deshabilitar</button>
               </form>
           </td>
           @endif

        @endforeach
        @endif
        </tbody>
        </table>
        {{$puntajeMaterials->links()}}
        </div>
        </div>
</body>
</html>

@endsection
@section('js')

        <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

        @if(session('eliminar') == 'true')
            <script>
                Swal.fire(
                    'Exito!',
                    'Estado Cambiado',
                    'success'
                )
            </script>

        @endif



        <script>

        $('.formulario-eliminar').submit(function (e){
            e.preventDefault();

            Swal.fire({
                title: 'Está seguro?',
                text: "",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#dd3333',
                confirmButtonText: 'Sí, Hazlo!',
                cancelButtonText: 'cancelar!',
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            })


        });
        </script>

<script>
    $(document).ready(function() {
        $('#PuntajesM').DataTable( {
            responsive: true,
            autoWidth: false,
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json'
            }
        } );
    } );
</script>

@endsection
