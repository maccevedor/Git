 <?php
 require_once("conexion.php");
 require_once('lock.php');
 require_once('funciones.php');
 //require_once('logout.php');
 $myusername = $_SESSION['login_user'];
 $idUser=$_SESSION['id'];
 $sede=$_SESSION['sede'];
	$conex = conectaBaseDatos();
 		$sql="select count(*) as total from estudiante where contacto='Pendiente Contactar'";
		$contactados = $conex->prepare($sql);
		$contactados->execute();
		$row = $contactados->fetch();
		//echo $row['total'];
		if($row > 0){
			$llamar='Recuerda que tienes '.$row['total'].' estudiosos por contactar';
		}else
		{
			$llamar='Felicidades estas al dia';
		}
 ?>
<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" href="../img/favicons/favicon.ico">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta name="description" content="easyui help you build your web page easily!">
	<title>UMBVIRTUAL</title>
	<link rel="stylesheet" type="text/css" href="../css/easyui.css">
	<link rel="stylesheet" type="text/css" href="../css/icon.css">
	<script type="text/javascript" src="datagrid-filter.js"></script>
	<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
	<script type="text/javascript" src="../js/jquery.easyui.min.js"></script>
	<script type="text/javascript">
		function llamados () {
			$('#dlg').dialog('close');		// close the dialog
						$('#dg').datagrid('reload');	// reload the user data
						$.messager.show({
							title: 'Datos',
							msg: '<?php echo $llamar; ?>'
						});
		}
		//Esta funcion se encarga de ocultar las funciones de administrador
		function ocultar()
			{
			document.getElementById('master').style.display='none';
			document.getElementById('subir').style.display='none';
			}
		//Realiza la creacion de un registro
		function newUser(){
			$('#dlg').dialog('open').dialog('setTitle','New User');
			$('#fm').form('clear');
			url = 'agregarEstudiante.php';
		}

		//edita la informacion basica del estudiante
		function editUser(){
			var row = $('#dg').datagrid('getSelected');
			 console.log(row);
			if (row){
				$('#dlg').dialog('open').dialog('setTitle','Editar Usuario');
				$('#fm').form('load',row);
				//valorfoto = 'fotos/'+row.Identificacion+'.jpeg';
				//alert(valorfoto);
				//$("#mostrarfoto").attr('src',valorfoto);
				url = 'modificarEstudiante.php?id='+row.id;
			}
		}
		//Ver mas informacion
		function verUser(){
			var row = $('#dg').datagrid('getSelected');
			if (row){
				$('#dlg').dialog('open').dialog('setTitle','Editar Usuario');
				$('#fm').form('load',row);
				url = 'modificarEstudiante.php?id='+row.id;
			}
		}
		//ver el historico del usuario
		function historial(){
			console.log($('#dg').datagrid('getSelected'));
			var row = $('#dg').datagrid('getSelected');
			//alert (row.id);
			var idInscrito = row.id;
			if (row){
				Isncritohistorial(idInscrito);
				
				
				$('#historial').dialog('open').dialog('setTitle','Historial del Usuario');
				//$('#hs').form('load',row);
				//valorfoto = 'fotos/'+row.Identificacion+'.jpeg';
				//alert(valorfoto);
				//$("#mostrarfoto").attr('src',valorfoto);
				url = 'modificarEstudiante.php?id='+row.id;
			}
		}
		//Se encarga de guardar los estudiantes nuevos
		function saveUser(){
			$('#fm').form('submit',{
				url: url,
				onSubmit: function(){
					return $(this).form('validate');
				},
				success: function(result){

					var result = JSON.parse(result);
					console.log(result);
					if (result.success){
						
						$('#dlg').dialog('close');		// close the dialog
						$('#dg').datagrid('reload');	// reload the user data
						$.messager.show({
							title: 'Datos',
							msg: 'Los datos Fueron Guardados Correctamente.'
						});
					} else {
						$.messager.show({
							title: 'Error',
							msg: result.msg
						});
					}
				}
			});
		}

		//realiza un update para dejar de vializar al estudiante
		function removeUser(){
			var row = $('#dg').datagrid('getSelected');
			if (row){
				$.messager.confirm('Eliminar','Esta seguro que desea eliminar este registro?',function(r){
					if (r){
						$.post('eliminarEstudiante.php',{id:row.id},function(result){
							if (result.success){
								$('#dg').datagrid('reload');	// reload the user data
							} else {
								$.messager.show({	// show error message
									title: 'Error',
									msg: result.msg
								});
							}
						},'json');
					}
				});
			}
		}
        //correo masivo
        function getSelections(){
			var ids = [];
			var rows = $('#dg').datagrid('getSelections');
			for(var i=0; i<rows.length; i++){
				ids.push(rows[i].id);
			}
			//alert(ids.join('\n'));
                var idUser = "<?php echo $idUser; ?>";
				$.post('correoMasivo.php?idUser='+idUser,{ids:ids},function(result){
								if (result.success){
									$('#dg').datagrid('reload');	// reload the user data
                                    $.messager.show({
                                    title: 'Datos',
									msg: 'Fianlizo el envio de correos'
                                    });
								} else {
									$.messager.show({	// show error message
										title: 'Error',
                                        msg: 'No se pudo enviar correctamente lso correos'
									});
								}
							},'json');
		}

		//Envia email cuando se selecciona un  estudiante
		function EmailEstudiante(){
			var row = $('#dg').datagrid('getSelected');
			if (row){
                var idUser = "<?php echo $idUser; ?>";
				alert('Se esta enviando el correo a  '+row.Email);
				$('#fm').form('load',row);
				$.post('mail.php?idUser='+idUser,{id:row.id,Email:row.Email,cPrograma:row.cPrograma},function(result){
							if (result.success){
								$('#dg').datagrid('reload');	// reload the user data
								$.messager.show({
									title: 'Datos',
									msg: 'Se envio correctamento el correo a '+row.Email
								});
							} else {
								$.messager.show({	// show error message
									title: 'Error',
									msg: 'No se pudo enviar correctamento el correo a '+row.Email
								});
							}
						},'json');
			}
		}

		//se encarga de llamar el buscar de las 3 cajas de texto
		function doSearch(){
			    $('#dg').datagrid('load',{
			        itemid: $('#bidentificacion').val(),
			        productid: $('#bnombre').val(),
			        bapellido: $('#bapellido').val(),
			        estado: $('#organizar').val()
			    });
			}

		function registrar(){
			window.location.href = 'registration.php';
			}

		function desconectar(){
			window.location.href = 'logout.php';
			}


		function informacion(){
			var row = $('#dg').datagrid('getSelected');
			url = 'informeEstudiante.php?id='+row.id;
			window.open(url,'_blank');
		}
		function organizar(){
			 $('#dg').datagrid('load',{
			        estado: $('#organizar').val(),
                    oPrograma: $('#oPrograma').val(),
			    });
		}

		$(document).ready(function () {
			llamados();
		});
	</script>
