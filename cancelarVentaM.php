<?php

session_start();

unset($_SESSION["carrito"]);
$_SESSION["carrito"] = [];

header("Location: ./Registro_ventasM.php?status=2");
?>