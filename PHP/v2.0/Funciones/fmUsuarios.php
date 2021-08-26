<?php

	session_start();	

    require 'conexion.php';
    $tipo_funcion =$_POST["tipo_f"];
    $nombre =$_POST["nombre"];
    $apellido=$_POST["apellido"];

    switch($tipo_funcion)
    {

        case "I":
            insertar();
            break;
        case "M":
            modificar();
            break;
        case "E":
            eliminar();
            break;
    }
    function insertar(){

    }
    function modificar(){

    }

    function eliminar(){

    }
    
    
    $query = "SELECT * FROM tabla_usuarios";
    $resultado = $mysqli->query($query);
    $ingreso=0;
    
    while($row=$resultado->fetch_assoc())
    { 
        if($usuario==$row['usu_emp'] && $password==$row['con_usu'])
        {
            $ingreso=1;
            $ROL=$row['usu_tipo'];
            $_SESSION['usuario']=$usuario;
    		$_SESSION['rol']=$ROL;
        }
    }
    if($ingreso==1 )
        { 
            header("location: ../Formularios/Main.php");
        } else
        {
        ?>
<html>

<head>
    <meta>
    <link href="../CSS/w3.css" rel="stylesheet">
</head>

<body>

    <h1>Usuario o clave incorrectos</h1>
    <a href="../index.php">
        <input class="w3-button w3-round w3-orange w3-section" type="button" value="Regresar">
    </a>
</body>

</html>
<?php }?>