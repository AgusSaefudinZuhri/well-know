<?php
require_once('tcpdf_include.php');
include('../../includes/config.php');

$dr=explode("/",$_GET["dari"]);
$sp=explode("/",$_GET["sampai"]);
$dari=$dr[2].'-'.$dr[0].'-'.$dr[1];
$sampai=$sp[2].'-'.$sp[0].'-'.$sp[1];

if($_GET["jns"]=='0') $where=""; else $where=" AND jenis='".$_GET["jns"]."'";
$qry1=mysqli_query("
	SELECT a.*, b.nminstansi, c.nmukerja, d.masalah, e.nmmedia 
	FROM e_arsip a 
	LEFT JOIN e_instansi b ON a.instansiid=b.id 
	LEFT JOIN e_ukerja c ON a.unitid=c.id 
	LEFT JOIN e_masalah d ON a.masalahid=d.id 
	LEFT JOIN e_marsip e ON a.jenis=e.id 	
	WHERE musnah='1' AND mdate BETWEEN '".$dari."' AND '".$sampai."' ".$where." ORDER BY masukdt ASC");

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
	<tr style="background: #cccccc;">
<td width="50" style="text-align:center;">No</td>
<td width="75" style="text-align:center;">Bentuk Arsip</td>
<td width="75" style="text-align:center;">Kode Arsip</td>
<td width="150" style="text-align:center;">Instansi</td>
<td width="150" style="text-align:center;">Unit</td>
<td width="150" style="text-align:center;">Masalah</td>
<td width="75" style="text-align:center;">Tgl. Musnah</td>
<td width="75" style="text-align:center;">Mengetahui</td>
<td width="100" style="text-align:center;">Catatan</td>
<td width="100" style="text-align:center;">Status</td>
</tr>
';
$x=1;
	while($row=mysqli_fetch_array($qry1)) {
	switch($row["status"]) {
	case "1": $status="Disimpan dan Dimusnahkan"; break;	
	case "2": $status="Disimpan Permanen"; break;	
	case "3": $status="Dinilai Kembali"; break;	
		
	}
	$echo.= '
<tr >
<td style="text-align:center;">'.$x.'</td>
<td style="text-align:left;">'.$row["nmmedia"].'</td>
<td style="text-align:left;">'.$row["kode"].'</td>
<td style="text-align:left;">'.$row["nminstansi"].'</td>
<td style="text-align:left;">'.$row["nmukerja"].'</td>
<td style="text-align:left;">'.$row["masalah"].'</td>
<td style="text-align:center;">'.date('d M Y', strtotime($row["mdate"])).'</td>
<td style="text-align:left;">'.$row["mpic"].'</td>
<td style="text-align:left;">'.$row["mcat"].'</td>
<td style="text-align:center;">'.$status.'</td>
</tr>
';
$x++;
//echo $echo;
	}
$echo=$echo.'</table>';
$echo='LAPORAN PEMUSNAHAN ARSIP<br/>APLIKASI E-ARSIP<br/>DINAS BANGUNAN KABUPATEN BEKASI<br/><br/>'.$echo;
$pdf->writeHTML(utf8_encode($echo), true, 0, true, 0);
 

// reset pointer to the last page

$pdf->lastPage();
	
//echo 'dodol';
$js = 'print(true);';
$pdf->IncludeJS($js);
$pdf->Output('LAPORAN ARSIP MASUK '.date('Ymd').'.pdf', 'I');

