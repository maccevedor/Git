<?php


require_once('../lib/tcpdf/examples/tcpdf_include.php');
require_once('../lib/tcpdf/tcpdf.php');
require_once("../modelo/conexion.php");


$id = intval($_REQUEST['id']);
echo $id;
exit();

$conex = conectaBaseDatos();

$sql="select estudiante from programa where Id='$id'";
$statement = $conex->prepare($sql);
    $statement->execute();
    $row = $statement->fetch(); // Use fetchAll() if you want all results, or just iterate over the statement, since it implements Iterator
    $nombre= $row["TipoId"];




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
programa de '.$nombre.' en la 
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