<input type="hidden" id="pg" value="<?php if(isset($_GET["pg"])) echo $_GET["pg"]; else echo "1";?>" />
<?php 

include_once('includes/config.php'); 

$stDownload	= 0;

$limit	= " ORDER BY nama ASC ";

if(isset($_GET["pg"])) 
	 $limit	.= " LIMIT ".(($_GET["pg"]-1)*$perpage).",".$perpage; 
else $limit	.= " LIMIT 0,".$perpage;

if(isset($_GET["pf"])) {
	switch($_GET["pf"]) {
	case "1": $where=" AND nama like '%".$_GET["vf"]."%'"; break;
	}
}

else $where="";
?>
<div class="wrapper">
<table class="xuser" style="width: 100%; margin: 0;">
<tr class="tHeader" >
<td style="width: 50px; text-align:center;"><?php echo T_("No");?></td>
<td style="width: 250px; text-align:center;"><?php echo T_("Group Name");?></td>
<td style="width: 350px; text-align:center;"><?php echo T_("Description");?></td>
<td style="width: 150px; text-align:center;"></td>
</tr>
<?php 
$tqry="SELECT * FROM g_guser WHERE status='1' AND id>'0' ".$where;

$qry0=mysqli_query($tqry);

$numRows	= mysqli_num_rows($qry0);
$pages		= ceil( $numRows /$perpage);

$qry=mysqli_query($tqry.$limit);

if(isset($_GET["pg"])) $x=($_GET["pg"]-1)*$perpage+1; else $x=1;

while($row=mysqli_fetch_array($qry)) { ?>
<tr class="tContent<?php if(($x-1)%2) echo ' genap';?>" >
<td style="text-align:center;"><?php echo $x; ?></td>
<td style="text-align:left;"><?php echo $row["nama"]; ?></td>
<td style="text-align:left;"><?php echo $row["keterangan"]; ?></td>
<td style="text-align:center;"><a href="javascript:void(0);" title="<?php echo T_("Edit");?>" class="tbutton tedit" onclick="edit('<?php echo $row["id"]; ?>')">&nbsp;</a>&nbsp;&nbsp;<a href="javascript:void(0);" title="<?php echo T_("Delete");?>"  class="tbutton thapus" onclick="hapus('<?php echo $row["id"]; ?>')">&nbsp;</a></td>
</tr>
<?php $x++; } ?>
</table>
</div>
<?php include('pagez.php');?>