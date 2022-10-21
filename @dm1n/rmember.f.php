<input type="hidden" id="pg" value="<?php if(isset($_GET["pg"])) echo $_GET["pg"]; else echo "1";?>" />
<?php include_once('includes/config.php'); 
//echo "regfee".$regfee;
$stDownload	= 0;

$limit		= " ORDER BY a.tglaktif ASC ";
if(isset($_GET["pg"])) 
	 $limit	.= " LIMIT ".(($_GET["pg"]-1)*$perpage).",".$perpage; 
else $limit	.= " LIMIT 0,".$perpage;

if(isset($_GET["pf"])) {
	switch($_GET["pf"]) {
	case "1": $where=" AND a.userid like '%".$_GET["vf"]."%'"; break;
	case "2": $where=" AND a.nmmember like '%".$_GET["vf"]."%'"; break;
	case "3": $where=" AND b.nmjmember like '%".$_GET["vf"]."%'"; break;

	}
}

else $where="";
?>
<div class="wrapper">
<table class="xuser" style="width: 100%; margin: 0;">
<tr class="tHeader" >
<td style="width: 50px !important; text-align:center;"><?php echo T_("No");?></td>
<td style="width: 100px; text-align:center;"><?php echo T_("UserID");?></td>
<td style="width: 125px; text-align:center;"><?php echo T_("Name");?></td>
<td style="width: 75px; text-align:center;"><?php echo T_("Active Date");?></td>
<td style="width: 75px; text-align:center;"><?php echo T_("Status");?></td>
<td style="width: 75px; text-align:center;"></td>
</tr>

<?php 
$tqry="
		SELECT a.*
		FROM g_member a
		WHERE a.root='1'		
		AND a.status IN ('0', '1') ".$where;

$qry0=mysql_query($tqry);

$numRows	= mysql_num_rows($qry0);
$pages		= ceil( $numRows /$perpage);

$qry=mysql_query($tqry.$limit);
//echo $tqry.$limit;
if(isset($_GET["pg"])) $x=($_GET["pg"]-1)*$perpage+1; else $x=1;

while($row=mysql_fetch_array($qry)) { ?>
<tr class="tContent<?php if(($x-1)%2) echo ' genap';?>" >
    <td style="text-align:center;"><?php echo $x; ?></td>
    <td style="text-align:center;"><?php echo $row["userid"]; ?></td>
    <td style="text-align:center;"><?php echo $row["nmmember"]; ?></td>
    <td style="text-align:center;"><?php echo date('d M Y', strtotime($row["tglaktif"])); ?></td>
    <td style="text-align:center;"><?php 
		switch($row["status"]) { 
        	case "1": echo $stAktif; break; 
			case "0": echo $stTdkAktif; break; 
			} ?>
		</td>
    <td style="text-align:center;">
		<?php if($row["cid"]=='0') { if($row["status"]=='1') { ?>
        	<a href="javascript:void(0);" title="<?php echo $nonAktifkanBtn;?>"  class="tbutton ton" onclick="hapus('<?php echo $row["userid"]; ?>')">&nbsp;</a>
		<?php } else { ?>
        	<a href="javascript:void(0);" title="<?php echo $aktifkanBtn;?>"  class="tbutton toff" onclick="aktifk('<?php echo $row["userid"]; ?>')">&nbsp;</a>
		<?php } } ?>
        </td>
</tr>
<?php $x++; } ?>
</table>
</div>
<?php include('pagez.php');?>