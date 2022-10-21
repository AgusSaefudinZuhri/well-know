<?php
require_once('tcpdf_include.php');
include('../../includes/config.php');

$dr=explode("/",$_GET["dari"]);
$sp=explode("/",$_GET["sampai"]);
$dari=$dr[2].'-'.$dr[0].'-'.$dr[1];
$sampai=$sp[2].'-'.$sp[0].'-'.$sp[1];

if($_GET["jns"]=='0') $where=""; else $where=" AND jenis='".$_GET["jns"]."'";
$qry1=mysql_query("
	SELECT a.*, b.nminstansi, c.nmukerja, d.masalah, e.nmmedia 
	FROM e_arsip a 
	LEFT JOIN e_instansi b ON a.instansiid=b.id 
	LEFT JOIN e_ukerja c ON a.unitid=c.id 
	LEFT JOIN e_masalah d ON a.masalahid=d.id 
	LEFT JOIN e_marsip e ON a.jenis=e.id 	
	WHERE pemberkasan='1' AND masukdt BETWEEN '".$dari."' AND '".$sampai."' ".$where." ORDER BY masukdt ASC");

/*echo "
	SELECT a.*, b.nminstansi, c.nmukerja, d.masalah 
	FROM e_arsip a 
	LEFT JOIN e_instansi b ON a.instansiid=b.id 
	LEFT JOIN e_ukerja c ON a.unitid=c.id 
	LEFT JOIN e_masalah d ON a.masalahid=d.id 
	WHERE masukdt BETWEEN '".$_GET["dari"]."' AND '".$_GET["sampai"]."' ".$where." ORDER BY masukdt ASC";*/
$pdf = new TCPDF('L', 'cm', array(21, 29.7), true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Aplikasi E-Arsip - Dinas Bangunan Kabupaten Bekasi');
$pdf->SetTitle('Aplikasi E-Arsip - Dinas Bangunan Kabupaten Bekasi');
$pdf->SetSubject('Aplikasi E-Arsip - Dinas Bangunan Kabupaten Bekasi');
$pdf->SetKeywords('Aplikasi E-Arsip - Dinas Bangunan Kabupaten Bekasi');

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
	<tr style="background: #CCCCCC;">
<td rowspan="2" width="50" style="text-align:center;">No</td>
<td rowspan="2" width="75" style="text-align:center;">Bentuk Arsip</td>
<td rowspan="2" width="75" style="text-align:center;">Kode Arsip</td>
<td rowspan="2" width="185" style="text-align:center;">Instansi</td>
<td rowspan="2" width="185" style="text-align:center;">Unit</td>
<td rowspan="2" width="180" style="text-align:center;">Masalah</td>
<td width="250" style="text-align:center;" colspan="5">Lokasi</td>

</tr>

<tr style="background: #CCCCCC;">
<td width="50" style="text-align:center;">Gedung</td>
<td width="50" style="text-align:center;">Ruang</td>
<td width="50" style="text-align:center;">Rak</td>
<td width="50" style="text-align:center;">Boks</td>
<td width="50" style="text-align:center;">Sampul</td>
</tr>
';
$x=1;
	while($row=mysql_fetch_array($qry1)) {
	$echo.= '
<tr >
<td style="text-align:center;">'.$x.'</td>
<td style="text-align:left;">'.$row["nmmedia"].'</td>
<td style="text-align:left;">'.$row["kode"].'</td>
<td style="text-align:left;">'.$row["nminstansi"].'</td>
<td style="text-align:left;">'.$row["nmukerja"].'</td>
<td style="text-align:left;">'.$row["masalah"].'</td>
<td style="text-align:center;">'.$row["gedungid"].'</td>
<td style="text-align:center;">'.$row["ruangid"].'</td>
<td style="text-align:center;">'.$row["rakid"].'</td>
<td style="text-align:center;">'.$row["boksid"].'</td>
<td style="text-align:center;">'.$row["sampulid"].'</td>
</tr>
';
$x++;
//echo $echo;
	}
$echo=$echo.'</table>';
$echo='LAPORAN PEMBERKASAN ARSIP <br/>APLIKASI E-ARSIP<br/>DINAS BANGUNAN KABUPATEN BEKASI<br/><br/>'.$echo;
$pdf->writeHTML(utf8_encode($echo), true, 0, true, 0);
 

// reset pointer to the last page

$pdf->lastPage();
	
//echo 'dodol';
$js = 'print(true);';
$pdf->IncludeJS($js);
$pdf->Output('LAPORAN ARSIP MASUK '.date('Ymd').'.pdf', 'I');

