<?php
require_once("funciones.php");

if(isset($_POST['formacion'])){
	
	$programas = damePrograma($_POST['formacion']);
	
	$html = "<option value=''>- Seleccione un programa -</option>";
	foreach($programas as $indice => $registro){
		$html .= "<option value='".$registro['id']."'>".$registro['Programa']."</option>";
	}
	
	$respuesta = array("html"=>$html);
	echo json_encode($respuesta);
}

?>