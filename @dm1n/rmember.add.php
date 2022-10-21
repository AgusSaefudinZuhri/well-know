<?php include_once('includes/config.php'); ?>

<script type="application/javascript" language="javascript">

function cekAvailz(x) {
	loadingstart();
	$('#userid').focus();
	$.get('cek.un.php?id='+x, function(data) {
		var hasil=data.trim();
		if(hasil!='success') {
			$('#userid').val('');
			$('#userid').focus();
			$('#cekavail').show(1000);
			setTimeout(function () {$('#cekavail').hide(1000);}, 2000);			
		}
		else $('#password').focus();
		loadingend();
	});
}

function cPassword() {
	var x1 = $('#password').val();	
	var x2 = $('#cpassword').val();	
	if(x2!='' && x1!=x2) {
		$('#cekpass').show(1000);
		setTimeout(function () {$('#cekpass').hide(1000);}, 2000);					
	}
}

</script>

<div style="padding: 10px;">
<span style="font-size: 16px; font-weight: bold;"><?php echo strtoupper(T_("Add \"Root Member\"")); ?></span>
<form id="add_post" name="add_post" method="post">
<div style="height: 250px; overflow-x: hidden; overflow-y: auto; margin-bottom: 5px;">

<table style="width: 540px;">
<tbody>

<tr class="tHeader">
<td style="text-align: center; padding: 5px;" colspan="3"><?php echo T_("Account Info"); ?></td>
</tr>

<tr><td style="width: 150px; vertical-align: middle;"><?php echo T_("Full Name"); ?></td>	
<td style="vertical-align: middle;">:</td>
<td><input class="default" id="nmmember" name="nmmember" type="text" style="width: 300px;" required />
</td></tr>

<tr><td style="width: 150px; vertical-align: middle;"><?php echo T_("UserID"); ?></td>	
<td style="vertical-align: middle;">:</td>
<td><input class="default" id="userid" name="userid" type="text" style="width: 300px;" onchange="cekAvailz(this.value);" required />
</td></tr>

<tr id="cekavail" style="display: none;"><td style="width: 150px; vertical-align: middle;"></td>	
<td style="vertical-align: middle;"></td>
<td><span style=" font-style: italic; color: red;"><?php echo T_("UserID Sudah Ada. Mohon pilih UserID yang lain"); ?></span></td></tr>

<!--
<tr><td style="width: 150px; vertical-align: middle;"><?php echo T_("Membership"); ?></td>	
<td style="vertical-align: middle;">:</td>
<td><select class="default" id="jpackage" name="jpackage" type="text" style="width: 300px;" required >
<option value="" selected="selected" disabled="disabled">-- <?php echo T_("Please Select"); ?> --</option>
<?php 
	$xqry=mysqli_query("SELECT *, ( hargapv * 1 ) xvaljpackage FROM g_jpackage WHERE status='1' ORDER BY xvaljpackage ASC");
	while($xrow=mysqli_fetch_array($xqry)) {
?>
<option value="<?php echo $xrow["id"];?>|<?php echo $xrow["hargapv"];?>|<?php echo $xrow["hasilprc"];?>|<?php echo $xrow["nmjpackage"];?>" ><?php echo $xrow["nmjpackage"];?> | <?php echo $syscurrency." ".number_format( $xrow["hargapv"], 2 );?></option>
<?php } ?>
</select>
</td></tr>
-->

<tr><td style="width: 150px; vertical-align: middle;"><?php echo T_("Login Password"); ?></td>	
<td style="vertical-align: middle;">:</td>
<td><input class="default" id="password" name="password" type="password" style="width: 300px;" 
onchange="cPassword();" required />
</td></tr>

<tr><td style="width: 150px; vertical-align: middle;"><?php echo T_("Confirm Login Password"); ?></td>	
<td style="vertical-align: middle;">:</td>
<td><input class="default" id="cpassword" name="cpassword" type="password" style="width: 300px;" onchange="cPassword();" required />
</td></tr>

<tr id="cekpass" style="display: none;"><td style="width: 150px; vertical-align: middle;"></td>	
<td style="vertical-align: middle;"></td>
<td><span style=" font-style: italic; color: red;"><?php echo T_("Password Tidak Sama!!!"); ?></span></td></tr>

</tbody>
</table> <br/><br/>
</div>

<input type="button" value="<?php echo $batalBtn; ?>" onclick="batal()" style="float: right;" />

<input type="submit" value="<?php echo $simpanBtn; ?>" style="float: right; margin-right: 10px;"/>
</form>
</div>

<script>
    $(document).ready(function() 
    {

       $("#add_post").ajaxForm({
       url:'rmember.act.php?a=0',
       type:'post',
	   beforeSubmit: function () {
			loadingstart();
			if (!confirm( addEntry() )) {
				loadingend();
				return false;
			}
			if ($('#password').val()!=$('#cpassword').val()) {
			$.messager.alert( errProc(), "<?php echo T_("Password Tidak Sama");?>!!!","error");
				loadingend();
				return false;
			}
			if(!cekzzz()) {clogout(); return false;}
    },
       success:function(e){
		var hasil = $.trim(e);
//		alert(hasil);
        if(hasil=="success") {
			$.messager.alert( sucProc(), dataDisimpan(), 'info');
			cari('');
			batal();
			loadingend();						
   		}
		else {$.messager.alert( errProc(), hasil,"error");loadingend();}
	   }
       });
    });
</script>
