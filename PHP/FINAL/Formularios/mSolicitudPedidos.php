<?php
	session_start();
	if (!isset($_SESSION['usuario']))
	{
		header("location: ../index.php");	
    }else
    {
    require "../Funciones/conexion.php";
    try {
        $cod_emp=$_SESSION['ID'];
        $num_ped="";
        $nom_sum="";
        $fecha="";
        $tip_sum="";
        $cant_soli="";
            
        if(isset($_GET['numero_ped'])){
            $query2 = "SELECT * from tabla_solicitud_pedidos where num_ped='" . $_GET['numero_ped'] . "'";
            $resultado2 = $mysqli->query($query2);
            while ($row2=$resultado2->fetch_assoc())
            {
                $num_ped=$row2['num_ped'];
                $nom_sum=$row2['nom_sum'];
                $fecha=$row2['fecha'];
                $tip_sum=$row2['tip_sum'];
                $cant_soli=$row2['cant_soli'];
                $cod_emp=$_SESSION['ID'];
            }
        }
        $query = "SELECT * from tabla_solicitud_pedidos";
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
        <form id action="../Funciones/fmSolicitudPedidos.php" method="POST">
            <div class="w3-container w3-cell w3-border">
                <table class=" w3-table">
                    <tr>
                        <td><b>Numero de Pedido:</b></td>
                        <td>
                            <input class="w3-input w3-border" type="text" name="num_ped" value="<?php echo $num_ped ?>">
                        </td>
                    </tr>
                    <tr>
                        <td><b>Nombre Suministro Solicitado:</b></td>
                        <td>
                            <input class="w3-input w3-border" type="text" name="nom_sum" value="<?php echo $nom_sum ?>" required>
                        </td>
                    </tr>
                    <tr>
                        <td><b>Fecha de Pedido:</b></td>
                        <td>
                            <input class="w3-input w3-border" type="text" name="fecha" value="<?php echo $fecha ?>" required>
                        </td>
                    </tr>
                    <tr>
                        <td><b>Tipo de Suministros:</b></td>
                        <td>
                            <input class="w3-input w3-border" type="text" name="tipo_sum" value="<?php echo $tip_sum ?>" required>
                        </td>
                    </tr>
                    <tr>
                        <td><b>Cantidad Solicitada:</b></td>
                        <td>
                            <input class="w3-input w3-border" type="text" name="cant_soli" value="<?php echo $cant_soli ?>" required>
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
                    <a class="w3-button w3-round w3-orange w3-section"  href='../Formularios/mSolicitudPedidos.php'>Nuevo</a>
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
                                        <th>Numero de Pedido</th>
                                        <th>Nombre de Suminitro Solicitado</th>
                                        <th>Fecha</th>
                                        <th>Tipo Suministro</th>
                                        <th>Cantidad Solicitada</th>
                                        <th>Codigo Empleado</th>
                                        <th></th>
                                    <tr/>";
                                   while($row=$resultado->fetch_assoc()){?>
                    <tr>
                        <td><?php echo $row['num_ped'];?> </td>
                        <td><?php echo $row['nom_sum']; ?> </td>
                        <td><?php echo $row['fecha']; ?> </td>
                        <td><?php echo $row['tip_sum']; ?> </td>
                        <td><?php echo $row['cant_soli']; ?> </td>
                        <td><?php echo $row['cod_emp']; ?> </td>
                        <td>
                            <center><a href="./mSolicitudPedidos.php?numero_ped=<?php echo $row['num_ped'];?>">Seleccionar</a>
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