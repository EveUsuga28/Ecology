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

        <a href="{{url('noticias/create')}}" class="btn btn-light">NUEVO</a>

    </div>
    <div class="card-body" >
    <table id="Noticias" class="table table-sriped table-bordered" id="noticias" >
        <thead align="center">
            <tr>
                <th>
                 Id
                </th>
                <th>
                    Titulo
                </th>
                <th>
                    Introducción
                </th>
                <th>
                   Fecha
                </th>
                <th>
                    Estado
                </th>
                <th>
                    Foto
                </th>
                <th>
                    Acción
                </th>
            </tr>
        </thead>
        <tbody>
            @if(count($noticias)<=0)
                <tr>
                    <td colspan="8">Noticia no encontrada</td>
                </tr>
            @else
            @foreach ($noticias as  $noticia)
                <tr align="center">
                    <td>{{$noticia->id}}</td>
                    <td>{{$noticia->titulo}}</td>
                    <td>{{$noticia->introduccion}}</td>
                    <td>{{$noticia->Fecha}}</td>
                    @if($noticia->estado == 1)
                     <td bgcolor="#81F79F">Habilitado</td>

                    @else
                    <td bgcolor="#FA5858">Deshabilitar</td>
                    @endif

                    @if ($noticia->estado == 0)
                    <td>
                        <form action="{{ route('noticias.Deshabilitar', $noticia->id)}}" method="POST" class="formulario-eliminar">


                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-success ">habilitar</button>
                        </form>
                    </td>

                    @else
                <td>
                    <img src="{{asset('storage').'/'.$noticia->Foto}}" width="100"alt="">
                </td>

                    <td>
                        <a  class="btn btn-outline-success" href="{{url('/noticias/'.$noticia->id.'/edit') }}">
                            Editar
                        </a>
                        <form action="{{ route('noticias.Deshabilitar', $noticia->id)}}" method="POST" class="formulario-eliminar">


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
    {{$noticias->links()}}
    </div>
    </div>

    @endsection

    @section('js')

        <script>
            $(document).ready(function() {
                $('#Noticias').DataTable( {
                    responsive: true,
                    autoWidth: false,
                    language: {
                        url: 'https://cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json'
                    }
                } );
            } );
        </script>

    @endsection
