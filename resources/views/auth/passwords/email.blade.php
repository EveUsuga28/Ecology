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
    <img class="wave" src="../img/wave.png">
	<div class="contenedor">
		<div class="img">
			<img src="../img/planet-earth.svg">
			
		</div>
        <div class="login-content">
            <form method="POST" action="{{ route('password.email') }}">
                @csrf

<!--div class="form-group row">
    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

    <div class="col-md-6"-->

                <img src="../img/customer.png" height="200px" width="200px" >
				<h2 class="title">Ecology</h2>
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="tituloC">
                    <h3>Restablecer la contraseña</h3>
                </div>
                <div class="contenidoC">
                    <div class="input-div one">
                    <div class="i">
                            <i class="fas fa-user"></i>
                    </div>
                    <div class="div">
                            <h5>Correo</h5>
                            <input id="email" type="email" class="input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

<!--div class="form-group row mb-0">
    <div class="col-md-6 offset-md-4"-->

                    <button type="submit" class="btn">
                        {{ __('Generar enlace') }}
                    </button>
                            <!--/div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div-->
                </div>
            </form>
        </div>
    </div>
<!------------------------------------------------------------------------------------>
    <script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
	<!--script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
	<script src="{{ asset('js/recuperar.js') }}"></script-->
</body>
</html>
@endsection
