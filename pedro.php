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
<script type="text/javascript" src="js/anchor.js"></script>

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

function ocultar()
{

document.getElementById('laboral').style.display='none';
document.getElementById('direccionT').style.display='none';
document.getElementById('cargo').style.display='none';
document.getElementById('ciudadT').style.display='none';  
document.getElementById('institucionT').style.display='none';
document.getElementById('fchInicio').style.display='none';
document.getElementById('fchFinal').style.display='none';
document.getElementById('telefonoT').style.display='none';
document.getElementById('trabajo').style.display='none';

document.getElementById('laboral').value="No labora";
document.getElementById('direccionT').value="No labora";
document.getElementById('cargo').value="No labora";
document.getElementById('ciudadT').value="3";  
document.getElementById('institucionT').value="No labora";
document.getElementById('fchInicio').value="<?php echo date('Y-m-d'); ?>";
document.getElementById('fchFinal').value="<?php echo date('Y-m-d'); ?>";
document.getElementById('telefonoT').value="No labora";
document.getElementById('trabajo').value="No labora";

}


function mostrar()
{
document.getElementById('laboral').style.display='initial';
document.getElementById('direccionT').style.display='initial';
document.getElementById('cargo').style.display='initial';
document.getElementById('ciudadT').style.display='initial'; 
document.getElementById('institucionT').style.display='initial';
document.getElementById('fchInicio').style.display='initial';
document.getElementById('fchFinal').style.display='initial';
document.getElementById('telefonoT').style.display='initial';
document.getElementById('trabajo').style.display='inherit';


document.getElementById('laboral').value="";
document.getElementById('direccionT').value="";
document.getElementById('cargo').value="";
document.getElementById('ciudadT').value="";  
document.getElementById('institucionT').value="";
document.getElementById('fchInicio').value="<?php echo date('Y-m-d'); ?>";
document.getElementById('fchFinal').value="<?php echo date('Y-m-d'); ?>";
document.getElementById('telefonoT').value="";
document.getElementById('trabajo').value="";



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


$(document).ready(function () {
//called when key is pressed in textbox
$("#celular").keypress(function (e) {
//if the letter is not digit then display error and don't type anything
if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
//display error message
//$("#errmsg").html("Digits Only").show().fadeOut("slow");
return false;
}
});
});

var r={'special':/[\W]/g}
var s={'special':/[^\w^ñ^(á|é|í|ó|ú)^\s^]/g}

function valid(o,w){
o.value = o.value.replace(r[w],'');
}
function validaremos(o,w){
o.value = o.value.replace(s[w],'');
}




function vermas() { 
var eldiv =document.getElementById("terminos"); 
eldiv.style.display="block"; 
} 





$(document).ready(function() {

var MaxInputs       = 3; //maximum input boxes allowed
var contenedor   	= $("#contenedor"); //Input boxes wrapper ID
var AddButton       = $("#agregarCampo"); //Add button ID

//var x = contenedor.length; //initlal text box count
var x = $("#contenedor div").length + 1;
var FieldCount = x-1; //to keep track of text box added

$(AddButton).click(function (e)  //on add input button click
{
if(x <= MaxInputs) //max input box allowed
{
FieldCount++; //text box added increment
//add input box
$(contenedor).append('<div class="added"><div class="new"><a href="#" type="button" class="eliminar btn btn-danger" >Eliminar este estudio</a><label class="control-label" for="name">Nivel de formación</label><select name="nivel['+FieldCount+']" id="nivel['+FieldCount+']" class="span12"><option value="0">Selecciona un nivel</option><option value="Bachiller">Bachiller</option><option value="Pregrado">Pregrado</option><option value="Posgrado">Posgrado</option><option value="Otro">Otro</option></select><label class="control-label" for="name">Título obtenido</label><input type="textbox" name="titulo['+FieldCount+']" id="titulo['+FieldCount+']" placeholder="Ingresa el nombre del título" class="span12" maxlength="400"/><label class="control-label" for="name">Institución</label><input type="textbox" name="institucion['+FieldCount+']" id="institucion['+FieldCount+']" placeholder="Ingresa el nombre de la institución" class="span12" maxlength="400" /><label class="control-label" for="name">Fecha de egreso</label><input type="date" name="fchEgreso['+FieldCount+']" id="fchEgreso['+FieldCount+']" placeholder="fecha Egreso'+ FieldCount +'" class="span12" value="2014-05-02"/></div></div>');

x++; //text box increment
}
return false;
});

$("body").on("click",".eliminar", function(e){ //user click on remove text
if( x > 1 ) {
$(this).parent('div').remove(); //remove text box
x--; //decrement textbox
}
return false;
});

});




