<input type="hidden" id="pg" value="<?php if(isset($_GET["pg"])) echo $_GET["pg"]; else echo "1";?>" />
<?php include_once('includes/config.php'); 
$perpage = 15;
//echo "regfee".$regfee;
$limit	= " ORDER BY tglinput DESC, id DESC";
if(isset($_GET["pg"])) $limit.=" LIMIT ".(($_GET["pg"]-1)*$perpage).",".$perpage; 
else $limit.=" LIMIT 0,".$perpage;

$where="";

if(isset($_GET["pf"])) {
	switch($_GET["pf"]) {
	case "1": $where.=" AND a.parentid = '".$_GET["vf"]."'"; break;
	}
}

if(isset($_GET["of"])) {
	$where .=" AND a.jkomisi='".$_GET["of"]."' ";
} else $table = "";


?>
<table style="width: 100%; min-width: 650px; font-size: 14px;">
<tr>
<td style="width: 20%"><?php echo T_("UserID");?></td>
<td style="width: 80%">: <?php echo $_GET["vf"];?></td>
</tr>
<?php 
$tTxt = "
	SELECT 
		( SUM(if(jtransaksi = '0', a.trxvalue, '0')) - SUM(if(jtransaksi = '1', a.trxvalue, '0')) ) jnilai,
		b.nmmember
	FROM g_wfund a
	LEFT JOIN g_member b ON a.parentid=b.userid
	WHERE a.status !='99'  ".$where."
";
// echo $tTxt;
$tBonus = mysql_fetch_array(mysql_query($tTxt));
?>
<tr>
    <td style="width: 20%;"><?php echo T_("Full Name");?></td>
    <td colspan="3" style="width: 80%; text-align: left;">: <?php echo $tBonus["nmmember"]; ?> </td>
</tr>

<tr>
    <td style="width: 20%;"><?php echo T_("Total Accumulated");?></td>
    <td colspan="3" style="width: 80%; text-align: left;">: <?php echo number_format($tBonus["jnilai"], 2); ?></td>
</tr>

</table>
<br/>
<div class="wrapper">
<table class="xuser" style="width: 100%; margin: 0;">
<tr class="tHeader" >
<td style="width: 25px !important; text-align:center;"><?php echo T_("No");?></td>
<td style="width: 50px; text-align:center;"><?php echo T_("Date");?></td>
<?php if( $_GET["of"]=='2' ) { ?><td style="width: 100px; text-align:center;"><?php echo T_("UserID");?></td><?php } ?>
<td style="width: 200px; text-align:center;"><?php echo T_("Description");?></td>
<td style="width: 100px; text-align:center;"><?php echo T_("Value");?>&nbsp;<span>( <?php echo $syscurrency;?> )</span></td>
</tr>


<?php 
$tqry="
	SELECT 
		a.*, 
		if(a.jtransaksi='0', a.tglinput, a.tglapprove) tglproses, 
		if(a.jtransaksi='0', a.waktuinput, a.waktuapprove) waktuproses
	FROM g_wfund a
	WHERE a.status >='0'  ".$where;
		
$qry0	= mysql_query($tqry);
$jml0	= mysql_num_rows($qry0);
$pages	= ceil($jml0/$perpage);

$qry=mysql_query($tqry.$limit);
//echo $tqry.$limit;
if(isset($_GET["pg"])) $x=($_GET["pg"]-1)*$perpage+1; else $x=1;

while($row=mysql_fetch_array($qry)) { ?>
<tr class="tContent <?php if(($x-1)%2) echo 'genap';?>" style="<?php if($row["jtransaksi"]=='1') echo 'font-style: italic; color: red;';?>" >
<td style="text-align:center;"><?php echo $x; ?></td>
<td style="text-align:center;"><?php echo date('d M Y', strtotime($row["tglproses"] )); ?></td>
<?php if( $_GET["of"]=='2' ) { ?><td style="text-align:left;"><?php echo $row["userid"];?></td><?php } ?>
<td style="text-align:left;"><?php echo $row["remark"];?></td>
<td style="text-align:right;"><?php echo number_format(($row["trxvalue"]*1),2);  ?></td>
</tr>
<?php $x++; } ?>
</table>
</div>
<?php include('pagez.php');?>