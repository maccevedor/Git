<?php
	require_once("conexion.php");
	$conex = conectaBaseDatos();
    $sede=$_REQUEST['sede'];
	$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
	$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
	$sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'id';
	$order = isset($_POST['order']) ? strval($_POST['order']) : 'desc';
	$offset = ($page-1)*$rows;
	$result = array();
	$crud=array();
	$itemid = isset($_POST['itemid']) ? $_POST['itemid']: '';
	$productid = isset($_POST['productid']) ? $_POST['productid'] : '';
	$bapellido = isset($_POST['productid']) ? $_POST['bapellido'] : '';
	$admisiones = isset($_POST['admisiones']) ? $_POST['admisiones'] : '';
	$estado = isset($_POST['estado']) ? $_POST['estado'] : '1';
	$oPrograma = isset($_POST['oPrograma']) ? $_POST['oPrograma'] : '';
	$contacto = isset($_POST['contacto']) ? $_POST['contacto'] : '';

    $whereEstado="Estado <> $estado";
    if($sede==776)
    {
        $SqlEstados=" ='776'";
        $SqlFuente="= 'Tolima'";
        $SqlCondicion ="or";
        // echo "ibague";
    }else
    {
        $SqlEstados=" <>'776'";
        $SqlFuente="<> 'Tolima'";
        $SqlCondicion ="and";
    }
    if($oPrograma<>0)
    {
                        $sql=$conex->query("select count(*) as total from estudiante e inner join municipios  muni on  e.Ciudad =muni.id where (e.fuente $SqlFuente or muni.relacion $SqlEstados) and Estado='$estado' and e.programa='$oPrograma' ");
						$sql->execute();
						$result=$sql->fetchAll(PDO::FETCH_ASSOC);
						$results["total"]=$result[0]["total"];
						$consulta=("select e.Id as id,e.Identificacion as Identificacion,e.Nombre as Nombre,e.Apellido as Apellido,e.Ciudad as cCiudad ,e.Telefono as Telefono,e.Email as Email,p.Programa as Programa,e.Fch as Fch,e.FchRespuesta as FchRespuesta , e.programa as cPrograma ,e.umb , e.Observacion,e.Fuente,CASE e.Estado WHEN 1 THEN 'Inscripcion' WHEN 2 THEN 'Admisiones'  else e.Estado end as Estado, muni.municipio as Municipio, Contacto as contacto,e.url,a.username as asesor,a.id as cAsesor,d.id as cDescripcion,d.nombre as descripcion,g.id as cGestion,es.id as cEstado,e.celular as celular
						from estudiante e 
						inner join municipios  muni on  e.Ciudad =muni.id 
						inner join  programa p on e.Programa=p.id
						left join admin a on a.id=e.asesor
						left join descripcion d on d.id=e.descripcion
						left join gestion g on d.id=d.id
						left join estado es on es.id=g.idEstado
						where (e.fuente $SqlFuente $SqlCondicion muni.relacion $SqlEstados) and e.Estado='$estado' and e.programa='$oPrograma' and muni.relacion $SqlEstados 
						group by e.id order by $sort $order limit $offset,$rows");
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

						$sql=$conex->query("select count(*) as total from estudiante e inner join municipios  muni on  e.Ciudad =muni.id where (e.fuente $SqlFuente or muni.relacion $SqlEstados) and Estado='$estado' ");
						$sql->execute();
						$result=$sql->fetchAll(PDO::FETCH_ASSOC);
						$results["total"]=$result[0]["total"];
						$sql=$conex->query("select e.Id as id,e.Identificacion as Identificacion,e.Nombre as Nombre,e.Apellido as Apellido,e.Ciudad as cCiudad ,e.Telefono as Telefono,e.Email as Email,p.Programa as Programa,e.Fch as Fch,e.FchRespuesta as FchRespuesta , e.programa as cPrograma ,e.umb , e.Observacion,e.Fuente,CASE e.Estado WHEN 1 THEN 'Inscripcion' WHEN 2 THEN 'Admisiones'  else e.Estado end as Estado, muni.municipio as Municipio, Contacto as contacto,e.url,a.username as asesor,a.id as cAsesor,d.id as cDescripcion,d.nombre as descripcion,g.id as cGestion,es.id as cEstado,e.celular as celular
						from estudiante e  
						inner join municipios  muni on  e.Ciudad =muni.id 
						inner join  programa p on e.Programa=p.id
						left join admin a on a.id=e.asesor 
						left join descripcion d on d.id=e.descripcion
						left join gestion g on d.id=d.id
						left join estado es on es.id=g.idEstado
						where  ( muni.relacion $SqlEstados $SqlCondicion e.fuente $SqlFuente )  and e.Estado='$estado'
						group by e.id order by $sort $order limit $offset,$rows");
						
						//print_r($sql);exit();
                        $sql->execute();
						$rows=$sql->fetchAll(PDO::FETCH_ASSOC);

						foreach($rows as $row){

						array_push($crud, $row);
						}
						$results["rows"]=$crud;

						echo json_encode($results);


						}else{


						$where = " e.Email like '%$itemid%' and e.Nombre like '%$productid%' and e.Apellido like '%$bapellido%'    ";
						$sql=$conex->query("select count(*) as total from estudiante e , municipios  muni where e.estado='$estado' and e.Ciudad =muni.id and muni.relacion $SqlEstados and  ". $where. "");
						$sql->execute();
						$result=$sql->fetchAll(PDO::FETCH_ASSOC);
						$results["total"]=count($result);


						$sql=$conex->query("select e.Id as id,e.Identificacion as Identificacion,e.Nombre as Nombre,e.Apellido as Apellido,e.Ciudad as cCiudad ,e.Telefono as Telefono,e.Email as Email,p.Programa as Programa,e.Fch as Fch,e.FchRespuesta as FchRespuesta , e.programa as cPrograma ,e.umb , e.Observacion,e.Fuente,CASE e.Estado WHEN 1 THEN 'Inscripcion' WHEN 2 THEN 'Admisiones'  else e.Estado end as Estado, muni.municipio as Municipio, Contacto as contacto,e.url,a.username as asesor,a.id as cAsesor,d.id as cDescripcion,d.nombre as descripcion,g.id as cGestion,es.id as cEstado,e.celular as celular
						from estudiante e  
						inner join municipios  muni on  e.Ciudad =muni.id
						left join admin a on a.id=e.asesor 
						left join descripcion d on d.id=e.descripcion
						left join gestion g on d.id=d.id
						left join estado es on es.id=g.idEstado
						inner join  programa p on e.Programa=p.id where e.Estado='$estado' and muni.relacion $SqlEstados and" . $where . " 
						group by e.id order by e.id
						limit $offset,$rows");
						$rows=$sql->fetchAll(PDO::FETCH_ASSOC);

						foreach($rows as $row){

						array_push($crud, $row);
						}
						$results["rows"]=$crud;

						echo json_encode($results);

						}




?>
