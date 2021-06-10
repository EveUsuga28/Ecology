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
    <x-datos datos="Productos"/> <!--componentes laravel con envio de datos-->
    <!--Encabezado-->

    <!--Cuerpo de Pagina (Body)-->
    <br>
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div>
                    @can('producto.create')
                        <a href="{{ route('producto.create')}}" class="btn btn-success">Nuevo</a>
                    @endcan

                    @can('puntajeproductobtn')
                        <a href="{{ route('puntajeProducto.index')}}" class="btn btn-light">Puntajes</a>
                    @endcan
                </div>
                <hr>
                <table id="productos" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <td>Id</td>
                            <td>Nombre Producto</td>
                            <td>Puntaje</td>
                            <td>Foto</td>
                            <td>Estado</td>
                            <td>Acciones</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($productos as $producto)
                            <tr>
                                <td>{{$producto->id}}</td>
                                <td>{{$producto->nombre}}</td>
                                <td>{{$producto->puntaje}}</td>
                                <td>
                                    <img src="{{asset('storage').'/'.$producto->foto}}" width="100" alt="">
                                </td>

                                @if($producto->estado == 'habilitado')
                                    <td bgcolor="#81F79F">{{ $producto->estado}}</td>
                                @else
                                    <td bgcolor="#FA5858">{{ $producto->estado}}</td>
                                @endif

                                @if ($producto->estado == 'Deshabilitado')
                                    <td>
                                        <form action="{{ route('producto.Deshabilitar', $producto->id)}}" method="POST" class="formulario-eliminar">
                                        @csrf
                                        @method('PUT')

                                            @can('estado/crearpuntaje')
                                                <button type="submit" class="btn btn-success mx-1"><i class="fa fa-check"></i></button>
                                                
                                            @endcan

                                            @can('producto.edit')
                                                
                                            @endcan

                                            
                                        </form>
                                    </td>
                                @else
                                    <td>
                                        <form action="{{ route('producto.Deshabilitar', $producto->id)}}" method="POST" class="formulario-eliminar">
                                        @csrf
                                        @method('PUT')

                                            @can('estado/crearpuntaje')
                                                <button type="submit" class="btn btn-danger"><i class="fa fa-times-circle"></i></button>
                                                <a class="btn btn-outline-secondary" href="{{Route('puntajeProducto.Crear',$producto->id)}}">Crear Nuevo Puntaje</a>                            
                                            @endcan

                                            @can('producto.edit')
                                                <a  class="btn btn-primary mx-1" href="{{url('/producto/'.$producto->id.'/edit') }}" title="Editar Producto"><i class="fa fa-edit"></i></a>
                                            @endcan

                                            <a href="{{$producto->video}}"><button class="btn btn-dark" type="button"><i class="fa fa-play"></i></button></a>
                                        </form>
                                    </td>
                                @endif  
                            </tr>
                        @endforeach 
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('js')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script>
        $(document).ready(function() {
            $('#productos').DataTable( {
                responsive: true,
                autoWidth: false,
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json'
                }
            } );
        } );
    </script>

        @if(session('eliminar') == 'true')
            <script>
                Swal.fire(
                    'Éxito!',
                    'Estado Cambiado',
                    'success'
                )
            </script>

        @endif
         <script>

        $('.formulario-eliminar').submit(function (e){
            e.preventDefault();

            Swal.fire({
                title: '¿Está seguro?',
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

@if(session('producto') == 'true')
<script>
    Command: toastr["success"]("¡Creado Exitosamente!", "Producto")

    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": true,
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
@if(session('editar') == 'true')
<script>
    Command: toastr["info"]("Editado Exitosamente", "Producto")

    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": true,
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




