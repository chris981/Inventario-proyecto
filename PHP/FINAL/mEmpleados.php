<?php
session_start();

if (!isset($_SESSION['ID'])) {
  header("location: ../pages/login.php");
} else {
  require "../functions/conexion.php";
  try {
   $cod_emp="";//$_SESSION['ID'];
    $nombre="";
    $apellido="";
    if(isset($_GET['ID'])){
      $query2 = "select * from tabla_empleados where cod_emp='" . $_GET['ID']."'";
      $resultado2 = $mysqli->query($query2);
      while ($row2=$resultado2->fetch_assoc())
      {
        $nombre= $row2['nom_emp'];
        $cod_emp=$row2['cod_emp'];
        $apellido=$row2['ape_emp'];
      }

    }
    $query = "select * from tabla_empleados";
    $resultado = $mysqli->query($query);
  } catch (Exception $ex) {
  }

?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de Inventario de Pollolandia</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="../plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.min.css">
  </head>

  <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

      <!-- Preloader -->
      <?php
      include "../Barras/Preload.php";
      ?>

      <!-- Navbar -->
      <?php
      include "../Barras/Navbar.php";
      ?>
      <!-- /.navbar -->

      <!-- Main Sidebar Container -->
      <?php
      include "../Barras/Main_Navbar.php";
      ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-6">
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title"><b>Datos de Empleados</b></h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form action="../functions/fEmpleados.php" method="POST" > 
                    <div class="card-body">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Cod. Empleado</label>
                        <input class="form-control" type="text" name="codigo" disabled value="<?php echo $cod_emp; ?>">
                      </div>  
                      <div class="form-group">
                        <label for="exampleInputEmail1">Nombre</label>
                        <input class="form-control" type="text" name="nombre" value="<?php echo $nombre;?>">
                      </div>  
                      <div class="form-group">
                        <label for="exampleInputEmail1">Apellido</label>
                        <input class="form-control" type="text" name="apellido" value="<?php echo $apellido;?>">
                      </div>  
                      <div class="form-group">
                        <label for="exampleInputEmail1">Residencia</label>
                        <input class="form-control" type="text" name="residencia"   >
                      </div>  
                      <div class="form-group">
                        <label for="exampleInputEmail1">Horario</label>
                        <select name="Horario" class="form-control">
                                <option disabled selected></option>
                                <option value="Matutino">Matutino</option>
                                <option value="Vespertino">Vespertino</option>
                            </select>
                      </div>   
                      <div class="form-group">
                        <label for="exampleInputEmail1">Residencia</label>
                        <input class="form-control" type="text" name="codigo"   >
                      </div>  
                      <div class="form-group">
                        <label for="exampleInputEmail1">Residencia</label>
                        <input class="form-control" type="text" name="codigo"   >
                      </div>  
                      <div class="form-group">
                        <label for="exampleInputEmail1">Residencia</label>
                        <input class="form-control" type="text" name="codigo"   >
                      </div>  
                      <div class="form-group">
                        <label for="exampleInputEmail1">Residencia</label>
                        <input class="form-control" type="text" name="codigo"   >
                      </div>                    
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                      <button class="btn btn-primary" type="reset" value="reset">Nuevo</button>
                    <button class="btn btn-primary" type="submit" name="Tipo_Accion"
                        value="I">Agregar</button>
                    <button class="btn btn-primary" type="submit" name="Tipo_Accion"
                        value="A">Modificar</button>
                    <button class="btn btn-primary" type="submit" name="Tipo_Accion"
                        value="E">Eliminar</button>
                    <button class="btn btn-primary" type="reset" value="reset">Cancelar</button>
                    </div>
                  </form>
                </div>
              </div>
              <div class="col-md-6">
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title"><b>Lista de Empleados</b></h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                      <?php
                      //Codigo PHP para Tablas
                      echo "<tr>
                      <th>Codigo</th>
                      <th>Nombre</th>
                      <th>Apellido</th>
                      <th>Tipo Usuario</th>
                      <th>Usuario</th>
                      <th></th>
                  <tr/>";
                      while ($row = $resultado->fetch_assoc()) {?>
                        <tr>
                          <td><?php echo $row['cod_emp']; ?> </td>
                          <td><?php echo $row['nom_emp']; ?> </td>
                          <td><?php echo $row['ape_emp']; ?> </td>
                          <td><?php echo $row['res_emp']; ?> </td>
                          <td><?php echo $row['usu_emp']; ?> </td>
                          <td>
                            <center><a href="./mEmpleados.php?ID=<?php echo $row['cod_emp'];?>">Seleccionar</a>
                            </center>
                          </td>
                        </tr>
                      <?php }

                      ?>
                    </table>
                  </div>
                  <!-- /.card-body -->
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
      <footer class="main-footer">
        <strong>Copyright &copy; JLMT 2021 <a href="#"></a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
          <b>Version</b> 3.0
        </div>
      </footer>

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="../plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="../plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="../plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="../plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="../plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="../plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="../plugins/moment/moment.min.js"></script>
    <script src="../plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="../plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="../dist/js/pages/dashboard.js"></script>

    <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="../plugins/jszip/jszip.min.js"></script>
    <script src="../plugins/pdfmake/pdfmake.min.js"></script>
    <script src="../plugins/pdfmake/vfs_fonts.js"></script>
    <script src="../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="../plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <script>
      $(function() {
        $("#example1").DataTable({
          "responsive": true,
          "lengthChange": false,
          "autoWidth": false,
          "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false,
          "responsive": true,
        });
      });
    </script>
  </body>

  </html>
<?php }
?>