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
    <x-datos datos="Grupos"/> <!--componentes laravel con envio de datos-->
    <!--Encabezado-->

    <!--Cuerpo de Pagina (Body)-->
    <br>
    <div class="container">
        <div class="card">
            <div class="encabezado-formularios">
                <h1 class="text-white bg-success text-center padding"> Registrar Grupos </h1>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-8">
                        <div class="container">
                            <form class="container" action="{{ url('grupo') }} " method="post" enctype="multipart/form-data">
                            @csrf

                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i> Grupo
                                    </div>

                                    <div class="div">
                                        <input type="text" class="form-control" name="Grupo" id="Grupo" required maxLength="4">
                                    </div>
                                </div><br>

                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i> Instituciones
                                    </div>

                                    <div class="div">
                                        <select name="id_institucion" class="form-control" id="id_institucion">
                                            <option value="">Selecciona una opcion</option>
                                            @foreach ($datos as $grupos)
                                                <option value="{{ $grupos->id}}">{{ $grupos->nombre}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div><br>
        
                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i> Estado
                                    </div>
                                    
                                    <div class="div">
                                        <select name="Estado" class="form-control" id="Estado">
                                            <option value="1">habilitado</option>
                                            <option value="0">deshabilitado</option>
                                        </select>
                                    </div>
                                </div><br>
                                    
                                <input class="btn btn-success" type="submit" value="Enviar"><br>
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
