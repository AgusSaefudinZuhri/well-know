<input type="hidden" id="pg" value="<?php if(isset($_GET["pg"])) echo $_GET["pg"]; else echo "1";?>" />
<?php include_once('includes/config.php'); 
$perpage = 15;
//echo "regfee".$regfee;
$limit	= " ORDER BY tglproses DESC, waktuproses DESC";
if(isset($_GET["pg"])) $limit.=" LIMIT ".(($_GET["pg"]-1)*$perpage).",".$perpage; 
else $limit.=" LIMIT 0,".$perpage;

$where="";

if(isset($_GET["pf"])) {
	switch($_GET["pf"]) {
	case "1": $where.=" AND a.parentid LIKE '%".$_GET["vf"]."%'"; break;
	}
}

$table =" g_wfund ";
/*
if(isset($_GET["of"])) {
	switch($_GET["of"]) {
	case "1": $table =" g_wfund "; break;
	/*
	case "2": $table =" g_wregister"; break;
	case "3": $table =" g_wpv"; break;
	*/
//	}
//} else $table = "";


?>
<!--
<table style="width: 100%; min-width: 650px; font-size: 14px;">
<tr>
<td style="width: 20%"><?php echo T_("UserID");?></td>
<td style="width: 80%">: <?php echo $_GET["vf"];?></td>
</tr>
<?php 
$tTxt = "
	SELECT 
		(sum(if(jtransaksi = '0', a.trxvalue, '0'))
		-sum(if(jtransaksi = '1', a.trxvalue, '0'))) jnilai,
		b.nmmember
	FROM ".$table." a
	LEFT JOIN g_member b ON a.parentid=b.userid
	WHERE a.status !='99'  ".$where."
";
$tBonus = mysql_fetch_array(mysql_query($tTxt));
?>
<tr>
    <td style="width: 20%;"><?php echo T_("Full Name");?></td>
    <td colspan="3" style="width: 80%; text-align: left;">: <?php echo $tBonus["nmmember"]; ?> </td>
</tr>

<tr>
    <td style="width: 20%;"><?php echo T_("Balance");?></td>
    <td colspan="3" style="width: 80%; text-align: left;">: <?php echo number_format($tBonus["jnilai"], 2); ?></td>
</tr>

</table>
<br/>
-->
<div class="wrapper">
<table class="xuser" style="width: 100%; margin: 0;">
<tr class="tHeader" >
<td style="width:  25px !important; text-align:center;"><?php echo T_("No");?></td>
<td style="width: 125px; text-align:center;"><?php echo T_("UserID");?></td>
<td style="width: 125px; text-align:center;"><?php echo T_("Name");?></td>
<td style="width: 100px; text-align:center;"><?php echo T_("Balance");?><!--<br/><span>( <?php echo T_("in")." ".$dcurrency;?> )</span>--></td>
<td style="width: 100px; text-align:center;"><?php echo T_("Profit Sharing");?><!--<br/><span>( <?php echo T_("in")." ".$dcurrency;?> )</span>--></td>
<td style="width: 100px; text-align:center;"><?php echo T_("Lots Rebate");?><!--<br/><span>( <?php echo T_("in")." ".$dcurrency;?> )</span>--></td>
<td style="width: 100px; text-align:center;"><?php echo T_("UniLevel");?><!--<br/><span>( <?php echo T_("in")." ".$dcurrency;?> )</span>--></td>
<td style="width: 100px; text-align:center;"><?php echo T_("Managerial");?><!--<br/><span>( <?php echo T_("in")." ".$dcurrency;?> )</span>--></td>
<td style="width: 100px; text-align:center;"><?php echo T_("Withdrawal");?><!--<br/><span>( <?php echo T_("in")." ".$dcurrency;?> )</span>--></td>

</tr>


