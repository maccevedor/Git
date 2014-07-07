<?php
include_once "conexion.php";
//Se llama a la libreria de envio de correos
include_once "../lib/Swift/swift_required.php";

$conex = conectaBaseDatos();
$id = intval($_REQUEST['id']);
$email = $_REQUEST['Email'];
$programa = $_REQUEST['cPrograma'];




$sql="select Url from programa where id='$programa'";
$statement = $conex->prepare($sql);
$statement->execute();
$row = $statement->fetch(); 
$url= $row["Url"];




$fchRespuesta=date('Y-m-d H:i:s');
$sql="update estudiante set FchRespuesta = '$fchRespuesta' where Id=$id" ;
//$result = @mysql_query($sql);
$statement = $conex->prepare($sql);
$statement->execute();
$row = $statement->fetch(); 



if($programa =='1' || $programa =='2' || $programa =='5'|| $programa =='8' || $programa =='9' || $programa =='12' || $programa =='13' || $programa =='14' || $programa =='19'){
    $destino ="claudia.santacruz@umb.edu.co";
    $asesor	= "Claudia Santacruz";

}
else
{
   $destino="Liset.abreu@umb.edu.co";
	$asesor="Liset Abreu";
}




$subject = 'Inscripcion Correcta !';
$from = array('uvirtual@umb.edu.co' =>'UMB');
$to = array(
 $email  => 'Aspirante'
);

$text = "Mandrill speaks plaintext";
//$html = "<em>Este es el envio que se realiza para responderle al estuciante Mandrill speaks no entiendo poraque no sale el texto <strong>HTML</strong></em>";

$transport = Swift_SmtpTransport::newInstance('smtp.mandrillapp.com', 587);
$transport->setUsername('tecnologia@umb.edu.co');
$transport->setPassword('a9nuKggtFBlZlTNh_OtYuw');
$swift = Swift_Mailer::newInstance($transport);

$message = new Swift_Message($subject);
$message->setFrom($from);
$message->setCc(array($destino => "UMB virtual"));
$message->attach(Swift_Attachment::fromPath('../img/pensum/financiacion.pdf')->setFilename('financiacion.pdf'));
$message->attach(Swift_Attachment::fromPath('../img/pensum/'.$programa.'.jpg')->setFilename('pensum.jpg'));
//$message->setBody($html, 'text/html');


