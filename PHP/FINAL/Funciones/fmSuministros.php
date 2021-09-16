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
    if (!isset($_POST["cod_sum"])) {
        $cod_sum = "0";
    } else {
        $cod_sum = ($_POST["cod_sum"]);
    }

    $nom_sum = $_POST["nom_sum"];
    $tip_sum = $_POST["tip_sum"];
    $cant_inv = $_POST["cant_inv"];
    $elab_sum = $_POST["elab_sum"];
    $venc_sum = $_POST["venc_sum"];
    $rec_sum = $_POST["rec_sum"];
    $cod_emp = $_POST["cod_emp"];

    //Iniciamos programaciones
    require "conexion.php";
    try {
        $query = "CALL SP_Suministros('$cod_sum','$nom_sum','$tip_sum','$cant_inv','$elab_sum','$venc_sum','$rec_sum','$cod_emp','$Tipo_Accion')";
        if($mysqli->query($query)){
        switch ($Tipo_Accion) {
            case "I":
    ?>
                <h2>Suministro Ingresado con Exito!</h2>
                <a href="../Formularios/mSuministros.php">
                    <input class="w3-button w3-round w3-orange w3-section" type="button" value="Regresar">
                </a>
            <?php
                break;
            case "A":
            ?>
                <h2>Suministro Actualizado con Exito!</h2>
                <a href="../Formularios/mSuministros.php">
                    <input class="w3-button w3-round w3-orange w3-section" type="button" value="Regresar">
                </a>
            <?php
                break;
            case "E":
            ?>
                <h2>Suministro Eliminado con Exito!</h2>
                <a href="../Formularios/mSuministros.php">
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