<?php 
$tqry="
	SELECT 
		a.parentid,
		(sum(if(jtransaksi = '0', a.trxvalue, '0'))
		-sum(if(jtransaksi = '1', a.trxvalue, '0'))) jnilai,
		(sum(if(jtransaksi = '0' AND jkomisi='1', a.trxvalue, '0'))) bonus01,
		(sum(if(jtransaksi = '0' AND jkomisi='2', a.trxvalue, '0'))) bonus02,
		(sum(if(jtransaksi = '0' AND jkomisi IN ('3', '6'), a.trxvalue, '0'))) bonus03,
		(sum(if(jtransaksi = '0' AND jkomisi IN ('4','5'), a.trxvalue, '0'))) bonus04,
		(sum(if(jtransaksi = '1', a.trxvalue, '0'))) jwd,
			IF( b.staktif='1', b.tglaktif, b.tgldaftar ) tglproses,
			IF( b.staktif='1', b.waktuaktif, '0' ) waktuproses,
		b.nmmember
	FROM ".$table." a
	LEFT JOIN g_member b ON a.parentid=b.userid
	WHERE a.status !='99' ".$where." GROUP BY a.parentid";
		
$qry0	= mysql_query($tqry);
$jml0	= mysql_num_rows($qry0);
$pages	= ceil($jml0/$perpage);

$qry=mysql_query($tqry.$limit);
 //echo $tqry.$limit;
if(isset($_GET["pg"])) $x=($_GET["pg"]-1)*$perpage+1; else $x=1;

while($row=mysql_fetch_array($qry)) { ?>
<tr class="tContent <?php if(($x-1)%2) echo 'genap';?>" style="<?php if($row["jtransaksi"]=='1') echo 'font-style: italic; color: red;';?>" >
<td style="text-align:center;"><?php echo $x; ?></td>
<td style="text-align:center;"><?php echo $row["parentid"]; ?></td>
<td style="text-align:center;"><?php echo $row["nmmember"]; ?></td>
<td style="text-align:center;"><?php echo $dcurrency." ".number_format( $row["jnilai"],2 ); ?></td>
<td style="text-align:center;"><?php if($row["bonus01"]!='0') { ?><a href="javascript: void(0);" onclick="vwBonus('1','<?php echo $row["parentid"];?>')"><?php } ?><?php echo $dcurrency." ".number_format( $row["bonus01"],2 ); ?><?php if($row["bonus01"]>'0') { ?></a><?php } ?></td>
<td style="text-align:center;"><?php if($row["bonus02"]!='0') { ?><a href="javascript: void(0);" onclick="vwBonus('2', '<?php echo $row["parentid"];?>')"><?php } ?><?php echo $dcurrency." ".number_format( $row["bonus02"],2 ); ?><?php if($row["bonus02"]>'0') { ?></a><?php } ?></td>

<td style="text-align:center;"><?php if($row["bonus03"]!='0') { ?><a href="javascript: void(0);" onclick="vwBonus('3', '<?php echo $row["parentid"];?>')"><?php } ?><?php echo $dcurrency." ".number_format( $row["bonus03"],2 ); ?><?php if($row["bonus03"]>'0') { ?></a><?php } ?></td>

<td style="text-align:center;"><?php if($row["bonus04"]!='0') { ?><a href="javascript: void(0);" onclick="vwBonus('4', '<?php echo $row["parentid"];?>')"><?php } ?><?php echo $dcurrency." ".number_format( $row["bonus04"],2 ); ?><?php if($row["bonus04"]>'0') { ?></a><?php } ?></td>

<td style="text-align:center;"><?php if($row["jwd"]>'0') { ?><a href="javascript: void(0);" onclick="vwWd('<?php echo $row["parentid"];?>')"><?php } ?><?php echo $dcurrency." ".number_format( $row["jwd"],2 ); ?><?php if($row["jwd"]>'0') { ?></a><?php } ?></td>
</tr>
<?php $x++; } ?>
</table>
</div>
<?php include('pagez.php');?>