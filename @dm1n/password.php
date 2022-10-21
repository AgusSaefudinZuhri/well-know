<?php include_once('includes/config.php'); 
//echo print_r($_GET);
?>
<script type="application/javascript" language="javascript">
</script>

<div style="padding: 10px;">
<span style="font-size: 16px; font-weight: bold;"><?php echo strtoupper(T_("Ubah Password")); ?></span>
<form id="add_post" name="add_post" method="post">
<div style="height: 100px;">

<table style="width: 350px;">
<tbody>


<tr><td style="width: 150px; vertical-align: middle;"><?php echo T_("Password Baru"); ?></td>	
<td style="vertical-align: middle;">:</td>
<td><input class="default" id="npass" name="npass" type="password" style="width: 200px;" required />
</td></tr>

<tr><td style="width: 150px; vertical-align: middle;"><?php echo T_("Konfirmasi Password");?></td>	
<td style="vertical-align: middle;">:</td>
<td><input class="default" id="kpass" name="kpass" type="password" style="width: 200px;" required />
</td></tr>

</tbody>
</table>
</div>

<input type="button" value="<?php echo $batalBtn;?>" onclick="batal5()" style="float: right;" />

<input type="submit" value="<?php echo $simpanBtn;?>" style="float: right; margin-right: 10px;"/>
</form>
</div>

<script>
    $(document).ready(function() 
    {
       $("#add_post").ajaxForm({
       url:'password.act.php?id=<?php echo $_GET["id"];?>',
       type:'post',
	   beforeSubmit: function () {
		loadingstart();
		if (!confirm("<?php echo T_("Ubah Password?"); ?>")) {
			loadingend();
            return false;
        }
		if($("#npass").val()!=$("#kpass").val()) {
			$.messager.alert( errProc(), "<?php echo T_("Password tidak sama");?>!!!","error");
			loadingend();
			return false;	
		}
		if(!cekzzz()) {clogout(); return false;}
    },
       	success:function(e){
			var hasil = $.trim(e);
			if(hasil=="success") {
				batal5();
				$.messager.alert( sucProc(), "<?php echo T_("Your Password is changed");?>!!!","info");
				loadingend();						
			}
			else {$.messager.alert( errProc(), hasil,"error");loadingend();}

	   }
       });
    });
</script>
