<?php
include("../clases/clsLanding.php"); 
include("../modelo/conexion.php"); 
include("../modelo/funciones.php"); 
    //crear el objeto con base en la clase 
$fuente= $_REQUEST['fuente'];
$Indexcol="";
$Conversion="";
$Manager="";

    if($fuente=="Indexcol" or $fuente=="Youtube" or $fuente=="Facebook" or $fuente=="Linkedin")
    {
    include('../lib/Indexcol.php');    
    }


  $conex = conectaBaseDatos();

    $names =array($_REQUEST['nombres'],$_REQUEST['apellidos']);
    $nombres=ucfirst($names[0]);
    $apellidos=ucfirst($names[1]);

    $objPag=new clsLanding(); 
    $objPag->setNombres($nombres); 
    $objPag->setApellidos($apellidos); 
    $objPag->setCedula($_REQUEST['cedula']); 
    $objPag->setCiudad($_REQUEST['ciudad']); 
    $objPag->setCorreo($_REQUEST['correo']); 
    $objPag->setTelefono($_REQUEST['telefono']); 
    $objPag->setPrograma($_REQUEST['programa']);  
    $objPag->setFch($_REQUEST['fch']);
    $objPag->setFuente($_REQUEST['fuente']);

    $objPag->guardar($conex);  
	 

  $nombresP = (isset($_REQUEST['nombres'])) 
    ? trim(strip_tags($_REQUEST['nombres']))
    : ""; 

    $apellidosP = (isset($_REQUEST['apellidos'])) 
    ? trim(strip_tags($_REQUEST['apellidos']))
    : ""; 

    $cedulaP = (isset($_REQUEST['cedula'])) 
    ? trim(strip_tags($_REQUEST['cedula']))
    : ""; 

    $ciudadP = (isset($_REQUEST['ciudad'])) 
    ? trim(strip_tags($_REQUEST['ciudad']))
    : ""; 
     $correoP = (isset($_REQUEST['correo'])) 
    ? trim(strip_tags($_REQUEST['correo']))
    : "";

     $telefonoP = (isset($_REQUEST['telefono'])) 
    ? trim(strip_tags($_REQUEST['telefono']))
    : ""; 

    $programaP = (isset($_REQUEST['programa'])) 
    ? trim(strip_tags($_REQUEST['programa']))
    : ""; 
    $fuenteP = (isset($_REQUEST['fuente'])) 
    ? trim(strip_tags($_REQUEST['fuente']))
    : ""; 

