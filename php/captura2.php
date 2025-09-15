<?php

session_start();

header("Acces-Control-Allow-Origin: *");
require '../confi/database.php';
require 'confi.php';

$db = new Database();
$con =$db->conectar();


$json = file_get_contents('php://input');
$datos = json_decode($json, true);

print_r(($datos));

if(is_array($datos)){

    $id_transaccion = $datos['detalles']['id'];
    $total = $datos['detalles']['purchase_units'][0]['amount']['value'];
    $status = $datos['detalles']['status'];
    $fecha = $datos['detalles']['update_time'];
    $fecha_nueva = date ('Y-m-d H:i:s',strtotime($fecha));
    //$email = $datos['detalles']['payer_address'];
    $id_cliente = $_SESSION['id'];
    $email = $_SESSION['correo'];

    $sql = $con->prepare("INSERT INTO pedido (idtransaccion, fecha, statusPaypal, correo, usuario_id, total ) VALUES (?,?,?,?,?,?)");
    $sql->execute([$id_transaccion, $fecha_nueva, $status, $email, $id_cliente, $total]);
    $id = $con->lastInsertId();

    if($id > 0){
        $productos = isset($_SESSION['carrito']['productos']) ? $_SESSION['carrito']['productos'] : null;
        if ($productos != null) {

            foreach ($productos as $clave => $cantidad) {
          
              $sql = $con->prepare("SELECT id, nombre, ruta_img, precio1 FROM productos WHERE id=?  LIMIT 1");
              $sql->execute([$clave]);
              $row_prod = $sql->fetch(PDO::FETCH_ASSOC);

              $precio1 = $row_prod['precio1'];
                
              $sql_insert = $con->prepare("INSERT INTO detalle_pedido(pedido_id, producto_id, nombre, precio, cantidad) VALUES (?,?,?,?,?)");
              $sql_insert->execute([$id_transaccion, $clave, $row_prod['nombre'], $precio1, $cantidad]);


            }
           // include 'enviar_email.php';
          } 
          unset($_SESSION['carrito']);
    }
 
}
