<?php
include_once "modelo/conexion.php";
//Se llama a la libreria de envio de correos
include_once "lib/Swift/swift_required.php";
include_once "view/mail.php";
$email="mauricio.acevedo@umb.edu.co";
$destino="maccevedor@gmail.com";
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
$message->attach(Swift_Attachment::fromPath('img/pensum/encuentro.pdf')->setFilename('encuentro.pdf'));
//$message->setBody($html, 'text/html');
$message->setBody(
$hola,
  'text/html'
);
$message->setTo($to);
$message->addPart($text, 'text/plain');
if ($recipients = $swift->send($message, $failures))
{
 echo json_encode(array('success'=>true));
 //echo "<script languaje='javascript'>alert('se correctamente envio el correo');</script>";
} else {
     echo json_encode(array('msg'=>'No se pudo enviar el correo'));
 ///echo "There was an error:\n";
 //print_r($failures);
}
?>