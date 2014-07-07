<?php 
/*ob_start();
var_dump($_POST);
$data = ob_get_clean();
$fp = fopen("confirmation.txt", "w");
fwrite($fp, $data);
fclose($fp);
exit();*/

include("../clases/clsConfirmar.php"); 
include("../modelo/conexion.php");
$day=date('Y-m-d H:i:s');
    $objCon=new clsConfirmar(); 
    $conex = conectaBaseDatos();


    $llave="ec413b6de9f";/////llave de usuario
    $objCon->setUsuario_id($_REQUEST['usuario_id']); 
    $objCon->setRef_venta($_REQUEST['ref_venta']); 
    $objCon->setValor($_REQUEST['valor']); 
    $objCon->setMoneda($_REQUEST['moneda']); 
    $objCon->setEstado_pol($_REQUEST['estado_pol']);
    $objCon->setMensaje($_REQUEST['mensaje_respuesta_pol']);
    $objCon->setTransaccion_id($_REQUEST['transaccion_id']);
    $objCon->setBanco_id($_REQUEST['banco_id']);
    $objCon->setMedio_pago_id($_REQUEST['medio_pago_id']);
    $objCon->setTransaccion_banco_id($_REQUEST['transaccion_banco_id']);
    $objCon->setCodigo_autorizacion($_REQUEST['codigo_autorizacion']);
    $objCon->setEmail_comprador($_REQUEST['email_comprador']);
    $objCon->setIntentos($_REQUEST['intentos']);
    $objCon->setRef_pol($_REQUEST['ref_pol']);
    $objCon->setFirma($_REQUEST['firma']);
    $objCon->setMedio_pago($_REQUEST['medio_pago']);
    $objCon->setIp($_REQUEST['ip']);

    $objCon->setTarjeta_habiente($_REQUEST['tarjeta_habiente']);
    $objCon->setFranquicia($_REQUEST['franquicia']);
    $objCon->setDireccionCobro($_REQUEST['direccionCobro']);
    $objCon->setTelefono($_REQUEST['telefono']);

    
 
    



    $objCon->setDay($day);


    $objCon->actualizar($conex); 


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
