<?php
session_start();
require 'php/confi.php'
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Conoceme</title>

  <!--REFERENCIAR LIBRERIAS-->
  <link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/alertify.css">
  <link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/themes/default.css">
  <link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

 <!-- Core theme CSS (includes Bootstrap)-->
 <link rel="shortcut icon" href="img/logotipo_araceli.png">
    <script src="https://kit.fontawesome.com/7f4ac6925c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="estilos/estilosDesarrolladoras.css">

    <script type="text/javascript" src="librerias/jquery.js"></script>
    <script type="text/javascript" src="js/main-scripts.js"> </script>

  
  <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body {
            height: 900px;
        }

        .header2 {
            background: url('http://www.autodatz.com/wp-content/uploads/2017/05/Old-Car-Wallpapers-Hd-36-with-Old-Car-Wallpapers-Hd.jpg');
            text-align: center;
            width: 100%;
            height: auto;
            background-size: cover;
            background-attachment: fixed;
            position: relative;
            overflow: hidden;
            border-radius: 0 0 85% 85% / 30%;
        }

        .header2 .overlay {
            width: 100%;
            height: 100%;
            padding: 50px;
            color: #FFF;
            text-shadow: 1px 1px 1px #333;
            background-image: linear-gradient(135deg, #CC6645 10%, #fd5e086b 100%);

        }

        h1 {
            font-family: 'Dancing Script', cursive;
            font-size: 80px;
            margin-bottom: 30px;
        }

        h3,
        p {
            font-family: 'Open Sans', sans-serif;
            margin-bottom: 30px;
        }

    
        h2{
             font-family: 'Playfair Display', serif;
             color: #000000ff;

        }
        button:hover {
            cursor: pointer;
        }
        hr{
            color: #CC6645;
        }

        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap');

.herbal-header {
  position: relative;
  height: 300px;
  background: linear-gradient(135deg, #a8d5ba 0%, #d9f2e6 100%);
  overflow: hidden;
  font-family: 'Playfair Display', serif;
  color: #2e4d25;
  text-align: center;
  padding-top: 80px;
}

/* Texto */
.content h1 {
  font-size: 3rem;
  margin-bottom: 0.2em;
  text-shadow: 1px 1px 3px #8aa88f;
}

.content h3 {
  font-size: 1.5rem;
  font-weight: 300;
  text-shadow: 1px 1px 2px #7b9d78;
}

/* Estilo general para hojas */
.leaf {
  position: absolute;
  width: 50px;
  height: 50px;
  background: url('https://upload.wikimedia.org/wikipedia/commons/thumb/e/e6/Leaf_icon.svg/120px-Leaf_icon.svg.png') no-repeat center/contain;
  opacity: 0.7;
  filter: drop-shadow(0 1px 1px rgba(0,0,0,0.15));
  animation-timing-function: linear;
}

/* Animaciones para cada hoja con diferentes trayectorias y tiempos */
.leaf1 {
  top: -60px;
  left: 10%;
  animation: floatDown 12s linear infinite;
  animation-delay: 0s;
  width: 40px; height: 40px;
}

.leaf2 {
  top: -60px;
  left: 30%;
  animation: floatDown 15s linear infinite;
  animation-delay: 3s;
  width: 55px; height: 55px;
}

.leaf3 {
  top: -60px;
  left: 50%;
  animation: floatDown 10s linear infinite;
  animation-delay: 1.5s;
  width: 45px; height: 45px;
}

.leaf4 {
  top: -60px;
  left: 70%;
  animation: floatDown 13s linear infinite;
  animation-delay: 2.5s;
  width: 50px; height: 50px;
}

.leaf5 {
  top: -60px;
  left: 85%;
  animation: floatDown 14s linear infinite;
  animation-delay: 0.8s;
  width: 60px; height: 60px;
}

/* Animación de caída y leve oscilación horizontal */
@keyframes floatDown {
  0% {
    transform: translate(0, -60px) rotate(0deg);
    opacity: 0;
  }
  10% {
    opacity: 0.7;
  }
  50% {
    transform: translate(20px, 150px) rotate(45deg);
    opacity: 1;
  }
  80% {
    transform: translate(-10px, 280px) rotate(90deg);
    opacity: 0.7;
  }
  100% {
    transform: translate(0, 320px) rotate(120deg);
    opacity: 0;
  }
}

/*Inincio de estilos de la seccion de Conoceme */

.body2 {
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 40px;
  background: #f5f5f5;
}

.card {
  background-color: #ffffff;
  border-radius: 16px;
  box-shadow: 0 6px 20px rgba(0,0,0,0.1);
  overflow: hidden;
  max-width: 300px;
  transition: transform 0.4s ease, box-shadow 0.4s ease;
  animation: fadeInUp 0.8s ease forwards;
}

.card:hover {
  transform: translateY(-8px);
  box-shadow: 0 10px 28px rgba(0,0,0,0.15);
}

.card-img img {
  width: 100%;
  height: auto;
  display: block;
  border-bottom: 3px solid #e2e2e2;
}

.card-content {
  padding: 16px;
  text-align: center;
}

.card-content h4 {
  margin: 8px 0 4px;
  font-size: 16px;
  font-weight: 600;
  color: #333;
}

.card-content h6 {
  font-size: 13px;
  font-weight: 500;
  color: #777;
  margin-bottom: 10px;
}

.card-content p {
  font-size: 12px;
  color: #555;
  margin: 3px 0;
}

.social-links {
  margin-top: 12px;
}

.social-links a {
  margin: 0 8px;
  color: #666;
  font-size: 16px;
  transition: color 0.3s ease;
}

.social-links a:hover {
  color: #0077ff;
}

/* Animación de entrada */
@keyframes fadeInUp {
  0% {
    opacity: 0;
    transform: translateY(30px);
  }
  100% {
    opacity: 1;
    transform: translateY(0);
  }
}

/*Fin de estilos de la seccion de Conoceme */

/* Inicio de estilos para la sección de valores */
/* Sección general */
.content-section {
  background-color: #8aa186; /* mantiene tu color */
  padding: 60px 0;
  color: #1a1a1a;
  font-family: 'Poppins', sans-serif;
}

/* Título de la sección */
.section-title {
  font-size: 32px;
  font-weight: 600;
  color: #fff;
  margin-bottom: 30px;
  animation: fadeInDown 0.8s ease;
}

/* Tarjetas de valores */
.value-card {
  background: #ffffff;
  border-radius: 16px;
  padding: 30px 20px;
  margin: 10px;
  box-shadow: 0 8px 24px rgba(0,0,0,0.08);
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  animation: fadeInUp 1s ease forwards;
}

.value-card:hover {
  transform: translateY(-10px);
  box-shadow: 0 12px 32px rgba(0,0,0,0.12);
}

.value-card h3 {
  font-size: 20px;
  font-weight: 600;
  color: #333;
  margin-top: 20px;
}

.value-card p {
  font-size: 14px;
  color: #555;
  margin-top: 10px;
}

.value-card hr {
  width: 30px;
  border: 1px solid #8aa186;
  margin: 12px auto;
}

/* Íconos circulares */
.icon-wrapper {
  width: 100px;
  height: 100px;
  margin: 0 auto;
  overflow: hidden;
  border-radius: 50%;
  background-color: #eaeaea;
  display: flex;
  align-items: center;
  justify-content: center;
}

.icon-wrapper svg {
  width: 60px;
  height: 60px;
  fill: #333;
}

/* Animaciones */
@keyframes fadeInUp {
  from {
    opacity: 0;
    transform: translateY(30px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

@keyframes fadeInDown {
  from {
    opacity: 0;
    transform: translateY(-30px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}


/* Contenedor principal: fila con 2 columnas (valores y video) */
  #services .container-flex {
    display: flex;
    flex-wrap: wrap;
    gap: 2rem;
    align-items: flex-start;
  }

  /* Caja de valores: 4 columnas */
  #services .values-grid {
    flex: 1 1 60%;
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 1.5rem;
  }

  /* Cada tarjeta */
  #services .value-card {
    background: #f9f9f9;
    border-radius: 12px;
    padding: 1.5rem;
    box-shadow: 0 4px 12px rgb(0 0 0 / 0.1);
    transition: transform 0.3s ease;
  }
  #services .value-card:hover {
    transform: translateY(-8px);
  }

  /* Iconos */
  #services .icon-wrapper svg {
    width: 60px;
    height: 60px;
    margin-bottom: 1rem;
    fill: #4b6a4e; /* Verde oscuro */
  }

  /* Títulos */
  #services h3 {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    color: #385734;
    margin-bottom: 0.5rem;
  }

  /* Texto */
  #services p {
    color: #4b4b4b;
    font-size: 0.9rem;
  }

  /* Video container */
  #services .video-wrapper {
    flex: 1 1 35%;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgb(0 0 0 / 0.2);
    max-height: 500px;
  }

  /* Video full width */
  #services .video-wrapper video {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 12px;
  }

  /* Responsivo: en pantallas pequeñas, columna única */
  @media (max-width: 900px) {
    #services .container-flex {
      flex-direction: column;
    }
    #services .values-grid {
      grid-template-columns: repeat(2, 1fr);
      flex-basis: 100%;
    }
    #services .video-wrapper {
      flex-basis: 100%;
      max-height: 250px;
      margin-top: 1.5rem;
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
 
