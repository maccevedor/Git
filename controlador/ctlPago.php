<?php
include("../clases/clsPago.php"); 
include("../modelo/conexion.php");



    //crear el objeto con base en la clase 
    $objPag=new clsPago(); 
    $conex = conectaBaseDatos();

    $nombreP = $_REQUEST['nombreP'];    

    $objPag->setPersona($_REQUEST['persona']); 
    $objPag->setIdPersona($_REQUEST['idPersona']); 
    $objPag->setFchPago($_REQUEST['fchPago']); 
    $objPag->setCuenta($_REQUEST['cuenta']); 
    $objPag->setTipoCuenta($_REQUEST['tipoCuenta']);
    $objPag->setBanco($_REQUEST['banco']); 
    $objPag->setValor($_REQUEST['valor']);
   // $objPag->setValor($_REQUEST['valorTexto']);  
    //$objPag->setTipopago($_REQUEST['tipoPago']);  
    $objPag->setIdentificacionP($_REQUEST['identificacionP']);
    $objPag->setProgramaP($_REQUEST['programaP']); 
    $objPag->setCiudadP($_REQUEST['ciudadP']);   
    $objPag->setId($_REQUEST['id']);   
    $objPag->guardar($conex);   


   $persona = (isset($_REQUEST['persona'])) 
    ? trim(strip_tags($_REQUEST['persona']))
    : ""; 
   ;
   
   $idPersona = (isset($_REQUEST['idPersona'])) 
    ? trim(strip_tags($_REQUEST['idPersona']))
    : ""; 
   ;
   $fchPago = (isset($_REQUEST['fchPago'])) 
    ? trim(strip_tags($_REQUEST['fchPago']))
    : ""; 
   ;
   $cuenta = (isset($_REQUEST['cuenta'])) 
    ? trim(strip_tags($_REQUEST['cuenta']))
    : ""; 
   ;
   $banco = (isset($_REQUEST['banco'])) 
    ? trim(strip_tags($_REQUEST['banco']))
    : ""; 
   ;


   $valor = (isset($_REQUEST['valor'])) 
    ? trim(strip_tags($_REQUEST['valor']))
    : ""; 
   ;
   $tipoPago = (isset($_REQUEST['tipoPago'])) 
    ? trim(strip_tags($_REQUEST['tipoPago']))
    : ""; 
   ;

   $identificacionP = (isset($_REQUEST['identificacionP'])) 
    ? trim(strip_tags($_REQUEST['identificacionP']))
    : ""; 
   ;
   $programaP = (isset($_REQUEST['programaP'])) 
    ? trim(strip_tags($_REQUEST['programaP']))
    : ""; 
   ;
   $ciudadP = (isset($_REQUEST['ciudadP'])) 
    ? trim(strip_tags($_REQUEST['ciudadP']))
    : ""; 
   ;
    $tipoCuenta = (isset($_REQUEST['tipoCuenta'])) 
    ? trim(strip_tags($_REQUEST['tipoCuenta']))
    : ""; 
   ;



    



?>
<!DOCTYPE html>

<!-- saved from url=(0066)wizard.html -->

