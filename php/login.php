
<?php

require_once "conexion.php";
$conexion=conexion();

$correo=$_POST['correo'];

$sql="SELECT * FROM  usuarios WHERE correo='$correo'";
$result = mysqli_query ($conexion,$sql);
if ($result){
    $row=mysqli_fetch_array($result);
    $count=mysqli_num_rows($result);
    if($count!=0){  
       // $contraseña = $_POST["contra"];
       $contraseña = md5($_POST["contra"]);
        if($row['contraseña']!=$contraseña){
            header('Location: ../inicioSesion.php?e=3');
        }else{
            session_start();
            $_SESSION['id']=$row['id'];
            $_SESSION['correo']=$row['correo'];
            $_SESSION['nombre']=$row['nombre'];
            $_SESSION['permiso']=$row['permiso'];
            echo '<script language="javascript">alert("Bienvenido!!");window.location.href="../"</script>';
        }
    }else{
    //email invalido
    header('Location: ../inicioSesion.php?e=2');
}
}else{
    //error de conexion
    header('Location: ../inicioSesion.php?e=1');
}

?>