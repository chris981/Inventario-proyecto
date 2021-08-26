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
                <a href="../Formularios/mUsuarios.php" class="w3-bar-item w3-button">Usuarios</a>
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

</body>

</html>
<?php }
?>