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
<link rel="stylesheet" href="css/master-css.min.css">
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>

    <link rel="stylesheet" id="switch-theme-js" href="css/themes/default3860.css?v=1"> 
   <link rel="stylesheet" id="switch-width" href="css/full-width3860.css?v=1">
	<link rel="stylesheet" href="js/include/css" type="text/css">

<title>Inscripciones</title>

<style type="text/css">
body
{
font-family:Arial, Helvetica, sans-serif;
font-size:14px;

}
label
{
font-weight:bold;

width:100px;
font-size:14px;

}
.box
{
border:#666666 solid 1px;

}
</style>
</head>
<body bgcolor="#FFFFFF">
<br>
<br>
<br>
<div align="center">
<div style="width:300px; border: solid 1px #333333; " align="left">
<div style="background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>


<div style="margin:30px">

<form action="" method="post">
<label>Usuario  :</label><input type="text" name="username" class="box"/><br /><br />
<label>Clave  :</label><input type="password" name="password" class="box" /><br/><br />
<input type="submit" value="Acceder"/><br />

</form>
<div style="font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
</div>
</div>
</div>

</body>
</html>
