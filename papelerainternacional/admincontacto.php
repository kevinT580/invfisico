<?php include 'includes/header.php'?>

<?php  

    if(isset($_SESSION["estado_sesion"])){
        $sesion = $_SESSION["estado_sesion"];
        $tipo = $_SESSION["tipo"];

        if($tipo == 'Operador' || $tipo == 'Administrador' ){
            include("conexion/conexion.php"); 
            $con = conectar();
            $sql = "SELECT * FROM Contacto WHERE Estado = 1;";
            $query = mysqli_query($con, $sql);
        }else{
            Header("Location: login.php");
        }
        
    }else {
        Header("Location: login.php");
    }



?>

    <main class="contenedor">
        <h1 class="contactos_ad" >Listado de clientes a contactar</h1>
        <table class="tabla_contacto" >
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Pais</th>
                    <th>Motivo</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                    <?php 
                        while($row = mysqli_fetch_array($query)){
                    ?>
                    <tr>
                        <td><?php echo $row["Nombre"]." ".$row["Apellido"]?></td>
                        <td><?php echo $row["Pais"]?></td>
                        <td><?php echo ($row["Tipo"] != "Queja" ?  $row["Tipo"] : "<span class=\"danger\">".$row["Tipo"]."</span>")  ?></td>
                        <td><a href="vercontacto.php?id=<?php echo $row["ID_Contacto"]?>" class="boton btn_verde">Ver</a></td>
                        <td><a href="acciones/archivar.php?id=<?php echo $row["ID_Contacto"]?>" class="boton btn_principal">Archivar</a></td>
                    </tr>
                    <?php } ?>
            </tbody>
        </table>
    </main>
<?php include 'includes/footer.php';?>