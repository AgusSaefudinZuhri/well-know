<input type="hidden" id="pg" value="<?php if(isset($_GET["pg"])) echo $_GET["pg"]; else echo "1";?>" />
<?php include_once('includes/config.php'); 

$stDownload	= 0;

$limit=" ORDER BY negara ASC ";

if(isset($_GET["pg"])) 
	 $limit	.= " LIMIT ".(($_GET["pg"]-1)*$perpage).",".$perpage; 
else $limit	.= " LIMIT 0,".$perpage;

$where	= "";

if(isset($_GET["pf"])) {
	switch($_GET["pf"]) {
	case "1": $where	.= " AND a.negara like '%".$_GET["vf"]."%'"; break;
	}
}

?>
<div class="wrapper">
<table class="xuser" style="width: 100%; margin: 0;">
<tr class="tHeader">
<td style="width:  25px !important; text-align:center;"><?php echo T_("No");?></td>
<td style="width: 125px; text-align:center;"><?php echo T_("Country");?></td>
<td style="width:  75px; text-align:center;"><?php echo T_("Sell");?></td>
<td style="width:  75px; text-align:center;"><?php echo T_("Buy");?></td>
<td style="width: 75px; text-align:center;"><?php echo T_("Status");?></td>
<td style="width: 100px !important; text-align:center;"></td>
</tr>

<?php 
$tqry	=	"
		SELECT a.*
		FROM g_excrate a 
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
    <td style="text-align:left; "><span style=""><?php echo $row["negara"]; ?></span></td>
    <td style="text-align:center;vertical-align: middle;"><?php echo number_format($row["jual"],2); ?></td>
    <td style="text-align:center;vertical-align: middle;"><?php echo number_format($row["beli"],2); ?></td>
    <td style="text-align:center;vertical-align: middle;">
		<?php switch($row["status"]) { case "1": echo T_("A"); break; case "0": echo T_("N"); break; } ?>
        </td>
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