<?php
session_start();
if (!isset($_SESSION['usuario'])) {

    header("location: ../index.php");
} else {
    require "../Funciones/conexion.php";

    try {

        $codigo = "";
        $freidora = "";
        if (isset($_GET['codigo_fre'])) {
            $query2 = "SELECT * from tabla_freidoras where cod_fre='" . $_GET['codigo_fre'] . "'";
            $resultado2 = $mysqli->query($query2);
            while ($row2 = $resultado2->fetch_assoc()) {
                $codigo = $row2['cod_fre'];
                $freidora = $row2['info_fre'];
            }
        }
        $query = "SELECT * from tabla_freidoras";
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
                <h2>Freidoras</h2>
            </b>
        </div>
        <div class="w3-container">
            <form id action="../Funciones/fmFreidora.php" method="POST">
                <div class="w3-container w3-cell w3-border">
                    <table class=" w3-table">
                        <tr>
                            <td><b>Codigo Freidora:</b></td>
                            <td>
                                <input class="w3-input w3-border" type="text" name="codigo" value="<?php echo $codigo; ?>">

                            </td>
                        </tr>
                        <tr>
                            <td><b>Informacion de Freidoras:</b></td>
                            <td>
                                <input class="w3-input w3-border" type="text" name="freidora" value="<?php echo $freidora; ?>">
                            </td>
                        </tr>
                        <tr>

                    </table>
                    <div>
                        <a class="w3-button w3-round w3-orange w3-section" href='./mFreidora.php'>Nuevo</a>
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
                                        <th>Codigo de Freidoras</th>
                                        <th>Informacion de Freidoras</th>
                                        
                                        <th></th>
                                    <tr/>";
                        while ($row = $resultado->fetch_assoc()) { ?>
                            <tr>
                                <td><?php echo $row['cod_fre']; ?> </td>
                                <td><?php echo $row['info_fre']; ?> </td>

                                <td>
                                    <center><a href="./mFreidora.php?codigo_fre=<?php echo $row['cod_fre']; ?>">Seleccionar</a>
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