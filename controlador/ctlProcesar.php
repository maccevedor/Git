<?php 
include("../clases/clsInscripcion.php"); 
include("../clases/clsEntrevista.php");
include("../clases/clsAcademica.php"); 
include("../modelo/conexion.php"); 
include("../modelo/funciones.php"); 

    $conex = conectaBaseDatos();
    $names =array($_REQUEST['nombre'],$_REQUEST['apellido']);
    $nombre=ucfirst($names[0]);
    $apellido=ucfirst($names[1]);

    //crear el objeto con base en la clase 
    $objCon=new clsInscripcion(); 
    $objCon->setTipoId($_REQUEST['tipoId']);
    $objCon->setIdentificacion($_REQUEST['identificacion']);
    $objCon->setNombre($nombre);
    $objCon->setApellido($apellido);
    $objCon->setPrograma($_REQUEST['programa']);  
    $objCon->setFchNacimiento($_REQUEST['fchNacimiento']);  
    $objCon->setLNacimiento($_REQUEST['lNacimiento']);   
    $objCon->setDireccion($_REQUEST['direccion']);   
    $objCon->setCiudad($_REQUEST['ciudad']);   
    $objCon->setBarrio($_REQUEST['barrio']);   
    $objCon->setTelefono($_REQUEST['telefono']);   
    $objCon->setCelular($_REQUEST['celular']);
    $objCon->setEmail(strtolower($_REQUEST['email']));
    $objCon->setGenero($_REQUEST['genero']);
    $objCon->setEstCivil($_REQUEST['estCivil']);
    $objCon->setFuente($_REQUEST['fuente']);
    $objCon->setFch($_REQUEST['fch']);

    //Toma el ultimo id insertado para ser ulizado como llave foreana de las otras tablas
    $insertId = $objCon->guardar($conex); 

    //crear el objeto para guarda la parte 2 de la entrevista
    $objEnt=new clsEntrevista(); 
    $objEnt->setProgramaAcademico($_REQUEST['programaAcademico']); 
    $objEnt->setExperiencia($_REQUEST['experiencia']); 
    $objEnt->setVirtual($_REQUEST['virtual']); 
    $objEnt->setUmb($_REQUEST['umb']); 
    $objEnt->setFinanciacion($_REQUEST['financiacion']); 
    $objEnt->setComputadora($_REQUEST['computadora']);
    $objEnt->setTIC($_REQUEST['TIC']); 
    $objEnt->setLaboral($_REQUEST['laboral']); 
    $objEnt->setInstitucionT($_REQUEST['institucionT']); 
    $objEnt->setFchInicio($_REQUEST['fchInicio']);   
    $objEnt->setFchfinal($_REQUEST['fchFinal']); 
    $objEnt->setTelefonoT($_REQUEST['telefonoT']);
    $objEnt->setCiudadt($_REQUEST['ciudadT']); 
    $objEnt->setCargo($_REQUEST['cargo']); 
    $objEnt->setIdentificacion($_REQUEST['identificacion']);
    $objEnt->setInsertId($insertId);
    $objEnt->guardar($conex);   

    //Valida si la persona trabaja
    $trabaja= $_REQUEST['trabaja'];
    if ($trabaja=="option1") {
      $objEnt->guardar2($conex);   
    }else{
      $objEnt->guardar3($conex);  
    }

    //crear el objeto con la informacion academica del estudiantes
    $objAca=new clsAcademica(); 

    for($i = 0; $i < count($_REQUEST['nivel']); $i++) {

    $objAca->setNivel($_REQUEST['nivel'][$i]); 
    $objAca->setTitulo($_REQUEST['titulo'][$i]); 
    $objAca->setInstitucion($_REQUEST['institucion'][$i]); 
    $objAca->setFchEgreso($_REQUEST['fchEgreso'][$i]); 
    $objAca->setIdentificacion($_REQUEST['identificacion']);
    $objAca->setInsertId($insertId);
    $objAca->guardar($conex);

    //Recuperamos los datos para enviarlos en el correo
    $nivelP = (isset($_REQUEST['nivel'][$i])) 
    ? trim(strip_tags($_REQUEST['nivel'][$i]))
    : ""; 

    $tituloP = (isset($_REQUEST['titulo'][$i])) 
    ? trim(strip_tags($_REQUEST['titulo'][$i]))
    : ""; 

    $institucionP = (isset($_REQUEST['institucion'][$i])) 
    ? trim(strip_tags($_REQUEST['institucion'][$i]))
    : ""; 

    $fchEgresoP = (isset($_REQUEST['fchEgreso'][$i])) 
    ? trim(strip_tags($_REQUEST['fchEgreso'][$i]))
    : ""; 


  }

    //Recuperamos los datos para enviarlos en el correo
    $identificacionP = (isset($_REQUEST['identificacion'])) 
    ? trim(strip_tags($_REQUEST['identificacion']))
    : ""; 

    $programaP = (isset($_REQUEST['programa'])) 
    ? trim(strip_tags($_REQUEST['programa']))
    : ""; 

    $emailP = (isset($_REQUEST['email'])) 
    ? trim(strip_tags($_REQUEST['email']))
    : ""; 

    $nombreP = (isset($_REQUEST['nombre'])) 
    ? trim(strip_tags($_REQUEST['nombre']))
    : ""; 
     $apellidoP = (isset($_REQUEST['apellido'])) 
    ? trim(strip_tags($_REQUEST['apellido']))
    : ""; 
    $celularP = (isset($_REQUEST['celular'])) 
    ? trim(strip_tags($_REQUEST['celular']))
    : ""; 
    $telefonoP = (isset($_REQUEST['telefono'])) 
    ? trim(strip_tags($_REQUEST['telefono']))
    : ""; 
    $identificacionP = (isset($_REQUEST['identificacion'])) 
    ? trim(strip_tags($_REQUEST['identificacion']))
    : ""; 
    $direccionP = (isset($_REQUEST['direccion'])) 
    ? trim(strip_tags($_REQUEST['direccion']))
    : ""; 
     $barrioP = (isset($_REQUEST['barrio'])) 
    ? trim(strip_tags($_REQUEST['barrio']))
    : ""; 
    $fchNacimientoP = (isset($_REQUEST['fchNacimiento'])) 
    ? trim(strip_tags($_REQUEST['fchNacimiento']))
    : ""; 
     $estCivilP = (isset($_REQUEST['estCivil'])) 
    ? trim(strip_tags($_REQUEST['estCivil']))
    : ""; 
     $programaAcademicoP = (isset($_REQUEST['programaAcademico'])) 
    ? trim(strip_tags($_REQUEST['programaAcademico']))
    : ""; 
     $experienciaP = (isset($_REQUEST['experiencia'])) 
    ? trim(strip_tags($_REQUEST['experiencia']))
    : ""; 
     $virtualP = (isset($_REQUEST['virtual'])) 
    ? trim(strip_tags($_REQUEST['virtual']))
    : ""; 
     $umbP = (isset($_REQUEST['umb'])) 
    ? trim(strip_tags($_REQUEST['umb']))
    : "";
    $ciudadC = (isset($_REQUEST['ciudad'])) 
    ? trim(strip_tags($_REQUEST['ciudad']))
    : "";  



  $sql="select Precio,Inscripcion,Programa from programa where id='$programaP'";
  $statement = $conex->prepare($sql);
  $statement->execute();
  $row = $statement->fetch();
  $inscripcion= $row["Inscripcion"];
  $precio= $row["Precio"];
  $Nprograma= $row["Programa"];  

  //operaciones y datos para pago en linea (no esta funcionando en estos momentos)
  $descripcion = "pago en linea";
  $refVenta = "INS-1000002";
  $baseDevolucionIva = $precio * 0.84 ;
  $iva = $precio *0.16;
  $valor = $precio ;
  $key= "ec413b6de9f";
  $usuarioId = "106799";
  $refVenta = "INS-1000002";
  $moneda = "COP";
  $emailComprador = "maccevedor@gmail.com";
  $firma = md5($key."~".$usuarioId."~".$refVenta."~".$valor."~".$moneda);
  
  $sql="select e.id from municipios m
  inner join estados e on e.id=m.relacion
  where m.id='$ciudadC'";
  $statement = $conex->prepare($sql);
  $statement->execute();
  $row = $statement->fetch();
  $ciudadE= $row["id"];

  //Esta condicion es debido  al municipio donde vive el futuro estudioso 
  if($ciudadE==776)
    {
      $destino ="laura.toro@umb.edu.co";
      $coordinador ="johanna.forero@umb.edu.co";
    }else{  
      if($programaP =='1' || $programaP =='2' || $programaP =='5'|| $programaP =='8' || $programaP =='9' || $programaP =='12' || $programaP =='13' || $programaP =='14' || $programaP =='19'){
        $destino ="claudia.santacruz@umb.edu.co";
        $coordinador ="adriana.casas@umb.edu.co";
      }
      else
      {
         $destino="Liset.abreu@umb.edu.co";
         $coordinador ="adriana.casas@umb.edu.co";
      }
    }
   
