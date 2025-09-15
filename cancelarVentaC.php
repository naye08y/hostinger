<?php

session_start();

unset($_SESSION["carrito"]);
$_SESSION["carrito"] = [];

header("Location: ./Registro_ventasC.php?status=2");
?>