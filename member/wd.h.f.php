<?php 

	include_once('includes/config.php'); 

	$limit	= " ORDER BY tglinput DESC, waktuinput DESC";
	if(isset($_GET["pg"])) $limit	.= " LIMIT ".(($_GET["pg"]-1)*$perpage).",".$perpage; 
	else $limit	.= " LIMIT 0,".$perpage;
	
	$where	= "";
	
/*
	if(isset($_GET["pf"]) and isset($_GET["vf"])) $yearmonth = $_GET["vf"].'-'.$_GET["pf"].'-01';
	else $yearmonth = date('Y').'-'.date('m').'-01';
	
	$dbegin = date('Y-m-01', strtotime($yearmonth));
	$dend	= date('Y-m-t', strtotime($yearmonth));
	
	$where .=" HAVING tglapprove BETWEEN '".$dbegin."' AND '".$dend."'";
*/	

?>
<input type="hidden" id="pg" value="<?php if(isset($_GET["pg"])) echo $_GET["pg"]; else echo "1";?>" />
<div class="mwrapper" style="padding-top: 5px;">
<table class="xuser" style="width: 100%; min-width: 300px;">
<tr class="tHeader" >
<td style="width:  100px !important; text-align:center;"><?php echo T_("Transaction ID");?></td>
<td style="width: 100px; text-align:center;"><?php echo T_("Details");?></td>
<td style="width: 100px; text-align:center;"><?php echo T_("Status");?></td>
<td style="width: 100px; text-align:center;"><?php echo T_("Date");?></td>
</tr>

<?php 
$tqry="
	SELECT 
		a.refno, 
		SUM(IF(useridx='withdrawal', trxvalue, '0' ) ) jwd, 
		SUM(IF(useridx='admincharge', trxvalue, '0' ) ) jadmin,
		tglinput, waktuinput,
		tglapprove, waktuapprove, GROUP_CONCAT(remark2) remark2,
		status
	FROM g_wfund a
	WHERE a.userid =  '".$_SESSION["userid"]."' AND a.jtransaksi='1' AND a.jtransaksix='3' ".$where."
	GROUP BY refno
	";

$qry0=mysql_query($tqry);

$pages=ceil(mysql_num_rows($qry0)/$perpage);

$qry=mysql_query($tqry.$limit);

// echo $tqry.$limit;

if(isset($_GET["pg"])) $x=($_GET["pg"]-1)*$perpage+1; else $x=1;

while($row=mysql_fetch_array($qry)) { ?>
<tr class="tContent <?php if(($x-1)%2) echo 'genap';?>" style=" <?php // if($row["jtransaksi"]=='1') echo 'font-style: italic; color: red;';?>" >
<td style="text-align:left;"><?php echo $row["refno"];?></td>

<td style="text-align:left;">
	<p>Requested Amount : <?php echo $dcurrency." ".number_format($row["jwd"] + $row["jadmin"],2); ?></p>
	<p>Receivable Amount : <?php echo $dcurrency." ".number_format($row["jwd"],2); ?></p>
	<p>Admin Charge : <?php echo $dcurrency." ".number_format($row["jadmin"],2); ?></p>
    </td>
<td style="text-align:left;">
	<p>Withdrawal Status : <?php switch( $row["status"] ) {
		case "0" : echo '<span style="" class="label label-warning" >Pending</span>'; break;
		case "1" : echo '<span style="" class="label label-success" >Received</span>'; break;
		case "99" : echo '<span style="" class="label label-danger" >Rejected</span>'; break;

}?></p>
	<p>Requested Date : <?php echo date( 'd M Y H:i:s', strtotime( $row["tglinput"]." ".$row["waktuinput"] ) );?></p>
	<p>Payment Date : <?php echo date( 'd M Y H:i:s', strtotime( $row["tglapprove"]." ".$row["waktuapprove"] ) );?></p>
	<p>Remarks : <?php echo $row["remark2"];?></p>
    </td>

<td style="text-align:center;"><?php echo date('d M Y H:i:s', strtotime($row["tglinput"]." ".$row["waktuinput"])); ?></td>


</tr>
<?php $x++; } ?>
</table>
</div>
<div class="pagez"><?php include('pagez.php'); ?></div>