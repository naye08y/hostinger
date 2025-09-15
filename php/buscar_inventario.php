<?php

require "conexion.php";
$conexion=conexion();

$columns = ['id','nombre','cantidad_ingreso', 'presentacion','fecha_caducidad','fecha_entrada','tipo_almacenamiento','stock'];

$table = "inventario";

$campo = isset($_POST['campo']) ? $conexion->real_escape_string($_POST['campo']) : null;





$sql = "SELECT " . implode (", ", $columns) . "
FROM $table";
echo $sql;
exit;
$resultado = $conexion->query($sql);
$num_rows = $resultado->num_rows;

$html = '';

if($num_rows > 0){
	while ($row = $resultado->fetch_assoc()) {
		$html .= '<tr>';
		$html .= '<td>' . $row['id'] . '</td';
		$html .= '<td>' . $row['nombre'] . '</td';
		$html .= '<td>' . $row['cantidad_ingreso'] . '</td';
		$html .= '<td>' . $row['presentacion'] . '</td';
		$html .= '<td>' . $row['fecha_caducidad'] . '</td';
		$html .= '<td>' . $row['fecha_entrada'] . '</td';
		$html .= '<td>' . $row['tipo_almacenamiento'] . '</td';
		$html .= '<td>' . $row['stock'] . '</td';
		$html .= '<td><a href="">Modificar</a></td>';
		$html .= '<tr>';
	}
}else{
	$html .= '<tr>';
	$html .= '<td colspan="8"> Sin resultados</td>';
	$html .= '<tr>';
}

echo json_encode($html, JSON_UNESCAPED_UNICODE);