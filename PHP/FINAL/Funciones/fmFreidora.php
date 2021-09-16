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

    if (!isset($_POST["cod_fre"])) {
        $codigo = "0";
    } else {
        $cod_fre = ($_POST["cod_fre"]);
    }

    $cod_fre = $_POST["codigo"];
    $info_fre = $_POST["freidora"];
  

    //Iniciamos programaciones
    require "conexion.php";
    try {
        $query = "CALL SP_freidoras('$cod_fre','$info_fre','$Tipo_Accion')";
        $resultado = $mysqli->query($query);
        switch ($Tipo_Accion) {
            case "I":
    ?>
                <h2>Venta Guardada Con Exito</h2>
                <a href="../Formularios/mFreidora.php">
                    <input class="w3-button w3-round w3-orange w3-section" type="button" value="Regresar">
                </a>
            <?php
                break;

            case "A":
            ?>
                <h2>Venta Actualizada con Exito!</h2>
                <a href="../Formularios/mFreidora.php">
                    <input class="w3-button w3-round w3-orange w3-section" type="button" value="Regresar">
                </a>
            <?php
                break;
            case "E":
            ?>
                <h2>Venta Eliminada con Exito!</h2>
                <a href="../Formularios/mFreidora.php">
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