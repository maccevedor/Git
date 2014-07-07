<?php 
require_once("modelo/funciones.php");
require_once("modelo/conexion.php");
?>
<!DOCTYPE html>
<!-- saved from url=(0066)wizard.html -->
<html lang="es" class=" js">
<!-- Mirrored from bootstraphunter.com/jarvisadmin/wizard.html by HTTrack Website Copier/3.x [XR&CO'2013], Thu, 06 Mar 2014 15:18:52 GMT -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
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
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/datepicker.css" rel="stylesheet">
<link rel="stylesheet" href="css/master-css.min.css">
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>

<!-- // THEME CSS changed by javascript: the CSS link below will override the rules above // -->
<!-- For more information, please see the documentation for "THEMES" -->
<!--   <link rel="stylesheet" id="switch-theme-js" href="css/themes/default3860.css?v=1">    -->

<!-- To switch to full width -->
<!--  <link rel="stylesheet" id="switch-width" href="css/full-width3860.css?v=1"> -->

<!-- Webfonts -->
<!-- 	<link rel="stylesheet" href="js/include/css" type="text/css">
-->
<!-- All javascripts are located at the bottom except for HTML5 Shim -->
<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<script src="js/include/respond.min.js"></script>
<![endif]-->

<!-- For Modern Browsers -->
<script src="js/include/jquery.jgrowl.min.js"></script> 
<link rel="shortcut icon" href="img/favicons/favicon.html">
<!-- For everything else -->
<link rel="shortcut icon" href="img/favicons/favicon.ico">
<!-- For retina screens -->
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/favicons/apple-touch-icon-retina.png">
<!-- For iPad 1-->
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/favicons/apple-touch-icon-ipad.png">
<!-- For iPhone 3G, iPod Touch and Android -->
<link rel="apple-touch-icon-precomposed" href="img/favicons/apple-touch-icon.png">

<!-- iOS web-app metas -->
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<!-- Add your custom home screen title: -->
<meta name="apple-mobile-web-app-title" content="Jarvis">

<!-- Startup image for web apps -->
<link rel="apple-touch-startup-image" href="img/splash/ipad-landscape.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape)">
<link rel="apple-touch-startup-image" href="img/splash/ipad-portrait.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait)">
<link rel="apple-touch-startup-image" href="img/splash/iphone.png" media="screen and (max-device-width: 320px)">
  
<!-- Font -->
<link href='http://fonts.googleapis.com/css?family=PT+Sans' rel='stylesheet' type='text/css'>

</head>
<script type="text/javascript"> 

                function validar(){

                          if(wizard.email.value.length==0) { //¿Tiene 0 caracteres?
                            wizard.email.focus();    // Damos el foco al control
                            //alert('Por favor digite su identificacion'); //Mostramos el mensaje
                            $.jGrowl('No tenemos datos de esta identificacion');

                            return false; //devolvemos el foco
                          }

                          if(wizard.identificacion.value.length==0) { //¿Tiene 0 caracteres?
                            wizard.identificacion.focus();    // Damos el foco al control
                            //alert('Por favor digite su identificacion'); //Mostramos el mensaje
                            $.jGrowl('Por favor digite el número de Idenficacion');

                            return false; //devolvemos el foco
                          }
                          return true; //Si ha llegado hasta aquí, es que todo es correcto
                        }

function soloEnteros(objeto, e){ 



var keynum 
var keychar 
var numcheck 



if(window.event){ /*/ IE*/ 
keynum = e.keyCode 
} 
else if(e.which){ /*/ Netscape/Firefox/Opera/*/ 
keynum = e.which 
} 



if((keynum>=35 && keynum<=37) ||keynum==8||keynum==9||keynum==46||keynum==39) { 
return true; 
} 

if((keynum>=95&&keynum<=105)||(keynum>=48&&keynum<=57)){ 
return true; 
}else { 
return false; 

} 


}

var r={'special':/[\W]/g}   
function valid(o,w){
o.value = o.value.replace(r[w],'');
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



<div class="fluid-container">
					  <!-- widget grid -->
				
							
							<!-- row-fluid -->
							
							<div class="row-fluid">
						
									<!-- new widget -->
									<div class="jarviswidget" id="widget-id-0">
                                    
                                    
									    <header>
                                       
							<!-- <h2><strong>Iniciar proceso</strong></h2>  -->
									                                  
									    </header>
									    <!-- wrap div -->
									   
            
									        <div class="inner-spacer"> 
									        <!-- content goes here -->
												<form onSubmit="return validar()" id="wizard"  name="wizard" class="form-horizontal themed" action="RealizarPago.php">
                                                
                          
                                                                    
                                                            	<div align="right">
    <a href="index.php" name="singlebuttonsadqwe" target="_new" class="btn btn-warning" id="singlebuttonsadqwe">Proceso de admisiones</a>
                                                              </div>						
												
														<!-- end wizard steps -->
														
          <div class="control-group">
                        <div class="centered">
                          <h1 class="subtitle">CONSULTE SU PAGO</h1>
                          
                          <div class="controls">  
                            <select name="tipoId" id="tipoId" class="span12" onchange="if(this.options[0].selected) 
                                    {
                                    $('#identificacion').attr('onKeyDown', 'return soloEnteros(this, event);');
                                    $('#identificacion').val('');
                                    $('#identificacion').attr('maxlength','12');
                                    return false;
                                    }
                                    else
                                    {
                                    $('#identificacion').attr('maxlength','12');
                                    $('#identificacion').removeAttr('onKeyDown');
                                    return false;
                                    }" name="sel_tipdoc" id="sel_tipdoc" class="input-xlarge">
                            <option value="CC">Cédula de ciudadanía</option>
                            <option value="CE">Cédula de extranjería</option>
                            <option value="PPN">Pasaporte</option>
                            <option value="TI">Tarjeta de Identidad</option>  
                            <!-- <option value="PC">Pre-Cedula</option>-->
                            </select>
                              <label class="control-label"  for="name" >Ingresa tu número de identidad</label>
                            <input type="textbox" maxlength="12" class="span12" onkeyup="valid(this,'special')" onblur="valid(this,'special')" placeholder="Ingresa tu número de identidad" name="identificacion" id="identificacion" onkeydown="return soloEnteros(this, event);" >
                          </div>

					     <script type="text/javascript">
                                        $("#identificacion").on("change", buscarIdentificacion);                                                              


                                function buscarIdentificacion(){
                                                    
                                          $identificacion = $("#identificacion").val();
                                                    
                                          if($identificacion == ""){
                                              $("#").html("<input id='mIdentificacion' name='mIdentificacion' value='digite su cedula'>");
                                          }
                                          else {
                                            $.ajax({
                                              dataType: "json",
                                              data: {"identificacion": $identificacion},
                                              url:   'modelo/buscarId.php',
                                              type:  'post',
                                              beforeSend: function(){
                                                //Lo que se hace antes de enviar el formulario
                                                },
                                              success: function(respuesta){
                                                //lo que se si el destino devuelve algo
                                                //$("#midentificacion").html(respuesta.html);
                                                //$("#cedula").html(respuesta);
                                                //alert(respuesta[0][0]);
                                                $('#nombre').val(respuesta[0][0]);
                                                $('#apellido').val(respuesta[0][1]);
                                                $('#telefono').val(respuesta[0][2]);
                                                $('#ciudad').val(respuesta[0][3]);
                                                $('#email').val(respuesta[0][4]);
                                                $('#programa').val(respuesta[0][5]);
                                                $('#id').val(respuesta[0][6]);

                                              },
                                              error:  function(xhr,err){ 
                                                  alert("readyState: "+xhr.readyState+"\nstatus: "+xhr.status+"\n \n responseText: "+xhr.responseText);

                                              } 
                                            });
                                          }

                                        } 
                                    </script>

                                     <input type="hidden" id="email" name="email" class="span12"   placeholder="Ingresa tu nombre completo">
                                    <input type="hidden" id="nombre" name="nombre" class="span12"  required placeholder="Ingresa tu nombre completo">
                                    <input type="hidden" id="apellido" name="apellido" class="span12"  required placeholder="Ingresa tu nombre completo">
                                    <input type="hidden" id="programa" name="programa" class="span12"  required placeholder="Ingresa tu nombre completo">
                                    <input type="hidden" id="id" name="id" class="span12"  required placeholder="Ingresa tu nombre completo">

              </div>
                          <!-- Button -->
<div class="control-group">
  <label class="control-label" for="singlebutton"></label>
  <div class="controls">
    <button  class="btn medium btn-primary next"  type="sumbit" id="enviar" name="enviar" value="enviar" >Consultar</button>
  </div>
</div>

<p><span class="label-warning" id="comprobar_mensaje"></span> 

                                                            <!-- end mi cargue-->

                                                        </div>
												
									
												</form>
										    </div>
										    <!-- end content-->
									    </div>
									    <!-- end wrap div -->
									</div>
									
									
									<!-- end widget -->
								
							</div>

</body>	
<script src="js/include/jquery.validate.min.js"></script> 
</html>