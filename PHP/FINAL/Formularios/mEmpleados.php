<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("location: ../index.php");
} else {
    require "../funciones/conexion.php";
    try {
        $cod_emp = ""; //$_SESSION['ID'];
        $nombre = "";
        $apellido = "";
        $horario = "";
        $usuario = "";
        $clave = "";
        $residencia = "";
        $cant_ventas = "";
        $cant_din_ventas = "";

        if (isset($_GET['ID'])) {
            $query2 = "select * from tabla_empleados where cod_emp='" . $_GET['ID'] . "'";
            $resultado2 = $mysqli->query($query2);
            while ($row2 = $resultado2->fetch_assoc()) {
                $nombre = $row2['nom_emp'];
                $cod_emp = $row2['cod_emp'];
                $apellido = $row2['ape_emp'];
                $horario = $row2['hor_emp'];
                $usuario = $row2['usu_emp'];
                $clave = $row2['cont_emp'];
                $residencia = $row2['res_emp'];
                $cant_ventas = $row2['cant_ventas'];
                $cant_din_ventas = $row2['cant_din_ventas'];
            }
        }
        $query = "select * from tabla_empleados";
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
                <h2>Mantenimiento a Empleados</h2>
            </b>
        </div>
        <div class="w3-container">
            <form id action="../Funciones/fmEmpleados.php" method="POST">
                <div class="w3-container w3-cell w3-border">
                    <table class=" w3-table">
                        <tr>
                            <td><b>Codigo:</b></td>
                            <td>
                                <input class="w3-input w3-border" type="text" name="codigo" value="<?php echo $cod_emp; ?>" readonly>
                            </td>
                        </tr>
                        <tr>
                            <td><b>Usuario:</b></td>
                            <td>
                                <input class="w3-input w3-border" type="text" name="usuario" required value="<?php echo $usuario; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td><b>Clave:</b></td>
                            <td>
                                <input class="w3-input w3-border" type="password" name="clave" required value="<?php echo $clave; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td><b>Nombre</b></td>
                            <td>
                                <input class="w3-input w3-border" type="text" name="nombre" required value="<?php echo $nombre; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td><b>Apellido:</b></td>
                            <td>
                                <input class="w3-input w3-border" type="text" name="apellido" required value="<?php echo $apellido; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td><b>Horario:</b></td>
                            <td>
                                <select name="horario" class="w3-select">
                                    <?php
                                    switch ($horario) {
                                        default;
                                    ?>
                                            <option disabled selected></option>
                                            <option value="Mañana">Mañana</option>
                                            <option value="Tarde">Tarde</option>
                                        <?php
                                            break;
                                        case "Mañana";
                                        ?>
                                            <option disabled></option>
                                            <option value="Mañana" selected>Mañana</option>
                                            <option value="Tarde">Tarde</option>
                                        <?php
                                            break;
                                        case "Tarde";
                                        ?>
                                            <option disabled ></option>
                                            <option value="Mañana">Mañana</option>
                                            <option value="Tarde" selected>Tarde</option>
                                    <?php
                                            break;
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><b>Residencia:</b></td>
                            <td>
                                <input class="w3-input w3-border" type="text" name="residencia" required value="<?php echo $residencia; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td><b>Cantidad en Ventas:</b></td>
                            <td>
                                <input class="w3-input w3-border" type="text" name="cant_ventas" required value="<?php echo $cant_ventas; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td><b>Cantidad Dinero Ventas:</b></td>
                            <td>
                                <input class="w3-input w3-border" type="text" name="cant_din_ventas" required value="<?php echo $cant_din_ventas; ?>">
                            </td>
                        </tr>
                    </table>
                    <div>
                        <a class="w3-button w3-round w3-orange w3-section"  href='mEmpleados.php'>Nuevo</a>
                        <button class="w3-button w3-round w3-orange w3-section" type="submit" name="Tipo_Accion" value="I">Agregar</button>
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
                            <th>Codigo</th>
                            <th>Usuario</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Residencia</th>
                            <th>Horario</th>
                            <th>Cantidad Ventas</th>
                            <th>Cantidad Dinero</th>
                            <th></th>
                        <tr/>";
                        while ($row = $resultado->fetch_assoc()) { ?>
                            <tr>
                                <td><?php echo $row['cod_emp']; ?> </td>
                                 <td><?php echo $row['usu_emp']; ?> </td>
                                 <td><?php echo $row['nom_emp']; ?> </td>
                                 <td><?php echo $row['ape_emp']; ?> </td>
                                 <td><?php echo $row['res_emp']; ?> </td>
                                 <td><?php echo $row['hor_emp']; ?> </td>
                                 <td><?php echo $row['cant_ventas']; ?> </td>
                                 <td><?php echo $row['cant_din_ventas']; ?> </td>
                                <td><center><a href="./mEmpleados.php?ID=<?php echo $row['cod_emp'];?>">Seleccionar</a></center>
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