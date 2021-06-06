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
        <x-datos datos="Grupo"/> <!--componentes laravel con envio de datos-->
        <!--Encabezado-->

        <!--Cuerpo de Pagina (Body)-->
        <br>
        <div class="container">
                <div class="card">
                        <div class="encabezado-formularios">
                                <h1 class="text-white bg-success text-center padding"> Editar Grupo </h1>
                        </div>
                        <div class="card-body">
                                <div class="row">
                                        <div class="col-8">
                                                <div class="container">
                                                        <form class="container" action="{{ url('/grupo/'.$grupo->id ) }} " method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        {{ method_field('PATCH') }}

                                                                <div class="input-div one">
                                                                        <div class="i">
                                                                                <i class="fas fa-graduation-cap"></i> Grupo
                                                                        </div>

                                                                        <div class="div">
                                                                                <input type="text" name="Grupo" class="form-control" id="Grupo" value="{{$grupo->grupo}}" required maxLength="4">
                                                                        </div>
                                                                </div><br>
                                                                
                                                                <div class="input-div one">
                                                                        <div class="i">
                                                                                <i class="fas fa-school"></i> Institucion
                                                                        </div>

                                                                        <div class="div">
                                                                                <input type="text" name="id_institucion" id="id_institucion" value="{{$institucion->id}}" hidden >
                                                                                <div class="form-control">{{$institucion->nombre}}</div>
                                                                        </div>
                                                                </div><br>

                                                                <div class="input-div one">
                                                                        <div class="i">
                                                                                <i class="far fa-bell-slash"></i> Estado
                                                                        </div>

                                                                        <div class="div">
                                                                                <select name="Estado" class="form-control" id="Estado">
                                                                                        <option value="1">habilitado</option>
                                                                                        <option value="0">deshabilitado</option>
                                                                                </select>
                                                                        </div>
                                                                </div><br>

                                                                <input class="btn btn-success" type="submit" value="Actualizar">
                                                        </form>
                                                </div>
                                        </div>
                                        <div class="col-4">
                                                <div class="container">
                                                        <br>
                                                        <img src="https://image.flaticon.com/icons/png/512/43/43289.png" class="img-fluid" alt="">
                                                </div>
                                        </div>
                                </div>
                        </div>
                </div>
        </div><br><br><br>
@endsection

@section('js')

@endsection
