<?php
	session_start();
	if (!isset($_SESSION['usuario']))
	{
		header("location: ../index.php");	
    }else
    {
    require "../Funciones/conexion.php";
    try {
        $cod_sum="";
        $nom_sum="";
        $tip_sum="";
        $cant_inv="";
        $elab_sum="";
        $venc_sum="";
        $rec_sum="";
        $cod_emp=$_SESSION['ID'];
            
        if(isset($_GET['codigo_sum'])){
            $query2 = "SELECT * from tabla_suministros where cod_sum='" . $_GET['codigo_sum'] . "'";
            $resultado2 = $mysqli->query($query2);
            while ($row2=$resultado2->fetch_assoc())
            {
                $cod_sum=$row2['cod_sum'];
                $nom_sum=$row2['nom_sum'];
                $tip_sum=$row2['tip_sum'];
                $cant_inv=$row2['cant_inv'];
                $elab_sum=$row2['elab_sum'];
                $venc_sum=$row2['venc_sum'];
                $rec_sum=$row2['rec_sum'];
                $cod_emp=$_SESSION['ID'];
            }
        }
        $query = "SELECT * from tabla_suministros";
        $resultado = $mysqli->query($query);
    }catch(Exception $ex){}
?>

<!DOCTYPE html>
<html>

<head>
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <link href="../CSS/w3.css" rel="stylesheet">
</head>

<body>
    <?php
        // Copiar siempre
        include "./menu.php";
    ?>
    <div class="w3-card w3-margin w3-center">
        <b>
            <h2>Solicitud de Pedidos</h2>
        </b>
    </div>
    <div class="w3-container">
        <form id action="../Funciones/fmSuministros.php" method="POST">
            <div class="w3-container w3-cell w3-border">
                <table class=" w3-table">
                    <tr>
                        <td><b>Codigo Suministro:</b></td>
                        <td>
                            <input class="w3-input w3-border" type="text" name="cod_sum" value="<?php echo $cod_sum ?>" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td><b>Nombre Suministro:</b></td>
                        <td>
                            <input class="w3-input w3-border" type="text" name="nom_sum" value="<?php echo $nom_sum ?>" required>
                        </td>
                    </tr>
                    <tr>
                        <td><b>Tipo Suministro:</b></td>
                        <td>
                            <input class="w3-input w3-border" type="text" name="tip_sum" value="<?php echo $tip_sum ?>" required>
                        </td>
                    </tr>
                    <tr>
                        <td><b>Cantidad Inventario:</b></td>
                        <td>
                            <input class="w3-input w3-border" type="text" name="cant_inv" value="<?php echo $cant_inv ?>" required>
                        </td>
                    </tr>
                    <tr>
                        <td><b>Elaboracion Suministro:</b></td>
                        <td>
                            <input class="w3-input w3-border" type="text" name="elab_sum" value="<?php echo $elab_sum ?>" required>
                        </td>
                    </tr>
                    <tr>
                        <td><b>Vencimiento Suministro:</b></td>
                        <td>
                            <input class="w3-input w3-border" type="text" name="venc_sum" value="<?php echo $venc_sum ?>" required>
                        </td>
                    </tr>
                    <tr>
                        <td><b>Recepcion Suministro:</b></td>
                        <td>
                            <input class="w3-input w3-border" type="text" name="rec_sum" value="<?php echo $rec_sum ?>" required>
                        </td>
                    </tr>
                    <tr>
                        <td><b>Codigo Empleado:</b></td>
                        <td>
                            <input class="w3-input w3-border" type="text" name="cod_emp" value="<?php echo $_SESSION['ID']; ?>" readonly>
                        </td>
                    </tr>
                </table>
                <div>
                    <a class="w3-button w3-round w3-orange w3-section"  href='../Formularios/mSuministros.php'>Nuevo</a>
                    <button class="w3-button w3-round w3-orange w3-section" type="submit" name="Tipo_Accion" value="I">Agregar</button>
                    <button class="w3-button w3-round w3-orange w3-section" type="submit" name="Tipo_Accion" value="A">Modificar</button>
                    <button class="w3-button w3-round w3-orange w3-section" type="submit" name="Tipo_Accion" value="E">Eliminar</button>
                    <button class="w3-button w3-round w3-orange w3-section" type="reset" value="reset">Cancelar</button>
                </div>
            </div>
            <div class="w3-container w3-cell ">
                <table class="w3-table-all">
                    <?php

                            //Codigo PHP para Tablas
                                echo 
                                    "<tr>
                                        <th>Codigo Suminisitros</th>
                                        <th>Nombre Suminitro</th>
                                        <th>Tipo Suministro</th>
                                        <th>Cantidad Inventario</th>
                                        <th>Elaboracion Suministro</th>
                                        <th>Vencimiento Suministro</th>
                                        <th>Recepcion Suministro</th>
                                        <th>Codigo Empleado</th>
                                        <th></th>
                                    <tr/>";
                                   while($row=$resultado->fetch_assoc()){?>
                    <tr>
                        <td><?php echo $row['cod_sum'];?> </td>
                        <td><?php echo $row['nom_sum']; ?> </td>
                        <td><?php echo $row['tip_sum']; ?> </td>
                        <td><?php echo $row['cant_inv']; ?> </td>
                        <td><?php echo $row['elab_sum']; ?> </td>
                        <td><?php echo $row['venc_sum']; ?> </td>
                        <td><?php echo $row['rec_sum']; ?> </td>
                        <td><?php echo $row['cod_emp']; ?> </td>
                        <td>
                            <center><a href="./mSuministros.php?codigo_sum=<?php echo $row['cod_sum'];?>">Seleccionar</a>
                            </center>  
                        </td>
                    </tr>
                    <?php }
                    ?>
                </table>
            </div>

        </form>
    </div>
</body>
<script>
function myFunction() {
    var x = document.getElementById("demo");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else {
        x.className = x.className.replace(" w3-show", "");
    }
}
</script>

</html>
<?php }
?>