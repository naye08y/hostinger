<?php
session_start();

require_once "conexion.php";
$conexion=conexion();

$response=new stdClass();
    if (!isset($_SESSION['id'])){
        $response->state=false;
        $response->detail="No esta logeado, Por Favor inicie Sesión para poder comprar en Gabcy";
        $response->open_login=true;
}else{

}

//mysqli_close($conexion);
    header ('Content-Type: application/json');
    echo json_encode($response);