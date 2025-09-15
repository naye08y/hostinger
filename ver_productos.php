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
  <title>Ver productos</title>

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
</head>

<style>
 /* Tipografía general */
    body {
      font-family: 'Poppins', sans-serif;
      background: #f9f9f9;
      color: #111;
      margin: 0;
      padding: 0;
    }

  .price {
    background: url(img/local.jpg) no-repeat center;
    background-attachment: fixed;
    background-size: cover;
    text-align: center;
    height: 400px;
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

  .containerCredi {
    background-color: #333333;
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

  .feature-icon {
    width: 4rem;
    height: 4rem;
    border-radius: .75rem;
  }

/* Contenedor del botón */
.back-to-shop {
  display: inline-block;
  margin: 20px 0;
}

/* Estilo del enlace */
.back-to-shop .a2 {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  padding: 12px 20px;
  background: #e0e0e0;         /* gris */
  color: #333;
  font-weight: 600;
  text-decoration: none;
  border-radius: 50px;         /* esquinas redondeadas tipo pill */
  box-shadow: 0px 4px 10px rgba(0,0,0,0.15);
  transition: transform 0.6s ease, background 0.3s, color 0.3s;
  transform-style: preserve-3d; /* necesario para el efecto espejo */
}

/* Texto dentro */
.back-to-shop .a2 span {
  font-size: 1rem;
}

/* Hover con animación espejo */
.back-to-shop .a2:hover {
  background: #ccc;
  color: #000;
  transform: scaleX(-1);  /* efecto espejo horizontal */
}

/* Como el flip invierte todo, re-invertimos el texto para que sea legible */
.back-to-shop .a2:hover span {
  transform: scaleX(-1);
  display: inline-block;
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

<style>
/* Contenedor general centrado */
.productos-container {
    text-align: center;
    padding: 20px;
}
   /* Título */
    .titulo {
      font-size: 48px;
      text-align: center;
      font-family: 'Merriweather', serif;
      color: #111;
      text-transform: uppercase;
      margin-bottom: 20px;
      letter-spacing: 2px;
    }

.header-img {
    width: 110px;
    height: 110px;
    margin-bottom: 20px;
}

/* Contenedor con scroll horizontal */
.table-container {
    overflow-x: auto;
    margin: 0 auto 20px auto;
}

/* Imagenes pequeñas centradas */
.img-producto {
    max-width: 50px;
    height: auto;
    display: block;
    margin: 0 auto;
}

/* Media queries para pantallas pequeñas */
@media screen and (max-width: 768px) {
    .tablaproductos th, .tablaproductos td {
        padding: 8px;
        font-size: 0.85rem;
    }
    .img-producto {
        max-width: 35px;
    }
}

@media screen and (max-width: 480px) {
    .tablaproductos th, .tablaproductos td {
        padding: 6px;
        font-size: 0.75rem;
    }
    .img-producto {
        max-width: 30px;
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

   <!----INICIO DE LA TABLA DE VER PRODUCTOS--->
<div class="productos-container">
    <h1 class="titulo">Ver productos</h1>
    <img class="header-img" src="img/ver_produc.png" alt="Productos" width="110" height="110">

<!-- BUSCAR -->
<div class="d-flex justify-content-center mb-4">
  <form id="form-buscar-productos" class="d-flex flex-column flex-md-row align-items-center gap-2" role="search">
    <label for="input-buscar-productos" class="fw-bold mb-1 mb-md-0">Buscar producto:</label>
    <input id="input-buscar-productos" class="form-control" name="buscar" type="search" placeholder="Ingrese código, nombre o descripción">
  </form>
</div>

<div id="resultados-productos" class="d-flex justify-content-center">
  <!-- Aquí se cargarán los resultados vía AJAX -->
</div>

  


    <?php
/*
    
if (isset($_GET['mensaje'])) {
    $mensaje = $_GET['mensaje'];
    if ($mensaje == "eliminado") {
        echo "<div id='alerta-mensaje' class='alert alert-success text-center'>✅ Producto eliminado correctamente</div>";
    }
    if ($mensaje == "actualizado") {
        echo "<div id='alerta-mensaje' class='alert alert-success text-center'>✅ Producto actualizado correctamente</div>";
    }
}
*/
?>

<!--
   <div class="table-container shadow p-3 rounded bg-white">
        <table class="table table-bordered table-hover align-middle tablaproductos">
            <thead class="table-dark text-center">
                <tr>
                    <th>Código</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Categoría</th>
                    <th>Precio</th>
                    <th>Existencia</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
              
                <?php
                /*
                
                $sql = "SELECT * FROM productos";
                $stmt = $con->prepare($sql);
                $stmt->execute();
                $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);

                foreach ($productos as $producto) {
                    switch ($producto['categoria_id']) {
                        case 1: $categoria = "Nutricosmeticos"; break;
                        case 2: $categoria = "Herbales"; break;
                        case 3: $categoria = "Nutricionales"; break;
                        default: $categoria = "Otros"; break;
                    }

                    echo "<tr class='text-center'>";
                    echo "<td>{$producto['codigo']}</td>";
                    echo "<td>{$producto['nombre']}</td>";
                    echo "<td class='descripcion'>{$producto['descripcion']}</td>";
                    echo "<td>{$categoria}</td>";
                    echo "<td>$ {$producto['precio1']}</td>";
                    echo "<td>{$producto['existencia']}</td>";
                    echo "<td><img src='img/Productos_Ara/{$producto['ruta_img']}' class='img-producto'></td>";
                    echo "<td>
                            <a href='editar_producto.php?id={$producto['id']}' class='btn btn-sm btn-primary mb-1'>Editar</a>
                            <a href='eliminar_producto.php?id={$producto['id']}' class='btn btn-sm btn-danger mb-1' onclick='return confirm(\"¿Estás seguro de eliminar este producto?\");'>Eliminar</a>
                          </td>";
                    echo "</tr>";
                }
              */
                ?>
            </tbody>
        </table>
    </div>
-->

    <center>
        <br>
        <div class="back-to-shop">
          <a class="a2" href="MenuProductos.php">&leftarrow; <span>Regresar</span></a>
        </div>
    </center>
</div>

  <!--Footer -->
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
<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

<script>
function actualizarRuta() {
    const categoria = document.getElementById("categoria").value;
    let ruta = "";
    if (categoria == "1") ruta = "NutriCosmeti/"; // ruta relativa
    else if (categoria == "2") ruta = "herbales/";
    else if (categoria == "3") ruta = "NutriCion/";
    document.getElementById("ruta").value = ruta;
}

function mostrarVistaPrevia(event) {
    const preview = document.getElementById("preview");
    preview.src = URL.createObjectURL(event.target.files[0]);
    preview.style.display = "block";
}
</script>

<script>
setTimeout(function() {
    const alerta = document.getElementById('alerta-mensaje');
    if (alerta) {
        alerta.style.transition = "opacity 1s";
        alerta.style.opacity = "0";
        setTimeout(() => alerta.remove(), 1000);
    }
}, 6000);
</script>

<script>
$(document).ready(function() {
    // Evitar recarga
    $("#form-buscar-productos").submit(function(e) {
        e.preventDefault();
        let buscar = $("#input-buscar-productos").val();
        $.ajax({
            url: 'buscar_productos.php',
            type: 'POST',
            data: { buscar: buscar },
            success: function(data) {
                $("#resultados-productos").html(data);
            }
        });
    });

    // Buscar en tiempo real
    $("#input-buscar-productos").on("input", function() {
        $("#form-buscar-productos").submit();
    });

    // Cargar al inicio
    $("#form-buscar-productos").submit();
});
</script>

 <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
  integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
 

</html>