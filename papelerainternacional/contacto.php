<?php include 'includes/header.php';?>
<?php include("conexion/conexion.php");
    $con = conectar();
    $sql = "SELECT * FROM productos WHERE Estado = '1'";
    $query = mysqli_query($con, $sql);
    $query2 = mysqli_query($con, $sql);
    
?>

    <section class="contenedor contenido">
        <h1>Contáctanos</h1>
        <div class="contenido_contacto">
            <p>Estimado usuario hemos dispuesto múltiples vias de contacto para acercarnos más hacia usted,
            de manera de ofrecer una comunicación más humana, ya que su opinión es muy importante para nosotros.
            Recuerde que cuenta con el Servicio al Cliente a través del número <span>+502 2427 1369</span> o si prefiere también
            puede enviarnos su comentario a través de nuestro formulario.</p>
        </div>
    </section>
    <section class="mapa">
        <div class="mapa_seccion">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3860.1642530546164!2d-90.43812269947944!3d14.646615839723058!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8589bd5b585b8977%3A0x6072dc9951cd7aa9!2sPapelera%20Internacional%2C%20Carr.%209%2C%20Cdad.%20de%20Guatemala!5e0!3m2!1ses!2sgt!4v1634347347525!5m2!1ses!2sgt" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" id="map"></iframe>
        </div>
    </section>
    <section class="direcciones">
        <div class="contenedor direcciones_contenedor" >
                <div class="guatemala">
                    <p> <span>Dirección de Oficinas</span> <br>
                    Km 10. Carretera al Atlántico Zona 17
                    Tel.: +502 2427 1300
                    Dirección Molino
                    Km. 129 Teculután. Zacapa
                    Tel.: +502 7929 1304
                    Filiales:</p>
                </div>
                <div class="el_salvador">
                    <p><span>El Salvador</span><br>
                    Tel.: +503 2317 5025
                    +503 2317 5026
                    </p>
                </div>
                <div class="honduras">
                    <p><span>Honduras San Pedro Sula</span><br>
                    Tel.: +504 2564 5420
                    +504 2559 5016
                    +504 2559 5037
                    +504 2559 5039
                    </p>
                </div>
                <div class="honduras_t">
                    <p><span>Honduras Tegucigalpa</span><br>
                    Tel.: es +504 2220 4178
                    Nicaragua
                    Tel.: +505 2220 4178
                    </p>
                </div>
                <div class="costa_rica">
                    <p><span>Costa Rica</span><br>
                    Tel.: +506 2251 3073
                    +506 2251 3046
                    +506 2251 3109</p>
                </div>
        </div>

    </section>
    <main class="contenedor">
        <div class="formularios">
            <div class="contacto">
                <h1>Contáctenos</h1>
                <form action="acciones/inusuario.php" method="POST">
                    <div class="contenedor_campos">
                        <div class="campos">
                            <label for="nombre">Nombre<span>*</span></label>
                            <input type="text" name="nombre" class="imput-text">
                        </div>
                        <div class="campos">
                            <label for="apellido">Apellido<span>*</span></label>
                            <input type="text" name="apellido" class="imput-text">
                        </div>
                        <div class="campos">
                            <label for="correo">Correo electrónico<span>*</span></label>
                            <input type="email" name="correo" class="imput-text">
                        </div>
                        <div class="campos">
                            <label for="pais">País<span>*</span></label>
                            <input type="text" name="pais" class="imput-text">
                        </div>
                        <div class="campos">
                            <label for="area">Código de área<span>*</span></label>
                            <input type="text" name="area" class="imput-text">
                        </div>
                        <div class="campos">
                            <label for="telefono">Número de Télefono<span>*</span></label>
                            <input type="tel" name="telefono" class="imput-text">
                        </div>
                        <div class="campos">
                            <label >Marcas de interés</label>
                            <?php while($arrProducto = mysqli_fetch_array($query)) {?>
                                <label><input type="checkbox" name="check[]" value="<?php echo $arrProducto["ID_Producto"]?>"><?php echo $arrProducto["Nombre"]?></label>
                            <?php }?>
                        </div>
                        <div class="campos">
                            <label for="mensaje">Mensaje<span>*</span></label>
                            <textarea name="mensaje" cols="30" rows="10" class="imput-text"></textarea>
                        </div>
                    </div>

                    <input type="submit" class="boton btn_principal" id="enviar" value="Enviar">
                </form>
            </div>
            <div class="quejas">
                <h1>Línea al Consumidor</h1>
                <form action="acciones/inqueja.php" method="POST">
                    <div class="contenedor_campos">
                        <div class="campos">
                            <label>Nombre<span>*</span></label>
                            <input type="text" name="nombre" class="imput-text">
                        </div>
                        <div class="campos">
                            <label >Apellido<span>*</span></label>
                            <input type="text" name="apellido" class="imput-text">
                        </div>
                        <div class="campos">
                            <label >Correo electrónico<span>*</span></label>
                            <input type="email" name="correo" class="imput-text">
                        </div>
                        <div class="campos">
                            <label >País<span>*</span></label>
                            <input type="text" name="pais" class="imput-text">
                        </div>
                        <div class="campos">
                        <label >Código de área<span>*</span></label>
                            <input type="text" name="area" class="imput-text">
                        </div>
                        <div class="campos">
                            <label >Número de Télefono<span>*</span></label>
                            <input type="tel" name="telefono" class="imput-text">
                        </div>
                        <div class="campos">
                            <label >Ciudad<span>*</span></label>
                            <input type="text" name="ciudad" class="imput-text">
                        </div>
                        <div class="campos">

                            <label for="queja">Motivo de la queja o reclamo<span>*</span></label>
                            <input type="tex" name="queja" class="imput-text">
                        </div>
                        <div class="campos">
                            <?php while($arrProducto2 = mysqli_fetch_array($query2)) {?>
                                <label><input type="checkbox" name="check_list[]" value="<?php echo $arrProducto2["ID_Producto"]?>"><?php echo $arrProducto2["Nombre"]?></label>
                            <?php }?>
                        </div>
                        <div class="campos campo_queja">
                            <label>Descripción de la queja o reclamo</label>
                            <textarea name="mensaje" cols="30" rows="10" class="imput-text"></textarea>
                        </div>

                    </div>
                    <input type="submit" class="boton btn_principal" id="enviar_queja" value="Enviar">
                </form>
            </div>
        </div>
    </main>
<?php include 'includes/footer.php';?>
