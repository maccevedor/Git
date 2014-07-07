<?php
include("conexion.php");
if(isset($_POST['submit'])) {
//Connect to Database
$conex= conectaBaseDatos();

if (is_uploaded_file($_FILES['filename']['tmp_name'])) {
 
echo "<h2>" . "El archivo ". $_FILES['filename']['name']
." fue cargado correctamente." . "</h2>";
  }
 
//Import uploaded file to Database
$handle = fopen($_FILES['filename']['tmp_name'], "r");
$count =0;
//echo "hola mundo";	 
while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {

$import = $conex->exec("INSERT into  aspirante
(Fch,Pais,Nombre,Apellido,Email,Telefono,Celular,Programa,Estado,Observacion)
values('$data[0]','$data[1]','$data[3]','$data[4]','$data[5]','$data[6]','$data[7]','$data[8]','$data[9]','$data[10]')");
$count++;
}
 
fclose($handle);
 
//Print interted rows
$msg="<h3 style='color:green;'>".$count.
"&nbsp;&nbsp;Rows Imported !</h3>";
}

 
?>
<!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta charset="utf-8">
<head>
<!-- <meta http-equiv="refresh" content="10;URL=http://localhost/inscripcion/modelo/listar.php" /> -->
	<title></title>
</head>
<body>

</body>
</html>