<?php
require_once("funciones.php");

if(isset($_POST['identeficacion'])){
	
	$programas = dameIdentificacion($_POST['identificacion']);
	foreach($identificacion as $indice => $registro){
		$html .= "el Usuario existe";
	}
	
	$respuesta = array("html"=>$html);
	echo json_encode($respuesta);
}




?>