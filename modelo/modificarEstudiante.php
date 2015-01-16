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
$usuario = $_REQUEST['User'];
$Observacion = $_REQUEST['Observacion'];
$Fuente = $_REQUEST['Fuente'];
$umb = $_REQUEST['umb'];
$Rh = $_REQUEST['Rh'];
$Ciudad = $_REQUEST['cCiudad'];
$contacto = $_REQUEST['contacto'];


//echo $Ciudad;


if (isset($_REQUEST["foto"]))
{
$tipo =  explode('/',$_FILES["foto"]["type"]);
copy($_FILES["foto"]["tmp_name"],"fotos/".$Identificacion.".".$tipo[1]);
}

$sql = "update estudiante set Identificacion='$Identificacion',Nombre='$Nombre',Apellido='$Apellido',Telefono='$Telefono',Email='$Email',Programa='$Programa',fuente='$Fuente',Observacion='$Observacion',umb='$umb',Rh='$Rh',Ciudad='$Ciudad',Contacto='$contacto' where Id=$id";
$sql=$conex->query($sql);
//$sql->execute();
//$result=$sql->fetchAll();
echo json_encode(array('success'=>true));

/*$result = @mysql_query($sql);
if ($result){
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('msg'=>'Some errors occured.'));
}*/
?>