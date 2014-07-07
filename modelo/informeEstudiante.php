<?php
require_once('../lib/tcpdf/examples/tcpdf_include.php');
require_once('../lib/tcpdf/tcpdf.php');
require_once("../modelo/conexion.php");

    
$id = intval($_REQUEST['id']);
$conex = conectaBaseDatos();


$sql="select * from laboral l where  l.idEstudiante='$id' ";
//$sql="select * from entrevista e where  e.idEstudiante='$id' ";
//sql="select * from academico a where  a.idEstudiante='$id' ";
$statement = $conex->prepare($sql);
$statement->execute();
$row = $statement->fetch(); 
if($row > 0){
$sql="select e.*,e.Identificacion as Eidentificacion , en.*,a.*,l.Tipo as TipoT,l.Institucion as InstitucionT,l.FchFinal,l.FchInicio,l.Telefono as TelefonoT,l.CiudadT,l.Cargo,l.TipoVinculacion from estudiante e inner JOIN  entrevista en on e.Id=en.idEstudiante inner JOIN  academico a on e.Id=a.idEstudiante inner JOIN  laboral l on e.Id=l.idEstudiante  where e.Id='$id'";    
$statement = $conex->prepare($sql);
    $statement->execute();
    $row = $statement->fetch(); // Use fetchAll() if you want all results, or just iterate over the statement, since it implements Iterator


}else
{
$sql="select e.*,e.Identificacion as Eidentificacion , en.*,a.* from estudiante e inner JOIN  entrevista en on e.Id=en.idEstudiante inner JOIN  academico a on e.Id=a.idEstudiante  where e.Id='$id'";
$statement = $conex->prepare($sql);
    $statement->execute();
    $row = $statement->fetch(); // Use fetchAll() if you want all results, or just iterate over the statement, since it implements Iterator

        $row["TipoT"]="No labora";
        $row["InstitucionT"]="No labora";            
        $row["FchInicio"]="";
        $row["FchFinal"]="";
        $row["TelefonoT"]="No labora";
        $row["CiudadT"]="No labora";
        $row["Cargo"]="No labora";
}


