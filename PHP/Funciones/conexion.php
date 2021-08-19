<?php
    $mysqli=new mysqli("sql309.epizy.com ","epiz_29473380","XIEKhaRzZw","epiz_29473380_Pollera");
    if(mysqli_connect_errno())
    {
        echo "Conexion Fallida",  mysqli_connect_errno();
        exit();
    }
?> 