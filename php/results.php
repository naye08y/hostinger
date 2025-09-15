<?php

header("Acces-Control-Allow-Origin: *");

require_once "conexion.php";
$conexion=conexion();

$response=new stdClass();

$datos=[];
$i=0;
$text=$_POST['text'];
$sql= "SELECT id,nombre,ruta_img, precio1, precio2, precio3 from productos where nombre LIKE'%$text%' ";
$result = mysqli_query ($conexion,$sql);

while($row=mysqli_fetch_array($result)){
    $obj=new stdClass();
    $obj->id=$row['id'];
    $obj->nombre=$row['nombre'];
    $obj->ruta_img=$row['ruta_img'];
    $obj->precio1=$row['precio1'];
    $obj->precio2=$row['precio2'];
    $obj->precio3=$row['precio3'];
    $datos[$i]=$obj;
    $i++;
}

$response->datos=$datos;

mysqli_close($conexion);
    header ('Content-Type: application/json');
    echo json_encode($response);
    ?>