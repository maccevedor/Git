<?php
include_once "modelo/conexion.php";
//Se llama a la libreria de envio de correos
include_once "lib/Swift/swift_required.php";
include_once "view/mail.php";
$conex = conectaBaseDatos();

//$sql=$conex->query("select count(distinct a.iduser) as total from virtualnet_addons.usuarios_encuentro_umb a left join virtualnet.umb_empresa_app_estudiosos_cron b on b.idusuario = a.iduser,virtualnet.umb_empresa_app_coordinador_programa c where a.participara = 1 and c.cod_programa = b.cod_programa group by  a.iduser  ");
						$sql=$conex->query("select count(*) as total from encuentro");
                        $sql->execute();
						$result=$sql->fetchAll(PDO::FETCH_ASSOC);
						$results["total"]=$result[0]["total"];
                        //$rows=$results["total"];
//$sql="select distinct a.iduser, a.identificacion, a.nombre, a.email, b.cod_programa, c.programa from virtualnet_addons.usuarios_encuentro_umb a left join virtualnet.umb_empresa_app_estudiosos_cron b on b.idusuario = a.iduser, virtualnet.umb_empresa_app_coordinador_programa c where a.participara = 1 and c.cod_programa = b.cod_programa group by  a.iduser ";
                        $sql=$conex->query("select * from encuentro where participara='Noo'");
                        //$statement = $conex->prepare($sql);
                        $sql->execute();
                        $rows=$sql->fetchAll(PDO::FETCH_ASSOC); // Use fetchAll() if you want all results, or just iterate over the statement, since it implements Iterator
                        //print_r($rows);
                        //exit();
                        foreach($rows as $row){

                            
                            $email=$row["email"];
                            $destino="mauricio.acevedo@umb.edu.co";
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
                        }

?>