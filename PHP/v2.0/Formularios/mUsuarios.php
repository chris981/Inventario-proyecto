<?php
	session_start();
	if (!isset($_SESSION['usuario']))
	{
		header("location: ../index.php");	
    }else
    {
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
                <a href="#" class="w3-bar-item w3-button">Usuarios</a>
                <a href="#" class="w3-bar-item w3-button">Empleados</a>
            </div>
        </div>
        <a class="w3-bar-item w3-button w3-hide-small" href="#">Control Mensual </a>
        <a class="w3_bar-item w3-button w3-hide-small" href="#">Controles</a>
        <a class="w3_bar-item w3-button w3-hide-small" href="#">Control RBD Frituras</a>
        <a class="w3_bar-item w3-button w3-hide-small" href="#">Recepcion de Frituras</a>
        <a class="w3_bar-item w3-button w3-hide-small" href="#">Control Mensual y Pollo Refrigerado</a>
        <a class="w3_bar-item w3-button w3-hide-small" href="#">Controles Mensual Refrescos</a>
        <a class="w3_bar-item w3-button w3-hide-small" href="../Funciones/logout.php">Salir</a>
        <a class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium" href="javascript:void(0)"
            onclick="myFunction()">&#9776;</a>

        <div id="demo" class="w3-bar-block w3-orange w3-hide w3-hide-large w3-hide-medium">
            <a class="w3-bar-item w3-button" href="#">Control Mensual </a>
            <a class="w3-bar-item w3-button" href="#">Controles</a>
            <a class="w3-bar-item w3-button" href="#">Control RBD Frituras</a>
            <a class="w3-bar-item w3-button" href="#">Recepcion de Frituras</a>
            <a class="w3-bar-item w3-button" href="#">Control Mensual y Pollor Refrigerado</a>
            <a class="w3-bar-item w3-button" href="#">Control Mensual Refrescos</a>
            <a class="w3_bar-item w3-button w3-hide-small" href="../Funciones/logout.php">Salir</a>
        </div>
    </div>
    <?php
        // Copiar siempre
    ?>
    <div class="w3-card w3-margin w3-center">
        <b><h2>Mantenimiento a Usuarios</h2></b>
    </div>
    <div>
        <table>
            <tr>
                <td>
                    <div>
                        <table class=" w3-table">
                            <tr>
                                <td><b>Codigo Empleado:</b></td>
                                <td>
                                    <input class="w3-input w3-border" type="text" name="codigo_empleado" value="<?php echo date("Y/m/d");?>" disabled> 
                                </td>
                            </tr>
                            <tr>
                                <td><b>Nombre de Empleado:</b></td>
                                <td>
                                    <input class="w3-input w3-border" type="text" name="nombre_empleado">
                                </td>
                            </tr>
                            <tr>
                                <td><b>Apellido de Empleado:</b></td>
                                <td>
                                    <input class="w3-input w3-border" type="text" name="apellido_empleado">
                                </td>
                            </tr>
                            <tr>
                                <td><b>Lugar de Residencia:</b></td>
                                <td>
                                    <input class="w3-input w3-border" type="text" name="nombre_empleado">
                                </td>
                            </tr>
                            <tr>
                                <td><b>Horario:</b></td>
                                <td>
                                    <select name="horario" class="w3-select">
                                        <option disabled selected></option>
                                        <option value="AM">AM</option>
                                        <option value="PM">PM</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><b>Usuario:</b></td>
                                <td>
                                    <input class="w3-input w3-border" type="text" name="nombre_empleado">
                                </td>
                            </tr>
                            <tr>
                                <td><b>Clave:</b></td>
                                <td>
                                    <input class="w3-input w3-border" type="password" name="nombre_empleado">
                                </td>
                            </tr>
                        </table>
                    </div>
                </td>
                <td>
                    <div>
                        <table class="w3-table-all">
                            <?php

                            //Codigo PHP para Tablas
                                echo 
                                    "<tr>
                                        <th>Codigo</th>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Lugar de Resicencia</th>
                                        <th>Horario</th>
                                        <th>Usuario</th>
                                        <th>Clave</th>
                                    <tr/>";
                                   for ($x = 0; $x <= 5; $x++) {
                                    echo "<tr><td>Fila: $x </td></tr>" ;
                                  } 
                            ?>
                        </table>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <button class="w3-button w3-round w3-orange w3-section"  type="" formmethod="POST" >Nuevo</button>
                    <button class="w3-button w3-round w3-orange w3-section">Agregar</button>
                    <button class="w3-button w3-round w3-orange w3-section">Modificar</button>
                    <button class="w3-button w3-round w3-orange w3-section">Eliminar</button>
                    <button class="w3-button w3-round w3-orange w3-section">Cancelar</button>
                </td>
                <td></td>
            </tr>
            </tr>
        </table>
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