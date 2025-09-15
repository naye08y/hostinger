<?php
session_start();
require 'php/confi.php';
require 'confi/database.php';
$db = new Database();
$con = $db->conectar();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Araceli y algo más</title>

  <!--REFERENCIAR LIBRERIAS-->
  <link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/alertify.css">
  <link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/themes/default.css">
  <link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script>

    <link rel="shortcut icon" href="img/logotipo_araceli.png">

    <link rel="stylesheet" href="estilos/estilosLinea.css">
    
    <script type="text/javascript" src="librerias/jquery.js"></script>
    <script type="text/javascript" src="js/main-scripts.js"> </script>

    <style>
    @import url('https://fonts.googleapis.com/css?family=Abel|Abril+Fatface|Alegreya|Arima+Madurai|Dancing+Script|Dosis|Merriweather|Oleo+Script|Overlock|PT+Serif|Pacifico|Playball|Playfair+Display|Share|Unica+One|Vibur');

    H2 {
      font-size: 45px;
      text-align: center;
      font-family: 'Playfair Display', serif;
      color: #050505ff;
      text-decoration: underline;
    }

    H3 {
      font-family: 'Dancing Script', cursive;
      /* */
      font-size: 40px;
    }

    h4 {
      font-family: 'Monserrat', sans-serif;
      font-size: 25px;
      text-align: center;
    }
      .zoom {

        transform: scale(var(--escala, 1));
        transition: transform 0.8s;
      }

      .zoom:hover {
        --escala: 1.5;
        cursor: pointer;
      }

      .puzzle-img {
    border-radius: 10px;
    cursor: pointer;
    transition: transform 0.4s;
  }

  .puzzle-img:hover {
    transform: rotate(-2deg) scale(1.05);
  }

  .popup {
    display: none;
    position: fixed;
    z-index: 9999;
    padding-top: 60px;
    left: 0; top: 0;
    width: 100%; height: 100%;
    overflow: auto;
    background-color: rgba(0,0,0,0.8);
  }

  .popup-content {
    margin: auto;
    display: block;
    max-width: 80%;
    max-height: 80vh;
  }

  .close {
    position: absolute;
    top: 15px;
    right: 35px;
    color: white;
    font-size: 40px;
    font-weight: bold;
    cursor: pointer;
  }

.content.price {
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  background-image: url('img/banner_skincare.png');
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
}

.zoom img:hover {
  transform: scale(1.1);
}

.img2 img {
  max-width: 100%;
  height: auto;
}

/* Carrusel full-width */
#carouselExampleCaptions {
    width: 100vw;                /* ocupa todo el ancho de la ventana */
    margin-left: calc(-50vw + 50%); /* centrado correcto */
}

/* Imágenes del carrusel */
#carouselExampleCaptions .carousel-item img {
    width: 100%;                 /* ocupa todo el contenedor */
    height: auto;                /* mantiene proporción */
    max-height: 550px;           /* altura máxima en desktop */
    object-fit: cover;           /* recorta sin deformar */
    transition: all 0.5s ease-in-out;
}

/* Ajuste para móviles */
@media (max-width: 768px) {
    #carouselExampleCaptions .carousel-item img {
        max-height: 300px;       /* altura más manejable en móviles */
    }
}
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
<body>

