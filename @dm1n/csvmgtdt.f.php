<input type="hidden" id="pg" value="<?php if(isset($_GET["pg"])) echo $_GET["pg"]; else echo "1";?>" />
<?php include_once('includes/config.php'); 
$perpage = 15;

	$stDownload	=	'0';

$limit=" ORDER BY a.tglinput DESC, a.waktuinput DESC";
if(isset($_GET["pg"])) $limit.=" LIMIT ".(($_GET["pg"]-1)*$perpage).",".$perpage; 
else $limit.=" LIMIT 0,".$perpage;

$where="";

?>
<div class="wrapper">
<table class="xuser" style="width: 100%; margin: 0;">
<tr class="tHeader" >
<td style="width: 50px !important; text-align:center;"><?php echo T_("No");?></td>
<!--<?php if($_SESSION["x3"]=='1' or $_SESSION['grup_b']=='0') { ?><td style="width: 50px !important; text-align:center;"><input type="checkbox" onclick="s_all(this)" /></td><?php } ?>-->
<td style="width: 150px; text-align:center;"><?php echo T_("Input Date");?></td>
<td style="width: 150px; text-align:center;"><?php echo T_("Start Process");?></td>
<td style="width: 150px; text-align:center;"><?php echo T_("End Process");?></td>
<td style="width: 150px; text-align:center;"><?php echo T_("Link");?></td>
<td style="width: 150px; text-align:center;"><?php echo T_("# Records");?></td>
<td style="width: 150px; text-align:center;"><?php echo T_("Status");?></td>
</tr>


<?php 
$tqry="
		SELECT a.*, b.cid
		FROM g_csv a
		LEFT JOIN ( SELECT csvid, COUNT(id) cid FROM g_csvdt GROUP BY csvid)  b ON a.id=b.csvid
		WHERE a.status IN ('0', '1', '11')
		 ".$where."
		 ";
		
$qry0	= mysql_query($tqry);
$jml0	= mysql_num_rows($qry0);
$numRows= $jml0;
$pages	= ceil($jml0/$perpage);

$qry=mysql_query($tqry.$limit);
//echo $tqry.$limit;
if(isset($_GET["pg"])) $x=($_GET["pg"]-1)*$perpage+1; else $x=1;

while($row=mysql_fetch_array($qry)) { ?>
<tr class="tContent<?php if(($x-1)%2) echo ' genap';?>" >
<td style="text-align:center;"><?php echo $x; ?></td>
<!--<?php if($_SESSION["x3"]=='1' or $_SESSION['grup_b']=='0') { ?><td style="text-align:center;"><input type="checkbox" class="invid" style="margin: 0;" name="invid[]" value="<?php echo $row["refno"]; ?>" /></td><?php } ?>-->
<td style="text-align:center;"><?php echo date('d M Y', strtotime($row["tglinput"]))." ".$row["waktuinput"];?></td>
<td style="text-align:center;"><?php if($row["tglmulai"]!='') echo date('d M Y', strtotime($row["tglmulai"]))." ".$row["waktumulai"];?></td>
<td style="text-align:center;"><?php if($row["tglselesai"]!='') echo date('d M Y', strtotime($row["tglselesai"]))." ".$row["waktuselesai"];?></td>

<td style="text-align:center;"><?php echo $row["csvurl"]; ?></td>
<td style="text-align:center;"><?php echo number_format( $row["cid"] ); ?></td>
<td style="text-align:center;"><?php switch( $row["status"] ) {
	case "0": echo "Waiting"; break;
	case "1": echo "Processing"; break;
	case "11": echo "Done"; break;
		
}?></td>
</tr>
<?php $x++; } ?>
</table>
</div>
<?php include( 'pagez.php' ); ?>