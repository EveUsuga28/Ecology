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

<!-- -------------------------------------------------------------------------------------- -->
<!--div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>
                <div class="card-body"-->
    <img class="wave" src="img/wave.png">
	<div class="contenedor">
		<div class="img">
			<img src="./img/planet-earth.svg">
			<h1></h1>
		</div>
		<div class="login-content">
<!-- ------------------------------------------------ -->
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <img src="./img/customer.png" height="200px" width="200px" >
				<h2 class="title">Ecology</h2>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Correo</h5>
                        <input id="email" type="email" class="@error('email') is-invalid @enderror input" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
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
           		    	<h5>Contraseña</h5>
                        <input id="password" type="password" class="input @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

<!--div class="form-group row">
    <div class="col-md-6 offset-md-4">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

            <label class="form-check-label" for="remember">
                {{ __('Recuerdame') }}
            </label>
        </div>
    </div>
</div-->  
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">
                        {{ __('Olvidaste tu contraseña?') }}
                    </a>
                @endif
                <button type="submit" class="btn">
                    {{ __('Ingresar') }}
                </button>
            </form>
        </div>
    </div>

<!-- ------------------------------------------------------------------------- -->
   <script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
	<!--script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
	<script src="{{ asset('js/recuperar.js') }}"></script-->
</body>
</html> 
@endsection