<?php 
     require_once "conexion.php";
     $conexion=conexion();
 //MODIFICAR    
$id = $_POST['id'];
     $nombre = $_POST['nombre'];
     $apellido = $_POST['apellido'];
     $correo = $_POST['correo'];
     $contraseña = $_POST['contraseña'];
     $domicilio = $_POST['domicilio'];
     $telefono = $_POST['telefono'];
     $permiso = $_POST['permiso'];

  //se hacen los cambios ELIMINAR 

    if (isset($_POST['uploadBtn']) && $_POST['uploadBtn'] == 'Eliminar') {
    
     $sql = ("DELETE from usuarios where id='$id'");
     echo $result1 = mysqli_query($conexion, $sql);
     echo '<script language="javascript">alert("Se eliminó de manera éxitosa!");window.location.href="../ListaUsuarios.php"</script>';

   } ?>
