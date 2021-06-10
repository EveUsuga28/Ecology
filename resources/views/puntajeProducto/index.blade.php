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
    <x-datos datos="Puntaje Producto"/> <!--componentes laravel con envio de datos-->
    <!--Encabezado-->

    <!--Cuerpo de Pagina (Body)-->
    <br>
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div>
                    <a href="{{url('producto') }}" class="btn btn-success " >Productos </a>
                </div>
                <hr>
                <table id="productosPuntaje" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <td>#</td>
                            <td>Producto</td>
                            <td>Fecha Inicio</td>
                            <td>Fecha Fin</td>
                            <td>Puntaje</td>
                            <td>Estado</td>
                            @can('puntajeproductobtn')
                                <td>Acciones</td>  
                            @endcan
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($puntajeProductos as $puntajeProducto)
                            <tr>
                                <td>{{$puntajeProducto->id}}</td>

                                @foreach($nameProduct as $nameDOS)
                                     @if($puntajeProducto->idproducto == $nameDOS->id)
                                        <td>{{$nameDOS->nombre}}</td>
                                     @endif
                                @endforeach

                                <td>{{$puntajeProducto->fechaInicio}}</td>
                                <td>{{$puntajeProducto->fechaFin}}</td>
                                <td>{{$puntajeProducto->puntaje}}</td>
                                @if($puntajeProducto->estado == 'habilitado')
                                    <td bgcolor="#81F79F">{{ $puntajeProducto->estado}}</td>
                                @else
                                    <td bgcolor="#FA5858">{{ $puntajeProducto->estado}}</td>
                                @endif

                                @if ($puntajeProducto->estado == 'Deshabilitado')
                                    <td>
                                        <form action="{{ route('puntajeProducto.Deshabilitar', $puntajeProducto->id)}}" method="POST" class="formulario-eliminar">
                                        @csrf
                                        @method('PUT')
                                            <button type="submit" class="btn btn-success boton">habilitar</button>
                                            <a  class="btn btn-outline-success" href="{{url('/puntajeProducto/'.$puntajeProducto->id.'/edit')}}" >Editar</a>
                                        </form>
                                    </td>
                                @else
                                    <td>
                                        <form action="{{ route('puntajeProducto.Deshabilitar', $puntajeProducto->id)}}" method="POST" class="formulario-eliminar">
                                        @csrf
                                        @method('PUT')
                                            <button type="submit" class="btn btn-danger">Deshabilitar</button>
                                            <a  class="btn btn-outline-success" href="{{url('/puntajeProducto/'.$puntajeProducto->id.'/edit')}}">Editar</a>
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
            $('#productosPuntaje').DataTable( {
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

@if(session('puntajeProducto') == 'true')
<script>
    Command: toastr["success"]("¡Creado Exitosamente!", "puntajeProducto")

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
@if(session('EditarPuntaje') == 'true')
<script>
    Command: toastr["info"]("Editado Exitosamente", "Puntaje Producto")

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