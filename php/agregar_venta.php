<?php

require_once "conexion.php";
$conexion=conexion();

$nombre=$_POST['nombre'];
$cantidad_ingreso=$_POST['numero'];
$presentacion=$_POST['presentacion'];
$fcaducidad=$_POST['fcaducidad'];
$fingreso=$_POST['fingreso']; 
$almacenamiento=$_POST['almacenamiento']; 
$stock=$_POST['stock'];


            $sql="INSERT INTO detalle_venta (nombre, cantidad_ingreso,presentacion, fecha_caducidad, fecha_entrada, tipo_almacenamiento, stock)
            VALUES ('$nombre','$cantidad_ingreso','$presentacion','$fcaducidad','$fingreso','$almacenamiento','$stock')";
            echo $result = mysqli_query($conexion, $sql);
            // Alerta de registro exitoso
            //echo '<script language="javascript">alert("Registro Exitoso");</script>';     
            echo '<script language="javascript">alert("Registro éxitoso!");window.location.href="../Registro_ventas.php"</script>';