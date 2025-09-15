<?php
require 'php/confi.php';
require 'confi/database.php';
require 'mercado/vendor/autoload.php';

use MercadoPago\MercadoPagoConfig;
use MercadoPago\Client\Payment\PaymentClient;

MercadoPagoConfig::setAccessToken("TU_ACCESS_TOKEN"); // ⚠️ pon tu token aquí

$db = new Database();
$con = $db->conectar();

// Leer el body que manda Mercado Pago
$data = json_decode(file_get_contents("php://input"), true);

// Verificar que sea un pago
if (!isset($data["type"]) || $data["type"] !== "payment") {
    http_response_code(200);
    exit("Not a payment notification");
}

$payment_id = $data["data"]["id"];

try {
    // Consultar a la API de MP para obtener los detalles
    $client = new PaymentClient();
    $payment = $client->get($payment_id);

    if ($payment->status === "approved") {
        $usuario_id = $payment->external_reference; // Aquí guardamos el ID de usuario
        $status = $payment->status;

        // Recuperar carrito guardado
        $stmt = $con->prepare("
            SELECT p.id, p.nombre, p.precio1, c.cantidad
            FROM carrito_guardado c
            JOIN productos p ON c.producto_id = p.id
            WHERE c.usuario_id=?
        ");
        $stmt->execute([$usuario_id]);
        $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($productos) {
            // Calcular total
            $total = 0;
            foreach ($productos as $producto) {
                $total += $producto['precio1'] * $producto['cantidad'];
            }

            // Insertar en pedido
            $stmt = $con->prepare("
                INSERT INTO pedido (idtransaccion, fecha, statusPaypal, usuario_id, total)
                VALUES (?, NOW(), ?, ?, ?)
            ");
            $stmt->execute([$payment_id, $status, $usuario_id, $total]);
            $pedido_id = $con->lastInsertId();

            // Insertar en detalle_pedido
            foreach ($productos as $producto) {
                $stmt = $con->prepare("
                    INSERT INTO detalle_pedido (pedido_id, producto_id, nombre, precio, cantidad)
                    VALUES (?, ?, ?, ?, ?)
                ");
                $stmt->execute([$pedido_id, $producto['id'], $producto['nombre'], $producto['precio1'], $producto['cantidad']]);
            }

            // Vaciar carrito
            $stmt = $con->prepare("DELETE FROM carrito_guardado WHERE usuario_id=?");
            $stmt->execute([$usuario_id]);
        }
    }

    http_response_code(200);
    echo "OK";

} catch (Exception $e) {
    error_log("Webhook error: " . $e->getMessage());
    http_response_code(500);
}
