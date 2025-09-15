<?php
session_start();
require 'php/confi.php';
require 'confi/database.php';
$db = new Database();
$con = $db->conectar();
//session_destroy();
$text = $_GET['text'];
$sql = $con->prepare("SELECT id,nombre,ruta_img, precio1, precio2, precio3 from productos where nombre LIKE'%$text%'");
$sql->execute();
$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Productos</title>

  <!--REFERENCIAR LIBRERIAS-->
  <link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/alertify.css">
  <link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/themes/default.css">
  <link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  
    

    <link rel="shortcut icon" href="img/logotipo_araceli.png">

    <script type="text/javascript" src="librerias/jquery.js"></script>
    <script type="text/javascript" src="js/main-scripts.js"> </script>
    <script src="librerias/alertifyjs/alertify.js"></script>


    <link rel="stylesheet" href="estilos/estilosHeader.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    
<style>
/* Tipografía general de la sección */
.herbales-section {
  font-family: 'Poppins', sans-serif; /* Tipografía general */
  width: 100%;
  min-height: 40vh;
  display: flex;
  justify-content: center;
  align-items: center;
  background-image: url('img/BANNER_ARA.png');
  background-position: center;
  background-size: cover;
  background-repeat: no-repeat;
  position: relative;
  padding: 80px 20px;
  background-attachment: scroll; /* Evita distorsión en móviles */
}

/* Tarjeta translúcida */
.herbales-card {
  background: rgba(0, 0, 0, 0.4);
  padding: 30px 50px;
  border-radius: 12px;
  text-align: center;
  color: #fff;
  max-width: 600px;
  width: 90%;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
}

/* Contenido de la tarjeta */
.herbales-card h2 {
  font-size: 2.2rem;
  margin-bottom: 15px;
  text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.6);
}

.herbales-card p {
  font-size: 1.1rem;
  margin-bottom: 20px;
}

.herbales-card a {
  color: #ffe600;
  font-weight: 600;
  text-decoration: none;
  border-bottom: 2px solid #ffe600;
  transition: all 0.3s ease;
}

.herbales-card a:hover {
  color: #ffffff;
  border-color: #ffffff;
}

/* Ajustes responsivos */
@media (max-width: 768px) {
  .herbales-section {
    padding: 60px 15px;
    min-height: 50vh;
  }

  .herbales-card {
    padding: 20px 25px;
    max-width: 90%;
  }

  .herbales-card h2 {
    font-size: 1.8rem;
  }

  .herbales-card p {
    font-size: 1rem;
  }

  .herbales-card a {
    font-size: 0.95rem;
  }
}


/* Sidebar filtro */
.sidebar {
  background: #ffffff;
  border-radius: 12px;
  box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
  padding: 25px;
  position: sticky;
  top: 2rem;
  transition: all 0.3s ease;
}

.sidebar h4 {
  font-family: 'Poppins', sans-serif;
  color: #3b5d23;
  font-weight: 700;
  margin-bottom: 20px;
}

#filterPanel {
  max-height: 400px;
  overflow-y: auto;
  padding-right: 10px;
}

#filterPanel form div {
  font-family: 'Poppins', sans-serif;
  font-size: 1rem;
  color: #3b5d23;
}

#toggleFilterBtn {
  transition: background-color 0.3s ease;
}
#toggleFilterBtn:hover {
  background-color: #54812b;
  color: white;
}

/* Tabla */
.table {
  width: 100%;
  border-collapse: collapse;
  font-family: 'Poppins', sans-serif;
}

.table tr {
  border-bottom: 1px solid #e0e0e0;
  transition: background 0.3s ease, transform 0.3s ease;
}

.table tr:hover {
  background: #f0f8f5;
  transform: scale(1.02);
}

.table td {
  padding: 10px;
  color: #555;
  cursor: pointer;
}

