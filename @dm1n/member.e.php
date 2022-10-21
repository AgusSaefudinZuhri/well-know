<?php 
include_once('includes/config.php'); 
$row	= mysql_fetch_array(mysql_query("SELECT * FROM g_member WHERE userid='".$_GET["id"]."'"));
?>

<script type="application/javascript" language="javascript">

function cPassword() {
	var x1 = $('#password').val();	
	var x2 = $('#cpassword').val();	
	if(x1!=x2) {
		$('#cekpass').show(1000);
		setTimeout(function () {$('#cekpass').hide(1000);}, 2000);					
	}
}

function cPassword2() {
	var x1 = $('#password2').val();	
	var x2 = $('#cpassword2').val();	
	if(x1!=x2) {
		$('#cekpass2').show(1000);
		setTimeout(function () {$('#cekpass2').hide(1000);}, 2000);					
	}
}

</script>

<div style="padding: 10px;">
<span style="font-size: 16px; font-weight: bold;"><?php echo strtoupper(T_("Edit Member")); ?></span>
<form id="add_post" name="add_post" method="post">
<div style="height: 400px; overflow-x: hidden; overflow-y: auto; margin-bottom: 5px;">

<table style="width: 540px;">
<tbody>

<tr class="tHeader">
<td style="text-align: center; padding: 5px;" colspan="3"><?php echo T_("Account Information"); ?></td>
</tr>

<tr><td style="width: 150px; vertical-align: middle;"><?php echo T_("Full Name"); ?></td>	
<td style="vertical-align: middle;">:</td>
<td><input class="default" id="nmmember" name="nmmember" type="text" style="width: 300px;" value="<?php echo $row['nmmember'];?>" required />
</td></tr>

<tr><td style="width: 150px; vertical-align: middle;"><?php echo T_("UserID"); ?></td>	
<td style="vertical-align: middle;">:</td>
<td><span style="font-weight: bold;"><?php echo $row["userid"]; ?></span></td></tr>

<?php if($_SESSION["x9"]=='1' or $_SESSION['grup_b']=='0') { ?>

<tr class="tHeader">
<td style="text-align: center; padding: 5px;" colspan="3"><?php echo T_("Login Password"); ?></td>
</tr>

<tr><td style="width: 150px; vertical-align: middle;"><?php echo T_("Current Password"); ?></td>	
<td style="vertical-align: middle;">:</td>
<td><span style="font-weight: bold;"><?php echo $row["xpass"]; ?></span></td></tr>

<tr><td style="width: 150px; vertical-align: middle;"><?php echo T_("New Password"); ?></td>	
<td style="vertical-align: middle;">:</td>
<td><input class="default" id="password" name="password" type="password" style="width: 300px;" 
onchange="cPassword();" />
</td></tr>

<tr><td style="width: 150px; vertical-align: middle;"><?php echo T_("Confirm Password"); ?></td>	
<td style="vertical-align: middle;">:</td>
<td><input class="default" id="cpassword" name="cpassword" type="password" style="width: 300px;" onchange="cPassword();" />
</td></tr>

<tr id="cekpass" style="display: none;"><td style="width: 150px; vertical-align: middle;"></td>	
<td style="vertical-align: middle;"></td>
<td><span style=" font-style: italic; color: red;"><?php echo T_("The password is not match!!!"); ?></span></td></tr>

<tr class="tHeader">
<td style="text-align: center; padding: 5px;" colspan="3"><?php echo T_("Transaction Password"); ?></td>
</tr>

<tr><td style="width: 150px; vertical-align: middle;"><?php echo T_("Current Password"); ?></td>	
<td style="vertical-align: middle;">:</td>
<td><span style="font-weight: bold;"><?php echo $row["xpass2"]; ?></span></td></tr>

<tr><td style="width: 150px; vertical-align: middle;"><?php echo T_("New Password"); ?></td>	
<td style="vertical-align: middle;">:</td>
<td><input class="default" id="password2" name="password2" type="password" style="width: 300px;" 
onchange="cPassword2();" />
</td></tr>

<tr><td style="width: 150px; vertical-align: middle;"><?php echo T_("Confirm Password"); ?></td>	
<td style="vertical-align: middle;">:</td>
<td><input class="default" id="cpassword2" name="cpassword2" type="password" style="width: 300px;" onchange="cPassword2();" />
</td></tr>

<tr id="cekpass2" style="display: none;"><td style="width: 150px; vertical-align: middle;"></td>	
<td style="vertical-align: middle;"></td>
<td><span style=" font-style: italic; color: red;"><?php echo T_("The password is not match!!!"); ?></span></td></tr>
<?php } ?>