//$sql="select e.*,e.Identificacion as Eidentificacion , en.*,a.* from estudiante e inner JOIN  entrevista en on e.Id=en.idEstudiante inner JOIN  academico a on e.Id=a.idEstudiante   where e.Id='$id'";
//$sql="select e.*,e.Identificacion as Eidentificacion , en.*,a.*,l.Tipo as TipoT,l.Institucion as InstitucionT,l.FchFinal,l.FchInicio,l.Telefono as TelefonoT,l.CiudadT,l.Cargo,l.TipoVinculacion from estudiante e inner JOIN  entrevista en on e.Id=en.idEstudiante inner JOIN  academico a on e.Id=a.idEstudiante inner JOIN  laboral l on e.Id=l.idEstudiante  where e.Id='$id'";
//$sql="select e.*,en.*,a.*,l.Tipo as TipoT,l.Institucion as InstitucionT,l.FchFinal,l.FchInicio,l.Telefono as TelefonoT,l.CiudadT,l.Cargo,l.TipoVinculacion from estudiante e inner JOIN  entrevista en on e.Identificacion=en.Identificacion inner JOIN  academico a on e.Identificacion=a.Identificacion inner JOIN  laboral l on e.Identificacion=l.Identificacion  where e.Identificacion='$id' group by e.Id,en.id,a.id,l.id desc limit 1";
//$sql="select e.*,en.*,a.*,l.* from estudiante e inner JOIN  entrevista en on e.Identificacion=en.Identificacion inner JOIN  academico a on e.Identificacion=a.Identificacion inner JOIN  laboral l on e.Identificacion=l.Identificacion  where e.Id='$id' limit 1";
//$sql="select e.*,en.*,a.* from estudiante e inner JOIN  entrevista en on e.Identificacion=en.Identificacion inner JOIN  academico a on e.Identificacion=a.Identificacion  where e.Id='$id' limit 1";
/*    $statement = $conex->prepare($sql);
    $statement->execute();
    $row = $statement->fetch(); // Use fetchAll() if you want all results, or just iterate over the statement, since it implements Iterator
*/
    $TipoId= $row["TipoId"];
    $Identificacion= $row["Eidentificacion"];
    
    $Nombre=$row["Nombre"];
    $Apellido=$row["Apellido"];
    $Programa=$row["Programa"];
    $FchNacimiento= $row["FchNacimiento"];
    $LNacimiento= $row["LNacimiento"];
    $Direccion= $row["Direccion"];
    $CiudadE= $row["Ciudad"];
    $Barrio= $row["Barrio"]; 
    $Telefono= $row["Telefono"];
    $Celular= $row["Celular"];
    $Email= $row["Email"];
    $Genero= $row["Genero"];
    $EstadoCivil= $row["EstadoCivil"];
    //$Ocupacion= $row["Ocupacion"];
    $Fuente= $row["Fuente"];
    //nacionalidad
    //foto
    $fch=$row["Fch"];
    $estado=$row["Estado"];

    $sqlEdad = "CALL edad('$id')";
    //$sqlEdad="SELECT TIMESTAMPDIFF(YEAR, fchNAcimiento, CURDATE()) AS age from estudiante where  id='$id'";
    $statement = $conex->prepare($sqlEdad);
    $statement->execute();
    $rowAge = $statement->fetch(); // Use fetchAll() if you want all results, or just iterate over the statement, since it implements Iterator
    $Edad= $rowAge["age"];


    $sqlciudad="select municipio from municipios where id='$LNacimiento'";
    $statement = $conex->prepare($sqlciudad);
    $statement->execute();
    $rowCiudad = $statement->fetch(); // Use fetchAll() if you want all results, or just iterate over the statement, since it implements Iterator
    $LNacimiento= $rowCiudad["municipio"];


    $sqlciudad="select municipio from municipios where id='$CiudadE'";
    $statement = $conex->prepare($sqlciudad);
    $statement->execute();
    $rowCiudad = $statement->fetch(); // Use fetchAll() if you want all results, or just iterate over the statement, since it implements Iterator
    $ENacimiento= $rowCiudad["municipio"];

    $sqlPrograma="select Programa from programa where id='$Programa'";
    $statement = $conex->prepare($sqlPrograma);
    $statement->execute();
    $rowPrograma = $statement->fetch(); 
    $NombrePrograma= ($rowPrograma["Programa"]);

    //fuente
    //observacion
    //Campos de entrevistas
        $ProgramaAcademico=$row["ProgramaAcademico"];
        $Experiencia=$row["Experiencia"];
        $Virtual=$row["Virtual"];
        $UMB=$row["UMB"];
        $Financiacion=$row["Financiacion"];
        $Computadora=$row["Computadora"];
        $TIC=$row["TIC"];
    //academico
        $Tipo=$row["Tipo"];
        $Titulo=$row["Titulo"];
        $Institucion=$row["Institucion"];
        $FchEgreso=$row["FchEgreso"];
    //laboral
        $TipoT=$row["TipoT"];
        $InstitucionT=$row["InstitucionT"];            
        $FchInicio=$row["FchInicio"];
        $FchFinal=$row["FchFinal"];
        $telefonoT=$row["TelefonoT"];
        $CiudadT=$row["CiudadT"];
    //$TipoVinculacion=$row["TipoVinculacion"];
        $Cargo=$row["Cargo"];

            $sqlciudad="select municipio from municipios where id='$CiudadT'";
            $statement = $conex->prepare($sqlciudad);
            $statement->execute();
            $rowCiudad = $statement->fetch(); // Use fetchAll() if you want all results, or just iterate over the statement, since it implements Iterator
            $CiudadT= $rowCiudad["municipio"];

$hoy = date("Y-m-d");

