<input type="hidden" id="pg" value="<?php if(isset($_GET["pg"])) echo $_GET["pg"]; else echo "1";?>" />
<?php include_once('includes/config.php'); 

$stDownload	= 0;

$limit=" ORDER BY xvaljpackage ASC, nmjpackage ASC ";

if(isset($_GET["pg"])) 
	 $limit	.= " LIMIT ".(($_GET["pg"]-1)*$perpage).",".$perpage; 
else $limit	.= " LIMIT 0,".$perpage;

$where	= "";

if(isset($_GET["pf"])) {
	switch($_GET["pf"]) {
	case "1": $where	.= " AND a.nmjpackage like '%".$_GET["vf"]."%'"; break;
	}
}

?>
<div class="wrapper">
<table class="xuser" style="width: 100%; margin: 0;">
<tr class="tHeader">
	<td rowspan="2" style="width:  25px !important; text-align:center;"><?php echo T_("No");?></td>
	<td rowspan="2" style="width: 125px; text-align:center;"><?php echo T_("Package");?></td>
	<td rowspan="2" style="width:  75px; text-align:center;"><?php echo T_("Min. Value");?></td>
	<td colspan="2" style="width: 150px; text-align:center;"><?php echo T_("Profit Sharing");?></td>
	<td rowspan="2" style="width:  75px; text-align:center;"><?php echo T_("Rebate");?> (<?php echo $dcurrency;?>/<?php echo T_("Lot");?>)</td>
	<td rowspan="2" style="width:  75px; text-align:center;"><?php echo T_("Status");?></td>
	
	<td rowspan="2" style="width: 100px !important; text-align:center;"></td>
</tr>

<tr class="tHeader">
	<td style="width:  75px; text-align:center;"><?php echo T_("User");?></td>
	<td style="width:  75px; text-align:center;"><?php echo T_("Manager");?></td>
</tr>

<?php 
$tqry	=	"
		SELECT a.*, ( a.minvalue * 1 ) xvaljpackage 
		FROM g_jpackage a 
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
        <span style=""><?php echo $row["nmjpackage"]; ?></span>
        </td>
    <td style="text-align:center;vertical-align: middle;"><?php echo number_format($row["minvalue"],2); ?></td>
    <td style="text-align:center;vertical-align: middle;"><?php echo number_format($row["usrprc"],2); ?></td>
    <td style="text-align:center;vertical-align: middle;"><?php echo number_format($row["mgrprc"],2); ?></td>
    <td style="text-align:center;vertical-align: middle;"><?php echo number_format($row["rebate"],2); ?></td>
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