<?php include_once('includes/config.php'); 
if($_SESSION['userid']==$_SESSION['parentid']) $whereUser=" a.parentid='".$_SESSION["userid"]."'"; else $whereUser=" a.userid='".$_SESSION["userid"]."'";

?>
<input type="hidden" id="pg" value="<?php if(isset($_GET["pg"])) echo $_GET["pg"]; else echo "1";?>" />
<?php

$limit = " ORDER BY a.tglinput DESC, a.waktuinput DESC";
if(isset($_GET["pg"])) $limit .= " LIMIT ".(($_GET["pg"]-1)*$perpage).",".$perpage; 
else $limit .= " LIMIT 0,".$perpage;

$where	= "";
//if(isset($_GET["id"])) $id = $_GET["id"]; else $id=$id;

//if(isset($_GET["pg"])) $limit=" ORDER BY tglx, jtransaksi, jkomisi ASC "; 
//else $limit=" ORDER BY tglx, jtransaksi, jkomisi ASC";


if(isset($_GET["pf"]) and isset($_GET["vf"])) $yearmonth = $_GET["vf"].'-'.$_GET["pf"].'-01';
else $yearmonth = date('Y').'-'.date('m').'-01';

$dbegin = date('Y-m-01', strtotime($yearmonth));
$dend	= date('Y-m-t', strtotime($yearmonth));

$where .=" AND a.tglinput BETWEEN '".$dbegin."' AND '".$dend."'";

//if(!isset($_GET["of"])) $where .= " AND ( userid =  '".$_SESSION["userid"]."' OR parentid =  '".$_SESSION["userid"]."' ) ";
//else $where .= " AND ( userid =  '".$_GET["of"]."' OR parentid =  '".$_GET["of"]."' ) ";

//$where .= " AND a.userid =  '".$_SESSION["userid"]."'";
?>
<div class="mwrapper" style="">
<br/>

<table class="xuser" style="width: 100%; min-width: 600px; margin: 0 auto;">
<tr class="tHeader" >
<td style="width: 25px !important; text-align:center;"><?php echo T_("No");?></td>
<td style="width: 100px; text-align:center;"><?php echo T_("MT4 Account");?></td>
<td style="width: 100px; text-align:center;"><?php echo T_("Date");?></td>
<td style="width: 100px; text-align:center;"><?php echo T_("Description");?></td>
<td style="width: 100px; text-align:center;"><?php echo T_("Value");?></td>
<td style="width: 100px; text-align:center;"><?php echo T_("in");?> <?php echo $dcurrency;?></td>
<td style="width: 100px; text-align:center;"><?php echo T_("Status");?></td>
<td style="width: 100px; text-align:center;"><?php echo T_("Note");?></td>

</tr>

<?php 


$tqry="
	SELECT 
		a.*, 
		CONCAT(a.jtransaksix, a.jtransaksi) xjtransaksi
	FROM g_wmt4 a
	WHERE  ".$whereUser." ".$where."
";


$qry0=mysqli_query($tqry);

$pages=ceil(mysqli_num_rows($qry0)/$perpage);

$qry=mysqli_query($tqry.$limit);

//echo $tqry.$limit;

if(isset($_GET["pg"])) $x=($_GET["pg"]-1)*$perpage+1; else $x=1;

while($row=mysqli_fetch_array($qry)) { ?>
<tr class="tContent" style="<?php if(($x-1)%2) echo 'background: #e7e7e7;'; ?>" >
<td style="text-align:center;"><?php echo $x; ?></td>
<td style="text-align:center;"><?php echo $row["extakunid"]; ?></td>
<td style="text-align:center;"><?php echo date('d M Y', strtotime($row["tglinput"]))." ".$row["waktuinput"]; ?></td>
<td style="text-align:center;"><?php 
	switch($row["xjtransaksi"]) {
		case "00": echo "Deposit"; break;
		case "01": echo "Withdrawal"; break;	
	}

?></td>
<td style="text-align:center;"><?php if($row["trxvalue"]!='') echo $row["kursid"].' '.number_format($row["trxvalue"],2); ?></td>
<td style="text-align:center;"><?php if($row["fintrxvalue"]!='') echo number_format($row["fintrxvalue"],2); ?></td>
<td style="text-align:center;"><?php switch($row["status"]=='1') {
		case "0" : echo "Processing"; break;		
		case "1" : echo "Success"; break;		
		case "99" : echo "Failed"; break;		

	}; ?></td>
<td style="text-align:left;"><?php echo $row["remark2"]; ?></td>
</tr>
<?php $x++; } ?>
</table>
</div>
<div class="pagez">
<?php 
include('pagination.php');
?></div>
<br/>