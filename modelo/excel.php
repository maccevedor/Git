<?php   
include("conexion.php");
header("Content-Type: text/html; charset=Windows-1252");
$conex = conectaBaseDatos();
$fchConsulta = $_REQUEST['fchExcel'];
//echo $fchConsulta;
$sql="select e.TipoId, e.Identificacion, e.Nombre, e.Apellido, e.FchNacimiento, e.LNacimiento, e.Direccion, e.Ciudad, e.Barrio, e.Telefono, e.Celular, e.Email, e.Genero, e.EstadoCivil,e.Fuente,e.Programa, e.Fch, e.Estado, e.FchRespuesta,p.Programa as Nprograma from estudiante e
INNER JOIN programa p on p.id=e.Programa where fch >= '$fchConsulta'";
//$sql = "select TipoId, Identificacion, Nombre, Apellido, FchNacimiento, LNacimiento, Direccion, Ciudad, Barrio, Telefono, Celular, Email, Genero, EstadoCivil,Fuente,Programa, Fch, Estado, FchRespuesta from estudiante where fch >= '$fchConsulta'"; 
//$sql = "select TipoId, Identificacion, Nombre, Apellido, FchNacimiento, LNacimiento, Direccion, Ciudad, Barrio, Telefono, Celular, Email, Genero, EstadoCivil,Fuente,Programa, Fch, Estado, FchRespuesta from estudiante";

$results = $conex->prepare($sql);
$results->execute();

$list=$results->fetchAll();
//print_r($list);
//print_r($results);
   // Pick a filename and destination directory for the file 
   // // Remember that the folder where you want to write the file has to be writable 
$filename = "tmp/db_user_export_".time().".csv";   // Actually create the file 
$handle = fopen($filename, 'w+');   
fputcsv($handle, array('TipoId','Identificacion','Nombre','Apellido','FchNacimiento','LNacimiento','Direccion','Ciudad','Barrio','Telefono','Celular','Email','Genero','EstadoCivil','Fuente','Programa','Fch','Estado','FchRespuesta','Nprograma'));   
   
if (is_array($list))
{   
foreach($list as $row) { fputcsv($handle, array($row['TipoId'],$row['Identificacion'], utf8_decode($row['Nombre']),utf8_decode($row['Apellido']),$row['FchNacimiento'],$row['LNacimiento'],utf8_decode($row['Direccion']),$row['Ciudad'],$row['Barrio'],$row['Telefono'],$row['Celular'],utf8_decode($row['Email']),$row['Genero'],$row['EstadoCivil'],$row['Fuente'],$row['Programa'],$row['Fch'],$row['Estado'],$row['FchRespuesta'],utf8_decode($row['Nprograma']))); }  
   // // Finish writing the file 
fclose($handle);   
//echo $filename;
header("Location: $filename");
}else
{
	echo  "No hay datos para realizar la consulta";
}
?> 