if ($correoP=="" && $telefonoP=="") {
            header("Location: ../error.html");
        }else{	

				$sql="select municipio,relacion from municipios where id='$ciudadP'";
				//$nombreCiudad=mysql_fetch_array(mysql_query($sql,$conexion));
				//$ciudad = $nombreCiudad[0];
                $statement = $conex->prepare($sql);
                $statement->execute();
                $row = $statement->fetch();
                $ciudad= $row["municipio"];
                $departamento= $row["relacion"];


				$sql="select programa from programa where id='$programaP'";
                $statement = $conex->prepare($sql);
                $statement->execute();
                $row = $statement->fetch();
                $programa= $row["programa"];

                if($departamento=='776' || $fuenteP=='Tolima'){
                    //$destino ="johanna.forero@umb.edu.co";
                    $destino ="diana.diaz@umb.edu.co ";
                    $subject = 'Pre-Inscripción por Landing Page 2014 Virtual Tolima (Google)';  
                    $CC="tatiana.rubio@umb.edu.co"; 
                    //$CC="maccevedor@gmail.com"; 
                }else{
                    if($programaP =='0' || $programaP =='1' || $programaP =='2' || $programaP =='4'|| $programaP =='5'|| $programaP =='8' || $programaP =='9' || $programaP =='12' || $programaP =='13' || $programaP =='14'){
                        $destino ="claudia.santacruz@umb.edu.co";
                        $subject = 'Pre-Inscripción por Landing Page 2014 Virtual (Google)';
                        $CC="uvirtual@umb.edu.co";     
                    }
                    else
                    {
                        $destino="liset.abreu@umb.edu.co";
                        $subject = 'Pre-Inscripción por Landing Page 2014 Virtual (Google)'; 
                        $CC="uvirtual@umb.edu.co";   
                    }
                }

				include_once "../lib/Swift/swift_required.php";

				
				$from = array('uvirtual@umb.edu.co' =>'UMB Virtual');
				$to = array(
				 $destino => 'Asesor UMB virtual'
				);

				$text = "Mandrill speaks plaintext";
				$html = "<em>Cordial Saludo<br><br>El siguiente usuario realizó su pre-inscripción vía web por medio del Landing Page de la pagina de la UMB Virtual:<br><br>
				Nombres: ".$nombresP."<br> Apellidos: ".$apellidosP."<br> Identificación ".$cedulaP."<br> Ciudad: ".$ciudad."<br> Correo: ".$correoP."<br> Teléfono: ".$telefonoP."<br> Programa: ".$programa." <br><br><center>www.umbvirtual.edu.co</center><br><center>Favor no responder a  este e-mail ya que fue generado por un programa de envios de correos másivos</center></em>";

				$transport = Swift_SmtpTransport::newInstance('smtp.mandrillapp.com', 587);
				$transport->setUsername('tecnologia@umb.edu.co');
				$transport->setPassword('a9nuKggtFBlZlTNh_OtYuw');
				$swift = Swift_Mailer::newInstance($transport);

				$message = new Swift_Message($subject);
				$message->setFrom($from);
				//$message->setCc(array("mauricio.acevedo@umb.edu.co" => "UMB virtual"));
                //$message->setCc(array("maccevedor@gmail.com" => "UMB virtual"));
                $message->setCc(array($CC => "UMB virtual"));
				//$message->attach(Swift_Attachment::fromPath('../img/2.pdf')->setFilename('2.pdf'));
				$message->setBody($html, 'text/html');
				$message->setTo($to);
				$message->addPart($text, 'text/plain');

				if ($recipients = $swift->send($message, $failures))
				{
				 // echo 'Message successfully sent!';
     //             echo $CC;
     //             echo $destino;
                    //echo $fuenteP;
				} else {
				 echo "Se presentó un error al realizar el envio del correo por favor comunicarse al 5460600 ext 1470 / 1473. :\n";
				 print_r($failures);
				}

                
			}

               if ($fuenteP=='expoelearning') {

                    header('Location: expo.php');
                        # code...
                } 


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta http-equiv="refresh" content="10;URL=http://umbvirtual.edu.co/" />
    <link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <!-- <link rel="shortcut icon" href="assets/ico/favicon.ico"> -->

    <title>Inscripción</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/main.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

  
    <?php echo $Indexcol; ?>        

  </head>

  <body>

    <?php echo $Manager; ?>       
          
   <div class="navbar">
        <div class="container">
            <div id="cabezote">
                <div class="umb"><img src="../img/escudoUMB.png"></div>
                <div class="virtual"><img src="../img/logo2.png"></div>
            </div>
        </div>
    </div>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron franja-roja">
      <div class="container">
        <h1>CONFIRMACIÓN</h1>
      </div>
    </div>

   <div class="jumbotron">
        <div class="container">
            <div class="row">
                <h1 class="subtitle">MUCHAS GRACIAS, TU PROCESO SE HA REALIZADO SATISFACTORIAMENTE.PRONTO NOS PONDREMOS EN CONTACTO CONTIGO.</h1>
                <div class="col-md-12">
                    <h3>Apreciado aspirante:</h3><br>
                    Si estás viendo esta página, quiere decir que el proceso de registro para nuevos aspirantes ha sido completado de forma exitosa.<br><br>

                    Nuestras asesoras se estarán comunicando contigo dentro de los siguientes días.
    
                     <?php echo $Conversion; ?>   

                </div>
            </div>
        </div>
    </div>

    <div class="jumbotron creditos">
        <div class="container">
            <div class="row">
                <footer>
                    <div class="col-md-6 copyright">© 2014 UMB Virtual | Todos los derechos reservados.</div>
                    <div class="col-md-6">
                        <ul class="social-networks social-networks">
                            <li class="facebook"><a title="Facebook" target="_blank" href="http://www.facebook.com/pages/Bogot%C3%A1-Bogot%C3%A1-Colombia/UMB-Virtual/190566057656393">Facebook</a>
                            <li class="twitter"><a title="Twitter" target="_blank" href="http://twitter.com/#!/umbvirtual">Twitter</a>
                            <li class="youtube"><a title="Youtube" target="_blank" href="http://www.youtube.com/channel/UCMwjSzfWz_cdkbLrKEYbByg">Youtube</a>
                        </ul>
                    </div>
                </footer>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>

