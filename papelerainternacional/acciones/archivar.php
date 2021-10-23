<?php 
    include("../conexion/conexion.php");
    $id = $_GET["id"];

    $con = conectar();

    $query = "UPDATE contacto SET Estado = 0 WHERE ID_Contacto = $id ";
    $command = mysqli_query($con,$query);

    if($command){
        Header("Location: ../admincontacto.php");
    }