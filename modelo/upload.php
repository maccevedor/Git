<?php
include("conexion.php");
if(isset($_POST['submit'])) {
//Connect to Database
$conex= conectaBaseDatos();
//$db = new PDO('mysql:host=localhost;dbname=dbname;charset=utf8',
//'dbuser', 'dbpassword');
 
//Upload File
    if (is_uploaded_file($_FILES['filename']['tmp_name'])) {
 
echo "<h2>" . "El archivo ". $_FILES['filename']['name']
." fue cargado correctamente." . "</h2>";
  }
 
//Import uploaded file to Database
$handle = fopen($_FILES['filename']['tmp_name'], "r");
$count =0;
 
while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
$import = $conex->exec("INSERT into  estudiante
(TipoId, Identificacion, Nombre, Apellido)
values('$data[0]','$data[1]','$data[2]','$data[3]')");
 
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
<head>
<meta http-equiv="refresh" content="10;URL=http://localhost/inscripcion/modelo/listar.php" />
	<title></title>
</head>
<body>

</body>
</html>