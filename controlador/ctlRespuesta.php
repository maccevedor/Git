<?php

include("../clases/clsRespuesta.php"); 
include("../modelo/conexion.php");
$day=date('Y-m-d H:i:s');
	$objCon=new clsRespuesta(); 
	$conex = conectaBaseDatos();

$llave="ec413b6de9f";/////llave de usuario de pruebas 2 
//$usuario_id=$_REQUEST['usuario_id']; 
//$ref_venta=$_REQUEST['ref_venta']; 
//$valor=$_REQUEST['valor']; 
//$moneda=$_REQUEST['moneda']; 
//$estado_pol=$_REQUEST['estado_pol']; 

	$llave="ec413b6de9f";/////llave de usuario
    $objCon->setUsuario_id($_REQUEST['usuario_id']); 
    $objCon->setRef_venta($_REQUEST['ref_venta']); 
    $objCon->setValor($_REQUEST['valor']); 
    $objCon->setMoneda($_REQUEST['moneda']); 
    $objCon->setEstado_pol($_REQUEST['estado_pol']);
    $objCon->setMensaje($_REQUEST['mensaje']);

    //$objCon->setIdentificacion($_REQUEST['identificacion']);
    $objCon->setDay($day);


    $objCon->respuesta($conex); 


$firma_cadena= $llave."~".$_REQUEST['usuario_id']."~".$_REQUEST['ref_venta']."~".$_REQUEST['valor']."~".$_REQUEST['moneda']."~".$_REQUEST['estado_pol']; 
$firmacreada = md5($firma_cadena);//firma que generaron ustedes 
$firma =$_REQUEST['firma'];//firma que envía nuestro sistema 
//echo $firma."<br>".$firmacreada;

if(strtoupper($firma)==strtoupper($firmacreada)){//comparación de las firmas 
 
//código que funciona en caso de que los datos vengan de Pagosonline 
if($_REQUEST['estado_pol'] == 4){ 
//código para actualizar base de datos en caso de aprobación 
echo "felicitaciones";
}else{ 
//código para actualizar base de datos en caso de 
//fallo, cancelación, rechazo, etc de la transacción 
echo "no se realizo el pago";
}
}
?>