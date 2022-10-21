<?php include_once('includes/config.php');
if(isset($_GET["j"])) {
	switch($_GET["j"]) {
	case "1": $where0.=" AND a.jkomisi = '".$_GET["j"]."'"; break;
	case "2": $where0.=" AND a.jkomisi = '".$_GET["j"]."'"; break;
	case "3": $where0.=" AND a.jkomisi IN ('3', '6') "; break;
	case "4": $where0.=" AND a.jkomisi IN ('4','5') "; break;
			
	}
}

 ?>
<script type="application/javascript" language="javascript">

function carix(x) {
	loadingstart();	
	if(cekzzz()) {
		if(x=='') x=$('#pgx').val(); else x=x;		
//		var pfilter=$("#pfilter").val();	
//		var vfilter=$("#vfilter").val();
		var	fCari	= encodeURI( 'member.vwBonus.f.php?id=<?php echo $_GET["id"];?>&j=<?php echo $_GET["j"];?>&pg='+x );		
		$('#xiwrapper').load( fCari, function () {loadingend();});
	}
	else  clogout ();
}

</script>


<div style="padding: 10px;">
<span style="font-size: 16px; font-weight: bold;"><?php echo strtoupper(T_("Commission History")); ?></span>
<form id="add_post" name="add_post" method="post">
<div style="height: 500px; overflow-x: hidden; overflow-y: auto; margin-bottom: 5px;">

<table style="width: 100%; min-width: 650px; font-size: 14px;">
<tr>
<td style="width: 20%"><?php echo T_("UserID");?></td>
<td style="width: 80%">: <?php echo $_GET["id"];?></td>
</tr>
<?php 
$tTxt = "
	SELECT 
		(sum(if(jtransaksi = '0' ".$where0.", a.trxvalue, '0'))) jnilai,
		b.nmmember
	FROM g_wfund a
	LEFT JOIN g_member b ON a.parentid=b.userid
	WHERE a.status !='99' AND a.parentid='".$_GET["id"]."'  ".$where."
";
	//echo $tTxt;
$tBonus = mysql_fetch_array(mysql_query($tTxt));
?>
<tr>
    <td style="width: 20%;"><?php echo T_("Full Name");?></td>
    <td colspan="3" style="width: 80%; text-align: left;">: <?php echo $tBonus["nmmember"]; ?> </td>
</tr>

<tr>
    <td style="width: 20%;"><?php echo T_("Total");?></td>
    <td colspan="3" style="width: 80%; text-align: left;">: <?php echo number_format($tBonus["jnilai"], 2); ?></td>
</tr>

</table>

<br/>

	<div id="xiwrapper">
	<?php include('member.vwBonus.f.php'); ?>
    </div>

</div>

<input type="button" value="<?php echo T_("Cancel"); ?>" onclick="batal()" style="float: right;" />

</form>
</div>