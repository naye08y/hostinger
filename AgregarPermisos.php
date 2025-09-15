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
  <title>Permisos de Usuario</title>

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
  font-size: 48px;
  text-align: center;
  font-family: 'Merriweather', serif;
  color: #111;
  text-transform: uppercase;
  margin-bottom: 20px;
  letter-spacing: 2px;
}

/* Numeración de pasos */
.paso {
  font-weight: 700;
  font-size: 1.2rem;
  margin-right: 10px;
  color: #111;
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

/* Tabla de USUARIOS estilo dorado con efecto 3D */
.tablausuarios {
  width: 90%;
  margin: 30px auto;
  border-collapse: collapse;
  box-shadow: 0 8px 20px rgba(0,0,0,0.3);
  border-radius: 15px;
  overflow: hidden;
  font-family: 'Poppins', sans-serif;
}

.tablausuarios thead {
  background: linear-gradient(45deg, #FFD700, #C9A400); /* dorado degradado */
  color: #111;
  font-size: 1.2rem;
  text-transform: uppercase;
}

.tablausuarios th,
.tablausuarios td {
  border: none;
  padding: 14px 18px;
  text-align: center;
  font-size: 1rem;
  font-weight: 500;
}

.tablausuarios tbody tr:nth-child(even) {
  background-color: #f6f6f6;
}

.tablausuarios tbody tr:hover {
  background: rgba(255, 215, 0, 0.2);
  transform: scale(1.01);
  transition: 0.3s;
}

/* Celdas específicas si quieres un estilo distinto */
.tablausuarios2 {
  font-weight: 500;
  text-align: center;
}

/* Total con diseño */
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
  background: #e0e0e0;
  color: #333;
  font-weight: 600;
  text-decoration: none;
  border-radius: 50px;
  box-shadow: 0px 4px 10px rgba(0,0,0,0.15);
  transition: transform 0.6s ease, background 0.3s, color 0.3s;
  transform-style: preserve-3d;
}

/* Texto dentro */
.back-to-shop .a2 span {
  font-size: 1rem;
}

/* Hover con animación espejo */
.back-to-shop .a2:hover {
  background: #ccc;
  color: #000;
  transform: scaleX(-1);
}

/* Re-invertimos el texto para que sea legible */
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


<body>
<!--Header -->
<nav  id="navegacion" class="p-3 text-dark" class="navbar" style="background-color: white">

  <!-----Nav con fondo de color y letras blancas
<header class="p-3 text-white" style="background-color:  #CC6645;"> --->
  <div class="container-fluid">
            <div class="d-flex align-items-center justify-content-between flex-wrap">      <a href="index.php" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
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
        <ul class="nav me-auto mb-2 mb-md-0">            
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

<!-- Inicio de la seccion de permisos -->

<!----- PERMISO DE USUARIO --->
<div class="px-4 py-3 my-3 text-center">
  <h1 class="titulo">Permiso de Usuario</h1>
  <img class="d-block mx-auto mb-4" src="img/permisos.png" alt="" width="110" height="110">

  <div class="container-fluid">
            <div class="d-flex align-items-center justify-content-between flex-wrap">      <ul class="mx-auto mb-2 mb-lg-0">
        <form action="php/permiso.php" method="POST">
          <?php 
            require_once "php/conexion.php";
            $conexion = conexion();
            $idpermisouser = $_GET['id'];
            $query = "SELECT * FROM usuarios WHERE id='$idpermisouser'";
            $result = mysqli_query($conexion, $query);
            if (!$result) { die(mysqli_error($conexion)); }
            if (mysqli_num_rows($result) > 0) {
              while ($rowData = mysqli_fetch_array($result)) {
                $nom = $rowData["nombre"];
                $permiso = $rowData["permiso"];
          ?>

          <input class="form-control me-2" type="hidden" value="0" name="idpermiso1"> 
          <input class="form-control me-2" type="hidden" value="" name="nombrep" readonly> 
          <br>
          <h5 class="display-7 fw-normal me-2">Código del usuario:</h5> 
          <input class="form-control me-2" type="text" value="<?php echo $idpermisouser ?>" name="usuarioid" readonly> 
          <br>
          <h5 class="display-7 fw-normal me-2">Nombre:</h5> 
          <input class="form-control me-2" type="text" value="<?php echo $nom?>" name="nombre" readonly> 
          <br>

          <center><h6 class="display-7 fw-normal me-2">Referencias de Permisos</h6></center>
          <div class="table-responsive">
            <table class="tablausuarios">
              <thead>
                <tr>
                  <th class="tablausuarios2">Código</th>
                  <th class="tablausuarios2">Descripción</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="tablausuarios2">1</td>
                  <td class="tablausuarios2">Cliente</td>
                </tr>
                <tr>
                  <td class="tablausuarios2">2</td>
                  <td class="tablausuarios2">Empleado</td>
                </tr>
                <tr>
                  <td class="tablausuarios2">3</td>
                  <td class="tablausuarios2">Administrador</td>
                </tr>
              </tbody>
            </table>
          </div>
          <br>

          <h5 class="display-7 fw-normal me-2">Permiso del usuario:</h5> 
          <select class="form-control me-2" name="permiso" style="text-transform:uppercase;" required>
            <option><?php echo $permiso?></option>
            <option>Selecciona el permiso correspondiente</option>
            <option>1</option>
            <option>2</option>
            <option>3</option>
          </select>
          <br>

          <center><button type="submit" class="btn btn-outline-dark" name="uploadBtn">Guardar</button></center>
          <br>
        </form>

        <center>
        <br>
        <div class="back-to-shop" onclick="regresar()">
          <a class="a2" href="MenuAdmn.php">&leftarrow; <span>Regresar</span></a>
        </div>
      </center>

        <?php } } ?>
      </ul>
    </div>
  </div>
</div>

<!-- Fin de la seccion de permisos -->
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

<script  type="text/javascript">
    function regresar(regresar){
      window.history.back();
    }
    </script>

</html>