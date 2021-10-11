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
            REPUESTOS TOMA FISICA DE INVENTARIO 
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
                
            <p><b>Estanteria:</b>			      
            <input type="text" id="estante" name="estanteria">
            <input type="submit" name="envio" value="IR"/>
        </form>
		
		<script src="js/jquery.js"></script>
		<script src="js/jquery-ui.min.js"></script>
		<script type="text/javascript">
	
	
	
	
		$(document).ready(function() {
 
		$('#estante').autocomplete({
			source: function(request, response){
				$.ajax({
					url:"buscaauto.php",
					dataType:"json",
					data:{q:request.term},
					success: function(data){
						response(data);
					}
 
				});
			},
			minLength: 1,
			select: function(event,ui){
			}
          
    
		});
 
		});
		</script>
		
		
		
        </section>
        <footer>
            Papelera internacional, S.A.
        </footer>
    </body>
</html>