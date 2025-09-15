<?php 
     require_once "conexion.php";
     $conexion=conexion();
 //MODIFICAR    
$id = $_POST['id'];
     $nombre = $_POST['nombre'];
     $piezas = $_POST['piezas'];

if (isset($_POST['uploadBtn']) && $_POST['uploadBtn'] == 'Modificar') {


     $sql ="UPDATE inventario set nombre='$nombre',piezas='$piezas' where id='$id'";
     echo $result2 = mysqli_query($conexion, $sql);
            // Alerta de registro exitoso 
            echo '<script language="javascript">alert("Cambio éxitoso!");window.location.href="../Inventario.php"</script>';
}
  //se hacen los cambios ELIMINAR 

    if (isset($_POST['uploadBtn']) && $_POST['uploadBtn'] == 'Eliminar') {
    
     $sql = ("DELETE from inventario where id='$id'");
     echo $result1 = mysqli_query($conexion, $sql);
     echo '<script language="javascript">alert("Se eliminó de manera éxitosa!");window.location.href="../Inventario.php"</script>';

   } ?>
