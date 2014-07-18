<?php
	require_once("conexion.php");
	$conex = conectaBaseDatos();
	$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
	$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
	$sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'id';
	$order = isset($_POST['order']) ? strval($_POST['order']) : 'desc';
	$offset = ($page-1)*$rows;
	$result = array();
	$crud=array();
	//$itemid = isset($_POST['itemid']) ? mysql_real_escape_string($_POST['itemid']) : '';
	$itemid = isset($_POST['itemid']) ? $_POST['itemid']: '';
	$productid = isset($_POST['productid']) ? $_POST['productid'] : '';
	$bapellido = isset($_POST['productid']) ? $_POST['bapellido'] : '';
	$admisiones = isset($_POST['admisiones']) ? $_POST['admisiones'] : '';
	$estado = isset($_POST['estado']) ? $_POST['estado'] : '1';
	
    $whereEstado="Estado <> $estado";
    //echo $whereEstado;

						if (empty($itemid) && empty($productid) && empty($bapellido)){

                            
						$sql=$conex->query("select count(*) as total from estudiante where estado='$estado'");
						$sql->execute();
						$result=$sql->fetchAll(PDO::FETCH_ASSOC);
						$results["total"]=$result[0]["total"];
						
						$sql=$conex->query("select e.Id as id,e.Identificacion as Identificacion,e.Nombre as Nombre,e.Apellido as Apellido,e.Telefono as Telefono,e.Email as Email,p.Programa as Programa,e.Fch as Fch,e.FchRespuesta as FchRespuesta , e.programa as cPrograma ,e.umb , Observacion,Fuente,CASE Estado WHEN 1 THEN 'Inscripcion' WHEN 2 THEN 'Admisiones'  else Estado end as Estado from estudiante e , programa p where Estado='$estado' and e.Programa=p.id order by $sort $order limit $offset,$rows");
						$sql->execute();
						$rows=$sql->fetchAll(PDO::FETCH_ASSOC);

						foreach($rows as $row){

						array_push($crud, $row);  
						}  
						$results["rows"]=$crud;

						echo json_encode($results);  


						}else{
		

						$where = " Identificacion like '%$itemid%' and Nombre like '%$productid%' and Apellido like '%$bapellido%'    ";
						$sql=$conex->query("select count(*) from estudiante where estado='$estado'and  ". $where);
						$sql->execute();
						$result=$sql->fetchAll(PDO::FETCH_ASSOC);
						$results["total"]=count($result);


						$sql=$conex->query("select e.Id as id,e.Identificacion as Identificacion,e.Nombre as Nombre,e.Apellido as Apellido,e.Telefono as Telefono,e.Email as Email,p.Programa as Programa,e.Fch as Fch,e.FchRespuesta as FchRespuesta,e.programa as cPrograma ,e.umb , Observacion,Fuente,CASE Estado WHEN 1 THEN 'Inscripcion' WHEN 2 THEN 'Admisiones' else Estado end as Estado from estudiante e , programa p where Estado='$estado'  and e.Programa=p.id and" . $where . " limit $offset,$rows");
						$rows=$sql->fetchAll(PDO::FETCH_ASSOC);

						foreach($rows as $row){

						array_push($crud, $row);  
						}  
						$results["rows"]=$crud;

						echo json_encode($results); 

						}

?>