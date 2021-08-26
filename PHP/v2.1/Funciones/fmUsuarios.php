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
if ($_POST["codigo"] == "N") {
    $codigo = "0";
} else {
    $codigo = ($_POST["codigo"]);
}

$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$tipo = $_POST["tipo"];
$usuario = $_POST["usuario"];
$clave = $_POST["clave"];

//Iniciamos programaciones
require "conexion.php";
try {
    $query = "CALL SP_Usuarios($codigo,'$nombre','$apellido','$tipo','$usuario','$clave','$Tipo_Accion')";
    $resultado = $mysqli->query($query);
    switch ($Tipo_Accion) {
        case "I":
            ?>
    <h2>Usuario Ingresado con Exito!</h2>
    <a href="../Formularios/mUsuarios.php">
        <input class="w3-button w3-round w3-orange w3-section" type="button" value="Regresar">
    </a>
    <?php
            break;
        case "A":
            ?>
    <h2>Usuario Actualizado con Exito!</h2>
    <a href="../Formularios/mUsuarios.php">
        <input class="w3-button w3-round w3-orange w3-section" type="button" value="Regresar">
    </a>
    <?php
            break;
        case "E":
            ?>
    <h2>Usuario Eliminado con Exito!</h2>
    <a href="../Formularios/mUsuarios.php">
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