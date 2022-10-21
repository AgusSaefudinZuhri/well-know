<?php

require_once('tcpdf_include.php');
include('../../includes/config.php');

$pdf = new TCPDF('P', 'cm', array(8, 29.7), true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('B\'CoffeHouse');
$pdf->SetTitle('B\'CoffeHouse');
$pdf->SetSubject('B\'CoffeHouse');
$pdf->SetKeywords('B\'CoffeHouse');

// set default header data
//	$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 006', PDF_HEADER_STRING);

// set header and footer fonts
//$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
//$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
$pdf->SetPrintHeader(false);
$pdf->SetPrintFooter(false);	
// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins('.5cm', '.5cm', '.5cm');
//$pdf->SetHeaderMargin('0');
//$pdf->SetFooterMargin('0');

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, '1');

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('arialb', 'B', 8);

$pdf->SetFont('arial', '', 8);

$pdf->AddPage(); 

$echo='B\'Coffe House<br/>
Jl. XXXXXX Bandung<br/>
Telp. +62 22 xxxx xxxx<br/>
<br/>
<table>
<tr><td style="width: .8cm">Tgl.</td><td style="width: 2.5cm">:</td>
<td style="width: 1.2cm">Kasir</td><td style="width: 2.5cm">:</td></tr>
<tr><td style="width: .8cm">Jam</td><td style="width: 2.5cm">:</td>
<td style="width: 1.2cm">No. Struk</td><td style="width: 2.5cm">:</td></tr>
</table><br/>
<table>
<tr >
<td >Artikel</td><td>Harga</td><td>Jml</td><td>Jumlah</td>


</table><br/>
<br/>
* Terima Kasih atas Kunjungan Anda *<br/>
<br/>
PERHATIAN:<br/>
Barang-barang yang sudah dikembalikan tidak dapat ditukar atau dikembalikan
';



$pdf->writeHTML(utf8_encode($echo), true, 0, true, 0);
 

// reset pointer to the last page

$pdf->lastPage();
	
//echo 'dodol';

$pdf->Output('B_COFFEHOUSE.pdf', 'I');