</script>






<body>

<!--Place this code where you want VIP widget to be rendered -->
<div id="casengo-vipbtn" class="casengo-vipbtn"></div>

<!--Place this code after the last Casengo VIP widget -->
<script type="text/javascript">
  (function() {
    var btn, l=0, setAttr = function(el, attrs) { for(var a in attrs) el.setAttribute('data-' + a, attrs[a]); },
    getBtn = function() {
      btn = document.getElementById('casengo-vipbtn'); l++;
      if(!btn && l<=20) { setTimeout(getBtn,50); } else {
        setAttr(btn, {subdomain: 'umb', group: 'undefined', ctype: 'inline', position: 'bottom-right' , language: 'en_US'});
        var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
        po.src = '//umb.casengo.com/apis/inline-widget.js?r=cfb1457622cb99a6dce03b03fd6822686b3842bf';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
      }}; getBtn();
  })();
</script>


<!-- .height-wrapper -->
<div class="height-wrapper"> 
  <!-- header -->

  <header>
    <!-- Logo -->
    <div id="logo-wrapper">
      <!-- <div class="container"> -->
        <div id="logo">
          <a href="http://umbvirtual.edu.co/"><img src="http://umbvirtual.edu.co//wp-content/uploads/2014/01/logo2.png" width="365" height="70" border="0" alt="UMB Virtual" class=""></a>
        </div>
      <!-- </div> -->
    </div>
    <!-- Menu -->
    <div id="small-nav">
      <div id="container-menu">
        <a class="menuLabel"id="" href="http://umbvirtual.edu.co/">Inicio</a>
        <a href="#formulario" class="Anchor menuLabel">Ir al formulario</a>
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
        Nuestros recursos tecnológicos están basados en tecnologías web y en consecuencia los requisitos mínimos para el acceso y uso de ellos se basa igualmente en los mínimos actuales que manejan los proveedores de internet y fabricantes de dispositivos.  La información correspondiente a los requisitos tecnológicos y de conectividad necesarios para cursar un programa en modalidad virtual son los siguientes:
        <h3>A nivel de máquinas</h3> Se debe contar con dispositivos capaces de acceder a internet tales como computadoras, smartphones, tablets, etc.  Sin embargo, es importante tener en cuenta que para el desarrollo de ciertas actividades de evalaución y para los procesos de comunicación con compañeros y docentes, es necesario que los dispositivos utilizados, cuenten con micrófono y cámara de video, ya sea integrados o como accesorios.
        <h3>A nivel de software</h3> Es fundamental que los dispositivos cuenten con un navegador y un lector de documentos PDF. En algunas ocasiones también debe correr flash player; esto solo para algunos recursos construidos bajo esa tecnología. La plataforma y los recursos funcionan eficientemente sobre el estándar HTML5 por lo que sugerimos utilizar navegadores de última generación y actualizados por ejemplo Google Chrome y Firefox.  Esto no quiere decir que no se pueda acceder desde otro tipo de navegador como es Internet Explorer, pero en ese caso debe ser la última versión y que respete el estándar.
        <h3>A nivel de conectividad</h3> Los requisitos mínimos están sujetos a los mínimos que ofrecen los proveedores de internet, por recomendación sugerimos desde 1 Mbps, aunque se puede navegar con anchos de banda inferiores sin embargo la experiencia en el uso se puede afectar ya que nuestros recursos y contenidos son ricos en video, animaciones y multimedia.
      </div>
    </div>
  </header>
  <!-- end header -->




   <div id="inscripcion-model">
      <div class="centered">
        <img src="images/inscripcion.jpg" alt="Inscríbete" align="center" />
      </div>
    </div>


<div align="right">
    <a href="pago.php" name="singlebuttonsadqwe" target="_new" class="btn btn-warning" id="singlebuttonsadqwe">Generar formato de pago</a>
