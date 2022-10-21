<?php include_once('includes/config.php'); ?>
<script type="application/javascript" language="javascript">
</script>

<div style="padding: 10px;">
<span style="font-size: 16px; font-weight: bold;"><?php echo strtoupper(T_("Add Document")); ?></span>
<form id="add_post" name="add_post" method="post">
<div style="height: 390px; overflow-x: hidden; overflow-y: auto; margin-bottom: 10px;">

<table style="width: 600px;">
<tbody>

<tr>
<td style="width: 150px; vertical-align: middle;"><?php echo T_("Description"); ?></td>	
<td style="vertical-align: middle;">:</td>
<td><input class="default" id="deskripsi" name="deskripsi" type="text" style="width: 300px;" required /></td>
</tr>

<tr>
<td style="width: 150px; vertical-align: middle;"><?php echo T_("Document"); ?></td>	
<td style="vertical-align: middle;">:</td>
<td>
<input class="default" id="doclink" name="doclink" type="text" style="width: 300px;" readonly="readonly" required />&nbsp;
<a class="tbutton tsearch" href="javascript: void(0);" onclick="$('#fimage').click()">&nbsp;</a>
</td>
</tr>

</tbody>
</table>
</div>

<input type="button" value="<?php echo $batalBtn; ?>" onclick="batal()" style="float: right;" />

<input type="submit" value="<?php echo $simpanBtn; ?>" style="float: right; margin-right: 10px;"/>
</form>

<form id="my_form" action="docupl.php" target="form_target" method="post" enctype="multipart/form-data" style="width:0px;height:0;overflow:hidden">
    <input type="text" id="fname" name="fname" /> 
    <input id="fimage" name="fimage" type="file" onchange="$('#my_form').submit();this.value='';">
</form>

</div>

<script>
    $(document).ready(function() 
    {
       $("#add_post").ajaxForm({
       url:'techDoc.act.php?a=0',
       type:'post',
	   beforeSubmit: function () {
			loadingstart();
			if (!confirm( addEntry() )) {
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

       $("#my_form").ajaxForm({
       url:'docupl.php',
       type:'post',
	   beforeSubmit: function () {
			loadingstart();
			if (!confirm( imgUplMsg() )) {
				loadingend();
				return false;
			}
			if(!cekzzz()) {ciconlinkut(); return false;}
		},	   
       success:function(e){
		var hasil = $.trim(e);
        var xhasil=hasil.split("|");
		if(xhasil[0]=="success") {
			$('#doclink').val(xhasil[1]);
			loadingend();
   		}
		else {$.messager.alert( errProc(), hasil,"error");loadingend();}
	   }
       });
	   
    });
</script>