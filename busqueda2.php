<?php
session_start();
?>

<?php error_reporting (0);?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bebidas/Alimentos Gabcy</title>

  <!--REFERENCIAR LIBRERIAS-->
  <link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/alertify.css">
  <link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/themes/default.css">
  <link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script>
    
    <script type="text/javascript" src="librerias/jquery.js"></script>

    <link rel="stylesheet" type="text/css" href="estilos/estilosMenuB.css">

    <link rel="shortcut icon" href="img/logotipo_araceli.png">

    <script type="text/javascript" src="js/main-scripts.js"> </script>

<body>

<!--Header -->
<?php include("header.php");?>

<!--Imagen  -->
<div class="container">
<ul class="ch-grid">
	<li>
		<div class="ch-item ch-img-1">
			<div class="ch-info">
				<h1>Bebidas y Alimentos</h1>
				<p>Busquedas Gabcy<a href="">MENU GABCY</a></p>
			</div>
		</div>
	</li>
</ul>
</div>

<!--Barra de Navegación Lateral   -->  
      <div class="container">
        <br>
        <center>
        Resultados para 
        <strong>
          "<?php echo $_GET['text'] ?>"
        </strong>
        </center>
        <div class="row g-5">
          <div class="col-md-2">
            <div class="position-sticky" style="top: 2rem;">
            <br><br>
            <h4 style="color: #000000ff; font-family: 'Playfair Display', serif;"> Bebidas / Alimentos </h4>
          <table class="table"  id="list">
            
          </table> 
            </div>
          </div>
        <!-- MENU    --> 
          <div class="col-md-10" >
            <div class="album py-5" >
                         <!-- Section-->
 <div class="container border-0 shadow rounded-3 overflow-hidden" style="background-color: white;" > 
<section class="main row" id="space-list">
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
var text="<?php echo $_GET['text'] ?>"; 
   $(document).ready(function(){
      $.ajax({
        type:'POST',
        url:'php/results.php',
        data:{
            text:text
        },
        success:function(data){
          console.log(data);
          let html='';
          for(var i=0; i< data.datos.length; i++) {
            html+=
  '<article class="col-xs-12 col-sm-8 col-md-9 col-lg-4">'+
  '<br><br>'+
    '<img src="img/productos/Busqueda/'+data.datos[i].ruta_img+'"" class="img-thumbnail"  width="1500" height="6300">'+
  '</article>'+
  '<aside class="col-xs-12 col-sm-4 col-md-3 col-lg-8">'+
  '<br> <br>'+
  '<h3 id="nombre">'+data.datos[i].nombre+'</h3> '+
 '<hr  style="color: #000000ff;">'+
  '<table class="table" >'+
  '<tr>'+
     '<th style="color:#8d4925;"> <rigth>Chico =</th> </rigth>'+
      '<td>$'+data.datos[i].precio1+'MXN</td>'+
     '<th style="color:#8d4925;"> <center> Mediano = </th> </center>'+
      '<td>$'+data.datos[i].precio2+'MXN</td>'+
     '<th style="color:#8d4925;"> <center> Grande = </th> </center>'+
      '<td>$'+data.datos[i].precio3+'MXN</td>'+
    '</tr> '+
  '</table>'+
  '<table class="table">'+
  '<thead>'+
   '<tr>'+
      '<th scope="col" style="font-family:Playfair Display, serif;">Tamaño:</th>'+
      '<th scope="col" style="font-family:Playfair Display, serif;">Cantidad:</th>'+
    '</tr>'+
  '</thead>'+
  '<tbody class="table-group-divider" style="color: #000000ff;">'+
    '<tr>'+
      '<td>'+
        '<select name="precio" class="form-select form-select-sm" aria-label=".form-select-sm example" style="border: 0.05em solid #000000ff; border-radius: 1em;" >'+
          '<option>Selecciona el Tamaño</option>'+
          '<option value="data.datos[i].precio1">Chico</option>'+
          '<option value="data.datos[i].precio2">Mediano</option>'+
          '<option value="data.datos[i].precio3">Grande</option>'+
        '</select>'+
      '</td>'+
      '<td>'+
       '<select name="cantidad" class="form-select form-select-sm" aria-label=".form-select-sm example" style="border: 0.05em solid #000000ff; border-radius: 1em;" >'+
          '<option>Cuántos deseas</option>'+
          '<option>1</option>'+
          '<option>2</option>'+
          '<option>3</option>'+
          '<option>4</option>'+
          '<option>5</option>'+
        '</select>'+
      '</td>'+
    '</tr>'+
  '</tbody>'+
'</table>'+
'<center>'+
  '<button class="btn btn-md btn-dark btn-login fw-bold text-uppercase" type="submit" onclick="iniciar_compra()" style="font-family:Playfair Display, serif;">Agregar al Carrito</button>'+
'</center>'+
'</aside>';
                  
          }
          if (html ==''){
            document.getElementById("space-list").innerHTML="No hay Resultados para esta busqueda, intenta denuveo ";
          }else{
            document.getElementById("space-list").innerHTML=html;
          }
        },
        error:function(err){
          console.error(err);
        }
      });
    });

    var p='<?php echo $_GET["p"]; ?>';
    function iniciar_compra(){
      $.ajax({
        type:'POST',
        url:'php/validar_inicio_compra.php',
        data:{
           id:p
        },
        success:function(data){
          console.log(data);
          if(data.state){
            alert(data.detail);
          }else{
            alert(data.detail);
            if (data.open_login){
              open_login();
            }
          }
        },
        error:function(err){
          console.error(err);
        }
      });
    }
      function open_login(){
        window.location.href="inicioSesion.php";
      }
  </script>

<script type="text/javascript"> 
var text="<?php echo $_GET['text'] ?>"; 
   $(document).ready(function(){
      $.ajax({
        type:'POST',
        url:'php/results.php',
        data:{
            text:text
        },
        success:function(data){
          console.log(data);
          let html='';
          for(var i=0; i< data.datos.length; i++) {
            html+=
            '<tr>'+
            '<td><img src="img/coffee.png" width="20px" height="20px" >'+data.datos[i].nombre+'</td>'+
            '</tr>';          
          }
          document.getElementById("list").innerHTML=html;
        },
        error:function(err){
          console.error(err);
        }
      });
    });
  </script>

</body>

</html>