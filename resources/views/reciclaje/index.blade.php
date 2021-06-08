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
    <x-datos datos="Reciclaje institucion"/> <!--componentes laravel con envio de datos-->
    <!--Encabezado-->

    <!--Cuerpo de Pagina (Body)-->
    <br>
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div>
                    <a href="{{ route('reciclaje.crear')}}" class="btn btn-success">Nuevo reciclaje institución</a>
                </div>
                <hr>
                <table id="reciclaje" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Id</th>
                            @can('confirmarRechazar')
                            <th>Institución</th>
                            @endcan
                            <th>Materiales kilos</th>
                            <th>Puntaje Materiales</th>
                            <th>Productos</th>
                            <th>Puntaje Productos</th>
                            <th>Total Puntaje</th>
                            <th>Fecha Inicio</th>
                            <th>Fecha Fin</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($reciclaje_institucion as $reciclaje)
                        <div>
                            <td>{{$reciclaje->id}}</td>
                            @can('confirmarRechazar')
                            <td>{{$reciclaje->nombre}}</td>
                            @endcan
                            <td>{{$reciclaje->kilos}}</td>
                            <td>{{$reciclaje->totalPuntajeMaterial}}</td>
                            <td>{{$reciclaje->cantidad}}</td>
                            <td>{{$reciclaje->totalPuntajeProductos}}</td>
                            <td>{{$reciclaje->totalPuntaje}}</td>
                            <td>{{$reciclaje->fechaInicio}}</td>
                            <td>{{$reciclaje->fechaFin}}</td>
                            <td>{{$reciclaje->estado}}</td>
                            <td><div class="btn-group" role="group" aria-label="Basic example">
                                @if($reciclaje->estado != 'EN PROCESO' && $reciclaje->estado != 'RECHAZADO')
                                    <a href="{{route('reciclaje.detalleReciclaje',$reciclaje->id)}}" class="btn btn-dark"><i class="far fa-eye"></i>&nbsp;Detalle</a>
                                @endif
                                @if($reciclaje->estado == 'EN PROCESO' || $reciclaje->estado == 'RECHAZADO')
                                        <a href="{{ route('reciclaje.Editar', $reciclaje->id)}}" class="btn btn-primary"><i class="fas fa-edit"></i>&nbsp;Editar&nbsp;</a>&nbsp;
                                    <form class="EnviarReciclajeInstitucion" action="{{ route('reciclaje.cambiarEstado', $reciclaje->id)}}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        @can('confirmarRechazar')
                                            <button  type="submit" class="btn btn-success" disabled><i class="fas fa-paper-plane"></i>&nbsp;Enviar&nbsp;</button>&nbsp;
                                        @else
                                            <button  type="submit" class="btn btn-success"><i class="fas fa-paper-plane"></i>&nbsp;Enviar&nbsp;</button>&nbsp;
                                        @endcan
                                    </form>
                                @endif
                                @can('confirmarRechazar')
                                    @if($reciclaje->estado == 'ENVIADO')
                                            <form class="confirmar" action="{{ route('reciclaje.confirmarRechazarReciclaje')}}" method="POST">&nbsp;
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" value="Confirmar" name="estado">
                                                <input type="hidden" value="{{$reciclaje->id}}" name="id">
                                                <button  type="submit" class="btn btn-success"><i class="fas fa-check"></i>&nbsp;Confirmar&nbsp;</button>&nbsp;&nbsp;
                                            </form>
                                            <form class="rechazar" action="{{ route('reciclaje.confirmarRechazarReciclaje')}}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" value="rechazar" name="estado2">
                                                <input type="hidden" value="{{$reciclaje->id}}" name="id">
                                                <button  type="submit" class="btn btn-danger"><i class="fas fa-times-circle"></i>&nbsp;Rechazar&nbsp;</button>&nbsp;
                                            </form>
                                    @elseif($reciclaje->estado == 'CONFIRMADO')
                                    @endif
                                @endcan
                                </td>
                            </div>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--Cuerpo de Pagina (Body)-->

@endsection

@section('js')

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script>
        $(document).ready(function() {
            $('#reciclaje').DataTable( {
                responsive: true,
                autoWidth: false,
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json'
                }
            } );
        } );
    </script>
    
    @if(session('institucion') == 'true')
        <script>
            Command: toastr["warning"]("Necesita tener una institución asociada para generar reciclaje", "Error")

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

    <script>
        $('.EnviarReciclajeInstitucion').submit(function (e){
            e.preventDefault();

            Swal.fire({
                title: 'Está seguro Qué desea enviar?',
                text: "Ya no se podra modificar",
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

    @if(session('Enviado') == 'true')
        <script>
            Swal.fire(
                'Exito!',
                'Reciclaje Enviado',
                'success'
            )
        </script>
    @endif

    <script>
        $('.confirmar').submit(function (e){
            e.preventDefault();

            Swal.fire({
                title: 'Está seguro Qué desea confirmar?',
                text: "Ya no se podra modificar",
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

    @if(session('confirmado') == 'true')
        <script>
            Swal.fire(
                'Exito!',
                'Reciclaje Confirmado!',
                'success'
            )
        </script>
    @endif

    <script>
        $('.rechazar').submit(function (e){
            e.preventDefault();

            Swal.fire({
                title: 'Está seguro Qué desea rechazar?',
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

    @if(session('rechazado') == 'true')
        <script>
            Swal.fire(
                'Exito!',
                'Reciclaje Rechazado!',
                'success'
            )
        </script>
    @endif

@endsection





