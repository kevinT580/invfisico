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
    <body>
        <header>
            REPUESTOS TOMA FISICA DE INVENTARIO
        </header>

        <nav>
            <ul>
                <li><a href="../admin.php">Inicio</a></li>
            </ul>
        </nav>
<section>
<?php 
	include_once('../clases/Conexion.php');
	if(isset($_POST['envio']))
	{
		$con = new Conexion();
		$sql2 = "UPDATE const SET sta='{$_POST['conteo']}' ";
		$con->consultaSimple($sql2);
		print("Conteo Actualizado");
	}
	else
	{
		header('Location: index.php');
	}
?>
</section>
		<footer>
			<br>
            Papelera internacional, S.A.
        </footer>
    </body>
</html>