//Enviarle al usuario que fue correcta la inscripcion

include_once "../lib/Swift/swift_required.php";

$subject = 'Inscripción correcta';
$from = array('uvirtual@umb.edu.co' =>'UMB Virtual');
$to = array(
 //$emailP  => 'Aspirante',
 $coordinador  => 'Coordinador',
 $destino => 'Asesor UMB virtual'
);

$text = "Mandrill speaks plaintext";
$html = "<em>Cordial Saludo,<br>
Cedula ".$identificacionP."<br>
".$nombreP." ".$apellidoP."<br><br>
Tus datos de contacto son :<br>Celular ".$celularP."<br>
Teléfono ".$telefonoP."<br>
Dirección ".$direccionP."<br>
Barrio ".$barrioP."<br>
Fecha Nacimiento ".$fchNacimientoP."<br>
Estado Civil ".$estCivilP."<br>
Entrevista<br>
Respuesta 1: ".$programaAcademicoP."<br>
Respuesta 2: ".$experienciaP."<br>
Respuesta 3: ".$virtualP."<br>
Respuesta 4: ".$umbP."<br>
Estudios <br>
Nivel de estudios: ".$nivelP."<br>
Título obtenido ".$tituloP."<br>
Institución ".$institucionP."<br>
Fecha de egreso ".$fchEgresoP."<br>

