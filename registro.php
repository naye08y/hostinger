<?php
session_start();
require 'php/confi.php';
require 'confi/database.php';
$db = new Database();
$con = $db->conectar();
?>


<!--Registro Gabcy -->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro</title>

  <!--REFERENCIAR LIBRERIAS-->
  <link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/alertify.css">
  <link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/themes/default.css">
  <link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <script type="text/javascript" src="js/pass.js"></script>
  <link rel="stylesheet" href="css/font-awesome.min.css">

  <script type="text/javascript" src="librerias/jquery.js"></script>
  <script type="text/javascript" src="js/main-scripts.js"> </script>

  <link rel="shortcut icon" href="img/logotipo_araceli.png">

  <style> 

      body {
  background: #ffffff;
  font-family: 'Montserrat', sans-serif;
  margin: 0;
  padding: 0;
  overflow-x: hidden;
  animation: none !important;
  transform: none !important;
}

.form2 {
  background: #ffffff;
  padding: 2.5rem;
  border-radius: 20px;
  box-shadow: 0 8px 30px rgba(0, 128, 0, 0.25);
  max-width: 400px;
  width: 100%;
  transition: none;
}

/* Se eliminó la animación hover para evitar transformaciones */
/* .form2:hover {
  transform: scale(1.02);
} */

.head-form h2 {
  text-align: center;
  color: #2d6a4f;
  font-weight: bold;
  margin-bottom: 0.5rem;
  text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.2);
}

.head-form p {
  text-align: center;
  color: #40916c;
  font-size: 0.95rem;
  margin-bottom: 1.5rem;
}

.field-set {
  display: flex;
  flex-direction: column;
  gap: 0.6rem;
  margin-bottom: 1rem;
}

.form-input2 {
  width: 100%;
  padding: 0.8rem 1rem;
  border: 1.5px solid #74c69d;
  border-radius: 10px;
  font-size: 1rem;
  transition: all 0.3s ease;
}

.form-input2:focus {
  outline: none;
  border-color: #2d6a4f;
  box-shadow: 0 0 0 3px rgba(46, 204, 113, 0.2);
}

.input-item i {
  margin-right: 0.5rem;
  color: #1b4332;
}

.button2.log-in {
  background-color: #2d6a4f;
  color: white;
  border: none;
  padding: 0.75rem;
  border-radius: 12px;
  font-size: 1rem;
  cursor: pointer;
  transition: all 0.3s ease;
}

.button2.log-in:hover {
  background-color: #1b4332;
}

.button2.submits2 {
  background-color: #95d5b2;
  border: none;
  padding: 0.6rem;
  border-radius: 12px;
  font-size: 0.95rem;
  color: #081c15;
  transition: background-color 0.3s ease;
}

.button2.submits2:hover {
  background-color: #74c69d;
}

@media (max-width: 576px) {
  .form2 {
    padding: 1.5rem;
    border-radius: 15px;
  }

  .head-form h2 {
    font-size: 1.5rem;
  }

  .form-input2 {
    font-size: 0.95rem;
  }

  .button2.log-in,
  .button2.submits2 {
    font-size: 0.9rem;
  }
}
/* Contenedor padre de la card: para centrar horizontal y vertical */
.col-lg-10.col-xl-9.mx-auto {
  display: flex;
  justify-content: center; /* Centra horizontal */
  align-items: center;     /* Centra vertical (opcional) */
  min-height: 80vh;        /* Altura para centrar vertical */
  padding: 1rem;
}

/* El card (formulario + imagen) ya es flex-row, mantenemos */
.card.flex-row.my-5 {
  max-width: 750px;        /* Limita el ancho total para no estirar demasiado */
  width: 100%;
  box-sizing: border-box;
}

/* Imagen izquierda */
.card-img-left {
  flex: 0 0 320px;         /* ancho fijo */
  border-radius: 20px;
  overflow: hidden;
  box-shadow: 0 8px 30px rgba(0, 128, 0, 0.25);
  background-image: url('img/registro.png'); /* tu imagen */
  background-size: cover;
  background-position: center;
}

