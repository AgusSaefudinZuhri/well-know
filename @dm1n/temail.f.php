<input type="hidden" id="pg" value="<?php if(isset($_GET["pg"])) echo $_GET["pg"]; else echo "1";?>" />
<?php include_once('includes/config.php'); 
//echo "regfee".$regfee;
if(isset($_GET["pg"])) $limit=" ORDER BY a.nmtemplate ASC LIMIT ".(($_GET["pg"]-1)*$perpage).",".$perpage; else $limit=" ORDER BY a.nmtemplate ASC LIMIT 0,".$perpage;

if(isset($_GET["pf"])) {
	switch($_GET["pf"]) {
	case "1": $where=" AND a.nmtemplate like '%".$_GET["vf"]."%'"; break;
	}
}

else $where="";
?>
<div class="wrapper">
<table class="xuser" style="width: 100%; margin: 0;">
<tr class="tHeader" >
<td style="width: 50px !important; text-align:center;"><?php echo T_("No");?></td>
<td style="width: 650px; text-align:center;"><?php echo T_("Nama Template");?></td>
<td style="width: 100px; text-align:center;"></td>
</tr>
<?php 
$tqry="SELECT a.* FROM g_temail a WHERE 1=1 ".$where;

$qry0=mysql_query($tqry);

$pages=ceil(mysql_num_rows($qry0)/$perpage);

$qry=mysql_query($tqry.$limit);

if(isset($_GET["pg"])) $x=($_GET["pg"]-1)*$perpage+1; else $x=1;

while($row=mysql_fetch_array($qry)) { ?>
<tr class="tContent<?php if(($x-1)%2) echo ' genap';?>" >
<td style="text-align:center;"><?php echo $x; ?></td>
<td style="text-align:left;"><?php echo $row["nmtemplate"]; ?></td>
<td style="text-align:center;"><a href="javascript:void(0);" title="<?php echo T_("Edit");?>" class="tbutton tedit" onclick="edit('<?php echo $row["id"]; ?>')">&nbsp;</a></td>
</tr>
<?php $x++; } ?>
</table>
</div>
<?php include('pagez.php');?>