Tu proceso de admisión en línea se realizó satisfactoriamte al programa ".$Nprograma.", por favor comunícate con nosotros para continuar con el proceso.

PBX: 5460600 Ext. 1470 – 1473 
Línea gratuita: 01 8000 931919 
<br><center>www.umbvirtual.edu.co</center><br><center>Favor no responder a a este e-mail ya que fue generado por un programa de envios de correos másivos</center></em>";;

$transport = Swift_SmtpTransport::newInstance('smtp.mandrillapp.com', 587);
$transport->setUsername('tecnologia@umb.edu.co');
$transport->setPassword('a9nuKggtFBlZlTNh_OtYuw');
$swift = Swift_Mailer::newInstance($transport);

$message = new Swift_Message($subject);
$message->setFrom($from);
$message->setCc(array("mauricio.acevedo@umb.edu.co" => "UMB virtual"));
$message->setBody($html, 'text/html');
$message->setTo($to);
$message->addPart($text, 'text/plain');

if ($recipients = $swift->send($message, $failures))
{
 //echo 'Message successfully sent!';
} else {
 echo "Se presento un error al realizar el envio del correo por favor comunicarse al :\n";
 print_r($failures);
}
?>

<!DOCTYPE html>
<!-- saved from url=(0066)wizard.html -->
<html lang="en" class=" js">
<!-- Mirrored from bootstraphunter.com/jarvisadmin/wizard.html by HTTrack Website Copier/3.x [XR&CO'2013], Thu, 06 Mar 2014 15:18:52 GMT -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Inscripción UMB Virtual</title>
<meta name="description" content="">
<meta name="author" content="">

<!-- http://davidbcalhoun.com/2010/viewport-metatag -->
<meta name="HandheldFriendly" content="True">
<meta name="MobileOptimized" content="320">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

<!--// CSS FILES //-->
<link rel="stylesheet" href="../css/master-css.min.css">
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>

<!-- // THEME CSS changed by javascript: the CSS link below will override the rules above // -->
<!-- For more information, please see the documentation for "THEMES" -->
<!--     <link rel="stylesheet" id="switch-theme-js" href="../css/themes/default3860.css?v=1">   -->

<!-- To switch to full width -->
<!--     <link rel="stylesheet" id="switch-width" href="../css/full-width3860.css?v=1"> -->

<!-- Webfonts -->
<!--  <link rel="stylesheet" href="../js/include/css" type="text/css"> -->

<!-- All javascripts are located at the bottom except for HTML5 Shim -->
<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<script src="js/include/respond.min.js"></script>
<![endif]-->

<!-- For Modern Browsers -->
<link rel="shortcut icon" href="../img/favicons/favicon.html">
<!-- For everything else -->
<link rel="shortcut icon" href="../img/favicons/favicon.ico">
<!-- For retina screens -->
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="../img/favicons/apple-touch-icon-retina.png">
<!-- For iPad 1-->
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="../img/favicons/apple-touch-icon-ipad.png">
<!-- For iPhone 3G, iPod Touch and Android -->
<link rel="apple-touch-icon-precomposed" href="../img/favicons/apple-touch-icon.png">

<!-- iOS web-app metas -->
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<!-- Add your custom home screen title: -->
<meta name="apple-mobile-web-app-title" content="Jarvis">

<!-- Startup image for web apps -->
<link rel="apple-touch-startup-image" href="../img/splash/ipad-landscape.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape)">
<link rel="apple-touch-startup-image" href="../img/splash/ipad-portrait.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait)">
<link rel="apple-touch-startup-image" href="../img/splash/iphone.png" media="screen and (max-device-width: 320px)">
</head>

<body>
<!-- .height-wrapper -->
<div class="height-wrapper"> 
  
  <!-- header -->
  <header>
    <!-- Logo -->
    <div id="logo-wrapper">
      <!-- <div class="container"> -->
        <div id="logo">
          <a href="http://portal.umbvirtual.edu.co"><img src="http://portal.umbvirtual.edu.co/wp-content/uploads/2014/01/logo2.png" width="365" height="70" border="0" alt="UMB Virtual" class=""></a>
        </div>
      <!-- </div> -->
    </div>
    <!-- Menu -->
    <div id="small-nav">
      <div id="container-menu">
        <a id="" href="http://portal.umbvirtual.edu.co">Inicio</a>
      </div>
    </div>
    <!-- tool bar -->
    <div class="jumbotron franja-roja">
      <div class="container">
        <center>
          <h1>ADMISIONES</h1>
        </center>
      </div>
    </div>
    <div class="jumbotron franja-dark">
      <div class="container">
        <center>
          <p>La Educación de la UMB Virtual está basada en el “aprendizaje feliz”, donde se brinda al estudioso un escenario motivacional-multimedial que permite disfrutar el proceso educativo, desde la autogestión, sin limitarse a recursos textuales en PDF.</p>
        </center>
      </div>
    </div>
  </header>
  <!-- end header -->

  <div id="main" role="main" class="container-fluid">
    <div class="contained"> 
      <!-- aside --> 
      <!-- <aside> --> 
      
      <!-- search box --> 
      
      <!-- end search box --> 
      
      <!-- aside item: Mini profile --> 
      
      <!-- end aside item: Mini profile --> 
      
      <!-- aside item: Menu --> 
      
      <!-- end aside item: Menu --> 
      
      <!-- </aside> --> 
      <!-- aside end --> 
      
      <!-- main content -->
      <div id="page-content">
        <div class="fluid-container"> 
          
          <!-- widget grid -->
          <section id="widget-grid" class=""> 
            
            <!-- row-fluid -->
            
            <div class="row-fluid">
              <article class="span12 sortable-grid ui-sortable"> 
                
                <!-- new widget --> 
                
                <!-- end widget -->
                <div class="jarviswidget jarviswidget-sortable" id="widget-id-0" role="widget" style=""> 
                  
                  <!-- wrap div -->
                  <div role="content">
                    <div class="jarviswidget-editbox">
                      <div>
                        <label>Title:</label>
                        <input type="text">
                      </div>
                      <div>
                        <label>Styles:</label>
                        <span data-widget-setstyle="purple" class="purple-btn"></span> <span data-widget-setstyle="navyblue" class="navyblue-btn"></span> <span data-widget-setstyle="green" class="green-btn"></span> <span data-widget-setstyle="yellow" class="yellow-btn"></span> <span data-widget-setstyle="orange" class="orange-btn"></span> <span data-widget-setstyle="pink" class="pink-btn"></span> <span data-widget-setstyle="red" class="red-btn"></span> <span data-widget-setstyle="darkgrey" class="darkgrey-btn"></span> <span data-widget-setstyle="black" class="black-btn"></span> </div>
                    </div>
                    <div class="inner-spacer"> 
                      <!-- content goes here -->
                      <form id="wizard"  name="wizard" class="themed" action="ctlPago.php" method="post">
                        <div id="wizard_name">
                        <div class="centered"> 
                          <!-- wizard steps -->
                          <ul class="bwizard-steps nav">
                            <li class="active"> <span class="label badge-inverse">3</span> <a href="wizard.html#inverse-tab3" data-toggle="tab">Pago</a> </li>
                          </ul>
                          <!-- end wizard steps --> 
                        </div>
                        <div class="tab-content">
                        <!-- step 1--> 
                        
                        <!-- widget edit box -->
                        <div class="jarviswidget-editbox">
                          <div>
                            <label>Title:</label>
                            <input type="text">
                          </div>
                          <div>
                            <label>Styles:</label>
                            <span data-widget-setstyle="purple" class="purple-btn"></span> <span data-widget-setstyle="navyblue" class="navyblue-btn"></span> <span data-widget-setstyle="green" class="green-btn"></span> <span data-widget-setstyle="yellow" class="yellow-btn"></span> <span data-widget-setstyle="orange" class="orange-btn"></span> <span data-widget-setstyle="pink" class="pink-btn"></span> <span data-widget-setstyle="red" class="red-btn"></span> <span data-widget-setstyle="darkgrey" class="darkgrey-btn"></span> <span data-widget-setstyle="black" class="black-btn"></span> </div>
                        </div>
                        <!-- end widget edit box -->
                        <div class="control-group franja-gris">
                          <div class="centered">
                            <h1 class="subtitle">FORMAS DE PAGO</h1>
                            <p>Por favor selecciona una de las formas de pago, en cada una se explica el proceso que se debe realizar.</p>
                            <div class="inner-spacer border"> 
                              <!-- content -->
                              <div class="accordion" id="accordion1">
                                <div class="accordion-group">
                                  <div class="accordion-heading"> <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse1"> <i class="icon-plus-sign"></i> Opción 1: Pago en universidad </a> </div>
                                  <div id="collapse1" class="accordion-body collapse" style="height: 0px;">
                                    <div class="accordion-inner">
                                      <p class="pasos">Puedes acercarte a una de nuestras sedes en Bogotá, Cajicá o Bucaramanga y cancelar en la Tesorería UMB con pago en efectivo, tarjeta de crédito o débito con documento de identidad. Recuerda enviar el comprobante de pago al correo <a href="mailto:claudia.santacruz@umb.edu.co" title="Enviar comprobante">claudia.santacruz@umb.edu.co</a> o <a href="mailto:liset.abreu@umb.edu.co" title="Enviar comprobante">liset.abreu@umb.edu.co</a>, según el programa académico seleccionado.</p>
                                      <p class="pasos">Códigos para pago de inscripción</p>
                                      <div class="table-1">
                                        <table width="100%">
                                          <thead>
                                            <tr>
                                              <th>Asignatura</th>
                                              <th width="100px">Código del programa</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            <tr>
                                              <td><?php echo $Nprograma ?></td>
                                              <td><?php echo $inscripcion ?></td>
                                            </tr>
                                           
                                          </tbody>
                                        </table>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="accordion-group">
                                  <div class="accordion-heading"> <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse3"> <i class="icon-plus-sign"></i> Opción 2: Pago en sucursal bancaria </a> </div>
                                  <div id="collapse3" class="accordion-body in collapse" style="height: auto;">
                                    <div class="accordion-inner">
                                      <p class="pasos">Puedes cancelar en las siguientes entidades bancarias a nombre de UNIVERSIDAD MANUELA BELTRÁN:</p>
                                      <div class="bank"> <img src="../img/png/banco-sudameris.png" border="0">
                                        <p>Cuenta Corriente N.97000210</p>
                                      </div>
                                      <div class="bank"> <img src="../img/png/davivienda.png" border="0">
                                        <p>Cuenta Corriente N. 457000098261</p>
                                      </div>
                                      <div class="bank"> <img src="../img/png/banco-popular.png" border="0">
                                        <p>Cuenta Corriente N. 011-16525-5</p>
                                      </div>
                                      <div class="table-1">
                                        <table width="100%">
                                          <thead>
                                            <tr>
                                              <th colspan="2">Diligencia estos códigos en la consignación</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            <tr>
                                              <td><strong>REF 1:</strong></td>
                                              <td>Cédula del cliente</td>
                                            </tr>
                                            <tr>
                                              <td><strong>REF 2:</strong></td>
                                              <td><!-- Código del producto --> Códigos para pago de inscripción</td>
                                            </tr>
                                          </tbody>
                                        </table>
                                        <br><br>
                                        <!-- <p class="pasos">Códigos para pago de inscripción</p> -->
                                        <div class="table-1">
                                          <table width="100%">
                                            <thead>
                                              <tr>
                                                <th>Asignatura</th>
                                                <th width="100px">Código del programa</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                               <tr>
                                              <td><?php echo $Nprograma ?></td>
                                              <td><?php echo $inscripcion ?></td>
                                            </tr>
                                            </tbody>
                                          </table>
                                        </div>
                                        <p class="pasos">Recuerde enviar el comprobante de pago al correo <a href="mailto:claudia.santacruz@umb.edu.co" title="Enviar comprobante">claudia.santacruz@umb.edu.co</a> o <a href="mailto:liset.abreu@umb.edu.co" title="Enviar comprobante">liset.abreu@umb.edu.co</a> según el programa académico seleccionado.</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="accordion-group">
                                    <div class="accordion-heading"> <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse2"> <i class="icon-plus-sign"></i> Opción 3: Pago en línea </a> </div>
                                    <div id="collapse2" class="accordion-body collapse" style="height: 0px; ">
                                      <div class="accordion-inner"> Recuerde que para pagos en línea se debe diligenciar la carta de autorización de transacción para la validación del pago.<br>
                                        Por favor diligenciar los campos faltantes para completar la información de la carta de autorización, y después descargue el PDF.</p>


                              <div id="fchMatricula" class="control-group" style="display:none">
                                  Por favor confirmar si se encuentra en las fechas de autorizacion de pago. Por favor comuníquese al PBX 5460600 Ext. 1470 o 1473 para generar la orden matrícula
                                </div>
                              <div id="matricula">   
                                              <p class="pasos">Por favor confirmar si se encuentra en las fechas de autorizacion de pago. Por favor comuníquese al PBX 5460600 Ext. 1470 o 1473 para generar la orden matrícula.</p>

                                              <label class="control-label" for="" >Cédula del inscrito</label>
                                                <?php print "<input type=\"textbox\" name=\"identificacionP\" id=\"identificacionP\"  value=\"$identificacionP\"  class=\"span12\" />\n" ?>

                                              <label class="control-label" for="" >Nombre del inscrito</label>
                                                <?php print "<input type=\"textbox\" name=\"nombreP\" id=\"nombreP\"  value=\"$nombreP $apellidoP\"  class=\"span12\"/></p>\n"  ?>
                                                <?php print " <input type=\"hidden\" name=\"programaP\" id=\"programaP\"  value=\"$programaP\"  class=\"span12\"/>"  ?>  
                                                <?php print " <input type=\"hidden\" name=\"id\" id=\"id\"  value=\"$insertId\"  class=\"span12\"/>"  ?>  
                                                
                                              <label class="control-label" for="s4">Persona que autoriza la transacción (Tarjetahabiente) </label>
                                                <input type="textbox" class="span12" id="persona" name="persona" placeholder="Ingresa el nombre de la persona que autoriza la transacción" maxlength="300"  onkeyup="validaremos(this,'special')" onblur="validaremos(this,'special')">

                                              <label class="control-label" for="s4">Identificación de la persona que autoriza la transacción (Tarjetahabiente)</label>
                                                <input type="text" class="span12" id="idPersona" name="idPersona" placeholder="Ingresa el número de identificación de la persona que autoriza la transacción" maxlength="300"  onkeyup="validaremos(this,'special')" onblur="validaremos(this,'special')">

                                              <label class="control-label" for="s4">Identificación expedida en</label>
                                                <select name="ciudadP" id="ciudadP" class="span12">
                                                  <option value="">Selecciona una ciudad</option>
                                                    <?php $ciudades = dameCiudad();
                                                      foreach($ciudades as $indice => $registro){
                                                      echo "<option value=".$registro['id'].">".$registro['municipio'].' - '.$registro['estado']."</option>";
                                                      }
                                                    ?>
                                                </select>

                                              <label class="control-label" for="s6">Fecha de la transacción</label>
                                                <!-- <input type="date" class="span12" id="fchPago" name="fchPago" value="<?php echo date('Y-m-d'); ?>" > -->

                                                <div class="input-append date" id="datepicker-js" data-date="<?php echo date('Y-m-d'); ?>" data-date-format="yyyy-mm-dd">
                                                  <input class="datepicker-input" size="16" type="text" value="<?php echo date('Y-m-d'); ?>" placeholder="Select a date" id="fchPago" name="fchPago"  autocomplete="off" readonly>
                                                  <span class="add-on"><i class="cus-calendar-2"></i></span>
                                                </div>

                                              <label class="control-label" for="">Forma de pago</label>
                                                <select name="tipoCuenta" id="tipoCuenta" class="span12">
                                                  <option value="">Selecciona una forma de pago</option>
                                                  <option value="CUENTA DE AHORROS">Cuenta ahorros</option>
                                                  <option value="CUENTA CORRIENTE">Cuenta corriente</option>
                                                  <option value="TARJETA DE CREDITO">Tarjeta de crédito</option>
                                                </select>

                                              <label class="control-label" for="">Banco o red</label>
                                                <select name="banco" id="banco"  class="span12">
                                                  <option value="">Selecciona un banco o red</option>
                                                  <option value="BANCO AV VILLAS">Banco AV Villas</option>
                                                  <option value="BANCO CAJA SOCIAL">Banco Caja Social</option>
                                                  <option value="BANCO COLPATRIA">Banco Colpatria</option>
                                                  <option value="BANCO CORPBANCA S.A">Banco Corpbanca S.A</option>
                                                  <option value="BANCO DAVIVIENDA">Banco Davivienda</option>
                                                  <option value="BANCO DE BOGOTA">Banco de Bogotá</option>
                                                  <option value="BANCO DE OCCIDENTE">Banco de Occidente</option>
                                                  <option value="BANCO FALABELLA">Banco Falabella </option>
                                                  <option value="BANCO GNB COLOMBIA S.A">Banco GNB Colombia S.A</option>
                                                  <option value="BANCO GNB SUDAMERIS">Banco GNB Sudameris</option>
                                                  <option value="BANCO PICHINCHA S.A.">Banco Pichincha S.A.</option>
                                                  <option value="BANCO POPULAR">Banco Popular</option>
                                                  <option value="BANCO PROCREDIT">Banco Procredit</option>
                                                  <option value="BANCOLOMBIA">Bancolombia</option>
                                                  <option value="BANCOOMEVA S.A.">Bancoomeva S.A.</option>
                                                  <option value="BBVA COLOMBIA S.A.">BBVA Colombia S.A.</option>
                                                  <option value="CITIBANK">Citibank </option>
                                                  <option value="VISA">Visa</option>
                                                  <option value="MASTERCARD">Mastercard</option>
                                                  <option value="DINERS">Diners</option>
                                                  <option value="AMERICAN EXPRESS">American Express</option>
                                              </select>

                                               <label class="control-label" for="s6">No. de cuenta o tarjeta de crédito</label>
                                              <div class="controls">
                                                <input type="text" class="span12" id="cuenta" name="cuenta" >
                                              </div>

                                              <label class="control-label" for="s6" id="textoValor">Por un valor</label>
                                                <?php print "<input type=\"text\" name=\"valor\" id=\"valor\"  value=\"$precio\" class=\"span12\" readonly/>\n"  ?>

                                              <div class="form-actions wizard">
                                                <div  align="center">
                                                  <ul style="list-style: none;">
                                                    <li class="previous disabled"> </li>
                                                    <li class="next"> <a href="javascript:void(0);" class="btn medium btn-primary next"> Descargar PDF </a> </li>

                                                    
                                                      <script type="text/javascript">

                                                        function OpenInNewTab(url )

                                                        {

                                                          var win=window.open('https://www.e-collect.com/p_express/secure/services.aspx','_blank');

                                                          win.focus();

                                                        }

                                                      </script>






                                                  </ul>
                                                </div>
                                              </div>
                                             </div>   
                                          </div>

                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <!-- end content --> 
                              </div>
                            </div>
                            </fieldset>
                            <!-- wizard -->
                            
                            <div class="jumbotron franja-dark">
                              <div class="centered">
                                <div class="span6 hidden-phone"> <strong class="" style="margin-right: 5px; line-height: 25px; float:left;">Iniciar</strong> <strong class="" style="margin-left: 5px; line-height: 25px;">Terminar</strong>
                                </div>
                                <div class="span6">
                                  <ul style="list-style: none;">
                                  </ul>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                    <!-- end content--> 
                  </div>
                  <!-- end wrap div --> 
                </div>
              </article>
            </div>
            
            <!-- end row-fluid --> 
            
          </section>
          <!-- end widget grid --> 
        </div>
      </div>
      <!-- end main content --> 
      
      <!-- aside right on high res --> 
      
      <!-- end aside right --> 
    </div>
  </div>
  <!--/.fluid-container-->
  <!-- <div class="push"></div> -->
</div>
<!-- end .height-wrapper --> 

<!-- footer --> 

<!-- if you like you can insert your footer here --> 

<!-- end footer --> 

<!--================================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 

<!-- Link to Google CDN's jQuery + jQueryUI; fall back to local --> 
<script src="../js/include/jquery.min.js"></script> 
<script>window.jQuery || document.write('<script src="../js/libs/jquery.min.js"><\/script>')</script> 
<!-- OPTIONAL: Use this migrate scrpit for plugins that are not supported by jquery 1.9+ --> 
<!-- DISABLED <script src="js/libs/jquery.migrate-1.0.0.min.js"></script> --> 
<script src="../js/include/jquery-ui.min.js"></script> 
<script>window.jQuery.ui || document.write('<script src="../js/libs/jquery.ui.min.js"><\/script>')</script> 

<!-- IMPORTANT: Jquery Touch Punch is always placed under Jquery UI --> 
<script src="../js/include/jquery.ui.touch-punch.min.js"></script> 

<!-- REQUIRED: Mobile responsive menu generator --> 
<script src="../js/include/selectnav.min.js"></script> 

<!-- REQUIRED: Datatable components --> 
<script src="../js/include/jquery.accordion.min.js"></script> 

<!-- REQUIRED: Toastr & Jgrowl notifications  --> 
<script src="../js/include/toastr.min.js"></script> 
<script src="../js/include/jquery.jgrowl.min.js"></script> 

<!-- REQUIRED: Sleek scroll UI  --> 
<script src="../js/include/slimScroll.min.js"></script> 

<!-- REQUIRED: Datatable components --> 
<script src="../js/include/jquery.dataTables.min.js"></script> 
<script src="../js/include/DT_bootstrap.min.js"></script> 

<!-- REQUIRED: Form element skin  --> 
<script src="../js/include/jquery.uniform.min.js"></script> 

<!-- REQUIRED: AmCharts  --> 
<script src="../js/include/amcharts.js"></script> 
<script src="../js/include/amchart-draw1.js"></script> 
<script type="text/javascript">
var ismobile = (/iphone|ipad|ipod|android|blackberry|mini|windows\sce|palm/i.test(navigator.userAgent.toLowerCase()));  
if(!ismobile){

/** ONLY EXECUTE THESE CODES IF MOBILE DETECTION IS FALSE **/

/* REQUIRED: Datatable PDF/Excel output componant */

document.write('<script src="../js/include/ZeroClipboard.min.js"><\/script>');
document.write('<script src="../js/include/TableTools.min.js"><\/script>'); 
document.write('<script src="../js/include/select2.min.js"><\/script>');
document.write('<script src="../js/include/jquery.excanvas.min.js"><\/script>');
document.write('<script src="../js/include/jquery.placeholder.min.js"><\/script>');
}else{

/** ONLY EXECUTE THESE CODES IF MOBILE DETECTION IS TRUE **/

document.write('<script src="../js/include/responsive-tables.min.js"><\/script>');
}
</script><script src="../js/include/ZeroClipboard.min.js"></script><script src="../js/include/TableTools.min.js"></script><script src="../js/include/select2.min.js"></script><script src="../js/include/jquery.excanvas.min.js"></script><script src="../js/include/jquery.placeholder.min.js"></script> 

<!-- REQUIRED: iButton --> 
<script src="../js/include/jquery.ibutton.min.js"></script> 

<!-- REQUIRED: Justgage animated charts --> 
<script src="../js/include/raphael.2.1.0.min.js"></script> 
<script src="../js/include/justgage.min.js"></script> 

<!-- REQUIRED: Morris Charts --> 
<script src="../js/include/morris.min.js"></script> 
<script src="../js/include/morris-chart-settings.js"></script> 

<!-- REQUIRED: Animated pie chart --> 
<script src="../js/include/jquery.easy-pie-chart.min.js"></script> 

<!-- REQUIRED: Functional Widgets --> 
<script src="../js/include/jarvis.widget.min.js"></script> 
<script src="../js/include/mobiledevices.min.js"></script> 
<!-- DISABLED (only needed for IE7 <script src="js/include/json2.js"></script> --> 

<!-- REQUIRED: Full Calendar --> 
<script src="../js/include/jquery.fullcalendar.min.js"></script> 

<!-- REQUIRED: Flot Chart Engine --> 
<script src="../js/include/jquery.flot.cust.min.js"></script> 
<script src="../js/include/jquery.flot.resize.min.js"></script> 
<script src="../js/include/jquery.flot.tooltip.min.js"></script> 
<script src="../js/include/jquery.flot.orderBar.min.js"></script> 
<script src="../js/include/jquery.flot.fillbetween.min.js"></script> 
<script src="../js/include/jquery.flot.pie.min.js"></script> 

<!-- REQUIRED: Sparkline Charts --> 
<script src="../js/include/jquery.sparkline.min.js"></script> 

<!-- REQUIRED: Infinite Sliding Menu (used with inbox page) --> 
<script src="../js/include/jquery.inbox.slashc.sliding-menu.js"></script> 

<!-- REQUIRED: Form validation plugin --> 
<script src="../js/include/jquery.validate.min.js"></script> 

<!-- REQUIRED: Progress bar animation --> 
<script src="../js/include/bootstrap-progressbar.min.js"></script> 

<!-- REQUIRED: wysihtml5 editor --> 
<script src="../js/include/wysihtml5-0.3.0.min.js"></script> 
<script src="../js/include/bootstrap-wysihtml5.min.js"></script> 

<!-- REQUIRED: Masked Input --> 
<script src="../js/include/jquery.maskedinput.min.js"></script> 

<!-- REQUIRED: Bootstrap Date Picker --> 
<script src="../js/include/bootstrap-datepicker.min.js"></script> 

<!-- REQUIRED: Bootstrap Wizard --> 
<script src="../js/include/bootstrap.wizard.min.js"></script> 

<!-- REQUIRED: Bootstrap Color Picker --> 
<script src="../js/include/bootstrap-colorpicker.min.js"></script> 

<!-- REQUIRED: Bootstrap Time Picker --> 
<script src="../js/include/bootstrap-timepicker.min.js"></script> 

<!-- REQUIRED: Bootstrap Prompt --> 
<script src="../js/include/bootbox.min.js"></script> 

<!-- REQUIRED: Bootstrap engine --> 
<script src="../js/include/bootstrap.min.js"></script> 

<!-- DO NOT REMOVE: Theme Config file --> 

<!-- d3 library placed at the bottom for better performance --> 
<!-- DISABLED  <script src="js/include/d3.v3.min.js"></script> --> 
<!-- DISABLED  <script src="js/include/adv_charts/d3-chart-1.js"></script> --> 
<!-- DISABLED  <script src="js/include/adv_charts/d3-chart-2.js"></script> --> 

<!-- Google Geo Chart --> 
<!-- DISABLED <script src="http://maps.google.com/maps/api/js?sensor=true" type="text/javascript"></script> --> 
<!-- DISABLED <script type='text/javascript' src='https://www.google.com/jsapi'></script>--> 
<!-- DISABLED <script src="js/include/adv_charts/geochart.js"></script> --> 

<!-- end scripts --> 

<script src="../js/include/config1.js"></script> 
<script type="text/javascript">


$(document).ready(function () {
//called when key is pressed in textbox
$("#cuenta").keypress(function (e) {
//if the letter is not digit then display error and don't type anything
if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
//display error message
//$("#errmsg").html("Digits Only").show().fadeOut("slow");
return false;
}
});
});


function matricula()
{
$.jGrowl('Por favor confirmar si se encuentra en las fechas de autorizacion de pago. Por favor comuníquese al PBX 5460600 Ext. 1470 o 1473 para generar la orden matrícula')
document.getElementById('matricula').style.display='none';
document.getElementById('fchMatricula').style.display='block';


}

function mostrar()
{
document.getElementById('matricula').style.display='initial';
document.getElementById('fchMatricula').style.display='none';

}


</script> 
</body>
</html>