<?php
@session_start();
if(!isset($_SESSION['id'])){
  session_destroy();
  ?>
<script language="javascript">
            window.location = "../";
        </script>
  <?php
}
include("../conexion/conexion.php");
$db = new Conexion();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Email | Ver Enviados</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">

 
</head>
<body class="hold-transition skin-red sidebar-mini">
<div class="wrapper">

 <!-- Header -->
  <?php include("componentes/header/header.php"); ?>
  <!-- Menu Izquierdo, contiene formulario de busqueda y logo del proyecto -->
  <?php include("componentes/menu/menu-email.php"); ?>
  
  <div class="content-wrapper">
   
    <section class="content-header" style="margin-top: 50px">
      <h1>
       Email
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">EMaii</li>
      </ol>
    </section>

    <!-- Main content -->
    <?php
              extract($_GET);
              $id = $_GET['mensaje'];
              $para = $_GET['to'];
              $sql_mensaje = $db->query("SELECT * from mensaje m inner join usuarios u on m.para = u.id where m.id = '$id'  ");
              $array_mensaje = $sql_mensaje->fetch_array();
              $fecha_recepcion = $array_mensaje[5];
              $fecha_bd = explode("-", $fecha_recepcion);
              $fecha_e = $fecha_bd[2]."-".$fecha_bd[1]."-".$fecha_bd[0];
              ?>
    <section class="content">
      <div class="row">
        <div class="col-md-3">
          <a href="#" class="btn btn-primary btn-block margin-bottom">EMAIL</a>

          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Carpetas</h3>

              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body no-padding">
              <ul class="nav nav-pills nav-stacked">
                <li><a href="index.php"><i class="fa fa-inbox"></i> Inbox
                  <span class="label label-primary pull-right"><?php echo $numero ?></span></a></li>
                
                </li>
                
              </ul>
            </div>
           
          </div>
          

        </div>
       
        <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Email</h3>


              <div class="box-tools pull-right">
                <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Previous"><i class="fa fa-chevron-left"></i></a>
                <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Next"><i class="fa fa-chevron-right"></i></a>
              </div>
            </div>
            
            <div class="box-body no-padding">
              <div class="mailbox-read-info">
                <h3>Asunto: <?php echo $array_mensaje[3]; ?></h3>
                <h5>Para: <?php echo $array_mensaje[12]; ?>
                  <span class="mailbox-read-time pull-right"><?php echo $fecha_e; ?> <?php echo $array_mensaje[6]; ?></span></h5>
              </div>
              
              <div class="mailbox-controls with-border text-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Delete">
                    <i class="fa fa-trash-o"></i></button>
                  <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Reply">
                    <i class="fa fa-reply"></i></button>
                  <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Forward">
                    <i class="fa fa-share"></i></button>
                </div>
                
                <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" title="Print">
                  <i class="fa fa-print"></i></button>
              </div>
             
              <div class="mailbox-read-message">
                
                <p><?php echo $array_mensaje[4]; ?></p>

              </div>
            
            </div>

          </div>
       
        </div>
        
      </div>
     
    </section>
    
  </div>
  
  <!-- footer-->
  <?php include("componentes/footer/footer.php"); ?>
</div>

<!-- jQuery 3 -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Slimscroll -->
<script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
</body>
</html>
