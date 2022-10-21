<input type="hidden" id="pg" value="<?php if(isset($_GET["pg"])) echo $_GET["pg"]; else echo "1";?>" />
<?php include_once('includes/config.php'); 

$stDownload	= 0;

$limit=" ORDER BY xvaljunilevel ASC, nmjunilevel ASC ";

if(isset($_GET["pg"])) 
	 $limit	.= " LIMIT ".(($_GET["pg"]-1)*$perpage).",".$perpage; 
else $limit	.= " LIMIT 0,".$perpage;

$where	= "";

if(isset($_GET["pf"])) {
	switch($_GET["pf"]) {
	case "1": $where	.= " AND a.nmjunilevel like '%".$_GET["vf"]."%'"; break;
	}
}

?>
<div class="wrapper">
<table class="xuser" style="width: 100%; margin: 0;">
<tr class="tHeader">
	<td rowspan="2" style="width:  25px !important; text-align:center;"><?php echo T_("No");?></td>
	<td rowspan="2" style="width: 125px; text-align:center;"><?php echo T_("Unilevel");?></td>
	<td rowspan="2" style="width:  75px; text-align:center;"><?php echo T_("Min. Referral");?></td>
	<td colspan="10" style="width: 250px; text-align:center;"><?php echo T_("Bonus");?> (%)</td>
	<td colspan="10" style="width: 250px; text-align:center;"><?php echo T_("Rebate");?> (<?php echo $dcurrency;?>)</td>

		<td rowspan="2" style="width:  75px; text-align:center;"><?php echo T_("Status");?></td>
	
	<td rowspan="2" style="width: 100px !important; text-align:center;"></td>
</tr>

<tr class="tHeader">
	<td style="width:  25px; text-align:center;"><?php echo T_("Lvl01");?></td>
	<td style="width:  25px; text-align:center;"><?php echo T_("Lvl02");?></td>
	<td style="width:  25px; text-align:center;"><?php echo T_("Lvl03");?></td>
	<td style="width:  25px; text-align:center;"><?php echo T_("Lvl04");?></td>
	<td style="width:  25px; text-align:center;"><?php echo T_("Lvl05");?></td>
	<td style="width:  25px; text-align:center;"><?php echo T_("Lvl06");?></td>
	<td style="width:  25px; text-align:center;"><?php echo T_("Lvl07");?></td>
	<td style="width:  25px; text-align:center;"><?php echo T_("Lvl08");?></td>
	<td style="width:  25px; text-align:center;"><?php echo T_("Lvl09");?></td>
	<td style="width:  25px; text-align:center;"><?php echo T_("Lvl10");?></td>
	<td style="width:  25px; text-align:center;"><?php echo T_("Rbt01");?></td>
	<td style="width:  25px; text-align:center;"><?php echo T_("Rbt02");?></td>
	<td style="width:  25px; text-align:center;"><?php echo T_("Rbt03");?></td>
	<td style="width:  25px; text-align:center;"><?php echo T_("Rbt04");?></td>
	<td style="width:  25px; text-align:center;"><?php echo T_("Rbt05");?></td>
	<td style="width:  25px; text-align:center;"><?php echo T_("Rbt06");?></td>
	<td style="width:  25px; text-align:center;"><?php echo T_("Rbt07");?></td>
	<td style="width:  25px; text-align:center;"><?php echo T_("Rbt08");?></td>
	<td style="width:  25px; text-align:center;"><?php echo T_("Rbt09");?></td>
	<td style="width:  25px; text-align:center;"><?php echo T_("Rbt10");?></td>

</tr>

<?php 
$tqry	=	"
		SELECT a.*, ( a.minsponsor * 1 ) xvaljunilevel 
		FROM g_junilevel a 
		WHERE a.status IN ('0', '1') 
		".$where;

$qry0	= mysqli_query($tqry);

$numRows	= mysqli_num_rows($qry0);
$pages		= ceil( $numRows /$perpage);

$qry=mysqli_query($tqry.$limit);

if(isset($_GET["pg"])) $x=($_GET["pg"]-1)*$perpage+1; else $x=1;

