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

    $codigo_suministros = $_POST["codigo"];
    $nombre_suministros = $_POST["nombre"];
    $tipo_suministros = $_POST["tipo"];
    $cantidad_inventario = $_POST["cantidad"];
    $elaboracion_suministros = $_POST["elaboracion"];
    $vencimiento_suministros = $_POST["vencimiento"];
    $reciente_suministros = $_POST["reciente"];
    $codigo_empleado = $_POST["codigo"];
    //Iniciamos programaciones
    require "conexion.php";
    try {
        $query = "CALL SP_suministros($codigo_suministros,'$nombre_suministros','$tipo_suministros','$cantidad_suministros','$elaboracion_suministros','$reciente_suministro','$codigo_empleado','$Tipo_Accion')";
        $resultado = $mysqli->query($query);
        switch ($Tipo_Accion) {
            case "I":
    ?>
                <h2>Suministros Ingresado con Exito!</h2>
                <a href="../Formularios/Suministros.php">
                    <input class="w3-button w3-round w3-orange w3-section" type="button" value="Regresar">
                </a>
            <?php
                break;
            case "A":
            ?>
                <h2>Suministros Actualizado con Exito!</h2>
                <a href="../Formularios/Suministros.php">
                    <input class="w3-button w3-round w3-orange w3-section" type="button" value="Regresar">
                </a>
            <?php
                break;
            case "E":
            ?>
                <h2>Suministros Eliminado con Exito!</h2>
                <a href="../Formularios/Suministros.php">
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