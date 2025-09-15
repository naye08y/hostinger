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
  <title>Terminos y condiciones</title>

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
body {
  font-family: 'Montserrat', sans-serif;
  color: #333;
  background-color: #fffdfb;
}

/* Títulos principales */
h2 {
  font-family: 'Playfair Display', serif;
  font-size: 2.2rem;
  color: #0c0a0bff;
  text-align: center;
  margin-top: 30px;
  margin-bottom: 25px;
  text-decoration: underline;
}

/* Subtítulos */
h3 {
  font-family: 'Playfair Display', serif;
  font-size: 1.5rem;
  color: #235519ff;
  margin-top: 20px;
}

/* Párrafos */
p {
  font-size: 1rem;
  line-height: 1.6;
}

/* Palabras destacadas */
.highlight {
  color: #4f5c06ff;
  font-weight: 600;
}

/* Separador */
.divider {
  border-top: 2px solid #000000ff;
  margin: 2rem 0;
}

/* NUEVO: contenedor específico para el body */
.body-content {
  max-width: 900px;
  margin: 0 auto;   /* centra el contenido */
  padding: 20px;    /* espacio interno */
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


<!-----Carrucel--->
  <div class="body-content">
    <h2>Términos y Condiciones</h2>
    <p>
      Bienvenido a <span class="highlight">www.araceli_y_algo_mas.com</span>, una tienda en línea especializada en <span class="highlight">productos herbolarios, nutricionales y de bienestar</span>.
      Al utilizar nuestro sitio web, confirmas que has leído y aceptado los presentes términos y condiciones. 
      Si no estás de acuerdo con alguno de ellos, te recomendamos no hacer uso de la plataforma.
    </p>

    <div class="divider"></div>
    <h3>Uso del sitio</h3>
    <p>
      Para comprar en <span class="highlight">www.araceli_y_algo_mas.com</span> debes ser mayor de 18 años. 
      El uso de información falsa o suplantación de identidad está prohibido y puede dar lugar a la cancelación inmediata de la cuenta.
    </p>

    <h3>Políticas de compra</h3>
    <p>
      Todos los precios están expresados en <span class="highlight">pesos mexicanos</span> e incluyen IVA. 
      Las promociones y descuentos son válidos únicamente para compras realizadas en nuestro sitio web.
    </p>

    <h3>Envíos</h3>
    <p>
      Los productos adquiridos serán enviados al domicilio registrado por el cliente. 
      Los tiempos de entrega pueden variar según la paquetería y la ubicación del comprador. 
      Se notificará por correo electrónico el estatus de cada pedido.
    </p>

    <h3>Devoluciones y reembolsos</h3>
    <p>
      Para solicitar una devolución deberás hacerlo dentro de los <span class="highlight">2 días hábiles posteriores</span> a la recepción del producto. 
      El artículo debe encontrarse en su <span class="highlight">empaque original y sin señales de uso</span>. 
      Una vez aprobado el proceso, el reembolso se realizará en un plazo máximo de <span class="highlight">72 horas</span>.
    </p>

    <h3>Protección de datos</h3>
    <p>
      Tus datos personales serán tratados de forma confidencial y de acuerdo a nuestro 
      <a href="aviso_privacidad.php" class="highlight">Aviso de Privacidad</a>. 
      No compartiremos tu información con terceros sin tu consentimiento expreso.
    </p>

    <h3>Responsabilidad</h3>
    <p>
      Hacemos nuestro mejor esfuerzo por mantener la disponibilidad de todos los productos en el sitio. 
      Sin embargo, en caso de que un artículo no esté disponible tras haberse realizado la compra, se notificará al cliente 
      y se procederá con el <span class="highlight">reembolso inmediato</span>.
    </p>

    <div class="divider"></div>
    <p class="text-center text-muted small">
      © 2025 Araceli y Algo Más - Todos los derechos reservados.
    </p>
  </div>


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


</body>

</html>