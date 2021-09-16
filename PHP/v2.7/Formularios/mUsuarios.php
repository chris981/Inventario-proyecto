<?php
	session_start();
	if (isset($_SESSION['usuario']))
	{
		header("location: ../index.php");	
    }else
    {
        require "../Funciones/conexion.php";
        try {
            $query = "select * from tabla_empleados";
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
        <a class="w3_bar-item w3-button w3-hide-small" href="../Formularios/mControlRBDFrituras.php">Control RBD Frituras</a>   
        <a class="w3_bar-item w3-button w3-hide-small" href="#">Ventas</a>
        <a class="w3_bar-item w3-button w3-hide-small" href="">Freidora</a>
        <a class="w3-bar-item w3-button w3-hide-small" href="">Suministros</a>
        <a class="w3_bar-item w3-button w3-hide-small" href="../Funciones/logout.php">Salir</a>
        <a class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium" href="javascript:void(0)"
            onclick="myFunction()">&#9776;</a>
        <div id="demo" class="w3-bar-block w3-orange w3-hide w3-hide-large w3-hide-medium">
                <a class="w3-bar-item w3-button" href="#">Control Mensual </a>
                <a class="w3-bar-item w3-button" href="../Formularios/mControlRBDFrituras.php">Control RBD Frituras</a>
                <a class="w3-bar-item w3-button" href="#">Ventas</a>
                <a class="w3-bar-item w3-button" href="">Freidora</a>
                <a class="w3-bar-item w3-button" href="">Suministros</a>
            <a class="w3_bar-item w3-button w3-hide-small" href="../Funciones/logout.php">Salir</a>
        </div>
    </div>
    <?php
        // Copiar siempre
    ?>
    <div class="w3-card w3-margin w3-center">
        <b>
            <h2>Mantenimiento a Usuarios</h2>
        </b>
    </div>
    <div class="w3-container">
        <form id action="../Funciones/fmUsuarios.php" method="POST">
            <div class="w3-container w3-cell w3-border">
                <table class=" w3-table">
                    <tr>
                        <td><b>Codigo Empleado:</b></td>
                        <td>
                            <input class="w3-input w3-border" type="text" name="codigo" disabled>
                        </td>
                    </tr>
                    <tr>
                        <td><b>Nombre de Empleado:</b></td>
                        <td>
                            <input class="w3-input w3-border" type="text" name="nombre" required>
                        </td>
                    </tr>
                    <tr>
                        <td><b>Apellido de Empleado:</b></td>
                        <td>
                            <input class="w3-input w3-border" type="text" name="apellido" required>
                        </td>
                    </tr>
                    <tr>
                        <td><b>Tipo Usuario:</b></td>
                        <td>
                            <select name="tipo" class="w3-select">
                                <option disabled selected></option>
                                <option value="ADM">ADM</option>
                                <option value="USR">USR</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><b>Usuario:</b></td>
                        <td>
                            <input class="w3-input w3-border" type="text" name="usuario" required>
                        </td>
                    </tr>
                    <tr>
                        <td><b>Clave:</b></td>
                        <td>
                            <input class="w3-input w3-border" type="password" name="clave" required>
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
                                        <th>Apellido</th>
                                        <th>Tipo Usuario</th>
                                        <th>Usuario</th>
                                        <th></th>
                                    <tr/>";
                                   while($row=$resultado->fetch_assoc()){?>
                    <tr>
                        <td><?php echo $row['cod_emp'];?> </td>
                        <td><?php echo $row['nom_emp']; ?> </td>
                        <td><?php echo $row['ape_emp']; ?> </td>
                        <td><?php echo $row['tip_usu']; ?> </td>
                        <td><?php echo $row['usu_emp']; ?> </td>
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