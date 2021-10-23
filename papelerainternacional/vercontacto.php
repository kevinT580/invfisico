<?php include("includes/header.php");?>
<?php 

if(isset($_SESSION["estado_sesion"])){
    $sesion = $_SESSION["estado_sesion"];
    $tipo = $_SESSION["tipo"];
    if($tipo == 'Operador' || $tipo == 'Administrador' ){
        include("conexion/conexion.php"); 
        $id = $_GET["id"];
        $con = conectar();
        $sql1 = "SELECT * FROM contacto where ID_Contacto = $id";
        $sql2 = "SELECT p.Nombre FROM productos P JOIN asig_productos AP ON AP.ID_Producto = P.ID_Producto WHERE AP.ID_Contacto = $id;";
        $query = mysqli_query($con, $sql1);
        $arrCliente = mysqli_fetch_array($query);
    }else{
        Header("Location: login.php");
    }
}else {
    Header("Location: login.php");
}
 
?>

    <main class="contenedor">
        <div class="cliente_seccion">
            <div class="card"> 
                <div class="productos_contacto">
                    <h2>Productos</h2>
                    <hr>
                    <ol>
                        <?php 
                        $query2 = mysqli_query($con, $sql2);
                        while($arr2 = mysqli_fetch_array($query2)){ ?>
                            <li><?php echo $arr2["Nombre"] ?></li>
                        <?php } ?>
                    </ol>
                    <hr>
                    <h2>Tipo: <?php echo "<span>".$arrCliente["Tipo"]."</span>"?></h2>
                    <hr>
                    <h2>Telefono: <span>+<?php echo $arrCliente["Cod_Area"]." ".$arrCliente["Telefono"]."</span>" ?></h2>
                    <h2>Correo: <?php echo "<span>".$arrCliente["Correo"]."</span>" ?></h2>
                    <?php 
                        if($arrCliente["Ciudad"] != ""){
                            echo "<hr>";
                            echo "<h2>".$arrCliente["Ciudad"]."</h2>";
                        }
                    ?>

                </div>
            </div>
            <div class="mesaje_seccion">
                <h1><?php echo $arrCliente["Nombre"]." ".$arrCliente["Apellido"] . " <span>".$arrCliente["Pais"]."</span>";?></h1>
                <div class="mensaje_contacto">
                    <p><?php echo $arrCliente["Mensaje"];?></p>
                    <?php 
                        if($arrCliente["Motivo_queja"] != ""){
                        echo "<p>Tipo: Queja <br>".$arrCliente["Motivo_queja"]."</p>";
                    }?>
                    
                </div>
            </div>
        </div>
    </main>
<?php include("includes/footer.php");?>