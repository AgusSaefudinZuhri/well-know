<?php 
include_once('includes/config.php'); 
$row	= mysql_fetch_array(mysql_query("SELECT * FROM g_member WHERE userid='".$_GET["id"]."'"));

?>

<script type="application/javascript" language="javascript">

function tUtility(x) {
	switch(x) {
		case "" : 
				$("#tUtility").html('<input type="text" class="default uinput" id="nilai" name="nilai" style="width: 150px;padding: 5px 7px;" readonly="readonly" />');
				break;
/*
		case "voucher" : 
				$("#tUtility").html('<input type="text" class="default uinput" id="nilai" name="nilai" style="width: 150px;padding: 5px 7px;" onchange="cNumber(this, \'2\')" required />');
				break;
*/				
				
		case "wcash" : 
				$("#tUtility").html('<input type="text" class="default uinput" id="nilai" name="nilai" style="width: 150px;padding: 5px 7px;" onchange="cNumber(this, \'2\')" required />');
				break;

		case "wregister" : 
				$("#tUtility").html('<input type="text" class="default uinput" id="nilai" name="nilai" style="width: 150px;padding: 5px 7px;" onchange="cNumber(this, \'2\')" required />');				
				break;

		case "wfn" : 
				$("#tUtility").html('<input type="text" class="default uinput" id="nilai" name="nilai" style="width: 150px;padding: 5px 7px;" onchange="cNumber(this, \'2\')" required />');				
				break;

		case "wcn" : 
				$("#tUtility").html('<input type="text" class="default uinput" id="nilai" name="nilai" style="width: 150px;padding: 5px 7px;" onchange="cNumber(this, \'2\')" required />');				
				break;
						
	}
	$('#nilai').focus();
}

function cPassword() {
	var x1 = $('#password').val();	
	var x2 = $('#cpassword').val();	
	if(x1!=x2) {
		$('#cekpass').show(1000);
		setTimeout(function () {$('#cekpass').hide(1000);}, 2000);					
	}
}

</script>

<style>
.dUser td { padding: 5px;  }
</style>

<div style="padding: 10px;">
<span style="font-size: 16px; font-weight: bold;"><?php echo strtoupper(T_("Member Utilities")); ?></span>
<form id="add_post" name="add_post" method="post">
<div style="height: 200px; overflow-x: hidden; overflow-y: auto; margin-bottom: 5px;">

<table class="dUser" style="width: 540px;">
<tr><td style="width: 150px; vertical-align: middle;"><?php echo T_("UserID"); ?></td>	
<td style="vertical-align: middle;">:</td>
<td><?php echo $row["userid"]; ?></td></tr>

<tr><td style="width: 150px; vertical-align: middle;"><?php echo T_("Full Name"); ?></td>	
<td style="vertical-align: middle;">:</td>
<td><?php echo $row["nmmember"]; ?></td></tr>

<tr><td style="width: 150px; vertical-align: middle;"><?php echo T_("Transfer to"); ?></td>	
<td style="vertical-align: middle;">:</td>
<td><select class="default" id="utype" name="utype" style="width: 170px;" onchange="tUtility(this.value)"  required >
<option value="" disabled="disabled" selected="selected"><?php echo T_("Please Select"); ?></option>
<!-- <option value="voucher" ><?php echo T_("Voucher"); ?></option> -->

<option value="wfn" 	><?php echo T_("Financial Note"); ?></option>
<option value="wcn" 	><?php echo T_("Credit Note"); ?></option>
<option value="wcash" 	><?php echo T_("Cash Wallet"); ?></option>
<option value="wregister" ><?php echo T_("Dollar Wallet"); ?></option>
</select>
</td></tr>

<tr>
<td style="width: 150px; vertical-align: middle;"><?php echo T_("Value"); ?></td>	
<td style="vertical-align: middle;">:</td>
<td id="tUtility"><input type="text" class="default uinput" id="nilai" name="nilai" style="width: 150px;padding: 5px 7px;"  readonly="readonly" /></td>
</tr>

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
       url:'member.act.php?a=4&id=<?php echo $_GET["id"];?>',
       type:'post',
	   beforeSubmit: function () {
			loadingstart();
			if (!confirm("<?php echo T_("Confirm to do the Transaction?");?>")) {
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
