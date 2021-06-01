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
                                        <i class="fas fa-wine-bottle"></i> Nombre Material
                                    </div>

                                    <div class="div">
                                            <div class=" alert-danger">
                                                @error('NomreMaterial')
                                                <small>*{{$message}}</small>
                                                @enderror
                                            </div>
                                        <input type="text"  class="form-control"name="NomreMaterial"   value="{{old('NomreMaterial',$material->NomreMaterial)}}"  id="NomreMaterial" required  >
                                    </div>
                                </div><br>

                                <div class="input-div pass">
                                    <div class="i"> 
                                    <i class="fas fa-star-half-alt"></i> Puntaje
                                    </div>

                                    <div class="div">
                                        <div class=" alert-danger">
                                            @error('Puntaje')
                                            <small>*{{$message}}</small>
                                            @enderror
                                        </div>
                                        <input type="number" class="form-control"name="Puntaje"  value="{{ old( 'Puntaje' ,$material->Puntaje) }}" id="Puntaje" required disabled=»disabled>
                                    </div>
                                </div><br>

                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-balance-scale"></i></i> Kilos 
                                    </div>

                                    <div class="div">
                                        <div class=" alert-danger">
                                            @error('Kilos')
                                            <small>*{{$message}}</small>
                                            @enderror
                                        </div>
                                        <input type="number" class="form-control"name="Kilos" value="{{ old( 'Kilos' ,$material->Kilos)}}" id="Kilos" required>
                                    </div>
                                </div><br>

                                <div class="input-div one">
                                    <div class="i">
                                        <i class="fas fa-photo-video"></i></i> Imagen del material
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
							<img src="https://img.icons8.com/ios/452/recycle-sign.png" class="img-fluid" alt="">
						</div>
					</div>
                </div>
            </div>
        </div>
    </div>
@endsection