</head>

        <div id="logo">
          <a href="http://umbvirtual.edu.co"><img  src="http://portal.umbvirtual.edu.co/wp-content/uploads/2014/01/logo2.png"  border="0" alt="UMB Virtual" aligh="center"></a>
        </div>

<body>
	<h2>Usuario:<?php echo $myusername ?></h2><br>
	<h2>Lista</h2>
	<div class="demo-info" style="margin-bottom:10px">
		<div>Seleccione el Estudiante que desea enviarle el correo</div>
	</div>

	<table id="dg" title="Usuarios que realizaron el proceso de inscripcion"  class="easyui-datagrid" style="width:1280px;height:800px"
			 url="estudiante.php?sede=<?php echo $sede ?>"
			toolbar="#toolbar" pagination="true"
			rownumbers="true" fitColumns="true"  pageSize="20" pageList="[20,50,100,500]">
		<thead>
			<tr>
				<th field="Identificacion" width="50" sortable="true">Identificacion</th>
				<th field="Nombre" width="50">Nombre</th>
				<th field="Apellido" width="50">Apellido</th>
				<th field="Telefono" width="50">Telefono</th>
				<th field="Email" width="100">Email</th>
				<th field="Programa" width="100" sortable="true">Programa</th>
				<th field="Fch" width="100" sortable="true">Fecha</th>
				<th field="FchRespuesta" width="100">Fecha Respuesta</th>
				<th field="Observacion" width="100">Observacion</th>
				<th field="Fuente" width="100">Fuente</th>
				<th field="umb" width="100">Estado</th>
				<th field="Municipio" width="100">Ciudad</th>
				<th field="contacto" width="100"  sortable="true">contacto</th>
				<th field="url" width="100"  sortable="true">url</th>
				<th field="asesor" width="100"  sortable="true">asesor</th>
				<th field="descripcion" width="100"  sortable="true">descripcion</th>
				<!-- <th field="Estado" width="100">Estado1</th> -->
				<!-- <th field="cPrograma" width="100"></th> -->
			</tr>
		</thead>

	</table>


	<div id="toolbar">

		<div id="master">

		<a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="removeUser()">Eliminar</a>
		<a href="#" class="easyui-linkbutton" iconCls="icon-ok" plain="true"  onclick="registrar()" >Registrar</a>
		</div>
		<a href="#" class="easyui-linkbutton" iconCls="icon-tip" plain="true" onclick="informacion()">Informacion</a>
		<a href="#" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editUser()">Editar</a>
		<a href="#" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newUser()">Agregar</a>
		<a href="#" class="easyui-linkbutton" iconCls="icon-mail" plain="true" onclick="EmailEstudiante()">Enviar correo al aspirante</a>
		<a href="#" class="easyui-linkbutton" iconCls="icon-undo" plain="true" onclick="desconectar()">Desconectar</a>
		<a href="#" class="easyui-linkbutton" iconCls="icon-save" plain="true" onclick="getSelections()">Correo Masivo</a>
		<a href="#" class="easyui-linkbutton" iconCls="icon-save" plain="true" onclick="llamados()">llamados</a>
		<a href="#" class="easyui-linkbutton" iconCls="icon-print" plain="true" onclick="historial()">Historial</a>


            <div id="tb" style="padding:3px">
			    <span>Email:</span>
			    <input id="bidentificacion" name="bidentificacion" style="line-height:26px;border:1px solid #ccc" onkeypress="doSearch()">
			    <span>Nombre:</span>
			    <input id="bnombre" style="line-height:26px;border:1px solid #ccc" onkeypress="doSearch()">
			    <span>Apellido:</span>
			    <input id="bapellido" style="line-height:26px;border:1px solid #ccc" onkeypress="doSearch()">
			    <a href="#" class="easyui-linkbutton" iconCls="icon-search"  plain="true"  onclick="doSearch()">Buscar</a>
			    <!-- <input type="checkbox" id="admisiones" value="1" onclick="doSearch()">Admisiones<br> -->
				    <label>Organizar:</label>
					<select onChange="organizar();" id="organizar" name="organizar"  style="width:200px;" >
				    <option value="1">Aspirante</option>
				    <option value="2">Admisiones</option>
                    <option value="0">Todos</option>
					</select>
					</div>
                    <label>Programa:</label>
                    <!-- <input name="Programa" class="easyui-validatebox" required="true"> -->
                    <select onChange="organizar();" name="oPrograma"  id="oPrograma" class="easyui-validatebox">
                        <option value="0">- Seleccione un  nivel formación -</option>
                            <?php
                                $Programa = programa();

                                foreach($Programa as $indice => $registro){
                                echo "<option value=".$registro['id'].">".$registro['Programa']."</option>";
                                }
                            ?>
                        </select>
			</div>

	<div id="dlg" class="easyui-dialog" style="width:600px;height:600px;padding:20px 30px" closed="true" buttons="#dlg-buttons">
		<div class="ftitle">Información Del Estudiante</div>


		<form id="fm" method="post" novalidate enctype="multipart/form-data">
			<div class="fitem">
				<label>Identificacion:</label>
				<input name="Identificacion" class="easyui-validatebox" required="true">

			</div>
			<div class="fitem">
				<label>Nombres:</label>
				<input name="Nombre" class="easyui-validatebox" required="true">
			</div>
			<div class="fitem">
				<label>Apellidos:</label>
				<input name="Apellido" class="easyui-validatebox" required="true">
			</div>
			<div class="fitem">
				<label>Telefono:</label>
				<input name="Telefono">
			</div>
			<div class="fitem">
				<label>Email:</label>
				<input name="Email">
			</div>
			<div class="fitem">
			<label>Ciudad:</label>

                 <select  name="cCiudad" id="cCiudad" 	 >
                   <option value="">Selecciona una ciudad</option>
				                                <?php
				$ciudades = dameCiudad();

				foreach($ciudades as $indice => $registro){
				echo "<option value=".$registro['id'].">".$registro['municipio'].' -'.$registro['estado']."</option>";
				}
				?>
                 </select>
              </div>
			<div class="fitem">
				<label>Programa:</label>
				<!-- <input name="Programa" class="easyui-validatebox" required="true"> -->
				<select name="cPrograma"  id="cPrograma" class="easyui-validatebox">
					<option value="">- Seleccione un  nivel formación -</option>
						<?php
							$Programa = programa();

							foreach($Programa as $indice => $registro){
							echo "<option value=".$registro['id'].">".$registro['Programa']."</option>";
							}
						?>
					</select>
			</div>
			<div class="fitem">
				<label>Asesor:</label>
				<select name="cAsesor"  id="cAsesor" class="easyui-validatebox">
					<option value="">- Asesor 1-</option>
						<?php
							//echo 'hola';
							$asesor = administradores();
							//print_r($asesor);exit;
							foreach($asesor as $indice => $registro){
							echo "<option value=".$registro['id'].">".$registro['username']."</option>";
							}
						?>
					</select>
			</div>
			<div class="fitem">
				<label>Estado::</label>
				<select name="cEstado"  id="cEstado" class="easyui-validatebox">
					<option value="">- Seleccionar estado 1-</option>
						<?php
							//echo 'hola';
							$estado = estado();
							//print_r($asesor);exit;
							foreach($estado as $indice => $registro){
							echo "<option value=".$registro['id'].">".$registro['nombre']."</option>";
							}
						?>
					</select>
			</div>
			<div class="fitem">
				<label>Gestión:</label>
				<select name="cGestion"  id="cGestion" class="easyui-validatebox">
					<option value="">- Seleccione una-</option>
						<?php
							//echo 'hola';
							$gestion = gestion();
							//print_r($gestion);exit;
							foreach($gestion as $indice => $registro){
							echo "<option value=".$registro['id'].">".$registro['nombre']."</option>";
							}
						?>
					</select>
			</div>
			<div class="fitem">
				<label>Descripción:</label>
				<select name="cDescripcion"  id="cDescripcion" class="easyui-validatebox">
					<option value="">--Descripción-</option>
					<?php
							//echo 'hola';
							$gestion = GestionDescripcion();
							//print_r($gestion);exit;
							foreach($gestion as $indice => $registro){
							echo "<option value=".$registro['id'].">".$registro['nombre']."</option>";
							}
						?>
				</select>
			</div>
			<div class="fitem">
				<label>Contacto:</label>
				<!-- <input name="Fuente" class="easyui-validatebox" validType="text"> -->
				<select id="contacto" class="easyui-combobox" name="contacto" style="width:200px;">
			    <option value="Contactado">Contactado</option>
			    <option value="Pendiente Contactar">Pendiente Contactar</option>
				</select>
			</div>
			<div class="fitem">
				<label>Observacion:</label>
				<input name="Observacion" class="easyui-validatebox" validType="text" >
			</div>
			<div class="fitem">
				<label>Fuente:</label>
				<!-- <input name="Fuente" class="easyui-validatebox" validType="text"> -->
				<select id="Fuente" class="easyui-combobox" name="Fuente" style="width:200px;">
			    <option value="UmbVirtual">UmbVirtual(Home)</option>
			    <option value="Programas">UmbVirtual(Programas)</option>
			     <option value="Indexcol">Indexcol</option>
                <option value="Tolima">Tolima</option>
                <option value="Oficina Ibague">Oficina Ibague</option>
			    <option value="Home">Toma de Home</option>
			    <option value="Chat">Chat</option>
			    <option value="Referido">Referido</option>
			    <option value="Radio">Radio</option>
			    <option value="Revista">Revista</option>
			    <option value="Teléfono">Teléfono</option>
			    <option value="Tv(Caracol)">Tv(Caracol)</option>
			    <option value="Tv(Fox)">Tv(Fox)</option>
			    <option value="Tv(Warner)">Tv(Warner)</option>
				</select>
			</div>
