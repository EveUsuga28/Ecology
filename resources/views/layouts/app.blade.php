<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Ecology</title>

    <!-- Scripts -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">



    <!-- Styles -->
	<link rel="shortcut icon" type="text/css" href="../img/logo.png">
    <link href="{{ asset('css/MenuEstilos.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" />
    @yield('css')
</head>

<body>
@guest

@else
    <div id="sidemenu" class="menu-collapsed">
        <div id="header">
            <div id="tittle"><span>Ecology</span></div>
            <div id="menu-btn">
                <div class="btn-hamburger"></div>
                <div class="btn-hamburger"></div>
                <div class="btn-hamburger"></div>
            </div>
        </div>
        <div id="profile">
            <div id="photo"><img src="img/perfildeusuario.jpg" alt=""></div>
            <div id="name"><span>{{ Auth::user()->name }}</span></div>
        </div>

        <div id="menu-items">
            <div class="item">
                <a href="{{ route('home')}}">
                    <div class="icon"><i class="fas fa-home fa-2x"></i></div>
                    <div class="title"><span>Inicio</span></div>
                </a>
            </div>
            @can('usuarios')
                <div class="item">
                    <a href="{{ route('users.index')}}">
                        <div class="icon"><i class="fas fa-user fa-2x"></i></div>
                        <div class="title"><span>Usuarios</span></div>
                    </a>
                </div>
            @endcan
            <div class="item">
                <a href="{{route('material.index')}}">
                    <div class="icon"><i class="fas fa-tree fa-2x"></i></div>
                    <div class="title"><span>Materiales</span></div>
                </a>
            </div>
            <div class="item">
                <a href="{{route('producto.index')}}">
                    <div class="icon"><i class="fa fa-box fa-2x"></i></div>
                    <div class="title"><span>Productos</span></div>
                </a>
            </div>
            <div class="item">
                <a href="{{route('reciclaje.index')}}">
                    <div class="icon"><i class="fas fa-recycle fa-2x"></i></div>
                    <div class="title"><span>Gestion reciclaje</span></div>
                </a>
            </div>
            <div class="item separator"></div>
            <div class="item">
                <a href="noticias">
                    <div class="icon"><i class="fas fa-newspaper fa-2x"></i></div>
                    <div class="title"><span>Noticias</span></div>
                </a>
            </div>
            <div class="item">
                <a href="{{ route('institucion.index') }}">
                    <div class="icon"><i class="fas fa-school fa-2x"></i></div>
                    <div class="title"><span>Institución</span></div>
                </a>
            </div>
            <div class="item">
                <a href="{{ route('grupo.index') }}">
                    <div class="icon"><i class="fas fa-user-graduate fa-2x"></i></div>
                    <div class="title"><span>Grupos</span></div>
                </a>
            </div>
            <div class="item">
                <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    <div class="icon"><i class="far fa-sign-out-alt"></i></div>
                    <div class="title"><span>{{ __('Cerrar Sesion') }}</span></div>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </a>
            </div>
        </div>
    </div>
    @endguest
    <div id="main-container">
        <p>
        @yield('content')
        </p>
    </div>

    <script>
        const btn = document.querySelector('#menu-btn');
        const menu = document.querySelector('#sidemenu');
        btn.addEventListener('click', e => {
            menu.classList.toggle("menu-expanded");
            menu.classList.toggle("menu-collapsed");

            document.querySelector('body').classList.toggle('body-expanded');
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script>
@yield('js')

</body>
</html>
