<?php include "php/conexion.php"

?>

<?php error_reporting(0); ?>

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
  <title>Visualización de ventas</title>

  <!--REFERENCIAR LIBRERIAS-->
  <link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/alertify.css">
  <link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/themes/default.css">
  <link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

  <link rel="shortcut icon" href="img/logotipo_araceli.png">
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

/* Título */
.titulo {
  font-size: 36px;
  text-align: center;
  font-family: 'Merriweather', serif;
  color: #111;
  text-transform: uppercase;
  margin-bottom: 20px;
  letter-spacing: 2px;
}

/* Inputs y selects */
form .form-control {
  border-radius: 10px;
  border: 2px solid #111;
  font-size: 1rem;
  padding: 8px;
  transition: all 0.3s ease;
}

form .form-control:focus {
  border-color: #cfcdbeff;
  box-shadow: 0 0 8px rgba(224, 221, 200, 0.8);
}

/* Botones */
button, .btn {
  font-family: 'Merriweather', serif;
  font-weight: bold;
  letter-spacing: 1px;
  transition: transform 0.2s ease, box-shadow 0.3s ease;
}

button:hover, .btn:hover {
  transform: translateY(-3px) scale(1.05);
  box-shadow: 0 8px 15px rgba(0,0,0,0.2);
}

/* Tabla principal */
.tablaventas {
  width: 90%;
  margin: 30px auto;
  border-collapse: collapse;
  box-shadow: 0 8px 20px rgba(0,0,0,0.3);
  border-radius: 15px;
  overflow: hidden;
}

.tablaventas thead {
  background: linear-gradient(45deg, #FFD700, #C9A400);
  color: #111;
  font-size: 1.2rem;
  text-transform: uppercase;
}

.tablaventas th, 
.tablaventas td {
  border: none;
  padding: 14px 18px;
  text-align: center;
  font-size: 1rem;
  font-weight: 500;
}

.tablaventas tbody tr:nth-child(even) {
  background-color: #f6f6f6;
}

.tablaventas tbody tr:hover {
  background: rgba(255, 215, 0, 0.2);
  transform: scale(1.01);
  transition: 0.3s;
}

/* Tabla secundaria */
.tablaventas-simple {
  width: 100%;
  border-collapse: collapse;
  margin: 10px 0;
}

.tablaventas-simple th, 
.tablaventas-simple td {
  border: 1px solid #ddd;
  padding: 8px;
  font-size: 0.9rem;
}

.tablaventas-simple thead {
  background: #e0e0e0;
  color: #111;
  text-transform: uppercase;
  font-weight: bold;
}

/* Total */
.total-box {
  background: #111;
  color: #FFD700;
  padding: 15px 30px;
  border-radius: 15px;
  font-size: 1.6rem;
  font-weight: bold;
  display: inline-block;
  margin-top: 20px;
  box-shadow: 0 6px 15px rgba(0,0,0,0.4);
}

/* Botón regresar */
.back-to-shop {
  display: inline-block;
  margin: 20px 0;
}

.back-to-shop .a2 {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  padding: 12px 20px;
  background: #e0e0e0;
  color: #333;
  font-weight: 600;
  text-decoration: none;
  border-radius: 50px;
  box-shadow: 0px 4px 10px rgba(0,0,0,0.15);
  transition: transform 0.6s ease, background 0.3s, color 0.3s;
  transform-style: preserve-3d;
}

.back-to-shop .a2 span {
  font-size: 1rem;
}

.back-to-shop .a2:hover {
  background: #ccc;
  color: #000;
  transform: scaleX(-1);
}

.back-to-shop .a2:hover span {
  transform: scaleX(-1);
  display: inline-block;
}

/* Panel de gráficas */
.panel {
  background: #fff;
  border-radius: 15px;
  box-shadow: 0 6px 20px rgba(0,0,0,0.15);
  padding: 20px;
  margin-bottom: 30px;
}

.panel-heading {
  border-bottom: 2px solid #FFD700;
  margin-bottom: 15px;
}

.panel-body {
  padding: 15px;
}

/* Contenedor de la gráfica */
#cargaBarras {
  width: 100%;
  min-height: 400px;
  background: #fefefe;
  border-radius: 12px;
  box-shadow: inset 0 4px 10px rgba(0,0,0,0.08);
  padding: 15px;
}

/* Responsividad */
@media (max-width: 992px) {
  .titulo {
    font-size: 32px;
  }
  .tablaventas {
    width: 100%;
    font-size: 0.9rem;
  }
  .total-box {
    font-size: 1.2rem;
    padding: 10px 20px;
  }
}

@media (max-width: 576px) {
  .titulo {
    font-size: 24px;
    letter-spacing: 1px;
  }
  form .form-control {
    font-size: 0.9rem;
  }
  .tablaventas th, .tablaventas td {
    padding: 8px;
    font-size: 0.85rem;
  }
  #cargaBarras {
    min-height: 250px;
  }
}

