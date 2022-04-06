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

if(isset($_POST["view"]))
{
 
$sql_usuario = $db->query("SELECT * from usuarios where id = ".$_SESSION['id']." ");
$array_usuario = $sql_usuario->fetch_assoc();
$user = $array_usuario['nombre'];
$id = $array_usuario['id'];

 $query = $db->query("SELECT * FROM mensaje m inner join usuarios u on m.de = u.id WHERE m.para = $id and m.leido = 'no' order by m.id DESC"); 
 //$result = $query->fetch_array();
 $num = $query->num_rows;
if($num > 0){
 $output = '
<li class="footer"><a href="asistencia/mensajes.php">Ver Todos los Mensajes</a></li> </i>
 ';
}

else{
  $output = '<li class="header">Sin mensajes</li>';
}
 
 if($num > 0)
 {
   while($row = $query->fetch_array())
  {
   $output .= '
   
   <li>
  <ul class="menu">
    <li>
    <a href="leer-email.php?mensaje='.$row[0].'">
<div class="pull-left">
    <img src=" ../'.$row[14].' " class="img-circle" alt="User Image">
</div>
<h4> '.$row[11].'
<small><i class="fa fa-clock-o"></i> '.$row[6].'</small>
</h4>
<p>'.$row['asunto'].'</p>
    </a>
  </li>
  </ul>

</li>


   ';

  }
   
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