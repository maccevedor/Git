<?php
include_once "conexion.php";
//Se llama a la libreria de envio de correos
include_once "../lib/Swift/swift_required.php";
$usuario=$_REQUEST['idUser'];
$id = intval($_REQUEST['id']);
$email = $_REQUEST['Email'];
$programa = $_REQUEST['cPrograma'];

$conex = conectaBaseDatos();
$sql="select * from admin where id='$usuario'";
$usuarios = $conex->prepare($sql);
$usuarios->execute();
$row = $usuarios->fetch(); 
$myusername= $row["username"];
$asesorEmail = $row["email"];
$sede= $row["sede"];
$cargo= $row["cargo"];
$foto= $row["foto"];


if($sede==776)
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


$sqlMandrill="select * from clave where servicio='mandrill'";
$statement = $conex->prepare($sqlMandrill);
$statement->execute();
$row = $statement->fetch(); 
$mandrillUser= $row["usuario"];
$mandrillPass= $row["clave"];

$sql="select Url,Imagen,Matricula,Precio,Programa,semestre,inscripcion,documento from programa where id='$programa'";
$statement = $conex->prepare($sql);
$statement->execute();
$row = $statement->fetch(); 
$url= $row["Url"];
$imagen= $row["Imagen"];
$matricula= $row["Matricula"];
$inscripcion= $row["Precio"];
$nombrePrograma= $row["Programa"];
$semestre= $row["semestre"];
$Pagoinscripcion = $row["inscripcion"];
$documento = $row["documento"];

$destino=$myusername."@umb.edu.co";
$asesor=$myusername;

$subject = 'Inscripcion Correcta !';
$from = array('uvirtual@umb.edu.co' =>'UMB');
$to = array(
 $email  => 'Aspirante'
);

$text = "Mandrill speaks plaintext";
//$html = "<em>Este es el envio que se realiza para responderle al estuciante Mandrill speaks no entiendo poraque no sale el texto <strong>HTML</strong></em>";

$transport = Swift_SmtpTransport::newInstance('smtp.mandrillapp.com', 587);
//$transport->setUsername('tecnologia@umb.edu.co');
$transport->setUsername($mandrillUser);
$transport->setPassword($mandrillPass);
//$transport->setPassword('a9nuKggtFBlZlTNh_OtYuw');
$swift = Swift_Mailer::newInstance($transport);

$message = new Swift_Message($subject);
$message->setFrom($from);
$message->setCc(array($asesorEmail => "UMB virtual"));
//$message->attach(Swift_Attachment::fromPath('../img/pensum/financiacion.pdf')->setFilename('financiacion.pdf'));
//$message->attach(Swift_Attachment::fromPath('../img/pensum/'.$programa.'.jpg')->setFilename('pensum.jpg'));
//$message->setBody($html, 'text/html');

