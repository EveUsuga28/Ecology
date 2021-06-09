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
    <x-datos datos="Puntaje Materiales"/> <!--componentes laravel con envio de datos-->
    <!--Encabezado-->

    <!--Cuerpo de Pagina (Body)-->
    <br>
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div>
                    <a href="{{url('material') }}" class="btn btn-light " >Materiales</a>
                </div>
                <hr>
                <table id="puntajes" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Material</th>
                            <th>Fecha_Inicio</th>
                            <th>Fecha_Fin</th>
                            <th>Puntaje</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($datosPuntajeMaterial)<=0)
                            <tr>
                                <td colspan="8">Material no encontrada</td>
                            </tr>
                        @else
                            @foreach ( $datosPuntajeMaterial as $puntajeMaterial )
                                <tr>
                                    <td>{{$puntajeMaterial->idPuntajeMaterail}}</td>

                                    @foreach($nombredelmaterial as $nombre)
                                        @if($puntajeMaterial->id_materials == $nombre->id)
                                            <td>{{$nombre->NomreMaterial}}</td>
                                        @endif
                                    @endforeach

                                    <td>{{$puntajeMaterial->Fecha_Inicio}}</td>
                                    <td>{{$puntajeMaterial->Fecha_Fin}}</td>
                                    <td>{{$puntajeMaterial->Puntaje}}</td>

                                    @if($puntajeMaterial->Estado == 'habilitado')
                                        <td>{{ $puntajeMaterial->Estado}}</td>
                                    @else
                                        <td>{{ $puntajeMaterial->Estado}}</td>
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
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

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
        $('#puntajes').DataTable( {
            responsive: true,
            autoWidth: false,
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json'
            }
        } );
    } );
</script>
@if(session('puntaje'))
<script>
    Command: toastr["success"]("¡Puntaje Creado Exitosamente!", "Material")

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
@if(session('EditPuntaje') == 'true')
<script>
    Command: toastr["info"]("Editado Exitosamente", "Puntaje")

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
