<?php

include("../../conexion/conexion.php");
$db =  new Conexion();
?>

<?php
    extract($_POST);
		
	//buscamos el email	
	$sql_busqueda = $db->query("SELECT email from usuarios where email = '".$email."'");

	// SI EL EMAIL NO EXISTE, REGISTRAMOS LOS DATOS EN LA TABLA USUARIO
	if($sql_busqueda->num_rows ==0) {
		
	$sql = $db->query("INSERT into usuarios ( nombre, email, clave, foto) 
    
                                    values ('".$nombre."', '".$email."', '".md5($clave)."', '".$foto."')");
	

												    										 
	//MENSAJE DE CONFIRMACIÓN													 
					if($sql) {
						
                        ?>
                        <div class="alert alert-success alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <h4><i class="icon fa fa-check"></i> Éxito!</h4>
                            Usuario Registrado.
                        </div>

                        <?php
                         //Busco el ultimo id registrado en la tabla usuarios
	                     $sql_user = $db->query("SELECT MAX(id) AS id FROM usuarios");
	                     $array_user = $sql_user->fetch_array();
	                     $id = $array_user['id'];
                         session_start();
                         $_SESSION['id'] = $array_user['id'];
                         ?>
                           <script language="javascript">
                             window.location="aplicacion/";
                           </script>
                         <?php
						
						}
					
	                  }
					  
					  else {
                        
                        ?>
                        <div class="alert alert-danger alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <h4><i class="icon fa fa-ban"></i> Error!</h4>
                            El Email ya existe.
                        </div>

                        <?php
						  
					  }
	
	
				
				
				?>