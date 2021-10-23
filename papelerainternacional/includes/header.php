<?php 
    session_start();
    if(isset($_SESSION["estado_sesion"])){
        $sesion = $_SESSION["estado_sesion"];
        $tipo = $_SESSION["tipo"];
    }else {
        $sesion = false;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
    <header class="header">
        <div class="contenedor">
            <div class="navegacion">
                    <?php 
                        if($sesion){
                           echo "<a href=\"#\">";
                        }else{
                            echo "<a href=\"index.php\">";
                        }   
                    ?>
                    <img src="images/Logo_PapeleraInternacional.png" alt="logo">
                </a>
                <div class="nav">
                    <nav class="navegacion_principal">
                    <?php 
                        if(!$sesion){
                            echo"<a href=\"index.php\">HOME</a>";
                        }
                    ?>
                        <a href="contacto.php">CONTACTO</span></a>
                        <?php 
                        if($sesion){
                            if( $sesion || $sesion != null){
                                if($tipo == "Administrador" || $tipo == "Operador"){
                                    echo "<a href=\"admincontacto.php\">CLIENTES A CONTACTAR</a>";
                                    echo "<a href=\"acciones/logout.php\">SALIR</a>";
                                }
                            }
                        }else{
                            echo "<a href=\"login.php\">LOGIN</a>"; 
                        }
                        
                        ?>
                    </nav>
                </div>
            </div>
        </div>
    </header>