<?php 

class Database
{

private $hostname="localhost";
private $database="u510265130_onlesoh";
private $usuario="u510265130_onlesoh";
private $password="Perritozazu8#";
private $charset="utf8";


function conectar (){

    try{
    $conexion=  "mysql:host=". $this->hostname . "; dbname=". $this->database .";
     charset=". $this->charset;
    $options = [
        PDO::ATTR_ERRMODE =>PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false
    ];
    $pdo = new PDO($conexion, $this->usuario, $this->password, $options);

    return $pdo;
    } catch (PDOException $e){
        echo 'Error conexion:' . $e->getMessage();
        exit;

    }
}

}
