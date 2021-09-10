<?php
	session_start();
	if (isset($_SESSION['usuario']))
	{
		header("location: ../index.php");	
    }else
    {
        require "../Funciones/conexion.php";
        try {
            $query = "select * from tabla_suministros";
            $resultado = $mysqli->query($query);
        }catch(Exception $ex){}

?>
<!DOCTYPE html>
<html>

<head>
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <link href="../CSS/w3.css" rel="stylesheet">
</head>

<body>
    <div class="w3-bar w3-orange">
        <b><a class="w3-bar-item w3-button" href="../Formularios/Main.php">Inicio</a></b>
        <div class="w3-dropdown-hover">
            <button class="w3-button">Mantenimiento</button>
            <div class="w3-dropdown-content w3-bar-block w3-card-4">
                <a href="../Formularios/mUsuarios.php" class="w3-bar-item w3-button">Empleados</a>
                
            </div>
        </div>
        <a class="w3-bar-item w3-button w3-hide-small" href="#">Control Mensual </a>
        <a class="w3_bar-item w3-button w3-hide-small" href="../Formularios/ControlRBDFrituras.php">Control RBD Frituras</a>   
        <a class="w3_bar-item w3-button w3-hide-small" href="#">Ventas</a>
        <a class="w3_bar-item w3-button w3-hide-small" href="#">Freidora</a>
        <a class="w3-bar-item w3-button w3-hide-small" href="../Formularios/Suministros.php">Suministros</a>
        <a class="w3_bar-item w3-button w3-hide-small" href="../Funciones/logout.php">Salir</a>
        <a class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium" href="javascript:void(0)"
            onclick="myFunction()">&#9776;</a>
        <div id="demo" class="w3-bar-block w3-orange w3-hide w3-hide-large w3-hide-medium">
                <a class="w3-bar-item w3-button" href="#">Control Mensual </a>
                <a class="w3-bar-item w3-button" href="../Formularios/ControlRBDFrituras.php">Control RBD Frituras</a>
                <a class="w3-bar-item w3-button" href="#">Ventas</a>
                <a class="w3-bar-item w3-button" href="#">Freidora</a>
                <a class="w3-bar-item w3-button" href="../Formularios/Suministros.php">Suministros</a>
            <a class="w3_bar-item w3-button w3-hide-small" href="../Funciones/logout.php">Salir</a>
        </div>
    </div>
    <?php
        // Copiar siempre
    ?>
    <div class="w3-card w3-margin w3-center">
        <b>
            <h2>Mantenimiento a Suministros</h2>
        </b>
    </div>
    <div class="w3-container">
        <form id action="../Funciones/fmSuministros.php" method="POST">
            <div class="w3-container w3-cell w3-border">
                <table class=" w3-table">
                    <tr>
                        <td><b>Codigo Suministros:</b></td>
                        <td>
                            <input class="w3-input w3-border" type="text" name="codigo" disabled>
                        </td>
                    </tr>
                    <tr>
                        <td><b>Nombre de Suministros:</b></td>
                        <td>
                            <input class="w3-input w3-border" type="text" name="nombre" required>
                        </td>
                    </tr>
                    <tr>
                        <td><b>tipo de Suministros:</b></td>
                        <td>
                            <input class="w3-input w3-border" type="text" name="Tipo" required>
                        </td>
                    </tr>
                    <tr>
                        <td><b>cantidad inventario:</b></td>
                        <td>
                        <input class="w3-input w3-border" type="text" name="Cantidad" required>
                        </td>
                    </tr>
                    <tr>
                        <td><b>Elaborados:</b></td>
                        <td>
                            <input class="w3-input w3-border" type="text" name="Elaborados" required>
                        </td>
                    </tr>
                    <tr>
                        <td><b>Vencimiento:</b></td>
                        <td>
                            <input class="w3-input w3-border" type="text" name="Vencimiento" required>
                        </td>
                    </tr>
                    <tr>
                        <td><b>Reciente:</b></td>
                        <td>
                            <input class="w3-input w3-border" type="text" name="Reciente" required>
                        </td>
                    </tr>
                    <tr>
                        <td><b>Codigo Empleado:</b></td>
                        <td>
                            <input class="w3-input w3-border" type="text" name="codigo" required>
                        </td>
                    </tr>
                </table>
                <div>
                    <button class="w3-button w3-round w3-orange w3-section" type="reset" value="reset">Nuevo</button>
                    <button class="w3-button w3-round w3-orange w3-section" type="submit" name="Tipo_Accion"
                        value="I">Agregar</button>
                    <button class="w3-button w3-round w3-orange w3-section" type="submit" name="Tipo_Accion"
                        value="A">Modificar</button>
                    <button class="w3-button w3-round w3-orange w3-section" type="submit" name="Tipo_Accion"
                        value="E">Eliminar</button>
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
                                        <th>Nombre</th>
                                        <th>tipo</th>
                                        <th>cantidad</th>
                                        <th>elaborados</th>
                                        <th>vencimiento</th>
                                        <th>reciente</th>
                                        <th>codigo empleado</th>
                                        <th></th>
                                    <tr/>";
                                   while($row=$resultado->fetch_assoc()){?>
                    <tr>
                        <td><?php echo $row['cod_sum'];?> </td>
                        <td><?php echo $row['nom_sum']; ?> </td>
                        <td><?php echo $row['tip_sum']; ?> </td>
                        <td><?php echo $row['cant_inv']; ?> </td>
                        <td><?php echo $row['elab_sum']; ?> </td>
                        <td><?php echo $row['venc_sum']; ?> </td>
                        <td><?php echo $row['rec_sum']; ?> </td>
                        <td><?php echo $row['cod_emp']; ?> </td>
                        <td>
                            <center><a href="#">Seleccionar</a>
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