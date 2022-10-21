<?php include_once('includes/config.php'); 
$row=mysql_fetch_array(mysql_query("SELECT * FROM g_jpackage WHERE id='".$_GET["id"]."'"));
?>
<script type="application/javascript" language="javascript">
function chValue ( x, y ) {
		
		if($(x).is(':checked')) $('#'+y).val('1'); 
		else $('#'+y).val('0');	
		
		switch( $('#rabatst').val() ) {
			case "0" : 	$("#rabatprc").attr("readonly", true); 
						$("#rabatlvlcap").attr("readonly", true); 
						$("#rabatprc").attr("required", false); 
						$("#rabatlvlcap").attr("required", false); 
						break;
			case "1" :	$("#rabatprc").attr("readonly", false); 
						$("#rabatlvlcap").attr("readonly", false); 
						$("#rabatprc").attr("required", true); 
						$("#rabatlvlcap").attr("required", true); 						
						break;
		}
	}
</script>

<div style="padding: 10px;">
<span style="font-size: 16px; font-weight: bold;"><?php echo strtoupper(T_("Edit Package")); ?></span>
<form id="add_post" name="add_post" method="post">
<div style="height: 390px; overflow-x: hidden; overflow-y: auto; margin-bottom: 10px;">

<table style="width: 600px;">
<tbody>

<tr>
<td style="width: 150px; vertical-align: middle;"><?php echo T_("Package"); ?></td>	
<td style="vertical-align: middle;">:</td>
<td><input class="default" id="nmjpackage" name="nmjpackage" type="text" style="width: 300px;" value="<?php echo $row["nmjpackage"];?>" required /></td>
</tr>


<tr>
<td style="width: 150px; vertical-align: middle;"><?php echo T_("Min Value"); ?> (<?php echo $syscurrency;?>)</td>	
<td style="vertical-align: middle;">:</td>
<td><input class="default" id="minvalue" name="minvalue" type="text" style="width: 300px;" onchange="cNumber(this,'2')" value="<?php echo $row["minvalue"];?>" required /></td>
</tr>

<tr>
<td style="width: 150px; vertical-align: middle;"><?php echo T_("Profit Sharing (User)"); ?> (%)</td>	
<td style="vertical-align: middle;">:</td>
<td><input class="default" id="usrprc" name="usrprc" type="text" style="width: 300px;" onchange="cNumber(this,'2')" value="<?php echo number_format( $row["usrprc"], 2);?>" required /></td>
</tr>

<tr>
<td style="width: 150px; vertical-align: middle;"><?php echo T_("Profit Sharing (Manager)"); ?> (%)</td>	
<td style="vertical-align: middle;">:</td>
<td><input class="default" id="mgrprc" name="mgrprc" type="text" style="width: 300px;" onchange="cNumber(this,'2')" value="<?php echo number_format( $row["mgrprc"], 2);?>" required /></td>
</tr>

<tr>
<td style="width: 150px; vertical-align: middle;"><?php echo T_("Rebate"); ?> (<?php echo $dcurrency;?>/<?php echo T_("Lot");?>)</td>	
<td style="vertical-align: middle;">:</td>
<td><input class="default" id="rebate" name="rebate" type="text" style="width: 300px;" onchange="cNumber(this,'2')" value="<?php echo number_format( $row["rebate"], 2);?>" required /></td>
</tr>

<tr>
<td style="width: 150px; vertical-align: middle;"><?php echo T_("Logo"); ?></td>	
<td style="vertical-align: middle;">:</td>
<td>
<input class="default" id="iconlink" name="iconlink" type="text" style="width: 300px;" value="<?php echo $row["iconlink"];?>" readonly="readonly" required />&nbsp;
<a class="tbutton tsearch" href="javascript: void(0);" onclick="$('#fimage').click()">&nbsp;</a>
</td>
</tr>

<tr>
<td style="width: 150px; vertical-align: middle;"></td>	
<td style="vertical-align: middle;"></td>
<td><div id="icondiv"><?php if($row["iconlink"]!='') { ?><img src="<?php echo $row["iconlink"];?>" style="width: <?php echo $iconpic_width;?>px;height: <?php echo $iconpic_height;?>px;"/><?php } ?></div></td>
</tr>

</tbody>
</table>
</div>

<input type="button" value="<?php echo $batalBtn; ?>" onclick="batal()" style="float: right;" />

<input type="submit" value="<?php echo $simpanBtn; ?>" style="float: right; margin-right: 10px;"/>
</form>

<form id="my_form" action="iconupl.php" target="form_target" method="post" enctype="multipart/form-data" style="width:0px;height:0;overflow:hidden">
    <input type="text" id="fname" name="fname" /> 
    <input id="fimage" name="fimage" type="file" onchange="$('#my_form').submit();this.value='';">
</form>

</div>

<script>
    $(document).ready(function() 
    {
       $("#add_post").ajaxForm({
       url:'jpackage.act.php?a=1&id=<?php echo $_GET["id"];?>',
       type:'post',
	   beforeSubmit: function () {
			loadingstart();
			if (!confirm( editEntry() )) {
				loadingend();
				return false;
			}
			if(!cekzzz()) {ciconlinkut(); return false;}
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

       $("#my_form").ajaxForm({
       url:'iconupl.php',
       type:'post',
	   beforeSubmit: function () {
			loadingstart();
			if (!confirm( imgUplMsg() )) {
				loadingend();
				return false;
			}
			if(!cekzzz()) {clogout(); return false;}
		},	   
       success:function(e){
		var hasil = $.trim(e);
        var xhasil=hasil.split("|");
		if(xhasil[0]=="success") {
			$('#icondiv').html('<img src="'+xhasil[1]+'" style="width: <?php echo $iconpic_width;?>px;height: <?php echo $iconpic_height;?>px;"/>');
			$('#iconlink').val(xhasil[1]);
			loadingend();
   		}
		else {$.messager.alert( errProc(), hasil,"error");loadingend();}
	   }
       });
	   
    });
</script>
