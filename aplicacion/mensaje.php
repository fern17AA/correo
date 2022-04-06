<?php
@session_start();
if(!isset($_SESSION['id'])){
  session_destroy();
  ?>
<script language="javascript">
            window.location = "../../";
        </script>
  <?php
}
include("../../conexion/conexion.php");
 $db = new Conexion();

 if(isset($_POST["view"]))
 {
 
$sql_usuario = $db->query("select * from usuarios where id = ".$_SESSION['id']." ");
$array_usuario = $sql_usuario->fetch_assoc();
$user = $array_usuario['nombre'];
$id = $array_usuario['id'];

 $query = $db->query("SELECT * FROM mensaje m inner join usuarios u on m.de = u.id WHERE m.para = $id and m.leido = 'no' order by m.fecha_envio DESC"); 
                     //"SELECT * from mensaje m inner join usuarios u on m.de = u.id where m.para = ".$_SESSION['id']." order by m.fecha_envio DESC "
 //$result = $query->fetch_array();
 $num = $query->num_rows;
$output = '';
 
 if($num > 0)
 {
     while($row = $query->fetch_array())
  {
    $fecha_recepcion = $row[5];
    $fecha_bd = explode("-", $fecha_recepcion);
    $fecha_r = $fecha_bd[2]."-".$fecha_bd[1]."-".$fecha_bd[0];
   $output .= '
   
  <div class="direct-chat-msg">
                  <div class="direct-chat-info clearfix">
                    <span class="direct-chat-name pull-left">Administrador</span>
                  </div>
                  <!-- /.direct-chat-info -->
                  
                  <div class="direct-chat-text">  
                  '.$row['mensaje'].'
                  </div>  
                </div>


   '
   '
   
  <div class="direct-chat-msg">
                  <div class="direct-chat-info clearfix">
                    <span class="direct-chat-name pull-left">Administrador</span>
                  </div>
                  <!-- /.direct-chat-info -->
                  
                  <div class="direct-chat-text">  
                  '.$row['mensaje'].'
                  </div>  
                </div>


   '
   
   ;

  }
 }
 else
 {
  $output .= '<div class="direct-chat-msg right">
                  <div class="direct-chat-info clearfix">
                    <span class="direct-chat-name pull-right"></span>
                    <span class="direct-chat-timestamp pull-left"></span>
                  </div>
                  
                  
                  <div class="direct-chat-text">
                    SIN NOTIFICACIONES!
                  </div>
                  
                </div>';
 }
  

$query_1 = $db->query("SELECT * FROM mensaje WHERE leido= 'no' and para = '$id'");
 $count = $query_1->num_rows;
 $data = array(
  'notification'   => $output,
  'unseen_notification' => $count
 );
 echo json_encode($data);

  

 }


?>