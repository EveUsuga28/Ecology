@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html>
<head>
	<title>Ecology</title>
	<link rel="shortcut icon" type="text/css" href="../img/logo.png">

	<link href="{{ asset('css/style.css') }}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<img class="wave" src="../../img/wave.png">
	<div class="contenedor">
		<div class="img">
			<img src="../../img/planet-earth.svg">
		</div>
        <div class="login-content">
			<form method="POST" action="{{ route('users.update',$user->id)}}">
            @csrf
            @method('PUT')
				<!--<img src="./img/customer.png" height="200px" width="200px" >-->
				<h5 class="title">Editar Usuario</h5>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
                  <div class="div">
           		   		<h5></h5>
                              <input id="name" type="text" class="form-control" name="name" value="{{$user->name}}" >
                      </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
                      <i class="fas fa-id-card"></i>
           		   </div>
           		   <div  for="tipo_doc" class="div">
					  <Select class="form-control" name="tipo_doc">
					  <option>{{$user->tipo_doc}}</option>
                            <option value='CC'>CC</option>
                            <option value='TI'>TI</option>
                            <option value='CE'>CE</option>
                            </select>
                                </div>
            	   </div>
                   <div class="input-div one">
           		   <div class="i">
                      <i class="fas fa-hashtag"></i>
           		   </div>
                  <div for="nro_documento" class="div">
           		   		<h5></h5>
                              <input id="nro_documento" type="number" class="form-control" name="nro_documento" value="{{$user->nro_documento}}">
                      </div>
           		</div>
                   <div class="input-div one">
           		   <div class="i">
                      <i class="fa fa-envelope-square"></i>
           		   </div>
                  <div for="email"class="div">
           		   		<h5></h5>
                              <input id="email" type="email" class="form-control" name="email" value="{{$user->email}}">                              
                      </div>
           		</div>
                   <div class="input-div one">
           		   <div class="i">
                      <i class="fa fa-lock"></i>
           		   </div>
                  <div for="password"class="div">
           		   		<h5></h5>
                              <input id="password" type="password" class="form-control" name="password" placeholder="Contraseña en caso de cambio">                              
                      </div>
           		</div>
                   
                    <button type="submit" class="btn btn-primary">
                        {{ __('Guardar') }}
                    </button>
                    <a class="btn btn-dark" href="{{route('users.index')}}">Atrás</a>
                        
            </form>
			
        </div>
    </div>
</body>
</html>    
@endsection