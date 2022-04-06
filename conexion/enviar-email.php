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
include("conexion.php");
$db = new Conexion();


$base = $_POST['para'];
$asunto =$_POST['asunto'];
$mensaje = $_POST['mensaje'];
$leido = "no";
             
 $sql_usuario = $db->query("select * from usuarios where id = ".$_SESSION['id']." ");
 $array_usuario = $sql_usuario->fetch_array();
 
 $de = $array_usuario[0];


$cadena = "INSERT INTO email (para, asunto , mensaje, fecha_envio, hora_envio, leido) VALUES";


for ($i = 0; $i < count($base) ; $i++) { 
	//$cadena = ("INSERT INTO registro (nombre, marca, modelo) VALUES ('".$base[$i]."', '".$marca[$i]."',  '".$modelo[$i]."'),");
	$cadena.= "('".$base[$i]."', '".$asunto[$i==$base]."',  '".$mensaje[$i==$base]."', now(), now(), '".$leido."'  ) ,";
}
$cadena_final = substr($cadena, 0, -1);
$cadena_final.=";";

echo json_encode(array('cadena_final'=> $cadena_final ));

if ($db->query($cadena_final)) {
	echo json_encode(array('error' => false));
}

else{
	echo json_encode(array('error' => true));
}
 ?>