<input type="hidden" id="pg" value="<?php if(isset($_GET["pg"])) echo $_GET["pg"]; else echo "1";?>" />
<?php include_once('includes/config.php'); 

$stDownload	= 0;

$limit=" ORDER BY stupdate ASC, tglupdate DESC, waktuupdate DESC ";

if(isset($_GET["pg"])) 
	 $limit	.= " LIMIT ".(($_GET["pg"]-1)*$perpage).",".$perpage; 
else $limit	.= " LIMIT 0,".$perpage;

$where	= "";

if(isset($_GET["pf"])) {
	switch($_GET["pf"]) {
	case "1": $where	.= " AND a.userid like '%".$_GET["vf"]."%'"; break;
	}
}

?>
<div class="wrapper">
<table class="xuser" style="width: 100%; margin: 0;">
<tr class="tHeader">
<td style="width:  25px !important; text-align:center;"><?php echo T_("No");?></td>
<td style="width: 125px; text-align:center;"><?php echo T_("UserID");?></td>
<td style="width:  100px; text-align:center;"><?php echo T_("Subject");?></td>
<td style="width: 200px; text-align:center;"><?php echo T_("Last Message");?></td>
<td style="width: 100px; text-align:center;"><?php echo T_("Update Time");?></td>
<td style="width:  75px !important; text-align:center;"></td>
</tr>

<?php 
$tqry	=	"
		SELECT a.*
		FROM g_tiket a 
		WHERE a.status IN ( '1') 
		".$where;

$qry0	= mysqli_query($tqry);

$numRows	= mysqli_num_rows($qry0);
$pages		= ceil( $numRows /$perpage);

$qry=mysqli_query($tqry.$limit);

if(isset($_GET["pg"])) $x=($_GET["pg"]-1)*$perpage+1; else $x=1;

while($row=mysqli_fetch_array($qry)) { 
	$aTxt = "SELECT * FROM g_tiketdt WHERE tiketid = '".$row["id"]."' ORDER BY id DESC";
	$aQry = mysqli_query( $aTxt );
	$aRow = mysqli_fetch_array( $aQry );
	?>
<tr class="tContent<?php if(($x-1)%2) echo ' genap';?>" style=" <?php if($row["stupdate"]==0) echo 'font-weight: bold;'; ?>" >
    <td style="text-align:center;vertical-align: middle;"><?php echo $x; ?></td>
    <td style="text-align:left; "><span style=""><?php echo $row["userid"]; ?></span></td>
    <td style="text-align:center;vertical-align: middle;"><?php echo $row["judul"]; ?></td>
    <td style="text-align:center;vertical-align: middle;"><?php echo $aRow["pesan"]; ?></td>
    <td style="text-align:center;vertical-align: middle;"><?php echo date('d M Y H:i:s', strtotime( $row["tglupdate"]." ".$row["waktuupdate"] ) ); ?></td>
    <td style="text-align:center;vertical-align: middle;">
    	<a href="javascript:void(0);" title="<?php echo T_("Edit");?>" class="tbutton tedit" onclick="edit('<?php echo $row["id"]; ?>')">&nbsp;</a>
        </td>
</tr>
<?php $x++; } ?>
</table>
</div>
<?php include('pagez.php');?>