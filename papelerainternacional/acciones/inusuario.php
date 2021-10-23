<?php
    include("../conexion/conexion.php");

    $nombre   = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $correo   = $_POST["correo"];
    $pais     = $_POST["pais"];
    $cod_area = $_POST["area"];
    $telefono = $_POST["telefono"];
    $mensaje  = $_POST["mensaje"];

    $con = conectar();

    $query = "INSERT INTO contacto (Nombre, Apellido, Correo, Pais, Cod_Area, Telefono, Mensaje, Tipo, Estado) VALUES ('$nombre', '$apellido', '$correo', '$pais', '$cod_area', '$telefono', '$mensaje','Contacto', '1');";
    $command = mysqli_query($con,$query);
    $lastid = mysqli_insert_id($con); 

    if(!empty($_POST["check"]) ){
        foreach($_POST["check"] as $select){
            $query1 = "INSERT INTO asig_productos (ID_Contacto, ID_Producto) VALUES ('$lastid','$select')";
            $command2 = mysqli_query($con,$query1);
        }
        
    }

    if($command2){
        Header("Location: ../contacto.php");
    }
?>