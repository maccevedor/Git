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
									
//									if(document.getElementById("cedula").value=="" ){
//
//								   		alert("debe digitar su cedula");
//								   		return false;
//								   	}
//									
									
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