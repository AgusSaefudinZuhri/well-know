<?php include_once('includes/config.php'); 
$row=mysqli_fetch_array(mysqli_query("SELECT * FROM g_jmember WHERE id='".$_GET["id"]."'"));
?>
<script type="application/javascript" language="javascript">
function chValue ( x, y, z ) {
		
		if($(x).is(':checked')) $('#'+y).val('1'); 
		else $('#'+y).val('0');
	
		var zDiv = '#'+z;
//		alert(zDiv+x);
		switch( $('#'+y).val() ) {
			case "0" : 	$(zDiv).attr("readonly", true); 
						$(zDiv).attr("required", false); 
						break;
			case "1" :	$(zDiv).attr("readonly", false); 
						$(zDiv).attr("required", true); 
						break;
		}
	}

</script>

<div style="padding: 10px;">
<span style="font-size: 16px; font-weight: bold;"><?php echo strtoupper(T_("Edit Managers")); ?></span>
<form id="add_post" name="add_post" method="post">
<div style="height: 400px; overflow-x: hidden; overflow-y: auto;">

<table style="width: 800px;">
<tbody>

<tr>
	<td style="width: 150px; vertical-align: middle;"><?php echo T_("ID"); ?></td>	
	<td style="vertical-align: middle;">:</td>
	<td><input class="default" id="jmemberid" name="jmemberid" type="text" style="width: 100px;" value="<?php echo $row["id"];?>" readonly /></td>
</tr>

<tr>
	<td style="width: 150px; vertical-align: middle;"><?php echo T_("Managers"); ?></td>	
	<td style="vertical-align: middle;">:</td>
	 	<td><input class="default" id="nmjmember" name="nmjmember" type="text" style="width: 300px;" value="<?php echo $row["nmjmember"];?>" required /></td>
</tr>

<tr>
	<td style="width: 150px; vertical-align: middle;"><?php echo T_("Rank"); ?></td>	
	<td style="vertical-align: middle;">:</td>
	<td><input class="default" id="rank" name="rank" type="text" style="width: 300px;" value="<?php echo number_format( $row["rank"] );?>" onchange="cNumber(this,'0')" readonly /></td>
</tr>

<tr>
	<td style="width: 150px; vertical-align: middle;"><?php echo T_("Requirement Script"); ?></td>	
	<td style="vertical-align: middle;">:</td>
	<td><input class="default" id="reqscript" name="reqscript" type="text" style="width: 300px;" value="<?php echo $row["reqscript"];?>" required /></td>
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
       url:'jmember.act.php?a=1&id=<?php echo $_GET["id"];?>',
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
