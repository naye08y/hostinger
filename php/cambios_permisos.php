<?php

require_once "conexion.php";
$conexion=conexion();

$permiso1= intval($_POST['idpermiso1']);
$nombrep=$_POST['nombrep'];
$usuarioid= intval($_POST['usuarioid']);
$permiso2= intval($_POST['permiso2']);
$edopermiso=$_POST['edopermiso'];

			if ($edopermiso=="Activo") {
				$edopermiso = intval(1);

							} elseif ($edopermiso=="Inactivo") {
								$edopermiso = intval(0);
							}


							if ($permiso2==1) {
								$nombrep='Usuario';
							}elseif ($permiso2==2) {
								$nombrep='Empleado';
							}elseif ($permiso2==3) {
								$nombrep='Administrador';
							}




			if ($permiso1==$permiso2) { 

				$sql=" UPDATE permisos SET estadopermiso='$edopermiso' WHERE  idpermiso='$permiso2' AND usuario_id='$usuarioid'";
            	//echo
            	 $result = mysqli_query($conexion, $sql);

            	//echo '<script language="javascript">alert("Cambio de permiso éxitoso!");window.location.href="../Permisos.php?id=$usuarioid"</script>';

            	echo '<script language="javascript">alert("Cambio de permiso éxitoso!");window.location.href="../Permisos.php?id=' . $usuarioid . '";</script>';


			}else{

				$sql="SELECT * FROM permisos WHERE usuario_id='$usuarioid' AND idpermiso='$permiso2'";
				// echo 
				$result2 = mysqli_query($conexion, $sql);

				 if (mysqli_num_rows($result2) > 0) {
                            while ($rowData = mysqli_fetch_array($result2)){
							
							$sql=" UPDATE permisos SET estadopermiso='$edopermiso' WHERE  idpermiso='$permiso2' AND usuario_id='$usuarioid'";
            				//echo 
            				$result = mysqli_query($conexion, $sql);

            				// Alerta de registro exitoso
            				//echo '<script language="javascript">alert("Registro Exitoso");</script>';     
            				echo '<script language="javascript">alert("Cambio de permiso éxitoso!");window.location.href="../Permisos.php?id=' . $usuarioid . '";</script>';

                             }
                         }else{



                         	$sql="INSERT INTO permisos (idpermiso, nombrepermiso,estadopermiso, usuario_id)
            				VALUES ('$permiso2','$nombrep','$edopermiso','$usuarioid')";
            				//echo
            				 $result = mysqli_query($conexion, $sql);

            				// Alerta de registro exitoso
            				//echo '<script language="javascript">alert("Registro Exitoso");</script>';     
            				echo '<script language="javascript">alert("Cambio de permiso éxitoso!");window.location.href="../Permisos.php?id=' . $usuarioid . '";</script>';
                         }

			}




            