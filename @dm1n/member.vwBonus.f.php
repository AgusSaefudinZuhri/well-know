<input type="hidden" id="pgx" value="<?php if(isset($_GET["pg"])) echo $_GET["pg"]; else echo "1";?>" />
<?php include_once('includes/config.php'); 
$perpage = 10;
//echo "regfee".$regfee;
$limit	= " ORDER BY tglproses DESC, waktuproses DESC";
if(isset($_GET["pg"])) $limit.=" LIMIT ".(($_GET["pg"]-1)*$perpage).",".$perpage; 
else $limit.=" LIMIT 0,".$perpage;

$where="";

if(isset($_GET["j"])) {
	switch($_GET["j"]) {
	case "1": $where.=" AND a.jkomisi = '".$_GET["j"]."'"; break;
	case "2": $where.=" AND a.jkomisi = '".$_GET["j"]."'"; break;
	case "3": $where.=" AND a.jkomisi IN ('3','6') "; break;
	case "4": $where.=" AND a.jkomisi IN ('4','5') "; break;
			
	}
}

$table =" g_wfund "
/*
if(isset($_GET["of"])) {
	switch($_GET["of"]) {
	case "1": $table =" g_wfund "; break;
	/*
	case "2": $table =" g_wregister"; break;
	case "3": $table =" g_wpv"; break;
	*/
/*	}
} else $table = "";
*/

?>
<div class="wrapper">
<table class="xuser" style="width: 100%; margin: 0;">
<tr class="tHeader" >
<td style="width: 25px !important; text-align:center;"><?php echo T_("No");?></td>
<td style="width: 50px; text-align:center;"><?php echo T_("Date");?></td>
<td style="width: 125px; text-align:center;"><?php echo T_("Description");?></td>
<td style="width: 75px; text-align:center;"><?php echo T_("In");?><!--<br/><span>( <?php echo T_("in")." ".$dcurrency;?> )</span>--></td>
<td style="width: 75px; text-align:center;"><?php echo T_("Out");?><!--<br/><span>( <?php echo T_("in")." ".$dcurrency;?> )</span>--></td>
</tr>


<?php 
$tqry="
	SELECT 
		*, 
		if(a.jtransaksi='0' or a.status='0', a.tglinput, a.tglapprove) tglproses, 
		if(a.jtransaksi='0' or a.status='0', a.waktuinput, a.waktuapprove) waktuproses
	FROM ".$table." a
	WHERE a.status >='0' AND jtransaksi='0' AND a.parentid='".$_GET["id"]."' ".$where;
		
$qry0	= mysql_query($tqry);
$jml0	= mysql_num_rows($qry0);
$pages	= ceil($jml0/$perpage);

$qry=mysql_query($tqry.$limit);
//echo $tqry.$limit;
if(isset($_GET["pg"])) $x=($_GET["pg"]-1)*$perpage+1; else $x=1;

while($row=mysql_fetch_array($qry)) { ?>
<tr class="tContent <?php if(($x-1)%2) echo 'genap';?>" style="<?php if($row["jtransaksi"]=='1') echo 'font-style: italic; color: red;';?>" >
<td style="text-align:center;"><?php echo $x; ?></td>
<td style="text-align:center;"><?php echo date('d M Y H:i:s', strtotime($row["tglproses"]." ".$row["waktuproses"])); ?></td>
<td style="text-align:left;"><?php echo $row["remark"];?> <?php switch($row["status"]) {
	case '0' : echo "- Wait Approval"; break;
	case '1' : echo ""; break;
	case '99': echo "Canceled"; break;
}
	?></td>
<td style="text-align:right;"><?php if($row["jtransaksi"]=='0') echo number_format(($row["trxvalue"]*1),2); else echo '0.00'; ?></td>
<td style="text-align:right;"><?php if($row["jtransaksi"]=='1') echo number_format($row["trxvalue"],2); else echo '0.00'; ?></td>
</tr>
<?php $x++; } ?>
</table>
</div>
<?php include('pagez2.php');?>