<?php
include('../modelo/conexion.php');
include('../modelo/funciones.php');
$conex = conectaBaseDatos();

if(isset($_REQUEST['id'])){

	$programa = damePrograma($_REQUEST['id']);
	echo json_encode($programa);

}else{

	$sql=$conex->prepare("select * from programa where estado='1'");
	$sql->execute();
	$result=$sql->fetchAll(PDO::FETCH_ASSOC);	
	echo json_encode($result);
}