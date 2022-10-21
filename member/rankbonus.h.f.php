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
<td style="width: 100px; text-align:center;"><?php echo T_("Rank");?></td>
<td style="width: 100px; text-align:center;"><?php echo T_("Small Foot");?></td>
<td style="width: 100px; text-align:center;"><?php echo T_("Big Foot");?></td>
<td style="width: 100px; text-align:center;"><?php echo T_("Pass Through");?></td>
<td style="width:  50px; text-align:center;"><?php echo "%";?></td>
<td style="width: 100px; text-align:center;"><?php echo T_("Bonus Earned");?></td>
<td style="width: 100px; text-align:center;"><?php echo T_("Date");?></td>
</tr>

<?php 
$tqry="
	SELECT 
		*, 
		if(a.jtransaksi='0', a.tglinput, a.tglapprove) tglproses, 
		if(a.jtransaksi='0', a.waktuinput, a.waktuapprove) waktuproses,
		b.jvlsisa,
		c.nmjranking,
		c.iconlink
	FROM g_wfund a
	LEFT JOIN ( SELECT wfundid, SUM(vlsisa) jvlsisa FROM g_passnext GROUP BY wfundid ) b ON a.id = b.wfundid
	LEFT JOIN g_jranking c ON a.jrank = c.id
	WHERE a.userid =  '".$_SESSION["userid"]."' AND a.jtransaksi='0' AND a.jkomisi='2' ".$where;

$qry0=mysql_query($tqry);

$pages=ceil(mysql_num_rows($qry0)/$perpage);

$qry=mysql_query($tqry.$limit);

 //echo $tqry.$limit;

if(isset($_GET["pg"])) $x=($_GET["pg"]-1)*$perpage+1; else $x=1;

while($row=mysql_fetch_array($qry)) { ?>
<tr class="tContent <?php if(($x-1)%2) echo 'genap';?>" style=" <?php // if($row["jtransaksi"]=='1') echo 'font-style: italic; color: red;';?>" >
<td style="text-align:center;"><?php echo $x; ?></td>
<td style="text-align:center;"><img src="<?php echo $row["iconlink"]; ?>" style="height: 25px; display: inline-block; vertical-align: middle;" />&nbsp;<?php echo $row["nmjranking"];?></td>
<td style="text-align:center;"><?php echo $syscurrency." ".number_format( $row["trxvalue"]/($row["trxprc"]/100),2 );?></td>
<td style="text-align:center;"><?php echo $syscurrency." ".number_format( $row["trxvalue"]/($row["trxprc"]/100) + $row["jvlsisa"],2 );?></td>
<td style="text-align:center;"><?php echo $syscurrency." ".number_format( $row["jvlsisa"],2 );?></td>

<td style="text-align:center;"><?php echo number_format( $row["trxprc"],2 );?></td>
<td style="text-align:center;"><?php echo $dcurrency." ".number_format( $row["idrvalue"],2 );?></td>

<td style="text-align:center;"><?php echo date('d M Y H:i:s', strtotime($row["tglproses"]." ".$row["waktuproses"])); ?></td>
</tr>
<?php $x++; } ?>
</table>
</div>
<div class="pagez"><?php include('pagez.php'); ?></div>