/* Oculta el div si no tiene fondo ni imagen */
.card-img-left.d-none.d-md-flex {
  display: flex !important; /* forzar que siempre se vea en md+ */
  /* Si usas una etiqueta img dentro, pon aquí estilos para que no distorsione */
}

/* El cuerpo del formulario */
.card-body.p-4.p-sm-5 {
  flex: 1;                 /* ocupa el resto */
  max-width: 400px;
}

/* En móviles (menor a 768px) apilar verticalmente */
@media (max-width: 767.98px) {
  .card.flex-row {
    flex-direction: column !important;
    max-width: 100% !important;
  }
  
  /* Ocultar imagen en móviles */
  .card-img-left {
    flex: 0 0 auto;
    height: 200px; /* o el alto que quieras para mostrar la imagen arriba */
    width: 100% !important;
    border-radius: 20px 20px 0 0;
    background-size: cover;
    background-position: center;
    display: block !important; /* para mostrar la imagen en móvil si quieres */
  }

  /* Si prefieres ocultar la imagen en móviles, usa: */
  /* .card-img-left {
      display: none !important;
  } */

  .card-body.p-4.p-sm-5 {
    max-width: 100% !important;
    padding: 1.5rem !important;
  }

  /* Ajustar el form2 para que rellene */
  .form2 {
    max-width: 100% !important;
    border-radius: 15px !important;
    padding: 1.5rem !important;
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

  <!-- Registro -->
  <div class="container">
    <div class="row ">
      <div class="col-lg-10 col-xl-9 mx-auto ">
        <div class="card flex-row my-5 border-0 shadow rounded-3 overflow-hidden form2">
          <div class="card-img-left d-none d-md-flex">
            <!-- Background image for card set in CSS! -->
          </div>
          <div class="card-body p-4 p-sm-5">
            <header class="head-form">
              <h2>Registrate</h2>
              <p>Porfavor ingresa todos tus datos correctos para registrarte</p>
            </header>
            <form action="php/registro.php" method="POST">

              <?php
              if (isset($_GET['e'])) {
                switch ($_GET['e']) {
                  case '1':
                    echo '<div class="alert alert-danger" role="alert">
                        Falla del servidor
                      </div>';
                    break;
                  case '2':
                    echo '<div class="alert alert-danger" role="alert">
                          Este Correo ya esta registrado, Verifica e intenta nuevamente
                        </div>';
                    break;
                  case '3':
                    echo '<div class="alert alert-danger" role="alert">
                          Las Contraseñas no coinciden, Verifica e intenta devueno
                        </div>';
                    break;
                  default:
                    break;
                }
              }
              ?>

              <div class="field-set">
                <span class="input-item">
                  <i class="fa-solid fa-user"></i>
                </span>
                <input class="form-input2" id="txt-input" type="text" placeholder="Nombre(s)" required name="nombre">
                <br>
                <span class="input-item">
                  <i class="fa-solid fa-users"></i>
                </span>
                <input class="form-input2" id="txt-input" type="text" placeholder="Apellido(s)" required name="apellido">
                <br>
                <span class="input-item">
                  <i class="fa-solid fa-envelope"></i>
                </span>
                <input class="form-input2" id="txt-input" type="text" placeholder="@Correo" required name="correo">
                <br>
                <span class="input-item">
                  <i class="fa fa-key"></i>
                </span>
                <input class="form-input2" type="password" placeholder="Contraseña" id="passwordV1" required name="contra">
                <span>
                  <i class="fa fa-eye" aria-hidden="true" type="button" id="eye" onclick="Mostrar()"></i>
                </span>
                <br>
                <span class="input-item">
                  <i class="fa fa-key"></i>
                </span>
                <input class="form-input2" type="password" placeholder="Repite la Contraseña" id="passwordV2" required name="contra2">
                <span>
                  <i class="fa fa-eye" aria-hidden="true" type="button" id="eye" onclick="Mostrar2()"></i>
                </span>
                <br>
                <span class="input-item">
                  <i class="fa-solid fa-phone"></i>
                </span>
                <input class="form-input2" id="txt-input" type="textarea" placeholder="Número telefonico" required name="telefono">
                <br>
                <span class="input-item">
                  <i class="fa-solid fa-house-user"></i>
                </span>
                <input class="form-input2" id="txt-input" type="text" placeholder="Dirección Completa" required name="domicilio">
                <br>
                <br><br>
                <!--- INICIO DE TERMINOS Y CONDICIONES -->
                <div>
                <!-- Términos y Condiciones -->
                <p style="font-family: 'Montserrat', sans-serif; font-size: 0.95rem; color: #333;">
                  <input type="checkbox" name="File" required style="transform: scale(1.2); margin-right: 8px;">
                  <strong>"He leído y acepto"</strong> las 
                  <a href="#ex1" data-bs-toggle="modal" data-bs-target="#exampleModal" 
                    style="color: #2d6a4f; text-decoration: underline; font-weight: 600;">
                    Políticas de privacidad.
                  </a>
                </p>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg modal-dialog-scrollable">
                    <div class="modal-content" style="font-family: 'Montserrat', sans-serif; line-height: 1.6; color: #2f2f2f;">

                      <div class="modal-header" style="background-color: #2d6a4f; color: white;">
                        <h1 class="modal-title fs-4" id="exampleModalLabel" style="font-weight: 700;">
                          Aviso de Privacidad
                        </h1>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                      </div>

                      <div class="modal-body" style="padding: 1.5rem 2rem;">
                        <p>
                          Te invitamos a leer detenidamente los presentes términos y condiciones antes de utilizar el sitio <strong>www.araceli_y_algo_más.com</strong>, ya que al entrar confirmas tu entendimiento y aceptación de los mismos.
                        </p>
                        <p>
                          Si no aceptas estos términos y condiciones de uso, no podrás utilizar este sitio.
                        </p>

                        <h5 style="color: #2d6a4f; margin-top: 1.5rem;">Uso de www.araceli_y_algo_más.com</h5>
                        <p>
                          Para utilizar el sitio <strong>www.araceli_y_algo_más.com</strong>, debes ser mayor de 18 años. El uso comercial o el nombre de terceros están prohibidos salvo autorización expresa previa. Cualquier infracción podrá resultar en la revocación inmediata de la licencia otorgada, sin previo aviso.
                        </p>

                        <p>
                          Algunos servicios o características pueden requerir registro. Al registrarte, te comprometes a proporcionar información precisa y actualizada.
                        </p>

                        <h5 style="color: #2d6a4f; margin-top: 1.5rem;">Comunicaciones del Usuario</h5>
                        <p>
                          Toda comunicación que envíes al sitio, incluyendo preguntas, comentarios o sugerencias, se convertirán en nuestra propiedad y no serán devueltas salvo orden judicial. Nos reservas el derecho a usar el nombre que envíes en revisiones o comentarios. No uses correos falsos ni pretendas ser otra persona.
                        </p>

                        <h5 style="color: #2d6a4f; margin-top: 1.5rem;">Protección de Datos</h5>
                        <p>
                          Los datos proporcionados están protegidos según nuestro aviso de privacidad en <strong>www.araceli_y_algo_más.com</strong>. Copil no se responsabiliza por la veracidad o vigencia de los datos personales proporcionados. Nos reservamos el derecho de solicitar comprobantes adicionales para corroborar información.
                        </p>
                        <p>
                          Al completar el formulario y usar el sitio, autorizas métodos electrónicos de autenticación como identificación personal, huella digital o firma electrónica.
                        </p>

                        <h5 style="color: #2d6a4f; margin-top: 1.5rem;">Contacto</h5>
                        <p>
                          <a href="mailto:clientes@araceli_tienda.com.mx" style="color: #2d6a4f; font-weight: 600;">almarazaraceli777@gmail.com</a>
                        </p>
                      </div>

                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="font-weight: 600;">
                          Cerrar
                        </button>
                      </div>

                    </div>
                  </div>
                </div>
              </div>

                <!--- FIN DE TERMINOS Y CONDICIONES -->
              </div>
              <center><button class=" button2 log-in" type="submit">REGISTRARME</button></center>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
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


</body>

</html>