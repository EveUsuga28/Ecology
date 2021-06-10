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
				<h1 class="text-white bg-success text-center padding"> Editar Puntaje Producto </h1>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-8">
						<div class="container">
                     <form action="{{url('/puntajeProducto/'.$puntajeProducto->id)}}" method="post">
                     @csrf
                     {{method_field('PATCH')}}

                        <div class="input-div one">
                           <div class="i">
                              <i class="fas fa-box"></i> Nombre Producto
                           </div>

                           <div class="div">
                              <input type=""  class="form-control"value="{{isset($puntajeProducto->idproducto)?$puntajeProducto->idproducto:'' }}"  name="idproducto" id="idproducto" hidden>
                              <div class="form-control">{{$NameOfProduct->nombre}}</div>
                           </div>
                        </div><br>

                        <div class="input-div one">
                           <div class="i">
                              <i class="far fa-calendar-alt"></i> Fecha de Inicio
                           </div>

                           <div class="div">
                              <input type="datetime" class="form-control"value="{{isset($puntajeProducto->fechaInicio)?$puntajeProducto->fechaInicio:''}}" name="fechaInicio" id="fechaInicio">
                           </div>
                        </div><br>

                        <div class="input-div one">
                           <div class="i">
                              <i class="far fa-calendar-alt"></i> Fecha de Finalización
                           </div>

                           <div class="div">
                              <input type="datetime" class="form-control"value="{{isset($puntajeProducto->fechaFin)?$puntajeProducto->fechaFin:''}}"  name="fechaFin" id="fechaFin" readonly>
                           </div>
                        </div><br>

                        <div class="input-div one">
                           <div class="i">
                              <i class="fas fa-star-half-alt"></i> Puntaje
                           </div>

                           <div class="div">
                              <input type="number"  class="form-control"value="{{isset($puntajeProducto->puntaje)?$puntajeProducto->puntaje:''}}" name="puntaje" id="puntaje" hidden>
                              <div class="form-control"><?= isset($puntajeProducto->puntaje)?$puntajeProducto->puntaje:'' ?></div>
                           </div>
                        </div><br>
                        
                        <input type="submit" class="btn btn-success"  value="Guardar Datos" >
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