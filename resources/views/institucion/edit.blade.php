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
    <x-datos datos="Institución"/> <!--componentes laravel con envio de datos-->
    <!--Encabezado-->

    <!--Cuerpo de Pagina (Body)-->
    <br>
    <div class="container">
        <div class="card">
            <div class="encabezado-formularios">
                <h1 class="text-white bg-success text-center padding"> Editar Institución </h1>
            </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-8">
                            <div class="container">
                                <form class="container" action="{{ url('/institucion/'.$institucion->id ) }} " method="post" enctype="multipart/form-data">
                                @csrf
                                {{ method_field('PATCH') }}

                                    <div class="input-div one">
                                        <div class="i">
                                            <i class="fas fa-user"></i> Institución
                                        </div>

                                        <div class="div">
                                            <input type="text" class="form-control" name="nombre" id="nombre" value="{{ $institucion-> nombre}}" required>
                                        </div>
                                    </div><br>

                                    <div class="input-div one">
                                        <div class="i">
                                            <i class="fas fa-user"></i> Télefono
                                        </div>

                                        <div class="div">
                                            <input type="text" class="form-control" name="telefono" id="telefono" value="{{ $institucion-> telefono}}" required>
                                        </div>
                                    </div><br>

                                    <div class="input-div one">
                                        <div class="i">
                                            <i class="fas fa-user"></i> Fecha de Registro
                                        </div>

                                        <div class="div">
                                            <input type="date" class="form-control" name="fechaRegistro" id="fechaRegistro" value="{{ $institucion->fechaRegistro }}" required>
                                        </div>
                                    </div><br>

                                    <div class="input-div one">
                                        <div class="i">
                                            <i class="fas fa-user"></i> Fecha de Registro
                                        </div>

                                        <div class="div">
                                            <input type="text" class="form-control" name="direccion" id="direccion" value="{{ $institucion->direccion }}" required>
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

                                    <input class="btn btn-success" type="submit" value="Actualizar">
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
        </div>
    </div><br><br><br>
@endsection

@section('js')

@endsection