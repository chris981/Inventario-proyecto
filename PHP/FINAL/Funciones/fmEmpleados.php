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
    $codigo = ($_POST["codigo"]);
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $horario = $_POST["horario"];
    $usuario = $_POST["usuario"];
    $clave = $_POST["clave"];
    $residencia = $_POST["residencia"];
    $cant_ventas = $_POST["cant_ventas"];
    $cant_din_ventas = $_POST["cant_din_ventas"];
    $tipo = $_POST["tipo"];


    //Iniciamos programaciones
    try {
        require "conexion.php";
        switch ($Tipo_Accion) {
            case "I":
                $query1 = "select * from tabla_empleados where usu_emp='$usuario'";
                $resultado = $mysqli->query($query1);
                if ($resultado->num_rows < 1) {
                    $query = "CALL SP_Empleados($codigo,'$usuario','$clave','$nombre','$apellido','$residencia','$horario','$tipo','$cant_ventas','$cant_din_ventas','$Tipo_Accion')";
                    if ($mysqli->query($query)) {
                    ?>
                        <h2>Usuario Ingresado con Exito!</h2>
                        <a href="../Formularios/mEmpleados.php">
                            <input class="w3-button w3-round w3-orange w3-section" type="button" value="Regresar">
                        </a>
                    <?php
                    } else {
                    ?>
                        <h2>Error: <?php echo $mysqli->error; ?></h2>
                    <?php
                    }
                } else {
                    ?>
                    <h2>Nombre de usuario ya existente</h2>
                    <a href="../Formularios/mEmpleados.php">
                        <input class="w3-button w3-round w3-orange w3-section" type="button" value="Regresar">
                    </a>
                <?php
                }
                break;
            case "A":
                $query = "CALL SP_Empleados($codigo,'$usuario','$clave','$nombre','$apellido','$residencia','$horario','$tipo','$cant_ventas','$cant_din_ventas','$Tipo_Accion')";
                if ($mysqli->query($query)) {
                ?>
                    <h2>Usuario Actualizado con Exito!</h2>
                    <a href="../Formularios/mEmpleados.php">
                        <input class="w3-button w3-round w3-orange w3-section" type="button" value="Regresar">
                    </a>
                <?php
                } else {
                ?>
                    <h2>Error: <?php echo $mysqli->error; ?></h2>
                <?php
                }
                break;
            case "E":
                $query = "CALL SP_Empleados($codigo,'$usuario','$clave','$nombre','$apellido','$residencia','$horario','$tipo','$cant_ventas','$cant_din_ventas','$Tipo_Accion')";
                if ($mysqli->query($query)) {
                ?>
                    <h2>Usuario Eliminado con Exito!</h2>
                    <a href="../Formularios/mEmpleados.php">
                        <input class="w3-button w3-round w3-orange w3-section" type="button" value="Regresar">
                    </a>
                <?php
                } else {
                ?>
                    <h2>Error: <?php echo $mysqli->error; ?></h2>
        <?php
                }
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