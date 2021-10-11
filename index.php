<?php
    include_once("modulos/Enrutador.php");
    include_once("modulos/Controlador.php");
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>Inventario Fisico</title>
		<link href="css/jquery-ui.css" rel="stylesheet">
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
            TOMA FISICA DE INVENTARIO
        </header>

        <nav>
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="vistas/rcompara.php">Compara</a></li>
                <li><a href="vistas/faltantes.php">Faltantes</a></li>
                <li><a href="vistas/diferencias.php">Diferencias</a></li>
            </ul>
        </nav>

        <section>
        <br>    
        <a href="ak129/index.php"><input type="submit" name="Repuestos" value="Repuestos" /></a>
        <a href="aunif2/index.php"><input type="submit" name="Repuestos" value="Uniformes" /></a>
        <a href="apape2/index.php"><input type="submit" name="Repuestos" value="Libreria" /></a><br><br>
        <a href="semi/index.php"><input type="submit" name="Repuestos" value="Semielaborado" /></a>
        <a href="Constru/index.php"><input type="submit" name="Repuestos" value="Construccion" /></a>
        <a href="acomb2/index.php"><input type="submit" name="Repuestos" value="Combustibles" /></a>
        <a href="avest/index.php"><input type="submit" name="Repuestos" value="Mallas" /></a>
        <a href="amatco/index.php"><input type="submit" name="Repuestos" value="Amatco" /></a>
        <a href="aconv/index.php"><input type="submit" name="Repuestos" value="K10" /></a>
        <br>
        </section>
        <footer>
            Papelera internacional, S.A.
        </footer>
    </body>
</html>