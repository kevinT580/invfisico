<?php 
	include_once('../clases/Conexion.php');
	if(isset($_POST['envio'])){
		$con = new Conexion();
		$sql1 = "SELECT * FROM invfisico WHERE ubicacion = '{$_POST['estanteria']}' order by idcontrol";
		$sql2 = "SELECT distinct(ubicacion) FROM invfisico WHERE ubicacion = '{$_POST['estanteria']}'";
		$resultado1 = $con->consultaRetorno($sql1);
		$resultado2 = $con->consultaRetorno($sql2);
	}else{
		header('Location: index.php');
	}
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>Inventario Fisico</title>
        <style>
            table {
            	width: 100%;
                border-collapse: collapse;
            }
            table, td, th {
                border: 1px solid black;
            }
            body{
                background: gray;
                font-family: Helvetica;
                }
            section{
                background: white;
                padding: 5px;
                width: 100%;
                }
            header{
                background: white;
                font-size: 35px;
                padding: 5px;
                width: 100%;
                }
            nav, footer{
                background: #333;
                padding: 5px;
                color: white;
                width: 100%;
                }
            nav ul{
                margin: 0px;
                padding: 0px;
                }
            nav ul li{
                margin: 0px;
                margin-right: 10px;
                display: inline-block;
                }
            nav ul li a{
                color: white;
                font-weight: bold;
                }
        </style>
    </head>
    <body>
        <header>
           TOMA FISICA DE INVENTARIO
        </header>

        <nav>
            <ul>
                <li><a href="../index.php">Inicio</a></li>
                <li><a href="../vistas/rcompara.php">Compara</a></li>
                <li><a href="../vistas/faltantes.php">Faltantes</a></li>
                <li><a href="../vistas/diferencias.php">Diferencias</a></li>
            </ul>
        </nav>
        <section>
			<?php $row2 = mysql_fetch_array($resultado2)?>
			<h1>Estanteria: <?php echo $row2['ubicacion']; ?></h1>
		<table>
			<thead>
			<th><b>ID Control</b></th>
            <th><b>ID Alterno</b></th>
			<th><b>Descripcion</b></th>
			<th><b>Contado</b></th>
			<th><b>Conteo</b></th>
		</thead>
	<tbody>
		<?php while($row = mysql_fetch_array($resultado1)): ?>
			<tr>
				<td><?php echo $row['idcontrol']; ?></td>
                <td><?php echo $row['idalterno']; ?></td>
				<td><?php echo $row['descrip']; ?></td>
				<td ALIGN=center><?php echo $row['fisico']; ?></td>
				<td><a href="mostrar.php?id=<?php echo $row['id']; ?>">Ingresar</a></td>
			</tr>
		<?php endwhile; ?>
	</tbody>	
</table>
</section>
<footer>
            Papelera internacional, S.A.
        </footer>
    </body>
</html>