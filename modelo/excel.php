<?php   
include("conexion.php");
header("Content-Type: text/html; charset=Windows-1252");
$conex = conectaBaseDatos();
$fchConsulta = $_REQUEST['fchExcel'];
$sql="select e.TipoId, e.Identificacion, e.Nombre, e.Apellido, e.Direccion, m.municipio , e.Telefono, e.Celular, e.Email,e.Fuente,p.Programa as Nprograma, e.Fch, e.FchRespuesta, e.Observacion , es.nombre as Estado,g.nombre gestion ,d.nombre detalle,a.username
	from estudiante e
	INNER JOIN programa p on p.id=e.Programa 
	INNER JOIN municipios m on m.id=e.Ciudad
	LEFT JOIN descripcion d on d.id=e.Descripcion
	LEFT JOIN gestion g on g.id= d.idGestion
	LEFT JOIN estado es on es.id= g.idEstado
	LEFT JOIN admin a on a.id = e.asesor
	where fch >= '$fchConsulta'"; 
$results = $conex->prepare($sql);
$results->execute();

$list=$results->fetchAll();
$filename = "tmp/informe_".time().".csv";   // Crea el Archivo
$handle = fopen($filename, 'w+');   
fputcsv($handle, array('TipoId','Identificacion','Nombre','Apellido','Direccion','Ciudad','Telefono','Celular','Email','Fuente','Programa','Fch','FchRespuesta','Observacion','Estado','Gestión','Detalle','Asesor'));   
   
if (is_array($list))
{   
foreach($list as $row) { 
	fputcsv(
	$handle, array($row['TipoId'],
	$row['Identificacion'], 
	utf8_decode($row['Nombre']),
	utf8_decode($row['Apellido']),
	utf8_decode($row['Direccion']),
	utf8_decode($row['municipio']),
	$row['Telefono'],$row['Celular'],
	$row['Email'],
	$row['Fuente'],
	utf8_decode($row['Nprograma']),
	$row['Fch'],
	$row['FchRespuesta'],
	utf8_decode($row['Observacion']),
	$row['Estado'],
	$row['gestion'],
	$row['detalle'],
	$row['username']
	));
	}  
fclose($handle);   
header("Location: $filename");
}else
{
	echo  "No hay datos para realizar la consulta";
}