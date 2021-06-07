@extends('layouts.app')

@section('css')

@endsection

@section('content')

    <!--Estilos del DataTable-->
    <style>
        table thead {
            background-color:#39A131 ;
            color: white;
        }
    </style>
    <!--Estilos del DataTable-->

    <!--Encabezado-->
    <x-datos datos="Noticias"/> <!--componentes laravel con envio de datos-->
    <!--Encabezado-->

    <!--Cuerpo de Pagina (Body)-->
    <br>
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div>
                    <a href="{{url('noticias/create')}}" class="btn btn-success">Nuevo</a>
                </div>
                <hr>
                <table id="Noticias" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <td>Id</td>
                            <td>Titulo</td>
                            <td>Introducción</td>
                            <td>Fecha</td>
                            <td>Estado</td>
                            <td>Foto</td>
                            <td>Acciones</td>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($noticias)<=0)
                            <tr>
                                <td colspan="8">Noticia no encontrada</td>
                            </tr>
                        @else
                            @foreach ($noticias as  $noticia)
                                <tr>
                                    <td>{{$noticia->id}}</td>
                                    <td>{{$noticia->titulo}}</td>
                                    <td>{{$noticia->introduccion}}</td>
                                    <td>{{$noticia->Fecha}}</td>

                                    @if($noticia->estado == 1)
                                        <td bgcolor="#81F79F">Habilitado</td>
                                    @else
                                        <td bgcolor="#FA5858">Deshabilitar</td>
                                    @endif

                                    <td>
                                        <img src="{{asset('storage').'/'.$noticia->foto}}" width="100"alt="">
                                    </td>

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
                                            <a class="btn btn-outline-success" href="{{url('/noticias/'.$noticia->id.'/edit') }}">Editar</a>

                                            <form action="{{ route('noticias.Deshabilitar', $noticia->id)}}" method="POST" class="formulario-eliminar">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn btn-danger">Deshabilitar</button>
                                            </form>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
                {{$noticias->links()}}
            </div>
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