<!--Header -->
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
            style=" color:#000000ff; display:inline;  border-right: 2px solid  #36642fff"  href=" #"
            id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            PRODUCTOS
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown" >
            <li><a class="dropdown-item" style="color: #000000ff;" href="productos_herbales.php">Herbales</a></li>
            <li><a class="dropdown-item" style="color: #000000ff;" href="productos_nutricionales.php">Nutricionales</a></li>
            <li><a class="dropdown-item" style="color: #000000ff;" href="productos_nutricosmeticos.php">Nutricosmenticos</a></li>
          </ul>
        </li>
       <li><a href="blog.php" class="nav-link px-3 text"
            style="color: #000000ff; display:inline; border-right: 2px solid  #36642fff;">BLOG</a>
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
        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0"
         >
            <?php
              if (isset ($_SESSION['permiso'])){
                if($_SESSION['permiso']==1){
                echo
                '<li>
                <a class="nav-link dropdown-toggle" style="font-family:Monserrat, sans-serif; color:#000000ff; " href="#"
                  id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <img src="img/usuario.png" width="25" height="25" title="Cuenta">'.$_SESSION['nombre'].
              '</a>
              <ul class="dropdown-menu text-small" style=" font-family:Monserrat, sans-serif;  color: #000000ff;">
               <li><a class="dropdown-item" style=" font-family:Monserrat, sans-serif;  color: #000000ff;" disbled>Cliente...</a></li>
               <li><a class="dropdown-item" style=" font-family:Monserrat, sans-serif;  color: #000000ff;" href="perfil.php"> Mi Perfil</a></li>
               <hr class="dropdown-divider" style="color: #f0cea5">
               <li><a class="dropdown-item" style=" font-family:Monserrat, sans-serif;  color: #000000ff;" href="destroySesion.php">Cerrar Sesión</a></li>';
            }if($_SESSION['permiso']==2){
              echo
              '<li>
              <a class="nav-link dropdown-toggle" style="font-family:Monserrat, sans-serif; color:#000000ff; " href="#"
                id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="img/usuario.png" width="25" height="25" title="Cuenta">'.$_SESSION['nombre'].
            '</a>
            <ul class="dropdown-menu text-small" style=" font-family:Monserrat, sans-serif;  color: #000000ff;">
             <li><a class="dropdown-item" style=" font-family:Monserrat, sans-serif;  color: #000000ff;" disbled>Empleado...</a></li>
             <li><a class="dropdown-item" style=" font-family:Monserrat, sans-serif;  color: #000000ff;" href="Menu_empleado.php">Menú Empleado</a></li>
             <li><a class="dropdown-item" style=" font-family:Monserrat, sans-serif;  color: #000000ff;" href="perfil.php"> Mi Perfil</a></li>
             <hr class="dropdown-divider" style="color: #f0cea5">
             <li><a class="dropdown-item" style=" font-family:Monserrat, sans-serif;  color: #000000ff;" href="destroySesion.php">Cerrar Sesión</a></li>';
          }if($_SESSION['permiso']==3){
            echo
            '<li>
            <a class="nav-link dropdown-toggle" style="font-family:Monserrat, sans-serif; color:#000000ff; " href="#"
              id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="img/usuario.png" width="25" height="25" title="Cuenta">'.$_SESSION['nombre'].
          '</a>
          <ul class="dropdown-menu text-small" style=" font-family:Monserrat, sans-serif;  color: #000000ff;">
           <li><a class="dropdown-item" style=" font-family:Monserrat, sans-serif;  color: #000000ff;" disbled>Administrador...</a></li>
           <li><a class="dropdown-item" style=" font-family:Monserrat, sans-serif;  color: #000000ff;" href="MenuAdmn.php">Menú Administrador</a></li>
           <li><a class="dropdown-item" style=" font-family:Monserrat, sans-serif;  color: #000000ff;" href="perfil.php"> Mi Perfil</a></li>
           <hr class="dropdown-divider" style="color: #f0cea5">
           <li><a class="dropdown-item" style=" font-family:Monserrat, sans-serif;  color: #000000ff;" href="destroySesion.php">Cerrar Sesión</a></li>';
        }
          }else{
                ?>
          <li>
            <a class="nav-link dropdown-toggle" style="font-family:'Monserrat', sans-serif; color:#000000ff; " href="#"
              id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="img/usuario.png" width="25" height="25" title="Cuenta">
            </a>

            <ul class="dropdown-menu text-small" style=" font-family:'Monserrat', sans-serif;  color: #000000ff;">
              <li><a class="dropdown-item" style=" font-family:'Monserrat', sans-serif;  color: #000000ff;" href="inicioSesion.php">Iniciar Sesión</a></li>
              <hr class="dropdown-divider" style="color: #f0cea5">
              <li><a class="dropdown-item" style=" font-family:'Monserrat', sans-serif;  color: #000000ff;" href="registro.php" >Crear Cuenta</a></li>
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

<!-- Carousel -->
<div class="container-fluid p-0">
  <section>
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="img/BANNER2.png" class="d-block w-100 img-fluid">
        </div>
        <div class="carousel-item">
          <img src="img/BANNEREUCALIPTO.png" class="d-block w-100 img-fluid">
        </div>
        <div class="carousel-item">
          <img src="img/BANNERSUPLE.png" class="d-block w-100 img-fluid">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
      </button>
    </div>
  </section>
</div>

<!-- Video Silencioso -->
<section class="video-section mt-5">
  <div class="container">
    <video autoplay muted loop playsinline class="w-100">
      <source src="mp4/presentacion.mp4" type="video/mp4">
      Tu navegador no soporta el video HTML5.
    </video>
  </div>
</section>

<!-- Sección de Categorías -->
<div class="container marketing mt-5">
  <div class="px-4 py-5 text-center">
    <h1 class="display-5 fw-bold" style="color: #070707be;">Hechale un vistazo a</h1>
    <div class="col-lg-6 mx-auto">
      <p class="lead mb-4"></p>
    </div>
    <?php include("categorias.php"); ?>
    <hr class="featurette-divider" style="color: #2f8d26be;" size="2">
  </div>

  <!-- Sección Skincare -->
  <section class="content price">
    <article class="contain mx-auto p-4" style="max-width: 800px; background-color: rgba(0,0,0,0.4); border-radius: 1rem;">
      <h2 class="display-1 text-white" style="font-family: 'Playfair Display', serif; text-shadow: 2px 2px 4px rgba(0,0,0,0.6);">¿Eres fan del skincare?</h2>
      <h3 class="display-3 text-white text-center" style="text-shadow: 2px 2px 4px rgba(0,0,0,0.6);">Tu nueva rutina de cuidado aquí</h3>
      <div class="zoom text-center mt-3">
        <a class="img2" href="blog.php">
          <img src="img/gotero.png" width="70" height="70">
        </a>
      </div>
    </article>
  </section>

  <!-- Featurette Jabones -->
  <div class="container marketing mt-5">
    <div class="row featurette align-items-center">
      <div class="col-md-7 order-md-1">
        <h2 class="featurette-heading">Los famosisimos jabones artesanales</h2>
        <p class="lead">Están contenidos en cajas elaboradas con papel ecológico fácil de reciclar y con un diseño increíble, y con mensajes especialmente pensados en ti. ¡Conócelos!</p>
        <p><a class="btn btn-dark fs-5" href="#">Visitarlos &raquo;</a></p>
      </div>
      <div class="col-md-5 order-md-2">
        <img src="img/banner_jabones.png" class="img-fluid rounded mx-auto d-block" alt="Jabones">
      </div>
    </div>
  </div>

  <!-- Galería tipo Rompecabezas -->
  <section class="rompecabezas-gallery mt-5">
    <div class="container text-center">
      <h2 class="mb-4" style="font-family: 'Playfair Display', serif; color: #0f0f0fff;">Una lectura rápida</h2>
      <div class="row g-3 justify-content-center">
        <div class="col-6 col-md-4 col-lg-3"><img src="img/flotar1.png" class="img-fluid puzzle-img" onclick="openPopup(this.src)"></div>
        <div class="col-6 col-md-4 col-lg-3"><img src="img/flotar2.png" class="img-fluid puzzle-img" onclick="openPopup(this.src)"></div>
        <div class="col-6 col-md-4 col-lg-3"><img src="img/flotar3.png" class="img-fluid puzzle-img" onclick="openPopup(this.src)"></div>
        <div class="col-6 col-md-4 col-lg-3"><img src="img/flotar4.png" class="img-fluid puzzle-img" onclick="openPopup(this.src)"></div>
        <div class="col-6 col-md-4 col-lg-3"><img src="img/flotar5.png" class="img-fluid puzzle-img" onclick="openPopup(this.src)"></div>
      </div>
    </div>
  </section>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>


  <!-- Popup -->
  <div id="popup" class="popup" onclick="closePopup()">
    <span class="close">&times;</span>
    <img class="popup-content" id="popup-img">
  </div>
</section>

<script>
  function openPopup(src) {
    document.getElementById("popup").style.display = "block";
    document.getElementById("popup-img").src = src;
  }

  function closePopup() {
    document.getElementById("popup").style.display = "none";
  }
</script>



<!--Creditos -->
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


    </div>
  </footer>
</body>

</html>