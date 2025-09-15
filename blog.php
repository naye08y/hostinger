
<?php
session_start();
require 'php/confi.php';
require 'confi/database.php';
$db = new Database();
$con = $db->conectar();
?>

<html lang="es">

<head>
    <link href="icono.ico" type="image/x-icon" rel="shortcut icon" />
    <title>Blog de skincare</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Lora:wght@400;600&family=Poppins:wght@600&display=swap" rel="stylesheet">

    <link rel=" shortcut icon" href="img/logotipo_araceli.png" type="image/x-icon">
    <script src="js-global/FancyZoom.js" type="text/javascript"></script>
    <script src="js-global/FancyZoomHTML.js" type="text/javascript"></script>
    <script src="https://kit.fontawesome.com/7f4ac6925c.js" crossorigin="anonymous"></script>

    <script type="text/javascript" src="librerias/jquery.js"></script>
    <script type="text/javascript" src="js/main-scripts.js"> </script>

    <style>
        .gallery img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .gallery {
            width: 85%;
            max-width: 1200px;
            margin-left: auto;
            margin-right: auto;

            display: grid;
            grid-template-columns: repeat(auto-fit, 133px);
            grid-auto-rows: 250px;
            justify-content: center;
            gap: 1rem;
        }

        .gallery_item {
            clip-path: polygon(50% 0%, 100% 25%, 100% 75%, 50% 100%, 0% 75%, 0% 25%);
            grid-column: span 2;
            height: 238px;
            transition: 0.5s filter;
        }


        .gallery_item hover {
            filter: brightness(0.3);
        }

        .gallery_item :first-of-type {
            grid-column: 2 / span 2;
        }



        @media screen and (min-width: 270px) and (max-width: 504px) {
            .gallery_item :first-of-type {
                grid-column: 1 / span 2;
            }

            .gallery {
                grid-auto-rows: 283px;
            }

        }

        @media screen and (min-width: 505px) and (max-width: 685px) {
            .gallery_item :nth-of-type(add) {
                grid-column: 2 / span 2;
            }

        }

        @media screen and (min-width: 686px) and (max-width: 862px) {
            .gallery_item :nth-of-type(3n+1) {
                grid-column: 2 / span 2;
            }

        }

        @media screen and (min-width: 863px) and (max-width: 1038px) {
            .gallery_item :nth-of-type(4n+1) {
                grid-column: 2 / span 2;
            }

        }

        @media screen and (min-width: 1039px) and (max-width: 1215px) {
            .gallery_item :nth-of-type(4n+1) {
                grid-column: 2 / span 2;
            }

        }

        @media screen and (min-width: 1216px) and (max-width: 1372) {
            .gallery_item :nth-of-type(5n+1) {
                grid-column: 2 / span 2;
            }

        }

        @media screen and (min-width: 1372px) {
            .gallery_item :nth-of-type(7n+1) {
                grid-column: 2 / span 2;
            }

        }

        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }



        @import url('https://fonts.googleapis.com/css?family=Abel|Abril+Fatface|Alegreya|Arima+Madurai|Dancing+Script|Dosis|Merriweather|Oleo+Script|Overlock|PT+Serif|Pacifico|Playball|Playfair+Display|Share|Unica+One|Vibur');

        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        .section2 {
            min-height: 100vh;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: transparent;
            padding: 50px;
            position: relative;
            overflow: hidden;
        }

        .section2::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            background: rgba(0, 0, 0, 0.6);
            opacity: 0;
            transition: all 0.4s ease;
        }

        .section2 .active::before {
            opacity: 1;
        }

        .container2 {
            max-width: 800px;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            background: #fff;
            padding: 5px 10px;
            position: relative;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.5);
        }

        .section2 .active .container2 {
            visibility: hidden;
        }





        .zoom {
            transition: transform .2s;
        }

        .zoom:hover {
            transform: scale(0.5);
        }



        .jumbotron {
            color: #284738;
            background: #dce2df;
            align-items: center;
            height: 150px;

        }

        .evento {

            font-size: 65px;
            font-family: 'Playfair Display', serif;
            color: #CC6645;
            padding: 10px;


        }

        .p {
            font-size: 25px;
            font-family: 'Playfair Display', serif;
            color: #333;
            align-items: center;

        }

        .navbar-inverse {
            background: #284738;
        }

        .navbar-inverse .navbar-nav>li>a {
            color: #e0fff0;
        }

        .navbar-inverse .navbar-brand {
            color: #e0fff0;
        }

        .flex {
            display: flex;
            flex-wrap: wrap;
        }

        /* Inicio de los estilos para el blog */
         .section-title {
    font-family: 'Poppins', sans-serif;
    font-size: 3rem;
    color: #a3684a;
    font-weight: 600;
    margin-bottom: 30px;
    text-align: center;
  }

  .subheading {
    font-family: 'Poppins', sans-serif;
    font-size: 1.8rem;
    color: #694c41;
    margin-top: 30px;
    margin-bottom: 15px;
  }

  .skincare-text {
    font-family: 'Lora', serif;
    font-size: 1.25rem;
    line-height: 2;
    color: #4b3a36;
    margin-bottom: 15px;
  }

  .container-box {
    background-color: #fffaf7;
    padding: 30px;
    margin-bottom: 50px;
    border-radius: 20px;
    box-shadow: 0 8px 25px rgba(163, 104, 74, 0.15);
  }

  video {
    border-radius: 20px;
    width: 100%;
    margin: 20px 0;
  }

  .decorations {
    display: flex;
    justify-content: space-around;
    flex-wrap: wrap;
    gap: 15px;
    margin-top: 20px;
  }

  .decorations img {
    width: 80px;
    height: auto;
    animation: float 4s ease-in-out infinite;
  }

  @keyframes float {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-10px); }
  }
        /* Fin de los estilos para el blog */


    </style>
