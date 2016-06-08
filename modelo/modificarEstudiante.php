<?php
require_once("conexion.php");
$conex = conectaBaseDatos();

$id = intval($_REQUEST['id']);
$Identificacion = $_REQUEST['Identificacion'];
$Nombre = $_REQUEST['Nombre'];
$Apellido = $_REQUEST['Apellido'];
$Telefono = $_REQUEST['Telefono'];
$Email = $_REQUEST['Email'];
$Programa = $_REQUEST['cPrograma'];
//$usuario = $_REQUEST['User'];
$usuario = $_REQUEST['idUser'];
$Observacion = $_REQUEST['Observacion'];
$Fuente = $_REQUEST['Fuente'];
//$umb = $_REQUEST['umb'];
$Rh = $_REQUEST['Rh'];
$Ciudad = $_REQUEST['cCiudad'];
$contacto = $_REQUEST['contacto'];
$asesor = $_REQUEST['cAsesor'];
$descripcion = $_REQUEST['cDescripcion'];

if (isset($_REQUEST["foto"]))
{
	$tipo =  explode('/',$_FILES["foto"]["type"]);
	copy($_FILES["foto"]["tmp_name"],"fotos/".$Identificacion.".".$tipo[1]);
	
}

$sqlHistorial = "select * from estudiante where Id=$id";
//echo $sqlHistorial;
$sqlHistorial =$conex->query($sqlHistorial);
$rows=$sqlHistorial->fetchAll(PDO::FETCH_ASSOC);
$idEstudiante = $rows[0]['Id'];
$idDescripcion = $rows[0]['Descripcion'];
$idObservacion = $rows[0]['Observacion'];

if($rows[0]['Descripcion'] != ""){
	//echo ' entre';
	$insertHistorial = "insert into historial(idEstudiante,idDescripcion,idAdmin,estado,observacion,fecha)values($idEstudiante,$idDescripcion,$usuario,'1','$idObservacion',NOW())";
	//echo $insertHistorial;exit;
	$insertHistorial = $conex->query($insertHistorial);	
	//$insertHistorial->execute();
	
}


//$sql = "update estudiante set Identificacion='$Identificacion',Nombre='$Nombre',Apellido='$Apellido',Telefono='$Telefono',Email='$Email',Programa='$Programa',fuente='$Fuente',Observacion='$Observacion',umb='$umb',Rh='$Rh',Ciudad='$Ciudad',Contacto='$contacto',Asesor='$asesor',Descripcion='$descripcion' where Id=$id";
$sql = "update estudiante set Identificacion='$Identificacion',Nombre='$Nombre',Apellido='$Apellido',Telefono='$Telefono',Email='$Email',Programa='$Programa',fuente='$Fuente',Observacion='$Observacion',Rh='$Rh',Ciudad='$Ciudad',Contacto='$contacto',Asesor='$asesor',Descripcion='$descripcion' where Id=$id";
$sql=$conex->query($sql);
echo json_encode(array('success'=>true));
?>