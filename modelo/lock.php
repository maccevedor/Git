<?php
//include('conexion.php');
session_start();
$username=$_SESSION['login_user'];
$conex = conectaBaseDatos();
$sql="select username from  admin where username='$username';";
$sql=$conex->query($sql);
$row = $sql->fetch(PDO::FETCH_ASSOC);
$count = $row['username'];

if (empty($count)) {
	header("Location: ../login.php");
}else
{

}	
?>