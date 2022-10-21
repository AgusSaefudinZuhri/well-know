<input type="hidden" id="pg" value="<?php if(isset($_GET["pg"])) echo $_GET["pg"]; else echo "1";?>" />
<?php include_once('includes/config.php'); 
//echo "regfee".$regfee;
if(isset($_GET["pg"])) $limit=" ORDER BY a.nmjfinance ASC LIMIT ".(($_GET["pg"]-1)*$perpage).",".$perpage; else $limit=" ORDER BY a.nmjfinance ASC LIMIT 0,".$perpage;

if(isset($_GET["pf"])) {
	switch($_GET["pf"]) {
	case "1": $where=" AND a.nmjfinance like '%".$_GET["vf"]."%'"; break;
	}
}

else $where="";
?>
<div class="wrapper">
<table class="xuser" style="width: 100%; margin: 0;">
<tr class="tHeader" >
<td style="width: 50px !important; text-align:center;"><?php echo T_("ID");?></td>
<td style="width: 200px; text-align:center;"><?php echo T_("Service");?></td>
<td style="width: 100px; text-align:center;"><?php echo T_("Group");?></td>
<td style="width: 100px; text-align:center;"><?php echo T_("Process Time");?></td>
<td style="width: 100px; text-align:center;"><?php echo T_("Comission");?></td>
<td style="width: 100px; text-align:center;"><?php echo T_("Currency");?></td>
<td style="width: 100px; text-align:center;"><?php echo T_("Status");?></td>
<td style="width: 100px; text-align:center;"></td>
</tr>
<?php 
$tqry	= "
	SELECT a.*, b.nmgjfinance, c.ckurs
	FROM g_jfinance a
	LEFT JOIN g_gjfinance b ON a.gjfinanceid = b.id
	LEFT JOIN (
		SELECT x.jfinanceid, GROUP_CONCAT(y.id) ckurs
		FROM g_jfinancekurs x
		LEFT JOIN g_kurs y ON x.kursid = y.id
		GROUP BY x.jfinanceid
		) c ON a.id = c.jfinanceid
	WHERE a.status IN ('0', '1') 
	".$where." GROUP BY a.id";

$qry0=mysql_query($tqry);

$pages=ceil(mysql_num_rows($qry0)/$perpage);

$qry=mysql_query($tqry.$limit);
//echo $tqry.$limit;
if(isset($_GET["pg"])) $x=($_GET["pg"]-1)*$perpage+1; else $x=1;

while($row=mysql_fetch_array($qry)) { ?>
<tr <?php if(($x-1)%2) echo 'style="background: #e7e7e7;"';?>>
	<td style="text-align:center;"><?php echo $row["id"]; ?></td>
	<td style="text-align:center;"><?php if($row["iconlink"]!='') echo '<img src="'.$row["iconlink"].'" height="50" > '; ?><?php echo $row["nmjfinance"]; ?></td>
	<td style="text-align:center;"><?php echo $row["nmgjfinance"]; ?></td>
	<td style="text-align:center;"><?php echo $row["wkproses"]; ?></td>
	<td style="text-align:center;"><?php echo $row["vlkomisi"]; ?></td>
	<td style="text-align:center;"><?php echo $row["ckurs"]; ?></td>	
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
<?php include('pagez.php');?>