<?php
require 'confi.php';
require '../confi/database.php';
session_start();
if(isset($_POST['action'])){
    $action = $_POST['action'];
    $id = isset($_POST['id']) ? $_POST['id'] : 0;

    if($action == 'agregar'){
        $cantidad =  isset($_POST['cantidad']) ? $_POST['cantidad'] : 0;
        $respuesta = agregar($cantidad, $id);

        if($respuesta > 0){
            $datos['ok']=true;
        }else{
            $datos['ok']=false;
        }

        $datos['subtotal']= MONEDA.number_format($respuesta, 2, '.',',');

    }else if ($action == 'eliminar'){
            $datos['ok'] = eliminar($id);

    } else{
        $datos['ok']=false;
    }
}else{
    $datos['ok']=false;
}

echo json_encode($datos);

function agregar($cantidad, $id){

        $res = 0;

        if($id > 0 && $cantidad > 0 && is_numeric(($cantidad))){
            if(isset($_SESSION['carrito']['productos'][$id])){
                $_SESSION['carrito']['productos'][$id] = $cantidad;

                $db = new Database();
                $con = $db->conectar();
                $sql = $con->prepare("SELECT precio1 FROM productos WHERE id=?  LIMIT 1");
                $sql->execute([$id]);
                $row = $sql->fetch(PDO::FETCH_ASSOC);
                $precio1 = $row['precio1'];
                $res = $cantidad * $precio1;  
                return $res;
    
            }
        }else {
            return $res;
        }
}

function eliminar($id){
    if($id > 0 ){
        if(isset($_SESSION['carrito']['productos'][$id])){
            unset($_SESSION['carrito']['productos'][$id]);
            return true;
        }
    } else {
        return false;
    }
}

?>