<html lang="en" class=" js"><!-- Mirrored from bootstraphunter.com/jarvisadmin/wizard.html by HTTrack Website Copier/3.x [XR&CO'2013], Thu, 06 Mar 2014 15:18:52 GMT --><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    

    <title>Inscripcion UMB</title>

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

    <link rel="stylesheet" id="switch-theme-js" href="../css/themes/default3860.css?v=1">   

    

    <!-- To switch to full width -->

    <link rel="stylesheet" id="switch-width" href="../css/full-width3860.css?v=1">

    

    <!-- Webfonts -->

    <link rel="stylesheet" href="../js/include/css" type="text/css">

    

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

    

  <style type="text/css">.jqstooltip { position: absolute;left: 0px;top: 0px;visibility: hidden;background: rgb(0, 0, 0) transparent;background-color: rgba(0,0,0,0.6);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";color: white;font: 10px arial, san serif;text-align: left;white-space: nowrap;padding: 5px;border: 1px solid white;z-index: 10000;}.jqsfield { color: white;font: 10px arial, san serif;text-align: left;}</style></head>



  <script type="text/javascript">

             function OpenInNewTabPdf(url )

                {

        

                  var win=window.open('http://localhost/inscripcion/lib/tcpdf/examples/PagoPdf.php','_blank');

                                    

                }



        </script>



  <body>

<!-- .height-wrapper -->

<div class="height-wrapper"> 

  

  <!-- header -->

<header>
    <!-- Logo -->
    <div id="logo-wrapper">
      <!-- <div class="container"> -->
        <div id="logo">
          <a href="http://portal.umbvirtual.edu.co"><img src="http://portal.umbvirtual.edu.co/wp-content/uploads/2014/01/logo.png" width="365" height="70" border="0" alt="UMB Virtual" class=""></a>
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

        <!-- page header --> 

        <!-- <h1 id="page-header">Matrícula en tres pasos </h1>  -->

        

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

                    <label>Title</label>

                    <input type="textbox">

                  </div>

                  <div>

                    <label>Styles</label>

                    <span data-widget-setstyle="purple" class="purple-btn"></span> <span data-widget-setstyle="navyblue" class="navyblue-btn"></span> <span data-widget-setstyle="green" class="green-btn"></span> <span data-widget-setstyle="yellow" class="yellow-btn"></span> <span data-widget-setstyle="orange" class="orange-btn"></span> <span data-widget-setstyle="pink" class="pink-btn"></span> <span data-widget-setstyle="red" class="red-btn"></span> <span data-widget-setstyle="darkgrey" class="darkgrey-btn"></span> <span data-widget-setstyle="black" class="black-btn"></span> </div>

                </div>

                <div class="inner-spacer">

                <!-- content goes here -->

                <form id="wizard"  name="wizard" class="themed" action="../lib/PagoPdf.php" method="post" target="_blank" >

                  <div id="wizard_name">

                    <!-- end wizard steps -->



                    <form id="wizard"  name="wizard" class="themed" action="../lib/tcpdf/examples/PagoPdf.php" method="post" target="_blank" > 

                    

                      <div class="tab-content franja-gris">

                      <!-- step 1-->

                        <fieldset class="tab-pane active" id="inverse-tab1">

                          <div class="centered">

                            <div class="control-group">

                              <h1 class="subtitle">LA INFORMACIÓN FUE GUARDADO SATISFACTORIAMENTE</h1>

 

                              Por favor realice los siguientes pasos:<br><br>

                              1)  Confirme que los datos están correctamente diligenciados.<br>

                              2)  Descargar el PDF, imprimirlo, firmar y colocar la huella del Tarjetahabiente.<br>

                              3)  Para realizar el pago hacer click en “Pagar en línea”.<br>

                              4)  Recuerde enviar por  correo certificado la confirmación de la transacción con pantallazo de esta (pago en linea) y el PDF con firma y huella al correo <a href="mailto:claudia.santacruz@umb.edu.co">claudia.santacruz@umb.edu.co</a> o <a href="mailto:liset.abreu@umb.edu.co">liset.abreu@umb.edu.co</a>, según el programa académico seleccionado.

                            </div>



                            <div class="control-group">

                              <?php  print "<p>Persona que autoriza: <input type=\"textbox\" name=\"persona\" id=\"persona\"  value=\"$persona\" class=\"span12\" id=\"persona\"/></p>\n"  ?>

                              <?php  print "<p>Identificacion de la persona que autoriza: <input type=\"textbox\" name=\"idPersona\" id=\"idPersona\"  value=\"$idPersona\" class=\"span12\" /></p>\n" ?>

                              <?php  print "<input type=\"hidden\" name=\"programaP\" id=\"programaP\" value=\"$programaP\" class=\"span12\" />" ?>

                              <?php  print "<input type=\"hidden\" name=\"ciudadP\" id=\"ciudadP\" value=\"$ciudadP\" class=\"span12\" />" ?>

                              <?php  print "<input type=\"hidden\" name=\"tipoCuenta\" id=\"tipoCuenta\" value=\"$tipoCuenta\" class=\"span12\" />" ?>

                              <?php  print "<p>Fecha de pago: <input type=\"date\" name=\"fchPago\" id=\"fchPago\" value=\"$fchPago\" class=\"span12\" /></p>\n" ?>

                              <?php  print "<p>Banco: <input type=\"textbox\" name=\"banco\" id=\"banco\" value=\"$banco\"  class=\"span12\" /></p>\n"?>

                              <?php  print "<p>Tipo de pago: <input type=\"textbox\" name=\"tipoPago\" id=\"tipoPago\" value=\"$tipoCuenta\" class=\"span12\" /></p>\n" ?>

                              <?php  print "<p>Cuenta: <input type=\"textbox\" name=\"cuenta\" id=\"cuenta\" value=\"$cuenta\" class=\"span12\"  /></p>\n" ?>

                              <?php  print "<p>Identificacion del inscrito: <input type=\"textbox\" name=\"identificacionP\" id=\"identificacionP\" value=\"$identificacionP\" class=\"span12\" /></p>\n" ?>

                              <?php  print "<p>Nombre del inscrito: <input type=\"textbox\" name=\"nombreP\" id=\"nombreP\" value=\"$nombreP\" class=\"span12\" /></p>\n" ?>


                              <?php  print "<p>Valor: <input type=\"textbox\" name=\"valor\" id=\"valor\" value=\"$valor\" class=\"span12\" readonly/></p>\n" ?>

                            </div>



                            <div class="form-actions wizard">

                              <div  align="center">

                                <button type="submit" class="btn medium btn-primary next" >Descargar PDF con la informacion</button><br>

                              </div>

                            </div>



                            <div class="control-group">

                              <h1 class="subtitle">REALICE EL PAGO A TRAVÉS DEL SIGUIENTE ENLACE</h1>

                              <div class="controls">

                                <button type="button" class="btn medium btn-success" onclick="OpenInNewTab();">Pagar En Linea</button><br>  

                              </div>

                            </div>



                            <script type="text/javascript">

                              function OpenInNewTab(url )

                              {

                                var win=window.open('http://media.umb.edu.co/pagos/inscripcion.html','_blank');

                                win.focus();

                              }

                            </script>



                        </fieldset>

                      </div>



                    </form>

                  <div>

                </div>

                                        <!-- end wrap div -->

                                    </div></article>

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

            

        </div><!--/.fluid-container-->

        <div class="push"></div>

    </div>

    <!-- end .height-wrapper -->    

    

    <!-- footer -->

    

    <!-- if you like you can insert your footer here -->

    

    <!-- end footer -->



    <!--================================================== -->

    <!-- Placed at the end of the document so the pages load faster -->

    

    <!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->

    <script src="js/include/jquery.min.js"></script>

    <script>window.jQuery || document.write('<script src="js/libs/jquery.min.js"><\/script>')</script>

        <!-- OPTIONAL: Use this migrate scrpit for plugins that are not supported by jquery 1.9+ -->

        <!-- DISABLED <script src="js/libs/jquery.migrate-1.0.0.min.js"></script> -->

    <script src="js/include/jquery-ui.min.js"></script>

    <script>window.jQuery.ui || document.write('<script src="js/libs/jquery.ui.min.js"><\/script>')</script>

    

    <!-- IMPORTANT: Jquery Touch Punch is always placed under Jquery UI -->

    <script src="js/include/jquery.ui.touch-punch.min.js"></script>

    

    <!-- REQUIRED: Mobile responsive menu generator -->

    <script src="js/include/selectnav.min.js"></script>



    <!-- REQUIRED: Datatable components -->

    <script src="js/include/jquery.accordion.min.js"></script>



    <!-- REQUIRED: Toastr & Jgrowl notifications  -->

    <script src="js/include/toastr.min.js"></script>

    <script src="js/include/jquery.jgrowl.min.js"></script>

    

    <!-- REQUIRED: Sleek scroll UI  -->

    <script src="js/include/slimScroll.min.js"></script>

    

    <!-- REQUIRED: Datatable components -->

    <script src="js/include/jquery.dataTables.min.js"></script> 

    <script src="js/include/DT_bootstrap.min.js"></script>



    <!-- REQUIRED: Form element skin  -->

    <script src="js/include/jquery.uniform.min.js"></script> 



    <!-- REQUIRED: AmCharts  -->

    <script src="js/include/amcharts.js"></script>

    <script src="js/include/amchart-draw1.js"></script>



    <script type="text/javascript">

        var ismobile = (/iphone|ipad|ipod|android|blackberry|mini|windows\sce|palm/i.test(navigator.userAgent.toLowerCase()));  

        if(!ismobile){

            

            /** ONLY EXECUTE THESE CODES IF MOBILE DETECTION IS FALSE **/

            

            /* REQUIRED: Datatable PDF/Excel output componant */

            

            document.write('<script src="js/include/ZeroClipboard.min.js"><\/script>');

            document.write('<script src="js/include/TableTools.min.js"><\/script>'); 

            document.write('<script src="js/include/select2.min.js"><\/script>');

            document.write('<script src="js/include/jquery.excanvas.min.js"><\/script>');

            document.write('<script src="js/include/jquery.placeholder.min.js"><\/script>');

        }else{

            

            /** ONLY EXECUTE THESE CODES IF MOBILE DETECTION IS TRUE **/



            document.write('<script src="js/include/responsive-tables.min.js"><\/script>');

        }

    </script><script src="js/include/ZeroClipboard.min.js"></script><script src="js/include/TableTools.min.js"></script><script src="js/include/select2.min.js"></script><script src="js/include/jquery.excanvas.min.js"></script><script src="js/include/jquery.placeholder.min.js"></script>



    <!-- REQUIRED: iButton -->

    <script src="js/include/jquery.ibutton.min.js"></script>

    

    <!-- REQUIRED: Justgage animated charts -->

    <script src="js/include/raphael.2.1.0.min.js"></script>

    <script src="js/include/justgage.min.js"></script>

    

    <!-- REQUIRED: Morris Charts -->

    <script src="js/include/morris.min.js"></script> 

    <script src="js/include/morris-chart-settings.js"></script> 

    

    <!-- REQUIRED: Animated pie chart -->

    <script src="js/include/jquery.easy-pie-chart.min.js"></script>

    

    <!-- REQUIRED: Functional Widgets -->

    <script src="js/include/jarvis.widget.min.js"></script>

    <script src="js/include/mobiledevices.min.js"></script>

    <!-- DISABLED (only needed for IE7 <script src="js/include/json2.js"></script> -->

    

    <!-- REQUIRED: Full Calendar -->

    <script src="js/include/jquery.fullcalendar.min.js"></script>       

    

    <!-- REQUIRED: Flot Chart Engine -->

    <script src="js/include/jquery.flot.cust.min.js"></script>          

    <script src="js/include/jquery.flot.resize.min.js"></script>        

    <script src="js/include/jquery.flot.tooltip.min.js"></script>       

    <script src="js/include/jquery.flot.orderBar.min.js"></script>  

    <script src="js/include/jquery.flot.fillbetween.min.js"></script>   

    <script src="js/include/jquery.flot.pie.min.js"></script>    

    

    <!-- REQUIRED: Sparkline Charts -->

    <script src="js/include/jquery.sparkline.min.js"></script>



    <!-- REQUIRED: Infinite Sliding Menu (used with inbox page) -->

    <script src="js/include/jquery.inbox.slashc.sliding-menu.js"></script> 



    <!-- REQUIRED: Form validation plugin -->

    <script src="js/include/jquery.validate.min.js"></script>

    

    <!-- REQUIRED: Progress bar animation -->

    <script src="js/include/bootstrap-progressbar.min.js"></script>

    

    <!-- REQUIRED: wysihtml5 editor -->

    <script src="js/include/wysihtml5-0.3.0.min.js"></script>

    <script src="js/include/bootstrap-wysihtml5.min.js"></script>



    <!-- REQUIRED: Masked Input -->

    <script src="js/include/jquery.maskedinput.min.js"></script>

    

    <!-- REQUIRED: Bootstrap Date Picker -->

    <script src="js/include/bootstrap-datepicker.min.js"></script>



    <!-- REQUIRED: Bootstrap Wizard -->

    <script src="js/include/bootstrap.wizard.min.js"></script> 

    

    <!-- REQUIRED: Bootstrap Color Picker -->

    <script src="js/include/bootstrap-colorpicker.min.js"></script>



    

    <!-- REQUIRED: Bootstrap Time Picker -->

    <script src="js/include/bootstrap-timepicker.min.js"></script> 

    

    <!-- REQUIRED: Bootstrap Prompt -->

    <script src="js/include/bootbox.min.js"></script>

    

    <!-- REQUIRED: Bootstrap engine -->

    <script src="js/include/bootstrap.min.js"></script>

    

    <!-- DO NOT REMOVE: Theme Config file -->

    <script src="js/include/config.js"></script>

    

    <!-- d3 library placed at the bottom for better performance -->

    <!-- DISABLED  <script src="js/include/d3.v3.min.js"></script> -->

    <!-- DISABLED  <script src="js/include/adv_charts/d3-chart-1.js"></script> -->

    <!-- DISABLED  <script src="js/include/adv_charts/d3-chart-2.js"></script> -->



    <!-- Google Geo Chart -->

    <!-- DISABLED <script src="http://maps.google.com/maps/api/js?sensor=true" type="text/javascript"></script> -->

    <!-- DISABLED <script type='text/javascript' src='https://www.google.com/jsapi'></script>-->

    <!-- DISABLED <script src="js/include/adv_charts/geochart.js"></script> -->

    

    <!-- end scripts -->

  



<!-- Mirrored from bootstraphunter.com/jarvisadmin/wizard.html by HTTrack Website Copier/3.x [XR&CO'2013], Thu, 06 Mar 2014 15:18:52 GMT -->



</body>

</html>

<?php 

function numtoletras($xcifra)

{

    $xarray = array(0 => "Cero",

        1 => "UN", "DOS", "TRES", "CUATRO", "CINCO", "SEIS", "SIETE", "OCHO", "NUEVE",

        "DIEZ", "ONCE", "DOCE", "TRECE", "CATORCE", "QUINCE", "DIECISEIS", "DIECISIETE", "DIECIOCHO", "DIECINUEVE",

        "VEINTI", 30 => "TREINTA", 40 => "CUARENTA", 50 => "CINCUENTA", 60 => "SESENTA", 70 => "SETENTA", 80 => "OCHENTA", 90 => "NOVENTA",

        100 => "CIENTO", 200 => "DOSCIENTOS", 300 => "TRESCIENTOS", 400 => "CUATROCIENTOS", 500 => "QUINIENTOS", 600 => "SEISCIENTOS", 700 => "SETECIENTOS", 800 => "OCHOCIENTOS", 900 => "NOVECIENTOS"

    );

//

    $xcifra = trim($xcifra);

    $xlength = strlen($xcifra);

    $xpos_punto = strpos($xcifra, ".");

    $xaux_int = $xcifra;

    $xdecimales = "00";

    if (!($xpos_punto === false)) {

        if ($xpos_punto == 0) {

            $xcifra = "0" . $xcifra;

            $xpos_punto = strpos($xcifra, ".");

        }

        $xaux_int = substr($xcifra, 0, $xpos_punto); // obtengo el entero de la cifra a covertir

        $xdecimales = substr($xcifra . "00", $xpos_punto + 1, 2); // obtengo los valores decimales

    }



    $XAUX = str_pad($xaux_int, 18, " ", STR_PAD_LEFT); // ajusto la longitud de la cifra, para que sea divisible por centenas de miles (grupos de 6)

    $xcadena = "";

    for ($xz = 0; $xz < 3; $xz++) {

        $xaux = substr($XAUX, $xz * 6, 6);

        $xi = 0;

        $xlimite = 6; // inicializo el contador de centenas xi y establezco el límite a 6 dígitos en la parte entera

        $xexit = true; // bandera para controlar el ciclo del While

        while ($xexit) {

            if ($xi == $xlimite) { // si ya llegó al límite máximo de enteros

                break; // termina el ciclo

            }



            $x3digitos = ($xlimite - $xi) * -1; // comienzo con los tres primeros digitos de la cifra, comenzando por la izquierda

            $xaux = substr($xaux, $x3digitos, abs($x3digitos)); // obtengo la centena (los tres dígitos)

            for ($xy = 1; $xy < 4; $xy++) { // ciclo para revisar centenas, decenas y unidades, en ese orden

                switch ($xy) {

                    case 1: // checa las centenas

                        if (substr($xaux, 0, 3) < 100) { // si el grupo de tres dígitos es menor a una centena ( < 99) no hace nada y pasa a revisar las decenas

                            

                        } else {

                            $key = (int) substr($xaux, 0, 3);

                            if (TRUE === array_key_exists($key, $xarray)){  // busco si la centena es número redondo (100, 200, 300, 400, etc..)

                                $xseek = $xarray[$key];

                                $xsub = subfijo($xaux); // devuelve el subfijo correspondiente (Millón, Millones, Mil o nada)

                                if (substr($xaux, 0, 3) == 100)

                                    $xcadena = " " . $xcadena . " CIEN " . $xsub;

                                else

                                    $xcadena = " " . $xcadena . " " . $xseek . " " . $xsub;

                                $xy = 3; // la centena fue redonda, entonces termino el ciclo del for y ya no reviso decenas ni unidades

                            }

                            else { // entra aquí si la centena no fue numero redondo (101, 253, 120, 980, etc.)

                                $key = (int) substr($xaux, 0, 1) * 100;

                                $xseek = $xarray[$key]; // toma el primer caracter de la centena y lo multiplica por cien y lo busca en el arreglo (para que busque 100,200,300, etc)

                                $xcadena = " " . $xcadena . " " . $xseek;

                            } // ENDIF ($xseek)

                        } // ENDIF (substr($xaux, 0, 3) < 100)

                        break;

                    case 2: // checa las decenas (con la misma lógica que las centenas)

                        if (substr($xaux, 1, 2) < 10) {

                            

                        } else {

                            $key = (int) substr($xaux, 1, 2);

                            if (TRUE === array_key_exists($key, $xarray)) {

                                $xseek = $xarray[$key];

                                $xsub = subfijo($xaux);

                                if (substr($xaux, 1, 2) == 20)

                                    $xcadena = " " . $xcadena . " VEINTE " . $xsub;

                                else

                                    $xcadena = " " . $xcadena . " " . $xseek . " " . $xsub;

                                $xy = 3;

                            }

                            else {

                                $key = (int) substr($xaux, 1, 1) * 10;

                                $xseek = $xarray[$key];

                                if (20 == substr($xaux, 1, 1) * 10)

                                    $xcadena = " " . $xcadena . " " . $xseek;

                                else

                                    $xcadena = " " . $xcadena . " " . $xseek . " Y ";

                            } // ENDIF ($xseek)

                        } // ENDIF (substr($xaux, 1, 2) < 10)

                        break;

                    case 3: // checa las unidades

                        if (substr($xaux, 2, 1) < 1) { // si la unidad es cero, ya no hace nada

                            

                        } else {

                            $key = (int) substr($xaux, 2, 1);

                            $xseek = $xarray[$key]; // obtengo directamente el valor de la unidad (del uno al nueve)

                            $xsub = subfijo($xaux);

                            $xcadena = " " . $xcadena . " " . $xseek . " " . $xsub;

                        } // ENDIF (substr($xaux, 2, 1) < 1)

                        break;

                } // END SWITCH

            } // END FOR

            $xi = $xi + 3;

        } // ENDDO



        if (substr(trim($xcadena), -5, 5) == "ILLON") // si la cadena obtenida termina en MILLON o BILLON, entonces le agrega al final la conjuncion DE

            $xcadena.= " DE";



        if (substr(trim($xcadena), -7, 7) == "ILLONES") // si la cadena obtenida en MILLONES o BILLONES, entoncea le agrega al final la conjuncion DE

            $xcadena.= " DE";



        // ----------- esta línea la puedes cambiar de acuerdo a tus necesidades o a tu país -------

        if (trim($xaux) != "") {

            switch ($xz) {

                case 0:

                    if (trim(substr($XAUX, $xz * 6, 6)) == "1")

                        $xcadena.= "UN BILLON ";

                    else

                        $xcadena.= " BILLONES ";

                    break;

                case 1:

                    if (trim(substr($XAUX, $xz * 6, 6)) == "1")

                        $xcadena.= "UN MILLON ";

                    else

                        $xcadena.= " MILLONES ";

                    break;

                case 2:

                    if ($xcifra < 1) {

                        $xcadena = "CERO PESOS ";

                    }

                    if ($xcifra >= 1 && $xcifra < 2) {

                        $xcadena = "UN PESO ";

                    }

                    if ($xcifra >= 2) {

                        $xcadena.= " PESOS "; //

                    }

                    break;

            } // endswitch ($xz)

        } // ENDIF (trim($xaux) != "")

        // ------------------      en este caso, para México se usa esta leyenda     ----------------

        $xcadena = str_replace("VEINTI ", "VEINTI", $xcadena); // quito el espacio para el VEINTI, para que quede: VEINTICUATRO, VEINTIUN, VEINTIDOS, etc

        $xcadena = str_replace("  ", " ", $xcadena); // quito espacios dobles

        $xcadena = str_replace("UN UN", "UN", $xcadena); // quito la duplicidad

        $xcadena = str_replace("  ", " ", $xcadena); // quito espacios dobles

        $xcadena = str_replace("BILLON DE MILLONES", "BILLON DE", $xcadena); // corrigo la leyenda

        $xcadena = str_replace("BILLONES DE MILLONES", "BILLONES DE", $xcadena); // corrigo la leyenda

        $xcadena = str_replace("DE UN", "UN", $xcadena); // corrigo la leyenda

    } // ENDFOR ($xz)

    return trim($xcadena);

}



// END FUNCTION



function subfijo($xx)

{ // esta función regresa un subfijo para la cifra

    $xx = trim($xx);

    $xstrlen = strlen($xx);

    if ($xstrlen == 1 || $xstrlen == 2 || $xstrlen == 3)

        $xsub = "";

    //

    if ($xstrlen == 4 || $xstrlen == 5 || $xstrlen == 6)

        $xsub = "MIL";

    //

    return $xsub;

}



// END FUNCTION

?>



</body>

</html>

  

