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
    <x-datos datos="Materiales"/> <!--componentes laravel con envio de datos-->
    <!--Encabezado-->

    <!--Cuerpo de Pagina (Body)-->
	<br>
	<div class="container">
		<div class="card">
			<div class="encabezado-formularios">
				<h1 class="text-white bg-success text-center padding"> Editar Material </h1>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-8">
						<div class="container">
                            <form action="{{url('/material/'.$material->id)}}" method="post"  enctype="multipart/form-data">
                            @csrf
                            {{method_field('PATCH')}}

                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-user"></i> Nombre Material
                                    </div>

                                    <div class="div">
                                        <!--label For="NomreMaterial" >
                                            <div class=" alert-danger">
                                                @error('NomreMaterial')
                                                <br>
                                                    <small>*{{$message}}</small>
                                                <br>
                                                @enderror
                                            </div>
                                        </label-->
                                        <input type="text"  class="form-control"name="NomreMaterial"   value="{{old('NomreMaterial',$material->NomreMaterial)}}"  id="NomreMaterial" required  >
                                    </div>
                                </div><br>

                                <div class="input-div pass">
                                    <div class="i"> 
                                        <i class="fas fa-id-card"></i> Puntaje
                                    </div>

                                    <div class="div">
                                        <!--label For="Puntaje" >
                                            <div class=" alert-danger">
                                                @error('Puntaje')
                                                <br>
                                                    <small>*{{$message}}</small>
                                                <br>
                                                @enderror
                                            </div>
                                        </label-->
                                        <input type="number" class="form-control"name="Puntaje"  value="{{ old( 'Puntaje' ,$material->Puntaje) }}" id="Puntaje" required disabled=»disabled>
                                    </div>
                                </div><br>

                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-hashtag"></i> Kilos 
                                    </div>

                                    <div class="div">
                                        <!--label For="Kilos" >
                                            <div class=" alert-danger">
                                                @error('Kilos')
                                                <br>
                                                <small>*{{$message}}</small>
                                                <br>
                                                @enderror
                                            </div>
                                        </label-->
                                        <input type="number" class="form-control"name="Kilos" value="{{ old( 'Kilos' ,$material->Kilos)}}" id="Kilos" required>
                                    </div>
                                </div><br>

                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fa fa-envelope-square"></i> Cambiar Foto
                                    </div>

                                    <div class="div">
                                        <input class="form-control" name="Foto" type="file" id="Foto">
                                    </div>
                                </div><br>

                                <input class="btn btn-success" type="submit" value="Guardar Datos" >
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