</div>

  

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
        <!-- <h1 id="page-header">Matrícula en tres pasos </h1>	 -->
        
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
                <form id="wizard"  name="wizard" class="themed" action="controlador/ctlProcesar.php" method="post" >
                  <div id="wizard_name">
                    <div class="centered"> 
                      <!-- wizard steps -->
                      <ul class="bwizard-steps nav">
                        <li class="active"> <span class="label badge-inverse">1</span> <a href="wizard.html#inverse-tab1" data-toggle="tab">Inscripción</a> </li>
                        <li> <span class="label badge-inverse">2</span> <a href="wizard.html#inverse-tab2" data-toggle="tab">Entrevista</a> </li>
                        <li> <span class="label badge-inverse">3</span> <a  data-toggle="tab">Pago</a> </li>
                      </ul>
                    </div>
                    <!-- end wizard steps -->
                    
                    <div class="tab-content">
                    <!-- step 1-->
                    <fieldset class="tab-pane active" id="inverse-tab1">
                      <input type="hidden" id="fch" name="fch" value="<?php echo date('Y-m-d H:i:s'); ?>" />
                      <div class="centered">
                        <div class="control-group">
                          <div class="controls">
                            <label class="checkbox inline">
                            <div class="checker" id="uniform-optionsCheckbox-1"><span>
                              <input type="checkbox" name="termino" id="termino" />
                              </span></div>
                            Acepto cláusula de tratamiento de datos personales. <a onclick="vermas()">Leer más</a>
                            </label>
                            <div id="terminos" style="display:none">
                              <div id="legal"> La UMB Virtual en cumplimiento de la ley 1581 de 2012 y el artículo 10 del decreto 1377 de 2013, mediante el cual se desarrollan los preceptos constitucionales de protección y tratamiento de la información de todas las personas, así como el derecho que tienen a conocer actualizar y rectificar todo tipo de datos personales recogidos en nuestras bases de datos o archivos, se permite informarle que la información que de una u otra manera haya sido obtenida por la UMB Virtual es y seguirá siendo utilizada con fines estrictamente académicos y dentro del desarrollo del proceso formativo al cual usted ha accedido al momento de decidir cursar cualquiera de nuestros programas formales o no formales dentro de ambientes virtuales de aprendizaje. <br>
                                <br>
                                Dicha información será ingresada en las bases de datos de la Universidad Manuela Beltrán y se manejará exclusivamente por los funcionarios adscritos a la UMB Virtual, así mismo se le dará el tratamiento establecido en la ley atendiendo entre otros a los preceptos de confidencialidad señalados en el título II capítulo 4 de la ley 1581 de 2012.
                                ​ <br>
                                En cualquier momento usted puede solicitar la supresión, modificación, corrección o actualización de sus datos personales contenidos en nuestras bases de datos enviando comunicación expresa a la UMB Virtual por cualquier medio que pueda ser objeto de consulta y verificación posterior. <br>
                                Muchas gracias. </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div>
                      <div class="control-group franja-gris" id="formulario">
                        <div class="centered">
                          <h1 class="subtitle">PROGRAMA ACADÉMICO</h1>
                          <label class="control-label" for="name">Nivel formación</label>
                          <div class="controls">
                            <select name="formacion"  id="formacion" class="span12">
                              <option value="">Selecciona el nivel de formación</option>
                              <?php
$formacion = dameFormacion();

foreach($formacion as $indice => $registro){
echo "<option value=".$registro['id'].">".$registro['Formacion']."</option>";
}
?>
                            </select>
                            <label class="control-label" for="name">Programa</label>
                            <div class="controls">
                              <select name="programa"  id="programa" class="span12">
                                <option value="">Selecciona un programa</option>
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                      
                      <!-- Este Script se encanga de Traer los programas especificos para una formacion.	 --> 
                      <script type="text/javascript">
$("#formacion").on("change", buscarPrograma);




