<?php
require_once "conexion.php";
$conexion=conexion();

$nombre=$_POST['nombre'];
  $codigo=$_POST['codigo'];
  $existencia=$_POST['existencia'];
  $ruta=$_POST['rutaimg'];

$precio=$_POST['precio'];
        
          $sql="INSERT INTO productos (codigo, nombre, ruta_img, categoria_id, precio1, existencia)
            VALUES ('$codigo','$nombre','$ruta','3', '$precio','$existencia')";
              $result = mysqli_query ($conexion,$sql);
               // Alerta de exitoso
            echo '<script language="javascript">alert("Producto Agregado con Exito al Menú ");window.location.href="../MenuProductos.php"</script>';


?>