<!-----Nav con fondo blanco y letras negras--->
<nav  id="navegacion" class="p-3 text-dark" class="navbar" style="background-color: white">

<!-----Nav con fondo de color y letras blancas
<header class="p-3 text-white" style="background-color:  #CC6645;"> --->
<div class="container-fluid">
            <div class="d-flex align-items-center justify-content-between flex-wrap">    <a href="index.php" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
      <img src="img/logotipo_araceli.png" width="150" height="200" alt="" title="Página Principal">
    </a>

    <ul class="nav me-auto mb-2 mb-md-0">

      <li><a href="index.php" class="nav-link px-3 text" style="color: #000000ff; display:inline; border-right: 2px solid  #36642fff">INICIO</a>
      </li>


      <li>
        <a class="nav-link dropdown-toggle" style=" color:#000000ff; display:inline;  border-right: 2px solid  #36642fff" href=" #" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          PRODUCTOS
        </a>
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
      <input type="search" class="form-control form-control-dark" placeholder="Buscar..." aria-label="Search">

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
           <li><a class="dropdown-item" style=" font-family:Monserrat, sans-serif;  color: #000000ff;" href="#">Menú Empleado</a></li>
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

<header class="herbal-header">
  <div class="content">
    <h1>¿Quién soy?</h1>
    <h3>Conoce un poco de mi historia</h3>
  </div>
  <!-- Hojas animadas -->
  <div class="leaf leaf1"></div>
  <div class="leaf leaf2"></div>
  <div class="leaf leaf3"></div>
  <div class="leaf leaf4"></div>
  <div class="leaf leaf5"></div>
