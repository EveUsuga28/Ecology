@extends('layouts.app')

@section('css')
    <style>
		.padding{
			padding: 20px;
			border-top-left-radius: 100%;
			border-bottom-right-radius: 100%;
		}

		.encabezado-formularios{
			border-bottom: 1px solid gray;
		}

        .alertaUsuario{
            padding: 20px;
            color: white;
            border-radius: 10px;
        }
	</style>
@endsection

@section('content')

    <!--Encabezado-->
    <x-datos datos="Institución"/> <!--componentes laravel con envio de datos-->
    <!--Encabezado-->

    <!--Cuerpo de Pagina (Body)-->
    <br>
    <div class="container">
        <div class="card">
            <div class="encabezado-formularios">
                <h1 class="text-white bg-success text-center padding"> Registrar Institución </h1>
            </div>
            <div class="card-body">
                @if(Auth()->user()->id_institucion != null || Auth()->user()->hasPermissionTo('institucionNull'))
                    <div></div>
                @else
                    <div class="row">
                        <div class="col-12">
                            <p class="alertaUsuario bg-info">Para navegar en el sistema es necesario tener una institución registrada</p>
                        </div>
                    </div>
                @endif
                <div class="row">
                    <div class="col-8">
                        <div class="container">
                            <form class="container" action="{{ url('institucion') }} " method="post" enctype="multipart/form-data">
                            @csrf

                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-school"></i> Nombre de la Institución
                                    </div>

                                    <div class="div">
                                        <input type="text" class="form-control" name="nombre" id="nombre" required>
                                    </div>
                                </div><br>

                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-phone"></i> Teléfono
                                    </div>

                                    <div class="div">
                                        <input type="text" class="form-control" name="telefono" id="telefono" maxLength="9" required>
                                    </div>
                                </div><br>

                                <div class="input-div one">
                                    <div class="i">
                                        <i class="far fa-calendar-alt"></i> Fecha de Registro
                                    </div>

                                    <div class="div">
                                        <?php
                                            date_default_timezone_set('America/Bogota');
                                            $fechaInicio =date("Y-m-d H:i:s");
                                        ?>
                                        <input type="datetime"  class="form-control" value="<?= $fechaInicio ?>" name="fechaRegistro" id="fechaRegistro" hidden>
                                        <div class="form-control"><?= $fechaInicio ?></div>
                                    </div>
                                </div><br>

                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-route"></i> Dirección
                                    </div>

                                    <div class="div">
                                        <input type="text" class="form-control" name="direccion" id="direccion" required>
                                    </div>
                                </div><br>

                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-photo-video"></i> Escudo
                                    </div>

                                    <div class="div">
                                        <input type="file" class="form-control" name="foto" id="foto">
                                    </div>
                                </div><br>

                                <input class="btn btn-success" type="submit" value="Registrar" required>
                            </form>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="container">
                            <br>
                            <img src="https://png.pngtree.com/png-vector/20190725/ourlarge/pngtree-school-icon-png-image_1606554.jpg" class="img-fluid" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><br><br><br>
@endsection

@section('js')

@endsection
