
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ecology</title>
    <link href="{{ asset('css/estilos.css') }}" rel="stylesheet">
    <link rel="shortcut icon" type="text/css" href="{{asset('img/logo.png')}} ">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Lobster&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Hind+Siliguri&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@700&display=swap" rel="stylesheet">
</head>

<body class="hidden">
    <header>
        <nav id="nav" class="nav1">
            <div class="contenedor-nav">
                <div class="logo">
                <!--    <h1>Eco<span>logy</span></h1>-->
                </div>
                <div class="enlaces" id="enlaces">
                        <a href="#" id="enlace-inicio" class="btn-header">Inicio</a>
                        <a href="#" id="enlace-equipo" class="btn-header">Equipo</a>
                        <a href="#" id="enlace-servicio" class="btn-header">Nosotros</a>
                        <a href="#" id="enlace-contacto" class="btn-header">Contacto</a>
                        <a href="{{ route('login')}}"  class="btn-header">Iniciar Sesión</a>
                </div>
                <div class="icono" id="open">
                    <span>&#9776;</span>
                </div>
            </div>
        </nav>
        <div class="textos">
            <h1>Eco<span>logy</span></h1>
            <h2>La creación de mil bosques está en una bellota</h2>
        </div>
    </header>
    <main>


        <section class="team contenedor" id="equipo">
            <h3>Nuestro equipo</h3>
            <p class="after">Conoce a la gente asombrosa y creativa</p>
            <div class="card">
                <div class="content-card">
                    <div class="people">
                        <img src="img/Evelyn.png" alt="">
                    </div>
                    <div class="texto-team">
                        <h4>E</h4>
                        <p class="verdecito" >Evelyn Juliana Usuga Fernadez</p>
                    </div>
                </div>
                <div class="content-card">
                    <div class="people">
                        <img src="img/Juanda.png" alt="">
                    </div>
                    <div class="texto-team">
                        <h4>J</h4>
                        <p class="verdecito" >Juan David Osorio Bedoya</p>
                    </div>
                </div>
                <div class="content-card">
                    <div class="people">
                        <img src="img/Muriel.png" alt="">
                    </div>
                    <div class="texto-team">
                        <h4>M</h4>
                        <p class="verdecito" >Julián Andres Muriel Herrera</p>
                    </div>
                </div>
                <div class="content-card">
                    <div class="people">
                        <img src="img/Osorio.png" alt="">
                    </div>
                    <div class="texto-team">
                        <h4>J</h4>
                        <p class="verdecito" >Julián David Osorio Villegas</p>
                    </div>
                </div>
            </div>
        </section>


        <section class="about" id="servicio">
            <div class="contenedor">
                <h3 class="NuServicios">Ecology</h3>
                <p class="after NuServicios">tiene como finalidad concientizar a las instituciones acerca de la adecuada clasificación de los residuos sólidos</p>
                <div class="servicios">
                    <div class="caja-servicios circuloIMG">
                        <img src="img/logo.png" alt="" width="200">
                        <!--<h4>Ecology</h4>
                        <p class="MVecology">Ecology</p>-->
                    </div>
                    <div class="caja-servicios">
                        <!--img src="img/responsive.png" alt=""-->
                        <h4>Misión</h4>
                        <p class="MVecology">Somos una empresa dedicada a ofrecer las mejores manualidades destacando nos por nuestros diseños únicos, brindando variedad a nuestros clientes y otorgándoles derecho a crear y escoger el valor agregado a nuestro servicio, generando una mayor confianza en nuestro cliente</p>
                    </div>
                    <div class="caja-servicios">
                        <!--img src="img/efectos.png" alt=""-->
                        <h4>Visión</h4>
                        <p class="MVecology">Ser una empresa líder y reconocida en el mercado de manualidades destacando nos por la excelencia y calidad en nuestros productos, logrando fortalecer nuestra empresa</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="work contenedor" id="trabajo">

            <h3>Noticias</h3>
            <p class="after">Nunca la sabiduría dice una cosa y la naturaleza otra</p>
            <div class="galeria-work">

                @foreach ($noticias as $datos)
                
                <div class="cont-work programacion">
                    <div class="img-work">
                        <img src="{{asset('storage').'/'.$datos->foto}}" alt="">
                    </div>
                    <div class="textos-work">
                        <a href="{{ route('vista.noticia',$datos->id) }}"><h4>{{$datos->titulo}}</h4></a>
                    </div>
                </div>
                
                @endforeach

            </div>
            
        </section>
    </main>
    <footer id="contacto">
        <div class="footer contenedor">
            <div class="logo">
                <h1>Contact <span>Us</span></h1>
                <!--<img src="img/logo.png" alt="">-->
            </div>
            <div class="iconos">
                <i class="fab fa-youtube"></i>
                <i class="fab fa-facebook-square"></i>
                <i class="fab fa-github"></i>
            </div>
            <p><i>Tú opinión es un paso más para la perfección</i> </p>
        </div>

    </footer>
    <script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/main1.js') }}"></script>
    <script src="{{ asset('js/filtro.js') }}"></script>
</body>
</html>
