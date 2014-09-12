<?php
	require_once("conexion.php");
	$conex = conectaBaseDatos();
    //echo $sede=$_SESSION['sede'];
    //echo $sede=$_REQUEST['sede'];
    $sede=$_REQUEST['sede'];
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
	$oPrograma = isset($_POST['oPrograma']) ? $_POST['oPrograma'] : '';
    $whereEstado="Estado <> $estado";
    if($sede==776)
    {
        $SqlEstados=" in (776)";
        $SqlFuente="= 'Tolima'";
    }else
    {
        $SqlEstados=" not in (776)";
        $SqlFuente="<> 'Tolima'";
    }
    //echo "and muni.relacion $SqlEstados 776";
//    $consulta=("select e.Id as id,e.Identificacion as Identificacion,e.Nombre as Nombre,e.Apellido as Apellido,e.Telefono as Telefono,e.Email as Email,p.Programa as Programa,e.Fch as Fch,e.FchRespuesta as FchRespuesta , e.programa as cPrograma ,e.umb , e.Observacion,e.Fuente,CASE e.Estado WHEN 1 THEN 'Inscripcion' WHEN 2 THEN 'Admisiones'  else Estado end as Estado from estudiante e , programa p ,  municipios  muni where Estado='$estado' and e.programa='$oPrograma' and e.Programa=p.id and e.Ciudad =muni.id and e.Ciudad =muni.id and muni.relacion $SqlEstados '776' order by $sort $order limit $offset,$rows");
//echo $consulta;
    if($oPrograma<>0)
    {
    //echo $oPrograma;
        //consulta que solo trae por programas
                        $sql=$conex->query("select count(*) as total from estudiante e inner join municipios  muni on  e.Ciudad =muni.id where (e.fuente $SqlFuente or muni.relacion $SqlEstados) and Estado='$estado' and e.programa='$oPrograma'");
						$sql->execute();
						$result=$sql->fetchAll(PDO::FETCH_ASSOC);
						$results["total"]=$result[0]["total"];
						$consulta=("select e.Id as id,e.Identificacion as Identificacion,e.Nombre as Nombre,e.Apellido as Apellido,e.Ciudad as cCiudad ,e.Telefono as Telefono,e.Email as Email,p.Programa as Programa,e.Fch as Fch,e.FchRespuesta as FchRespuesta , e.programa as cPrograma ,e.umb , e.Observacion,e.Fuente,CASE e.Estado WHEN 1 THEN 'Inscripcion' WHEN 2 THEN 'Admisiones'  else Estado end as Estado, muni.municipio as Municipio from estudiante e  inner join municipios  muni on  e.Ciudad =muni.id inner join  programa p on e.Programa=p.id where (e.fuente $SqlFuente or muni.relacion $SqlEstados) and Estado='$estado' and e.programa='$oPrograma' and muni.relacion $SqlEstados order by $sort $order limit $offset,$rows");
                        //echo $consulta;
						$sql=$conex->query($consulta);
                        $sql->execute();
						$rows=$sql->fetchAll(PDO::FETCH_ASSOC);

						foreach($rows as $row){

						array_push($crud, $row);  
						}  
						$results["rows"]=$crud;

						echo json_encode($results);
                        exit();
    }
    
						if (empty($itemid) && empty($productid) && empty($bapellido)){

                            
						$sql=$conex->query("select count(*) as total from estudiante e inner join municipios  muni on  e.Ciudad =muni.id where (e.fuente $SqlFuente or muni.relacion $SqlEstados) and Estado='$estado'");
						$sql->execute();
						$result=$sql->fetchAll(PDO::FETCH_ASSOC);
						$results["total"]=$result[0]["total"];
						
						$sql=$conex->query("select e.Id as id,e.Identificacion as Identificacion,e.Nombre as Nombre,e.Apellido as Apellido,e.Ciudad as cCiudad ,e.Telefono as Telefono,e.Email as Email,p.Programa as Programa,e.Fch as Fch,e.FchRespuesta as FchRespuesta , e.programa as cPrograma ,e.umb , e.Observacion,e.Fuente,CASE e.Estado WHEN 1 THEN 'Inscripcion' WHEN 2 THEN 'Admisiones'  else Estado end as Estado, muni.municipio as Municipio from estudiante e  inner join municipios  muni on  e.Ciudad =muni.id inner join  programa p on e.Programa=p.id where (e.fuente $SqlFuente or muni.relacion $SqlEstados) and Estado='$estado' order by $sort $order limit $offset,$rows");
						//echo $sql;
                        //exit();
                        $sql->execute();
						$rows=$sql->fetchAll(PDO::FETCH_ASSOC);

						foreach($rows as $row){

						array_push($crud, $row);  
						}  
						$results["rows"]=$crud;

						echo json_encode($results);  


						}else{
		

						$where = " e.Identificacion like '%$itemid%' and e.Nombre like '%$productid%' and e.Apellido like '%$bapellido%'    ";
						$sql=$conex->query("select count(*) as total from estudiante e , municipios  muni where e.estado='$estado' and e.Ciudad =muni.id and muni.relacion $SqlEstados and  ". $where);
						$sql->execute();
						$result=$sql->fetchAll(PDO::FETCH_ASSOC);
						$results["total"]=count($result);


						$sql=$conex->query("select e.Id as id,e.Identificacion as Identificacion,e.Nombre as Nombre,e.Apellido as Apellido,e.Ciudad as cCiudad , e.Telefono as Telefono,e.Email as Email,p.Programa as Programa,e.Fch as Fch,e.FchRespuesta as FchRespuesta , e.programa as cPrograma ,e.umb , e.Observacion,e.Fuente,CASE e.Estado WHEN 1 THEN 'Inscripcion' WHEN 2 THEN 'Admisiones'  else Estado end as Estado, muni.municipio as Municipio from estudiante e  inner join municipios  muni on  e.Ciudad =muni.id inner join  programa p on e.Programa=p.id where Estado='$estado' and muni.relacion $SqlEstados and" . $where . " limit $offset,$rows");
						$rows=$sql->fetchAll(PDO::FETCH_ASSOC);

						foreach($rows as $row){

						array_push($crud, $row);  
						}  
						$results["rows"]=$crud;

						echo json_encode($results); 

						}

?>