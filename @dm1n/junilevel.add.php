<?php include_once('includes/config.php'); ?>
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
<span style="font-size: 16px; font-weight: bold;"><?php echo strtoupper(T_("Add Unilevel")); ?></span>
<form id="add_post" name="add_post" method="post">
<div style="height: 390px; overflow-x: hidden; overflow-y: auto; margin-bottom: 10px;">

<table style="width: 600px;">
<tbody>

<tr>
<td style="width: 150px; vertical-align: middle;"><?php echo T_("Unilevel"); ?></td>	
<td style="vertical-align: middle;">:</td>
<td><input class="default" id="nmjunilevel" name="nmjunilevel" type="text" style="width: 300px;" required /></td>
</tr>

<tr>
<td style="width: 150px; vertical-align: middle;"><?php echo T_("Min. Referral"); ?></td>	
<td style="vertical-align: middle;">:</td>
<td><input class="default" id="minsponsor" name="minsponsor" type="text" style="width: 300px;" onchange="cNumber(this,'0')" required /></td>
</tr>

<tr>
<td style="width: 150px; vertical-align: middle;"><?php echo T_("Level 01"); ?> (%)</td>	
<td style="vertical-align: middle;">:</td>
<td><input class="default" id="lvl01" name="lvl01" type="text" style="width: 300px;" onchange="cNumber(this,'2')" value="0.00" required /></td>
</tr>

<tr>
<td style="width: 150px; vertical-align: middle;"><?php echo T_("Level 02"); ?> (%)</td>	
<td style="vertical-align: middle;">:</td>
<td><input class="default" id="lvl02" name="lvl02" type="text" style="width: 300px;" onchange="cNumber(this,'2')" value="0.00" required /></td>
</tr>

<tr>
<td style="width: 150px; vertical-align: middle;"><?php echo T_("Level 03"); ?> (%)</td>	
<td style="vertical-align: middle;">:</td>
<td><input class="default" id="lvl03" name="lvl03" type="text" style="width: 300px;" onchange="cNumber(this,'2')" value="0.00" required /></td>
</tr>

<tr>
<td style="width: 150px; vertical-align: middle;"><?php echo T_("Level 04"); ?> (%)</td>	
<td style="vertical-align: middle;">:</td>
<td><input class="default" id="lvl04" name="lvl04" type="text" style="width: 300px;" onchange="cNumber(this,'2')" value="0.00" required /></td>
</tr>

<tr>
<td style="width: 150px; vertical-align: middle;"><?php echo T_("Level 05"); ?> (%)</td>	
<td style="vertical-align: middle;">:</td>
<td><input class="default" id="lvl05" name="lvl05" type="text" style="width: 300px;" onchange="cNumber(this,'2')" value="0.00" required /></td>
</tr>

<tr>
<td style="width: 150px; vertical-align: middle;"><?php echo T_("Level 06"); ?> (%)</td>	
<td style="vertical-align: middle;">:</td>
<td><input class="default" id="lvl06" name="lvl06" type="text" style="width: 300px;" onchange="cNumber(this,'2')" value="0.00" required /></td>
</tr>

<tr>
<td style="width: 150px; vertical-align: middle;"><?php echo T_("Level 07"); ?> (%)</td>	
<td style="vertical-align: middle;">:</td>
<td><input class="default" id="lvl07" name="lvl07" type="text" style="width: 300px;" onchange="cNumber(this,'2')" value="0.00" required /></td>
</tr>

<tr>
<td style="width: 150px; vertical-align: middle;"><?php echo T_("Level 08"); ?> (%)</td>	
<td style="vertical-align: middle;">:</td>
<td><input class="default" id="lvl08" name="lvl08" type="text" style="width: 300px;" onchange="cNumber(this,'2')" value="0.00" required /></td>
</tr>

<tr>
<td style="width: 150px; vertical-align: middle;"><?php echo T_("Level 09"); ?> (%)</td>	
<td style="vertical-align: middle;">:</td>
<td><input class="default" id="lvl09" name="lvl09" type="text" style="width: 300px;" onchange="cNumber(this,'2')" value="0.00" required /></td>
</tr>