<style>
/* Navegación principal */
#navegacion {
    background-color: #ffffff; /* fondo blanco */
    font-family: 'Poppins', sans-serif; /* tipografía elegante y moderna */
    font-weight: 700; /* más negrita */
    box-shadow: 0 2px 5px rgba(0,0,0,0.1); /* sombra sutil */
    padding: 1rem;
}

/* Botones dentro de la navegación: borde verde, fondo transparente */
#navegacion .btn {
    background-color: transparent; /* sin fondo */
    color: #5f9e6dff; /* verde para texto y borde */
    border: 2px solid #5f9e6dff; /* borde verde */
    padding: 0.5rem 1.2rem;
    font-weight: 600;
    border-radius: 8px;
    transition: all 0.3s ease;
    font-family: 'Poppins', sans-serif;
}

/* Efecto hover: relleno verde pastel y texto blanco */
#navegacion .btn:hover {
    background-color: #a8d5ba; /* verde pastel */
    color: #fff; /* texto blanco */
    transform: scale(1.05);
    border-color: #a8d5ba;
}

/* Badge de carrito */
#navegacion #num_cart {
    background-color: #000; /* fondo negro */
    color: #fff; /* texto blanco */
    padding: 2px 6px;
    border-radius: 50%;
    font-size: 0.8rem;
    vertical-align: top;
}

/* Alineación para el botón de Buscar (text-end) y Mi Carrito */
#navegacion .text-end {
    display: inline-block;
    margin-right: 10px;
}

/* Responsive para móviles */
@media (max-width: 576px) {
    #navegacion {
        text-align: center;
    }
    #navegacion .text-end {
        display: block;
        margin: 0.5rem 0;
    }
}

/* Navbar fijo arriba */
#navegacion {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    z-index: 9999;
    transition: top 0.3s;
}
</style>
</head>

<body onLoad="setupZoom()">
    <!--
