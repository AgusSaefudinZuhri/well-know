<input type="hidden" id="pg" value="<?php if(isset($_GET["pg"])) echo $_GET["pg"]; else echo "1";?>" />
<?php include_once('includes/config.php'); 

$stDownload	= 0;

$limit=" ORDER BY id DESC ";

if(isset($_GET["pg"])) 
	 $limit	.= " LIMIT ".(($_GET["pg"]-1)*$perpage).",".$perpage; 
else $limit	.= " LIMIT 0,".$perpage;

$where	= "";

if(isset($_GET["pf"])) {
	switch($_GET["pf"]) {
	case "1": $where	.= " AND a.deskripsi like '%".$_GET["vf"]."%'"; break;
	}
}

?>
<div class="wrapper">
<table class="xuser" style="width: 100%; margin: 0;">
<tr class="tHeader">
<td style="width:  25px !important; text-align:center;"><?php echo T_("No");?></td>
<td style="width: 250px; text-align:center;"><?php echo T_("Description");?></td>
<td style="width: 125px; text-align:center;"><?php echo T_("Post Time");?></td>
<td style="width: 100px !important; text-align:center;"></td>
</tr>


<?php 
$tqry	=	"
		SELECT a.*
		FROM g_techdoc a 
		WHERE a.status IN ( '1' ) 
		".$where;

$qry0	= mysql_query($tqry);

$numRows	= mysql_num_rows($qry0);
$pages		= ceil( $numRows /$perpage);

$qry=mysql_query($tqry.$limit);

if(isset($_GET["pg"])) $x=($_GET["pg"]-1)*$perpage+1; else $x=1;

while($row=mysql_fetch_array($qry)) { ?>
<tr class="tContent<?php if(($x-1)%2) echo ' genap';?>" >
    <td style="text-align:center;vertical-align: middle;"><?php echo $x; ?></td>
    <td style="text-align:left; "><span style=""><?php echo $row["deskripsi"]; ?></span></td>
    <td style="text-align:center;vertical-align: middle;"><?php echo date('d M Y H:i:s', strtotime( $row["tglpost"]." ".$row["waktupost"] ) ); ?></td>
    <td style="text-align:center;vertical-align: middle;">
    	<a href="javascript:void(0);" title="<?php echo T_("View");?>" class="tbutton tsearch" onclick="window.open( '<?php echo $row["doclink"]; ?>', '_blank' )">&nbsp;</a>
    	<a href="javascript:void(0);" title="<?php echo T_("Delete");?>" class="tbutton thapus" onclick="hapus('<?php echo $row["id"]; ?>')">&nbsp;</a>
        </td>
</tr>
<?php $x++; } ?>
</table>
</div>
<?php include('pagez.php');?>