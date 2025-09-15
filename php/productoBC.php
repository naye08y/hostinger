<?php
require_once "conexion.php";
$conexion=conexion();

$nombre=$_POST['nombre'];
  $codigo=$_POST['codigo'];
  $existencia=$_POST['existencia'];
  $ruta=$_POST['rutaimg'];

$precioc=$_POST['precioch'];
$preciom=$_POST['preciom'];
$preciog=$_POST['preciog'];

        
          $sql="INSERT INTO productos (codigo, nombre, ruta_img, categoria_id, precio1, precio2, precio3, existencia)
            VALUES ('$codigo','$nombre','$ruta','1', '$precioc', '$preciom', '$preciog', '$existencia')";
              $result = mysqli_query ($conexion,$sql);
               // Alerta de exitoso
            echo '<script language="javascript">alert("Producto Agregado con Exito al Menú ");window.location.href="../MenuProductos.php"</script>';


?>
