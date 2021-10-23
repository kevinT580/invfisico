<?php
 
$conexion = new mysqli("localhost", "root", "", "hms");
 
$estante = $_GET['q'];
 
$resultado = $conexion->query("SELECT distinct(ubicacion) FROM ak129 WHERE ubicacion LIKE '$estante%' order by ubicacion");
 
$datos = array();
 
while ($row=$resultado->fetch_assoc()){
 
	$datos[] = $row['ubicacion'];
}
 
echo json_encode($datos);