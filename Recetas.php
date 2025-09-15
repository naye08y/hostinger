<?php
session_start();
require 'php/confi.php';
require 'confi/database.php';
$db = new Database();
$con = $db->conectar();
?>

<?php
////////////////// CONEXION A LA BASE DE DATOS //////////////////

$host = 'localhost';
$basededatos = 'araceli_tienda';
$usuario = 'root';
$contraseña = '';


$conexion = new mysqli($host, $usuario, $contraseña, $basededatos);
if ($conexion->connect_errno) {
  die("Fallo la conexión : (" . $conexion->mysqli_connect_errno()
    . ") " . $conexion->mysqli_connect_error());
}
///////////////////CONSULTA DE LA TABLA paquete///////////////////////

$paquete = "SELECT * FROM paquete order by id_alumno";
$querypaquete = $conexion->query($paquete);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>paquete</title>

  <!--REFERENCIAR LIBRERIAS-->
  <link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/alertify.css">
  <link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/themes/default.css">
  <link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

  <link rel="shortcut icon" href="img/logotipo_araceli.png">
  <script type="text/javascript" src="librerias/jquery.js"></script>
  <script type="text/javascript" src="js/main-scripts.js"> </script>

  <!-- Optional theme -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-beta1/jquery.js"></script>

  <script>
    $(function() {
      // Clona la fila oculta que tiene los campos base, y la agrega al final de la tabla
      $("#adicional").on('click', function() {
        $("#tabla tbody tr:eq(0)").clone().removeClass('fila-fija').appendTo("#tabla");
      });

      // Evento que selecciona la fila y la elimina 
      $(document).on("click", ".eliminar", function() {
        var parent = $(this).parents().get(0);
        $(parent).remove();
      });
    });
  </script>

</head>

<style>
  @import url('https://fonts.googleapis.com/css?family=Abel|Abril+Fatface|Alegreya|Arima+Madurai|Dancing+Script|Dosis|Merriweather|Oleo+Script|Overlock|PT+Serif|Pacifico|Playball|Playfair+Display|Share|Unica+One|Vibur');

  .titulo {
    font-size: 45px;
    text-align: center;
    font-family: 'Playfair Display', serif;
    color: #CC6645;
    text-decoration: underline;
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

  .container {
    text-align: left;
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

  <div class="px-4 py-3 my-3 text-center">
    <h1 class="titulo">Agregar Nueva Receta</h1><br>
    <a href="Lpaquete.php">
      <img class="d-block mx-auto mb-4" src="img/libro-de-paquete.png" alt="" width="110" height="110" title="Lista paquete">
    </a>

    <div class="container-fluid">
            <div class="d-flex align-items-center justify-content-between flex-wrap">
        <ul class=" mx-auto mb-2 mb-lg-0">

          <form method="post">
            <table class="table" id="tabla">
              <tr class="fila-fija">
                <h5 class="display-7 fw-normal me-2">Nombre de la Bebida o Alimento:</h5>

                <select class="form-control me-2" name="id_producto" required>
                  <?php
                  $conexion = mysqli_connect("localhost", "root", "", "araceli_tienda");
                  $query1 = ("Select id, nombre from productos");
                  $consulta = mysqli_query($conexion, $query1); ?>

                  <?php
                  while ($obj = mysqli_fetch_object($consulta)) {
                  ?>
                    <option value="<?php echo $obj->id ?>"><?php echo $obj->nombre; ?></option>
                  <?php
                  }
                  ?>
                </select>

                <br>
                <h5 class="display-7 fw-normal me-2">Ingredientes para esta Bebida/Alimento:</h5>


                <td>
                  <select class="form-control me-2" name="id_ingrediente[]" required>
                    <?php
                    $conexion = mysqli_connect("localhost", "root", "", "araceli_tienda");
                    $query1 = ("Select id, nombre from inventario");
                    $consulta = mysqli_query($conexion, $query1); ?>

                    <?php
                    while ($obj = mysqli_fetch_object($consulta)) {
                    ?>
                      <option value="<?php echo $obj->id ?>"><?php echo $obj->nombre; ?></option>
                    <?php
                    }
                    ?>
                  </select>
                </td>
                <td>
                  <input required name="cantidad[]" placeholder="#Rebanadas/Piezas/Shots Usados de este ingrediente:" />
                </td>
                <td class="eliminar"><input type="button" value="Menos -" /></td>
              </tr>
            </table>
            <center>
              <button id="adicional" name="adicional" type="button" class="btn btn-warning"> Más + </button>
            </center>

            <div class="btn-der">
              <br><br>
              <center>
                <input type="submit" name="insertar" value="Guardar Receta" class="btn btn-info" />
              </center>
            </div>
            <br>

          </form>

          <?php

          //////////////////////// PRESIONAR EL BOTÓN //////////////////////////
          if (isset($_POST['insertar'])) {

            //$items1 = ($_POST['id_producto']);
            $items2 = ($_POST['id_ingrediente']);
            $items3 = ($_POST['cantidad']);

            $id_producto = $_POST["id_producto"];

            ///////////// SEPARAR VALORES DE ARRAYS, EN ESTE CASO SON 3 ARRAYS UNO POR CADA INPUT ////////////////////)
            while (true) {

              //// RECUPERAR LOS VALORES DE LOS ARREGLOS ////////
              // $item1 = current($items1);
              $item2 = current($items2);
              $item3 = current($items3);

              ////// ASIGNARLOS A VARIABLES ///////////////////
              // $prod=(( $item1 !== false) ? $item1 : ", &nbsp;");
              $ingr = (($item2 !== false) ? $item2 : ", &nbsp;");
              $cant = (($item3 !== false) ? $item3 : ", &nbsp;");

              //// CONCATENAR LOS VALORES EN ORDEN PARA SU FUTURA INSERCIÓN ////////
              $valores = '("' . $id_producto . '","' . $ingr . '","' . $cant . '"),';

              //////// YA QUE TERMINA CON COMA CADA FILA, SE RESTA CON LA FUNCIÓN SUBSTR EN LA ULTIMA FILA /////////////////////
              $valoresQ = substr($valores, 0, -1);

              ///////// QUERY DE INSERCIÓN ////////////////////////////

              $sql = "INSERT INTO receta (productos_id,inventario_id,cantidad_inventario) 
					VALUES $valoresQ";

              $sqlRes = $conexion->query($sql) or mysql_error();
              echo '<script language="javascript">alert("Receta Guardada con Exito!");window.location.href="Lpaquete.php"</script>';


              // Up! Next Value
              // $item1 = next( $items1 );
              $item2 = next($items2);
              $item3 = next($items3);

              // Check terminator
              if ($item2 === false && $item3 === false) break;
            }
          }

          ?>

        </ul>
      </div>

      <center>
        <br>
        <div class="back-to-shop" onclick="regresar()"><a class="a2" href="#">&leftarrow; </a><span class="text-muted">Regresar</span></div>
      </center>
    </div>

  </div>

  </div>
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

<script type="text/javascript">
  function regresar(regresar) {
    window.history.back();
  }
</script>

</html>