/* Estilo de cards */
.card {
  background: rgba(255, 255, 255, 0.4);
  backdrop-filter: blur(10px);
  border-radius: 20px;
  box-shadow: 0 10px 25px rgba(0, 128, 0, 0.15);
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  padding: 1rem;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}

.card:hover {
  transform: scale(1.02);
  box-shadow: 0 12px 30px rgba(0, 128, 0, 0.2);
}

.card-img-top {
  border-radius: 15px;
  height: 200px;
  width: 100%;
  object-fit: cover;
  margin-bottom: 1rem;
  transition: transform 0.4s ease;
}

.card:hover .card-img-top {
  transform: scale(1.05);
}

.card-tittle {
  font-family: 'Playfair Display', serif;
  color: #1a4d2e;
  font-size: 1.3rem;
  margin-bottom: 0.5rem;
  text-align: center;
}

/* Precio (solo usado en productos_herbales.php) */
.card h4 {
  color: #388e3c;
  font-weight: 600;
  font-size: 1rem;
  margin-bottom: 0.5rem;
  text-align: center;
}

/* Botones uniformes y verdes suaves */
.card .btn {
  background-color: #a5d6a7; /* verde claro y suave */
  color: #1b5e20;
  border: 2px solid #81c784;
 padding: 0.3rem 0.6rem;   /* menos espacio vertical y horizontal */
  font-weight: 600;
  font-size: 0.8rem;        /* letra más pequeña */
  border-radius: 20px;
  transition: all 0.3s ease;
}

.card .btn:hover {
  background-color: #81c784;
  transform: scale(1.05);
}


/* Animación para el nombre del producto */
.card-tittle {
  font-family: 'Playfair Display', serif;
  color: #0a0a0aff;
  font-size: 1.4rem;
  margin-bottom: 0.5rem;
  text-align: center;
  position: relative;
  animation: slideIn 0.6s ease forwards;
}


