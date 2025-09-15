<?php
header("Acces-Control-Allow-Origin: *");

require_once "conexion.php";
$conexion=conexion();

$response=new stdClass();

$datos=[];
$i=0;

$sql= "SELECT * from productos where categoria_id=2 ";
$result = mysqli_query ($conexion,$sql);

while($row=mysqli_fetch_array($result)){
    $obj=new stdClass();
    $obj->id=$row['id'];
    $obj->nombre=$row['nombre'];
    $obj->precio=$row['precio1'];
    $obj->ruta_img=$row['ruta_img'];
    $datos[$i]=$obj;
    $i++;
}

$response->datos=$datos;

mysqli_close($conexion);
    header ('Content-Type: application/json');
    echo json_encode($response);
    ?>