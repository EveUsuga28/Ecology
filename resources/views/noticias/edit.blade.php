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
                        <h1 class="text-white bg-success text-center padding"> Editar Noticia </h1>
                  </div>
                  <div class="card-body">
                        <div class="row">
                              <div class="col-8">
                                    <div class="container">
                                        <form action="{{url('/noticias/'.$noticias->id)}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        {{method_field('PATCH')}}

                                            <div class="input-div one">
                                                <div class="i">
                                                <i class="far fa-address-book"></i> Titulo
                                                </div>

                                                <div class="div">
                                                    <input type="text" value="{{$noticias->titulo}}" class="form-control" name="titulo" id="titulo">
                                                </div>
                                            </div><br>

                                            <div class="input-div one">
                                                <div class="i">
                                                    <i class="fas fa-align-left"></i> Primer Párrafo
                                                </div>

                                                <div class="div">
                                                    <textarea name="introduccion" id="introduccion"  class="form-control" placeholder="Se ingresa el primer párrafo de la noticia a publicar">{{$noticias->introduccion}}</textarea>
                                                </div>
                                            </div><br>

                                            <div class="input-div one">
                                                <div class="i">
                                                    <i class="fas fa-align-left"></i> Texto Complementario
                                                </div>

                                                <div class="div">
                                                    <textarea name="contexto" id="contexto"  class="form-control" placeholder="Se ingresa el primer párrafo de la noticia a publicar">{{$noticias->contexto}}</textarea>
                                                </div>
                                            </div><br>

                                            <div class="input-div one">
                                                <div class="i">
                                                    <i class="far fa-calendar-alt"></i> Publicado en:
                                                </div>

                                                <div class="div">
                                                    <input type="date" class="form-control" value="{{$noticias->Fecha}}"name="fecha" id="titulo" hidden>
                                                    <div class="form-control">{{$noticias->Fecha}}</div>
                                                </div>
                                            </div><br>
                                            
                                            <div class="input-div one">
                                                <div class="i">
                                                    <i class="fas fa-photo-video"></i> Imagen
                                                </div>

                                                <div class="div">
                                                    <input type="file" class="form-control" name="Foto" id="Foto">
                                                </div>
                                            </div><br>

                                            <input type="submit" class="btn btn-success" value="Guardar Datos">
                                            <input type="text" value="{{$noticias->estado}}"name="estado" id="titulo" hidden>
                                        </form>
                                    </div>
                              </div>
                              <div class="col-4">
                                    <div class="container">
                                          <br>
                                          <img src="https://png.pngtree.com/png-vector/20190725/ourlarge/pngtree-vector-newspaper-icon-png-image_1577280.jpg" class="img-fluid" alt="">
                                    </div>
                              </div>
                        </div>
                  </div>
            </div>
      </div><br><br><br>
@endsection

@section('js')

@endsection
                                    
