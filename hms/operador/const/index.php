<?php
    include_once("modulos/Enrutador.php");
    include_once("modulos/Controlador.php");
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
            <form action="vistas/ver.php" method="POST" >
                <?php 
                $controlador = new controladorEstudiantes(); 
                $resultado = $controlador->index();
                ?>
            <p><b>Estanteria:</b>  
            <select name="estanteria">
            <?php
            while ( $row = mysql_fetch_array($resultado) )
            {
            ?>
            <option value="<?php echo $row['ubicacion']?>" >
            <?php echo $row['ubicacion']; ?>
            </option>
            <?php
        }
        ?>
        </select>
        <input type="submit" name="envio" value="IR"/>
        </form>
        </section>
        <footer>
            Papelera internacional, S.A.
        </footer>
    </body>
</html>