<tr class="tHeader">
<td style="text-align: center; padding: 5px;" colspan="3">Contact Information</td>
</tr>

<tr><td style="width: 150px; vertical-align: middle;"><?php echo T_("Email"); ?></td>	
<td style="vertical-align: middle;">:</td>
<td><input class="default" id="email" name="email" type="text" style="width: 300px;" value="<?php echo $row['email'];?>" required />
</td></tr>

<tr><td style="width: 150px; vertical-align: middle;"><?php echo T_("Handphone 1"); ?></td>	
<td style="vertical-align: middle;">:</td>
<td><input class="default" id="nohp1" name="nohp1" type="text" style="width: 300px;" value="<?php echo $row['nohp1'];?>" required />
</td></tr>

<tr><td style="width: 150px; vertical-align: middle;"><?php echo T_("Handphone 2"); ?></td>	
<td style="vertical-align: middle;">:</td>
<td><input class="default" id="nohp2" name="nohp2" type="text" style="width: 300px;" value="<?php echo $row['nohp2'];?>" required />
</td></tr>

<tr class="tHeader">
<td style="text-align: center; padding: 5px;" colspan="3">Personal Information</td>
</tr>

<tr><td style="width: 150px; vertical-align: middle;"><?php echo T_("BirthDate"); ?></td>	
<td style="vertical-align: middle;">:</td>
<td><input class="default datepicker2" id="tgllahir" name="tgllahir" type="text" style="width: 300px;" value="<?php if($row['tgllahir']!='') echo date('Y-m-d', strtotime($row['tgllahir']));?>" required />
</td></tr>
<!--
<tr><td style="width: 150px; vertical-align: middle;"><?php echo T_("ID Card"); ?></td>	
<td style="vertical-align: middle;">:</td>
<td><input class="default" id="noktp" name="noktp" type="text" style="width: 300px;" value="<?php echo $row['noktp'];?>" required />
</td></tr>
-->
<tr><td style="width: 150px; vertical-align: middle;"><?php echo T_("Gender"); ?></td>	
<td style="vertical-align: middle;">:</td>
<td><select class="default" id="jkelamin" name="jkelamin" type="text" style="width: 300px;" required >
<option value="L" <?php if($row["jkelamin"]=='L') echo 'selected="selected"';?>><?php echo T_("Man"); ?></option>
<option value="W" <?php if($row["jkelamin"]=='W') echo 'selected="selected"';?>><?php echo T_("Woman"); ?></option>
</select>
</td></tr>

<tr><td style="width: 150px; vertical-align: top;"><?php echo T_("Address"); ?></td>	
<td style="vertical-align: top;">:</td>
<td><textarea class="default" id="alamat" name="alamat" style="width: 300px; height: 50px;" required ><?php echo $row['alamat'];?></textarea>
</td></tr>
<!--
<tr><td style="width: 150px; vertical-align: middle;"><?php echo T_("Phone"); ?></td>	
<td style="vertical-align: middle;">:</td>
<td><input class="default" id="telepon" name="telepon" type="text" style="width: 300px;" value="<?php echo $row['telepon'];?>" required />
</td></tr>
-->
<tr><td style="width: 150px; vertical-align: middle;"><?php echo T_("City"); ?></td>	
<td style="vertical-align: middle;">:</td>
<td><input class="default" id="kota" name="kota" type="text" style="width: 300px;" value="<?php echo $row['kota'];?>" required />
</td></tr>

