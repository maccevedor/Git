<?php
$day=date('Y-m-d H:i:s');
	require_once("conexion.php");
	$conex = conectaBaseDatos();

$Identificacion = $_REQUEST['Identificacion'];
$Nombre = $_REQUEST['Nombre'];
$Apellido = $_REQUEST['Apellido'];
$Telefono = $_REQUEST['Telefono'];
$Email = $_REQUEST['Email'];
$Programa = $_REQUEST['cPrograma'];
$Fuente = $_REQUEST['Fuente'];
$Observacion = $_REQUEST['Observacion'];
$Rh= $_REQUEST['Rh'];

$sql = "insert into estudiante(Identificacion,Nombre,Apellido,Telefono,Email,Programa,Fuente,Observacion,Fch,Rh) values('$Identificacion','$Nombre','$Apellido','$Telefono','$Email','$Programa','$Fuente','$Observacion','$day','$Rh')";
$sql=$conex->query($sql);
//$sql->execute();
//$result=$sql->fetchAll();
echo json_encode(array('success'=>true));
?>