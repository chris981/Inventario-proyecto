<html>
<html>

<head>
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <link href="../CSS/w3.css" rel="stylesheet">
</head>

<body>
    <?php
    //Definimos el tipo de accion tomada en el formulario principal
    $Tipo_Accion = $_POST["Tipo_Accion"];

    //definimos las variables que obtenemos del formulario principal
    if (!isset($_POST["codigo"])) {
        $codigo = "0";
    } else {
        $codigo = ($_POST["codigo"]);
    }

    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $horario = $_POST["horario"];
    $usuario = $_POST["usuario"];
    $clave = $_POST["clave"];
    $residencia = $_POST["residencia"];
    $cant_ventas = $_POST["cant_ventas"];
    $cant_din_ventas =$_POST["cant_din_ventas"];

    //Iniciamos programaciones
    require "conexion.php";
    try {
        $query = "CALL SP_Empleados($codigo,'$usuario','$clave','$nombre','$apellido','$residencia','$horario','$cant_ventas','$cant_din_ventas','$Tipo_Accion')";
        $resultado = $mysqli->query($query);
        switch ($Tipo_Accion) {
            case "I":
    ?>
                <h2>Usuario Ingresado con Exito!</h2>
                <a href="../Formularios/mEmpleados.php">
                    <input class="w3-button w3-round w3-orange w3-section" type="button" value="Regresar">
                </a>
            <?php
                break;
            case "A":
            ?>
                <h2>Usuario Actualizado con Exito!</h2>
                <a href="../Formularios/mEmpleados.php">
                    <input class="w3-button w3-round w3-orange w3-section" type="button" value="Regresar">
                </a>
            <?php
                break;
            case "E":
            ?>
                <h2>Usuario Eliminado con Exito!</h2>
                <a href="../Formularios/mEmpleados.php">
                    <input class="w3-button w3-round w3-orange w3-section" type="button" value="Regresar">
                </a>
        <?php
                break;
        }
    } catch (Exception $ex) {
        ?>
        <h2>Error: <?php echo $ex; ?></h2>
    <?php
    }
    ?>
</body>

</html>