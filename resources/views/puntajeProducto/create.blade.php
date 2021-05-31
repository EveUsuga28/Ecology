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
    <x-datos datos="Puntaje Producto"/> <!--componentes laravel con envio de datos-->
    <!--Encabezado-->

    <!--Cuerpo de Pagina (Body)-->
    <br>
    <div class="container">
        <div class="card">
            <div class="encabezado-formularios">
                <h1 class="text-white bg-success text-center padding"> Registrar Puntaje Producto </h1>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-8">
                        <div class="container">
                            <form action="{{url('/puntajeProducto')}}" method="POST">
                            @csrf

                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i> Nro Producto
                                    </div>

                                    <div class="div">
                                        <input type=""  class="form-control"value="{{$id}}"  name="idproducto" id="idproducto" hidden>
                                        <div class="form-control"><?= $id ?></div>
                                    </div>
                                </div><br>

                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i> Fecha de inicio
                                    </div>

                                    <div class="div">
                                        <?php
                                            date_default_timezone_set('America/Bogota');
                                            $fechaInicio =date("Y-m-d H:i:s");
                                        ?>
                                        <input type="datetime"  class="form-control" value="<?= $fechaInicio ?>" name="fechaInicio" id="fechaInicio" hidden>
                                        <div class="form-control"><?= $fechaInicio ?></div>
                                    </div>
                                </div><br>

                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i> Fecha de Finalizaión
                                    </div>
                
                                    <div class="div">
                                        <input type="datetime" class="form-control" value="" name="fechaFin" id="fechaFin" >
                                    </div>
                                </div><br>

                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i> Puntaje
                                    </div>
                
                                    <div class="div">
                                        @error('puntaje')
                                            <div class=" alert-danger">
                                                <small>*{{$message}}</small>
                                            </div>
                                        @enderror
                                        <input type="number" class="form-control"value="" name="puntaje" id="puntaje" >
                                    </div>
                                </div><br>

                                <input type="submit" class="btn btn-success" value="Guardar Datos">
                                <a href="{{url('puntajeProducto/') }}" class="btn btn-primary">Atrás</a>
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