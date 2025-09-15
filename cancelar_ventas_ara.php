<?php

session_start();

unset($_SESSION["carrito"]);
$_SESSION["carrito"] = [];

header("Location: ./registro_ventas_ara.php?status=2");
?>