Encabezado de la página */
        */banner, menu, carrusel, cuadro iniciar, cuadro fechas, -->

    <!-- Barra de menu -->
    <nav  id="navegacion" class="p-3 text-dark" class="navbar" style="background-color: white">

        <!-----Nav con fondo de color y letras blancas
<header class="p-3 text-white" style="background-color:  #CC6645;"> --->
        <div class="container-fluid">
            <div class="d-flex align-items-center justify-content-between flex-wrap">
                <a href="index.php" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
                    <img src="img/logotipo_araceli.png" width="150" height="200" alt="" title="Página Principal">
                </a>

                <ul class="nav me-auto mb-2 mb-md-0">

                    <li><a href="index.php" class="nav-link px-3 text" 
                    style="color: #000000ff; display:inline; border-right: 2px solid  #36642fff">INICIO</a>
                    </li>


                    <li>
                        <a class="nav-link dropdown-toggle" 
                        style=" color:#000000ff; display:inline;  border-right: 2px solid  #36642fff" href=" #" id="navbarDropdown" 
                        role="button" data-bs-toggle="dropdown" aria-expanded="false">PRODUCTOS</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" style="color: #000000ff;" href="productos_herbales.php">Herbales</a></li>
                            <li><a class="dropdown-item" style="color: #000000ff;" href="productos_nutricionales.php">Nutricionales</a></li>
                            <li><a class="dropdown-item" style="color: #000000ff;" href="productos_nutricosmeticos.php">Nutricosmenticos</a></li>
                        </ul>
                    </li>
                   <li><a href="blog.php" class="nav-link px-3 text" style="color: #000000ff; display:inline; border-right: 2px solid  #36642fff;">BLOG</a>
                    </li>

                    <li><a href="conocenos.php" class="nav-link px-3 text" style=" color: #000000ff; display:inline; ">ACERCA
                            DE</a></li>

                </ul>

                <form class="mb-3 mb-lg-0 me-lg-3">
                    <input type="search" class="form-control form-control-dark" placeholder="Buscar..." aria-label="Search" id="idbusqueda">

                </form>
                <div class="text-end">
                    <button type="button" class="btn" onclick="search_producto()">Buscar</button>
                </div>

                <a href="carrito.php" class="btn" style="font-family:'Monserrat', sans-serif;">
                    Mi Carrito <span style="background:#000000ff; color:white;" id="num_cart" class="badge text-bg-secondary"><?php echo $num_cart; ?></span>
                </a>
                <div class="dropdown text-end">
                    <ul class="nav me-auto mb-2 mb-md-0">


                        <?php
                        if (isset($_SESSION['permiso'])) {
                            if ($_SESSION['permiso'] == 1) {
                                echo
                                '<li>
              <a class="nav-link dropdown-toggle" style="font-family:Monserrat, sans-serif; color:#000000ff; " href="#"
                id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="img/usuario.png" width="25" height="25" title="Cuenta">' . $_SESSION['nombre'] .
                                    '</a>
            <ul class="dropdown-menu text-small" style=" font-family:Monserrat, sans-serif;  color: #000000ff;">
             <li><a class="dropdown-item" style=" font-family:Monserrat, sans-serif;  color: #000000ff;" disbled>Cliente...</a></li>
             <li><a class="dropdown-item" style=" font-family:Monserrat, sans-serif;  color: #000000ff;" href="perfil.php"> Mi Perfil</a></li>
             <hr class="dropdown-divider" style="color: #f0cea5">
             <li><a class="dropdown-item" style=" font-family:Monserrat, sans-serif;  color: #000000ff;" href="destroySesion.php">Cerrar Sesión</a></li>';
                            }
                            if ($_SESSION['permiso'] == 2) {
                                echo
                                '<li>
            <a class="nav-link dropdown-toggle" style="font-family:Monserrat, sans-serif; color:#000000ff; " href="#"
              id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="img/usuario.png" width="25" height="25" title="Cuenta">' . $_SESSION['nombre'] .
                                    '</a>
          <ul class="dropdown-menu text-small" style=" font-family:Monserrat, sans-serif;  color: #000000ff;">
           <li><a class="dropdown-item" style=" font-family:Monserrat, sans-serif;  color: #000000ff;" disbled>Empleado...</a></li>
           <li><a class="dropdown-item" style=" font-family:Monserrat, sans-serif;  color: #000000ff;" href="Menu_empleado.php">Menú Empleado</a></li>
           <li><a class="dropdown-item" style=" font-family:Monserrat, sans-serif;  color: #000000ff;" href="perfil.php"> Mi Perfil</a></li>
           <hr class="dropdown-divider" style="color: #f0cea5">
           <li><a class="dropdown-item" style=" font-family:Monserrat, sans-serif;  color: #000000ff;" href="destroySesion.php">Cerrar Sesión</a></li>';
                            }
                            if ($_SESSION['permiso'] == 3) {
                                echo
                                '<li>
          <a class="nav-link dropdown-toggle" style="font-family:Monserrat, sans-serif; color:#000000ff; " href="#"
            id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="img/usuario.png" width="25" height="25" title="Cuenta">' . $_SESSION['nombre'] .
                                    '</a>
        <ul class="dropdown-menu text-small" style=" font-family:Monserrat, sans-serif;  color: #000000ff;">
         <li><a class="dropdown-item" style=" font-family:Monserrat, sans-serif;  color: #000000ff;" disbled>Administrador...</a></li>
         <li><a class="dropdown-item" style=" font-family:Monserrat, sans-serif;  color: #000000ff;" href="MenuAdmn.php">Menú Administrador</a></li>
         <li><a class="dropdown-item" style=" font-family:Monserrat, sans-serif;  color: #000000ff;" href="perfil.php"> Mi Perfil</a></li>
         <hr class="dropdown-divider" style="color: #f0cea5">
         <li><a class="dropdown-item" style=" font-family:Monserrat, sans-serif;  color: #000000ff;" href="destroySesion.php">Cerrar Sesión</a></li>';
                            }
                        } else {
                        ?>
                            <li>
                                <a class="nav-link dropdown-toggle" style="font-family:'Monserrat', sans-serif; color:#000000ff; " href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="img/usuario.png" width="25" height="25" title="Cuenta">
                                </a>

                                <ul class="dropdown-menu text-small" style=" font-family:'Monserrat', sans-serif;  color: #000000ff;">
                                    <li><a class="dropdown-item" style=" font-family:'Monserrat', sans-serif;  color: #000000ff;" href="inicioSesion.php">Iniciar Sesión</a></li>
                                    <hr class="dropdown-divider" style="color: #f0cea5">
                                    <li><a class="dropdown-item" style=" font-family:'Monserrat', sans-serif;  color: #000000ff;" href="registro.php">Crear Cuenta</a></li>
                                <?php
                            }
                                ?>
                                </ul>
                            </li>
                    </ul>
                </div>
            </div>

        </div>
        
    </nav>
    <!--Inicio del blog   -->

   <section class="content-section text-dark" id="skincare">
  <div class="container px-4 px-lg-5">
    <h2 class="section-title">Blog de Skincare & Autocuidado</h2>

    <!-- Qué es el skincare -->
    <div class="container-box">
      <h3 class="subheading">¿Qué es el Skincare?</h3>
      <p class="skincare-text">
        El skincare es el arte de cuidar nuestra piel con productos y rutinas que se adaptan a nuestras necesidades. No es solo vanidad, es salud. Involucra limpieza, hidratación, protección solar y nutrición, con constancia diaria.
      </p>
      <p class="skincare-text">
        Además, es una forma de autocuidado emocional: reservar unos minutos para ti, aplicar un jabón artesanal con aroma a lavanda o usar un rodillo facial, puede marcar la diferencia en tu bienestar.
      </p>
      <video autoplay muted loop playsinline>
        <source src="mp4/video2_blog.mp4" type="video/mp4">
      </video>
    </div>

    <!-- Tipos de piel -->
    <div class="container-box">
      <h3 class="subheading">Tipos de Piel</h3>
      <p class="skincare-text"><strong>Piel grasa:</strong> Brillosa, propensa al acné. Usa jabones artesanales con arcilla y tónicos sin alcohol.</p>
      <p class="skincare-text"><strong>Piel seca:</strong> Tirantez, escamas. Requiere sérums con ácido hialurónico y aceites como argán o almendra.</p>
      <p class="skincare-text"><strong>Piel mixta:</strong> Frente y nariz oleosas, mejillas secas. Alterna productos según la zona.</p>
      <p class="skincare-text"><strong>Piel sensible:</strong> Se enrojece fácilmente. Usa productos calmantes como aloe vera y evita exfoliantes fuertes.</p>
      <video autoplay muted loop playsinline>
        <source src="mp4/video1_blog.mp4" type="video/mp4">
      </video>
    </div>

    <!-- Rutina recomendada -->
    <div class="container-box">
      <h3 class="subheading">Rutina Diaria Recomendada</h3>
      <p class="skincare-text">
        <strong>Mañana:</strong> Limpia con jabón natural, aplica un tónico, un sérum con vitamina C, y protector solar. No olvides el cuello.
      </p>
      <p class="skincare-text">
        <strong>Noche:</strong> Desmaquilla, limpia con un jabón de carbón activado, aplica rodillo para ojeras y sérum nutritivo. Finaliza con crema de noche.
      </p>
      <video autoplay muted loop playsinline>
        <source src="mp4/video4_blog.mp4" type="video/mp4">
      </video>
    </div>

    <!-- Tips adicionales -->
    <div class="container-box">
      <h3 class="subheading">Tips de Belleza Natural</h3>
      <p class="skincare-text">
        ✅ Hazte una exfoliación 1 vez por semana. <br>
        ✅ Usa protector solar aunque esté nublado. <br>
        ✅ El masaje con rodillos de jade activa la circulación. <br>
        ✅ Dormir bien también mejora tu piel.
      </p>
      <video autoplay muted loop playsinline>
        <source src="mp4/video3_blog.mp4" type="video/mp4">
      </video>

      <!-- Imágenes decorativas -->
      <div class="decorations">
        <img src="img/blog/estrella.png" alt="Estrella decorativa">
        <img src="img/blog/amor.png" alt="Corazón decorativo">
        <img src="img/blog/estrella.png" alt="Estrella decorativa 2">
        <img src="img/blog/amor.png" alt="Corazón decorativo 2">
      </div>
    </div>
  </div>
