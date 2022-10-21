<?php 
include_once('includes/config.php'); 
$row	= mysqli_fetch_array(mysqli_query("SELECT * FROM g_member WHERE userid='".$_GET["id"]."'"));

?>

<script type="application/javascript" language="javascript">
function chValue ( x, y ) {
		
		if($(x).is(':checked')) $('#'+y).val('1'); else $('#'+y).val('0');	
		
	}
</script>

<div style="padding: 10px;">
<span style="font-size: 16px; font-weight: bold;"><?php echo strtoupper(T_("Configure Member")); ?></span>
<form id="add_post" name="add_post" method="post">
<div style="height: 300px; overflow-x: hidden; overflow-y: auto; margin-bottom: 5px;">

<table class="dUser" style="width: 540px;">
<tr><td style="width: 150px; vertical-align: middle;"><?php echo T_("UserID"); ?></td>	
<td style="vertical-align: middle;">:</td>
<td><?php echo $row["userid"]; ?></td></tr>

<tr><td style="width: 150px; vertical-align: middle;"><?php echo T_("Full Name"); ?></td>	
<td style="vertical-align: middle;">:</td>
<td><?php echo $row["nmmember"]; ?></td></tr>

<tr>
<td style="width: 150px; vertical-align: middle;"><?php echo T_("Block ROI"); ?></td>	
<td style="vertical-align: middle;">:</td>
<td><label class="switch"><input type="checkbox" onchange="chValue(this,'roiblock')" <?php if($row["roiblock"]=='1') echo 'checked="checked"';?> ><div class="slider round"></div></label>
  <input type="hidden" id="roiblock" name="roiblock" readonly="readonly"  value="<?php echo $row["roiblock"];?>" /></td>
</tr>
<!--
<tr>
<td style="width: 150px; vertical-align: middle;"><?php echo T_("Free Account"); ?></td>	
<td style="vertical-align: middle;">:</td>
<td><label class="switch"><input type="checkbox" onchange="chValue(this,'freeacc')" <?php if($row["freeacc"]=='1') echo 'checked="checked"';?> ><div class="slider round"></div></label>
  <input type="hidden" id="freeacc" name="freeacc" readonly="readonly"  value="<?php echo $row["freeacc"];?>" /></td>
</tr>

<tr>
<td style="width: 150px; vertical-align: middle;"><?php echo T_("Team Leader"); ?></td>	
<td style="vertical-align: middle;">:</td>
<td><label class="switch"><input type="checkbox" onchange="chValue(this,'spm1')" <?php if($row["spm1"]=='1') echo 'checked="checked"';?> ><div class="slider round"></div></label>
  <input type="hidden" id="spm1" name="spm1" readonly="readonly"  value="<?php echo $row["spm1"];?>" /></td>
</tr>

<tr>
<td style="width: 150px; vertical-align: middle;"><?php echo T_("Comp. Account"); ?></td>	
<td style="vertical-align: middle;">:</td>
<td><label class="switch"><input type="checkbox" onchange="chValue(this,'compacc')" <?php if($row["compacc"]=='1') echo 'checked="checked"';?> ><div class="slider round"></div></label>
  <input type="hidden" id="compacc" name="compacc" readonly="readonly"  value="<?php echo $row["compacc"];?>" /></td>
</tr>

<!--
<tr>
<td style="width: 150px; vertical-align: middle;"><?php echo T_("Spc Mbr - Total"); ?> (Rp)</td>	
<td style="vertical-align: middle;">:</td>
<td id="tUtility"><input type="text" class="default uinput" id="bspm1" name="bspm1" style="width: 150px;padding: 5px 7px;" onchange="cNumber(this,'0')"   value="<?php echo number_format( $row["bspm1"] );?>" /></td>
</tr>
-->
<!--
<tr>
<td style="width: 150px; vertical-align: middle;"><?php echo T_("Spc Mbr - Jaringanku"); ?></td>	
<td style="vertical-align: middle;">:</td>
<td><label class="switch"><input type="checkbox" onchange="chValue(this,'spm2')" <?php if($row["spm2"]=='1') echo 'checked="checked"';?> ><div class="slider round"></div></label>
  <input type="hidden" id="spm2" name="spm2" readonly="readonly"  value="<?php echo $row["spm2"];?>" /></td>
</tr>
<!--
<tr>
<td style="width: 150px; vertical-align: middle;"><?php echo T_("Spc Mbr - Jaringanku"); ?> (Rp)</td>	
<td style="vertical-align: middle;">:</td>
<td id="tUtility"><input type="text" class="default uinput" id="bspm2" name="bspm2" style="width: 150px;padding: 5px 7px;" onchange="cNumber(this,'0')"  value="<?php echo number_format( $row["bspm2"] );?>" /></td>
</tr>
-->
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
       url:'member.act.php?a=6&id=<?php echo $_GET["id"];?>',
       type:'post',
	   beforeSubmit: function () {
			loadingstart();
			if (!confirm("<?php echo T_("Simpan Konfigurasi?");?>")) {
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
