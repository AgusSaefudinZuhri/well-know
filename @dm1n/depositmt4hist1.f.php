<input type="hidden" id="pg" value="<?php if(isset($_GET["pg"])) echo $_GET["pg"]; else echo "1";?>" />
<?php include_once('includes/config.php'); 
$perpage = 15;

	$stDownload	=	'1';
	
$limit=" ORDER BY a.tglapprove DESC, a.waktuapprove DESC ";
if(isset($_GET["pg"])) $limit.=" LIMIT ".(($_GET["pg"]-1)*$perpage).",".$perpage; 
else $limit.=" LIMIT 0,".$perpage;

$where="";

if(isset($_GET["pf"])) {
	switch($_GET["pf"]) {
	case "0": $where.=" AND a.userid like '%".$_GET["vf"]."%'"; break;
	}
}

if(isset($_GET["mf"]) and $_GET["mf"]!='') $where.=" AND a.tglapprove >= '".$_GET["mf"]."' ";
if(isset($_GET["nf"]) and $_GET["nf"]!='') $where.=" AND a.tglapprove <= '".$_GET["nf"]."' ";

?>
<div class="wrapper">
<table class="xuser" style="width: 100%; margin: 0;">
<tr class="tHeader" >
<td style="width: 25px !important; text-align:center;"><?php echo T_("No");?></td>
<td style="width: 100px; text-align:center;"><?php echo T_("Date");?></td>
<td style="width: 150px; text-align:center;"><?php echo T_("UserID");?></td>
<td style="width: 150px; text-align:center;"><?php echo T_("Bank Info");?></td>
<td style="width: 150px; text-align:center;"><?php echo T_("From");?></td>
<td style="width: 150px; text-align:center;"><?php echo T_("Package");?> (<?php echo $syscurrency; ?>)</td>
<td style="width: 150px; text-align:center;"><?php echo T_("Dollar Wallet");?> (<?php echo $syscurrency; ?>)</td>
<td style="width: 150px; text-align:center;"><?php echo T_("Cash Wallet");?> (<?php echo $syscurrency; ?>)</td>
<td style="width: 100px; text-align:center;"><?php echo T_("Total");?> (<?php echo $dcurrency; ?>)</td>
<td style="width: 50px; text-align:center;"><?php echo T_("Status");?></td>
</tr>


<?php 
$tqry="
		SELECT 
			a.*,
			c.nmbank, 
			c.cabbank, 
			c.norek, 
			c.atasnama,
			a.status 
		FROM g_kleader a
		LEFT JOIN g_member c ON a.userid=c.userid
		WHERE a.jtransaksi='0' AND a.jtransaksix IN ( '1' ) AND a.status IN ('1', '99')
		 ".$where."
		";
				
$qry0	= mysql_query($tqry);
$jml0	= mysql_num_rows($qry0);
$numRows= $jml0;
$pages	= ceil($jml0/$perpage);

$qry=mysql_query($tqry.$limit);
// echo $tqry.$limit;
if(isset($_GET["pg"])) $x=($_GET["pg"]-1)*$perpage+1; else $x=1;

while($row=mysql_fetch_array($qry)) { ?>
<tr class="tContent<?php if(($x-1)%2) echo ' genap';?>" >

<td style="text-align:center;"><?php echo $x; ?></td>
<td style="text-align:center;"><?php echo date('d M Y', strtotime($row["tglapprove"]))." ".$row["waktuapprove"];?></td>
<td style="text-align:center;"><?php echo $row["userid"]; ?></td>
<td style="text-align:ceenter;"><?php echo $row["nmbank"]." ".$row["cabbank"]; ?><br/>
<?php echo $row["norek"]; ?> - <?php echo $row["atasnama"]; ?></td>
<td style="text-align:center;"><?php echo $row["useridx"]; ?></td>
<td style="text-align:right;"><?php echo number_format( $row["pkgvalue"], 2 );?></td>
<td style="text-align:right;"><?php echo number_format( $row["wregvalue"], 2 );?></td>
<td style="text-align:right;"><?php echo number_format( $row["wcashvalue"], 2 );?></td>
<td style="text-align:right;"><?php echo number_format( $row["trxvalue"], 2 );?></td>

<td style="text-align:center;"><?php switch ($row["status"]) {
	case "1"	: echo "APPROVED"; break;
	case "99"	: echo "REJECTED"; break;
	} ?></td>

</tr>
<?php $x++; } ?>
</table>
</div>
<?php include( 'pagez.php' ); ?>