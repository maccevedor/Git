<?php
include('../modelo/conexion.php');
include('../modelo/funciones.php');
$conex = conectaBaseDatos();

//echo $_REQUEST['id'];exit;

	$ciudad = dameCiudad();
	echo json_encode($ciudad);

