<?php
error_reporting(0);
include('modelo/conexion.php');
include('modelo/funciones.php');
$day=date('Y-m-d H:i:s');
$fuente= $_REQUEST['key'];
$Manager="";
$Conversion="";
$Indexcol="";
?>
<!DOCTYPE html>
<html lang="en">
 <head>
	 
	 <!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
document,'script','//connect.facebook.net/en_US/fbevents.js');

fbq('init', '1714577708755028');
fbq('track', "PageView");</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=1714577708755028&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->


	 <meta name="google" content="notranslate" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Universidad Manuela Beltrán">
	<meta name="keywords" content="UMB Virtual,administración de empresas a distancia,administracion de empresas virtual,administracion virtual,carreras virtuales,clases por internet,curso por internet,cursos virtuales,educacion a distancia,educacion a distancia en colombia,educacion virtual en colombia,especializaciones virtuales,estudio a distancia,estudio por internet,estudios por internet,Estudios universitarios virtuales,postgrado virtual,universidad a distancia,universidades a distancia,universidades virtuales,universidades virtuales en colombia">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
     <link rel="shortcut icon" href="assets/ico/favicon.ico"> 
      <script type="text/javascript" src="http://umbvirtual.edu.co/inscripcion/js/javascript.js"></script>

    <title>Inscripción</title>

    <!-- Bootstrap core CSS -->
    <link href="css/main.css" rel="stylesheet">
    
    <?php
  if($fuente=="Indexcol" or $fuente=="Youtube" or $fuente=="Facebook" or $fuente=="Linkedin")
  {
  include('lib/Indexcol.php');
  echo $Indexcol;
  }
  
  if($fuente=="Tolima" )
    {
    $direccion="Edificio Fontainebleau, Cra 5ª No. 37 Bis Local 101";
    $ciudad="Ibague,Colombia";
    $telefono="Teléfono (8) 2669053 ";
    }else
        {
    $direccion="Km 27 vía Cajicá (+57 1) 546 06 00 Ext. 1470 - 1473.";
    $ciudad="Cajicá, Colombia.";
    $telefono="Teléfono: (+57 1) 546 06 00 Ext. 1470 - 1473";
    }

    ?>

    </head>
      
    <body>

<?php
  if($fuente=="Indexcol" or $fuente=="Youtube" or $fuente=="Facebook" or $fuente=="Linkedin")
  {
  include('lib/Indexcol.php');
  echo $Manager;
  }
?>


  <header>

    <div class="container">
    <!-- Logo -->
    <div class="row">
                <div id="logo">
                    <div class="logo" id="virtual">
                            <a href="http://umbvirtual.edu.co/"><img src="http://umbvirtual.edu.co//wp-content/uploads/2014/01/logo2.png" width="365" height="70" border="0" alt="UMB Virtual" class="normal-logo"></a>
                        </div>
      </div>
      </div>
  </div>
    <!-- Menu -->
    <div id="small-nav">
      <div id="container-menu">
      <ul>
          <li><a id="" href="http://umbvirtual.edu.co">Inicio</a></li>
          <li><a href="#formulario" class="Anchor" title="">Formulario</a></li>
          <li><a href="#beneficios" class="Anchor" title="">Beneficios y descuentos</a></li>
       </ul>
      </div>
    </div>
    <!-- tool bar -->
    <div class="jumbotron franja-roja">
      <div class="container">
        <center>
          <h1 id="shortcut"><a href="#formulario" class="Anchor" title="">INSCRÍBETE</a></h1>
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
