<?php 
	include_once('../clases/Conexion.php');
	if(isset($_GET['id'])){
		$con = new Conexion();
		$sql = "SELECT * FROM const WHERE id = '{$_GET['id']}'";
		$resultado = $con->consultaRetorno($sql);
		$row = mysql_fetch_assoc($resultado);
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
            body{
                  background: gray;
                  font-family: Helvetica;
            }
            section{
                  background: white;
                  padding: 5px;
                  width: 50%;
            }
            header{
                  background: white;
                  font-size: 35px;
                  padding: 5px;
                  width: 50%;
            }
            nav, footer{
                  background: #333;
                  padding: 5px;
                  color: white;
                  width: 50%;
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
            REPUESTOS FISICA DE INVENTARIO 
        </header>

        <nav>
            <ul>
               <li><a href="../index.php">Inicio</a></li>
            </ul>
        </nav>
        <section>
        <form action="editar.php" method="POST">
        	<b>Estanteria:</b> <?php echo $row['ubicacion']; ?>
        	<br>
        	<b>Codigo:</b> <?php echo $row['idcontrol']; ?>
        	<br>
        	<b>Descripcion:</b> <?php echo $row['descrip']; ?>
        	<br>
        	<b>Existencia:</b> <?php echo $row['existencias'];?>
        	<br>
            <b>Unidad Medida:</b> <?php echo $row['unidad'];?>
            <br>
            <?php if ($row['sta']==0) {?>
                <b>Conteo 1: </b><input type="number" name="conteo1"><?php 
            }elseif ($row['sta']==1) {?>
                <b>Conteo 1: </b><input type="number" name="conteo1"><?php
            }elseif ($row['sta']==2) { ?>
                <b>Conteo 1: </b><?php echo $row['conteo1'];?>
                <br>
                <b>Conteo 2: </b><input type="number" name="conteo2"><?php
            }elseif ($row['sta']==3) { ?>
                <b>Conteo 1: </b><?php echo $row['conteo1'];?>
                <br>
                <b>Conteo 2: </b><?php echo $row['conteo2'];?>
                <br>
                <b>Conteo 3: </b><input type="number" name="conteo3"><?php
            }elseif ($row['sta']==4) { ?>
                <b>Conteo 1: </b><?php echo $row['conteo1'];?>
                <br>
                <b>Conteo 2: </b><?php echo $row['conteo2'];?>
                <br>
                <b>Conteo 3: </b><?php echo $row['conteo3'];?>
                <br>
                <b>Conteo 4: </b><input type="number" name="conteo4"><?php
            }elseif ($row['sta']==5) { ?>
                <b>Conteo 1: </b><?php echo $row['conteo1'];?>
                <br>
                <b>Conteo 2: </b><?php echo $row['conteo2'];?>
                <br>
                <b>Conteo 3: </b><?php echo $row['conteo3'];?>
                <br>
                <b>Conteo 4: </b><?php echo $row['conteo4'];?>
                <br>
                <b>Conteo 5: </b><input type="number" name="conteo5"><?php
            }?>
        	<br>
        	<input type="hidden" name="estanteria" value=<?php echo $row['ubicacion']; ?>>
        	<input type="hidden" name="id" value=<?php echo $row['id']; ?>>
        	<input type="submit" name="envio" value="Grabar">
        </form>
        <br>
        <form action="../vistas/ver.php" method="POST" >
            <input type="hidden" name= "estanteria" value=<?php echo($row['ubicacion']);?>>
            <input type="submit" name= "envio" value="Regresar"/>
        </form>
        </section>
		<footer>
            Papelera internacional, S.A.
        </footer>
    </body>
</html>