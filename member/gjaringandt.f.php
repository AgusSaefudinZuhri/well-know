<?php 

	include_once('includes/config.php'); 
	$limit = "";
	if(isset($_GET["pg"])) $limit	.= " LIMIT ".(($_GET["pg"]-1)*$perpage).",".$perpage; 
	else $limit	.= " LIMIT 0,".$perpage;

?>
<input type="hidden" id="pg" value="<?php if(isset($_GET["pg"])) echo $_GET["pg"]; else echo "1";?>" />
<div class="mwrapper" style="padding-top: 5px;">
<table class="xuser" style="width: 100%; min-width: 300px;">
<tr class="tHeader" >
<td style="width: 100px; text-align:center;vertical-align: middle;"><?php echo T_("Member Name");?></td>
<td style="width: 150px; text-align:center;vertical-align: middle;"><?php echo T_("Introducer");?></td>
<td style="width: 100px; text-align:center;vertical-align: middle;"><?php echo T_("Commision Received");?></td>
</tr>

<?php 
$tqry="
	SELECT 
		a.*,
		b.nmmember,
		b.sponsor,
		b.staktif,
		e.nmmember nmsponsor
	FROM g_unilevel a
	LEFT JOIN g_member b ON a.userid = b.userid
	LEFT JOIN g_member e ON b.sponsor = e.userid
	WHERE a.unplid =  '".$_SESSION["userid"]."' AND a.unplreverse = '".$_GET["l"]."' AND b.status IN ('0','1')
	ORDER BY b.staktif DESC
	";

$qry0=mysqli_query($tqry);

$pages=ceil(mysqli_num_rows($qry0)/$perpage);

$qry=mysqli_query($tqry.$limit);

// echo $tqry.$limit;

if(isset($_GET["pg"])) $x=($_GET["pg"]-1)*$perpage+1; else $x=1;

while($row=mysqli_fetch_array($qry)) { ?>
<tr class="tContent <?php if(($x-1)%2) echo 'genap';?>" style=" <?php // if($row["jtransaksi"]=='1') echo 'font-style: italic; color: red;';?>" >
<td style="text-align:center;"><?php echo $row["nmmember"];?></td>
<td style="text-align:center;"><?php echo $row["nmsponsor"];?></td>

<td style="text-align:center;">0</td>

</tr>
<?php $x++; } ?>
</table>
</div>
<div class="pagez"><?php include('pagez.php'); ?></div>