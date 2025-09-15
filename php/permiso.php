<?php

require_once "conexion.php";
$conexion=conexion();

$usuarioid= intval($_POST['usuarioid']);
$permiso=$_POST['permiso'];

	$sql=" UPDATE usuarios SET permiso='$permiso' WHERE id='$usuarioid'";    				
        $result = mysqli_query($conexion, $sql);
            // Alerta de registro exitoso
            //echo '<script language="javascript">alert("Registro Exitoso");</script>';     
            echo '<script language="javascript">alert("Cambio de permiso éxitoso!");window.location.href="../ListaUsuarios.php";</script>';
