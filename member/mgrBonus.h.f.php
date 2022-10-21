<?php 

	include_once('includes/config.php'); 

	$limit	= " ORDER BY tglproses DESC, waktuproses DESC, a.id DESC";
	if(isset($_GET["pg"])) $limit	.= " LIMIT ".(($_GET["pg"]-1)*$perpage).",".$perpage; 
	else $limit	.= " LIMIT 0,".$perpage;
	
	$where	= "";
	//echo date('H:i:s') .'<'. '16:00:00';
	if( date('H:i:s') < '16:00:00' ) {
		$where .= " AND CONCAT( tglinput,' ',waktuinput ) <= '".date('Y-m-d H:i:s', strtotime(' -1 DAY '))."' ";
	}
	
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
<td style="width: 100px; text-align:center;"><?php echo T_("Order#");?></td>
<td style="width: 100px; text-align:center;"><?php echo T_("Name");?></td>
<td style="width: 50px; text-align:center;"><?php echo T_("PS/Rebate");?></td>
<td style="width: 50px; text-align:center;">%</td>
<td style="width: 100px; text-align:center;"><?php echo T_("Manager Bonus");?></td>
<td style="width: 100px; text-align:center;"><?php echo T_("Date");?></td>
<td style="width: 100px; text-align:center;"><?php echo T_("Remark");?></td>
<td style="width: 100px; text-align:center;"><?php echo T_("Status");?></td>
</tr>

<?php 
$tqry="
	SELECT 
		a.*,
		b.nmmember nmmemberx,
		if(a.jtransaksi='0', a.tglinput, a.tglapprove) tglproses, 
		if(a.jtransaksi='0', a.waktuinput, a.waktuapprove) waktuproses
	FROM g_wfund a
	LEFT JOIN g_member b ON a.useridx = b.userid
	WHERE a.userid =  '".$_SESSION["userid"]."' AND a.jtransaksi='0' AND a.jkomisi IN ('4','5') ".$where;

$qry0=mysql_query($tqry);

$pages=ceil(mysql_num_rows($qry0)/$perpage);

$qry=mysql_query($tqry.$limit);

// echo $tqry.$limit;

if(isset($_GET["pg"])) $x=($_GET["pg"]-1)*$perpage+1; else $x=1;

while($row=mysql_fetch_array($qry)) { ?>
<tr class="tContent <?php if(($x-1)%2) echo 'genap';?>" style=" <?php // if($row["jtransaksi"]=='1') echo 'font-style: italic; color: red;';?>" >
<td style="text-align:center;"><?php echo $x; ?></td>
<td style="text-align:center;"><?php echo $row["orderid"];?></td>
<td style="text-align:left;"><?php echo $row["useridx"]." - ".$row["nmmemberx"];?></td>
<td style="text-align:center;"><?php switch($row["jkomisi"]) {
	case "4" : echo "PS"; break;
	case "5" : echo "Rebate"; break;
	
		}
	?></td>
<td style="text-align:center;"><?php echo number_format( $row["trxprc"],2  );?></td>
<td style="text-align:center;"><?php echo $dcurrency." ".number_format( $row["trxvalue"],2 );?></td>
<td style="text-align:center;"><?php echo date('d M Y H:i:s', strtotime($row["tglproses"]." ".$row["waktuproses"])); ?></td>
<td style="text-align:center;"><?php if($row["jkomisi"]=='5') echo $row["remark"];?></td>
<td style="text-align:center;"><?php switch( $row["status"] ) {
	case "0" : echo '<span style="" class="label label-warning" >Pending</span>'; break;
	case "1" : echo '<span style="" class="label label-success" >Received</span>'; break;
}?></td>


</tr>
<?php $x++; } ?>
</table>
</div>
<div class="pagez"><?php include('pagez.php'); ?></div>