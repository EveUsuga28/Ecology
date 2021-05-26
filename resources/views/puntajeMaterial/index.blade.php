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
<form >
    <div class="container mt-4" align="right">
        <h2 align="center">Puntajes Productos</h2>
        <input type="text" name="texto" value="{{$texto}}">
        <input type="submit" class="btn btn-dark" value="Buscar">
    </div>
    </form>
    <div class="container mt-4">
    <div class="card border-success" >
        <div class="card-header bg-success text-white" >
        </div>
        <div class="card-body" >
        <table border="1" class="table table-sriped table-bordered" id="Materiales" >
            <thead align="center">

                <th>
                    IdPuntajeMaterial
                </th>
                <th>
                    IdMaterial
                </th>
                <th>
                  Fecha_Inicio
                </th>
                <th>
                   Fecha_Fin
                </th>
                <th>
                    Puntaje
                </th>
                <th>
                    Estado
                </th>
                <th>
                    Acción
                </th>
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
                <a  class="btn btn-outline-success" href="{{url('/puntajeMaterial/'.$puntajeMaterial->idPuntajeMaterail.'/edit')}}">
                    Editar
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

@endsection
