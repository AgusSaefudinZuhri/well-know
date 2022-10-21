<?php 
	include_once('includes/config.php'); 
	include_once('includes/function.php'); 
	$row=mysqli_fetch_array(mysqli_query("SELECT * FROM g_temail WHERE id='".$_GET["id"]."'"));
?>
<script type="application/javascript" language="javascript">
function batalx() {
	tinymce.remove("#cttemmplate");
	batal();
}

</script>

<div style="padding: 10px;">
<span style="font-size: 16px; font-weight: bold;"><?php echo strtoupper(T_("Edit Email Template")); ?></span>
<form id="add_post" name="add_post" method="post">
<div style="height: 400px;">

<table style="width: 500px;">
<tbody>

<tr><td style="vertical-align: middle;"><?php echo $row["nmtemplate"]; ?></td>	
</td></tr>

<tr>
<td><textarea class="default" id="cttemmplate" name="cttemplate" type="text" style="width: 550px; height: 350px;" required ><?php echo $row["cttemplate"]; ?></textarea><td>
</td></tr>

</tbody>
</table>
</div>

<input type="button" value="<?php echo T_("Cancel"); ?>" onclick="batalx()" style="float: right;" />

<input type="submit" value="<?php echo T_("Save"); ?>" style="float: right; margin-right: 10px;"/>
</form>
</div>

<script>
    $(document).ready(function() 
    {
/*
	tinymce.init({
	  selector: '#cttemmplate',
	  height: 260,
	  entity_encoding : "raw",
	  theme: 'modern',
		plugins: [
		'advlist autolink lists link image charmap print preview hr anchor pagebreak',
		'searchreplace wordcount visualblocks visualchars code fullscreen',
		'insertdatetime media nonbreaking save table contextmenu directionality',
		'emoticons template paste textcolor colorpicker textpattern imagetools'
	  ],
	  toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent',
	  toolbar2: 'print preview | forecolor backcolor emoticons ',
	  image_advtab: true,
	  templates: [
		{ title: 'Test template 1', content: 'Test 1' },
		{ title: 'Test template 2', content: 'Test 2' }
	  ]
	 });
*/
       $("#add_post").ajaxForm({
       url:'temail.act.php?a=1&id=<?php echo $_GET["id"];?>',
       type:'post',
	   beforeSubmit: function () {
			loadingstart();
			if (!confirm("<?php echo T_("Confirm to Update Email Template?");?>")) {
				loadingend();
				return false;
			}
			if(!cekzzz()) {clogout(); return false;}
    },
       success:function(e){
		var hasil = $.trim(e);
//		alert(hasil);
        if(hasil=="success") {
			$.messager.alert('<?php echo T_("Success");?>', '<?php echo T_("Data is Saved");?>', 'info');
//			cari('');
			$("#dialog").dialog("close");
			loadingend();						
   		}
		else {$.messager.alert("<?php echo T_("Error in Process");?>", hasil,"error");loadingend();}
	   }
       });
    });
</script>
