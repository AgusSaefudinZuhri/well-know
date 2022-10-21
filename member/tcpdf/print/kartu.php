<?php
require_once('tcpdf_include.php');
include('../../includes/config.php');

$rowx	= mysqli_fetch_array(mysqli_query("SELECT * FROM g_jmember WHERE id='".$_GET["id"]."'"));


//echo "SELECT a.*, b.nmjmember FROM g_transfer a LEFT JOIN g_jmember b ON a.jmember=b.id WHERE a.id='".$_GET["id"]."'";

$qry1=mysqli_query("
	SELECT * FROM g_card WHERE posisi='".$_SESSION["userid"]."' AND status='0' AND jmember='".$_GET["id"]."'");

$pdf = new TCPDF('P', 'cm', array(21, 29.7), true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor($namaperusahaan);
$pdf->SetTitle('Stok ePIN - '.$namaperusahaan);
$pdf->SetSubject('Stok ePIN - '.$namaperusahaan);
$pdf->SetKeywords('Stok ePIN - '.$namaperusahaan);

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
<td width="50" style="text-align:center;">No</td>
<td width="200" style="text-align:center;">Serial/PIN</td>
<td width="200" style="text-align:center;">ID Member</td>
</tr>
';
$x=1;
	while($row=mysqli_fetch_array($qry1)) {
	$echo.= '
<tr >
<td style="text-align:center;">'.$x.'</td>
<td style="text-align:left;">'.$row["serial"].'</td>
<td style="text-align:left;">'.$row["memberid"].'</td>
</tr>
';
$x++;
//echo $echo;
	}
$echo=$echo.'</table>';

$echo='DAFTAR KARTU<br/>Jenis Member:'.$rowx["nmjmember"].'<br/>'.$echo;
$pdf->writeHTML(utf8_encode($echo), true, 0, true, 0);
 

// reset pointer to the last page

$pdf->lastPage();
	
//echo 'dodol';
$js = 'print(true);';
// $pdf->IncludeJS($js);
$pdf->Output('STOK ePIN '.$_SESSION["userid"].' '.date('Ymd').'.pdf', 'I');