/* Subtítulo específico para gráficas */
.subtitulo-grafica {
  font-family: "Arial", sans-serif; /* puedes poner otra como Roboto, Poppins, etc */
  font-size: 1rem;  /* más pequeño que los h1/h2 */
  font-weight: 600;
  color: #444;
}


/* Estilo único para el botón de buscar */
.btn-buscar {
  background-color: #000;      /* Fondo negro */
  color: #fff;                 /* Texto blanco */
  border: 2px solid #000;      /* Borde negro */
  font-weight: bold;           /* Texto en negrita */
  padding: 8px 20px;           /* Espaciado interno */
  border-radius: 8px;          /* Bordes redondeados */
  transition: all 0.3s ease;   /* Animación suave */
}

.btn-buscar:hover {
  background-color: #fff;      /* Fondo blanco al pasar */
  color: #000;                 /* Texto negro */
  border-color: #000;
  transform: scale(1.05);      /* Ligeramente más grande */
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

    <!----- INICIO DE VER VENTAS ADMIN --->

<div class="container my-5">
  <div class="px-4 py-3 text-center">
    <h1 class="titulo">Ventas Generadas por los Clientes</h1>
    <img class="d-block mx-auto mb-4" src="img/icono_terminal.png" alt="Ventas clientes" width="110" height="110">

    <!-- Formulario buscador -->
    <div class="d-flex flex-wrap align-items-center justify-content-center mb-4">
      <input type="search" id="buscar" class="form-control me-2" placeholder="Ingrese código o nombre del cliente" style="max-width: 300px;">
      <button id="btnBuscar" class="btn btn-buscar">Buscar</button>
    </div>

    <div class="text-center my-4">
    <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#resumenVentasModal">
        Ver resumen de las ventas
    </button>
    </div>

    <!-- Contenedor donde se cargará la tabla -->
    <div id="tablaResultados">
      <!-- Aquí se cargará la tabla por AJAX -->
    </div>

    <!-- Modal -->
<div class="modal fade" id="resumenVentasModal" tabindex="-1" aria-labelledby="resumenVentasLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-dark text-white">
        <h5 class="modal-title" id="resumenVentasLabel">Resumen de Productos Vendidos</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body">
        <div class="table-responsive">
          <table class="table table-bordered table-striped">
            <thead class="table-dark text-center">
              <tr>
                <th>Producto</th>
                <th>Cantidad Vendida</th>
                <th>Total de Ventas</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $conexion = mysqli_connect("localhost","root","","araceli_tienda");

              // Resumen por producto
              $sql = "SELECT dp.nombre, SUM(dp.cantidad) AS total_cantidad, SUM(dp.cantidad * dp.precio) AS total_ventas
                      FROM detalle_pedido dp
                      JOIN pedido p ON dp.pedido_id = p.id
                      GROUP BY dp.nombre
                      ORDER BY total_cantidad DESC";

              $rta = mysqli_query($conexion, $sql);
              while($producto = mysqli_fetch_assoc($rta)){
                  echo "<tr class='text-center'>
                          <td>{$producto['nombre']}</td>
                          <td>{$producto['total_cantidad']}</td>
                          <td>$ {$producto['total_ventas']}</td>
                        </tr>";
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

  </div>
</div>

<div class="container my-4">
  <div class="row">
    <!-- Ventas Generadas por los Empleados -->
    <div class="col-md-12 text-center mb-4">
      <h1 class="titulo">Ventas Generadas por los Empleados</h1>
      <img class="d-block mx-auto mb-4" src="img/icono_ventas.png" alt="Ventas empleados" width="110" height="110">
      <a class="btn btn-success btn-lg" href="verVentasEmpleados_admin.php">Ver ventas de empleados</a>
    </div>
  </div>
</div>

<center>
  <div class="back-to-shop">
    <a class="a2" href="MenuAdmn.php">&leftarrow; <span>Regresar</span></a>
  </div>
</center>

<script>
$(document).ready(function() {
    // Cargar tabla al iniciar
    cargarTabla('');

    // Buscar al presionar botón
    $('#btnBuscar').click(function(e) {
        e.preventDefault();
        var buscar = $('#buscar').val();
        cargarTabla(buscar);
    });

    // Función para cargar tabla con AJAX
    function cargarTabla(buscar) {
        $.ajax({
            url: 'buscar_pedido.php',
            type: 'POST',
            data: {buscar: buscar},
            success: function(data) {
                $('#tablaResultados').html(data);
            }
        });
    }
});
</script>

    <!-- FIN DE VER VENTAS ADMIN --->

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
  
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
  integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
 

  <script type="text/javascript">
    $(document).ready(function(){
        $('#cargaBarras').load('barras.php');
    });
</script>

  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
  integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
 

</html>