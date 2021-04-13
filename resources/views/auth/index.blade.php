<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ecology</title>
    <link href="{{ asset('css/estilos.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
</head>

<body class="hidden">
    <header>
        <nav id="nav" class="nav1">
            <div class="contenedor-nav">
                <div class="logo">
                    <h1>Eco<span>logy</span></h1>
                </div>
                <div class="enlaces" id="enlaces">
                        <a href="#" id="enlace-inicio" class="btn-header">Inicio</a> 
                        <a href="#" id="enlace-equipo" class="btn-header">Acerca De</a> 
                        <a href="#" id="enlace-servicio" class="btn-header">Servicios</a>
                        <a href="#" id="enlace-contacto" class="btn-header">Contacto</a> 
                        <a href="{{ route('login')}}"  class="btn-header">Iniciar Sesión</a> 
                </div>
                <div class="icono" id="open">
                    <span>&#9776;</span>
                </div>
            </div>
        </nav>
        <div class="textos">
            <h1>Ecology</h1>
            <h2>El futuro esta en nuestras manos</h2>
        </div>
    </header>
    <main>
        <section class="team contenedor" id="equipo">
            <h3>Nuestro equipo</h3>
            <p class="after">Conoce a la gente asombrosa y creativa</p>
            <div class="card">
                <div class="content-card">
                    <div class="people">
                        <img src="img/people1.jpg" alt="">
                    </div>
                    <div class="texto-team">
                        <h4>K</h4>
                        <p>Lorem ipsum dolor sit.</p>
                    </div>
                </div>
                <div class="content-card">
                    <div class="people">
                        <img src="img/people2.jpg" alt="">
                    </div>
                    <div class="texto-team">
                        <h4>C</h4>
                        <p>Lorem ipsum dolor sit.</p>
                    </div>
                </div>
                <div class="content-card">
                    <div class="people">
                        <img src="img/people3.jpg" alt="">
                    </div>
                    <div class="texto-team">
                        <h4>M</h4>
                        <p>Lorem ipsum dolor sit.</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="about" id="servicio">
            <div class="contenedor">
                <h3>Nuestros servicios</h3>
                <p class="after">Siempre mejorando para ti</p>
                <div class="servicios">
                    <div class="caja-servicios">
                        <img src="img/heart.png" alt="">
                        <h4>Creativos y asombrosos</h4>
                        <p>Lorem ipsum dolor sit amet consectetur.</p>
                    </div>
                    <div class="caja-servicios">
                        <img src="img/responsive.png" alt="">
                        <h4>Creativos y asombrosos</h4>
                        <p>Lorem ipsum dolor sit amet consectetur.</p>
                    </div>
                    <div class="caja-servicios">
                        <img src="img/efectos.png" alt="">
                        <h4>Creativos y asombrosos</h4>
                        <p>Lorem ipsum dolor sit amet consectetur.</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="work contenedor" id="trabajo">
            <h3>Nuestro trabajo</h3>
            <p class="after">Hacemos de algo simple algo extraordinario</p>
            <div class="botones-work">
                <ul>
                    <li class="filter active" data-nombre='todos'>Todos</li>
                    <li class="filter" data-nombre='diseño'>Diseño</li>
                    <li class="filter" data-nombre='programacion'>Programacion</li>
                    <li class="filter" data-nombre='marketing'>Marketing</li>
                </ul>
            </div>
            <div class="galeria-work">
                <div class="cont-work programacion">
                    <div class="img-work">
                        <img src="img/programacion1.jpeg" alt="">
                    </div>
                    <div class="textos-work">
                        <h4>Programacion</h4>
                    </div>
                </div>
                <div class="cont-work programacion">
                    <div class="img-work">
                        <img src="img/programacion2.jpeg" alt="">
                    </div>
                    <div class="textos-work">
                        <h4>Programacion</h4>
                    </div>
                </div>
                <div class="cont-work programacion">
                    <div class="img-work">
                        <img src="img/programacion3.jpeg" alt="">
                    </div>
                    <div class="textos-work">
                        <h4>Programacion</h4>
                    </div>
                </div>
                <div class="cont-work diseño">
                    <div class="img-work">
                        <img src="img/diseño1.jpeg" alt="">
                    </div>
                    <div class="textos-work">
                        <h4>Diseño</h4>
                    </div>
                </div>
                <div class="cont-work diseño">
                    <div class="img-work">
                        <img src="img/diseño2.jpeg" alt="">
                    </div>
                    <div class="textos-work">
                        <h4>Diseño</h4>
                    </div>
                </div>
                <div class="cont-work diseño">
                    <div class="img-work">
                        <img src="img/diseño3.jpeg" alt="">
                    </div>
                    <div class="textos-work">
                        <h4>Diseño</h4>
                    </div>
                </div>
                <div class="cont-work marketing">
                    <div class="img-work">
                        <img src="img/marketing1.jpeg" alt="">
                    </div>
                    <div class="textos-work">
                        <h4>Marketing</h4>
                    </div>
                </div>
                <div class="cont-work marketing">
                    <div class="img-work">
                        <img src="img/marketing2.jpeg" alt="">
                    </div>
                    <div class="textos-work">
                        <h4>Marketing</h4>
                    </div>
                </div>
                <div class="cont-work marketing">
                    <div class="img-work">
                        <img src="img/marketing3.jpeg" alt="">
                    </div>
                    <div class="textos-work">
                        <h4>Marketing</h4>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <footer id="contacto">
        <div class="footer contenedor">
            <div class="marca-logo">
                <img src="img/logo.png" alt="">
            </div>
            <div class="iconos">
                <i class="fab fa-youtube"></i>
                <i class="fab fa-facebook-square"></i>
                <i class="fab fa-github"></i>
            </div>
            <p>La pasión e innovación es lo que nos distingue del resto</p>
        </div>

    </footer>
    <script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/main1.js') }}"></script>
    <script src="{{ asset('js/filtro.js') }}"></script>
</body>
</html>