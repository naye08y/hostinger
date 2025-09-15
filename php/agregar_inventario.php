<?php

require_once "conexion.php";
$conexion=conexion();

$nombre=$_POST['nombre'];
$piezas=$_POST['piezas'];


            $sql="INSERT INTO inventario (nombre, piezas)
            VALUES ('$nombre','$piezas')";
            echo $result = mysqli_query($conexion, $sql);
            // Alerta de registro exitoso
            //echo '<script language="javascript">alert("Registro Exitoso");</script>';     
            echo '<script language="javascript">alert("Registro éxitoso!");window.location.href="../Inventario.php"</script>';