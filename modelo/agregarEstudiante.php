<?php

$day=date('Y-m-d H:i:s');
require_once("conexion.php");
$conex = conectaBaseDatos();

$Identificacion = $_REQUEST['Identificacion'];
$Nombre = $_REQUEST['Nombre'];
$Apellido = $_REQUEST['Apellido'];
$Telefono = $_REQUEST['Telefono'];
$Email = $_REQUEST['Email'];
$Ciudad= $_REQUEST['cCiudad'];
$Programa = $_REQUEST['cPrograma'];
$cAsesor = $_REQUEST['cAsesor'];
$cDescripcion = $_REQUEST['cDescripcion'];
$contacto = $_REQUEST['contacto'];
$Observacion = $_REQUEST['Observacion'];
$Fuente = $_REQUEST['Fuente'];
$Rh= $_REQUEST['Rh'];


if (empty($_REQUEST["foto"]))
{}else
{
$tipo =  explode('/',$_FILES["foto"]["type"]);
copy($_FILES["foto"]["tmp_name"],"fotos/".$Identificacion.".".$tipo[1]);
}

$sql = "insert into estudiante(Identificacion,Nombre,Apellido,Telefono,Email,Ciudad,Programa,Asesor,Descripcion,Contacto,Observacion,Fuente,Fch,Rh) values('$Identificacion','$Nombre','$Apellido','$Telefono','$Email','$Ciudad','$Programa','$cAsesor','$cDescripcion ','$contacto','$Observacion','$Fuente','$day','$Rh')";
$sql=$conex->query($sql);

//$sql->execute();
//$result=$sql->fetchAll();
echo json_encode(array('success'=>true));
?>