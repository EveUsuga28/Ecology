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
    <x-datos datos="Puntaje Material"/> <!--componentes laravel con envio de datos-->
    <!--Encabezado-->

    <!--Cuerpo de Pagina (Body)-->
    <br>
    <div class="container">
        <div class="card">
            <div class="encabezado-formularios">
                <h1 class="text-white bg-success text-center padding"> Registrar Puntaje Material </h1>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-8">
                        <div class="container">
                            <form action="{{url('/puntajeMaterial')}}" method="POST">
                            @csrf

                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i> Nombre Material
                                    </div>

                                    <div class="div">
                                        <input type=""  class="form-control" value="{{$id}}"  name="id_materials" id="id_materials" required readonly>
                                    </div>
                                </div><br>

                                <div class="input-div pass">
                                    <div class="i"> 
                                        <i class="fas fa-id-card"></i> Fecha de inicio
                                    </div>

                                    <div class="div">
                                        <?php
                                            date_default_timezone_set('America/Bogota');
                                            $Fecha_Inicio =date("Y-m-d H:i:s");
                                        ?>
                                        <input type="datetime"  class="form-control" value="<?= $Fecha_Inicio ?>" name="Fecha_Inicio" id="Fecha_Inicio" required hidden>
                                        <div class="form-control"> <?= $Fecha_Inicio ?></div>
                                    </div>
                                </div><br>

                                <div class="input-div pass">
                                    <div class="i"> 
                                        <i class="fas fa-id-card"></i> Fecha de Finalización
                                    </div>

                                    <div class="div">
                                        <input type="datetime" class="form-control" value="" name="Fecha_Fin" id="Fecha_Fin" disabled=»disabled>
                                    </div>
                                </div><br>

                                <div class="input-div pass">
                                    <div class="i"> 
                                        <i class="fas fa-id-card"></i> Puntaje del material
                                    </div>

                                    <div class="div">
                                        @error('Puntaje')
                                            <div class=" alert-danger">
                                                <small>*{{$message}}</small>
                                            </div>
                                        @enderror
                                        <input type="number" class="form-control"value="{{old('Puntaje')}}" name="Puntaje" id="Puntaje" required >
                                    </div>
                                </div><br>
        
                                <input type="submit" class="btn btn-success" value="Guardar Datos">
                                <a href="{{url('puntajeMaterial/')}}" class="btn btn-primary">Atrás</a>
                                <input type="hidden" name="Estado" value="habilitado" />
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
@endsection