</header>
    <br>
    <!-- Visión Misión -->
    <!-- Content section 1-->
    <section id="scroll">
        <div class="container px-5">
            <div class="row gx-5 align-items-center">
                <div class="col-lg-6 order-lg-2">
                    <div class="p-5"><img class="img-fluid rounded-circle" src="img/misionA.jpg" alt="..." /></div>
                </div>
                <div class="col-lg-6 order-lg-1">
                    <div class="p-5">
                        <h2 class="display-5" style="  font-family: 'Playfair Display', serif;">MISIÓN</h2>
                        <hr style="color: #000000ff;">
                        <h4 class="fw-lighter">Mi misión es ofrecer productos de catálogo de calidad directamente desde mi página web, brindando atención personalizada, confianza y comodidad a cada cliente. A través de este espacio digital, quiero acercarme más a las personas, compartir mis recomendaciones y facilitar que encuentren lo que necesitan desde casa, con calidez y compromiso.</h4>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Content section 2-->
    <section>
        <div class="container px-5">
            <div class="row gx-5 align-items-center">
                <div class="col-lg-6">
                    <div class="p-5"><img class="img-fluid rounded-circle" src="img/visionA.jpg" alt="..." /></div>
                </div>
                <div class="col-lg-6">
                    <div class="p-5">
                        <h2 class="display-5">VISIÓN</h2>
                        <hr style="color: #0a0909ff;">
                        <h4 class="fw-lighter">Ser una tienda en línea reconocida a nivel local por ofrecer productos de catálogo confiables y de calidad, brindando una experiencia de compra cercana, accesible y personalizada, que permita a más personas mejorar su bienestar desde la comodidad de su hogar.</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Inicio de la seccion de Valores-->
