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
	</style>
@endsection

@section('content')

    <!--Encabezado-->
    <x-datos datos="institución"/> <!--componentes laravel con envio de datos-->
    <!--Encabezado-->

    <!--Cuerpo de Pagina (Body)-->
    <br>
    <div class="container">
        <div class="card">
            <div class="encabezado-formularios">
                <h1 class="text-white bg-success text-center padding"> Registrar Institución </h1>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-8">
                        <div class="container">
                            <form class="container" action="{{ url('institucion') }} " method="post" enctype="multipart/form-data">
                            @csrf

                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i> Nombre
                                    </div>

                                    <div class="div">
                                        <input type="text" class="form-control" name="nombre" id="nombre" required>
                                    </div>
                                </div><br>

                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i> Teléfono
                                    </div>

                                    <div class="div">
                                        <input type="text" class="form-control" name="telefono" id="telefono" required>
                                    </div>
                                </div><br>

                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i> Fecha de registo
                                    </div>

                                    <div class="div">
                                        <input type="date" class="form-control" name="fechaRegistro" id="fechaRegistro" required>
                                    </div>
                                </div><br>

                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i> Dirección
                                    </div>

                                    <div class="div">
                                        <input type="text" class="form-control" name="direccion" id="direccion" required>
                                    </div>
                                </div><br>

                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i> Foto
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
                            <img src="https://cdn1.iconfinder.com/data/icons/user-outline-icons-set/144/User001_Edit-512.png" class="img-fluid" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><br><br><br>
@endsection

@section('js')

@endsection
