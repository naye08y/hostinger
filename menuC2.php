<?php
session_start();
require 'php/confi.php';
require 'confi/database.php';
$db = new Database();
$con = $db->conectar();
//session_destroy();
$sql = $con->prepare("SELECT id, nombre, ruta_img, precio1, precio2, precio3 FROM productos WHERE categoria_id = 1");
$sql->execute();
$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Menu Bebidas Calientes Gabcy</title>

  <!--REFERENCIAR LIBRERIAS-->
  <link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/alertify.css">
  <link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/themes/default.css">
  <link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  

  <script type="text/javascript" src="librerias/jquery.js"></script>
  <script type="text/javascript" src="js/main-scripts.js"> </script>

  <link rel="stylesheet" type="text/css" href="estilos/estilosMenu.css">
  <link rel="shortcut icon" href="img/logotipo_araceli.png">

  <link rel="stylesheet" href="estilos/estilosHeader.css">

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


  <!--Imagen  -->
  <div class="container">
    <ul class="ch-grid">
      <li>
        <div class="ch-item ch-img-1">
          <div class="ch-info">
            <h1>Expreso y Café</h1>
            <p>Bebidas Calientes <a href="">MENU GABCY</a></p>
          </div>
        </div>
      </li>
    </ul>
  </div>

  <!--Barra de Navegación Lateral   -->
  <div class="container">
    <div class="row g-5">
      <div class="col-md-2">
        <div class="position-sticky" style="top: 2rem;">
          <br><br>
          <h4 style="color: #000000ff; font-family: 'Playfair Display', serif;"> Expreso y Café </h4>
          <table class="table" id="list">

          </table>
        </div>
      </div>
      <!-- MENU    -->
      <div class="col-md-10">
        <div class="album py-5">
          <!-- Section-->
          <div class="container border-0 shadow rounded-3 overflow-hidden" style="background-color: white;">
            <section class="main row">
              <main>
                <div class="container">

                  <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-5">
                    <?php foreach ($resultado as $row) { ?>
                      <div class="col">
                        <div class="card shadow-sm">
                          <img class="card-img-top" src="img/productos/BebidasC/<?php echo $row['ruta_img']; ?>">
                          <div class="card-body">
                            <h3 class="card-tittle text-center"> <?php echo $row['nombre']; ?></h3>
                            <h4 style="color:#000000ff;  font-family: 'Playfair Display'; ">Tamaños</p>
                              <table class="table">
                                <thead style="color:#000000ff;">
                                  <tr>
                                    <th scope="col">Chico</th>
                                    <th scope="col">Mediano</th>
                                    <th scope="col">Grande</th>
                                  </tr>
                                </thead>
                                <tbody class="table-group-divider">
                                  <tr>
                                    <td><?php echo $row['precio1']; ?> MXN</td>
                                    <td><?php echo $row['precio2']; ?> MXN</td>
                                    <td><?php echo $row['precio3']; ?> MXN</td>
                                  </tr>

                                </tbody>
                              </table>
                              <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                  <a href="detailsC.php?id=<?php echo $row['id']; ?>&token=<?php echo hash_hmac('sha1', $row['id'], KEY_TOKEN); ?>" class="btn btn">Detalles</a>
                                </div>
                                <button class="btn btn" type="button" onclick="addProducto(<?php echo  $row['id']; ?>,'<?php echo hash_hmac('sha1', $row['id'], KEY_TOKEN); ?>')">Agregar a carrito</button>

                              </div>
                          </div>
                        </div>
                      </div> <?php } ?>
                  </div>
                </div>
              </main>
            </section>
            <br>
          </div>
          <!-- -->
          <br>
        </div>
      </div>
    </div>
  </div>

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


  <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>


  <script type="text/javascript">
    $(document).ready(function() {
      $.ajax({
        type: 'POST',
        url: 'php/bebidasC.php',
        data: {},
        success: function(data) {
          console.log(data);
          let html = '';
          for (var i = 0; i < data.datos.length; i++) {
            html +=
              '<tr>' +
              '<td><img src="img/coffee.png" width="20px" height="20px" >' + data.datos[i].nombre + '</td>' +
              '</tr>';
          }
          document.getElementById("list").innerHTML = html;
        },
        error: function(err) {
          console.error(err);
        }
      });
    });
  </script>

  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
  integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script>
    function addProducto(id, token) {
      let url = 'php/carrito.php'
      let formData = new FormData()
      formData.append('id', id)
      formData.append('token', token)

      var responseClone; // 1
      fetch('php/carrito.php')
        .then(function(response) {
          responseClone = response.clone(); // 2
          return response.json();
        })
        .then(function(data) {
          // Do something with data
        }, function(rejectionReason) { // 3
          console.log('Error parsing JSON from response:', rejectionReason, responseClone); // 4
          responseClone.text() // 5
            .then(function(bodyText) {
              console.log('Received the following instead of valid JSON:', bodyText); // 6
            });
        });

      fetch(url, {
          method: 'POST',
          body: formData,
          mode: 'cors'

        }).then(response => response.json())
        .then(data => {
          if (data.ok) {
            let elemento = document.getElementById("num_cart")
            elemento.innerHTML = data.numero

          }

        })
    }
  </script>
  <script type="text/javascript">
    function open_login() {
      window.location.href = "inicioSesion.php";
    }
  </script>

</body>

</html>