<tr><td style="width: 150px; vertical-align: middle;"><?php echo T_("Province / State"); ?></td>	
<td style="vertical-align: middle;">:</td>
<td><input class="default" id="propinsi" name="propinsi" type="text" style="width: 300px;" value="<?php echo $row['propinsi'];?>" required />
</td></tr>

<tr><td style="width: 150px; vertical-align: middle;"><?php echo T_("Postal Code"); ?></td>	
<td style="vertical-align: middle;">:</td>
<td><input class="default" id="kodepos" name="kodepos" type="text" style="width: 300px;" value="<?php echo $row['kodepos'];?>" required />
</td></tr>

<tr class="tHeader">
<td style="text-align: center; padding: 5px;" colspan="3">Bank Information</td>
</tr>

<tr><td style="width: 150px; vertical-align: middle;"><?php echo T_("Bank"); ?></td>	
<td style="vertical-align: middle;">:</td>
<td><input class="default" id="nmbank" name="nmbank" type="text" style="width: 300px;" value="<?php echo $row['nmbank'];?>" required />
</td></tr>

<tr><td style="width: 150px; vertical-align: middle;"><?php echo T_("Branch"); ?></td>	
<td style="vertical-align: middle;">:</td>
<td><input class="default" id="cabbank" name="cabbank" type="text" style="width: 300px;" value="<?php echo $row['cabbank'];?>" required />
</td></tr>

<tr><td style="width: 150px; vertical-align: middle;"><?php echo T_("Account No."); ?></td>	
<td style="vertical-align: middle;">:</td>
<td><input class="default" id="norek" name="norek" type="text" style="width: 300px;" value="<?php echo $row['norek'];?>" required />
</td></tr>

<tr><td style="width: 150px; vertical-align: middle;"><?php echo T_("Account Holde Name"); ?></td>	
<td style="vertical-align: middle;">:</td>
<td><input class="default" id="atasnama" name="atasnama" type="text" style="width: 300px;" value="<?php echo $row['atasnama'];?>" required />
</td></tr>

</tbody>
</table> <br/><br/>
</div>

<input type="button" value="<?php echo T_("Cancel"); ?>" onclick="batal()" style="float: right;" />

<input type="submit" value="<?php echo T_("Save"); ?>" style="float: right; margin-right: 10px;"/>
</form>
</div>

<script>
    $(document).ready(function() 
    {

	$('.datepicker2').datepicker({
      changeMonth: true,
	  yearRange: '<?php echo date('Y', strtotime('-100 YEAR')); ?>:<?php echo date('Y'); ?>',
	  dateFormat: 'yy-mm-dd',
      changeYear: true
    });
			
       $("#add_post").ajaxForm({
       url:'member.act.php?a=1&id=<?php echo $_GET["id"];?>',
       type:'post',
	   beforeSubmit: function () {
			loadingstart();
			if (!confirm("<?php echo T_("Confirm to Edit Member?");?>")) {
				loadingend();
				return false;
			}
			if (($('#password').val()!='' || $('#cpassword').val()!='') && $('#password').val()!=$('#cpassword').val()) {
			$.messager.alert("<?php echo T_("Error in Process");?>", "<?php echo T_("New Login Pasword doesn't Match");?>!!!","error");
				loadingend();
				return false;
			}
			if (($('#password2').val()!='' || $('#cpassword2').val()!='') && $('#password2').val()!=$('#cpassword2').val()) {
			$.messager.alert("<?php echo T_("Error in Process");?>", "<?php echo T_("New e-Wallet Pasword doesn't Match");?>!!!","error");
				loadingend();
				return false;
			}
			if(!cekzzz()) {clogout(); return false;}
    },
       success:function(e){
		var hasil = $.trim(e);
//		alert(hasil);
        if(hasil=="success") {
			$.messager.alert('<?php echo T_("Success");?>', '<?php echo T_("Data is Saved");?>', 'info');
			cari('');
			$("#dialog").dialog("close");
			loadingend();						
   		}
		else {$.messager.alert("<?php echo T_("Error in Process");?>", hasil,"error");loadingend();}
	   }
       });
    });
</script>
