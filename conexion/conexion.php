
<?php

class Conexion extends mysqli {
	
	public function __construct() {
		parent::__construct('localhost','root','','email');
		$this->query("SET NAMES 'utf8';");
		$this->connect_errno ? die ('Error con la conexion') : $exito = 'Conectado';
		//echo $exito;
		unset($exito);
	
	}
	
	
		
	
}


?>