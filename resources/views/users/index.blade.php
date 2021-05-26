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
    <form action="{{route('users.index')}}" method="GET">
    <div class="container mt-4" align="right">
        <input type="text" name="texto" value="{{$texto}}">
        <input type="submit" class="btn btn-dark" value="Buscar">
    </div>
    </form>
    <div class="container mt-4">
    <div class="card border-success" > <!--success contenido verde-->
        <div class="card-header bg-success text-white" >

        <a href="{{ route('users.create')}}" class="btn btn-light">NUEVO</a>

    </div>
    <div class="card-body" >
    <table border="1" class="table table-sriped table-bordered" id="usuarios" >
        <thead align="center">
            <tr>
                <th>
                    Id
                </th>
                <th>
                    Nombre
                </th>
                <th>
                    Tipo de Documento
                </th>
                <th>
                   Documento
                </th>
                <th>
                    Correo
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
            @if(count($users)<=0)
                <tr>
                    <td colspan="8">Usuario no encontrado</td>
                </tr>
            @else
            @foreach ($users as $user)
                <tr align="center">
                    <td>{{ $user->id}}</td>
                    <td>{{ $user->name}}</td>
                    <td>{{ $user->tipo_doc}}</td>
                    <td>{{ $user->nro_documento}}</td>
                    <td>{{ $user->email}}</td>
                    @if($user->Estado == 'habilitado')
                     <td bgcolor="#81F79F">{{ $user->Estado}}</td>

                    @else
                    <td bgcolor="#FA5858">{{ $user->Estado}}</td>
                    @endif

                    @if ($user->Estado == 'Deshabilitado')
                    <td>
                        <form action="{{ route('users.Deshabilitar', $user->id)}}" method="POST" class="formulario-eliminar">
                            <a class="btn btn-primary" href="{{ route('users.edit', $user->id)}}">Editar</a>

                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-success boton">habilitar</button>
                        </form>
                    </td>
                    @else
                    <td>
                        <form action="{{ route('users.Deshabilitar', $user->id)}}" method="POST" class="formulario-eliminar">
                            <a class="btn btn-primary" href="{{ route('users.edit', $user->id)}}">Editar</a>

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
    {{$users->links()}}
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
