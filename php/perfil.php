<?php
session_start();

header("Acces-Control-Allow-Origin: *");

require_once "conexion.php";
$conexion=conexion();

$usuario_id=$_SESSION['id'];

$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$domicilio=$_POST['domicilio'];
$telefono=$_POST['telefono'];
$correo=$_POST['correo'];
            $sql="UPDATE usuarios SET nombre='$nombre', apellido='$apellido', domicilio='$domicilio', telefono='$telefono', correo='$correo'
            WHERE id='$usuario_id' ";
            $result = mysqli_query ($conexion,$sql);
            // Alerta de exitoso
            echo '<script language="javascript">alert("Datos Actualizados Correctamente");window.location.href="../perfil.php"</script>';


mysqli_close($conexion);

    ?>