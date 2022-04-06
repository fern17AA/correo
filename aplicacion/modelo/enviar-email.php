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
include("../../conexion/conexion.php");
$db = new Conexion();


$base = $_POST['para'];
$asunto = $_POST['asunto'];
$mensaje = $_POST['mensaje'];
$leido = "no";
$de = $_POST['de'];
             

$cadena = "INSERT INTO mensaje (para, asunto , mensaje, fecha_envio, hora_envio, leido,de) VALUES";


for ($i = 0; $i < count($base) ; $i++) { 

	$cadena.= "('".$base[$i]."', '".$asunto[$i==$base]."',  '".$mensaje[$i==$base]."', now(), now(), '".$leido."', '".$de."' ) ,";
}
$cadena_final = substr($cadena, 0, -1);
$cadena_final.=";";

//echo json_encode(array('cadena_final'=> $cadena_final ));

if ($db->query($cadena_final)) {
	echo json_encode(array('error' => false));
}

else{
	echo json_encode(array('error' => true));
}
 ?>