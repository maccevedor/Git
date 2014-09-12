<?php
include("modelo/conexion.php");
session_start();
$error= "";

if($_SERVER["REQUEST_METHOD"] == "POST")
{
// username and password sent from form 

$myusername=addslashes($_POST['username']); 
$mypassword=addslashes($_POST['password']);  
$mypassword=md5($mypassword);

$conex = conectaBaseDatos();
$sql="SELECT id,sede FROM admin WHERE username='$myusername' and passcode='$mypassword'";
//$result=mysql_query($sql);
//$row=mysql_fetch_array($result);
//$active=$row['active'];

$statement = $conex->prepare($sql);
$statement->execute();
$row = $statement->fetch(); 

//$count=mysql_num_rows($result);

if($row > 0)
// If result matched $myusername and $mypassword, table row must be 1 row
//if($count==1)
{
session_start("myusername");
$_SESSION['login_user']=$myusername;
$_SESSION['sede']=$row["sede"];
$_SESSION['id']=$row["id"];

header("location: modelo/listar.php");
}
else 
{
$error="Por favor confirme su usuario y contraseña";
}
}
?>

<!DOCTYPE html>
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="HandheldFriendly" content="True">
<meta name="MobileOptimized" content="320">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link rel="stylesheet" href="css/master-css.min.css">
<!-- <link href="css/bootstrap.css" rel="stylesheet"> -->

	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<title>Inscripciones</title>

</head>
<body bgcolor="#FFFFFF" align="center">

<div class="jumbotron franja-roja">
<div class="centered">
  <div class="container" >
    <h1><img src="img/logoumb3d.png"></h1>
    <p>Portal de Servicios</p>
  </div>
	<form action="" method="post">
	<div class="controls">
	<div class="comment-input">
	<label class="control-label" for="name">Usuario</label>
	<input class="span12" type="text" name="username"/>
	</div>
	</div>
	<div class="controls">
	<div class="comment-input">
	<label class="control-label" for="name">Clave</label>
	<input class="span12" type="password" name="password"/>
	</div>
	</div>
	<div class="controls">
	<div class="form-input">
	<input type="submit" class="span12 btn small btn-danger lightgray" /><br />
	</div>
	</div>
	</form>
	<div><?php echo $error; ?>
	</div>
</div>
<br>
</div>

</body>
<footer class="footer" >
     
      <div class="jumbotron franja-dark">
      <div class="centered">
      <div class="container">
        <p>Designed By UmbVirtual From <a target="_blank">UmbVirtual</a></p>
		<img href="http://umbvirtual.edu.co/"  width="25%" height="25%" src="img/logo2.png">
	</div>
	
 </div>
 </div>
    </footer>
</html>
