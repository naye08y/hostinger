<?php
session_start();
require 'php/confi.php';
require 'confi/database.php';
$db = new Database();
$con = $db->conectar();
//session_destroy();
$id = isset($_GET['id']) ? $_GET['id'] : '';
$token = isset($_GET['token']) ? $_GET['token'] : '';

//print($valor);

if ($id == '' || $token == '') {
    echo 'Error al procesar la petición';
    exit;
} else {

    $token_tmp = hash_hmac('sha1', $id, KEY_TOKEN);

    if ($token == $token_tmp) {
        $sql = $con->prepare("SELECT count(id) FROM productos WHERE id=?");
        $sql->execute([$id]);


        if ($sql->fetchColumn() > 0) {
            $sql = $con->prepare("SELECT nombre, ruta_img, descripcion, precio1, precio2, precio3 FROM productos WHERE id=? AND categoria_id=2 LIMIT 1");
            $sql->execute([$id]);
            $row = $sql->fetch(PDO::FETCH_ASSOC);
            $nombre = $row['nombre'];
            $ruta_img = $row['ruta_img'];
            $descripcion = $row['descripcion'];
            $precio1 = $row['precio1'];
            $precio2 = $row['precio2'];
            $precio3 = $row['precio3'];
        }
    } else {
        echo 'Error al procesar la petición';
        exit;
    }
}
?>
<!DOCTYPE HTML>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles de productos Herbales</title>

    <!--REFERENCIAR LIBRERIAS-->
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/alertify.css">
    <link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/themes/default.css">

    <link rel="stylesheet" type="text/css" href="estilos/estilosMenu2.css">

    <link rel="shortcut icon" href="img/logotipo_araceli.png">

    <script type="text/javascript" src="librerias/jquery.js"></script>
    <script type="text/javascript" src="js/main-scripts.js"> </script>
    <script src="librerias/alertifyjs/alertify.js"></script>

    <style>
        .btn2 {
            font-family: 'Monserrat', sans-serif;
            border-color: #000000ff;
            background-color: #000000ff;
            color: white;
            height: 38px;
            -webkit-transition-duration: 0.4s;
            /* Safari */
            transition-duration: 0.4s;
        }

        .btn2:hover {
            background-color: white;
            color: #000000ff;
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

  /* Botones */
        .btn2 {
            font-family: 'Monserrat', sans-serif;
            border-color: #000000ff;
            background-color: #000000ff;
            color: white;
            height: 38px;
            transition-duration: 0.4s;
        }

        .btn2:hover {
            background-color: white;
            color: #000000ff;
        }

        /* Alertify personalizados */
        .alertify .ajs-message.ajs-success {
            background-color: #cececeff !important;
            color: white !important;
            border: none;
        }

        .alertify .ajs-message.ajs-error {
            background-color: #444 !important;
            color: #fff !important;
        }

        /* Estilos detalles */
        .detalle-main {
            font-family: 'Poppins', sans-serif;
            padding: 40px 20px;
            background: #f5f9f6;
            animation: fadeIn 0.8s ease;
        }

        .detalle-card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 8px 30px rgba(0, 100, 0, 0.1);
            overflow: hidden;
            background: white;
            animation: slideUp 0.6s ease forwards;
        }

        .card-tittle {
            font-family: 'Playfair Display', serif;
            color: #1a4d2e;
            font-size: 2rem;
            margin-bottom: 10px;
        }

        .detalle-precio-label {
            color: #000000ff;
            font-weight: bold;
            font-family: 'Playfair Display', serif;
            font-size: 1.2rem;
        }

        .detalle-precio {
            font-family: 'Montserrat', sans-serif;
            color: #1b5e20;
            font-size: 1.3rem;
            background-color: #e8f5e9;
            padding: 8px 16px;
            border-radius: 10px;
            display: inline-block;
        }

        .btn-verde {
            background-color: #81c784;
            color: #ffffff;
            border: none;
            font-weight: bold;
            padding: 12px;
            border-radius: 30px;
            transition: all 0.3s ease;
            font-size: 1rem;
        }

        .btn-verde:hover {
            background-color: #66bb6a;
            transform: scale(1.05);
        }

        .btn-verde-outline {
            background-color: transparent;
            color: #388e3c;
            border: 2px solid #81c784;
            font-weight: bold;
            padding: 12px;
            border-radius: 30px;
            transition: all 0.3s ease;
            font-size: 1rem;
        }

        .btn-verde-outline:hover {
            background-color: #a5d6a7;
            color: #ffffff;
            transform: scale(1.05);
        }

        /* Imagen */
        .detalle-img-wrapper {
            position: relative;
            overflow: hidden;
            border-radius: 0 0 0 20px;
            height: 100%;
            max-height: 400px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 15px;
            background-color: #f0f8f0;
        }

        .detalle-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 0 0 0 20px;
            animation: fadeIn 1s ease;
            transition: transform 0.3s ease;
        }

        /* Animación imagen con zoom + oscilación */
        .anim-img {
            animation: zoomOscila 8s ease-in-out infinite;
        }

        @keyframes zoomOscila {
            0%, 100% {
                transform: scale(1) translateX(0);
            }
            50% {
                transform: scale(1.05) translateX(10px);
            }
        }

        .anim-img:hover {
            transform: scale(1.1);
            transition: transform 0.3s ease;
        }

        /* Animaciones generales */
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(40px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsivo */
        @media (max-width: 768px) {
            .detalle-card {
                flex-direction: column;
            }

            .detalle-img-wrapper {
                border-radius: 0 0 20px 20px;
                height: 250px;
                max-height: none;
            }

            .card-tittle {
                font-size: 1.5rem;
            }

            .card-descripcion {
            font-family: 'Montserrat', sans-serif;
            font-size: 1rem;
            color: #444;
            margin-top: 10px;
            line-height: 1.5;
        }

            .detalle-precio {
                font-size: 1.1rem;
            }
        }

.btn-verde-secundario {
  background-color: transparent;
  color: #0f0f0eff; /* Verde fuerte */
  font-size: 0.9rem;
  padding: 6px 14px;
  border: none;
  border-radius: 6px;
  font-weight: 600;
  transition: color 0.3s ease, text-shadow 0.3s ease;
  text-decoration: none;
  display: inline-block;
}

.btn-verde-secundario:hover {
  color: #1B5E20;
  text-shadow: 0 0 5px #A5D6A7;
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
            <div class="d-flex align-items-center justify-content-between flex-wrap">                <a href="index.php" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
                    <img src="img/logotipo_araceli.png" width="150" height="200" alt="" title="Página Principal">
                </a>

                <ul class="nav me-auto mb-2 mb-md-0">

                    <li><a href="index.php" class="nav-link px-3 text" style="color: #000000ff; display:inline; border-right: 2px solid  #36642fff">INICIO</a>
                    </li>


                    <li>
                        <a class="nav-link dropdown-toggle" style=" color:#000000ff; display:inline;  border-right: 2px solid  #36642fff" href=" #" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            PRODUCTOS            </a>
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

<!-- Menu de detalles -->
<main class="detalle-main">
        <div class="container detalle-container">
            <div class="detalle-card card mb-3">
                <div class="row g-0">
                    <!-- Columna de Información -->
                    <div class="col-md-7 d-flex align-items-center justify-content-center text-center p-4">
                        <div class="detalle-info w-100">
                            <h3 class="card-tittle"><?php echo $nombre; ?></h3>
                            <p class="card-descripcion"><?php echo $descripcion; ?></p>
                            <h6 class="detalle-precio"><?php echo $precio1; ?> MXN</h6>
                            <br /><br />
                            <div class="d-grid gap-3 col-8 mx-auto">
                                <a href="pagoMercadoLibre.php" class="btn btn-verde">Comprar ahora</a>
                                <button class="btn btn-verde-outline" type="button"
                                    onclick="addProducto(<?php echo $id; ?>,'<?php echo $token_tmp; ?>')">Agregar a
                                    carrito</button>
                                <a href="productos_herbales.php" class="btn btn-verde-secundario">⬅ Regresar</a>
                            </div>
                        </div>
                    </div>

                    <!-- Columna de Imagen -->
                    <div class="col-md-5 d-flex align-items-center justify-content-center p-3">
                        <div class="detalle-img-wrapper">
                            <img class="card-img detalle-img anim-img"
                                src="img/productos/BebidasF/<?php echo $ruta_img; ?>"
                                alt="<?php echo htmlspecialchars($nombre); ?>" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
<!-- Fin del menu de detalles -->
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
    <br>
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





</body>

</html>