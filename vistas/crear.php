<?php 
	$controlador = new controladorEstudiantes();
	if(isset($_POST['enviar'])){
		$r = $controlador->crear($_POST['cedula'], $_POST['nombre'], 
			 $_POST['apellido'], $_POST['telefono'], $_POST['edad'], 
			 $_POST['nota1'], $_POST['nota2'], $_POST['nota3']);

		if($r){
			echo "Se ha registrado un nuevo estudiante";
		}else{
			echo "La cedula que esta intentando ingresar ya existe";
		}
	}

?>
<h3>Registro de un nuevo estudiante</h3>
<hr>
<form action="" method="POST">
	<label>Cedula</label><br>
	<input type="number" name="cedula" maxlength="8" required>
	<br><br>
	<label>Nombre</label><br>
	<input type="text" name="nombre" required>
	<br><br>
	<label>Apellido</label><br>
	<input type="text" name="apellido" required>
	<br><br>
	<label>Telefono</label><br>
	<input type="number" name="telefono" maxlength="20" required>
	<br><br>
	<label>Edad</label><br>
	<input type="number" name="edad" maxlength="2" required>
	<br><br>
	<label>Nota 1:</label>
	<input type="number" name="nota1" min="1" max="10" required>
	<label>Nota 2:</label>
	<input type="number" name="nota2" min="1" max="10" required>
	<label>Nota 3:</label>
	<input type="number" name="nota3" min="1" max="10" required>
	<br><br>
	<input type="submit" name="enviar" value="Crear">
</form>