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
                <li><a href="../index.php">Inicio</a></li>
            </ul>
        </nav>
<section>
<?php 
	include_once('../clases/Conexion.php');
	if(isset($_POST['envio']))
	{
		$con = new Conexion();
		if(isset($_POST['conteo1']))
		{
			$sql2 = "UPDATE ak129 SET fisico='{$_POST['conteo1']}',conteo1='{$_POST['conteo1']}',sta=1 WHERE id ='{$_POST['id']}'";
			$con->consultaSimple($sql2);
			print("Conteo 1 !! Grabado ¡¡");
		}
		else
		{
			if (isset($_POST['conteo2'])) 
			{
				$sql2 = "UPDATE ak129 SET fisico='{$_POST['conteo2']}',conteo2='{$_POST['conteo2']}',sta=2 WHERE id ='{$_POST['id']}'";
				$con->consultaSimple($sql2);
				print("Conteo 2 !! Grabado ¡¡");
			}
			else
			{
				if (isset($_POST['conteo3'])) 
				{
				$sql2 = "UPDATE ak129 SET fisico='{$_POST['conteo3']}',conteo3='{$_POST['conteo3']}',sta=3 WHERE id ='{$_POST['id']}'";
				$con->consultaSimple($sql2);
				print("Conteo 3 !! Grabado ¡¡");
				}
				else
				{
					if (isset($_POST['conteo4'])) 
					{
					$sql2 = "UPDATE ak129 SET fisico='{$_POST['conteo4']}',conteo4='{$_POST['conteo4']}', sta=4 WHERE id ='{$_POST['id']}'";
					$con->consultaSimple($sql2);
					print("Conteo 4 !! Grabado ¡¡");
					}
					else
					{
						if (isset($_POST['conteo5'])) 
						{
						$sql2 = "UPDATE ak129 SET fisico='{$_POST['conteo5']}',conteo5='{$_POST['conteo5']}', sta=5 WHERE id ='{$_POST['id']}'";
						$con->consultaSimple($sql2);
						print("Conteo 5 !! Grabado ¡¡");
						}
					}
				}
			}
		}
		?>
		<br><br>
		<form action="../vistas/ver.php" method="POST" >
			<input type="hidden" name= "estanteria" value=<?php echo($_POST['estanteria']);?>>
        	<input type="submit" name= "envio" value="Regresar"/>
		</form>
		<?php		
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