<?php
include('modelo/conexion.php');
include('modelo/funciones.php');
asdasdasd

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Universidad Manuela Beltrán">
	<meta name="keywords" content="UMB Virtual,administración de empresas a distancia,administracion de empresas virtual,administracion virtual,carreras virtuales,clases por internet,curso por internet,cursos virtuales,educacion a distancia,educacion a distancia en colombia,educacion virtual en colombia,especializaciones virtuales,estudio a distancia,estudio por internet,estudios por internet,Estudios universitarios virtuales,postgrado virtual,universidad a distancia,universidades a distancia,universidades virtuales,universidades virtuales en colombia">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <!-- <link rel="shortcut icon" href="assets/ico/favicon.ico"> -->

    <title>Inscripción</title>

    <!-- Bootstrap core CSS -->
    <link href="css/main.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-50694632-1', 'umbvirtual.edu.co');
  ga('send', 'pageview');

</script>
			  <script type="text/javascript">
								
								
								
								function vermas() { 
								var eldiv =document.getElementById("terminos"); 
								eldiv.style.display="block"; 
								} 

								function validar(){
								
								
								   	var coll = document.all.item("programa");

								   	if(document.getElementById("programa").value=="0" || coll == "0" ){

								   		alert("debe seleccionar un programa");
								   		return false;
								   	}
									
									if(document.getElementById("nombres").value=="" || document.getElementById("apellidos").value==""  ){

								   		alert("debe digitar sus nombres y apellidos");
								   		return false;
								   	}
									
									if(document.getElementById("correo").value=="" ){

								   		alert("debe digitar su correo electrónico");
								   		return false;
								   	}
									
									if(document.getElementById("telefono").value=="" ){

								   		alert("debe digitar su teléfono");
								   		return false;
								   	}
									
									if(document.getElementById("cedula").value=="" ){

								   		alert("debe digitar su cedula");
								   		return false;
								   	}
									
									
									 var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
										if (!(formulario.correo.value.match(emailExp)))
										{
											alert("Favor Ingrese un email válido");
											formulario.correo.focus();
											return false;
										}
			
									
									document.getElementById('submit').style.display='none';
									
								 }  	
								 
								function soloLetras(e) {
										key = e.keyCode || e.which;
										tecla = String.fromCharCode(key).toLowerCase();
										letras = " áéíóúabcdefghijklmnñopqrstuvwxyz0123456789";
										especiales = [8, 37, 39];

										tecla_especial = false
										for(var i in especiales) {
											if(key == especiales[i]) {
												tecla_especial = true;
												break;
											}
										}

										if(letras.indexOf(tecla) == -1 && !tecla_especial)
											return false;
									} 
  </script>
  <body>



