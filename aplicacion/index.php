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
  <title id="title">Email</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Css -->
  <link rel="stylesheet" href="../bower_components/css/style.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../bower_components/select2/dist/css/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  
</head>
<body class="hold-transition skin-red sidebar-collapse sidebar-mini">
<div class="wrapper">

  <!-- Header -->
  <?php include("componentes/header/header.php"); ?>
  <!-- Menu Izquierdo, contiene formulario de busqueda y logo del proyecto -->
  <?php include("componentes/menu/menu-email.php"); ?>
  <!-- Left side column. contains the logo and sidebar -->
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header" style="margin-top: 50px">
      <h1>
        <?php              
 //busco la cantidad de mensajes no leidos
              $sql_numero = $db->query("SELECT * from mensaje m inner join usuarios u on m.de = u.id  where m.para = ".$_SESSION['id']." and m.leido = 'no' ");
              $numero = $sql_numero->num_rows;
    ?>
        bandeja de entrada
        <small> Tienes <?php echo $numero ?> mensajes nuevos</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Correo</li>
      </ol>
    </section>
  
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-3">
          <a id="redactar" href="#redactar" data-toggle="tab" class="btn btn-primary btn-block margin-bottom">REDACTAR</a>

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
                <li id="entrada" class="active"><a href="#inbox" data-toggle="tab"><i class="fa fa-inbox"></i> Inbox
                  <span id="recibidos" class="label label-primary pull-right"></span></a></li>
                <li id="send"><a href="#enviados" data-toggle="tab"><i class="fa fa-send"></i> Enviados</a></li>
                <li id="noLeidos"><a href="#noleidos" data-toggle="tab"><i class="fa fa-envelope"></i> No leidos
                <span id="nleidos" class="label label-primary pull-right"></span></a></li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          
        </div>
        <!-- /.col -->
        <div class="tab-content">

      <!-- INBOX -->
      <div class="mensaje" id="mostrarInbox">

      </div>

      <!-- /INBOX -->

      <!-- MENSAJES ENVIADOS -->
      <div class="mensajeEnviado oculto" id="enviados">

      </div>

     <!-- /MENSAJES ENVIADOS -->

      <!-- MENSAJES NO LEIDOS -->
      <div class="noleido oculto" id="noleidos"> </div>

      <!-- /MENSAJES NO LEIDOS -->
        
        <!--REDACTAR -->
        <div class="col-md-9 oculto" id="redactarMensaje">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Enviar un nuevo mensaje</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form  action="" id="form_insert">
              <div class="form-group">
                <select name="para[]" class="form-control select2" multiple="multiple" data-placeholder="Enviar a:"
                        style="width: 100%;">
                  <?php
                    $sql = $db->query("SELECT * from usuarios order by nombre ASC");
                     while($array = $sql->fetch_assoc()){
                    ?>
                    <option value="<?php echo $array['id'] ?>" data-html-text="<?php echo $array['nombre']?>">
                    <?php echo $array['nombre']?>
                    </option>
                    <?php
                      }
                    ?>  
                </select>
              </div>
              <div class="form-group">
                <input type="text" name="asunto[]" class="form-control" placeholder="Asunto:">
                <input type="hidden" name="de" value="<?php echo $array_usuario[0] ?>">
              </div>
              <div class="form-group">
                    <textarea name="mensaje[]" id="compose-textarea" class="form-control" placeholder="Escribe un mensaje" style="height: 300px" placeholder="Escribe un mensaje...">
                      
                    </textarea>
              </div>
              
            </div>
            <div class="box-footer">
              <div class="pull-right">
               
                <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Enviar</button>
              </div>
              </form>
            </div>

      </div>
    </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- footer-->
  <?php include("componentes/footer/footer.php"); ?>
</div>
<!-- ./wrapper -->

<!--Modal -->



<!--/Modal -->

<!-- jQuery 3 -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- App -->
<script src="../bower_components/js/app.js"></script>
<!-- App -->
<script src="../bower_components/push-js/push.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Slimscroll -->
<script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- Select2 -->
<script src="../bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>

</body>
</html>
