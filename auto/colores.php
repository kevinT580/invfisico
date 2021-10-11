<?php
 
$conexion = new mysqli("localhost", "root", "", "prueba");
 
$color = $_GET['q'];
 
$resultado = $conexion->query("SELECT * FROM colores WHERE nombre LIKE '$color%'");
 
$datos = array();
 
while ($row=$resultado->fetch_assoc()){
 
	$datos[] = $row['nombre'];
}
 
echo json_encode($datos);