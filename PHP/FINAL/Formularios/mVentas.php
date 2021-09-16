<?php
session_start();
if (!isset($_SESSION['usuario'])) {

    header("location: ../index.php");
} else {
    require "../Funciones/conexion.php";

    try {

        $cod_emp = $_SESSION['ID'];
        $factura = "";
        $fecha = "";
        $cantidad = "";
        $total = "";




        if (isset($_GET['ID'])) {
            $query2 = "SELECT * from tabla_ventas where factura='" . $_GET['ID'] . "'";
            $resultado2 = $mysqli->query($query2);
            while ($row2 = $resultado2->fetch_assoc()) {
                $cod_emp = $row2['cod_emp'];
                $factura = $row2['factura'];
                $fecha = $row2['fech_venta'];
                $cantidad = $row2['cant_vend'];
                $total = $row2['tot_venta'];
            }
        }
        $query = "SELECT * from tabla_ventas";
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
                <h2>Ventas</h2>
            </b>
        </div>
        <div class="w3-container">
            <form id action="../Funciones/FmVentas.php" method="POST">
                <div class="w3-container w3-cell w3-border">
                    <table class=" w3-table">
                        <tr>
                            <td><b>Factura:</b></td>
                            <td>
                                <input class="w3-input w3-border" type="text" name="factura" value="<?php echo $factura; ?>" readonly>

                            </td>
                        </tr>
                        <tr>
                            <td><b>Fecha de Venta:</b></td>
                            <td>
                                <input class="w3-input w3-border" type="datetime-local" name="fecha" value="<?php echo $fecha; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td><b>Codigo Empleado:</b></td>
                            <td>
                                <input class="w3-input w3-border" type="text" name="codigo" required value="<?php echo $_SESSION['ID']; ?> " readonly>
                            </td>
                        </tr>
                        <tr>
                            <td><b>Cantidad de Ventas:</b></td>
                            <td>
                                <input class="w3-input w3-border" type="text" name="cantidad" value="<?php echo $cantidad; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td><b>Total Ventas:</b></td>
                            <td>
                                <input class="w3-input w3-border" type="text" name="total" value="<?php echo $total; ?>">
                            </td>
                        </tr>
                    </table>
                    <div>
                            <button class="w3-button w3-round w3-orange w3-section" type="submit" name="Tipo_Accion" value="I">agregar</button>
                            <button class="w3-button w3-round w3-orange w3-section" type="submit" name="Tipo_Accion" value="A">Modificar</button>
                            <button class="w3-button w3-round w3-orange w3-section" type="submit" name="Tipo_Accion" value="E">Eliminar</button>
                            <button class="w3-button w3-round w3-orange w3-section" type="reset" value="reset">Cancelar</button>
                        </div>
                </div>
                <div class="w3-container w3-cell ">
                    <table class="w3-table-all">
                        <?php

                        //Codigo PHP para Tablas
                        echo
                        "<tr>
                                        <th>Factura</th>
                                        <th>Fecha de Venta</th>
                                        <th>Codigo de Usuario</th>
                                        <th>Cantidad Vendidas</th>
                                        <th>Total Ventas</th>
                                        <th></th>
                                    <tr/>";
                        while ($row = $resultado->fetch_assoc()) { ?>
                            <tr>
                                <td><?php echo $row['factura']; ?> </td>
                                <td><?php echo $row['fech_venta']; ?> </td>
                                <td><?php echo $row['cod_emp']; ?> </td>
                                <td><?php echo $row['cant_vend']; ?> </td>
                                <td><?php echo $row['tot_venta']; ?> </td>
                                <td>
                                    <center><a href="./mVentas.php?ID=<?php echo $row['factura']; ?>">Seleccionar</a>
                                    </center>
                                </td>
                            </tr>
                        <?php }

                        ?>
                    </table>
                </div>

            </form>
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