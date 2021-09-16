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
    if (!isset($_POST["Codigofritura"])) {
        $codigo = "0";
    } else {
        $codigo = ($_POST["Codigofritura"]);
    }
    $cantidadFritura = $_POST["Cantidad"];
    $codigoEmpleado = $_POST["Codigoempleado"];
    $horarioFritura = $_POST["HorarioFritura"];
    $cambioRBD = $_POST["CambioRBD"];
    $codigoempcambio = $_POST["CodigoempleadoCambio"];
    $codigofre = $_POST["Codigofreidora"];
    //Iniciamos programaciones
    require "conexion.php";
    try {
        $query = "CALL SP_controlfrituras('$codigo','$cantidadFritura','$codigoEmpleado','$horarioFritura','$cambioRBD','$codigoempcambio','$codigofre','$Tipo_Accion')";
        echo $query;
        echo $_POST["Codigofritura"];
        if($mysqli->query($query)){
        switch ($Tipo_Accion) {
            case "I":
    ?>
                <h2>Cambio agregado de RBD!</h2>
                <a href="../Formularios/mControlRBDFrituras.php">
                    <input class="w3-button w3-round w3-orange w3-section" type="button" value="Regresar">
                </a>
            <?php
                break;
            case "A":
            ?>
                <h2>Actualizacion de RBD!</h2>
                <a href="../Formularios/mControlRBDFrituras.php">
                    <input class="w3-button w3-round w3-orange w3-section" type="button" value="Regresar">
                </a>
            <?php
                break;
            case "E":
            ?>
                <h2>RBD Eliminado!</h2>
                <a href="../Formularios/mControlRBDFrituras.php">
                    <input class="w3-button w3-round w3-orange w3-section" type="button" value="Regresar">
                </a>
        <?php
                break;
        }}
        else{
            ?>
            <h2>Error: <?php echo $mysqli -> error; ?></h2>
            <?php
        }
    } catch (Exception $ex) {
        ?>
        <h2>Error: <?php echo $ex; ?></h2>
    <?php
    }
    ?>
</body>

</html>