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
  <title>Editar productos</title>

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
      font-size: 48px;
      text-align: center;
      font-family: 'Merriweather', serif;
      color: #111;
      text-transform: uppercase;
      margin-bottom: 20px;
      letter-spacing: 2px;
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

<!--ESTILOS TABLA-->
<style>
  button {
    background: #2B307C;
    color: #FFF;
    font-size: 10px;
    margin-bottom: 1px;
    position: relative;
    top: 10%;
  }


  .tablausuarios2 {
    border: 0.15em solid #DF5E47;
    width: 500px;
    border-radius: 3em;
  }

  .D1 {
    margin-bottom: 6%;
    margin-top: 3%;
    text-align: left;
  }

  .table-responsive {

    margin: 1em;
    height: 60%;

    border-radius: 0em;

    width: auto;
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
</style> <!--ESTILOS TABLA-->

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
    <h1 class="titulo">Editar producto</h1><br>
    <img class="d-block mx-auto mb-4" src="img/editar_produc.png" alt="" width="110" height="110">

    <!----INICIO DEL EDITAR PRODUCTOS ----->

<!---- INCIO PHP DE EDITAR--->
<?php
// Obtener ID del producto
if (!isset($_GET['id'])) {
    header("Location: ver_productos.php");
    exit;
}

$id = intval($_GET['id']);

// Obtener datos del producto
$stmt = $con->prepare("SELECT * FROM productos WHERE id=?");
$stmt->execute([$id]);
$producto = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$producto) {
    header("Location: ver_productos.php");
    exit;
}

// Procesar formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $codigo      = $_POST['codigo'];
    $nombre      = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio1     = $_POST['precio1'];
    $existencia  = $_POST['existencia'];
    $categoria   = $_POST['categoria'];

    // Definir carpeta según categoría
    switch ($categoria) {
        case 1: $carpeta = "img/Productos_Ara/NutriCosmeti/"; $subcarpeta="NutriCosmeti/"; break;
        case 2: $carpeta = "img/Productos_Ara/herbales/"; $subcarpeta="herbales/"; break;
        case 3: $carpeta = "img/Productos_Ara/NutriCion/"; $subcarpeta="NutriCion/"; break;
    }

    // Subir imagen si se selecciona una nueva
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0) {
        $nombreArchivo = basename($_FILES['imagen']['name']);
        $rutaCompleta = $carpeta . $nombreArchivo;
        if(move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaCompleta)) {
            $ruta_img = $subcarpeta . $nombreArchivo; // Solo guardamos subcarpeta/nombre
        } else {
            $ruta_img = $producto['ruta_img']; // Mantener antigua si falla
        }
    } else {
        $ruta_img = $producto['ruta_img']; // Mantener la actual si no se selecciona nueva
    }

    // Actualizar en DB
    $stmt = $con->prepare("UPDATE productos SET codigo=?, nombre=?, descripcion=?, precio1=?, existencia=?, categoria_id=?, ruta_img=? WHERE id=?");
    if ($stmt->execute([$codigo, $nombre, $descripcion, $precio1, $existencia, $categoria, $ruta_img, $id])) {
        echo "<script>
                alert('Producto actualizado correctamente');
                window.location.href = 'ver_productos.php';
              </script>";
        exit;
    } else {
        echo "<script>alert('Error al actualizar el producto');</script>";
    }
}
?>
<!--FIN PHP DE EDITAR--->

<!-- Formulario de edición -->
 <form method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label class="form-label fw-bold">Código del producto</label>
            <input type="text" class="form-control" name="codigo" value="<?= $producto['codigo'] ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">Nombre completo</label>
            <input type="text" class="form-control" name="nombre" value="<?= $producto['nombre'] ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">Descripción</label>
            <textarea class="form-control" name="descripcion" rows="3" required><?= $producto['descripcion'] ?></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">Categoría</label>
            <select class="form-select" name="categoria" required>
                <option value="1" <?= $producto['categoria_id']==1?'selected':'' ?>>Nutricosmeticos</option>
                <option value="2" <?= $producto['categoria_id']==2?'selected':'' ?>>Herbales</option>
                <option value="3" <?= $producto['categoria_id']==3?'selected':'' ?>>Nutricionales</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">Imagen</label>
            <input type="file" class="form-control" name="imagen" accept="image/*">
            <?php if($producto['ruta_img']): ?>
                <img src="img/Productos_Ara/<?= $producto['ruta_img'] ?>" class="img-thumbnail mt-2" style="max-width:100px;">
            <?php endif; ?>
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">Precio</label>
            <input type="number" step="0.01" class="form-control" name="precio1" value="<?= $producto['precio1'] ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">Existencia</label>
            <input type="number" class="form-control" name="existencia" value="<?= $producto['existencia'] ?>" required>
        </div>

        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-success">Actualizar Producto</button>
            <a href="ver_productos.php" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
  </div>

<center>
        <br>
        <div class="back-to-shop" onclick="regresar()">
          <a class="a2" href="MenuProductos.php">&leftarrow; <span>Regresar</span></a>
        </div>
      </center>

 </div>
    <!----FIN DEL FORMULARIO DE REGISTRO--->

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

</html>