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
<!-------------------------------------------------------------------------------------------------------------->
<!--div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body"-->
    <img class="wave" src="../../img/wave.png">
	<div class="contenedor">
		<div class="img">
            <img src="../../img/planet-earth.svg">
		</div>
		<div class="login-content">
            <form method="POST" action="{{ route('password.update') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">       
                <!--img src="./img/002-candado-1.svg" height="200px" width="200px"-->
				<h2 class="title">Ecology</h2>
                <div class="tituloC">
                    <h3>Cambiar Contraseña</h3>
                </div>
                <div class="contenidoC">
           		    <div class="input-div one">
                        <div class="i">
           		   		    <i class="fas fa-user"></i>
                        </div>
           		        <div class="div">

<!--div class="form-group row"-->

                            <!--h5>correo</h5>

<label for="email">{{ __('Correo') }}</label>
<div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span
                            @enderror-->
                            <h5>Correo</h5>
                            <input id="email" type="email" class="@error('email') is-invalid @enderror input" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                                
                        </div>
                    </div>
                    <div class="input-div pass">
                        <div class="i">
							<img src="../../img/001-eye.png" id="boton"> 
           		        </div>
           		        <div class="div">
                            <h5>Contraseña</h5>
                            <input id="password" type="password" class="input @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="input-div pass">
           		        <div class="i"> 
           		    	    <i class="fas fa-lock"></i>
                        </div>
           		        <div class="div">
                            <h5>Confirmar Contraseña</h5>
                            <input id="password-confirm" type="password" class="input" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>
                    <button type="submit" class="btn">
                        {{ __('Restablecer Contraseña') }}
                    </button>
                </div>
            </form>

                <!--/div>
            </div>
        </div>
    </div>
</div-->

        </div> 
    </div>
<!------------------------------------------------------------------------------------>
    <script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
	<script>
		var boton = document.getElementById('boton');
		var input = document.getElementById('password');

		boton.addEventListener('click', mostrarContraseña);

		function mostrarContraseña(){
			if(input.type == "password"){
				input.type = "text";
				boton.src = "../../img/002-invisible.png";

				setTimeout("ocultar()", 300000);
			}else {
				input.type = "password";
				boyon.src = "../../img/001-eye.png";
			}
		}

		function ocultar(){
			input.type = "password";
			boyon.src = "../../img/001-eye.png";
		}
	</script>
</body>
</html>
@endsection
