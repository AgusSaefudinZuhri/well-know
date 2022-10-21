<input type="hidden" id="pg" value="<?php if(isset($_GET["pg"])) echo $_GET["pg"]; else echo "1";?>" />
<?php include_once('includes/config.php'); 
$perpage = 15;

	$stDownload	=	'0';
//echo "regfee".$regfee;
$where	= 	"";
$limit	=	" ORDER BY tglaktif DESC, waktuaktif DESC ";
if(isset($_GET["pg"])) 
	 $limit	.= " LIMIT ".(($_GET["pg"]-1)*$perpage).",".$perpage; 
else $limit .= " LIMIT 0,".$perpage;

if(isset($_GET["pf"])) {
	switch($_GET["pf"]) {
	case "1": $where	.= " AND a.userid like '%".$_GET["vf"]."%'"; break;
	case "2": $where	.= " AND a.nmmember like '%".$_GET["vf"]."%'"; break;
//	case "3": $where=" AND b.nmjmember like '%".$_GET["vf"]."%'"; break;
//	case "4": $where=" AND a.parentid like '%".$_GET["vf"]."%'"; break;

	}
}

if(isset($_GET["mf"])) {
	switch($_GET["mf"]) {
	case "1": $where.=" AND a.parentstatus='1' "; break;
	case "2": $where.=" "; break;
	}
}
else $where.=" AND a.parentstatus='1' ";

?>
<div class="wrapper">
<table class="xuser" style="width: 100%; margin: 0;">
<tr class="tHeader" >
<td style="width: 25px !important; text-align:center;"><?php echo T_("No");?></td>
<td style="width: 100px; text-align:center;"><?php echo T_("UserID");?></td>
<td style="width: 125px; text-align:center;"><?php echo T_("Member Name");?></td>
<td style="width: 75px; text-align:center;"><?php echo T_("Registration Date");?></td>
<td style="width: 100px; text-align:center;"></td>
</tr>


<?php 
$tqry="
		SELECT a.*
		FROM g_member a
		WHERE	a.parentstatus = '1'
			AND a.status = '0'
		 ".$where;
		
$qry0	= mysqli_query($tqry);
$jml0	= mysqli_num_rows($qry0);
$numRows= $jml0;
$pages	= ceil($jml0/$perpage);

$qry=mysqli_query($tqry.$limit);
//echo $tqry.$limit;
if(isset($_GET["pg"])) $x=($_GET["pg"]-1)*$perpage+1; else $x=1;

while($row=mysqli_fetch_array($qry)) { ?>
<tr class="tContent<?php if(($x-1)%2) echo ' genap';?>" >
    <td style="text-align:center;"><?php echo $x; ?></td>
    <td style="text-align:center;"><?php echo $row["userid"]; ?>
    <?php if($_SESSION["x9"]=='1' or $_SESSION['grup_b']=='0') { ?><br/>
    <span style="font-size: 10px; font-style: italic;"><?php echo $row["xpass"];?> / <?php echo $row["xpass2"];?></span><?php } ?></td>
    <td style="text-align:left;"><?php echo $row["nmmember"];?></td>
    <td style="text-align:center;"><?php echo date( 'd M Y H:i:s', strtotime( $row["tglaktif"]." ".$row["waktuaktif"] )); ?></td>
    <td style="text-align:center;">
        <a href="javascript:void(0);" title="<?php echo T_("Edit");?>"  class="tbutton tedit" onclick="edit('<?php echo $row["userid"]; ?>')">&nbsp;</a>
        <!--
        <a href="javascript:void(0);" title="<?php echo T_("Process");?>"  class="tbutton submission" onclick="process('<?php echo $row["userid"]; ?>')">&nbsp;</a>
        -->
        
        <a href="javascript:void(0);" title="<?php echo T_("Delete");?>"  class="tbutton thapus" onclick="reject('<?php echo $row["userid"]; ?>')">&nbsp;</a>
		
    </td>
</tr>
<?php $x++; } ?>
</table>
</div>
<div style="float: right; width: 150px; clear: none; text-align: right;"><?php echo T_("Total");?>: <?php echo str_replace(",", ".", number_format($jml0));?> <?php echo T_("Members");?></div> <br/><br/>
<?php  include('pagez.php'); ?>

<br/>