function buscarPrograma(){
$("#programa").html("<option value=''>Selecciona un nivel de formación</option>");

$formacion = $("#formacion").val();

if($formacion == ""){
$("#programa").html("<option value=''>Selecciona un nivel de formación</option>");
}
else {
$.ajax({
dataType: "json",
data: {"formacion": $formacion},
url:   'modelo/buscar.php',
type:  'post',
beforeSend: function(){
//Lo que se hace antes de enviar el formulario
},
success: function(respuesta){
//lo que se si el destino devuelve algo
$("#programa").html(respuesta.html);
},
error:	function(xhr,err){ 
alert("readyState: "+xhr.readyState+"\nstatus: "+xhr.status+"\n \n responseText: "+xhr.responseText);
}
});
}
}
</script>
                      <div class="control-group">
                        <div class="centered">
                          <h1 class="subtitle">DATOS PERSONALES</h1>
                          <label class="control-label" for="name">Documento de identidad</label>
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
                            <input type="textbox" maxlength="12" class="span12" onkeyup="valid(this,'special')" onblur="valid(this,'special')" placeholder="Ingresa tu número de identidad" name="identificacion" id="identificacion" onkeydown="return soloEnteros(this, event);">
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
                                              },
                                              error:  function(xhr,err){ 
                                                  alert("readyState: "+xhr.readyState+"\nstatus: "+xhr.status+"\n \n responseText: "+xhr.responseText);
                                              }
                                            });
                                          }
                                        }
                                    </script>
                                    

                          <label class="control-label" for="name" >Nombres</label>
                          <!-- <div class="controls"> -->
                          <input type="textbox" id="nombre" name="nombre" class="span12"  required placeholder="Ingresa tu nombre completo" onkeyup="validaremos(this,'special')" onblur="validaremos(this,'special')">
                          <label class="control-label" for="name">Apellidos</label>
                          <div class="controls">
                            <input type="textbox" id="apellido" name="apellido" class="span12"  required placeholder="Ingresa tus apellidos completos" onkeyup="validaremos(this,'special')" onblur="validaremos(this,'special')"> 
                            <label class="control-label" for="name">Fecha nacimiento</label>
                           <!--  <div class="controls">
                              <input type="date" name="fchNacimiento" class="span12" id="fchNacimiento" value="<?php echo date('Y-m-d'); ?>" >
                              <br>
                            </div> -->


        <div class="input-append date" id="fchNacimiento" name="fchNacimiento" data-date="2014-02-02" data-date-format="yyyy-mm-dd" data-date-viewmode="years" >
        <input class="datepicker-input" size="16"  type="text" id="fchNacimiento" name="fchNacimiento"  value="2012-12-02" readonly>
        <span class="add-on"><i class="icon-calendar"></i></span>
        </div>




                            <label class="control-label" for="name">Lugar de nacimiento</label>
                            <div class="controls">
                              <select id="lNacimiento" name="lNacimiento" class="span12" >
                                <option value="">Selecciona una ciudad</option>
                                <?php
$ciudades = dameCiudad();

foreach($ciudades as $indice => $registro){
echo "<option value=".$registro['id'].">".$registro['municipio'].' -'.$registro['estado']."</option>";
}
?>
                              </select>
                            </div>
                            <label class="control-label" for="name">Género</label>
                            <div class="controls">
                              <select name="genero" id="genero" class="span12">
                                <option value="0">Selecciona un género</option>
                                <option value="M">Masculino</option>
                                <option value="F">Femenino</option>
                              </select>
                              <label class="control-label" for="name">Estado civil</label>
                              <div class="controls">
                                <select name="estCivil" id="estCivil" class="span12">
                                  <option value="0">Selecciona un estado civil</option>
                                  <option value="soltero">Soltero</option>
                                  <option value="unión libre">Union Libre</option>
                                  <option value="casado">Casado</option>
                                  <option value="divorciado">Divorciado</option>
                                  <option value="viudo">Viudo</option>
                                </select>
                              </div>
                            </div>
                          </div>
                          <!-- </div> --> 
                          
                        </div>
                      </div>
                      <script type="text/javascript">
$("#identificacion").on("change", buscarIdentificacion);																															


function buscarIdentificacion(){
//$("#identificacion").html("<option value=''>- primero selecciona una categoría -</option>");

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
},
error:	function(xhr,err){ 
alert("readyState: "+xhr.readyState+"\nstatus: "+xhr.status+"\n \n responseText: "+xhr.responseText);
}
});
}
}
</script>
                      <div class="control-group franja-gris">
                        <div class="centered">
                          <h1 class="subtitle">DATOS DE CONTACTO</h1>
                          <label class="control-label" for="name">Dirección de residencia</label>
                          <div class="controls">
                            <input type="textbox" id="direccion" name="direccion" placeholder="Ingresa tu dirección de residencia" class="span12" maxlength="300"  onkeyup="validaremos(this,'special')" onblur="validaremos(this,'special')"  required>
                          </div>
                          <label class="control-label" for="name">Ciudad de residencia</label>
                          <div class="controls">
                            <select id="ciudad" name="ciudad" class="span12">
                              <option value="">Selecciona una ciudad</option>
                              <?php
$ciudades = dameCiudad();

