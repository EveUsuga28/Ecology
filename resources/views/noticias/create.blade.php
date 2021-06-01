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
      <x-datos datos="Noticias"/> <!--componentes laravel con envio de datos-->
      <!--Encabezado-->

      <!--Cuerpo de Pagina (Body)-->
      <br>
      <div class="container">
            <div class="card">
                  <div class="encabezado-formularios">
                        <h1 class="text-white bg-success text-center padding"> Registrar Noticia </h1>
                  </div>
                  <div class="card-body">
                        <div class="row">
                              <div class="col-8">
                                    <div class="container">
                                          <form action="{{url('/noticias')}}" method="post" enctype="multipart/form-data">
                                          @csrf

                                                <div class="input-div one">
                                                      <div class="i">
                                                            <i class="fas fa-user"></i> Autor
                                                      </div>

                                                      <div class="div">
                                                            <div class="form-control">{{Auth::user()->name}}</div>
                                                            <input type="text" name="id_users" id="id_users" value="{{ Auth::user()->id }}" hidden>
                                                      </div>
                                                </div><br>

                                                <div class="input-div one">
                                                      <div class="i">
                                                            <i class="fas fa-user"></i> Titulo
                                                      </div>

                                                      <div class="div">
                                                            <input type="text" class="form-control" name="titulo" id="titulo" required>
                                                      </div>
                                                </div><br>

                                                <div class="input-div one">
                                                      <div class="i">
                                                            <i class="fas fa-user"></i> Primer Párrafo
                                                      </div>

                                                      <div class="div">
                                                            <textarea name="introduccion" id="introduccion"  class="form-control" placeholder="Se ingresa el primer párrafo de la noticia a publicar"></textarea>
                                                      </div>
                                                </div><br>

                                                <div class="input-div one">
                                                      <div class="i">
                                                            <i class="fas fa-user"></i> Texto complementario
                                                      </div>

                                                      <div class="div">
                                                            <textarea name="contexto" id="contexto"  class="form-control" placeholder="Se ingresa el resto de la noticia"></textarea>
                                                      </div>
                                                </div><br>

                                                <div class="input-div one">
                                                      <div class="i">
                                                            <i class="fas fa-user"></i> Fecha de Publicación
                                                      </div>

                                                      <div class="div">
                                                            <?php
                                                                  date_default_timezone_set('America/Bogota');
                                                                  $fechaInicio =date("Y-m-d H:i:s");
                                                            ?>
                                                            <input type="datetime"  class="form-control" value="<?= $fechaInicio ?>" name="fecha" id="fecha" hidden>
                                                            <div class="form-control"><?= $fechaInicio ?></div>
                                                      </div>
                                                </div><br>

                                                <div class="input-div one">
                                                      <div class="i">
                                                            <i class="fas fa-user"></i> Estado
                                                      </div>

                                                      <div class="div">
                                                            <input type="text" class="form-control" name="estado" id="titulo">
                                                      </div>
                                                </div><br>

                                                <div class="input-div one">
                                                      <div class="i">
                                                            <i class="fas fa-user"></i> Imagen
                                                      </div>

                                                      <div class="div">
                                                            <input type="file" class="form-control" name="Foto" id="Foto">
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
      </div><br><br><br>
@endsection

@section('js')

@endsection