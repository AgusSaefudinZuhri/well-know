<input type="hidden" id="pg" value="<?php if(isset($_GET["pg"])) echo $_GET["pg"]; else echo "1";?>" />
<?php include_once('includes/config.php'); 
$perpage = 15;

	$stDownload	=	'0';

$limit=" ORDER BY a.tglinput DESC, a.waktuinput DESC";
if(isset($_GET["pg"])) $limit.=" LIMIT ".(($_GET["pg"]-1)*$perpage).",".$perpage; 
else $limit.=" LIMIT 0,".$perpage;

$where="";

if(isset($_GET["pf"])) {
	switch($_GET["pf"]) {
	case "0": $where.=" AND a.userid like '%".$_GET["vf"]."%'"; break;
	}
}


?>
<div class="wrapper">
<table class="xuser" style="width: 100%; margin: 0;">
<tr class="tHeader" >
<td style="width: 50px !important; text-align:center;"><?php echo T_("No");?></td>
<!--<?php if($_SESSION["x3"]=='1' or $_SESSION['grup_b']=='0') { ?><td style="width: 50px !important; text-align:center;"><input type="checkbox" onclick="s_all(this)" /></td><?php } ?>-->
<td style="width: 100px; text-align:center;"><?php echo T_("Input Date");?></td>
<td style="width: 150px; text-align:center;"><?php echo T_("UserID");?></td>
<td style="width: 150px; text-align:center;"><?php echo T_("MT4 Account");?></td>
<td style="width: 150px; text-align:center;"><?php echo T_("Service");?></td>
<td style="width: 150px; text-align:center;"><?php echo T_("Amount");?></td>
<td style="width: 100px; text-align:center;"><?php echo T_("Estimated in");?> <?php echo $dcurrency; ?></td>
<?php // if($_SESSION["x3"]=='1' or $_SESSION['grup_b']=='0') { ?><td style="width: 50px; text-align:center;"></td><?php // } ?>
</tr>


<?php 
$tqry="
		SELECT 
			a.*,
			b.nmjfinance,
			c.excsell
		FROM g_wmt4 a
		LEFT JOIN g_jfinance b ON a.jfinanceid=b.id
		LEFT JOIN g_kurs c ON a.kursid = c.id
		WHERE a.jtransaksi='0' AND a.jtransaksix = '0' AND a.status='0'
		 ".$where."
		 ";
		
$qry0	= mysqli_query($tqry);
$jml0	= mysqli_num_rows($qry0);
$numRows= $jml0;
$pages	= ceil($jml0/$perpage);

$qry=mysqli_query($tqry.$limit);
//echo $tqry.$limit;
if(isset($_GET["pg"])) $x=($_GET["pg"]-1)*$perpage+1; else $x=1;

while($row=mysqli_fetch_array($qry)) { ?>
<tr class="tContent<?php if(($x-1)%2) echo ' genap';?>" >
<td style="text-align:center;"><?php echo $x; ?></td>
<!--<?php if($_SESSION["x3"]=='1' or $_SESSION['grup_b']=='0') { ?><td style="text-align:center;"><input type="checkbox" class="invid" style="margin: 0;" name="invid[]" value="<?php echo $row["refno"]; ?>" /></td><?php } ?>-->
<td style="text-align:center;"><?php echo date('d M Y', strtotime($row["tglinput"]))." ".$row["waktuinput"];?></td>
<td style="text-align:center;"><?php echo $row["userid"]; ?></td>
<td style="text-align:center;"><?php echo $row["extakunid"]; ?></td>
<td style="text-align:ceenter;"><?php echo $row["nmjfinance"]; ?></td>
<td style="text-align:center;"><?php echo $row["kursid"].' '.number_format($row["trxvalue"],2);?></td>
<td style="text-align:center;"><?php echo number_format($row["trxvalue"]/$row["excsell"],2);?></td>
<?php //if($_SESSION["x3"]=='1' or $_SESSION['grup_b']=='0') { ?>
<td style="text-align:center;">
	<a href="javascript:void(0);" title="<?php echo T_("Approve");?>"  class="tbutton submission" onclick="bayar('<?php echo $row["id"]; ?>')">&nbsp;</a>&nbsp;<a href="javascript:void(0);" title="<?php echo T_("Reject");?>"  class="tbutton thapus" onclick="hapus('<?php echo $row["id"]; ?>')">&nbsp;</a></td>
<?php //} ?>
</tr>
<?php $x++; } ?>
</table>
</div>
<?php include( 'pagez.php' ); ?>