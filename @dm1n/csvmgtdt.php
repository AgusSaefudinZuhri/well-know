<?php include_once('includes/config.php'); ?>
<script type="application/javascript" language="javascript">

function cari(x) {
	loadingstart();	
	if(cekzzz()) {	
		if(x=='') x=$('#pg').val(); else x=x;

		var pfilter=$("#pfilter").val();	
		var vfilter=$("#vfilter").val();	
		var	fCari	= encodeURI( 'csvmgtdt.f.php?pg='+x+'&pf='+pfilter+'&vf='+vfilter);	
		$('#iwrapper').load( fCari, function () {loadingend();});
	}
	else  clogout ();
}

function tDownload() {
	var pfilter		= $("#pfilter").val();	
	var vfilter		= $("#vfilter").val();
	var	fDownload	= encodeURI('xls.csvmgtdt.php?pf='+pfilter+'&vf='+vfilter);	
	window.open(fDownload, '_blank');
}
</script>


<div id="uwrapper" style="width: 98.5%; min-width: 800px; margin-left: 10px; padding: 0; padding-top: 10px;">
<table style="width: 98.5%; min-width: 800px;">
<tr>
<td><a href="javascript: void(0);" onclick="$('#ximage1').click();" class="tbutton"><?php echo T_("Add CSV");?></a></a>
</td>
<td style="text-align: right;"></td>
</tr>
</table>
<br/><br/>
<div id="iwrapper">
<?php include('csvmgtdt.f.php'); ?>
<br/>
</div>
</div>
                        <form id="my_formX" action="uploadDoc1.php" target="form_target" method="post" enctype="multipart/form-data" style="width:0px;height:0;overflow:hidden">
                            <input id="ximage1" name="ximage1" type="file" onchange="$('#my_formX').submit();this.value='';">
                        </form>     


<script>
	

    $(document).ready(function() 
    {

       $("#my_formX").ajaxForm({
       url:'uploadDoc1.php',
       type:'post',
       success:function(e){
		var dhasil = $.trim(e);
        var xhasil=dhasil;
		if(xhasil=="success") {
			$.messager.alert( sucProc(), "<?php echo T_("Upload Done");?>", 'info' );
			cari('');
			loadingend();
   		}
		else $.messager.alert(errProc(), hasil,"error");
	   }
       });
	   	   	   
    });	
</script>
