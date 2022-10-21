<?php 

	include_once('includes/config.php'); 
	include_once("../api/tFunction.php");
	include_once("../api/tFunctionGET.php");

?>
<input type="hidden" id="pg" value="<?php if(isset($_GET["pg"])) echo $_GET["pg"]; else echo "1";?>" />
<div class="mwrapper" style="padding-top: 5px;">
<table class="xuser" style="width: 100%; min-width: 300px;">
<tr class="tHeader" >
<td style="width: 100px; text-align:center;vertical-align: middle;"><?php echo T_("Account ID");?></td>
<!--
<td style="width: 150px; text-align:center;vertical-align: middle;"><?php echo T_("Group");?></td>
<td style="width: 150px; text-align:center;vertical-align: middle;"><?php echo T_("Leverage");?></td>
-->
<td style="width: 150px; text-align:center;vertical-align: middle;"><?php echo T_("Balance");?></td>
</tr>


<?php 
$tqry="
	SELECT a.*	FROM g_extroakun a
	WHERE a.userid =  '".$_SESSION["userid"]."' 
	ORDER BY a.id ASC
	LIMIT 0,10
	";

$qry0=mysql_query($tqry);

$pages=ceil(mysql_num_rows($qry0)/$perpage);

$qry=mysql_query($tqry.$limit);

// echo $tqry.$limit;

if(isset($_GET["pg"])) $x=($_GET["pg"]-1)*$perpage+1; else $x=1;

while($row=mysql_fetch_array($qry)) { ?>
<tr class="tContent <?php if(($x-1)%2) echo 'genap';?>" style=" <?php // if($row["jtransaksi"]=='1') echo 'font-style: italic; color: red;';?>" >
	<td style="text-align:center;"><!--<a href="javascript: void(0);" onclick="drill('<?php echo $row["extakunid"];?>')">--><?php echo $row["extakunid"];?></a></td>
	<!--
	<td style="text-align:center;"><?php echo $row["extgroup"];?></td>
	<td style="text-align:center;"><?php echo $row["extleverage"];?></td>
	-->
	<td style="text-align:center;"><?php 
									 
	$cari = getBalance($row["extakunid"]);
	//echo $cari;
	$hasil = get_contentGet( $cari );
	//echo $hasil;
	$getBalance = json_decode( $hasil, true );
	if( $getBalance["isSuccess"] ) echo number_format( $getBalance["balance"],2 ); else echo 'N/A'; 
								 
	?></td>
</tr>
<?php $x++; } ?>
</table>
</div>
<div class="pagez"><?php include('pagez.php'); ?></div>