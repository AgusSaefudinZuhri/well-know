<?php include_once('includes/config.php'); ?>
<script type="application/javascript" language="javascript">
function chValue ( x, y ) {
		
		if($(x).is(':checked')) $('#'+y).val('1'); else $('#'+y).val('0');	
		
	}
</script>

<div style="padding: 10px;">
<span style="font-size: 16px; font-weight: bold;"><?php echo strtoupper(T_("Add Bonus")); ?></span>
<form id="add_post" name="add_post" method="post">
<div style="height: 400px; ">

<table style="width: 600px;">
<tbody>

<tr>
<td style="width: 150px; vertical-align: middle;"><?php echo T_("Bonus"); ?></td>	
<td style="vertical-align: middle;">:</td>
<td><input class="default" id="nmjkomisi" name="nmjkomisi" type="text" style="width: 300px;" required /></td>
</tr>

<tr>
<td style="width: 150px; vertical-align: middle;"><?php echo T_("Frequency"); ?></td>	
<td style="vertical-align: middle;">:</td>
<td><select class="default" id="freqjkomisi" name="freqjkomisi" type="text" style="width: 300px;" required >
	<option value="" disabled selected></option>
	<option value="0">Immediately</option>
	<option value="1">Daily</option>	
	</select></td>
</tr>

<tr>
<td style="width: 150px; vertical-align: middle;"><?php echo T_("Script"); ?></td>	
<td style="vertical-align: middle;">:</td>
<td><input class="default" id="scrjkomisi" name="scrjkomisi" type="text" style="width: 300px;" required /></td>
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
       url:'jkomisi.act.php?a=0',
       type:'post',
	   beforeSubmit: function () {
			loadingstart();
			if (!confirm( addEntry() )) {
				loadingend();
				return false;
			}
			if(!cekzzz()) { return false;}
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
