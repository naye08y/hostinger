<?php
session_start();
require 'php/confi.php';
require 'confi/database.php';
$db = new Database();
$con = $db->conectar();

if (!isset($_GET['id'])) {
    header("Location: ver_productos.php");
    exit;
}

$id = intval($_GET['id']);

// Eliminar imagen física
$stmt = $con->prepare("SELECT ruta_img FROM productos WHERE id=?");
$stmt->execute([$id]);
$producto = $stmt->fetch(PDO::FETCH_ASSOC);
if ($producto && file_exists("img/Productos_Ara/".$producto['ruta_img'])) {
    unlink("img/Productos_Ara/".$producto['ruta_img']);
}

// Eliminar producto
$stmt = $con->prepare("DELETE FROM productos WHERE id=?");
$stmt->execute([$id]);

// Redirigir con parámetro de mensaje
header("Location: ver_productos.php?mensaje=eliminado");
exit;
?>
