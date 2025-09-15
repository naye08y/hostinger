<?php
$conexion = mysqli_connect("localhost", "root", "", "araceli_tienda");

$buscar = isset($_POST['buscar']) ? $_POST['buscar'] : "";

// Consulta con join para traer datos del usuario
$sql = "
    SELECT 
        p.id, 
        p.idtransaccion, 
        p.fecha, 
        p.statusPaypal, 
        u.nombre, 
        u.apellido, 
        u.correo, 
        p.total
    FROM pedido p
    LEFT JOIN usuarios u ON p.usuario_id = u.id
    WHERE p.id LIKE '%$buscar%'
       OR p.idtransaccion LIKE '%$buscar%'
       OR u.nombre LIKE '%$buscar%'
       OR u.apellido LIKE '%$buscar%'
       OR u.correo LIKE '%$buscar%'
    ORDER BY p.id DESC
";

$rta = mysqli_query($conexion, $sql);

echo '<div class="table-responsive">';
echo '<table class="table table-bordered table-hover align-middle tablapedidos">';
echo '<thead class="text-center" style="background: linear-gradient(45deg, #FFD700, #C9A400); color: #111;">

        <tr>
          <th>Código</th>
          <th>Código de transacción</th>
          <th>Fecha</th>
          <th>Estatus</th>
          <th>Usuario</th>
          <th>Correo</th>
          <th>Total</th>
          <th>Ticket</th>
        </tr>
      </thead><tbody>';

while ($pedido = mysqli_fetch_assoc($rta)) {
    echo '<tr class="text-center">
            <td>'.$pedido['id'].'</td>
            <td>'.$pedido['idtransaccion'].'</td>
            <td>'.$pedido['fecha'].'</td>
            <td>'.$pedido['statusPaypal'].'</td>
            <td>'.$pedido['nombre'].' '.$pedido['apellido'].'</td>
            <td>'.$pedido['correo'].'</td>
            <td>$'.number_format($pedido['total'],2).'</td>
            <td>
              <a href="ticket_pedidos.php?id='.$pedido['id'].'" target="_blank" class="btn btn-sm btn-primary">Imprimir</a>
            </td>
          </tr>';
}

echo '</tbody></table></div>';
?>
