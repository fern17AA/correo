<?php

require_once "conexion.php";
$db = new Conexion();

    $mes = date('m');
    $anio = date('Y');
	$ingresos = $db->query("SELECT * FROM reporte_final where YEAR(fecha_recepcion)='$anio' ");	
	$number = $ingresos->num_rows;

	$egresos = $db->query("SELECT * FROM reporte_final where YEAR(fecha_entrega)='$anio' ");
	$number_egresos = $egresos->num_rows;

	$ingresosmes = $db->query("SELECT * FROM reporte_final where MONTH(fecha_recepcion)='$mes' and YEAR(fecha_recepcion)='$anio' ");	
	$number_mes = $ingresosmes->num_rows;

