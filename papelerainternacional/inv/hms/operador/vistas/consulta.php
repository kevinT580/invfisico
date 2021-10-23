
<?php 
    include_once('../clases/Conexion.php');
    $con = new Conexion();
    $sql = "SELECT * FROM ak129 order by ubicacion,idcontrol,idalterno";
    $resultado = $con->consultaRetorno($sql);
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
            table, th {
                border: 1px solid black;
            }
            td {
                border: 1px solid black;
                font-size: 75%;
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
           DIFERENCIAS INVENTARIO REPUESTOS
        </header>

        <nav>
            <ul>
                <li><a href="../index.php">Inicio</a></li>
            </ul>
        </nav>
        <section>
			
		<table>
			<thead>
            <th><b>Bodega</b></th>
            <th><b>Ubicacion</b></th>
			<th><b>ID Control</b></th>
            <th><b>Cod Alterna</b></th>
			<th><b>Descripcion</b></th>
			<th><b>Unidad</b></th>
			<th><b>Costo</b></th>
            <th><b>Teorico</b></th>
            <th><b>fisico</b></th>
            <th><b>Dif - </b></th>
            <th><b>Dif + </b></th>
            <th><b>Cost Teorico</b></th>
            <th><b>cost Fisico</b></th>
            <th><b>cost Dif -</b></th>
            <th><b>cost Dif +</b></th>
		</thead>
	<tbody>
		<?php while($row = mysql_fetch_array($resultado)): ?>
			<tr>
				<td><?php echo $row['localidad']; ?></td>
				<td><?php echo $row['ubicacion']; ?></td>
                <td><?php echo $row['idcontrol']; ?></td>
                <td><?php echo $row['idalterno']; ?></td>
                <td><?php echo $row['descrip']; ?></td>
                <td ALIGN=center><?php echo $row['unidad']; ?></td>
                <td ALIGN=right><?php echo $row['costo']; ?></td>
				<td ALIGN=center><?php echo $row['existencias']; ?></td>
                <td ALIGN=center><?php echo $row['fisico']; ?></td>
                <td ALIGN=center><?php if ($row['fisico']-$row['existencias']<0) {
                    echo ($row['fisico']-$row['existencias']);
                }?></td>
                <td ALIGN=center><?php if ($row['fisico']-$row['existencias']>0) {
                    echo ($row['fisico']-$row['existencias']);
                }?></td>
                <td ALIGN=center><?php echo ($row['existencias']*$row['costo']); ?></td>
                <td ALIGN=center><?php echo ($row['fisico']*$row['costo']); ?></td>
                <td ALIGN=right><?php if ($row['fisico']-$row['existencias']<0) {
                    echo (number_format(($row['fisico']-$row['existencias'])*$row['costo'],2,".",","));
                }?></td>
                <td ALIGN=right><?php if ($row['fisico']-$row['existencias']>0) {
                    echo (number_format(($row['fisico']-$row['existencias'])*$row['costo'],2,".",","));
                }?></td>
            </tr>
		<?php endwhile; ?>
	</tbody>	
</table>
<br>
<br>
</section>
<footer>
            Papelera internacional, S.A.
        </footer>
    </body>
</html>