<?php
require_once('tcpdf_include.php');
include('../../includes/config.php');

$mrow=mysqli_fetch_array(mysqli_query("
	SELECT a.*, b.nmtujuanw, b.hari, b.malam, b.airportid, c.nmairport FROM g_berangkat a
	LEFT JOIN g_tujuanw b ON a.tujuanid=b.id
	LEFT JOIN g_airport c ON b.airportid=c.kdairport
	WHERE a.id='".$_GET["id"]."'"));
if($mrow["status"]=='99') $where0= ""; else $where0=" a.status!='99' AND ";

$qry=mysqli_query("
	SELECT a.*, b.nmmaskapai bmaskapainm, c.nmmaskapai pmaskapainm, d.nmairport bnmairport, e.nmairport pnmairport
	FROM g_brgdetail a 
	LEFT JOIN g_maskapai b ON a.bmaskapai=b.id
	LEFT JOIN g_maskapai c ON a.pmaskapai=c.id
	LEFT JOIN g_airport d ON a.bdari=d.kdairport
	LEFT JOIN g_airport e ON a.pke=e.kdairport
	WHERE ".$where0." a.berangkatid='".$_GET["id"]."'");

$pdf = new TCPDF('L', 'cm', array(21, 29.7), true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Golden Wisata');
$pdf->SetTitle('Daftar Transfer Kartu - Golden Wisata');
$pdf->SetSubject('Daftar Transfer Kartu - Golden Wisata');
$pdf->SetKeywords('Daftar Transfer Kartu - Golden Wisata');

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
$pdf->SetMargins('1cm', '1cm', '1cm');
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
	$echo='
	<table cellpadding="5" cellspacing="0" border="1">
	<tr style="background: #cccccc;">
<td style="width: 25; text-align:center;">No</td>
<td style="width: 75; text-align:center;">ID Member</td>
<td style="width: 250; text-align:center;">Data Peserta</td>
<td style="width: 300; text-align:center;">Data Keberangkatan</td>
<td style="width: 300; text-align:center;">Data Kepulangan</td>
</tr>
';
$x=1;
	while($row=mysqli_fetch_array($qry)) {
	$echo.= '
<tr >
<td style="text-align:left;">'.$x.'</td>
<td style="text-align:left;">'.$row["memberid"].'</td>
<td style="text-align:left;">'.$row["fsalutation"].' '.$row["nmpeserta"].'<br/>
HP: '.$row["nohp"].'</td>
<td style="text-align:left;">'.$row["bmaskapainm"].' - '.$row["bflight"].'<br/>
'.$row["bdepart"].' - '.$row["barival"].'<br/>
Dari: '.$row["bdari"].' - '.$row["bnmairport"].'
</td>
<td style="text-align:left;">'.$row["pmaskapainm"].' - '.$row["pflight"].'<br/>
'.$row["pdepart"].' - '.$row["parival"].'<br/>
Ke: '.$row["pke"].' - '.$row["pnmairport"].'
</td>
</tr>
';
$x++;
//echo $echo;
	}
$echo=$echo.'</table>';

$echo='DATA KEBERANGKATAN<br/>
TUJUAN WISATA:'.$mrow["nmtujuanw"].' - '.$mrow["hari"].'D/'.$mrow["malam"].'N<br/>
BANDARA:'.$mrow["airportid"].' - '.$mrow["nmairport"].'<br/>
TANGGAL:'.date('d M Y', strtotime($mrow["tglberangkat"])).' - '.date('d M Y', strtotime($mrow["tglpulang"])).'<br/>DEADLINE REGISTRASI:'.date('d M Y', strtotime($mrow["ddline"])).'<br/><br/>'.$echo;
$pdf->writeHTML(utf8_encode($echo), true, 0, true, 0);
 

// reset pointer to the last page

$pdf->lastPage();
	
//echo 'dodol';
$js = 'print(true);';
// $pdf->IncludeJS($js);
$pdf->Output('DAFTAR TRANSFER KARTU '.$rowx["transferid"].' '.date('Ymd').'.pdf', 'I');