<tr>
<td style="width: 150px; vertical-align: middle;"><?php echo T_("Level 10"); ?> (%)</td>	
<td style="vertical-align: middle;">:</td>
<td><input class="default" id="lvl10" name="lvl10" type="text" style="width: 300px;" onchange="cNumber(this,'2')" value="0.00" required /></td>
</tr>

<tr>
<td style="width: 150px; vertical-align: middle;"><?php echo T_("Rebate 01"); ?> (<?php echo $dcurrency;?>)</td>	
<td style="vertical-align: middle;">:</td>
<td><input class="default" id="rbt01" name="rbt01" type="text" style="width: 300px;" onchange="cNumber(this,'2')" value="0.00" required /></td>
</tr>

<tr>
<td style="width: 150px; vertical-align: middle;"><?php echo T_("Rebate 02"); ?> (<?php echo $dcurrency;?>)</td>	
<td style="vertical-align: middle;">:</td>
<td><input class="default" id="rbt02" name="rbt02" type="text" style="width: 300px;" onchange="cNumber(this,'2')" value="0.00" required /></td>
</tr>

<tr>
<td style="width: 150px; vertical-align: middle;"><?php echo T_("Rebate 03"); ?> (<?php echo $dcurrency;?>)</td>	
<td style="vertical-align: middle;">:</td>
<td><input class="default" id="rbt03" name="rbt03" type="text" style="width: 300px;" onchange="cNumber(this,'2')" value="0.00" required /></td>
</tr>

<tr>
<td style="width: 150px; vertical-align: middle;"><?php echo T_("Rebate 04"); ?> (<?php echo $dcurrency;?>)</td>	
<td style="vertical-align: middle;">:</td>
<td><input class="default" id="rbt04" name="rbt04" type="text" style="width: 300px;" onchange="cNumber(this,'2')" value="0.00" required /></td>
</tr>

<tr>
<td style="width: 150px; vertical-align: middle;"><?php echo T_("Rebate 05"); ?> (<?php echo $dcurrency;?>)</td>	
<td style="vertical-align: middle;">:</td>
<td><input class="default" id="rbt05" name="rbt05" type="text" style="width: 300px;" onchange="cNumber(this,'2')" value="0.00" required /></td>
</tr>

<tr>
<td style="width: 150px; vertical-align: middle;"><?php echo T_("Rebate 06"); ?> (<?php echo $dcurrency;?>)</td>	
<td style="vertical-align: middle;">:</td>
<td><input class="default" id="rbt06" name="rbt06" type="text" style="width: 300px;" onchange="cNumber(this,'2')" value="0.00" required /></td>
</tr>

<tr>
<td style="width: 150px; vertical-align: middle;"><?php echo T_("Rebate 07"); ?> (<?php echo $dcurrency;?>)</td>	
<td style="vertical-align: middle;">:</td>
<td><input class="default" id="rbt07" name="rbt07" type="text" style="width: 300px;" onchange="cNumber(this,'2')" value="0.00" required /></td>
</tr>

<tr>
<td style="width: 150px; vertical-align: middle;"><?php echo T_("Rebate 08"); ?> (<?php echo $dcurrency;?>)</td>	
<td style="vertical-align: middle;">:</td>
<td><input class="default" id="rbt08" name="rbt08" type="text" style="width: 300px;" onchange="cNumber(this,'2')" value="0.00" required /></td>
</tr>

<tr>
<td style="width: 150px; vertical-align: middle;"><?php echo T_("Rebate 09"); ?> (<?php echo $dcurrency;?>)</td>	
<td style="vertical-align: middle;">:</td>
<td><input class="default" id="rbt09" name="rbt09" type="text" style="width: 300px;" onchange="cNumber(this,'2')" value="0.00" required /></td>
</tr>

<tr>
<td style="width: 150px; vertical-align: middle;"><?php echo T_("Rebate 10"); ?> (<?php echo $dcurrency;?>)</td>	
<td style="vertical-align: middle;">:</td>
<td><input class="default" id="rbt10" name="rbt10" type="text" style="width: 300px;" onchange="cNumber(this,'2')" value="0.00" required /></td>
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
       url:'junilevel.act.php?a=0',
       type:'post',
	   beforeSubmit: function () {
			loadingstart();
			if (!confirm( addEntry() )) {
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

	   
    });
</script>
