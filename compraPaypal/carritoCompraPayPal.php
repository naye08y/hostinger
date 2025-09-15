<!--Carrito compra COPIL /Olivares Vega Ana Jesús, Olvera Mendoza Viridana  -->

<?php
session_start();
require 'confi/confi.php';


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

  <link rel="shortcut icon" href="img/copil2.png">

  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="estilos/estiloCarrito.css">

  <script type="text/javascript" src="js/main-scripts.js"> </script>
  <script type="text/javascript" src="librerias/jquery.js"></script>

  <!---Inicializacion de PAYPAL--->
  <script>

  </script>



  <title>Tu compra Copil</title>



</head>

<body class="bg-light">
  <center> <img src="img/copil2.png" width="110" height="90"> </center>
  <!--Navedaor, menú  -->
  <?php include("php/header.php"); ?>

  <!-- Carrito -->

  <div class="card2">
    <div class="row">
      <div class="col-md-6 cart">
        <div class="title">
          <div class="row">
            <div class="col">
              <center>
                <h4><b>Tu pedido</b></h4>
              </center>
            </div>
          </div>
        </div>
        <div class="row border-top border-bottom" id="space-list">
          <div class="col">
            <div class="row text-muted">No hay Productos en el carrito</div>
          </div>

        </div>
        <h5 style="text-align: center;"><b>Domicilio de entrega</b></h5>

        <form action="php/actualizarUsu.php" method="POST">

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
              $nom = $rowData["nombre"];
              $ap = $rowData["apellido"];
              $correo = $rowData["correo"];
              $dom = $rowData["domicilio"];
              $dom2 = $rowData["domicilio2"];
          ?>

              <div class="form-floating mb-6">
                <input type="text" class="form-control" id="floatingInputUsername" name="nombre" required value="<?php echo $nom ?>">
                <label for="floatingInputUsername">Nombre(s):</label>
              </div>

              <div class="form-floating mb-6">
                <input type="text" class="form-control" id="floatingInputUsername" name="apellido" required value="<?php echo $ap ?>">
                <label for="floatingInputUsername">Apellido(s):</label>
              </div>
            

              <div class="form-floating mb-6">
                <input type="email" class="form-control" id="floatingInputEmail" placeholder="name@example.com" name="correo" required value="<?php echo $correo ?>">
                <label for="floatingInputEmail">Correo:</label>
              </div>
            
              <center>
                <h6 style="text-align:left;">Selecciona el domicilio al que llegara el paquete:</h6>
              </center>
  
              <select class="inputNombreC" name ="tabla1">
                      
                  
                      <option >Selecciona un domicilio</option>
                      <option  id="floatingInputUsername" name="domicilio" ><?php echo $dom ?></option>
                     <option  id="floatingInputUsername" name="domicilio2" ><?php echo $dom2 ?></option>
  
                      </select>
   
              <hr style="color: #FFB28C;">
          
        </form>
    <?php }
          }

    ?>

    <div class="back-to-shop" onclick="regresar()"><a class="a2" href="#">&leftarrow; </a><span class="text-muted">Regresar al carrito</span></div>

      </div> <!---Fin de pedido y datos-->
      <div class="col-md-6 summary" style=" background-image: linear-gradient(-225deg, #F9ECDC 35%, #FAFFA6 65%); text-align: center;">
        <div>
          <h5><b>Detalles de pago</b></h5>
        </div>
        <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
          <div class="col">TOTAL</div>
          <div class="col text-right">$<span id="montototal"></span></div>

          <hr>
        </div>
        <br>


        <!---METODO DE PAGO PAYPAL--->
        <div id="paypal-button-conteiner"></div>

      </div>
    </div>

  </div>
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


  <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Include the PayPal JavaScript SDK -->
  <script src="https://www.paypal.com/sdk/js?client-id=<?php echo CLIENT_ID; ?>&currency=<?php echo CURRENCY; ?>"></script>

  <script type="text/javascript">
    $(document).ready(function() {
      $.ajax({
        type: 'POST',
        url: 'php/carrito.php',
        data: {},
        success: function(data) {
          console.log(data);
          let html = '';
          let monto = 0;
          for (var i = 0; i < data.datos.length; i++) {
            html +=
              '<div class="row border-top border-bottom">' +
              '<div class="col-2"><img class="img-fluid" src="img/busqueda/' + data.datos[i].ruta_img + '" ></div>' +
              '<div class="col">' +
              '<div class="row text-muted"><center>' + data.datos[i].nombre + '</center></div>' +
              '</div>' +

              '</div>';
            monto += parseInt(data.datos[i].precio);

          }
          ///paypal///
          paypal.Buttons({
            style: {
              color: 'blue',
              shape: 'pill',
              label: 'pay'
            },
            createOrder: function(data, actions) {
              return actions.order.create({
                purchase_units: [{
                  amount: {
                    value: monto
                  }
                }]
              })
            },
            onApprove: function(data, actions) {
              let url = 'confi/captura.php'
              actions.order.capture().then(function(detalles) {
                console.log(detalles);

                let URL = 'confi/captura.php'

                return fetch(URL, {
                  method: 'post',
                  headers: {
                    'content-type': 'application/json'
                  },
                  body: JSON.stringify({
                    detalles: detalles
                  })
                })

              });
            },

            onCancel: function(data) {
              alert("Pago cancelado");
              console.log(data);
            }
          }).render('#paypal-button-conteiner')


          if (data.datos.length == 0) {
            alert("No hay productos en carrito");
            window.history.back();
          }
          document.getElementById("montototal").innerHTML = monto;
          document.getElementById("space-list").innerHTML = html;

        },
        error: function(err) {
          console.error(err);
        }
      });
    });


    function delete_product(idpedido) {
      $.ajax({
        url: 'php/delete_pedido.php',
        type: 'POST',
        data: {
          idpedido: idpedido,
        },
        success: function(data) {
          console.log(data);
          if (data.state) {
            window.location.reload();
          } else {
            alert(data.detail);
          }
        },
        error: function(err) {
          console.error(err);
        }
      });
    }



    function regresar(regresar) {
      window.history.back();
    }
  </script>




</body>

</html>