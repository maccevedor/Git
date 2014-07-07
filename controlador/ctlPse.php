<?php




    $identificacionP = (isset($_REQUEST['identificacion'])) 
    ? trim(strip_tags($_REQUEST['identificacion']))
    : "";
  
  $valor = "1160" ;
  $baseDevolucionIva =  $valor /1.16;
  $iva = $baseDevolucionIva*0.16;
 
  
  $key= "ec413b6de9f";
  $usuarioId = "106799";
  $refVenta = "INS-".$insertId;
  $moneda = "COP";
  $emailComprador = "maccevedor@gmail.com";
  $firma = md5($key."~".$usuarioId."~".$refVenta."~".$valor."~".$moneda);
  $descripcion = "pago en linea";

?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>

                <form action="https://gateway2.pagosonline.net/apps/gateway/index.html" method="post">

                                                 <input type="text" id="usuarioId" name="usuarioId" value="<?php echo $usuarioId; ?>">
                                                     <input type="text" id="refVenta" name="refVenta" value="<?php echo $refVenta; ?>">
                                                     <input type="text" id="descripcion" name="descripcion" value="<?php echo $descripcion; ?>">
                                                     <input type="text" id="baseDevolucionIva" name="baseDevolucionIva" value="<?php echo $baseDevolucionIva; ?>">
                                                     <input type="text" id="iva" name="iva" value="<?php echo $iva; ?>">
                                                     <input type="text" id="valor" name="valor" value="<?php echo $valor; ?>">
                                                     <input type="text" id="moneda" name="moneda" value="<?php echo $moneda; ?>">
                                                     <input type="text" id="emailComprador" name="emailComprador" value="<?php echo $emailComprador; ?>">
                                                     <input type="text" name="firma"  id="firma" value="<?php echo $firma; ?>" />
                                                     <input type="text" name="prueba" id="prueba" value="1" />

                                                      <button type="sybmit" id="enviar" >Pagar En html</button><br>


                                                    </form>
</body>
</html>