<?php
session_start();
require 'php/confi.php';
require 'confi/database.php';


$db = new Database();
$con = $db->conectar();

$id_transaccion = isset($_GET['key']) ? $_GET['key'] : '0';

$errot = '';

if ($id_transaccion == '') {
  $errot = 'Error al procesar la petición';
} else {
  $sql = $con->prepare("SELECT count(id) FROM pedido WHERE idtransaccion=? AND statusPaypal=?");
  $sql->execute([$id_transaccion, 'COMPLETED']);


  if ($sql->fetchColumn() > 0) {
    $sql = $con->prepare("SELECT id, fecha, correo, usuario_id, total FROM pedido WHERE idtransaccion=?  AND statusPaypal=?");
    $sql->execute([$id_transaccion, 'COMPLETED']);
    $row = $sql->fetch(PDO::FETCH_ASSOC);
    $pedido_id = $row['id'];
    $nombre = $_SESSION['nombre'];
    $fecha = $row['fecha'];
    $correo = $row['correo'];
    $total = $row['total'];


    $sqlDet = $con->prepare("SELECT nombre, precio, cantidad FROM detalle_pedido WHERE pedido_id = ?");
    $sqlDet->execute([$pedido_id]);
  } else {
    $errot = 'Error al comprobar la compra';
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Confirmación de compra</title>

  <!--REFERENCIAR LIBRERIAS-->

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

  <link rel="shortcut icon" href="img/logotipo_araceli.png">
  <script src="https://kit.fontawesome.com/7f4ac6925c.js" crossorigin="anonymous"></script>
  <style>
    @import url('https://fonts.googleapis.com/css?family=Abel|Abril+Fatface|Alegreya|Arima+Madurai|Dancing+Script|Dosis|Merriweather|Oleo+Script|Overlock|PT+Serif|Pacifico|Playball|Playfair+Display|Share|Unica+One|Vibur');

    H2 {


      font-size: 40px;
      text-align: center;
      font-family: 'Playfair Display', serif;
      color: #CC6645;

    }

    .card-img-rigth {
      width: 45%;
      background: scroll center url('https://media.istockphoto.com/id/961983276/es/foto/recortada-de-tiro-de-barista-afroamericano-con-bolsas-de-papel-caf%C3%A9-y-tazas-de-caf%C3%A9-desechables.jpg?s=612x612&w=0&k=20&c=HlUsMUtD8YVReKCiuiGAzshfttvk8UR6ZzEnmyzyPY8=');
      background-size: cover;
    }

    .btn-login {
      font-size: 0.9rem;
      letter-spacing: 0.05rem;
      padding: 0.75rem 1rem;
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
              <li>
                <hr class="dropdown-divider" style="color: #f0cea5">
              </li>
              <li><a class="dropdown-item" style="color: #000000ff;" href="#">Extras</a></li>
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
  <!---Cuerpo-->

  <div class="container marketing">
    <div class="container">

      <?php if (strlen($errot) > 0) { ?>


        <div class="row">
          <div class="col-lg-10 col-xl-9 mx-auto" style="background-color:  #F9ECDC;">
            <h4><?php echo $errot; ?> </h4>
            <div class="card flex-row my-5 border-0 shadow rounded-3 overflow-hidden">
            </div>
          </div>
        <?php } else {  ?>
          <div class="row">
            <div class="col-lg-10 col-xl-9 mx-auto">
              <div class="card-body p-4 p-sm-5">
                <center>
                  <h2>Gracias por su pago</h2>
                </center>
                <center><svg class="rounded-circle center" width="70" height="70" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                    <path fill="#333" d="M112 0C85.5 0 64 21.5 64 48V96H16c-8.8 0-16 7.2-16 16s7.2 16 16 16H64 272c8.8 0 16 7.2 16 16s-7.2 16-16 16H64 48c-8.8 0-16 7.2-16 16s7.2 16 16 16H64 240c8.8 0 16 7.2 16 16s-7.2 16-16 16H64 16c-8.8 0-16 7.2-16 16s7.2 16 16 16H64 208c8.8 0 16 7.2 16 16s-7.2 16-16 16H64V416c0 53 43 96 96 96s96-43 96-96H384c0 53 43 96 96 96s96-43 96-96h32c17.7 0 32-14.3 32-32s-14.3-32-32-32V288 256 237.3c0-17-6.7-33.3-18.7-45.3L512 114.7c-12-12-28.3-18.7-45.3-18.7H416V48c0-26.5-21.5-48-48-48H112zM544 237.3V256H416V160h50.7L544 237.3zM160 368a48 48 0 1 1 0 96 48 48 0 1 1 0-96zm272 48a48 48 0 1 1 96 0 48 48 0 1 1 -96 0z" />
                  </svg></center>
                <hr style="color: #FFB28C;">
                <div class="form-floating mb-3">
                  <p class="text fw-lighter fs-6 fw-semibold" style="  font-family: 'Playfair Display', serif;">
                    Referencia del pedido:
                  </p>
                  <p class="text  fw-lighter">
                    <?php echo $id_transaccion; ?>
                  </p>
                </div>
                <div class="form-floating mb-3">
                  <p class="text fw-lighter fs-6 fw-semibold" style="  font-family: 'Playfair Display', serif;">
                    Nombre:
                  </p>
                  <p class="text  fw-lighter">
                    <?php echo $nombre; ?>
                  </p>
                </div>
                <?php
                require_once "php/conexion.php";
                $conexion = conexion();
                $usuario_id = $_SESSION['id'];
                $query = ("Select * from usuarios where id='$usuario_id'");
                $result = mysqli_query($conexion, $query);
                if (!$result) {
                  die(mysqli_error($conexion));
                }

                if (mysqli_num_rows($result) > 0) {
                  while ($rowData = mysqli_fetch_array($result)) {
                    $dom = $rowData["domicilio"];

                ?>
                    <div class="form-floating mb-3">
                      <p class="text fw-lighter fs-6 fw-semibold" style="  font-family: 'Playfair Display', serif;">
                        Dirección de entrega:
                      </p>
                      <p class="text  fw-lighter">
                        <?php echo $dom; ?>
                      </p>
                    </div>
                <?php }
                }

                ?>


                <div class="form-floating mb-3">
                  <p class="text fw-lighter fs-6 fw-semibold" style="  font-family: 'Playfair Display', serif;">
                    Fecha de Compra:
                  </p>
                  <p class="text  fw-lighter">
                    <?php echo $fecha; ?>
                  </p>
                </div>
                <div class="form-floating mb-3">
                  <p class="text fw-lighter fs-6 fw-semibold" style="  font-family: 'Playfair Display', serif;">
                    Total de la compra:
                  </p>
                  <p class="text  fw-lighter">
                    <?php echo MONEDA . number_format($total, 2, '.', ','); ?>
                  </p>
                </div>

                <hr style="color: #FFB28C; ">
                <div class="row">
                  <div class="col">
                    <table class="table">
                      <thead style="color:#000000ff;">
                        <tr>
                          <th scope="col">Cantidad</th>
                          <th scope="col">Producto</th>
                          <th scope="col">Importe</th>
                        </tr>
                      </thead>
                      <tbody class="table-group-divider">
                        <?php while ($row_det = $sqlDet->fetch(PDO::FETCH_ASSOC)) {

                          $importe = $row_det['precio'] * $row_det['cantidad']; ?>

                          <tr>
                            <td><?php echo $row_det['cantidad']; ?></td>
                            <td><?php echo $row_det['nombre']; ?></td>
                            <td><?php echo $importe ?> MXN</td>
                          </tr>

                        <?php } ?>

                      </tbody>
                    </table>
                  </div>
                  <div class="d-grid mb-2">
                    <a class="btn btn-lg btn-dark btn-login fw-bold " type="submit" href="index.php">Regresar a la página principal</a>
                  </div>
                </div>

                <hr style="color: #FFB28C; ">
                <div class="card-img-rigth d-none d-md-flex">
                  <!-- Background image for card set in CSS! -->
                </div>
              </div>

            </div>

          </div>
        <?php } ?>
        </div>
    </div>

  </div>

  <br><br>
  <!--Header -->
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</html>