<?php 

	include_once('includes/config.php'); 

	$perpage = 1000;
	$limit	= " ORDER BY id ASC";
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
<td style="width: 200px; text-align:center;"><?php echo T_("Country");?></td>
<td style="width: 100px; text-align:center;"><?php echo T_("Sell");?></td>
<td style="width: 100px; text-align:center;"><?php echo T_("Buy");?></td>
</tr>

<?php 
$tqry="
	SELECT a.*
	FROM g_excrate a
	WHERE a.status = '1' ".$where;

$qry0=mysqli_query($tqry);

$pages=ceil(mysqli_num_rows($qry0)/$perpage);

$qry=mysqli_query($tqry.$limit);

// echo $tqry.$limit;

if(isset($_GET["pg"])) $x=($_GET["pg"]-1)*$perpage+1; else $x=1;

while($row=mysqli_fetch_array($qry)) { ?>
<tr class="tContent <?php if(($x-1)%2) echo 'genap';?>" style=" <?php // if($row["jtransaksi"]=='1') echo 'font-style: italic; color: red;';?>" >
<td style="text-align:center;"><?php echo $x; ?></td>
<td style="text-align:left;"><?php echo $row["negara"];?></td>
<td style="text-align:center;"><?php echo number_format( $row["jual"] );?></td>
<td style="text-align:center;"><?php echo number_format( $row["beli"] );?></td>
</tr>
<?php $x++; } ?>
</table>
</div>
<div class="pagez"><?php include('pagez.php'); ?></div>