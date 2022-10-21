<?php include_once('includes/config.php'); 
$row=mysqli_fetch_array(mysqli_query("SELECT * FROM g_jkomisi WHERE id='".$_GET["id"]."'"));
?>
<script type="application/javascript" language="javascript">
function chValue ( x, y ) {
		
		if($(x).is(':checked')) $('#'+y).val('1'); else $('#'+y).val('0');	
		
	}
</script>

<div style="padding: 10px;">
<span style="font-size: 16px; font-weight: bold;"><?php echo strtoupper(T_("Edit Bonus")); ?></span>
<form id="add_post" name="add_post" method="post">
<div style="height: 400px;">

<table style="width: 600px;">
<tbody>

<tr>
<td style="width: 150px; vertical-align: middle;"><?php echo T_("Bonus"); ?></td>	
<td style="vertical-align: middle;">:</td>
<td><input class="default" id="nmjkomisi" name="nmjkomisi" type="text" style="width: 300px;" value="<?php echo $row["nmjkomisi"];?>" required /></td>
</tr>

<tr>
<td style="width: 150px; vertical-align: middle;"><?php echo T_("Frequency"); ?></td>	
<td style="vertical-align: middle;">:</td>
<td><select class="default" id="freqjkomisi" name="freqjkomisi" type="text" style="width: 300px;" required >
	<option value="" disabled selected></option>
	<option value="0" <?php if( $row["freqjkomisi"] == '0' ) echo 'selected';?> >Immediately</option>
	<option value="1" <?php if( $row["freqjkomisi"] == '1' ) echo 'selected';?> >Daily</option>	
	</select></td>
</tr>

<tr>
<td style="width: 150px; vertical-align: middle;"><?php echo T_("Script"); ?></td>	
<td style="vertical-align: middle;">:</td>
<td><input class="default" id="scrjkomisi" name="scrjkomisi" type="text" style="width: 300px;" value="<?php echo $row["scrjkomisi"];?>" required /></td>
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
       url:'jkomisi.act.php?a=1&id=<?php echo $_GET["id"];?>',
       type:'post',
	   beforeSubmit: function () {
			loadingstart();
			if (!confirm( editEntry() )) {
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
