<?php
 
$conexion = new mysqli("localhost", "root", "", "invfisico");
 
$estante = $_GET['q'];
 
$resultado = $conexion->query("SELECT distinct(ubicacion) FROM const WHERE ubicacion LIKE '$estante%' order by ubicacion");
 
$datos = array();
 
while ($row=$resultado->fetch_assoc()){
 
	$datos[] = $row['ubicacion'];
}
 
echo json_encode($datos);