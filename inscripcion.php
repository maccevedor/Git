<?php
error_reporting(0);
include('modelo/conexion.php');
include('modelo/funciones.php');
$day=date('Y-m-d H:i:s');
$fuente= $_REQUEST['key'];
include('view/header.php');
?>

	<body>
	<?php
	if($fuente=="Indexcol"){
	include('lib/Indexcol.php');
}
?>
    <div class="container">
      <div class="row">
        <img src="img/header.jpg" alt="Inscríbete" align="center" />
      </div>
    </div>
    <div class="jumbotron franja-gris" id="formulario">
	    <div class="container">
			<div class="row">
				<form onSubmit="return validar()"  id="formulario" name="formulario" action="controlador/ctlLanding.php" method="post">
					<div class="col-md-4">
						<div class="comment-input">
						<input type="hidden" id="fch" name="fch" value="<?php echo $day; ?>" />
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

					<input type="hidden" id="fuente" name="fuente" value="<?php echo $fuente ?>">
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

    <div class="jumbotron" id="beneficios">
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
					<div class="col-md-6 copyright">
						<a href="http://umbvirtual.edu.co/" target="_self" title="UMB Virtual"><img src="http://umbvirtual.edu.co//wp-content/uploads/2014/06/logo-footer.png" border="0"></a>
						<br><br>
						© 2014 UMB Virtual<br>
						Teléfono: (+57 1) 546 06 00 Ext. 1470 - 1473<br>
						Todos los derechos reservados.
					</div>
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
    <script src="js/anchor.js"></script>
  </body>
</html>