<section class="content-section text-dark text-center" id="services" style="background: #8aa186ff;">
  <div class="container px-4 px-lg-5">
    <div class="content-section-heading">
      <br>
      <h2 class="section-title" style="color: #385734;">Valores</h2>
    </div>
    <br>

    <div class="container-flex">

      <!-- Valores en 4 columnas -->
      <div class="values-grid">
        <!-- Honestidad -->
        <div class="value-card">
          <div class="icon-wrapper">
            <svg class="rounded-circle" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
              <path fill="#333" d="M462.3 62.7C407 7.6 324.8-10.6 256 48 187.2-10.6 105 7.6 49.7 62.7-16.6 129 6.1 221.4 80.2 281.1l175.8 163.7c12 11.2 30.1 11.2 42.1 0l175.8-163.7c74.1-59.7 96.8-152.1 29.4-218.4z"/>
            </svg>
          </div>
          <h3>Honestidad</h3>
          <hr>
          <p>Cada producto que vendo lo recomiendo con transparencia, pensando en lo que realmente te puede ayudar o gustar.</p>
        </div>

        <!-- Cercanía -->
        <div class="value-card">
          <div class="icon-wrapper">
            <svg class="rounded-circle" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
              <path fill="#333" d="M96 128a64 64 0 1 1 128 0 64 64 0 1 1-128 0zm96 160c-61.9 0-112 50.1-112 112v16c0 17.7 14.3 32 32 32h160c17.7 0 32-14.3 32-32v-16c0-61.9-50.1-112-112-112zm352-96a64 64 0 1 1 0-128 64 64 0 1 1 0 128zm-32 32c-17.8 0-34.5 4.1-49.5 11.3 29.3 23.5 48.5 59.5 48.5 100.7v16c0 5.5-.6 10.9-1.7 16H560c17.7 0 32-14.3 32-32v-16c0-61.9-50.1-112-112-112zm-64-32a64 64 0 1 1-128 0 64 64 0 1 1 128 0zm-64 96c-35.9 0-67.5 18.4-86.2 46.4 12.2 15.7 20.2 34.9 22.2 55.6v14c0 5.6-.6 11-1.7 16h131.5c-1.1-5-1.7-10.4-1.7-16v-14c2-20.7 10-39.9 22.2-55.6-18.7-28-50.3-46.4-86.3-46.4z"/>
            </svg>
          </div>
          <h3>Cercanía</h3>
          <hr>
          <p>Aunque este espacio es digital, mi atención es humana. Estoy aquí para ayudarte de persona a persona.</p>
        </div>

        <!-- Compromiso -->
        <div class="value-card">
          <div class="icon-wrapper">
            <svg class="rounded-circle" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
              <path fill="#333" d="M384 64c0-17.7-14.3-32-32-32H272c-17.7 0-32 14.3-32 32v64h-32v128h32v64c0 17.7 14.3 32 32 32h80c17.7 0 32-14.3 32-32v-64h32V128h-32V64zM320 256v-64h32v64h-32z"/>
            </svg>
          </div>
          <h3>Compromiso</h3>
          <hr>
          <p>Me dedico a ofrecer un servicio constante y responsable, asegurando siempre la mejor experiencia para ti.</p>
        </div>

        <!-- Superación -->
        <div class="value-card">
          <div class="icon-wrapper">
            <svg class="rounded-circle" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
              <path fill="#333" d="M316.7 17.8l61 123.6 136.4 19.8c26.2 3.8 36.7 36 17.7 54.4L455 361.6l23.3 135.8c4.5 26.3-23.1 46-46.4 33.7L288 439.6l-121.9 63.5c-23.3 12.2-50.9-7.4-46.4-33.7L143 361.6 44.2 215.6c-19-18.4-8.5-50.6 17.7-54.4l136.4-19.8 61-123.6c11.7-23.6 45.6-23.9 57.4 0z"/>
            </svg>
          </div>
          <h3>Superación</h3>
          <hr>
          <p>Este sitio es el resultado de un nuevo paso en mi emprendimiento. Estoy aprendiendo y creciendo para darte un mejor servicio cada día.</p>
        </div>
      </div>

      <!-- Video al lado derecho -->
      <div class="video-wrapper">
        <video autoplay muted loop playsinline>
          <source src="mp4/gracias_visita.mp4" type="video/mp4" />
          Tu navegador no soporta la etiqueta de video.
        </video>
      </div>

    </div>
    <br><br>
  </div>
</section>
<!--- Fin de la seccion de valores -->


<br>
    <h2 class="display-4" style="background:white; text-align: center;">Conóceme</h2>

    <div class="body2">
  <div class="card">
    <div class="card-img">
      <img src="img/creadora1.jpg" alt="Araceli">
    </div>
    <div class="card-content">
      <h4>Araceli</h4>
      <h6>Emprendedora y vendedora desde 2010</h6>
    </div>
  </div>
</div>

  <!--Credito -->
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


</body>

</html>