<!--
			<div class="fitem">
			<label>Estado:</label>
			<select id="umb" class="easyui-combobox" name="umb" style="width:200px;">
			    <option value="Aspirante">Aspirante</option>
			    <option value="Inscrito">Inscrito</option>
			     <option value="Asistente">Asistente</option>
			    <option value="Activo">Activo</option>
			</select>
			</div>
-->
            <div class="fitem">
                <label>Grupo sanguíneo:</label>
                <select id="Rh" class="easyui-combobox" name="Rh" style="width:200px;">
                    <option value="O+">O+</option>
                    <option value="A+">A+</option>
                    <option value="B+">B+</option>
                    <option value="AB+">AB+</option>
                    <option value="O-">O-</option>
                    <option value="A-">A-</option>
                    <option value="B-">B-</option>
                    <option value="AB-">AB-</option>
                </select>
            </div>
            	<input type="hidden" id="idUser" name="idUser" value="<?php echo $idUser ?>">
<!--
			<div class="fitem">
				<label>Foto:</label>
				<img id="mostrarfoto" class="mostrarfoto" name="mostarfoto" src="" alt="Smiley face" height="60" width="60"><br><br>
				<!-- <input type="file" id="foto" name="foto" class="easyui-validatebox" data-max-size="2048" accept="image/*,.dmg" > -->
				<input type="file" id="foto" name="foto" class="easyui-validatebox" data-max-size="2048" accept="image/*" >
			</div>

			<input type="hidden" name="User" class="easyui-validatebox"  value="<?php echo $myusername ?>">

		</form>
	</div>
	<div id="dlg-buttons">
		<a href="#" class="easyui-linkbutton" iconCls="icon-ok" onclick="saveUser()">Guardar</a>
		<a href="#" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')">Cancelar</a>
	</div>










	<div id="historial" class="easyui-dialog" style="width:600px;height:600px;padding:20px 30px" closed="true" buttons="#historial-buttons">
