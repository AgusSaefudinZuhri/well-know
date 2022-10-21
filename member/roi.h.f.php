<?php 

	include_once('includes/config.php'); 

	$perpage = 1000;
	$limit	= " ORDER BY a.masake ASC";
	if(isset($_GET["pg"])) $limit	.= " LIMIT ".(($_GET["pg"]-1)*$perpage).",".$perpage; 
	else $limit	.= " LIMIT 0,".$perpage;
	
	$where	= "";
	
/*
	if(isset($_GET["pf"]) and isset($_GET["vf"])) $yearmonth = $_GET["vf"].'-'.$_GET["pf"].'-01';
	else $yearmonth = date('Y').'-'.date('m').'-01';
	
	$dbegin = date('Y-m-01', strtotime($yearmonth));
	$dend	= date('Y-m-t', strtotime($yearmonth));
	
	$where .=" HAVING tglproses BETWEEN '".$dbegin."' AND '".$dend."'";
*/	

	$mTxt = "SELECT * FROM g_member WHERE userid='".$_SESSION["userid"]."'";
	$mQry = mysql_query( $mTxt );
	$mRow = mysql_fetch_array( $mQry );

	$crTxt = "SELECT * FROM g_wfund WHERE useridx='buypackage' AND userid='".$_SESSION["userid"]."' ORDER BY id ASC";
	$crQry = mysql_query( $crTxt );
	$crRow = mysql_fetch_array( $crQry );
	$tglmulai = $crRow["tglinput"];
	
	$pTxt = "
		SELECT a.*, IFNULL( b.jbelum, '0' ) jbelum, IFNULL( b.jsudah, '0' ) jsudah, c.nmjpackage
		FROM g_kontrak a 
		LEFT JOIN ( SELECT kontrakid, SUM(IF(status='0', trxvalue, '0')) jbelum, SUM(IF(status='1', trxvalue, '0')) jsudah
				FROM g_roiplan GROUP BY kontrakid ) b ON b.kontrakid = a.id
		LEFT JOIN g_jpackage c ON a.jpackage = c.id
		WHERE a.id='".$mRow['kontrakid']."'";
//	echo nl2br( $pTxt );
	$pQry = mysql_query( $pTxt );
	$pRow = mysql_fetch_array( $pQry );
	$nmjpackage = $pRow["nmjpackage"];
/*
	$hargavl = $pRow["hargavl"];
	$prc  	 = $pRow["roimonthprc"];
	$profit  = $pRow["hargavl"] * ( $prc / 100 );
	$status  = 0;
	*/


?>
<input type="hidden" id="pg" value="<?php if(isset($_GET["pg"])) echo $_GET["pg"]; else echo "1";?>" />
<div class="mwrapper" style="padding-top: 5px;">
<table class="xuser" style="width: 100%; min-width: 300px;">
<tr class="tHeader" >
<td style="width:  25px !important; text-align:center;"><?php echo T_("No");?></td>
<td style="width: 100px; text-align:center;"><?php echo T_("Unrealized Profit");?></td>
<td style="width: 100px; text-align:center;"><?php echo T_("Realized Profit");?></td>
<td style="width: 50px; text-align:center;"><?php echo T_("Private Investment Agreement");?></td>
</tr>
<tr >

<td style="width:  25px !important; text-align:center;">1</td>

<td style="width: 100px; text-align:center;"><?php echo $syscurrency." ".number_format( $pRow["jbelum"] );?></td>
<td style="width: 100px; text-align:center;"><?php echo $syscurrency." ".number_format( $pRow["jsudah"] );?></td>
<td style="width: 50px; text-align:center;"><a href="javascript: void(0);" onclick="window.open('../legal/OTM_CAPITAL_PRIVATE_FUND_MANAGEMENT_AGREEMENT__No_Signature_Required_.pdf', '_blank')"><i class="fa fa-file-pdf-o"> </i></a></td>
</tr>

</table>
<br/><br/>
<table class="xuser" style="width: 100%; min-width: 300px;">
<tr class="tHeader" >
<td style="width:  25px !important; text-align:center;"><?php echo T_("No");?></td>
<td style="width: 100px; text-align:center;"><?php echo T_("Performance Date");?></td>
<td style="width: 100px; text-align:center;"><?php echo T_("Package");?></td>
<td style="width: 50px; text-align:center;"><?php echo T_("Performance");?></td>
<td style="width: 100px; text-align:center;"><?php echo T_("Total Profit");?></td>
<td style="width: 100px; text-align:center;"><?php echo T_("Type");?></td>
</tr>

<?php 
$tqry="
	SELECT 
		a.*, b.nmjpackage
	FROM g_roiplan a
	LEFT JOIN g_jpackage b ON a.jpackage = b.id
	WHERE a.kontrakid =  '".$mRow['kontrakid']."' ";
	//.$where;

$qry0=mysql_query($tqry);

$pages=ceil(mysql_num_rows($qry0)/$perpage);

$qry=mysql_query($tqry.$limit);

// echo $tqry.$limit;

if(isset($_GET["pg"])) $x=($_GET["pg"]-1)*$perpage+1; else $x=1;

while($row=mysql_fetch_array($qry)) { 


?>
<tr class="tContent <?php if(($x-1)%2) echo 'genap';?>" style=" <?php // if($row["jtransaksi"]=='1') echo 'font-style: italic; color: red;';?>" >
<td style="text-align:center;"><?php echo $x; ?></td>
<td style="text-align:center;"><?php echo date('d M Y', strtotime($row["tglcair"])); ?></td>
<td style="text-align:center;"><?php echo  $nmjpackage ;?></td>

<td style="text-align:center;"><?php echo number_format( $row["trxprc"] );?>%</td>
<td style="text-align:center;"><?php echo $syscurrency." ".number_format( $row["trxvalue"] );?></td>

<td style="text-align:center;"><?php switch( $row["status"] ) {
	case "0" : echo '<span style="" class="label label-warning" >Pending</span>'; break;
	case "1" : echo '<span style="" class="label label-success" >Received</span>'; break;
}?></td>


</tr>
<?php $x++; } ?>
</table>
</div>
<div class="pagez"><?php include('pagez.php'); ?></div>