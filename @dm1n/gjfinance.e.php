<?php include_once('includes/config.php'); 
$row=mysqli_fetch_array(mysqli_query("SELECT * FROM g_gjfinance WHERE id='".$_GET["id"]."'"));
?>
<script type="application/javascript" language="javascript">
</script>

<div style="padding: 10px;">
<span style="font-size: 16px; font-weight: bold;"><?php echo strtoupper(T_("Edit Managers")); ?></span>
<form id="add_post" name="add_post" method="post">
<div style="height: 400px; overflow-x: hidden; overflow-y: auto;">

<table style="width: 800px;">
<tbody>

<tr>
	<td style="width: 150px; vertical-align: middle;"><?php echo T_("Managers"); ?></td>	
	<td style="vertical-align: middle;">:</td>
	 	<td><input class="default" id="nmgjfinance" name="nmgjfinance" type="text" style="width: 300px;" value="<?php echo $row["nmgjfinance"];?>" required /></td>
</tr>

<tr>
	<td style="width: 150px; vertical-align: middle;"><?php echo T_("Deposit Script"); ?></td>	
	<td style="vertical-align: middle;">:</td>
	<td><input class="default" id="scdeposit" name="scdeposit" type="text" style="width: 300px;" value="<?php echo $row["scdeposit"];?>" required /></td>
</tr>

<tr>
	<td style="width: 150px; vertical-align: middle;"><?php echo T_("Withdrawal Script"); ?></td>	
	<td style="vertical-align: middle;">:</td>
	<td><input class="default" id="scwithdraw" name="scwithdraw" type="text" style="width: 300px;" value="<?php echo $row["scwithdraw"];?>" required /></td>
</tr>

</tbody>
</table>
</div>

<input type="button" value="<?php echo $batalBtn; ?>" onclick="batal()" style="float: right;" />

<input type="submit" value="<?php echo $simpanBtn; ?>" style="float: right; margin-right: 10px;"/>
</form>


</div>

<script>
    $(document).ready(function() 
    {
       $("#add_post").ajaxForm({
       url:'gjfinance.act.php?a=1&id=<?php echo $_GET["id"];?>',
       type:'post',
	   beforeSubmit: function () {
			loadingstart();
			if (!confirm(editEntry())) {
				loadingend();
				return false;
			}
			if(!cekzzz()) {clogout(); return false;}
    },
       success:function(e){
		var hasil = $.trim(e);
//		alert(hasil);
        if(hasil=="success") {
			$.messager.alert(sucProc(), dataDisimpan(), 'info');
			cari('');
			batal();
			loadingend();						
   		}
		else {$.messager.alert(errProc(), hasil,"error");loadingend();}
	   }
       });


    });
</script>