@keyframes slideIn {
  from {
    opacity: 0;
    transform: translateY(-20px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

/* Precio con nuevo estilo y tipografía */
.card h4 {
  color: #0f0f0fff; /* verde fuerte */
  font-family: 'Montserrat', sans-serif;
  font-size: 1.1rem;
  font-weight: 700;
  background-color: #e8f5e9;
  border-radius: 10px;
  padding: 0.3rem 0.6rem;
  display: inline-block;
  text-align: center;
  margin-bottom: 0.5rem;
  box-shadow: 0 3px 6px rgba(0, 100, 0, 0.1);
}

/* Responsivo */
@media (max-width: 768px) {
  .herbales-card {
    padding: 20px;
  }
  .herbales-card h2 {
    font-size: 1.8rem;
  }
  .herbales-card p {
    font-size: 1rem;
  }
  .sidebar {
    position: relative;
    max-height: 400px;
    overflow-y: auto;
    margin-bottom: 20px;
    padding: 15px;
  }
  .card {
    padding: 1rem;
  }
  .card-img-top {
    height: 160px;
  }
  .card .btn {
    font-size: 0.85rem;
    padding: 0.5rem 1rem;
  }
  .table td {
    font-size: 0.9rem;
  }
}


/* Botón "Aplicar filtro" estilo verde suave y animado */
.sidebar form button.btn-success {
  background-color: #a5d6a7 !important; /* verde suave */
  color: #1b5e20 !important;
  border: 2px solid #81c784 !important;
  border-radius: 20px !important;
  padding: 0.6rem 1.2rem !important;
  font-weight: 600 !important;
  font-size: 0.95rem !important;
  width: 100% !important;
  transition: all 0.3s ease !important;
}

.sidebar form button.btn-success:hover {
  background-color: #81c784 !important;
  color: #ffffff !important;
  transform: scale(1.05);
}

/* Botón "Quitar filtros" estilo outline suave y animado */
.sidebar form button.btn-outline-secondary {
  background-color: transparent !important;
  color: #1b5e20 !important;
  border: 2px solid #81c784 !important;
  border-radius: 20px !important;
  padding: 0.6rem 1.2rem !important;
  font-weight: 600 !important;
  font-size: 0.95rem !important;
  width: 100% !important;
  transition: all 0.3s ease !important;
  margin-top: 0.5rem;
}

.sidebar form button.btn-outline-secondary:hover {
  background-color: #81c784 !important;
  color: #ffffff !important;
  transform: scale(1.05);
}

/* Color de fondo gris personalizado */
.alertify .ajs-message.ajs-success {
  background-color: #cececeff !important;
  color: white !important;
  border: none;
}

/* También puedes personalizar los errores si quieres */
.alertify .ajs-message.ajs-error {
  background-color: #444 !important;
  color: #fff !important;
}

.col-md-9 .card-body,
.col-md-9 .card-title,
.col-md-9 h4,
.col-md-9 table th,
.col-md-9 table td {
  color: #1a4d2e !important; /* Verde oscuro */
  word-wrap: break-word;
  overflow-wrap: break-word;
  white-space: normal; /* permite que el texto haga salto de línea */
}

.col-md-9 .card-title {
  overflow-wrap: break-word;
  word-break: break-word;
  white-space: normal;
  max-width: 100%;
}

.col-md-9 table {
  table-layout: fixed; /* para que las tablas no se salgan */
  width: 100%;
}

.col-md-9 table th,
.col-md-9 table td {
  white-space: nowrap;      /* Evita que el texto se rompa en varias líneas */
  overflow: hidden;         /* Oculta lo que sobrepasa */
  text-overflow: ellipsis;  /* Agrega puntos suspensivos si el texto es muy largo */
  max-width: 100px;         /* Controla el ancho máximo para no expandir demasiado */
  text-align: center;       /* Centrar texto */
}

@media (max-width: 576px) {
  .col-md-9 table th,
  .col-md-9 table td {
    white-space: normal;  /* Permite que el texto haga salto de línea en pantallas pequeñas */
    max-width: none;
  }
}

.container.border-0.shadow.rounded-3.overflow-hidden.bg-white {
  color: #333333; /* color gris oscuro para buen contraste */
  overflow-wrap: break-word; /* para que el texto largo se rompa en varias líneas */
  word-wrap: break-word;
  word-break: break-word;
  white-space: normal; /* para que el texto no se quede en una sola línea */
  padding: 15px; /* algo de espacio interno para que no quede tan pegado */
  max-width: 100%; /* para que no se salga horizontalmente */
  box-sizing: border-box; /* para que padding no agrande el ancho */
}

.card-body h4, .card-body table th, .card-body table td {
  color: #000 !important;
}

.search-results-container {
  background-color: #73b68dff; /* gris oscuro azulado */
  padding: 20px 25px;
  border-radius: 16px;
  max-width: 620px;
  margin: 40px auto;
  box-shadow: 0 10px 30px rgba(96, 116, 136, 0.8);
  text-align: center;
  font-family: 'Poppins', sans-serif;
  user-select: none;
  border: 1.5px solid #27ae60; /* verde esmeralda */
}

.search-results-text {
  color: #ecf0f1; /* gris claro */
  font-size: 1.5rem;
  font-weight: 600;
}

.search-query {
  color: #f39c12; /* dorado suave */
  font-weight: 700;
  font-style: italic;
  text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.6);
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
            <div class="d-flex align-items-center justify-content-between flex-wrap">        <a href="index.php" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
          <img src="img/logotipo_araceli.png" width="150" height="200" alt="" title="Página Principal">
        </a>

        <ul class="nav me-auto mb-2 mb-md-0">

          <li><a href="index.php" class="nav-link px-3 text" style="color: #000000ff; display:inline; border-right: 2px solid  #36642fff">INICIO</a>
          </li>


          <li>
            <a class="nav-link dropdown-toggle" style=" color:#000000ff; display:inline;  border-right: 2px solid  #36642fff" href=" #" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              PRODUCTOS</a>
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

  <!--Imagen  -->
<section class="herbales-section">
  <div class="herbales-card">
    <div class="herbales-content">
      <h2>Productos encontrados</h2>
      <p>Estos son los resultados para tu búsqueda. Explora y elige los productos que mejor se adaptan a tus necesidades.</p>
       <a href="productos_nutricionales.php">Explora nuestra variedad 🛍️</a>
    </div>
  </div>
</section>


  <!--Barra de Navegación Lateral   -->
  <center>
 <div class="search-results-container">
  <?php if (!empty($resultado)) { ?>
    <p class="search-results-text">
      Resultados para <strong class="search-query">"<?php echo htmlspecialchars($_GET['text'], ENT_QUOTES); ?>"</strong>
    </p>
  <?php } else { ?>
    <p class="search-results-text no-results">
      No se encontraron resultados para <strong class="search-query">"<?php echo htmlspecialchars($_GET['text'], ENT_QUOTES); ?>"</strong>
    </p>
  <?php } ?>
</div>
    
  
      <!-- MENU    -->
      <div class="col-md-10">
        <div class="album py-5">
          <!-- Section-->
          <div class="container border-0.shadow.rounded-3.overflow-hidden.bg-white" style="background-color: white;">
            <section class="main row">
              <main>
                <div class="container">

                  <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-5">
                    <?php foreach ($resultado as $row) { ?>
                      <div class="col">
                        <div class="card shadow-sm">
                          <img class="card-img-top" src="img/Productos_Ara/<?php echo $row['ruta_img']; ?>">
                          <div class="card-body">
                            <h3 class="card-tittle text-center"> <?php echo $row['nombre']; ?></h3>
                            <h4 style="color:#000000; font-family: 'Playfair Display'; ">Precio</h4>
                              <div class="table-responsive">
                              <table class="table text-center">
                                <thead style="color:#000000;">
                                  <tr>
                                    <th scope="col">Chico</th>
                                    <th scope="col">Mediano</th>
                                    <th scope="col">Grande</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td><?php echo $row['precio1']; ?> MXN</td>
                                    <td><?php echo $row['precio2']; ?> MXN</td>
                                    <td><?php echo $row['precio3']; ?> MXN</td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                              <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex gap-2">
                              <a href="detailsBusqueda.php?id=<?php echo $row['id']; ?>&token=<?php echo hash_hmac('sha1', $row['id'], KEY_TOKEN); ?>" class="btn btn-success flex-fill">Detalles</a>
                              <button class="btn btn-success flex-fill" type="button" onclick="addProducto(<?php echo  $row['id']; ?>,'<?php echo hash_hmac('sha1', $row['id'], KEY_TOKEN); ?>')">Agregar a carrito</button>
                            </div>

                              </div>
                          </div>
                        </div>
                      </div> <?php } ?>
                  </div>
                </div>
              </main>
            </section>
            <br>
          </div>
          <!-- -->
          <br>
        </div>
      </div>
    </div>
    </center>

  <!--Creditos-->
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


  <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

   <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
 crossorigin="anonymous"></script>
 <script>
        function addProducto(id, token) {
    let url = 'php/carrito.php';
    let formData = new FormData();
    formData.append('id', id);
    formData.append('token', token);

    fetch(url, {
        method: 'POST',
        body: formData,
        mode: 'cors'
    })
    .then(response => response.json())
    .then(data => {
        if (data.ok) {
            let elemento = document.getElementById("num_cart");
            elemento.innerHTML = data.numero;
            alertify.success('Producto agregado al carrito 👍');
        } else {
            alertify.error('Error al agregar el producto');
        }
    })
    .catch(() => {
        alertify.error('Error en la conexión');
    });
}
    </script>
    <script type="text/javascript">
        function open_login() {
            window.location.href = "inicioSesion.php";
        }
    </script>



</body>

</html>