$message->setBody(
'<html>
<head>
<meta charset="UTF-8">
<title>Documento sin título</title>
<style type="text/css">
	body {font-family:Arial; font-size:12px; color:#fff;}
</style>
</head>

<body>
<table width="600" border="0" align="center" cellpadding="0" cellspacing="0" >
	<tr>
		<td colspan="5" style="font-size:12px; padding:15px; color:#999" align="center">Si no puedes ver este correo, puedes obtener mayor información <a href="'.$url.'" target="_blank" title="Mayor información">aquí</a></td>
	</tr>
	<tr>
	<td colspan="5"><a href="http://portal.umbvirtual.edu.co/inscripcion/index.php" target="_blank" title="Más información"><img src="http://www.umbvirtual.edu.co/mail-promocion/images/jpg/header.jpg" width="600" height="150" alt="Header" border="0"/></a></td>
</tr>
<tr>
	<td height="10" colspan="5" align="center" bgcolor="#e8534f">&nbsp;</td>
 </tr>
<tr>
	<td height="3" colspan="5" align="center" bgcolor="#e8534f"><a href="http://portal.umbvirtual.edu.co/inscripcion/index.php" target="_blank" title="Inscríbete aquí"><img src="http://www.umbvirtual.edu.co/mail-promocion/images/png/inscribete.png" width="560" height="55" alt="Inscríbete aquí" border="0"/></a></td>
   </tr>
	<tr>
		<td colspan="5" bgcolor="#e8534f"><img src="http://portal.umbvirtual.edu.co/inscripcion/img/pensum/c'.$programa.'.jpg" width="600" height="815" alt="Header"/></td>
	</tr>
	<tr>
	  <td colspan="5" bgcolor="#B0403D" height="10">&nbsp;</td>
  </tr>
  <tr>
	  <td height="5" colspan="5" align="center" bgcolor="#B0403D"><a href="http://portal.umbvirtual.edu.co/inscripcion/index.php" target="_blank" title="Inscríbete aquí"><img src="http://www.umbvirtual.edu.co/mail-promocion/images/png/inscribete.png" width="560" height="55" alt="Inscríbete aquí" border="0"/></a></td>
  </tr>
	<tr>
	  <td colspan="5" bgcolor="#B0403D" height="10">&nbsp;</td>
  </tr>
	<tr>
	  <td width="16" bgcolor="#B0403D">&nbsp;</td>
	  <td width="275" bgcolor="#B0403D"><a href="http://virtualnet2.umb.edu.co/videos/recomendaciones/" target="_blank" title="Recomendaciones"><img src="http://www.umbvirtual.edu.co/mail-promocion/images/jpg/recomendaciones.jpg" width="275" height="27" alt="Recomendaciones" border="0"/></a></td>
	  <td width="16" bgcolor="#B0403D">&nbsp;</td>
	  <td width="275" bgcolor="#B0403D"><a href="http://virtualnet2.umb.edu.co/tutorialv2/vd" target="_blank" title="Videotutorial"><img src="http://www.umbvirtual.edu.co/mail-promocion/images/jpg/videotutorial.jpg" width="275" height="27" alt="Video tutorial" border="0"/></a></td>
	  <td width="16" bgcolor="#B0403D">&nbsp;</td>
  </tr>
	<tr>
	  <td colspan="5" bgcolor="#B0403D" height="15"></td>
  </tr>
	<tr>
	  <td colspan="4" bgcolor="#B0403D" align="right">
      	<a href="http://twitter.com/#!/umbvirtual" target="_blank" title="UMB Virtual - Twitter"><img style="margin-left:5px;" src="http://www.umbvirtual.edu.co/mail-promocion/images/png/twitter.png" width="35" height="23" alt="Twitter" border="0" align="right"/></a>
		<a href="http://www.youtube.com/channel/UCMwjSzfWz_cdkbLrKEYbByg" target="_blank" title="UMB Virtual - Youtube"><img style="margin-left:15px;" src="http://www.umbvirtual.edu.co/mail-promocion/images/png/youTube.png" width="46" height="23" alt="Youtube" border="0" align="right"/></a>
		<a href="http://www.facebook.com/pages/Bogotá-Bogotá-Colombia/UMB-Virtual/190566057656393" target="_blank" title="UMB Virtual - Facebook"><img src="http://www.umbvirtual.edu.co/mail-promocion/images/png/facebook.png" width="23" height="23" alt="Facebook" border="0" align="right"/></a>
	  </td>
	  <td bgcolor="#B0403D">&nbsp;</td>
  </tr>
	<tr>
	  <td colspan="5" bgcolor="#B0403D" height="15"></td>
  </tr>
	<tr>
	  <td bgcolor="#B0403D">&nbsp;</td>
	  <td colspan="3" bgcolor="#B0403D" valign="top"><img src="http://www.umbvirtual.edu.co/mail-promocion/images/png/umbVirtual-footer.png" width="125" height="120" alt="UMB Virtual" border="0" align="left"/>
		<h3 style="color:#FFF">Cordialmente,</h3>
        <p style="color:#FFF">
			'.$asesor.'<br>
			Asesora de Promoción.<br>
			<a href="mailto:liset.abreu@umb.edu.co" title="Redactar un correo" style="color:#FFF;">'.$destino.'</a>
		</p>
      </td>
	  <td bgcolor="#B0403D">&nbsp;</td>
  </tr>
	<tr>
	  <td colspan="5" bgcolor="#B0403D" valign="top" align="center" height="45" style="font-size:11px; color:#FFF">
      	Km 27 vía Cajicá (+57 1) 546 06 00 Ext. 1470 - 1473.<br>
		Cajicá, Colombia.
      </td>
  </tr>
</table>
</body>
</html>',
  'text/html'
);


$message->setTo($to);
$message->addPart($text, 'text/plain');
//sleep(20);


if ($recipients = $swift->send($message, $failures))
{
 echo json_encode(array('success'=>true));
 //echo "<script languaje='javascript'>alert('se envio el correo');</script>";
} else {
	 echo json_encode(array('msg'=>'No se pudo enviar el correo'));
 ///echo "There was an error:\n";
 //print_r($failures);
}

?>