<?php
require_once("conexion.php");
$conex = conectaBaseDatos();
$id = intval($_REQUEST['id']);

//$sql = "delete from users where id=$id";

/*$sql = "update estudiante set Estado='0' where Id=$id";
$result = @mysql_query($sql);
*/

$sql=$conex->query("update estudiante set Estado='0' where Id=$id");
$sql->execute();
$result=$sql->fetchAll();

//if ($result){
	echo json_encode(array('success'=>true));
//} else {
//	echo json_encode(array('msg'=>'Some errors occured.'));
//}
?>