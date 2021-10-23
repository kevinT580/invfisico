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
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
        <header>
            REPUESTOS TOMA FISICA DE INVENTARIO 
        </header>

        <nav>
            <ul>
                <li><a href="index.php">Inicio</a></li>
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