foreach($ciudades as $indice => $registro){
echo "<option value=".$registro['id'].">".$registro['municipio'].' - '.$registro['estado']."</option>";
}
?>
                            </select>
                            <label class="control-label" for="name">Barrio de residencia</label>
                            <div class="controls">
                              <input type="textbox" id="barrio" name="barrio" class="span12"  required placeholder="Ingresa el barrio donde resides" onkeyup="validaremos(this,'special')" onblur="validaremos(this,'special')">
                            </div>
                            <label class="control-label" for="name">Teléfono</label>
                            <div class="controls">
                              <input type="textbox" id="telefono" name="telefono" class="span12" required placeholder="Ingresa un número fijo de contacto" onkeyup="validaremos(this,'special')" onblur="validaremos(this,'special')">
                              <label class="control-label" for="name">Celular</label>
                              <div class="controls">
                                <input type="textbox" id="celular" name="celular" class="span12" maxlength="10" placeholder="Ingresa un número celular de contacto" onkeyup="validaremos(this,'special')" onblur="validaremos(this,'special')">
                                <label class="control-label" for="name">E-mail</label>
                                <div class="controls">
                                  <input type="email" id="email" name="email" class="span12" required placeholder="Ingresa tu cuenta de correo electrónico">
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="control-group franja">
                        <div class="centered">
                          <h1 class="subtitle">FORMACIÓN ACADÉMICA</h1>
                          <div class="added">
                            <label class="control-label" for="name">Nivel de formación</label>
                            <select name="nivel[]" id="nivel[]" class="span12">
                              <option value="">Selecciona un nivel</option>
                              <option value="Bachiller">Bachiller</option>
                              <option value="Pregrado">Pregrado</option>
                              <option value="Posgrado">Posgrado</option>
                              <option value="Otro">Otro</option>
                            </select>
                            <label class="control-label" for="name">Título obtenido</label>
                            <input type="textbox"  id="titulo[]" name="titulo[]" class="span12" placeholder="Ingresa el nombre del título" maxlength="400" onkeyup="validaremos(this,'special')" onblur="validaremos(this,'special')">
                            <label class="control-label" for="name">Institución</label>
                            <input type="textbox"  id="institucion[]" name="institucion[]" class="span12" placeholder="Ingresa el nombre de la institución" maxlength="400" onkeyup="validaremos(this,'special')" onblur="validaremos(this,'special')">
                            <label class="control-label" for="name">Fecha de egreso</label>
                            <!-- <input type="date"  id="fchEgreso[]" name="fchEgreso[]" class="span12" value=""> -->

                            <div class="input-append date" id="datepicker-js" data-date="<?php echo date('Y-m-d'); ?>" data-date-format="yyyy-mm-dd">
                                  <input class="datepicker-input" size="16" type="text" value="<?php echo date('Y-m-d'); ?>" placeholder="Select a date" id="fchEgreso[]" name="fchEgreso[]"  autocomplete="off" readonly>
                                  <span class="add-on"><i class="cus-calendar-2"></i></span>
                                </div>

                             <div class="controls">     
                            <a id="agregarCampo" class="btn btn-info" href="#">Agregar estudios</a> </div>
                              </div>
                        </div>
                      </div>
                      <input type="hidden" name="fuente" id="funete" value="">
                      <!-- <div class="control-group">	 -->
                      <!-- <div class="centered">
                        <div id="contenedor"> </div>
                      </div>
                
                      
                      <div class="control-group franja-gris">
                        <div class="centered">
                          <h1 class="subtitle">¿CÓMO TUVO CONOCIMIENTO DE LA UMB VIRTUAL?</h1>
                          <select name="fuente" id="fuente" class="span12">
                            <option value="No responde">Selecciona una respuesta</option>
                            <option value="Internet">Internet </option>
                            <option value="Página UMB">Página UMB</option>
                            <option value="Prensa/Impreso">Prensa/Impreso</option>
                            <option value="Radio">Radio</option>
                            <option value="television">Televisión</option>
                            <option value="Amigo o Conocido">Amigo o Conocido</option>
                          </select>
                        </div>
                      </div> -->
                    </fieldset>
                    <!-- step 2-->
                    <fieldset class="tab-pane" id="inverse-tab2" >
                      <div class="control-group franja-gris">
                        <div class="centered">
                          <h1 class="subtitle">ENTREVISTA</h1>
                          <label class="control-label" for="s3">¿Cuáles fueron los motivos que te llevaron a escoger el programa académico seleccionado?</label>
                          <div class="controls">
                            <input type="textbox" id="programaAcademico" name="programaAcademico" class="span12" placeholder="Ingresa tu respuesta" maxlength="400" onkeyup="validaremos(this,'special')" onblur="validaremos(this,'special')">
                          </div>
                          <label class="control-label" for="s3">¿Qué experiencia profesional tiene en el área correspondiente en al programa académico seleccionado?</label>
                          <div class="controls">
                            <input type="textbox" id="experiencia" name="experiencia" class="span12" placeholder="Ingresa tu respuesta" maxlength="400" onkeyup="validaremos(this,'special')" onblur="validaremos(this,'special')">
                          </div>
                          <label class="control-label" for="s3">¿Por qué elegiste la metodología virtual?</label>
                          <div class="controls">
                            <input type="textbox" id="virtual" name="virtual" class="span12" placeholder="Ingresa tu respuesta" maxlength="400" onkeyup="validaremos(this,'special')" onblur="validaremos(this,'special')">
                          </div>
                          <label class="control-label" for="s3">¿Qué conoces de la Universidad Manuela Beltrán? </label>
                          <div class="controls">
                            <input type="textbox" id="umb" name="umb" class="span12" placeholder="Ingresa tu respuesta" maxlength="400" onkeyup="validaremos(this,'special')" onblur="validaremos(this,'special')">
                          </div>
                          <label class="control-label">¿Cuál es tu fuente de financiación para estudiar?</label>
                          <label class="radio inline">
                          <div class="radio" id="uniform-optionsRadios4"><span class="">
                            <input type="radio" name="financiacion" id="financiacion" value="Recursos Familiares">
                            </span></div>
                          Recursos familiares
                          </label>
                          <label class="radio inline">
                          <div class="radio" id="uniform-optionsRadios5"><span class="checked">
                            <input type="radio" name="financiacion" id="financiacion" value="Recursos Propios">
                            </span></div>
                          Recursos propios
                          </label>
                          <label class="radio inline">
                          <div class="radio" id="uniform-optionsRadios5"><span>
                            <input type="radio" name="financiacion" id="financiacion" value="Financiacion Empresa">
                            </span></div>
                          Financiacion de una empresa
                          </label>
                          <label class="radio inline">
                          <div class="radio" id="uniform-optionsRadios5"><span>
                            <input type="radio" name="financiacion" id="financiacion" value="Credito">
                            </span></div>
                          Crédito
                          </label>
                          <label class="radio inline">
                          <div class="radio" id="uniform-optionsRadios5"><span>
                            <input type="radio" name="financiacion" id="financiacion" value="Otros">
                            </span></div>
                          Otros
                          </label>
                          <label class="control-label">¿Cómo definirías tu nivel de conocimiento sobre el manejo de computadores?</label>
                          <label class="radio inline">
                          <div class="radio" id="uniform-optionsRadios4"><span class="">
                            <input type="radio" name="computadora" id="computadora" value="Alto">
                            </span></div>
                          Alto
                          </label>
                          <label class="radio inline">
                          <div class="radio" id="uniform-optionsRadios5"><span class="checked">
                            <input type="radio" name="computadora" id="computadora" value="Medio">
                            </span></div>
                          Medio
                          </label>
                          <label class="radio inline">
                          <div class="radio" id="uniform-optionsRadios5"><span>
                            <input type="radio" name="computadora" id="computadora" value="Me defiendo">
                            </span></div>
                          Bajo
                          </label>
                          <label class="radio inline">
                          <div class="radio" id="uniform-optionsRadios5"><span>
                            <input type="radio" name="computadora" id="computadora" value="No sabe/No responde">
                            </span></div>
                          No sabe / No responde
                          </label>
                          <label class="control-label">¿Cómo definirías tu nivel de conocimiento en Tecnología, Información y la Comunicación (TICs)?</label>
                          <label class="radio inline">
                          <div class="radio" id="uniform-optionsRadios4"><span class="">
                          <input type="radio" name="TIC" id="TIC" value="Alto" >
                          </span></div>
                        Alto
                        </label>
                          <label class="radio inline">
                          <div class="radio" id="uniform-optionsRadios5"><span class="checked">
                            <input type="radio" name="TIC" id="TIC" value="Medio">
                            </span></div>
                          Medio
                          </label>
                          <label class="radio inline">
                          <div class="radio" id="uniform-optionsRadios5"><span>
                            <input type="radio" name="TIC" id="TIC" value="Me defiendo">
                            </span></div>
                          Bajo
                          </label>
                          <label class="radio inline">
                        <div class="radio" id="uniform-optionsRadios5"><span>
                          <input type="radio" name="TIC" id="TIC" value="No sabe/No responde">
                           </span></div>
                          No sabe / No responde
                          </label>
                        </div> 
                      </div>  

                      <div class="control-group franja">
                        <div class="centered">
                          <h1 class="subtitle">INFORMACIÓN LABORAL</h1>
                          <label class="control-label">¿En estos momentos te encuentras trabajando?</label>
                          <label class="radio inline">
                          <div class="radio" id="uniform-optionsRadios4"><span class="checked">
                            <input type="radio" name="trabaja" id="trabaja" value="option1" checked="" onclick="mostrar()">
                            </span></div>
                          Si
                          </label>
                          <label class="radio inline">
                          <div class="radio" id="uniform-optionsRadios5"><span class="">
                            <input type="radio" name="trabaja" id="trabaja" value="option2" onclick="ocultar()"  >
                            </span></div>
                          No
                          </label>
                          <div class="control-group" id="trabajo">
                          <label class="control-label">¿Con qué tipo de contrato estás vinculado?</label>
                          <label class="radio inline">
                          <div class="radio" id="uniform-optionsRadios4"><span class="">
                            <input type="radio" name="laboral" id="laboral" value="Termino fijo" checked="">
                            </span></div>
                          Termino fijo
                          </label>
                          <label class="radio inline">
                          <div class="radio" id="uniform-optionsRadios5"><span class="checked">
                            <input type="radio" name="laboral" id="laboral" value="Contrato indefenido">
                            </span></div>
                          Contrato indefinido
                          </label>
                          <label class="radio inline">
                          <div class="radio" id="uniform-optionsRadios5"><span>
                            <input type="radio" name="laboral" id="laboral" value="Prestacion de Servicios">
                            </span></div>
                          Prestacion de servicios
                          </label>
                          <label class="radio inline">
                          <div class="radio" id="uniform-optionsRadios5"><span>
                            <input type="radio" name="laboral" id="laboral" value="Otro">
                            </span></div>
                          Otro
                          </label>
                          <label class="control-label" for="">Nombre de la empresa</label>
                          <div class="controls">
                            <input type="textbox" name="institucionT" id="institucionT" class="span12" placeholder="Ingresa el nombre de la empresa" onkeyup="validaremos(this,'special')" onblur="validaremos(this,'special')">
                          </div>
                          <label class="control-label" for="">Fecha de inicio</label>
                          <div class="controls">
                            <!-- <input type="date" name="fchInicio" id="fchInicio" class="span12" value=""> -->
                             <div class="input-append date" id="datepicker-js" data-date="<?php echo date('Y-m-d'); ?>" data-date-format="yyyy-mm-dd">
                                  <input class="datepicker-input" size="16" type="text" value="<?php echo date('Y-m-d'); ?>" placeholder="Select a date" id="fchInicio" name="fchInicio"  autocomplete="off" readonly>
                                  <span class="add-on"><i class="cus-calendar-2"></i></span>
                                </div>
                          </div>
                          <label class="control-label" for="">Fecha de finalización</label>
                          <div class="controls">
                            <!-- <input type="date" name="fchFinal" id="fchFinal" class="span12" value=""> -->
                            <div class="input-append date" id="datepicker-js" data-date="<?php echo date('Y-m-d'); ?>" data-date-format="yyyy-mm-dd">
                                  <input class="datepicker-input" size="16" type="text" value="<?php echo date('Y-m-d'); ?>" placeholder="Select a date" id="fchFinal" name="fchFinal"  autocomplete="off" readonly>
                                  <span class="add-on"><i class="cus-calendar-2"></i></span>
                                </div>
                          </div>
                          <label class="control-label" for="">Dirección</label>
                          <div class="controls">
                            <input type="textbox" name="direccionT" id="direccionT" class="span12" placeholder="Ingresa la dirección de la empresa" maxlength="300"  onkeyup="validaremos(this,'special')" onblur="validaremos(this,'special')">
                          </div>
                          <label class="control-label" for="">Teléfono</label>
                          <div class="controls">
                            <input type="textbox" name="telefonoT" id="telefonoT" class="span12" placeholder="Ingresa el número de la empresa" onkeyup="validaremos(this,'special')" onblur="validaremos(this,'special')">
                          </div>
                          <label class="control-label" for="">Ciudad</label>
                          <div class="controls">
                            <select name="ciudadT" id="ciudadT" class="span12">
                            <option value="">Selecciona una ciudad</option>
                            <?php
