<input type="hidden" id="pg" value="<?php if(isset($_GET["pg"])) echo $_GET["pg"]; else echo "1";?>" />
<?php include_once('includes/config.php'); 

if(isset($_GET["pg"])) $limit=" ORDER BY id ASC LIMIT ".(($_GET["pg"]-1)*$perpage).",".$perpage; 
else $limit=" ORDER BY id ASC LIMIT 0,".$perpage;

if(isset($_GET["pf"])) {
	switch($_GET["pf"]) {
	case "1": $where=" AND a.nmgjfinance like '%".$_GET["vf"]."%'"; break;
	}
}

else $where="";
?>
<div class="wrapper">
<table class="xuser" style="width: 100%; margin: 0;">
<tr class="tHeader">
<td style="width:  50px !important; text-align:center;"><?php echo T_("No");?></td>
<td style="width: 200px; text-align:center;"><?php echo T_("Group");?></td>
<td style="width: 150px; text-align:center;"><?php echo T_("Deposit Script");?></td>
<td style="width: 150px; text-align:center;"><?php echo T_("Withdrawal Script");?></td>
<td style="width: 100px; text-align:center;"><?php echo T_("Status");?></td>
<td style="width: 100px; text-align:center;"></td>
</tr>
<?php 
$tqry="SELECT a.* FROM g_gjfinance a WHERE a.status IN ('0', '1') ".$where;

$qry0=mysql_query($tqry);

$pages=ceil(mysql_num_rows($qry0)/$perpage);

$qry=mysql_query($tqry.$limit);

if(isset($_GET["pg"])) $x=($_GET["pg"]-1)*$perpage+1; else $x=1;

while($row=mysql_fetch_array($qry)) { ?>
<tr <?php if(($x-1)%2) echo 'style="background: #e7e7e7;"';?>>
<td style="text-align:center;"><?php echo $x; ?></td>
<td style="text-align:center;"><?php echo $row["nmgjfinance"]; ?></td>
<td style="text-align:center;"><?php echo $row["scdeposit"]; ?></td>
<td style="text-align:center;"><?php echo $row["scwithdraw"]; ?></td>

<td style="text-align:center;"><?php switch($row["status"]) { case "1": echo T_("Active"); break; case "0": echo T_("Not Active"); break; } ?></td>
<td style="text-align:center;">
	<a href="javascript:void(0);" title="<?php echo T_("Edit");?>" class="tbutton tedit" onclick="edit('<?php echo $row["id"]; ?>')">&nbsp;</a>&nbsp;
	<?php if($row["status"]=='1') { ?>
	<a href="javascript:void(0);" title="<?php echo T_("Deactivate");?>"  class="tbutton ton" onclick="hapus('<?php echo $row["id"]; ?>')">&nbsp;</a>
	<?php } else { ?>
	<a href="javascript:void(0);" title="<?php echo T_("Activate");?>"  class="tbutton toff" onclick="aktifk('<?php echo $row["id"]; ?>')">&nbsp;</a>
	<?php } ?>
	</td>
</tr>
<?php $x++; } ?>
</table>
</div>
<?php include('pagez.php'); ?>