<!--
		<div class="ftitle">Historial Del Estudiante</div>


		    <table class="table table-striped">
        <thead>
            <tr>
                <th>descripcion</th>
                <th>Asesor</th>            
                <th>Observación</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>2</td>
                <td>3</td>
                <td>4</td>
            </tr>

        </tbody>
    </table>
-->
    <div id="thistorico" name="thistorico">
	    
    </div>
    
    
	</div>
	<div id="historial-buttons">
		<a href="#" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#historial').dialog('close')">Cancelar</a>
	</div>
	
	
	
	







<div id="subir">
<!--subir archivo csv a la base de datos -->
<form id="xlsSheet"
name="xlsSheet" method="post" action="upload.php" target="_blank"
onsubmit="return valPwd();" enctype="multipart/form-data" >

<td align="left">Archivo CSV a ingresar: </td>
        <td align="left"><input name="filename"
type="file" class="button" required />

 <input name="submit" type="submit"  value="Subir archivo"
/>

</form><br>

<form id="xlsSheet"
name="xlsSheet" method="post" target="_blank" action="landing.php"
onsubmit="return valPwd();" enctype="multipart/form-data" >

<td align="left">Archivo CSV de las campañas : </td>
        <td align="left"><input name="filename"
type="file" class="button" required/>

 <input name="submit" type="submit" value="Subir archivo"/>


