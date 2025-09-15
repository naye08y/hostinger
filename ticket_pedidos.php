<?php
include "php/conexion.php";
$conexion = mysqli_connect("localhost", "root", "", "araceli_tienda");

$pedido_id = $_GET['id'] ?? null;

if (!$pedido_id) {
    echo "<h2>No existe venta con el id proporcionado</h2>";
    exit;
}

// Obtener datos del pedido y usuario
$sql = "
    SELECT 
        p.id, 
        p.idtransaccion, 
        p.fecha, 
        p.statusPaypal, 
        p.total, 
        u.nombre, 
        u.apellido, 
        u.correo
    FROM pedido p
    LEFT JOIN usuarios u ON p.usuario_id = u.id
    WHERE p.id = '$pedido_id'
";
$result = mysqli_query($conexion, $sql);
$pedido = mysqli_fetch_assoc($result);

if (!$pedido) {
    echo "<h2>No existe venta con el id proporcionado</h2>";
    exit;
}

// Obtener productos de detalle_pedido
$sqlProductos = "
    SELECT nombre, precio, cantidad
    FROM detalle_pedido
    WHERE pedido_id = '$pedido_id'
";
$resultProductos = mysqli_query($conexion, $sqlProductos);
$productos = [];
while ($row = mysqli_fetch_assoc($resultProductos)) {
    $productos[] = $row;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Ticket Pedido #<?php echo $pedido['id']; ?></title>
<link rel="shortcut icon" href="img/logotipo_araceli.png">
<style>
body { font-family: 'Poppins', sans-serif; background: #f9f9f9; padding: 20px; }
.ticket { width: 400px; margin: auto; background: #fff; padding: 20px; border: 2px solid #000; border-radius: 10px; text-align: center; zoom: 1.2; }
.ticket img { max-width: 120px; margin-bottom: 10px; }
.ticket h2 { margin: 5px 0; font-size: 24px; }
.ticket p { margin: 5px 0; font-size: 16px; }
.ticket hr { margin: 15px 0; border: 1px dashed #000; }
table { width: 100%; border-collapse: collapse; margin-top: 10px; }
th, td { font-size: 14px; border-bottom: 1px solid #000; padding: 5px 0; }
th { text-align: left; }
td.right { text-align: right; }
.total { font-size: 18px; font-weight: bold; color: #FFD700; margin-top: 10px; }
@media print { body { background: #fff; } .ticket { border: none; zoom: 1.2; } }
</style>
</head>
<body onload="window.print()">

<div class="ticket">
    <img src="img/logotipo_araceli.png" alt="Logotipo">
    <h2>Pedido #<?php echo $pedido['id']; ?></h2>
    <p><strong>Usuario:</strong> <?php echo $pedido['nombre'] . ' ' . $pedido['apellido']; ?></p>
    <p><strong>Correo:</strong> <?php echo $pedido['correo'] ?? 'Sin correo'; ?></p>
    <p><strong>Fecha:</strong> <?php echo $pedido['fecha']; ?></p>
    <p><strong>Código de transacción:</strong> <?php echo $pedido['idtransaccion']; ?></p>
    <p><strong>Estatus:</strong> <?php echo $pedido['statusPaypal']; ?></p>
    <hr>

    <table>
        <thead>
            <tr>
                <th>CANT</th>
                <th>PRODUCTO</th>
                <th>SUBTOTAL</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $totalCalculado = 0;
            foreach ($productos as $prod) {
                $subtotal = $prod['precio'] * $prod['cantidad'];
                $totalCalculado += $subtotal;
                echo "<tr>";
                echo "<td>{$prod['cantidad']}</td>";
                echo "<td>{$prod['nombre']} <br> $" . number_format($prod['precio'],2) . "</td>";
                echo "<td class='right'>$" . number_format($subtotal,2) . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

    <p class="total">TOTAL: $<?php echo number_format($totalCalculado,2); ?></p>
    <hr>
    <p>¡Gracias por su compra!</p>
</div>

</body>
</html>
