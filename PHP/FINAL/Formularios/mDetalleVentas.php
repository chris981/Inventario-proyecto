<?php
session_start();
if (!isset($_SESSION['usuario'])) {

    header("location: ../index.php");
} else {
    require "../Funciones/conexion.php";

    try {
        $factura = "";
        $cod_sum = "";
        $cod_menu = "";
        if (isset($_GET['factura'])) {
            $query2 = "SELECT * from detalle_ventas where factura =" . $_GET['factura'] . "";
            $resultado2 = $mysqli->query($query2);
            while ($row2 = $resultado2->fetch_assoc()) {
                $factura = $row2['factura'];
                $cod_sum = $row2['cod_sum'];
                $cod_menu = $row2['cod_menu'];
            }
        }
        $query = "SELECT * from detalle_ventas";
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
                <h2>Detalle de Ventas</h2>
            </b>
        </div>
        <div class="w3-container">
            <form id action="../Funciones/FmDetalleVentas.php" method="POST">
                <div class="w3-container w3-cell w3-border">
                    <table class=" w3-table">
                        <tr>
                            <td><b>Factura:</b></td>
                            <td>
                                <input class="w3-input w3-border" type="text" name="factura" value="<?php echo $factura; ?>" required>

                            </td>
                        </tr>
                        <tr>
                            <td><b>Codigo Suministro:</b></td>
                            <td>
                                <input class="w3-input w3-border" type="text" name="cod_sum" value="<?php echo $cod_sum; ?>" required>
                            </td>
                        </tr>
                        <tr>
                            <td><b>Codigo Menu:</b></td>
                            <td>
                                <input class="w3-input w3-border" type="text" name="cod_menu" required value="<?php echo $cod_menu ?> " required>
                            </td>
                        </tr>
                    </table>
                    <div>
                        <a class="w3-button w3-round w3-orange w3-section" href='mDetalleVentas.php'>Nuevo</a>
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
                                        <th>Codigo Suministro</th>
                                        <th>Codigo Menu</th>
                                        <th></th>
                                    <tr/>";
                        while ($row = $resultado->fetch_assoc()) { ?>
                            <tr>
                                <td><?php echo $row['factura']; ?> </td>
                                <td><?php echo $row['cod_sum']; ?> </td>
                                <td><?php echo $row['cod_menu']; ?> </td>
                                <td>
                                    <center><a href="./mDetalleVentas.php?factura=<?php echo $row['factura']; ?>">Seleccionar</a>
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