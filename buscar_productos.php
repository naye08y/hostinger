<?php
$conexion = mysqli_connect("localhost", "root", "", "araceli_tienda");

$buscar = isset($_POST['buscar']) ? $_POST['buscar'] : "";

$sql = "SELECT id, codigo, nombre, descripcion, categoria_id, precio1, existencia, ruta_img 
        FROM productos
        WHERE codigo LIKE '%$buscar%' 
           OR nombre LIKE '%$buscar%' 
           OR descripcion LIKE '%$buscar%'";

$rta = mysqli_query($conexion, $sql);

echo '<div class="table-responsive d-flex justify-content-center">';
echo '<table class="table table-bordered table-hover align-middle tablaproductos" style="min-width: 300px; max-width: 100%;">';
echo '<thead class="table-dark text-center">
        <tr>
          <th>Código</th>
          <th>Nombre</th>
          <th>Descripción</th>
          <th>Categoría</th>
          <th>Precio</th>
          <th>Existencia</th>
          <th>Imagen</th>
          <th>Acciones</th>
        </tr>
      </thead><tbody>';

while ($producto = mysqli_fetch_assoc($rta)) {
    // Categorías
    switch ($producto['categoria_id']) {
        case 1: $categoria = "Nutricosmeticos"; break;
        case 2: $categoria = "Herbales"; break;
        case 3: $categoria = "Nutricionales"; break;
        default: $categoria = "Otros"; break;
    }

    echo '<tr class="text-center">
            <td>'.$producto['codigo'].'</td>
            <td>'.$producto['nombre'].'</td>
            <td class="descripcion">'.$producto['descripcion'].'</td>
            <td>'.$categoria.'</td>
            <td>$ '.$producto['precio1'].'</td>
            <td>'.$producto['existencia'].'</td>
            <td><img src="img/Productos_Ara/'.$producto['ruta_img'].'" class="img-producto" style="width:60px; height:60px; object-fit:cover;"></td>
            <td>
              <a href="editar_producto.php?id='.$producto['id'].'" class="btn btn-sm btn-primary mb-1">Editar</a>
              <a href="eliminar_producto.php?id='.$producto['id'].'" class="btn btn-sm btn-danger mb-1" onclick="return confirm(\'¿Estás seguro de eliminar este producto?\');">Eliminar</a>
            </td>
          </tr>';
}

echo '</tbody></table></div>';
?>