$message->setBody(
'
<!DOCTYPE html>
<html lang="es">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"><meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
		<title>UMB Virtual</title>
		<link href='.'http://fonts.googleapis.com/css?family=Open+Sans:300italic,400,300,600,700,700italic'.' rel='.'stylesheet'.' type='.'text/css'.'>
		<style type="text/css">
			html {width:100%}
			::-moz-selection {background:#ffffff;color:#444444}
			::selection {background:#ffffff;color:#444444}
			body {margin:0; padding:0; background-color:#ffffff;font-family:'.'open sans'.', sans-serif !important}
			.ReadMsgBody {width:100%;background-color:#ffffff}
			.ExternalClass {width:100%;background-color:#ffffff}
			a {color:#222222; text-decoration:none; font-weight:600; font-style:normal}
			p {margin:0 !important}
			table, td {border-collapse:collapse;margin:0;padding:0;border:0}

			@media only screen and (max-width:639px) {
				body { width:auto !important}
				body table table{width:100% !important; }
				body table[class="table-wrapper"] {width:auto !important; margin:0px 20px !important}
				body table[class="table-inner"] {width:100% !important; margin:0 auto !important}
				body table[class="full"] {width:100% !important; margin:0 auto !important}
				body td[class="center"] {text-align:center !important}
				body img[class="img_scale"] {width:100% !important; height:auto !important}
			}

			@media only screen and (max-width:479px)  {
				body { width:auto !important}
				body table table{width:100% !important; }
				body table[class="table-wrapper"] {width:auto !important; margin:0px 20px !important}
				body table[class="table-inner"] {width:100% !important; margin:0 auto !important}
				body table[class="full"] {width:100% !important; margin:0 auto !important}
				body td[class="center"] {text-align:center !important; disp}
				body img[class="img_scale"] {width:100% !important; height:auto !important; }
			}
		</style>
	</head>


	<body style="padding:0px 0px; background-color:#ffffff">
		<!-- HEADER-->
		<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" >
			<tr>
				<td valign="top" align="center" style="background-color:#cd3c39; background-position:center center; -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; background-size:cover">
					<table class="table-wrapper" width="670" border="0" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse !important">
						<tr>
							<td width="600" style="padding:100px 0;" align="center">
								<table class="table-inner" border="0" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse; mso-table-lspace:10pt; mso-table-rspace:10pt">
									<tr>
										<td valign="top" width="600" align="center" >
											<a href="http://www.umbvirtual.edu.co" target="_blank">
												<img src="http://www.umbvirtual.edu.co/wp-content/mail-corporativo/2016/images/png/logo.png" alt="UMB Virtual">
											</a>
										</td>
									</tr>

									<tr>
										<td valign="top" width="600" height="40" align="center">
											&nbsp;
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		<!-- END OF HEADER -->



		<!-- START OF MODULE 1 -->
		<table width="100%" border="0" align="center" bgcolor="#ffffff"  cellpadding="0" cellspacing="0" style="padding:0; margin:0; border-collapse:collapse !important">
			<tr>
				<td valign="top" align="center">
					<table class="table-wrapper" width="670" border="0" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse !important">
						<tr>
							<td width="600" style="padding:70px 0;" align="center">
								<table class="table-inner" border="0" align="center" cellpadding="0" cellspacing="0">
									<tr>
										<td valign="top" width="600" align="center" style="font-family:'.'open sans'.', sans-serif; font-size:32px; font-weight:300">
											<span>
												Recibe un saludo especial
											</span>
										</td>
									</tr>

									<tr>
										<td valign="top" width="600" align="center" style="font-family:'.'open sans'.',arial, sans-serif; font-size:19px; font-weight:300">
											<span>
												Para la UMB Virtual es un gusto resolver tus inquietudes y darte a conocer el programa virtual <br>
												<b>'.$nombrePrograma.'</b><br><br>
											</span>
											
											<table border="0" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt">
												<tr>
													<td width="20">
														&nbsp;
													</td>
													<td bgcolor="cd3c39" align="center" style="padding:12px 35px; border-radius:20px; text-transform:uppercase; font-weight:bold; font-size:11px; line-height:16px; font-family:'.'Open Sans'.', Arial, sans-serif; color:#ffffff; margin:0 !important; mso-line-height-rule:exactly; letter-spacing:1px">
														 <span>
															<a href="'.$url.'" target="_blank" style="color:#ffffff; text-decoration:none; font-weight:bold;" target="_blank" title="Admisiones">VISITAR PÁGINA DEL PROGRAMA</a>
														 </span>
													</td>
													<td width="20">
														&nbsp;
													</td>
												</tr>
											</table>
										</td>
									</tr>

									<tr>
										<td valign="top" width="600" height="30" align="center">
											&nbsp;
										</td>
									</tr>

									<tr>
										<td>
											<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="ffffff" style="padding:0; margin:0">
												<tr>
													<td valign="top" align="center">
														<table class="table-wrapper" width="650" bgcolor="#ffffff" border="0" align="center" cellpadding="0" cellspacing="0">
															<tr>
																<td width="650" style="padding:30px">
																	<table class="table-inner" width="590" border="0" align="center" cellpadding="0" cellspacing="0">
																		<tr>
																			<td valign="top">
																				<table width="590" class="full" bgcolor="#cd3c39" cellpadding="0" cellspacing="0" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt">
																					<tr>
																						<td align="center" style="padding:20px; margin:0; font-size:32px ; font-weight:500; color:#ffffff; font-family:'.'Open Sans'.', Arial, sans-serif; line-height:100%;  mso-line-height-rule:exactly">
																							 <span>VALOR DEL SEMESTRE</span>
																						</td>
																					</tr>

																					<tr>
																						<td bgcolor="7f2424" align="center" style="padding:30px 10px; margin:0; font-size:48px ; font-weight:bold; color:#ffffff; font-family:'.'Open Sans'.', Arial, sans-serif; line-height:100%;  mso-line-height-rule:exactly; mso-table-lspace:0pt; mso-table-rspace:0pt">
																							 <span>$'.$matricula.'</span>
																						</td>
																					</tr>

																					<tr>
																						<td bgcolor="cd3c39" align="center" style="padding:15px 20px; margin:0; font-size:16px ; color:#ffffff; font-family:'.'Open Sans'.', Arial, sans-serif; font-weight:300">
																							 <span>Valor de la inscripción: $'.$inscripcion.'</span>
																						</td>
																					</tr>

																					<tr>
																						<td bgcolor="d76361" align="center" style="padding:15px 20px; margin:0; font-size:16px ; color:#ffffff; font-family:'.'Open Sans'.', Arial, sans-serif; font-weight:300">
																							 <span>Duración: '.$semestre.' semestres</span>
																						</td>
																					</tr>

																					<tr>
																						<td bgcolor="cd3c39" align="center" style="padding:15px 20px; margin:0; font-size:16px ; color:#ffffff; font-family:'.'Open Sans'.', Arial, sans-serif; font-weight:300">
																							 <span>Modalidad virtual</span>
																						</td>
																					</tr>

																					<tr>
																						<td align="center" style="padding:10px 0 30px 0">
																							<table border="0" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt">
																								<tr>
																									<td width="20">
																										&nbsp;
																									</td>
																									<td bgcolor="7f2424" align="center" style="padding:12px 35px; border-radius:20px; text-transform:uppercase; font-weight:bold; font-size:11px; line-height:16px; font-family:'.'Open Sans'.', Arial, sans-serif; color:#ffffff; margin:0 !important; mso-line-height-rule:exactly; letter-spacing:1px">
																										 <span>
																										 	<a href="http://umbvirtual.edu.co/wp-content/uploads/2014/03/financiacion.pdf" target="_blank"z style="text-decoration:none; font-style:normal; font-weight:bold; color:#ffffff">Financiación</a>
																										 </span>
																									</td>
																									<td width="20">
																										&nbsp;
																									</td>
																								</tr>
																							</table>
																						</td>
																					</tr>

																					<tr>
																						<td bgcolor="cd3c39" align="center" style="padding:0 0 20px 0; margin:0; font-size:13px ; color:#ffffff; font-family:'.'Open Sans'.', Arial, sans-serif; font-weight:300">
																							 <span>Los valores están sujetos a cambios</span>
																						</td>
																					</tr>
																				</table>
																			</td>
																		</tr>
																	</table>
																</td>
															</tr>
														</table>
													</td>
												</tr>

												<tr>
													<td valign="top" width="600" height="30" align="center">
														&nbsp;
													</td>
												</tr>

												<tr>
													<td valign="top" width="600" align="center" style="font-family:'.'open sans'.',arial, sans-serif; font-size:19px; font-weight:300">
														<span>
															Te compartimos los siguientes 3 pasos para que puedas realizar tu proceso de inscripción.
														</span>
													</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		<!-- END OF MODULE 1 -->



		<!-- START OF MODULE 2 -->
		<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="222222" style="padding:0; margin:0; border-collapse:collapse !important">
			<tr>
				<td valign="top" align="center">
					<table class="table-wrapper" width="670" border="0" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse !important">
						<tr>
							<td width="600" style="padding:70px 0;" align="center">
								<table class="table-inner" border="0" align="center" cellpadding="0" cellspacing="0">
									<tr>
										<td valign="top" width="600" align="center">
											<img class="img_scale" src="http://www.umbvirtual.edu.co/wp-content/mail-corporativo/2016/images/jpg/admisiones.jpg" alt="intro-images">
										</td>
									</tr>

									<tr>
										<td valign="top" width="600" height="40" align="center">
											&nbsp;
										</td>
									</tr>

									<tr>
										<td valign="top" width="600" align="center" style="font-family:'.'open sans'.', sans-serif; font-size:32px; font-weight:300; color:#ffffff; padding:0 20px">
											<span>
												1. DATOS PERSONALES
											</span>
										</td>
									</tr>

									<tr>
										<td valign="top" width="600" height="20" align="center">
											&nbsp;
										</td>
									</tr>

									<tr>
										<td valign="top" width="600" align="center" style="font-family:'.'open sans'.', sans-serif; font-size:19px; font-weight:300; color:#ffffff; padding:0 20px">
											<span>
												Ingresa a la página de admisiones de la universidad y diligencia los datos solicitados en el formulario.
											</span>
										</td>
									</tr>

									<tr>
										<td valign="top" width="600" height="30" align="center">
											&nbsp;
										</td>
									</tr>

									<tr>
										<table border="0" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt">
											<tr>
												<td width="20">
													&nbsp;
												</td>
												<td bgcolor="cd3c39" align="center" style="padding:12px 35px; border-radius:20px; text-transform:uppercase; font-weight:bold; font-size:11px; line-height:16px; font-family:'.'Open Sans'.', Arial, sans-serif; color:#ffffff; margin:0 !important; mso-line-height-rule:exactly; letter-spacing:1px">
													 <span>
														<a href="http://umbvirtual.edu.co/inscripcion/" style="color:#ffffff; text-decoration:none; font-weight:bold;" target="_blank" title="Admisiones">Formulario de inscripción</a>
													 </span>
												</td>
												<td width="20">
													&nbsp;
												</td>
											</tr>
										</table>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		<!-- END OF MODULE 2 -->



		<!-- START OF MODULE 3 -->
		<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="padding:0; margin:0; border-collapse:collapse !important">
			<tr>
				<td valign="top" align="center">
					<table class="table-wrapper" width="670" bgcolor="#ffffff" border="0" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse !important">
						<tr>
							<td width="600" style="padding:70px 0;" align="center">
								<table class="table-inner" border="0" align="center" cellpadding="0" cellspacing="0">
									<tr>
										<td valign="top" width="600" align="center" style="font-family:'.'open sans'.', sans-serif; font-size:32px; font-weight:300">
											<span>
												2. CONSIGNACIÓN
											</span>
										</td>
									</tr>

									<tr>
										<td valign="top" width="600" height="10" align="center">
											&nbsp;
										</td>
									</tr>

									<tr>
										<td valign="top" width="600" align="center" style="font-family:'.'open sans'.', sans-serif; font-size:19px; font-weight:300; padding:0 20px">
											<span>
												Realiza la <b>consignación por el valor de la inscripción</b> en cualquiera de los siguientes bancos a nombre de la <b>UNIVERSIDAD MANUELA BELTRÁN.</b>
											</span>
										</td>
									</tr>

									<tr>
										<td valign="top" width="600" height="10" align="center">
											&nbsp;
										</td>
									</tr>

									<tr>
										<td>
											<table border="0" width="600" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse !important">
												<tr>
													<td>
														<table border="0" align="left" width="300" cellpadding="0" cellspacing="0" style="border-collapse:collapse !important">
															<tr>
																<td style="padding:30px 10px;" align="center">
																	<table cellpadding="0" cellspacing="0" style="border-collapse:collapse !important">
																		<tr>
																			<td align="center">
																				<img src="http://www.umbvirtual.edu.co/wp-content/mail-corporativo/2016/images/jpg/banco-popular.jpg" alt="Banco Popular">
																			</td>
																		</tr>

																		<tr>
																			<td align="center" height="20">
																				&nbsp;
																			</td>
																		</tr>

																		<tr>
																			<td align="center" style="font-family:'.'open sans'.', sans-serif; font-size:18px; font-weight:600; color:#222222">
																				<span>
																					<a href="#" style="font-family:'.'open sans'.', sans-serif; font-size:18px; font-weight:600; color:#222222; text-decoration:none">
																						Banco Popular
																					</a>
																				</span>
																			</td>
																		</tr>

																		<tr>
																			<td align="center" style="font-family:'.'open sans'.', sans-serif; font-size:13px; font-weight:300; color:#6e6e6e; line-height:22px">
																				<span>
																					Cuenta Corriente<br>
																					N. 011-16525-5
																				</span>
																			</td>
																		</tr>
																	</table>
																</td>
															</tr>
														</table>


														<table border="0" align="left" width="300" cellpadding="0" cellspacing="0" style="border-collapse:collapse !important">
															<tr>
																<td style="padding:30px 10px;" align="center">
																	<table cellpadding="0" cellspacing="0" style="border-collapse:collapse !important">
																		<tr>
																			<td align="center">
																				<img src="http://www.umbvirtual.edu.co/wp-content/mail-corporativo/2016/images/jpg/banco-davivienda.jpg" alt="Banco Davivienda">
																			</td>
																		</tr>

																		<tr>
																			<td align="center" height="20">
																				&nbsp;
																			</td>
																		</tr>

																		<tr>
																			<td align="center" style="font-family:'.'open sans'.', sans-serif; font-size:18px; font-weight:600; color:#222222">
																				<span>
																					<a href="#" style="font-family:'.'open sans'.', sans-serif; font-size:18px; font-weight:600; color:#222222; text-decoration:none">
																						Banco Davivienda
																					</a>
																				</span>
																			</td>
																		</tr>

																		<tr>
																			<td align="center" style="font-family:'.'open sans'.', sans-serif; font-size:13px; font-weight:300; color:#6e6e6e; line-height:22px">
																				<span>
																					Cuenta Ahorros<br>
																					N. 457000098261<br>
																					(formato empresarial)
																				</span>
																			</td>
																		</tr>
																	</table>
																</td>
															</tr>
														</table>
													</td>
												</tr>
											</table>
										</td>
									</tr>
									<tr>
										<td valign="top" width="600" align="center" style="font-family:'.'open sans'.', sans-serif; font-size:16px; font-weight:300; padding:0 20px">
											<span>
												<b>REF 1:</b> Cédula del cliente<br>
												<b>REF 2:</b> Código del programa ('.$Pagoinscripcion.')
											</span>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		<!-- END OF MODULO 3 -->



		<!-- START OF MODULE 4 -->
		<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" >
			<tr>
				<td valign="top" align="center" style="background-color:#222222; background-position:center center; -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; background-size:cover">
					<table class="table-wrapper" width="670" border="0" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse !important">
						<tr>
							<td width="600" style="padding:70px 0;" align="center">
								<table class="table-inner" border="0" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse; mso-table-lspace:10pt; mso-table-rspace:10pt">
									<tr>
										<td valign="top" width="600" align="center" style="font-family:'.'open sans'.', arial, sans-serif; font-size:32px; font-weight:300; color:#ffffff">
											<span>
												3. REQUISITOS DE ADMISIÓN
											</span>
										</td>
									</tr>

									<tr>
										<td valign="top" width="600" height="40" align="center">
											&nbsp;
										</td>
									</tr>

									<tr>
										<td valign="top" width="600" align="center" style="font-family:'.'open sans'.', arial, sans-serif; font-size:19px; font-weight:300; color:#ffffff">
											<span>
												Escanea la consignación realizada y envíala a
											</span>
										</td>
									</tr>

									<tr>
										<td valign="top" width="600" height="10" align="center">
											&nbsp;
										</td>
									</tr>

									<tr>
										<td align="center">
											<table border="0" align="center" width="" cellpadding="0" cellspacing="0" style="border-collapse:collapse !important">
												<td bgcolor="transparent" align="center" valign="middle" style="display:block; padding:10px 15px; border-radius:25px; text-transform:uppercase; font-weight:bold; font-size:11px; line-height:16px; font-family:'.'open sans'.', Arial, sans-serif; color:#56af2b; margin:0 !important; mso-line-height-rule:exactly; letter-spacing:1px; border:3px solid #ffffff">
													<span>
														<a href="mailto:admisiones.promocionvirtual@umb.edu.co" title="Redactar un correo" style="color:#ffffff">INSCRIPCIONES</a>
													</span>
												</td>
											</table>
										</td>
									</tr>

									<tr>
										<td valign="top" width="600" height="10" align="center">
											&nbsp;
										</td>
									</tr>

									<tr>
										<td valign="top" width="600" align="center" style="font-family:'.'open sans'.', arial, sans-serif; font-size:19px; font-weight:300; color:#ffffff">
											En este mismo correo igualmente debes adjuntar los siguientes documentos:<br><br>
											<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse !important; line-height:27px">
												'.$documento.'
											</table>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		<!-- END OF MODULO 4 -->
		


		<!-- START OF MODULE 5 -->
		<table width="100%" border="0" bgcolor="#cd3c39" align="center" cellpadding="0" cellspacing="0" style="padding:0; margin:0; border-collapse:collapse !important">
			<tr>
				<td valign="top" align="center">
					<table class="table-wrapper" width="670" border="0" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse !important">
						<tr>
							<td width="600" style="padding:70px 0;" align="center">
								<table class="table-inner" border="0" align="center" cellpadding="0" cellspacing="0">
									

									<tr>
										<td valign="top" width="600" height="30" align="center">
											&nbsp;
										</td>
									</tr>
									
									<tr>
										<td valign="top" align="center">
											<img src="'.$foto.'" alt="'.$myusername.'">
										</td>
									</tr>

									<tr>
										<td valign="top" width="600" align="center" style="font-family:'.'open sans'.', sans-serif; font-size:19px; font-weight:300; line-height:24px; color:#ffffff; padding:0 20px">
											<span>
												'.$myusername.'
											</span>
										</td>
									</tr>

									<tr>
										<td align="center" style="padding:5px 20px; margin:0; font-size:15px ; color:#ffffff; font-family:'.'Open Sans'.', Arial, sans-serif; font-weight:300; mso-line-height-rule:exactly">
											<span>
												'.$cargo.'
											</span>
										</td>
									</tr>

									<tr>
										<td valign="top" width="600" height="20" align="center">
											&nbsp;
										</td>
									</tr>

									<tr>
										<td align="center" style="padding:0 20px; margin:0; font-size:13px ; color:#ffffff !important; font-family:'.'Open Sans'.', Arial, sans-serif; font-weight:300; line-height:21px;  mso-line-height-rule:exactly">
											<span>
												'.$telefono.'<br>
												<b>Resto del país:</b> 01 800 093 19 19 ext 1469<br>
												<b>Horario de atención:</b> Lunes a viernes de 8:00 am a 5:00 pm y sábados de 8:00 am a 12 m<br>
											</span>
										</td>
									</tr>

									<tr>
										<td valign="top" width="600" height="5" align="center">
											&nbsp;
										</td>
									</tr>

									<tr>
										<td valign="top" width="600" align="center" >
											<table border="0" align="center" width="" cellpadding="0" cellspacing="0" style="border-collapse:collapse !important">
												<td bgcolor="transparent" align="center" valign="middle" style="display:block; padding:10px 15px; border-radius:25px; text-transform:uppercase; font-weight:bold; font-size:11px; font-family:'.'open sans'.', Arial, sans-serif; color:#56af2b; margin:0 !important; mso-line-height-rule:exactly; letter-spacing:1px; border:3px solid #ffffff">
													<span>
														<a href="mailto:'.$asesorEmail.'" title="Redactar un correo" style="color:#ffffff">'.$myusername.'</a>
													</span>
												</td>
											</table>
										</td>
									</tr>

									<tr>
										<td valign="top" width="600" height="50" align="center">
											&nbsp;
										</td>
									</tr>

									<tr>
										<td valign="top" width="600" align="center" >
											<a href="http://www.umbvirtual.edu.co"><img src="http://www.umbvirtual.edu.co/wp-content/mail-corporativo/2016/images/png/logo.png" alt="UMB Virtual"></a>
										</td>
									</tr>

									<tr>
										<td valign="top" width="600" height="50" align="center">
											&nbsp;
										</td>
									</tr>

									<tr>
										<td align="center">
											<table border="0" width="300" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse !important">
												<tr>
													<td>
														<table border="0" align="left" width="140" cellpadding="0" cellspacing="0" style="border-collapse:collapse !important">
															<tr>
																<td align="center" valign="middle">
																	<span>
																		<a href="http://www.facebook.com/pages/Bogotá-Bogotá-Colombia/UMB-Virtual/190566057656393" target="_blank" title="Facebook">
																			<img src="http://www.umbvirtual.edu.co/wp-content/mail-corporativo/2016/images/png/facebook.png" alt="Facebook UMB virtual" border="0">
																		</a>
																	</span>
																</td>
															</tr>
														</table>

														<table border="0" align="left" width="2" cellpadding="0" cellspacing="0" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="half-container">
															<tr>
																<td height="20" width="2" style="font-size:20px; line-height:20px">
																	&nbsp;
																</td>
															</tr>
														</table>

														<table border="0" align="right" width="140" cellpadding="0" cellspacing="0">						
															<tr>
																<td align="center">
																	<span>
																		<a href="http://twitter.com/#!/umbvirtual" target="_blank" title="Twitter">
																			<img src="http://www.umbvirtual.edu.co/wp-content/mail-corporativo/2016/images/png/twitter.png" alt="Twitter UMB virtual" border="0">
																		</a>
																	</span>
																</td>
															</tr>
														</table>
													</td>
												</tr>
											</table>
										</td>
									</tr>

									<tr>
										<td valign="top" width="600" height="50" align="center">
											&nbsp;
										</td>
									</tr>

									<tr>
										<td align="center" style="padding:0 20px; margin:0; font-size:12px ; color:#ffffff !important; font-family:'.'Open Sans'.', Arial, sans-serif; font-weight:300; line-height:21px;  mso-line-height-rule:exactly">
											<span>
												Para una mejor visualización recomendamos no emplear Outlook
											</span>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		<!-- END OF MODULO 5 -->

	</body>

</html>
',
  'text/html'
);


$message->setTo($to);
$message->addPart($text, 'text/plain');
//sleep(20);

if ($recipients = $swift->send($message, $failures))
{
 echo json_encode(array('success'=>true));
 //echo "<script languaje='javascript'>alert('se correctamente envio el correo');</script>";
    $fchRespuesta=date('Y-m-d H:i:s');
    $sql="update estudiante set FchRespuesta = '$fchRespuesta' where Id=$id" ;
    $statement = $conex->prepare($sql);
    $statement->execute();
    $row = $statement->fetch();
} else {
	 echo json_encode(array('msg'=>'No se pudo enviar el correo'));
 ///echo "There was an error:\n";
 //print_r($failures);
}

?>