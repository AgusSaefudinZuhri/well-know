<?php 
include_once('includes/config.php'); 
$txt	= "
	SELECT a.*
	FROM g_member a
	WHERE a.userid='".$_GET["id"]."'
	";
$row	= mysql_fetch_array(mysql_query( $txt ));
?>

</script> 

<div style="padding: 10px;">
<span style="font-size: 16px; font-weight: bold;"><?php echo strtoupper(T_("View Member")); ?></span>
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

<tr><td style="width: 150px; vertical-align: middle;"><?php echo T_("UserID"); ?></td>	
<td style="vertical-align: middle;">:</td>
<td><span style="font-weight: bold;"><?php echo $row["userid"]; ?></span></td></tr>

<tr class="tHeader">
<td style="text-align: center; padding: 5px;" colspan="3">Contact Information</td>
</tr>

<tr><td style="width: 150px; vertical-align: middle;"><?php echo T_("ID Card/Passport No."); ?></td>	
<td style="vertical-align: middle;">:</td>
<td><?php echo $row['noktp'];?></td>
</tr>

<tr><td style="width: 150px; vertical-align: middle;"><?php echo T_("Email"); ?></td>	
<td style="vertical-align: middle;">:</td>
<td><?php echo $row['email'];?>
</td></tr>

<tr>
    <td style="width: 150px; vertical-align: middle;"><?php echo T_("Handphone 1"); ?></td>	
    <td style="vertical-align: middle;">:</td>
    <td><?php echo $row['nohp1'];?></td>
</tr>

<tr>
    <td style="width: 150px; vertical-align: middle;"><?php echo T_("Handphone 2"); ?></td>	
    <td style="vertical-align: middle;">:</td>
    <td><?php echo $row['nohp2'];?></td>
</tr>

<tr class="tHeader">
	<td style="text-align: center; padding: 5px;" colspan="3">Personal Information</td>
</tr>

<tr><td style="width: 150px; vertical-align: middle;"><?php echo T_("BirthDate"); ?></td>	
<td style="vertical-align: middle;">:</td>
<td><?php if($row['tgllahir']!='') echo date('d F Y', strtotime($row['tgllahir']));?>
</td></tr>

<tr><td style="width: 150px; vertical-align: middle;"><?php echo T_("ID Card"); ?></td>	
<td style="vertical-align: middle;">:</td>
<td><?php echo $row['noktp'];?>
</td></tr>

<tr>
    <td style="width: 150px; vertical-align: middle;"><?php echo T_("Gender"); ?></td>	
    <td style="vertical-align: middle;">:</td>
    <td><?php if($row["jkelamin"]=='L') echo T_("Man"); else if($row["jkelamin"]=='W') echo  T_("Woman"); ?></td>
</tr>

<tr>
    <td style="width: 150px; vertical-align: top;"><?php echo T_("Address"); ?></td>	
    <td style="vertical-align: top;">:</td>
    <td><?php echo nl2br( $row['alamat'] );?></td>
</tr>

<!--
<tr><td style="width: 150px; vertical-align: middle;"><?php echo T_("Phone"); ?></td>	
<td style="vertical-align: middle;">:</td>
<td><input class="default" id="telepon" name="telepon" type="text" style="width: 300px;" value="<?php echo $row['telepon'];?>
</td></tr>
-->
<!--
<tr>
    <td style="width: 150px; vertical-align: middle;"><?php echo T_("City"); ?></td>	
    <td style="vertical-align: middle;">:</td>
    <td><?php echo $row['kota'];?></td>
</tr>

<tr>
<td style="width: 150px; vertical-align: middle;"><?php echo T_("Province / State"); ?></td>	
<td style="vertical-align: middle;">:</td>
<td><?php echo $row['propinsi'];?></td>
</tr>

<tr><td style="width: 150px; vertical-align: middle;"><?php echo T_("Postal Code"); ?></td>	
<td style="vertical-align: middle;">:</td>
<td><input class="default" id="kodepos" name="kodepos" type="text" style="width: 300px;" value="<?php echo $row['kodepos'];?>
</td></tr>
-->
<tr class="tHeader">
<td style="text-align: center; padding: 5px;" colspan="3">Bank Information</td>
</tr>

<tr>
    <td style="width: 150px; vertical-align: middle;"><?php echo T_("Bank"); ?></td>	
    <td style="vertical-align: middle;">:</td>
    <td><?php echo $row['nmbank'];?></td>
</tr>

<tr>
    <td style="width: 150px; vertical-align: middle;"><?php echo T_("Branch"); ?></td>	
    <td style="vertical-align: middle;">:</td>
    <td><?php echo $row['cabbank'];?></td>
</tr>

<tr>
    <td style="width: 150px; vertical-align: middle;"><?php echo T_("Account No."); ?></td>	
    <td style="vertical-align: middle;">:</td>
    <td><?php echo $row['norek'];?></td>
</tr>

<tr>
    <td style="width: 150px; vertical-align: middle;"><?php echo T_("Account Holde Name"); ?></td>	
    <td style="vertical-align: middle;">:</td>
    <td><?php echo $row['atasnama'];?></td>
</tr>

<tr class="tHeader">
<td style="text-align: center; padding: 5px;" colspan="3">Transfer Proof</td>
</tr>

<tr><td>&nbsp;</td><td>&nbsp;</td></tr>

<tr>
    <td style="width: 150px; vertical-align: middle;"><?php echo T_("ID Card Doc"); ?></td>	
    <td style="vertical-align: middle;">:</td>
    <td><a class="tbutton" href="javascript: void(0);" onclick="window.open( '<?php echo $row["ktplink"];?>', '_blank' )" ><?php echo T_('View ID Card');?></a></td>
</tr>

</tbody>
</table> <br/><br/>
</div>

<input type="button" value="<?php echo T_("Cancel"); ?>" onclick="batal()" style="float: right;" />

<!--<input type="submit" value="<?php echo T_("Save"); ?>" style="float: right; margin-right: 10px;"/>-->
</form>
</div>