<!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-TX8LGP"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-TX8LGP');</script>
<!-- End Google Tag Manager -->



    <div class="navbar">
		<div class="container">
			<div id="cabezote">
				<div class="umb"><img src="img/escudoUMB.png"></div>
				<div class="virtual"><img src="img/umbVirtual.png"></div>
			</div>
		</div>
	</div>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron franja-roja">
      <div class="container">
        <h1>INSCRÍBETE</h1>
        <p>La Educación de la UMB Virtual está basada en el “aprendizaje feliz”, donde se brinda al estudioso un escenario motivacional-multimedial que permite disfrutar el proceso educativo, desde la autogestión, sin limitarse a recursos textuales en PDF.</p>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <img src="img/header.jpg" alt="Inscríbete" align="center" />
      </div>
    </div>

    <div class="jumbotron franja-gris">
	    <div class="container">
			<div class="row">
				<form onSubmit="return validar()"  id="formulario" name="formulario" action="controlador/ctlLanding.php" method="post">
					<div class="col-md-4">
						<div class="comment-input">
						<input type="hidden" id="fch" name="fch" value="<?php echo date('Y-m-d'); ?>" />
							Nombres:<input type="text" name="nombres" id="nombres" value="" placeholder="Ingresa tu nombre" size="22" tabindex="1" aria-required="true" class="input-name"  onKeyUp="this.value = this.value.toUpperCase();" required>
						</div>
						<div class="comment-input">
							Apellidos:<input type="text" name="apellidos" id="apellidos" value="" placeholder="Ingresa tus apellidos" size="22" tabindex="1" aria-required="true" class="input-name" onKeyUp="this.value = this.value.toUpperCase();" required>
						</div>
					</div>

					<div class="col-md-4">
						<div class="comment-input">
							Cédula:<input type="text" onkeypress="return soloLetras(event)" name="cedula" id="cedula" value="" placeholder="Ingresa tu número de identidad" size="22" tabindex="1" aria-required="true" class="input-name" required>
						</div>
						<div class="comment-input">
							Ciudad:<select id="ciudad" name="ciudad" placeholder="Ingresa tu ciudad de residencia"  tabindex="1" required >
																					<option value="99">- Seleccione un Ciudad -</option>
																				<?php
																				$ciudades = dameCiudad();
																			
																				foreach($ciudades as $indice => $registro){
																					echo "<option value=".$registro['id'].">".$registro['municipio'].' - '.$registro['estado']."</option>";
																				}
																				?>
																			</select>
						</div>
					</div>

					<div class="col-md-4">
						<div class="comment-input">
							Correo electrónico:<input type="email" name="correo" id="correo" value="" placeholder="Ingresa tu cuenta de correo electrónico" size="22" tabindex="1" aria-required="true" class="input-name" required>
						</div>
						<div class="comment-input">
							Celular o teléfono:<input type="text" name="telefono" id="telefono" value="" placeholder="Ingresa un número de contacto" size="22" tabindex="1" aria-required="true" class="input-name" maxlength=10 required>
						</div>
					</div>

					
					<div class="col-md-12">
					<select name="programa"  id="programa" class="span12">
																			<option value="0">- Seleccione una Programa -</option>
																				<?php
																					$categorias = damePrograma();
																		
																					foreach($categorias as $indice => $registro){
																					echo "<option value=".$registro['id'].">".$registro['Programa']."</option>";
																					}
																				?>
																			</select>
																		</div>
					<div class="col-md-1">
						<input type="checkbox" name="termino" id="termino" value="" size="5" class="" required>
					</div>

					<div class="col-md-11">
						<div id="mensaje">
								Acepto cláusula de tratamiento de datos personales. <a onclick="vermas()">Leer más</a>
							</div>
					</div>

					<div class="col-md-12">
						<div id="terminos" style="display:none">
						<!-- <div id="terminos"> -->
							La UMB Virtual en cumplimiento de la ley 1581 de 2012 y el artículo 10 del decreto 1377 de 2013, mediante el cual se desarrollan los preceptos constitucionales de protección y tratamiento de la información de todas las personas, así como el derecho que tienen a conocer actualizar y rectificar todo tipo de datos personales recogidos en nuestras bases de datos o archivos, se permite informarle que la información que de una u otra manera haya sido obtenida por la UMB Virtual es y seguirá siendo utilizada con fines estrictamente académicos y dentro del desarrollo del proceso formativo al cual usted ha accedido al momento de decidir cursar cualquiera de nuestros programas formales o no formales dentro de ambientes virtuales de aprendizaje.
 						<br><br>Dicha información será ingresada en las bases de datos de la Universidad Manuela Beltrán y se manejará exclusivamente por los funcionarios adscritos a la UMB Virtual, así mismo se le dará el tratamiento establecido en la ley atendiendo entre otros a los preceptos de confidencialidad señalados en el título II capítulo 4 de la ley 1581 de 2012.
 ​						<br><br>En cualquier momento usted puede solicitar la supresión, modificación, corrección o actualización de sus datos personales contenidos en nuestras bases de datos enviando comunicación expresa a la UMB Virtual por cualquier medio que pueda ser objeto de consulta y verificación posterior.
 						<br><br>Muchas gracias.
						</div>
					</div>

					

					<div class="col-md-12">
						<input type="submit" id="submit" name="submit" value="Enviar" class="button red" >
					</div>

				</form>
			</div>
		</div>
    </div> <!-- /container -->

    <div class="jumbotron">
	    <div class="container">
			<div class="row">
				<h1 class="subtitle">BENEFICIOS</h1>
				<div class="col-md-4">
					• Procesos de enseñanza y aprendizaje enriquecidos gráficamente que vinculan vídeos, audio, animaciones y discursos académicos.<br><br>
					• Alto grado de interactividad en los diferentes programas.<br><br>
					• Plataforma propia VirtualNet 2.0 de última tecnología ajustada a las necesidades de los estudiosos y docentes.
				</div>

				<div class="col-md-4">
					• La plataforma tecnológica recibe el soporte de IBM garantizando seguridad, continuidad y calidad del servicio.<br><br>
					• Acompañamiento de tutores expertos que guían la consulta de materiales y desarrollo de proyectos de cada asignatura.<br><br>
					• Equipo multidisciplinario que cuenta con Coordinadores de Programa, Docentes, Pedagogos, Ingenieros y Diseñadores.
				</div>

				<div class="col-md-4">
					• Aprendizaje situado sobre contextos reales.<br><br>
					• Estructuras Curriculares Flexibles.
				</div>
			</div>
		</div>
	</div>

	<div class="jumbotron franja-gris">
	    <div class="container">
			<div class="row">
				<h1 class="subtitle">DESCUENTOS</h1>
				<div class="col-md-4">
					• Afiliado a Compensar descuento del 8%<br><br>
					• Afiliado a Colsubsidio descuento del 8%<br><br>
					• Afiliado a Porvenir descuento del 8%<br><br>
					• Afiliado al Fondo Nacional del Ahorro descuento del 8%<br><br>
					• Beneficiarios de Somec 8%
				</div>

				<div class="col-md-4">
					• Beneficiarios de Colfondos Suma 8%<br><br>
					• Beneficiarios Casur (Caja de Sueldos de Retiro de la Policía Nacional) 5%<br><br>
					• Funcionarios UMB 20%<br><br>
					• Familiar funcionarios UMB (1er y 2do grado de consanguinidad) 10%
				</div>

				<div class="col-md-4">
					• Egresado UMB 10% (para segundo programa de pregrado)<br><br>
					• En situación de discapacidad 20%
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
