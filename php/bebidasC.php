<?php
header("Acces-Control-Allow-Origin: *");

require_once "conexion.php";
$conexion=conexion();

$response=new stdClass();

$datos=[];
$i=0;

$sql= "SELECT * from productos where categoria_id=1 ";
$result = mysqli_query ($conexion,$sql);

while($row=mysqli_fetch_array($result)){
    $obj=new stdClass();
    $obj->id=$row['id'];
    $obj->nombre=$row['nombre'];
    $obj->precio1=$row['precio1'];
    $obj->precio2=$row['precio2'];
    $obj->precio3=$row['precio3'];
    $obj->ruta_img=$row['ruta_img'];
    $datos[$i]=$obj;
    $i++;
}

$response->datos=$datos;

mysqli_close($conexion);
    header ('Content-Type: application/json');
    echo json_encode($response);
    ?>