</form>
</div>
	<!-- <a href='listar.php?hello=true'>Run PHP Function</a> -->
	Seleccione desde que fecha se realizara la consulta<input type="date" name="fchExcel" id="fchExcel" required>
	<input type="submit" id="excel" name="excel" onclick="fnc()"  value="Descargar " >
	
</body>
<script type="text/javascript">
	//$("#cGestion").on("change", buscarDescripcion());
	$( "#cGestion" ).change(function() {
	  
	  $("#cDescripcion").html("<option value=''>Selecciona un nivel de formación</option>");
		$cGestion = $("#cGestion").val();
		//alert($cGestion);
		if($cGestion == ""){
			$("#cGestion").html("<option value=''>Selecciona un nivel de formación</option>");
		}
		else{
		$.ajax({
			dataType: "json",
			data: {"gestion": $cGestion},
			url:   'buscar.php',
			type:  'post',
			beforeSend: function(){},
			success: function(respuesta){
			//lo que se si el destino devuelve algo
			$("#cDescripcion").html(respuesta.html);
			},
		error:	function(xhr,err){ 
			alert("readyState: "+xhr.readyState+"\nstatus: "+xhr.status+"\n \n responseText: "+xhr.responseText);
			}
		});
		}
	});
	
	
	$( "#cEstado" ).change(function() {
	  
	  $("#cGestion").html("<option value=''>Selecciona un nivel de formación</option>");
		$cEstado = $("#cEstado").val();
		//alert($cGestion);
		if($cEstado == ""){
			$("#cEstado").html("<option value=''>Selecciona un nivel de formación</option>");
		}
		else{
		$.ajax({
			dataType: "json",
			data: {"idEstado": $cEstado},
			url:   'buscar.php',
			type:  'post',
			beforeSend: function(){},
			success: function(respuesta){
			//lo que se si el destino devuelve algo
			$("#cGestion").html(respuesta.html);
			},
		error:	function(xhr,err){ 
			alert("readyState: "+xhr.readyState+"\nstatus: "+xhr.status+"\n \n responseText: "+xhr.responseText);
			}
		});
		}
	});
	
	
	
	function Isncritohistorial(idInscrito){
		
		//alert(idInscrito);
		//$cGestion = $("#cGestion").val();
		//alert($cGestion);
		if(idInscrito == ""){
			//$("#cGestion").html("<option value=''>Selecciona un nivel de formación</option>");
			alert('Recuerde seleccionar un inscrito');
		}
		else{
		$.ajax({
			dataType: "json",
			data: {"idInscrito": idInscrito},
			url:   'buscar.php',
			type:  'post',
			beforeSend: function(){},
			success: function(respuesta){
			//lo que se si el destino devuelve algo
			$("#thistorico").html(respuesta.html);
			},
		error:	function(xhr,err){ 
			alert("readyState: "+xhr.readyState+"\nstatus: "+xhr.status+"\n \n responseText: "+xhr.responseText);
			}
		});
		}	
	}


	function fnc()
				{
				fchExcel = $("#fchExcel").val();
				//alert(fchExcel);
				window.open("excel.php?fchExcel="+fchExcel);
				}
						//$("#c").on("onclick", buscarPrograma);


						//console.log(fchExcel);

						function excel(){

						//exit();
						alert (fchExcel);
						$.ajax({
							dataType: "json",
							data: {"fchExcel": fchExcel},
							url:  'excel.php',
							type:  'post',
						});
					}
	</script>
</html>
<?php
$conex = conectaBaseDatos();
$sql="select perfil from admin where username='$myusername'";
$sql=$conex->query($sql);
$sql->execute();
$result=$sql->fetch();
$perfil = $result["perfil"];
if ($perfil=="1") {
}
else
{
	echo "<script type=\"text/javascript\">ocultar();</script>";
}
?>
