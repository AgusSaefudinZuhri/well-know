<?php 

	include_once('includes/config.php'); 

	$limit	= " ORDER BY logintgl DESC, loginwaktu DESC";
	if(isset($_GET["pg"])) $limit	.= " LIMIT ".(($_GET["pg"]-1)*$perpage).",".$perpage; 
	else $limit	.= " LIMIT 0,".$perpage;
	
	$where	= "";
	
/*
	if(isset($_GET["pf"]) and isset($_GET["vf"])) $yearmonth = $_GET["vf"].'-'.$_GET["pf"].'-01';
	else $yearmonth = date('Y').'-'.date('m').'-01';
	
	$dbegin = date('Y-m-01', strtotime($yearmonth));
	$dend	= date('Y-m-t', strtotime($yearmonth));
	
	$where .=" HAVING tglproses BETWEEN '".$dbegin."' AND '".$dend."'";
*/	

?>
<input type="hidden" id="pg" value="<?php if(isset($_GET["pg"])) echo $_GET["pg"]; else echo "1";?>" />
<div class="mwrapper" style="padding-top: 5px;">
<table class="xuser" style="width: 100%; min-width: 300px;">
<tr class="tHeader" >
	<td style="width:  25px !important; text-align:center;"><?php echo T_("No");?></td>
	<td style="width: 100px; text-align:center;"><?php echo T_("Browser");?></td>
	<td style="width: 100px; text-align:center;"><?php echo T_("Date");?></td>
	<td style="width: 100px; text-align:center;"><?php echo T_("IP Address");?></td>
</tr>

<?php 
$tqry="
	SELECT a.*
	FROM g_session a
	WHERE a.userid =  '".$_SESSION["userid"]."' ".$where;

$qry0=mysqli_query($tqry);

$pages=ceil(mysqli_num_rows($qry0)/$perpage);

$qry=mysqli_query($tqry.$limit);

// echo $tqry.$limit;

if(isset($_GET["pg"])) $x=($_GET["pg"]-1)*$perpage+1; else $x=1;

while($row=mysqli_fetch_array($qry)) { ?>
<tr class="tContent <?php if(($x-1)%2) echo 'genap';?>" style=" <?php if($row["status"]=='1') echo 'font-style: italic; color: red;';?>" >
<td style="text-align:center;"><?php echo $x; ?></td>
<td style="text-align:center;"><?php echo $row["userbrowser"];?><?php if($row["status"]=='1') echo " - Current Session "; ?></td>
<td style="text-align:center;"><?php echo $row["userip"];?></td>

<td style="text-align:center;"><?php echo date('d M Y H:i:s', strtotime($row["logintgl"]." ".$row["loginwaktu"])); ?></td>
</tr>
<?php $x++; } ?>
</table>
</div>
<div class="pagez"><?php include('pagez.php'); ?></div>