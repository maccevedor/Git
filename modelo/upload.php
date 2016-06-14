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
 
while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
/*
	$import = $conex->exec("INSERT into  estudiante
	(Nombre, Apellido,Email,Telefono,municipio,programa,Descripcion,Fuente,Observacion,Asesor,fch)
	values('$data[0]','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]','$data[6]','$data[7]','$data[8]','$data[9]','$data[10]')");
*/

	$validarEmail = filter_var($data[2], FILTER_VALIDATE_EMAIL);
	
	
	if(strlen($data[3]) == 0 && strlen($data[4]) == 0){
		
		 echo "Se debe tener al menos un teléfono o celular este email ".$data[2];
         echo '<br>';
         continue;
	}
	
	 if (!$validarEmail) {
                echo ." Este correo no es permitido".$data[2];
                echo '<br>';
                continue;
            }
    
    if (!ctype_digit($data[4])) {
        echo "Este numero no es correcto , no tiene solo números ".$data[4];
        echo '<br>';
        continue;
    }
    
    if (strlen($data[4]) != 10) 
    {
	    echo "Este numero celular no es correcto no tiene 10 dígitos ".$data[4];
	    echo '<br>';
	    continue;
    }
 
	$import = "INSERT into  estudiante
	(Nombre, Apellido,Email,Telefono,celular,ciudad,programa,Descripcion,Fuente,Observacion,Asesor,fch)
	values('$data[0]','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]','$data[6]','$data[7]','$data[8]','$data[9]','$data[10]','$data[11]')";
	//echo $import;
	$insertImport = $conex->query($import);	
	$count++;
	}	 
	fclose($handle);
	$msg="<h3 style='color:green;'>".$count.
	"&nbsp;&nbsp;Rows Imported !</h3>";
}
?>
<!DOCTYPE html>
<html>
<head>
<!--
<meta http-equiv="refresh" content="10;URL=http://umbvirtual.edu.co//inscripcion/modelo/listar.php" />
	<title></title>
-->
</head>
<body>
hola
</body>
</html>