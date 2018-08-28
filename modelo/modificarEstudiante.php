<?php
require_once("conexion.php");
$conex = conectaBaseDatos();

$id = intval($_REQUEST['id']);
$Identificacion = $_REQUEST['Identificacion'];
$Nombre = $_REQUEST['Nombre'];
$Apellido = $_REQUEST['Apellido'];
$Telefono = $_REQUEST['Telefono'];
$Email = $_REQUEST['Email'];
$Ciudad = $_REQUEST['cCiudad'];
$Programa = $_REQUEST['cPrograma'];
//$usuario = $_REQUEST['User'];
$usuario = $_REQUEST['idUser'];
$asesor = $_REQUEST['cAsesor'];
$descripcion = $_REQUEST['cDescripcion'];
$contacto = $_REQUEST['contacto'];
$Observacion = $_REQUEST['Observacion'];
$Fuente = $_REQUEST['Fuente'];
$umb = $_REQUEST['umb'];
$Rh = $_REQUEST['Rh'];


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
$idEstado = $rows [0] ['Estado'];

if($rows[0]['Descripcion'] != ""){
	//echo ' entre';
	$insertHistorial = "insert into historial(idEstudiante,idDescripcion,idAdmin,estado,observacion,fecha)values($idEstudiante,$idDescripcion,$usuario,'$idEstado','$idObservacion',NOW())";
	//echo $insertHistorial;exit;
	$insertHistorial = $conex->query($insertHistorial);	
	//$insertHistorial->execute();
	
}


//$sql = "update estudiante set Identificacion='$Identificacion',Nombre='$Nombre',Apellido='$Apellido',Telefono='$Telefono',Email='$Email',Programa='$Programa',fuente='$Fuente',Observacion='$Observacion',umb='$umb',Rh='$Rh',Ciudad='$Ciudad',Contacto='$contacto',Asesor='$asesor',Descripcion='$descripcion' where Id=$id";

$sql = "update estudiante set Identificacion='$Identificacion',Nombre='$Nombre',Apellido='$Apellido',Telefono='$Telefono',Email='$Email',Programa='$Programa',Fuente='$Fuente',Observacion='$Observacion',umb='$umb',Rh='$Rh',Ciudad='$Ciudad',Contacto='$contacto',Asesor='$asesor',Descripcion='$descripcion' where Id=$id";
$sql=$conex->query($sql);
echo json_encode(array('success'=>true));
?>