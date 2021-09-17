<?php
session_start();
if (!isset($_SESSION['usuario'])) {

    header("location: ../index.php");
} else {
    require "../Funciones/conexion.php";

    try {
        $query = 
        "select tabla_ventas.factura, tabla_suministros.nom_sum,tabla_suministros.tip_sum, tabla_suministros.elab_sum, 
        tabla_suministros.venc_sum, tabla_empleados.nom_emp from tabla_ventas 
        inner join detalle_ventas on detalle_ventas.factura=tabla_ventas.factura 
        inner join tabla_suministros on tabla_suministros.cod_sum = detalle_ventas.cod_sum 
        inner join tabla_empleados on tabla_suministros.cod_emp=tabla_empleados.cod_emp";
        $resultado = $mysqli->query($query);
    } catch (Exception $ex) {
    }
?>
    <!DOCTYPE html>
    <html>


    <head>
        <meta content="width=device-width, initial-scale=1" name="viewport">
        <link href="../CSS/w3.css" rel="stylesheet">
    </head>

    <body>
        <?php
        // Copiar siempre
        include "./menu.php";
        ?>
        <div class="w3-card w3-margin w3-center">
            <b>
                <h2>Reporte de Ventas</h2>
            </b>
        </div>
        <div class="w3-container">
            <div class="w3-container w3-cell ">
                <table class="w3-table-all">
                    <?php

                    //Codigo PHP para Tablas
                    echo
                    "<tr>
                        <th>Factura</th>
                        <th>Nombre Suministro</th>      
                        <th>Tipo Suministro</th>     
                        <th>Fecha Elaborado</th>     
                        <th>Fecha Vencimiento</th>           
                        <th>Nombre de Empleado</th>  
                    <tr/>";
                    while ($row = $resultado->fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo $row['factura']; ?> </td>
                            <td><?php echo $row['nom_sum']; ?> </td>
                            <td><?php echo $row['tip_sum']; ?> </td>
                            <td><?php echo $row['elab_sum']; ?> </td>
                            <td><?php echo $row['venc_sum']; ?> </td>
                            <td><?php echo $row['nom_emp']; ?> </td>
                    <?php }

                    ?>
                </table>
            </div>
        </div>
    </body>
    <script>
        function myFunction() {
            var x = document.getElementById("demo");
            if (x.className.indexOf("w3-show") == -1) {
                x.className += " w3-show";
            } else {
                x.className = x.className.replace(" w3-show", "");
            }
        }
    </script>

    </html>
<?php }
?>