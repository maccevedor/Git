<?php
include("../modelo/conexion.php");
include("../modelo/lock.php");


$conex = conectaBaseDatos();
if($_SERVER["REQUEST_METHOD"] == "POST")
{
// username and password sent from Form
$username=($_POST['username']); 
$password=($_POST['password']); 
$password=md5($password); // Encrypted Password
$email=($_POST['email']); 
$perfil=($_POST['perfil']); 
$validar="select username from  admin where username='$username';";
$validar=$conex->query($validar);
$row = $validar->fetch(PDO::FETCH_ASSOC);
$count = $row['username'];
echo $row['username'];
if (empty($count)) {
	# code...
	$sql="insert into admin(username,passcode,email,perfil) values('$username','$password','$email','$perfil');";
	$sentencia=$conex->prepare($sql);
	 try {
        if(!$sentencia->execute()){
            print_r($sentencia->errorInfo());
        }
        $resultado = $sentencia->fetchAll();
        //$resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
        $sentencia->closeCursor();
    }
    catch(PDOException $e){
        echo "Error al ejecutar la sentencia: \n";
            print_r($e->getMessage());
    }
    
    return $resultado;  

	echo '<script type="text/javascript">'
   , 'alert("usuario creado existosamente");'
   , '</script>';
}else
{
	echo '<script type="text/javascript">'
   , 'alert ("Este nombre de usuario no se encuentra disponible");'
   , '</script>'
;
}

}
?>
<!DOCTYPE html>
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	


<title>Registro</title>

<form action="registration.php" method="post">
<div align="center">
<label>Usuario:</label>
<input type="text" name="username"/><br>
<label>Clave :</label>
<input type="password" name="password"/><br>
<label>Email:</label>
<input type="email" name="email"/><br>
<label>Perfil:</label>
<select id="perfil" name="perfil">
  <option value="2">Asesor(a)</option>
  <option value="1">Administrador(a)</option>
</select><br>
<input type="submit" value=" Crear "/><br>
<a type="submit" href="listar.php">Volver al listado</a> 
</div>
</form>

</body>
</html>