$annoh = substr($hoy, -10, 4);
$mesh = substr($hoy, 5, 2);
$diah= substr($hoy, -2, 2);


$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

//$conex = conectaBaseDatos();

// create new PD,
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT,true, 'ISO-8859-1', false);

// set document information
// $pdf->SetCreator(PDF_CREATOR);
//$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('Admsiones umbvirtual.edu.co');
//$pdf->SetSubject('TCPDF Tutorial');
//$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, '');

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('helvetica', '', 12);

// add a page
$pdf->AddPage();


$fonts = array('times', 'dejavuserif');
//$alignments = array('L' => 'LEFT', 'C' => 'CENTER', 'R' => 'RIGHT', 'J' => 'JUSTIFY');

$html = 
'<html lang="es" class=" js">
<h4 align="center">Inscripción</h4><br>
Programa académico a aplicar:'.$NombrePrograma.'<br>
Fuente: '.$Fuente.'
<div align="justify">
<h4>Datos personales del Estudiante</h4><br>
<hr class="line"><br><br>
Identificacion: '.$TipoId.'  '.$Identificacion.'<br>
Nombre:  '.$Nombre.' '.$Apellido.' <br>
Fecha Nacimiento: '.$FchNacimiento.'<br>
Edad: '.$Edad.'<br>
Lugar de Nacimiento: '.$LNacimiento.'<br>
Direccion: '.$Direccion.'<br>
Ciudad: '.$ENacimiento.'<br>
Barrio: '.$Barrio.'<br>
Telefono: '.$Telefono.'  <br>
Celular: '.$Celular.'    <br>
Correo:  '.$Email.' <br>
Genero: '.$Genero.'  <br>
Estado Civil: '.$EstadoCivil.'<br>
<h4>Información Académica</h4><br>
<hr class="line"><br><br>
Nivel : '.$Tipo.'<br>
Titulo Obtenido: '.$Titulo.'<br>
Institución: '.$Institucion.'<br>
Fecha de Egresado: '.$FchEgreso.'<br>
<h4>Información laboral</h4>
<hr class="line"><br><br>
Tipo Contrato: '.$TipoT.'<br>
Intitucion: '.$InstitucionT.'<br>
Fecha de Inicio: '.$FchInicio.'
Fecha Final: '.$FchFinal.'<br>
Telefono: '.$telefonoT.'<br>
Ciudad: '.$CiudadT.'<br>
Cargo: '.$Cargo.'<br>
</html>'
;

$html2=
'
<html lang="es" class=" js">
<br><h4 align="center">Entrevista</h4><br>
<hr class="line"><br><br>
<h4><br><br>¿Cuáles fueron los motivos que te llevaron a escoger el programa acádemico seleccionado?</h4><br>'.$ProgramaAcademico.'<br><br>
<h4>¿Qué experiencia profesional tiene en el área correspondiente en el programa académico seleccionado?</h4><br>'.$Experiencia.'<br><br>
<h4>¿Por qué elegiste la metodología virtual?</h4><br>'.$Virtual.'<br><br>
<h4>¿Qué conoces de la universidad manuela beltrán?</h4><br>'.$UMB.'<br><br>
<h4>¿Cuál es tu fuente de financiación para estudiar?</h4><br>'.$Financiacion.'<br><br>
<h4>¿Cómo definirías tu nivel de conocimiento sobre el manejo de computadores?</h4><br>'.$Computadora.' <br><br>
<h4>¿Cómo definirías tu nivel de conocimiento en tecnología, información y la comunicación (TICS)?</h4> <br>'.$TIC.'<br>
</html>'

;



//$pdf->Write(0, $txt, '', 0, 'J', true, 0, false, false, 0);
$pdf->writeHTML($html, true, false, true, false, '');
$pdf->AddPage();
$pdf->writeHTML($html2, true, false, true, false, '');

$pdf->Ln(5);

$pdf->SetFont('times', '', 12);

// start transaction

// commit transaction (actually just frees memory)
$pdf->commitTransaction();

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('admisiones.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
