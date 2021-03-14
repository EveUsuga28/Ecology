@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html>
<head>
	<title>Ecology</title>
	<link rel="shortcut icon" type="text/css" href="./img/logo.png">

	<link href="{{ asset('css/style.css') }}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<img class="wave" src="img/wave.png">
	<div class="contenedor">
		<div class="img">
			<img src="./img/planet-earth.svg">
		</div>
        <div class="login-content">
			<form method="POST" action="{{ route('register') }}">
            @csrf
				<!--<img src="./img/customer.png" height="200px" width="200px" >-->
				<h5 class="title">Registrar Usuario</h5>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
                  <div class="div">
           		   		<h5>Usuario</h5>
                              <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                              @error('name')
                              <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                      </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
                      <i class="fas fa-id-card"></i>
           		   </div>
           		   <div  for="tipo_doc" class="div">
					  <Select class="form-control @error('tipo_doc') is-invalid @enderror" name="tipo_doc" value="{{ old('tipo_doc') }}" required autocomplete="tipo_doc" autofocus>
					  <option>Tipo Documento</option>
                            <option value='CC'>CC</option>
                            <option value='TI'>TI</option>
                            <option value='CE'>CE</option>
                            </select>
                            @error('tipo_doc')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
            	   </div>
                   <div class="input-div one">
           		   <div class="i">
                      <i class="fas fa-hashtag"></i>
           		   </div>
                  <div for="nro_documento" class="div">
           		   		<h5>Numero De Documento</h5>
                              <input id="nro_documento" type="number" class="form-control @error('nro_documento') is-invalid @enderror" name="nro_documento" value="{{ old('nro_documento') }}" required autocomplete="nro_documento" autofocus>
                              @error('nro_documento')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                      </div>
           		</div>
                   <div class="input-div one">
           		   <div class="i">
                      <i class="fad fa-envelope-square"></i>
           		   </div>
                  <div for="email"class="div">
           		   		<h5>Correo Electrónico</h5>
                              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">                              
                              @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                      </div>
           		</div>
                   <div class="input-div one">
           		   <div class="i">
                      <i class="fad fa-lock"></i>
           		   </div>
                  <div for="password"class="div">
           		   		<h5>Contraseña</h5>
                              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">                              
                              @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                      </div>
           		</div>
                   <div class="input-div one">
           		   <div class="i">
                      <i class="fad fa-lock"></i>
           		   </div>
                  <div for="password-confirm" class="div">
           		   		<h5>Confirmar Contraseña</h5>
                              <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">                              @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                      </div>
           		</div>
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Registrarse') }}
                                </button>
                        
            </form>
			
        </div>
    </div>
</body>
</html>
@endsection