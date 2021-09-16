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

    if (!isset($_POST["factura"])) {
        $factura = "0";
    } else {
        $factura = ($_POST["factura"]);
    }

    $fech_venta = $_POST["fecha"];
    $cod_emp = $_POST["codigo"];
    $cant_vend = $_POST["cantidad"];
    $tot_venta = $_POST["total"];

    //Iniciamos programaciones
    require "conexion.php";
    try {
        $query = "CALL SP_Ventas('$factura','$fech_venta','$cod_emp','$cant_vend','$tot_venta','$Tipo_Accion')";
        $resultado = $mysqli->query($query);
        switch ($Tipo_Accion) {
            case "I":
    ?>
                <h2>Venta Guardada Con Exito</h2>
                <a href="../Formularios/mVentas.php">
                    <input class="w3-button w3-round w3-orange w3-section" type="button" value="Regresar">
                </a>
            <?php
                break;

            case "A":
            ?>
                <h2>Usuario Actualizado con Exito!</h2>
                <a href="../Formularios/mVentas.php">
                    <input class="w3-button w3-round w3-orange w3-section" type="button" value="Regresar">
                </a>
            <?php
                break;
            case "E":
            ?>
                <h2>Usuario Eliminado con Exito!</h2>
                <a href="../Formularios/mVentas.php">
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