</section>
   
   <!-- Fin del blog -->
    
    <!--Creditos  -->
   <?php
require 'creditos.php';
?>

<script>
const navbar = document.getElementById('navegacion');
const body = document.body;
let lastScroll = 0;
const threshold = 15; // píxeles mínimos de scroll para activar

// Función para ajustar padding del body según altura del navbar
function ajustarPaddingNavbar() {
  body.style.paddingTop = navbar.offsetHeight + 'px';
}

// Ejecutar al cargar la página y al redimensionar ventana
window.addEventListener('load', ajustarPaddingNavbar);
window.addEventListener('resize', ajustarPaddingNavbar);

// Scroll: ocultar/mostrar navbar
window.addEventListener('scroll', () => {
  const currentScroll = window.pageYOffset;

  // Scroll pequeño no hace nada
  if (Math.abs(currentScroll - lastScroll) < threshold) return;

  if (currentScroll <= 0) {
    navbar.style.top = '0';
    lastScroll = 0;
    return;
  }

  if (currentScroll > lastScroll) {
    // Scroll hacia abajo → ocultar navbar
    navbar.style.top = `-${navbar.offsetHeight}px`;
  } else {
    // Scroll hacia arriba → mostrar navbar
    navbar.style.top = '0';
  }

  lastScroll = currentScroll;
});
</script>
  
<!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
  integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
 

</body>

</html>