@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css">
@endsection

@section('content')
    <style>
        table thead {
            background-color:#39A131 ;
            color: white;
        }
    </style>
    <div>
        <a href="{{ route('reciclaje.crear')}}" class="btn btn-light">Nuevo</a>
    </div>
    <div class="card">
        <div class="card-body">
            <div>
            <table id="reciclaje" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <td>Id</td>
                        <td>fecha Inicio</td>
                        <td>Fecha fin</td>
                        <td>Estado</td>
                        <td>Acciones</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($reciclaje_institucion as $reciclaje)
                        <tr>
                            <td>{{$reciclaje->id}}</td>
                            <td>{{$reciclaje->fechaInicio}}</td>
                            <td>{{$reciclaje->fechaFin}}</td>
                            <td>{{$reciclaje->estado}}</td>
                            <td><a href="{{ route('reciclaje.Editar', $reciclaje->id)}}" class="btn btn-light">editar</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
          </div>
        </div>
    </div>
@endsection

@section('js')

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>


    <script>
        $('#reciclaje').DataTable({

        });
    </script>



@endsection



