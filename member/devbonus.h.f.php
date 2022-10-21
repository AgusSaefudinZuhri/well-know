<?php 

	include_once('includes/config.php'); 

	$limit	= " ORDER BY tglproses DESC, waktuproses DESC";
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

?>
<input type="hidden" id="pg" value="<?php if(isset($_GET["pg"])) echo $_GET["pg"]; else echo "1";?>" />
<div class="mwrapper" style="padding-top: 5px;">
<table class="xuser" style="width: 100%; min-width: 300px;">
<tr class="tHeader" >
<td style="width:  25px !important; text-align:center;"><?php echo T_("No");?></td>
<td style="width: 100px; text-align:center;"><?php echo T_("Position (Left)");?></td>
<td style="width: 100px; text-align:center;"><?php echo T_("Position (Right)");?></td>
<td style="width: 100px; text-align:center;"><?php echo T_("Net Pairing");?></td>
<td style="width: 50px; text-align:center;">%</td>
<td style="width: 100px; text-align:center;"><?php echo T_("Commision Earned");?></td>
<td style="width: 100px; text-align:center;"><?php echo T_("Daily Max");?></td>
<td style="width: 100px; text-align:center;"><?php echo T_("Date");?></td>
<td style="width: 100px; text-align:center;"><?php echo T_("Type");?></td>
</tr>

<?php 
$tqry="
	SELECT 
		a.*, 
		if(a.jtransaksi='0', a.tglinput, a.tglapprove) tglproses, 
		if(a.jtransaksi='0', a.waktuinput, a.waktuapprove) waktuproses,
		b.jpairing,
		b.lki,
		b.lka,
		b.clpairing,
		b.vreq,
		b.dailycap
	FROM g_komisi a
	LEFT JOIN g_pairingupd b ON a.refno = b.refno AND a.userid = b.userid
	WHERE a.userid =  '".$_SESSION["userid"]."' AND a.jtransaksi='0' AND a.jkomisi='2' ".$where;

$qry0=mysqli_query($tqry);

$pages=ceil(mysqli_num_rows($qry0)/$perpage);

$qry=mysqli_query($tqry.$limit);

// echo $tqry.$limit;

if(isset($_GET["pg"])) $x=($_GET["pg"]-1)*$perpage+1; else $x=1;

while($row=mysqli_fetch_array($qry)) { ?>
<tr class="tContent <?php if(($x-1)%2) echo 'genap';?>" style=" <?php // if($row["jtransaksi"]=='1') echo 'font-style: italic; color: red;';?>" >
<td style="text-align:center;"><?php echo $x; ?></td>
<td style="text-align:center;"><?php echo $syscurrency." ".number_format( $row["lki"],2 );?></td>
<td style="text-align:center;"><?php echo $syscurrency." ".number_format( $row["lka"],2 );?></td>
<td style="text-align:center;"><?php echo $syscurrency." ".number_format( $row["clpairing"],2 );?></td>
<td style="text-align:center;"><?php echo $syscurrency." ".number_format( $row["trxprc"],2 );?></td>
<td style="text-align:center;"><?php echo $syscurrency." ".number_format( $row["trxvalue"],2 );?></td>
<td style="text-align:center;"><?php echo $syscurrency." ".number_format( $row["dailycap"],2 );?></td>
<td style="text-align:center;"><?php echo date('d M Y H:i:s', strtotime($row["tglproses"]." ".$row["waktuproses"])); ?></td>
<td style="text-align:center;"><?php switch( $row["status"] ) {
	case "0" : echo '<span style="" class="label label-warning" >Pending</span>'; break;
	case "1" : echo '<span style="" class="label label-success" >Received</span>'; break;
}?></td>


</tr>
<?php $x++; } ?>
</table>
</div>
<div class="pagez"><?php include('pagez.php'); ?></div>