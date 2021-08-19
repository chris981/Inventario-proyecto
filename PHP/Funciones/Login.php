<?php

	session_start();	

    require 'conexion.php';
    $usuario=$_POST['usr'];
    $password=$_POST['psw'];  
    
    
    $query = "SELECT * FROM usuarios";
    $resultado = $mysqli->query($query);
    $ingreso=0;
    
    while($row=$resultado->fetch_assoc())
    { 
        if($usuario==$row['user'] && $password==$row['pass'])
        {
            $ingreso=1;
            $ROL=$row['Type'];
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