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
    <x-datos datos="Puntaje Materiales"/> <!--componentes laravel con envio de datos-->
    <!--Encabezado-->

    <!--Cuerpo de Pagina (Body)-->
	<br>
   <div class="container">
		<div class="card">
			<div class="encabezado-formularios">
				<h1 class="text-white bg-success text-center padding"> Editar Puntaje Material </h1>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-8">
						<div class="container">
                     <form action="{{url('/puntajeMaterial/'.$puntajeMaterial->idPuntajeMaterail)}}" method="post">
                     @csrf
                     {{method_field('PATCH')}}

                        <div class="input-div one">
                           <div class="i">
                                 <i class="fas fa-user"></i> Nro Material
                           </div>

                           <div class="div">
                              <input type=""  class="form-control"value="{{isset($puntajeMaterial->id_materials)?$puntajeMaterial->id_materials:'' }}"  name="id_materials" id="id_materials" required disabled=»disabled>
                           </div>
                        </div><br>

                        <div class="input-div pass">
                           <div class="i"> 
                                 <i class="fas fa-id-card"></i> Fecha de Inicio
                           </div>

                           <div class="div">
                              <input type="datetime" class="form-control"value="{{isset($puntajeMaterial->Fecha_Inicio)?$puntajeMaterial->Fecha_Inicio:''}}" name="Fecha_Inicio" id="Fecha_Inicio" required>
                           </div>
                        </div>  <br>

                        <div class="input-div pass">
                           <div class="i"> 
                                 <i class="fas fa-id-card"></i> Fecha de Finalización
                           </div>

                           <div class="div">
                              <input type="datetime"  class="form-control "value="{{isset($puntajeMaterial->Fecha_Fin)?$puntajeMaterial->Fecha_Fin:''}}"  name="Fecha_Fin" id="Fecha_Fin"  required>
                           </div>
                        </div><br>

                        <div class="input-div pass">
                           <div class="i"> 
                                 <i class="fas fa-id-card"></i> Puntaje
                           </div>

                           <div class="div">
                              <!--div class=" alert-danger">
                                 @error('Puntaje')
                                 <br>
                                    <small>*{{$message}}</small>
                                 <br>
                                 @enderror
                              </div-->
                              <input type="number"  class="form-control" value="{{old('Puntaje',$puntajeMaterial->Puntaje)}}" name="Puntaje" id="Puntaje" required disabled=»disabled>
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
