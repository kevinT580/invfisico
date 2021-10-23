<?php include("includes/header.php");?>
<!DOCTYPE html>
<html lang="es-Es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">

 <link rel="stylesheet" href="css/estilos_login.css">
    <title>Login y Registro</title>
    </head>

<body>
    <main>
        <div class="contenedor_todo">
            <div class="caja_trasera">
                <div class="caja_trasera_login">
                    <h3>¿Ya tienes una cuenta?</h3>
                    <p>inicia sesion para entrar en la pagina</p>
                    <button id="btn_iniciar sesion">iniciar sesion</button>
                </div>

                <div class="caja_trasera_register">
                    <h3>¿aun no tienes una cuenta?</h3>
                    <p>Registrate para que puedas iniciar sesion</p>
                    <button id="btn_registrarse">Registrarse</button>
                </div>
            </div>
                        <!--formulario de login y registro-->
            <div class="contenedor_login_register">
                <form action="" class="formulario_login" method="POST">
                    <h2>iniciar sesion</h2>
                    <input type="text" placeholder="correo electronico" name="correo">
                    <input type="password" placeholder="contraseña" name="contrasena">
                    <input type="submit" class="boton" value="Entrar" name="login">
                </form>
                         <!--registro-->
                <form action="" method="POST" class="formulario_register">
                    <h2>registrarse</h2>
                    <input type="text" placeholder="nombre completo" name="nombre_completo" required>
                    <input type="text" placeholder="correo electronico" name="correo_usuario" required>
                    <input type="text" placeholder="usuario" name="usuario" required>
                    <input type="password" placeholder="contraseña" name="contrasena_usuario" required>
                    <input type="submit" class="boton" value="Registrarse" name="registrar">
                </form>
            </div>
        </div>
    </main>

    <?php
    session_start();
    include("conexion/conexion.php");
    $con = conectar();

    if(isset($_POST["login"])){        
        $correo = $_POST["correo"];
        $password = $_POST["contrasena"];
        $sql = "SELECT * FROM usuarios WHERE Correo = '$correo' AND Contrasena = SHA('$password') AND Estado = 1;";
        $query = mysqli_query($con,$sql);
        $usuario = mysqli_fetch_array($query);
        if( $usuario["Tipo"] != null){
            $_SESSION["tipo"]=$usuario["Tipo"];
            $_SESSION["estado_sesion"] = true;
            Header("Location: admincontacto.php");
        }else{
            session_destroy();
            Header("Location: login.php");
        }
    }
    
    if(isset($_POST["registrar"])){
        $nombre_completo = $_POST["nombre_completo"];
        $correo = $_POST["correo_usuario"];
        $usuario = $_POST["usuario"];
        $password = $_POST["contrasena_usuario"];
        $sql = "INSERT	INTO usuarios (Nombre,Correo,Usuario,Contrasena,Tipo,Estado) VALUES ('$nombre_completo','$correo','$usuario',SHA('$password'),'Cliente',1);";
        $query = mysqli_query($con,$sql);
        if($query){
            $_SESSION["tipo"]="Cliente";
            $_SESSION["estado_sesion"] = true;
            Header("Location: admincontacto.php");
        }else{
            session_destroy();
            Header("Location: login.php");
        }
    }
    ?>
    
        <script src="js/script.js"></script>
</body>
</html>