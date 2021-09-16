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
    if (!isset($_POST["num_ped"])) {
        $num_ped = "0";
    } else {
        $num_ped = ($_POST["num_ped"]);
    }

    $nom_sum = $_POST["nom_sum"];
    $fecha = $_POST["fecha"];
    $tipo_sum = $_POST["tipo_sum"];
    $cant_soli = $_POST["cant_soli"];
    $cod_emp = $_POST["cod_emp"];

    //Iniciamos programaciones
    require "conexion.php";
    try {
        $query = "CALL SP_Solicitud_Pedidos('$num_ped','$nom_sum','$fecha','$tipo_sum','$cant_soli','$cod_emp','$Tipo_Accion')";
        if($mysqli->query($query)){
        switch ($Tipo_Accion) {
            case "I":
    ?>
                <h2>Pedido Ingresado con Exito!</h2>
                <a href="../Formularios/mSolicitudPedidos.php">
                    <input class="w3-button w3-round w3-orange w3-section" type="button" value="Regresar">
                </a>
            <?php
                break;
            case "A":
            ?>
                <h2>Pedido Actualizado con Exito!</h2>
                <a href="../Formularios/mSolicitudPedidos.php">
                    <input class="w3-button w3-round w3-orange w3-section" type="button" value="Regresar">
                </a>
            <?php
                break;
            case "E":
            ?>
                <h2>Pedido Eliminado con Exito!</h2>
                <a href="../Formularios/mSolicitudPedidos.php">
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