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
  <x-datos datos="Productos"/> <!--componentes laravel con envio de datos-->
  <!--Encabezado-->

  <!--Cuerpo de Pagina (Body)-->
  <br>
  <div class="container">
    <div class="card">
      <div class="encabezado-formularios">
        <h1 class="text-white bg-success text-center padding"> Registrar Producto </h1>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-8">
            <div class="container">
              <form action="{{url('/producto')}}" method="post" enctype="multipart/form-data">
              @csrf

                <div class="input-div one">
                  <div class="i">
                    <i class="fas fa-box"></i> Nombre Producto
                  </div>

                  <div class="div">
                    <div class="  alert-danger" role="alert">
                          @error('nombre')
                          <small>*{{$message}}</small>    
                          @enderror
                    </div>
                    <input type="text"  class="form-control"name="nombre"  value="" id="nombre" required>
                  </div>
                </div><br>

                <div class="input-div one">
                  <div class="i">
                    <i class="fas fa-star-half-alt"></i> Puntaje
                  </div>

                  <div class="div">
                    <div class="  alert-danger" role="alert">
                      @error('puntaje')
                      <small>*{{$message}}</small>    
                      @enderror
                    </div>
                    <input type="number" class="form-control"name="puntaje"  value="" id="puntaje" required>
                  </div>
                </div><br>

                <div class="input-div one">
                  <div class="i">
                    <i class="fa fa-play"></i> Video
                  </div>

                  <div class="div">
                    <div class="  alert-danger" role="alert">
                      @error('video')
                      <small>*{{$message}}</small>    
                      @enderror
                    </div>
                    <input type="text" class="form-control"name="video"  value="" id="video" required>
                  </div>
                </div><br>

                <div class="input-div one">
                  <div class="i">
                    <i class="fas fa-photo-video"></i> Foto
                  </div>

                  <div class="div">
                    <input type="file" class="form-control" name="foto" value="" id="foto" required>
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
              <img src="https://static.thenounproject.com/png/2034632-200.png" class="img-fluid" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection