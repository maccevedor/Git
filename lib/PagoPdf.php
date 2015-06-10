<?php

//============================================================+
// File name   : example_047.php
// Begin       : 2009-03-19
// Last Update : 2013-05-14
//
// Description : Example 047 for TCPDF class
//               Transactions
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Transactions
 * @author Nicola Asuni
 * @since 2009-03-19
 */

// Include the main TCPDF library (search for installation path).
require_once('tcpdf/examples/tcpdf_include.php');
require_once('tcpdf/tcpdf.php');
require_once("../modelo/conexion.php");
require_once("../modelo/funciones.php");



$persona=$_REQUEST['persona'];
$idPersona= $_REQUEST['idPersona'];  
$fchPago = $_REQUEST['fchPago']; 
$fecha = $fchPago;
$hoy = date("Y-m-d");

$anno = substr($fecha, -10, 4);
$mes = substr($fecha, 5, 2);
$dia = substr($fecha, -2, 2);

$annoh = substr($hoy, -10, 4);
$mesh = substr($hoy, 5, 2);
$diah= substr($hoy, -2, 2);


$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");


$banco = $_REQUEST['banco'];

$tipoPago = $_REQUEST['tipoPago'];  
$cuenta = $_REQUEST['cuenta']; 
$identificacion = $_REQUEST['identificacionP'];
$nombreP = $_REQUEST['nombreP'];

$valor = $_REQUEST['valor']; 
$programaP = $_REQUEST['programaP']; 
$ciudadP = $_REQUEST['ciudadP']; 
$tipoCuenta = $_REQUEST['tipoCuenta']; 
$valorTexto = numtoletras($valor);

$conex = conectaBaseDatos();

$sql="select programa from programa where id='$programaP'";
//$nombrePrograma=mysql_fetch_array(mysql_query($sql,$conexion));
//$nombre = $nombrePrograma[0];
$statement = $conex->prepare($sql);
    $statement->execute();
    $row = $statement->fetch(); // Use fetchAll() if you want all results, or just iterate over the statement, since it implements Iterator
    $nombre= $row["programa"];



$sql="select municipio from municipios where id='$ciudadP'";
//$nombreCiudad=mysql_fetch_array(mysql_query($sql,$conexion));
//$ciudad =$nombreCiudad[0];
$statement = $conex->prepare($sql);
$statement->execute();
$row = $statement->fetch(); // Use fetchAll() if you want all results, or just iterate over the statement, since it implements Iterator
$ciudad= $row["municipio"];



/*
class MYPDF extends TCPDF {

    //Page header
    public function Header() {
        // Logo
        // $image_file = K_PATH_IMAGES.'logo_example.jpg';
        // $this->Image($image_file, 10, 10, 15, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font
        // $this->SetFont('helvetica', 'B', 20);
        // Title
        // $this->Cell(0, 15, '<< TCPDF Example 003 >>', 0, false, 'C', 0, '', 0, false, 'M', 'M');
    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-18);
        // Set font
        $this->SetFont('helvetica', '', 6);
        // Texto pie
        
        $texto_pie_1 = (' Copyright © UMBVirtual 2014');
        $texto_pie_2 = ('Km. 27 via Cajicá  (+57 1) 546 0600 Ext 1470 - 1471 Fax: (+57 1) 282 6197 Cajicá, Colombia');
        $texto_pie_3 = utf8_encode('');
        $texto_pie_4 = utf8_encode('');
        
        $this->Cell(0, 10, $texto_pie_1, 0, false, 'C', 0, '', 0, false, 'T', 'M');
        $this->SetY(-15.5);
        $this->Cell(0, 10, $texto_pie_2, 0, false, 'C', 0, '', 0, false, 'T', 'M');
        $this->SetY(-13);
        $this->Cell(0, 10, $texto_pie_3, 0, false, 'C', 0, '', 0, false, 'T', 'M');
        $this->SetY(-10.5);
        $this->Cell(0, 10, $texto_pie_4, 0, false, 'C', 0, '', 0, false, 'T', 'M');
        
        // Numero de Pagina
        $pagina = utf8_encode('2014 - UMBApps - UMB Virtual | Página:');
        $this->Cell(0, 10,  ' ', 0, false, 'C', 0, '', 0, false, 'T', 'M');
        
        //Codigo QR
        // set style for barcode
        $style = array(
    'border' => false,
    'padding' => 0,
            'bgcolor' => false, //array(255,255,255)
            'module_width' => 1, // width of a single module in points
            'module_height' => 1 // height of a single module in points
        );
        // QRCODE,L : QR-CODE Low error correction
        $url = 'http://localhost/umbapps/registros/controladores/pdf.crear_historico_estudioso.php?';
        //$this->write2DBarcode($url, 'QRCODE,L', 10, 270, 20, 20, $style, 'N');        
        }
}*/



// create new PDF document
//$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);




// create new PD,
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT,true, 'ISO-8859-1', false);

// set document information
// $pdf->SetCreator(PDF_CREATOR);
//$pdf->SetAuthor('Nicola Asuni');
//$pdf->SetTitle('FORMATO DE AUTORIZACION DE TRANSACCION ELECTRONICA');
//$pdf->SetSubject('TCPDF Tutorial');
//$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, 'FORMATO DE AUTORIZACION DE TRANSACCION ELECTRONICA');

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
$pdf->SetFont('helvetica', '', 16);

// add a page
$pdf->AddPage();


$fonts = array('times', 'dejavuserif');
//$alignments = array('L' => 'LEFT', 'C' => 'CENTER', 'R' => 'RIGHT', 'J' => 'JUSTIFY');

$html = 
'<html lang="es" class=" js">
Señores:<br>
Universidad Manuela Beltrán<br>
Dirección financiera<br>
Fecha:  '.$diah.' de  '.$meses[(intval($mesh))-1].' del año '.$annoh.'<br>
<div align="justify">
Yo, '.$persona.' identificado(a) con documento de identidad número '.$idPersona.' expedido en '.$ciudad.'
certifico que el día  '.$dia.' del mes '.$meses[(intval($mes))-1].' del año '.$anno.', autorice el cargo a mi :<br><br>

'.$tipoCuenta.' No. '.$cuenta.'<br>
del Banco o al Red '.$banco.'<br><br>
Por el valor de '.$valorTexto.' ($'.$valor.') para el pago de '.$nombreP.',
identificado(a) con documento de identidad número '.$identificacion.' en el programa de programa de '.$nombre.' en la 
UNIVERSIDAD MANUELA BELTRAN.<br><br>
Cordialmente,<br><br><br><br><br><br>

Firma:  ___________________________	 Huella:  ____________<br><br>
																						   			
<h6>Favor adjuntar copia del documento de identidad del titular</h6>       
</html>'
;


//$pdf->Write(0, $txt, '', 0, 'J', true, 0, false, false, 0);
$pdf->writeHTML($html, true, false, true, false, '');

$pdf->Ln(5);

$pdf->SetFont('times', '', 12);

// start transaction

// commit transaction (actually just frees memory)
$pdf->commitTransaction();

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('FormatoAutorizacionTransaccion.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+

?>