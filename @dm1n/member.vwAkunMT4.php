<?php 
include_once('includes/config.php'); 
	include_once("../api/tFunction.php");
	include_once("../api/tFunctionGET.php");

$txt	= "
	SELECT a.*, b.nmmember
	FROM g_extroakun a
	LEFT JOIN g_member b ON a.userid = b.userid
	WHERE a.extakunid ='".$_GET["id"]."'
	";
//echo $txt;
$row	= mysql_fetch_array(mysql_query( $txt ));


$cari = getBalance($_GET["id"]);
	//echo $cari;
	$hasil = get_contentGet( $cari );
	//echo $hasil;
	$getBalance = json_decode( $hasil, true );
	if( $getBalance["isSuccess"] ) $balance = number_format( $getBalance["balance"],2 ); else $balance = 'N/A'; 
?>

</script> 

<div style="padding: 10px;">
<span style="font-size: 16px; font-weight: bold;"><?php echo strtoupper(T_("View MT4 Account")); ?></span>
<div style="height: 400px; overflow-x: hidden; overflow-y: auto; margin-bottom: 5px;">

<table style="width: 540px;">
<tbody>

<tr class="tHeader">
<td style="text-align: center; padding: 5px;" colspan="3"><?php echo T_("Account Information"); ?></td>
</tr>

<tr><td style="width: 150px; vertical-align: middle;"><?php echo T_("Full Name"); ?></td>	
<td style="vertical-align: middle;">:</td>
<td><?php echo $row['nmmember'];?>
</td></tr>

<tr>
	<td style="width: 150px; vertical-align: middle;"><?php echo T_("UserID"); ?></td>	
	<td style="vertical-align: middle;">:</td>
	<td><span style="font-weight: bold;"><?php echo $row["userid"]; ?></span></td>
</tr>

<tr>
	<td style="width: 150px; vertical-align: middle;"><?php echo T_("MT4 Account"); ?></td>	
	<td style="vertical-align: middle;">:</td>
	<td><span style="font-weight: bold;"><?php echo $_GET["id"]; ?></span></td>
</tr>

<tr>
	<td style="width: 150px; vertical-align: middle;"><?php echo T_("Balance"); ?></td>	
	<td style="vertical-align: middle;">:</td>
	<td><span style="font-weight: bold;"><?php echo $dcurrency." ".$balance; ?></span></td>
</tr>

</tbody>
</table> <br/><br/>
</div>

<input type="button" value="<?php echo T_("Cancel"); ?>" onclick="batal()" style="float: right;" />

<!--<input type="submit" value="<?php echo T_("Save"); ?>" style="float: right; margin-right: 10px;"/>-->
</form>
</div>
