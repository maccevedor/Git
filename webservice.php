<?php
include("modelo/conexion.php");
$conex = conectaBaseDatos();

$identificacion=($_POST['identificacion']);

function consumirWsLogin($identificacion){
    $servidor ='http://virtualnet2.umb.edu.co/apivnt2/apirest.php';
    $datos = file_get_contents($servidor."?method=estudiante_umbvirtual&identificacion=$identificacion");
    $usuario = new SimpleXMLElement($datos);
//    echo "<pre>";
//    print_r($usuario);
//    echo "</pre>";
    return $usuario;
}
$lista = consumirWsLogin($identificacion);

if($lista[0]->acceso==1){
$nombre = $lista[0]->nombre1;
$apellido=$lista[0]->apellido1;
$email=$lista[0]->email;
$identificacion=$lista[0]->numeroDoc;
$idvirtualnet=$lista[0]->idUser;

    $sql="insert into encuentro(nombre,apellido,email,identificacion,idvirtualnet) values('$nombre','$apellido','$email','$identificacion','$idvirtualnet');";
    $sentencia=$conex->query($sql);
    $texto="Su proceso de registro ha sido exitoso";
    $texto1="Bienvenido al III Encuentro de estudiosos de la UMB Virtual, te esperamos el próximo sábado 2 de agosto a partir de las 8:00 a.m. en nuestra sede ubicada en el KM. 27 Vía Cajicá.";
}else{
    $texto="Usted no se encientra en nuestra base de datos.";
    $texto1="Si usted estudiante de la UMB virtual por favor comuniquese al Teléfono: (+57 1) 546 06 00 Ext. 1470 - 1473 o uvirtual@umb.edu.co";
}
include("view/respuesta.php");
?>
