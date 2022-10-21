<?php
require_once('tcpdf_include.php');
include_once('../../includes/config.php');

$rowx	= mysqli_fetch_array(mysqli_query("SELECT a.* FROM g_transfer a WHERE a.id='".$_GET["id"]."'"));
//echo "SELECT a.* FROM g_transfer a  a.id='".$_GET["id"]."'";
//echo "SELECT a.*, b.nmjmember FROM g_transfer a LEFT JOIN g_jmember b ON a.jmember=b.id WHERE a.id='".$_GET["id"]."'";

$qry1=mysqli_query("
	SELECT * FROM g_card WHERE transferid='".$_GET["id"]."'");

$pdf = new TCPDF('P', 'cm', array(21, 29.7), true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor($namaperusahaan);
$pdf->SetTitle(T_("Transfer History").' - '.$namaperusahaan);
$pdf->SetSubject(T_("Transfer History").' - '.$namaperusahaan);
$pdf->SetKeywords(T_("Transfer History").' - '.$namaperusahaan);

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
<td width="50" style="text-align:center;">'.T_("No").'</td>
<td width="200" style="text-align:center;">'.T_("Serial").'</td>
</tr>
';
$x=1;
	while($row=mysqli_fetch_array($qry1)) {
	$echo.= '
<tr >
<td style="text-align:center;">'.$x.'</td>
<td style="text-align:left;">'.$row["serial"].'</td>
</tr>
';
$x++;
//echo $echo;
	}
$echo=$echo.'</table>';

$echo=T_("Transfer History").'<br/>'.T_("Transfer ID").':'.$rowx["transferid"].'<br/>'.T_("Transfered to").':'.$rowx["userid"].'<br/>'.T_("Date").':'.date('d M Y', strtotime($rowx["tgltransfer"])).'<br/>'.T_("Quantity").':'.str_replace(",", ".", number_format($rowx["jumlah"])).' '.T_("ePINs").'<br/>'.$echo;
$pdf->writeHTML(utf8_encode($echo), true, 0, true, 0);
 

// reset pointer to the last page
//echo $echo;

$pdf->lastPage();
	
//echo 'dodol';
$js = 'print(true);';
// $pdf->IncludeJS($js);
$pdf->Output('DAFTAR TRANSFER KARTU '.$rowx["transferid"].' '.date('Ymd').'.pdf', 'I');

