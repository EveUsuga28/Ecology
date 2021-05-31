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
        <h1 class="text-white bg-success text-center padding"> Registrar Material </h1>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-8">
            <div class="container">
              <form action="{{url('/material')}}" method="post" enctype="multipart/form-data">
              @csrf

                <div class="input-div one">
                  <div class="i">
                      <i class="fas fa-user"></i> Nombre Material
                  </div>

                  <div class="div">
                    <div class="  alert-danger" role="alert">
                          @error('NomreMaterial')
                          <small>*{{$message}}</small>
                          @enderror
                      </div>
                    <input type="text"  class="form-control" name="NomreMaterial"  value="{{old('NomreMaterial')}}" id="NomreMaterial"  required >
                  </div>
                </div><br>

                <div class="input-div pass">
                  <div class="i"> 
                      <i class="fas fa-id-card"></i> Puntaje
                  </div>

                  <div class="div">
                      <div class=" alert-danger">
                          @error('Puntaje')
                          <small>*{{$message}}</small>
                          @enderror
                      </div>
                    <input type="number" class="form-control"name="Puntaje" value="{{old('Puntaje')}}" id="Puntaje" required>
                  </div>
                </div><br>

                <div class="input-div one">
                  <div class="i">
                      <i class="fas fa-hashtag"></i> Kilos 
                  </div>

                  <div class="div">
                      <div class=" alert-danger">
                          @error('Kilos')
                          <small>*{{$message}}</small>
                          @enderror
                      </div>
                    <input type="number" class="form-control"name="Kilos" value="{{old('Kilos')}}" id="Kilos" required>
                  </div>
                </div><br>

                <div class="input-div one">
                  <div class="i">
                      <i class="fa fa-envelope-square"></i> Cambiar Foto
                  </div>

                  <div class="div">
                    <input type="file" name="Foto" value="{{old('Foto')}}" id="Foto"  class="form-control" required>
                      @error('Foto')
                        <small>*{{$message}}</small>
                      @enderror
                  </div>
                </div><br>

                <input type="submit" class="btn btn-success" value="Guardar Datos">
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
