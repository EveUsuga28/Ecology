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
    <x-datos datos="Usuario"/> <!--componentes laravel con envio de datos-->
    <!--Encabezado-->

    <!--Cuerpo de Pagina (Body)-->
	<br>
	<div class="container">
		<div class="card">
			<div class="encabezado-formularios">
				<h1 class="text-white bg-success text-center padding"> Editar Usuario </h1>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-8">
						<div class="container">
							<form method="POST" action="{{ route('users.update',$user->id)}}">
							@csrf
							@method('PUT')
								
								<div class="input-div one">
									<div class="i">
										<i class="fas fa-user"></i> Nombre
									</div>

									<div class="div">
										<input id="name" type="text" class="form-control" name="name" value="{{$user->name}}" >
									</div>
								</div><br>

								<div class="row">
									<div class="col-5">

										<div class="input-div pass">
											<div class="i"> 
												<i class="fas fa-id-card"></i> Tipo Documento
											</div>
						
											<div for="tipo_doc" class="div">
												<Select class="form-control" name="tipo_doc" disabled=»disabled>
													<option value="{{$user->tipo_doc}}">{{$user->tipo_doc}}</option>
												</select>
											</div>
										</div><br>

									</div>
									<div class="col-7">

										<div class="input-div one">
											<div class="i">
												<i class="fas fa-hashtag"></i> Numero Documento 
											</div>

											<div for="nro_documento" class="div">
												<input id="nro_documento" type="number" class="form-control" name="nro_documento" value="{{$user->nro_documento}}">
											</div>
										</div><br>

									</div>
								</div>
								
								<div class="input-div one">
									<div class="i">
										<i class="fa fa-envelope-square"></i> Correo
									</div>

									<div for="email"class="div">
										<input id="email" type="email" class="form-control" name="email" value="{{$user->email}}">                              
									</div>
								</div><br>

								<div class="input-div one">
									<div class="i">
										<i class="fa fa-lock"></i> Nueva Contraseña
									</div>
									<div for="password"class="div">
										<input id="password" type="password" class="form-control" name="password" placeholder="Contraseña en caso de cambio">                              
									</div>
								</div>

								<br>
								<button type="submit" class="btn btn-success">
									{{ __('Guardar') }}
								</button>
								<a class="btn btn-dark" href="{{route('users.index')}}">Atrás</a>
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