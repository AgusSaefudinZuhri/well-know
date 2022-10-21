<?php
session_start();
require_once('tcpdf_include.php');
include('../../includes/config.php');

$qry1=mysqli_query("select a.*, b.menu_name,  b.harga, (a.qty*b.harga) jml from t_detail a left join menu b on a.menu_id=b.id where a.parent='".$_GET["id"]."' order by a.id ASC");

$qrz=mysqli_fetch_array(mysqli_query("select * from t_order where id=".$_GET["id"]));


$jrow=mysqli_num_rows($qry1);


$pdf = new TCPDF('P', 'cm', array(8, (9+($jrow*.8))), true, 'UTF-8', false);

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

//echo "select a.*, b.menu_name from t_detail a left join menu b on a.menu_id=b.id where parent='".$qry["id"]."' order by id ASC";
	$subtotal1=0;
	$jitem=0;
	$echo='';
	while($rowx=mysqli_fetch_array($qry1)) {
	$echo.= '<tr>
<td style="text-align: left;">'.sprintf('%06d',$rowx["id"]).'</td>
<td style="text-align: right;">'.number_format($rowx["harga"]).'</td>
<td style="text-align: center;">'.number_format($rowx["qty"]).'</td>
<td style="text-align: right;">'.number_format($rowx["jml"]).'</td>
</tr>

<tr>
<td style="text-align: left;" colspan="4">'.$rowx["menu_name"].'</td>
</tr>
';
$jitem=$jitem+$rowx["qty"];
$subtotal1=$subtotal1+$rowx["jml"];
//echo $echo;
	}

$diskon = $qrz["diskon"];
$diskon_v=$subtotal1* ($diskon/100);
$pajak = ($subtotal1 - $diskon_v)*.1;
$total = $subtotal1 - $diskon_v + $pajak;

$echo='B\'Coffe House<br/>
Jl. XXXXXX Bandung<br/>
Telp. +62 22 xxxx xxxx<br/>
<br/>
<table>
<tr><td style="width: .8cm">Tgl.</td><td style="width: 2.5cm">: '.date('d/m/Y').'</td>
<td style="width: 1.2cm">Kasir</td><td style="width: 2.5cm">: '.$_SESSION['nama'].'</td></tr>
<tr><td style="width: .8cm">Jam</td><td style="width: 2.5cm">: '.date('H:i').'</td>
<td style="width: 1.2cm">No. Struk</td><td style="width: 2.5cm">: '.date('Ymd', strtotime($qrz["start_dtm"])).sprintf('%06d',$_GET["id"]).'</td></tr>
</table><br/>
<br/>
<table>
<tr>
<td style="border-top: 1px solid #000;border-bottom: 1px solid #000; width: 2cm;text-align: center;">Artikel</td>
<td style="border-top: 1px solid #000;border-bottom: 1px solid #000; width: 2cm;text-align: center;">Harga</td>
<td style="border-top: 1px solid #000;border-bottom: 1px solid #000; width: 1cm;text-align: center;">Jml</td>
<td style="border-top: 1px solid #000;border-bottom: 1px solid #000; width: 2cm;text-align: center;">Jumlah</td>
</tr>'.$echo.'

<tr>
<td style="border-top: 1px solid #000;text-align: right;" colspan="3">Jml. Item: '.$jitem.' pcs</td>
<td style="border-top: 1px solid #000;width: 2cm;text-align: center;"></td>
</tr>

<tr>
<td style="text-align: right;" colspan="3">Subtotal</td>
<td style="width: 2cm;text-align: right;">'.number_format($subtotal1).'</td>
</tr>

<tr>
<td style="text-align: right;" colspan="3">Diskon '.number_format($diskon).'%</td>
<td style="width: 2cm;text-align: right;">'.number_format($diskon_v).'</td>
</tr>

<tr>
<td style="text-align: right;" colspan="3">Pajak</td>
<td style="width: 2cm;text-align: right;">'.number_format($pajak).'</td>
</tr>

<tr>
<td style="text-align: right;" colspan="3">TOTAL</td>
<td style="width: 2cm;text-align: right;">'.number_format($total).'</td>
</tr>

</table><br/>
<br/>
* Terima Kasih atas Kunjungan Anda *<br/>
<br/>
PERHATIAN:<br/>
Barang-barang yang sudah dikembalikan tidak dapat ditukar atau dikembalikan
';

//echo $echo;

$pdf->writeHTML(utf8_encode($echo), true, 0, true, 0);
 

// reset pointer to the last page

$pdf->lastPage();
	
//echo 'dodol';
$js = 'print(true);';
$pdf->IncludeJS($js);
$pdf->Output('B_COFFEHOUSE.pdf', 'I');

