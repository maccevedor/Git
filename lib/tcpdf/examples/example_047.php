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
require_once('tcpdf_include.php');
require_once("../../../modelo/conexion.php");


// $field = 'ValorTexto';
// $sql = mysql_query("SELECT $field FROM pago WHERE  id='1';");
// $res = mysql_query($sql,$conexion) or die(mysql_error()) ; 
// $retval = mysql_fetch_object($sql)->$field;



$persona=$_REQUEST['persona'];
$idPersona= $_REQUEST['idPersona']; 
//$programa= $_REQUEST['programa']; 
$ciudad = 'bucaramanga';  
$fchPago = $_REQUEST['fchPago']; 
$hoy = date("d/m/Y");
$valorTexto = 'veinte mil';
$banco = $_REQUEST['banco'];
$tipoPago = $_REQUEST['tipoPago'];  
$cuenta = $_REQUEST['cuenta']; 
$identificacion = $_REQUEST['identificacionP']; 
$valor = $_REQUEST['valor']; 


// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

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

$txt = 'Señores 
Universidad Manuela Beltran
Direccion Financiera 

Fecha:'.$hoy.'

Yo '.$persona.' identifido(a)
con documento de identidad numero '.$idPersona.' expedido en '.$ciudad.'
autorice el cargo a mi :

CUENTA No '.$cuenta.' del Banco '.$banco.'

Por el Valor de '.$valorTexto.' ($'.$valor.') para el pago de '.$tipoPago.'
 identificado(a) con documento de identidad numero '.$identificacion.' en el programa de PROGRAMA 
 
UNIVERSIDAD MANUELA BELTRAN
 
 
Cordialmente
 
 

Firma:  ___________________________

Nombre: ___________________________                                                   




Huella: __________';
$pdf->Write(0, $txt, '', 0, 'L', true, 0, false, false, 0);

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
