<?php function conexion (){

$servidor="localhost";
$usuario="u510265130_onlesoh";
$password="Perritozazu8#";
$db="u510265130_onlesoh";

$conexion=mysqli_connect($servidor,$usuario,$password,$db);
return $conexion;

}
?>