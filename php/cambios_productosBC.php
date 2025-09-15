<?php 
     require_once "conexion.php";
     $conexion=conexion();
 //MODIFICAR    
$id = $_POST['id'];
     $nombre = $_POST['nombre'];
     $precio1 = $_POST['precio1'];
     $precio2 = $_POST['precio2'];
     $precio3 = $_POST['precio3'];
     $ruta_img = $_POST['ruta_img'];
     $codigo=$_POST['codigo'];
     $existencia=$_POST['existencia'];

if (isset($_POST['uploadBtn']) && $_POST['uploadBtn'] == 'Modificar') {


     $sql ="UPDATE productos set codigo='$codigo',nombre='$nombre',ruta_img='$ruta_img', precio1='$precio1', precio2='$precio2', precio3='$precio3', existencia='$existencia' where id='$id' ";
     echo $result2 = mysqli_query($conexion, $sql);
            // Alerta de registro exitoso 
            echo '<script language="javascript">alert("Cambio éxitoso!");window.location.href="../ListaBC.php"</script>';
}
  //se hacen los cambios ELIMINAR 

    if (isset($_POST['uploadBtn']) && $_POST['uploadBtn'] == 'Eliminar') {
    
     $sql = ("DELETE from productos where id='$id'");
     echo $result1 = mysqli_query($conexion, $sql);
     echo '<script language="javascript">alert("Se eliminó de manera éxitosa!");window.location.href="../ListaBC.php"</script>';

   } ?>
