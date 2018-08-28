<?php
require_once("funciones.php");

if(isset($_POST['identificacion'])){
	
	$identificacion = dameIdentificacion($_POST['identificacion']);
	//echo $identificacion;
	//print_r($identificacion);exit;
	$array = "";
	foreach($identificacion as $indice => $registro){
		//$html .= "<option value='".$registro['Id']."'>".$registro['Nombre']."</option>";
		
		$nombre = $registro['Nombre'];
		$apellido = $registro['Apellido'];
		$ciudad = $registro['Ciudad'];
		$telefono = $registro['Telefono'];
		$email = $registro['Email'];
		$programa = $registro['Programa'];
		$id = $registro['Id'];
		$asesor = $registro['Asesor'];
		//echo $nombre,$apellido,$ciudad,$email ;
		//exit;
		$array = array($nombre,$apellido,$telefono,$ciudad,$email,$programa,$asesor,$id);

	}

	$respuesta = array($array);

	echo json_encode($respuesta);
}

?>