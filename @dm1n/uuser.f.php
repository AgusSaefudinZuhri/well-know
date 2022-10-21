<input type="hidden" id="pg" value="<?php if(isset($_GET["pg"])) echo $_GET["pg"]; else echo "1";?>" />
<?php include_once('includes/config.php'); 

$stDownload	= 0;

$limit	= " ORDER BY a.username ASC ";

if(isset($_GET["pg"])) 
	 $limit	.= " LIMIT ".(($_GET["pg"]-1)*$perpage).",".$perpage; 
else $limit	.= " LIMIT 0,".$perpage;

if(isset($_GET["pf"])) {
	switch($_GET["pf"]) {
	case "1": $where=" AND a.nama like '%".$_GET["vf"]."%'"; break;
	case "2": $where=" AND a.username like '%".$_GET["vf"]."%'"; break;
	case "3": $where=" AND b.nama like '%".$_GET["vf"]."%'"; break;
	}
}

else $where="";
?>
<div class="wrapper">
<table class="xuser" style="width: 100%; margin: 0;">
<tr class="tHeader" >
<td style="width: 50px !important; text-align:center;"><?php echo T_("No");?></td>
<td style="width: 350px; text-align:center;"><?php echo T_("Name");?></td>
<td style="width: 150px; text-align:center;"><?php echo T_("UserName");?></td>
<td style="width: 150px; text-align:center;"><?php echo T_("Group");?></td>
<td style="width: 100px; text-align:center;"></td>
</tr>
<?php 
$tqry	=	"
		SELECT a.*, b.nama gnama 
		FROM g_users a 
		LEFT JOIN g_guser b ON a.grupid=b.id 
		WHERE a.status='1' AND a.grupid>'0' 
		".$where;

$qry0=mysql_query($tqry);

$numRows	= mysql_num_rows($qry0);
$pages		= ceil( $numRows /$perpage);

$qry=mysql_query($tqry.$limit);

if(isset($_GET["pg"])) $x=($_GET["pg"]-1)*$perpage+1; else $x=1;

while($row=mysql_fetch_array($qry)) { ?>
<tr class="tContent<?php if(($x-1)%2) echo ' genap';?>" >
<td style="text-align:center;"><?php echo $x; ?></td>
<td style="text-align:left;"><?php echo $row["nama"]; ?></td>
<td style="text-align:left;"><?php echo $row["username"]; ?></td>
<td style="text-align:left;"><?php echo $row["gnama"]; ?></td>
<td style="text-align:center;">
<a href="javascript:void(0);" title="<?php echo T_("Edit");?>" class="tbutton tedit" onclick="edit('<?php echo $row["username"]; ?>')">&nbsp;</a>&nbsp;&nbsp;
<a href="javascript:void(0);" title="<?php echo T_("Delete");?>"  class="tbutton thapus" onclick="hapus('<?php echo $row["username"]; ?>')">&nbsp;</a></td>
</tr>
<?php $x++; } ?>
</table>
</div>
<?php include('pagez.php');?>