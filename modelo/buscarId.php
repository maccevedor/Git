<?php
require_once("funciones.php");


if(isset($_POST['identificacion'])){
	
	$identificacion = dameIdentificacion($_POST['identificacion']);
	//echo $identificacion;
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
		//echo $nombre,$apellido,$ciudad,$email ;
		//exit;
		$array = array($nombre,$apellido,$telefono,$ciudad,$email,$programa,$id);

	}
	
	//$respuesta = array("html"=>$html);
	//$respuesta = array("html"=>$array[1]);
	$respuesta = array($array);


	//$respuesta = $html;
	echo json_encode($respuesta);
}

?>