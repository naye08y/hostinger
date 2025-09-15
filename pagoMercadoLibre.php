<?php
session_start();

// ================= VERIFICAR SESIÓN =================
if (!isset($_SESSION['id'])) {
    // Mostrar modal y redirigir si no hay sesión
    echo '<!DOCTYPE html>
    <html lang="es">
    <head>
    <meta charset="UTF-8">
    <title>Sesión requerida</title>
    <style>
      html, body { height:100%; margin:0; font-family:"Segoe UI", Tahoma, Geneva, Verdana, sans-serif; background:#f0f4f8; display:flex; justify-content:center; align-items:center; }
      .modal-overlay { position:fixed; inset:0; background:rgba(0,0,0,0.4); display:flex; justify-content:center; align-items:center; }
      .modal { background:url("img/redirigir.png") no-repeat center/cover; width:90%; max-width:380px; padding:2.5rem 3rem; border-radius:15px; color:#fff; text-align:center; background-color:rgba(0,0,0,0.6); background-blend-mode:darken; }
      .modal h2 { font-size:1.8rem; margin-bottom:1rem; font-weight:700; }
      .modal p { font-size:1.1rem; margin-bottom:2rem; }
      .modal button { background:#ffffffcc; border:none; color:#135836; font-weight:700; font-size:1rem; padding:0.7rem 1.8rem; border-radius:25px; cursor:pointer; }
      .modal button:hover { background:#fff; }
      @media(max-width:400px){ .modal{padding:2rem 1.5rem;} .modal h2{font-size:1.5rem;} .modal p{font-size:1rem;} .modal button{width:100%;} }
    </style>
    </head>
    <body>
    <div class="modal-overlay">
      <div class="modal">
        <h2>Espera</h2>
        <p>Para seguir comprando, por favor inicia sesión y regístrate.</p>
        <button onclick="window.location.href=\'inicioSesion.php\'">Iniciar Sesión</button>
        <p>Serás redirigido automáticamente en 7 segundos.</p>
      </div>
    </div>
    <script>setTimeout(() => { window.location.href = "inicioSesion.php"; }, 7000);</script>
    </body>
    </html>';
    exit;
}

// ================= USUARIO =================
$usuario_id = $_SESSION['id']; // Solo una vez, aquí se asigna
require 'php/confi.php';
require 'confi/database.php';
require 'mercado/vendor/autoload.php';


use MercadoPago\MercadoPagoConfig;
use MercadoPago\Client\Preference\PreferenceClient;
use MercadoPago\Exceptions\MPApiException;

// ================= CARRO DE COMPRAS =================
$db = new Database();
$con = $db->conectar();

$productos = isset($_SESSION['carrito']['productos']) ? $_SESSION['carrito']['productos'] : [];
$lista_carrito = [];
$items = [];

foreach ($productos as $id => $cantidad) {
    $sql = $con->prepare("SELECT id, nombre, ruta_img, precio1 FROM productos WHERE id=? LIMIT 1");
    $sql->execute([$id]);
    $row = $sql->fetch(PDO::FETCH_ASSOC);

    if ($row && $cantidad > 0) {
        // Para la tabla HTML
        $row['cantidad'] = $cantidad;
        $lista_carrito[] = $row;

        // Para Mercado Pago
        $items[] = [
            "id" => (string)$row['id'],
            "title" => htmlspecialchars($row['nombre']),
            "quantity" => intval($cantidad),
            "unit_price" => floatval($row['precio1']),
            "currency_id" => "MXN"
        ];
    }
}

// Si no hay productos, redirige o muestra mensaje
if (empty($items)) {
    echo "No hay productos válidos en el carrito.";
    exit;
}

// ================= MERCADO PAGO =================
MercadoPagoConfig::setAccessToken("APP_USR-3613754145255422-091406-5763f9c972e74d7de50f4ca9d80639c8-2467635042"); // <- pon tu token
$client = new PreferenceClient();

// URLs de ngrok (local)
$base_url = "https://lime-goose-905035.hostingersite.com";
 // reemplaza por tu ngrok actual

try {
    $preference = $client->create([
        "items" => $items,
        "back_urls" => [
            "success" => "$base_url/success.php",
            "failure" => "$base_url/failure.php",
            "pending" => "$base_url/pending.php"
        ],
        "auto_return" => "approved"
    ]);
    $init_point = $preference->init_point;
} catch (MPApiException $e) {
    echo "<h3>Error en la API de Mercado Pago</h3><pre>";
    print_r($e->getApiResponse());
    echo "</pre>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pago</title>

  <!--REFERENCIAR LIBRERIAS-->

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="estilos/estiloCarrito.css">
  <link rel="stylesheet" href="estilos/estilosHeader.css">
  <link rel="shortcut icon" href="img/logotipo_araceli.png">


  <style>
    h4 {
      font-size: 25px;
      text-align: center;
      font-family: 'Playfair Display', serif;
      color: #CC6645;

    }

    /* Contenedor exclusivo de Mercado Pago */
.payment-container {
  background: white;
  padding: 1.5rem;
  border-radius: 1rem;
  box-shadow: 0 0 12px rgba(0,0,0,0.05);
  margin-top: 2rem;
}

/* Botón exclusivo de Mercado Pago */
.payment-container .mp-btn {
  background-color: #178A5B !important;
  color: white !important;
  border: none !important;
  padding: 0.8rem 2rem;
  border-radius: 0.5rem;
  text-decoration: none;
  font-weight: bold;
  display: inline-block;
  transition: background-color 0.3s ease;
}

.payment-container .mp-btn:hover {
  background-color: #135836 !important;
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



  <!-- Carrito -->
<main>
  <div class="cart-wrapper">

    <!-- Header del carrito -->
    <div class="cart-header">
      <h2>🛒 Tu pedido</h2>
    </div>

    <!-- Body del carrito -->
    <div class="cart-body">
      <div class="table-responsive">
        <table class="table cart-table">
          <thead>
            <tr>
              <th scope="col">Imagen</th>
              <th scope="col">Producto</th>
              <th scope="col">Cantidad</th>
              <th scope="col">Subtotal</th>
            </tr>
          </thead>
          <tbody class="table-group-divider">
            <?php
              if (empty($lista_carrito)) {
                echo '<tr><td colspan="4" class="empty-cart">🛒 <b>Carrito vacío</b></td></tr>';
              } else {
                $total = 0;
                foreach ($lista_carrito as $producto):
                  $_id = $producto['id'];
                  $nombre = $producto['nombre'];
                  $ruta_img = $producto['ruta_img'];
                  $precio1 = $producto['precio1'];
                  $cantidad = $producto['cantidad'];
                  $subtotal = $cantidad * $precio1;
                  $total += $subtotal;
            ?>
              <tr data-id="<?= $_id ?>">
                <td><img src="img/Productos_Ara/<?= htmlspecialchars($ruta_img) ?>" alt="<?= htmlspecialchars($nombre) ?>" width="80"></td>
                <td><?= htmlspecialchars($nombre) ?></td>
                <td><?= $cantidad ?></td>
                <td><div id="subtotal_<?= $_id ?>" name="subtotal[]"><?= MONEDA . number_format($subtotal,2,'.',',') ?></div></td>
              </tr>
            <?php endforeach; ?>
              <tr class="total-row">
                <td colspan="2"></td>
                <td><b>TOTAL</b></td>
                <td class="total-value" id="total"><?= MONEDA . number_format($total,2,'.',',') ?></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>

    <!-- Domicilio de entrega -->
    <div class="cart-actions" style="flex-direction: column; align-items: stretch; gap: 2rem; padding: 2rem; background: #e6faef;">
      <div style="background: white; padding: 1.5rem; border-radius: 1rem; box-shadow: 0 0 12px rgba(0,0,0,0.05);">
        <h5 style="color:#135836; font-weight: bold; margin-bottom: 1rem; text-align:center;">🏠 Domicilio de entrega</h5>
        <form action="php/actualizarUsu.php" method="POST">
          <?php
            require_once "php/conexion.php";
            $conexion = conexion();
            $usuario_id = $_SESSION['id'];
            $query = "SELECT * FROM usuarios WHERE id='$usuario_id'";
            $result = mysqli_query($conexion,$query);
            if ($result && mysqli_num_rows($result) > 0) {
              while($rowData = mysqli_fetch_array($result)) {
                $nom = $rowData["nombre"];
                $ap = $rowData["apellido"];
                $dom = $rowData["domicilio"];
          ?>
            <div class="form-floating mb-3">
              <input type="text" class="form-control" name="nombre" required value="<?= $nom ?>">
              <label>Nombre(s):</label>
            </div>
            <div class="form-floating mb-3">
              <input type="text" class="form-control" name="apellido" required value="<?= $ap ?>">
              <label>Apellido(s):</label>
            </div>
            <div class="form-floating mb-3">
              <input type="text" class="form-control" name="domicilio" required value="<?= $dom ?>">
              <label>Domicilio de entrega:</label>
            </div>
            <div class="text-center">
              <p class="text-muted small" style="font-family: 'Playfair Display', serif;">¿Deseas modificar tu domicilio de entrega?</p>
              <a href="perfil.php" class="btn btn-sm" style="background: #178A5B; color:white; border-radius: 0.5rem;">Modificar dirección</a>
            </div>
          <?php } } ?>
        </form>
      </div>

</main>

<!-- Contenedor del carrito -->
<div class="cart-actions" style="display: flex; flex-direction: column; align-items: stretch; gap: 2rem; padding: 2rem; background: #e6faef; max-width: 100%;">
  
  <div style="background: white; padding: 1.5rem; border-radius: 1rem; box-shadow: 0 0 12px rgba(0,0,0,0.05); width: 100%;">
    <h5 style="color:#135836; font-weight: bold; margin-bottom: 1rem; text-align:center;">💳 Método de pago</h5>
    
    <!-- Contenedor oficial del botón -->
    <div id="wallet_container" style="width: 100%; max-width: 100%;"></div>

    <!-- SDK oficial de Mercado Pago -->
    <script src="https://sdk.mercadopago.com/js/v2"></script>
    <script>
    const mp = new MercadoPago("APP_USR-f36da71a-2c6d-4508-af9f-a4995cccf5a0", { locale: 'es-MX' });

    mp.bricks().create("wallet", "wallet_container", {
        initialization: { preferenceId: "<?= $preference->id ?>" },
        layout: { container: 'responsive' },
        style: { // fuerza que ocupe todo el ancho
          button: {
            width: '100%'
          }
        },
        callbacks: {
            onPaymentApproved: function() {
                window.location.href = "<?= $base_url ?>/success.php?external_reference=<?= $usuario_id ?>";
            },
            onError: function() {
                window.location.href = "<?= $base_url ?>/failure.php";
            }
        }
    });
    </script>
  </div>

  <!-- Botón de regresar (sin cambios) -->
    <div class="text-center" style="margin-top: 2rem;">
      <a class="btn-back mt-3" href="index.php">
        <span class="arrow">&leftarrow;</span> Seguir comprando
      </a>
    </div>
  </div> <!-- .cart-wrapper -->
</div>



  <br><br>
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


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <!-- Include the PayPal JavaScript SDK -->
 <script src="https://www.mercadopago.com.mx/integrations/v1/web-payment-checkout.js"></script>

<script>
const mp = new MercadoPago("APP_USR-5c7a4102-e4ec-4093-b5e3-492a16ed2700", { locale: 'es-MX' });

mp.bricks().create("wallet", "wallet_container", {
    initialization: {
        preferenceId: "<?php echo $preference->id; ?>"
    },
    customization: {
        texts: { valueProp: 'smart_option' }
    },
    callbacks: {
        onPaymentApproved: function(payment) {
            // Redirige a tu success.php con parámetros
            window.location.href = "<?php echo $base_url; ?>/success.php?external_reference=PEDIDO12345";
        },
        onError: function(error) {
            window.location.href = "<?php echo $base_url; ?>/failure.php";
        }
    }
});
</script>

</body>

</html>