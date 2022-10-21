<?php 
	include_once('includes/config.php');
	$thumbproduk_width = 'auto';
	$thumbproduk_height = 100;
?>
<script type="application/javascript" language="javascript">
</script>

<div style="padding: 10px;">
<span style="font-size: 16px; font-weight: bold;"><?php echo strtoupper(T_("Add Service")); ?></span>
<form id="add_post" name="add_post" method="post">
<div style="height: 400px;">

<table style="width: 600px;">
<tbody>

	<tr>
		<td style="width: 150px; vertical-align: middle;"><?php echo T_("Service Name"); ?></td>	
		<td style="vertical-align: middle;">:</td>
		<td><input class="default" id="nmjfinance" name="nmjfinance" type="text" style="width: 300px;" required /></td>
	</tr>

	<tr>
		<td style="width: 150px; vertical-align: middle;"><?php echo T_("Group"); ?></td>	
		<td style="vertical-align: middle;">:</td>
		<td>
			<select class="default" id="gjfinanceid" name="gjfinanceid" style="width: 300px;" required >
			<option value="" selected disabled><?php echo T_("Please Select"); ?></option>
			<?php 
				$oTxt	= "SELECT * FROM g_gjfinance WHERE status = '1' ORDER BY id";
				$oQry	= mysql_query( $oTxt );
				
				while( $oRow = mysql_fetch_array( $oQry ) ) { ?>
			<option value="<?php echo $oRow["id"];?>" ><?php echo $oRow["nmgjfinance"];?></option>
			<?php } ?>
			</select>
			</td>
	</tr>

	<tr>
		<td style="width: 150px; vertical-align: middle;"><?php echo T_("Process Time"); ?></td>	
		<td style="vertical-align: middle;">:</td>
		<td><input class="default" id="wkproses" name="wkproses" type="text" style="width: 300px;" required /></td>
	</tr>

	<tr>
		<td style="width: 150px; vertical-align: middle;"><?php echo T_("Comission"); ?></td>	
		<td style="vertical-align: middle;">:</td>
		<td><input class="default" id="vlkomisi" name="vlkomisi" type="text" style="width: 300px;" required /></td>
	</tr>

	<tr>
		<td style="width: 150px; vertical-align: middle;"><?php echo T_("Acc. Name"); ?></td>	
		<td style="vertical-align: middle;">:</td>
		<td><input class="default" id="nmakun" name="nmakun" type="text" style="width: 300px;" /></td>
	</tr>

	<tr>
		<td style="width: 150px; vertical-align: middle;"><?php echo T_("Acc. No"); ?></td>	
		<td style="vertical-align: middle;">:</td>
		<td><input class="default" id="noakun" name="noakun" type="text" style="width: 300px;" /></td>
	</tr>

	<tr>
		<td style="width: 150px; vertical-align: middle;"><?php echo T_("Branch"); ?></td>	
		<td style="vertical-align: middle;">:</td>
		<td><input class="default" id="cabakun" name="cabakun" type="text" style="width: 300px;" /></td>
	</tr>

	<tr>
		<td style="width: 150px; vertical-align: top;"><?php echo T_("Currency"); ?></td>	
		<td style="vertical-align: top;">:</td>
		<td>
			<?php 
				$cTxt = "SELECT * FROM g_kurs WHERE status='1' ORDER BY id";
				$cQry = mysql_query( $cTxt );
			
				while( $cRow = mysql_fetch_array( $cQry )) { ?>
				
			<input type="checkbox" id="kursid" name="kursid[]" value="<?php echo $cRow["id"]; ?>" /><?php echo $cRow["id"].' - '.$cRow["nmkurs"]; ?><br/>
				
			<?php } ?>
			
			</td>
	</tr>

	<tr>
		<td style="width: 150px; vertical-align: middle;"><?php echo T_("Thumbnail Link"); ?></td>	
		<td style="vertical-align: middle;">:</td>
		<td><input class="default" id="thumblink" name="thumblink" type="text" style="width: 300px;" readonly required /> <a class="tbutton tsearch" href="javascript: void(0);" onclick="$('#fimage').click()">&nbsp;</a></td>
	</tr>

	<tr>
		<td style="width: 150px; vertical-align: middle;"></td>	
		<td style="vertical-align: middle;"></td>
		<td><div id="thumbdiv"></div></td>
	</tr>

</tbody>
</table>
</div>

<input type="button" value="<?php echo $batalBtn; ?>" onclick="batal()" style="float: right;" />

<input type="submit" value="<?php echo $simpanBtn; ?>" style="float: right; margin-right: 10px;"/>
</form>

<form id="my_form" action="produkupl.php" target="form_target" method="post" enctype="multipart/form-data" style="width:0px;height:0;overflow:hidden">
    <input type="text" id="fname" name="fname" /> 
    <input id="fimage" name="fimage" type="file" onchange="$('#my_form').submit();this.value='';">
</form>

</div>

<script>
    $(document).ready(function() 
    {
       $("#add_post").ajaxForm({
       url:'jfinance.act.php?a=0',
       type:'post',
	   beforeSubmit: function () {
			loadingstart();
			if (!confirm(addEntry())) {
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

       $("#my_form").ajaxForm({
       url:'produkupl.php',
       type:'post',
	   beforeSubmit: function () {
			loadingstart();
			if (!confirm("<?php echo T_("The image will be resized and cropped to suitable size. Confirm to upload the image?");?>")) {
				loadingend();
				return false;
			}
			if(!cekzzz()) {clogout(); return false;}
		},	   
       success:function(e){
		var hasil = $.trim(e);
        var xhasil=hasil.split("|");
		if(xhasil[0]=="success") {
			$('#thumbdiv').html('<img src="'+xhasil[1]+'" style="width: <?php echo $thumbproduk_width;?>px;height: <?php echo $thumbproduk_height;?>px;"/>');
			$('#thumblink').val(xhasil[1]);
			loadingend();
   		}
		else {$.messager.alert(errProc(), hasil,"error");loadingend();}
	   }
       });


    });
</script>