while($row=mysqli_fetch_array($qry)) { ?>
<tr class="tContent<?php if(($x-1)%2) echo ' genap';?>" >
    <td style="text-align:center;vertical-align: middle;"><?php echo $x; ?></td>
    <td style="text-align:left; ">
    	<img src="<?php echo $row["iconlink"]; ?>" style="height: 25px; display: inline-block; vertical-align: middle;" />&nbsp;
        <span style=""><?php echo $row["nmjunilevel"]; ?></span>
        </td>
    <td style="text-align:center;vertical-align: middle;"><?php echo number_format($row["minsponsor"],2); ?></td>
    <td style="text-align:center;vertical-align: middle;"><?php echo number_format($row["lvl01"],2); ?></td>
    <td style="text-align:center;vertical-align: middle;"><?php echo number_format($row["lvl02"],2); ?></td>
    <td style="text-align:center;vertical-align: middle;"><?php echo number_format($row["lvl03"],2); ?></td>
    <td style="text-align:center;vertical-align: middle;"><?php echo number_format($row["lvl04"],2); ?></td>
    <td style="text-align:center;vertical-align: middle;"><?php echo number_format($row["lvl05"],2); ?></td>
    <td style="text-align:center;vertical-align: middle;"><?php echo number_format($row["lvl06"],2); ?></td>
    <td style="text-align:center;vertical-align: middle;"><?php echo number_format($row["lvl07"],2); ?></td>
    <td style="text-align:center;vertical-align: middle;"><?php echo number_format($row["lvl08"],2); ?></td>
    <td style="text-align:center;vertical-align: middle;"><?php echo number_format($row["lvl09"],2); ?></td>
    <td style="text-align:center;vertical-align: middle;"><?php echo number_format($row["lvl10"],2); ?></td>
    <td style="text-align:center;vertical-align: middle;"><?php echo number_format($row["rbt01"],2); ?></td>
    <td style="text-align:center;vertical-align: middle;"><?php echo number_format($row["rbt02"],2); ?></td>
    <td style="text-align:center;vertical-align: middle;"><?php echo number_format($row["rbt03"],2); ?></td>
    <td style="text-align:center;vertical-align: middle;"><?php echo number_format($row["rbt04"],2); ?></td>
    <td style="text-align:center;vertical-align: middle;"><?php echo number_format($row["rbt05"],2); ?></td>
    <td style="text-align:center;vertical-align: middle;"><?php echo number_format($row["rbt06"],2); ?></td>
    <td style="text-align:center;vertical-align: middle;"><?php echo number_format($row["rbt07"],2); ?></td>
    <td style="text-align:center;vertical-align: middle;"><?php echo number_format($row["rbt08"],2); ?></td>
    <td style="text-align:center;vertical-align: middle;"><?php echo number_format($row["rbt09"],2); ?></td>
    <td style="text-align:center;vertical-align: middle;"><?php echo number_format($row["rbt10"],2); ?></td>
	<td style="text-align:center;vertical-align: middle;"><?php 
	switch($row["status"]) { 
		case "1": echo T_("Active"); break; 
		case "0": echo T_("Not Active"); break; 
	} ?></td>
    
    <td style="text-align:center;vertical-align: middle;">
    	<a href="javascript:void(0);" title="<?php echo T_("Edit");?>" class="tbutton tedit" onclick="edit('<?php echo $row["id"]; ?>')">&nbsp;</a>
		<?php if($row["status"]=='1') { ?>
        	<a href="javascript:void(0);" title="<?php echo $nonAktifkanBtn;?>"  class="tbutton ton" onclick="hapus('<?php echo $row["id"]; ?>')">&nbsp;</a>
		<?php } else { ?>
        	<a href="javascript:void(0);" title="<?php echo $aktifkanBtn;?>"  class="tbutton toff" onclick="aktifk('<?php echo $row["id"]; ?>')">&nbsp;</a>
		<?php } ?>
        </td>
</tr>
<?php $x++; } ?>
</table>
</div>
<?php include('pagez.php');?>