$ciudades = dameCiudad();

foreach($ciudades as $indice => $registro){
echo "<option value=".$registro['id'].">".$registro['municipio'].' - '.$registro['estado']."</option>";
}
?>
                          </select>
                          </div>
                          <label class="control-label" for="">Cargo</label>
                          <div class="controls">
                            <input type="textbox" name="cargo" id="cargo" class="span12" placeholder="Ingresa el cargo asignado">
                          </div>
                        </div>
                        </div>
                      </div>
                    </fieldset>
                    </fieldset>
                    <!-- wizard -->
                    <div class="jumbotron franja-dark">
                      <div class="centered">
                        <div class="jumbotron wizard">
                          <div class="span6 hidden-phone"> <strong id="progreso">PROGRESO</strong>
                            <div id="bar" class="progress progress-info slim">
                              <div class="bar"></div>
                            </div>
                          </div>
                          <div class="span6">
                            <ul style="list-style: none;">
                              <li class="previous disabled"> <a href="javascript:void(0);" class="btn small btn-danger lightgray">ANTERIOR</a> </li>
                              <li class="next"> 
                                <!-- <a href="javascript:void(0);" class="btn medium btn-primary next">SIGUIENTE</a> --> 
                                <a href="javascript:void(0);" class="btn small btn-danger lightgray">SIGUIENTE</a> </li>
                              <li > 
                                <!-- <a id="back-to-top" href="javascript:window.scrollTo(0,0);" style="display: block;" class="btn medium btn-primary" ><i class="icon-chevron-up"></i></a> --> 
                              </li>
                            </ul>
                          </div>
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
var ismobile = (/iphone|ipad|ipod|android|blackberry|mini|windows\sce|palm/i.test(navigator.userAgent.toUpperCase()));	
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
     <script src="js/prettify.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
  <script>
  if (top.location != location) {
    top.location.href = document.location.href ;
  }
    $(function(){
      window.prettyPrint && prettyPrint();
      $('#dp1').datepicker({
        format: 'mm-dd-yyyy'
      });
      $('#dp2').datepicker();
      $('#dp3').datepicker();
      $('#dp3').datepicker();
      $('#dpYears').datepicker();
      $('#dpMonths').datepicker();
      $('#fchNacimiento').datepicker();

      
      var startDate = new Date(2012,1,20);
      var endDate = new Date(2012,1,25);
      $('#dp4').datepicker()
        .on('changeDate', function(ev){
          if (ev.date.valueOf() > endDate.valueOf()){
            $('#alert').show().find('strong').text('The start date can not be greater then the end date');
          } else {
            $('#alert').hide();
            startDate = new Date(ev.date);
            $('#startDate').text($('#dp4').data('date'));
          }
          $('#dp4').datepicker('hide');
        });
      $('#dp5').datepicker()
        .on('changeDate', function(ev){
          if (ev.date.valueOf() < startDate.valueOf()){
            $('#alert').show().find('strong').text('The end date can not be less then the start date');
          } else {
            $('#alert').hide();
            endDate = new Date(ev.date);
            $('#endDate').text($('#dp5').data('date'));
          }
          $('#dp5').datepicker('hide');
        });

        // disabling dates
        var nowTemp = new Date();
        var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

        var checkin = $('#dpd1').datepicker({
          onRender: function(date) {
            return date.valueOf() < now.valueOf() ? 'disabled' : '';
          }
        }).on('changeDate', function(ev) {
          if (ev.date.valueOf() > checkout.date.valueOf()) {
            var newDate = new Date(ev.date)
            newDate.setDate(newDate.getDate() + 1);
            checkout.setValue(newDate);
          }
          checkin.hide();
          $('#dpd2')[0].focus();
        }).data('datepicker');
        var checkout = $('#dpd2').datepicker({
          onRender: function(date) {
            return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
          }
        }).on('changeDate', function(ev) {
          checkout.hide();
        }).data('datepicker');
    });
  </script>
  <script src="http://www.google-analytics.com/urchin.js" type="text/javascript">
</script>
<script type="text/javascript">
_uacct = "UA-106117-1";
urchinTracker();
</script>
</html>