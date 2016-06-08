<?php
require_once("funciones.php");

//echo $_POST['gestion'];exit;

if(isset($_POST['formacion'])){
	
	$programas = damePrograma($_POST['formacion']);
	
	$html = "<option value=''>- Seleccione un programa -</option>";
	foreach($programas as $indice => $registro){
		$html .= "<option value='".$registro['id']."'>".$registro['Programa']."</option>";
	}
	
	$respuesta = array("html"=>$html);
	echo json_encode($respuesta);

}



if(isset($_POST['gestion'])){
	
	$programas = descripcion($_POST['gestion']);
	
	$html = "<option value=''>- Seleccione un Descripción -</option>";
	foreach($programas as $indice => $registro){
		$html .= "<option value='".$registro['id']."'>".$registro['nombre']."</option>";
	}
	
	$respuesta = array("html"=>$html);
	echo json_encode($respuesta);
}


if(isset($_POST['idEstado'])){
	
	$gestion = dameGestion($_POST['idEstado']);
	
	$html = "<option value=''>- Seleccione un Descripción -</option>";
	foreach($gestion as $indice => $registro){
		$html .= "<option value='".$registro['id']."'>".$registro['nombre']."</option>";
	}
	
	$respuesta = array("html"=>$html);
	echo json_encode($respuesta);
}



if(isset($_POST['idInscrito'])){
	
	$historial = historial($_POST['idInscrito']);
	
	if($historial){
		
		$html = "<table border='1' class='datagrid-htable' style='width:400px;height:200px' closed='true'>
	        <thead>
	            <tr>
	                <th>descripcion</th>
	                <th>Asesor</th>            
	                <th>Observación</th>
	                <th>Fecha</th>
	            </tr>
	        </thead>
	        <tbody>";
	    
		foreach($historial as $indice => $registro){
			$html .=	
			" <tr>
	                <td>".$registro['descripcion']."</td>
	                <td>".$registro['username']."</td>
	                <td>".$registro['observacion']."</td>
	                <td>".$registro['fecha']."</td>
	            </tr>";				
		}
		
		$html .="</tbody></table>";		
	}else{
		$html = "No hay registros";
	}
	
	$respuesta = array("html"=>$html);
	echo json_encode($respuesta);
}






?>