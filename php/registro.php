<?php

require_once "conexion.php";
$conexion=conexion();

$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$domicilio=$_POST['domicilio'];
$correo=$_POST['correo'];
$telefono=$_POST['telefono'];
$sql="SELECT * FROM  usuarios WHERE correo='$correo' ";
$result = mysqli_query ($conexion,$sql);

if ($result){
    $row=mysqli_fetch_array($result);
    $count=mysqli_num_rows($result);
    if($count==0){  
       // $contraseña = $_POST["contra"];
       $contraseña = md5($_POST["contra"]);
      //$contraseña2 = $_POST["contra2"];
      $contraseña2 = md5($_POST["contra2"]);
        if($contraseña!=$contraseña2){
            header('Location: ../registro.php?e=3');
        }else{
            $sql="INSERT INTO usuarios (nombre, apellido, correo, contraseña, domicilio, telefono, permiso)
            VALUES ('$nombre','$apellido','$correo','$contraseña','$domicilio','$telefono',1)";
            $result = mysqli_query ($conexion,$sql);
            // Alerta de registro exitoso
            //echo '<script language="javascript">alert("Registro Exitoso");</script>';     
            echo '<script language="javascript">alert("Registro Exitoso");window.location.href="../inicioSesion.php"</script>';
        }
    }else{
    //email invalido
    header('Location: ../registro.php?e=2');
}
}else{
    //error de conexion
    header('Location: ../registro.php?e=1');
}