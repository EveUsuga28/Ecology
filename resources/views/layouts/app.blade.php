<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Ecology</title>

    <!-- Scripts -->


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">


    <!-- Styles -->
	<link rel="shortcut icon" type="text/css" href="../img/logo.png">
    <link href="{{ asset('css/MenuEstilos.css') }}" rel="stylesheet">
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
                    <div class="icon"><img src="img/logo.png" alt=""></div>
                    <div class="title"><span>Inicio</span></div>
                </a>
            </div>
            <div class="item">
                <a href="{{ route('users.index')}}">
                    <div class="icon"><img src="img/logo.png" alt=""></div>
                    <div class="title"><span>Usuarios</span></div>
                </a>
            </div>
            <div class="item">
                <a href="{{route('material.index')}}">
                    <div class="icon"><img src="img/logo.png" alt=""></div>
                    <div class="title"><span>Materiales</span></div>
                </a>
            </div>
            <div class="item separator"></div>
            <div class="item">
                <a href="#">
                    <div class="icon"><img src="img/logo.png" alt=""></div>
                    <div class="title"><span>Usuarios</span></div>
                </a>
            </div>
            <div class="item">
                <a href="#">
                    <div class="icon"><img src="img/logo.png" alt=""></div>
                    <div class="title"><span>Usuarios</span></div>
                </a>
            </div>
            <div class="item">
                <a href="#">
                    <div class="icon"><img src="img/logo.png" alt=""></div>
                    <div class="title"><span>Usuarios</span></div>
                </a>
            </div>
            <div class="item">
                <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    <div class="icon"><img src="img/logo.png" alt=""></div>
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
    @yield('js')
</body>
</html>
