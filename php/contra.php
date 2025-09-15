
<?php

require_once "conexion.php";
$conexion=conexion();

$correo=$_POST['correo'];
$sql="SELECT * FROM  usuarios WHERE correo='$correo' ";
$result = mysqli_query ($conexion,$sql);
if ($result){
    $row=mysqli_fetch_array($result);
    $count=mysqli_num_rows($result);
    if($count!=0){  
       // $contraseña = $_POST["contra"];
       $contraseña = md5($_POST["contra"]);
      //$contraseña2 = $_POST["contra2"];
      $contraseña2 = md5($_POST["contra2"]);
        if($contraseña!=$contraseña2){
            header('Location: ../olvido.php?e=3');
        }else{
            $sql="UPDATE usuarios SET contraseña='$contraseña' WHERE correo='$correo' ";
            $result = mysqli_query ($conexion,$sql);
            // Alerta de exitoso
            echo '<script language="javascript">alert("Contraseña Actualizada con Exito");window.location.href="../inicioSesion.php"</script>';
        }
    }else{
    //email invalido
    header('Location: ../olvido.php?e=2');
}
}else{
    //error de conexion
    header('Location: ../olvido.php?e=1');
}