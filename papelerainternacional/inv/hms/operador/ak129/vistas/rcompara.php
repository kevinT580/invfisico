
<?php 
    include_once('../clases/Conexion.php');
    $con = new Conexion();
    $sql = "SELECT * FROM ak129 WHERE existencias!=fisico order by localidad,ubicacion,idcontrol,idalterno";
    $resultado = $con->consultaRetorno($sql);
    $tCosto=0;
    $tExistencia=0;
    $tFisico=0;
    $tDifMenos=0; 
    $tDifMas=0; 
    $tCostTeorico=0;
    $tCostFisico=0;
    $tCostDifMenos=0;
    $tCostDifMas=0;
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>Inventario Fisico</title>
        <style>
            table {
                width: 100%;
                border-collapse: collapse;
            }
            table, th {
                border: 1px solid black;
            }
            td {
                border: 1px solid black;
                font-size: 75%;
            }
            body{
                background: gray;
                font-family: Helvetica;
                }
            section{
                background: white;
                padding: 5px;
                width: 100%;
                }
            header{
                background: white;
                font-size: 35px;
                padding: 5px;
                width: 100%;
                }
            nav, footer{
                background: #333;
                padding: 5px;
                color: white;
                width: 100%;
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


            table th {background-color: #33D1FF; }

            table tr:nth-child(odd) {background-color: #FFFFFF;}

            table tr:nth-child(even) {background-color: #72C8F9;}

            
        </style>
    </head>
    <body>
        <header>
            REPORTE COMPARA DIFERENCIAS INVENTARIO
        </header>

        <nav>
            <ul>
                <li><a href="/inv/invfisico/papelerainternacional/inv/hms/admin/dashboard.php">Inicio</a></li>
            </ul>
        </nav>
        <section>
            
        <table>
            <thead>
            <th><b>Bodega</b></th>
            <th><b>Ubicacion</b></th>
            <th><b>ID Control</b></th>
            <th><b>Descripcion</b></th>
            <th><b>Unidad</b></th>
            <th><b>Costo</b></th>
            <th><b>Teorico</b></th>
            <th><b>fisico</b></th>
            <th><b>Dif - </b></th>
            <th><b>Dif + </b></th>
            <th><b>Cost Teorico</b></th>
            <th><b>cost Fisico</b></th>
            <th><b>cost Dif -</b></th>
            <th><b>cost Dif +</b></th>
        </thead>
    <tbody>
        <?php while($row = $resultado->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['localidad']; ?></td>
                <td><?php echo $row['ubicacion']; ?></td>
                <td><?php echo $row['idcontrol']; ?></td>
                <td><?php echo $row['descrip']; ?></td>
                <td ALIGN=center><?php echo $row['unidad']; ?></td>
                <td ALIGN=right><?php echo number_format($row['costo'],2,".",","); ?></td>
                <td ALIGN=center><?php echo number_format($row['existencias'],0,".",","); ?></td>
                <td ALIGN=center><?php echo $row['fisico']; ?></td>
                <td ALIGN=center><?php if ($row['fisico']-$row['existencias']<0) {
                    echo ($row['fisico']-$row['existencias']);
                }?></td>
                <td ALIGN=center><?php if ($row['fisico']-$row['existencias']>0) {
                    echo ($row['fisico']-$row['existencias']);
                }?></td>
                <td ALIGN=center><?php echo number_format($row['existencias']*$row['costo'],2,".",","); ?></td>
                <td ALIGN=center><?php echo number_format($row['fisico']*$row['costo'],2,".",","); ?></td>
                
                <td ALIGN=right><?php if ($row['fisico']-$row['existencias']<0) {
                    echo (number_format(($row['fisico']-$row['existencias'])*$row['costo'],2,".",","));
                }?></td>
                <td ALIGN=right><?php if ($row['fisico']-$row['existencias']>0) {
                    echo (number_format(($row['fisico']-$row['existencias'])*$row['costo'],2,".",","));
                }?></td>
                <?php $tCosto = $tCosto + $row['costo']?>
                <?php $tExistencia = $tExistencia + $row['existencias']?>
                <?php $tFisico = $tFisico + $row['fisico']?>
                <?php if ($row['fisico']-$row['existencias']<0) $tDifMenos = $tDifMenos + ($row['fisico']-$row['existencias']);?>
                <?php if ($row['fisico']-$row['existencias']>0) $tDifMas = $tDifMas + ($row['fisico']-$row['existencias']);?>
                <?php $tCostTeorico = $tCostTeorico + ($row['existencias']*$row['costo'])?>
                <?php $tCostFisico = $tCostFisico + ($row['fisico']*$row['costo'])?>
                <?php if ($row['fisico']-$row['existencias']<0) $tCostDifMenos = $tCostDifMenos + (($row['fisico']-$row['existencias'])*$row['costo']);?>
                <?php if ($row['fisico']-$row['existencias']>0) $tCostDifMas = $tCostDifMas + (($row['fisico']-$row['existencias'])*$row['costo']);?>
            </tr>
        <?php endwhile; ?>
    </tbody>
    <tfoot>
            <tr>
                <td colspan="5"; ALIGN=center><h3>TOTAL GENERA</h3></td>
                <td ALIGN=right><h3><?php echo number_format($tCosto,2,".",",");?></h3></td>
                <td ALIGN=right><h3><?php echo number_format($tExistencia,0,".",",");?></h3></td>
                <td ALIGN=center><h3><?php echo number_format($tFisico,0,".",",");?></h3></td>
                <td ALIGN=center><h3><?php echo ($tDifMenos);?></h3></td>
                <td ALIGN=center><h3><?php echo ($tDifMas);?></h3></td>
                <td ALIGN=right><h3><?php echo number_format($tCostTeorico,2,".",",");?></h3></td>
                <td ALIGN=right><h3><?php echo number_format($tCostFisico,2,".",",");?></h3></td>
                <td ALIGN=right><h3><?php echo number_format($tCostDifMenos,2,".",",");?></h3></td>
                <td ALIGN=right><h3><?php echo number_format($tCostDifMas,2,".",",");?></h3></td>
            </tr>
       </tfoot>    






</table>
<br>
<br>
</section>
<footer>
            Papelera internacional, S.A.
        </footer>
    </body>
</html>