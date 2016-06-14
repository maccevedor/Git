<?php   
include("conexion.php");
header("Content-Type: text/html; charset=Windows-1252");
$conex = conectaBaseDatos();
$fchConsulta = $_REQUEST['fchExcel'];
$sql="select e.TipoId, e.Identificacion, e.Nombre, e.Apellido, e.FchNacimiento, e.LNacimiento, e.Direccion, e.Ciudad, e.Barrio, e.Telefono, e.Celular, e.Email, e.Genero, e.EstadoCivil,e.Fuente,e.Programa, e.Fch, e.Estado, e.FchRespuesta,p.Programa as Nprograma, e.Observacion , m.municipio 
	from estudiante e
	INNER JOIN programa p on p.id=e.Programa 
	INNER JOIN municipios m on m.id=e.Ciudad
	where fch >= '$fchConsulta'";
$results = $conex->prepare($sql);
$results->execute();

$list=$results->fetchAll();
$filename = "tmp/db_user_export_".time().".csv";   // Crea el Archivo
$handle = fopen($filename, 'w+');   
fputcsv($handle, array('TipoId','Identificacion','Nombre','Apellido','FchNacimiento','LNacimiento','Direccion','Ciudad','Barrio','Telefono','Celular','Email','Genero','EstadoCivil','Fuente','Programa','Fch','Estado','FchRespuesta','Nprograma','Observacion','municipio'));   
   
if (is_array($list))
{   
foreach($list as $row) { fputcsv($handle, array($row['TipoId'],$row['Identificacion'], utf8_decode($row['Nombre']),utf8_decode($row['Apellido']),$row['FchNacimiento'],$row['LNacimiento'],utf8_decode($row['Direccion']),$row['Ciudad'],$row['Barrio'],$row['Telefono'],$row['Celular'],utf8_decode($row['Email']),$row['Genero'],$row['EstadoCivil'],$row['Fuente'],utf8_decode($row['Programa']),$row['Fch'],$row['Estado'],$row['FchRespuesta'],utf8_decode($row['Nprograma']),$row['Observacion'],utf8_decode($row['municipio']))); }  
fclose($handle);   
header("Location: $filename");
}else
{
	echo  "No hay datos para realizar la consulta";
}