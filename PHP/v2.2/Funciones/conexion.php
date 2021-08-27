<?php
    //$mysqli=new mysqli("sql309.epizy.com","epiz_29473380","XIEKhaRzZw","epiz_29473380_Pollera");
    $mysqli=new mysqli("localhost","test","Test2020!","dbpollera");
    if(mysqli_connect_errno())
    {
        die("Conexion Fallida". mysqli_connect_errno());
        exit();
    }
?> 