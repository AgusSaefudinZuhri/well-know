<?php include_once('includes/config.php'); ?>
<script type="application/javascript" language="javascript">

function edit(x) {
	loadingstart();	
	if(cekzzz()) {	
		$('#dialog').dialog({
		title: '<?php echo T_("Verify Proofs");?>',
		width: 600,
		height: 500,
		closed: false,
		cache: false,
		href: 'member.proof.e.php?id='+x,
		modal: true  
		});
		loadingend ();
	}
	else  clogout ();		
}

function process (x) {
$.messager.confirm('<?php echo T_(" Confirmation"); ?>','<?php echo T_("Confirm to Pay?"); ?>',function(r0){
	if (r0){
	$.get('member.proof.act.php?a=0&x='+x, function(e) {
		var hasil = $.trim(e);
        if(hasil=="success") {
			cari('');
			$.messager.alert( sucProc(), "<?php echo T_("Transcation is successful!!!"); ?>","info");
			}
		else $.messager.alert( errProc(), hasil,"error"); 
		});
		}
	});
}


function reject (x) {
$.messager.confirm('<?php echo T_(" Confirmation"); ?>','<?php echo T_("Confirm to Reject?"); ?>',function(r0){
	if (r0){
	$.get('member.proof.act.php?a=2&x='+x, function(e) {
		var hasil = $.trim(e);
        if(hasil=="success") {
			cari('');
			$.messager.alert( sucProc(), "<?php echo T_("Transcation is successful!!!"); ?>","info");
			}
		else $.messager.alert( errProc(), hasil,"error"); 
		});
		}
	});
}

function cari(x) {
	loadingstart();	
	if(cekzzz()) {	
		if(x=='') x=$('#pg').val(); else x=x;

//		var mfilter=$("#mfilter").val();	
//		var nfilter=$("#nfilter").val();	

		var pfilter=$("#pfilter").val();	
		var vfilter=$("#vfilter").val();	
		var	fDownload	= encodeURI( 'member.proof.f.php?pg='+x+'&pf='+pfilter+'&vf='+vfilter);

		$('#iwrapper').load( fDownload, function () {loadingend();});
	}
	else  clogout ();
}

function tDownload() {
	var pfilter		= $("#pfilter").val();	
	var vfilter		= $("#vfilter").val();
	var	fDownload	= encodeURI('xls.member.proof.php?pf='+pfilter+'&vf='+vfilter);	
	window.open(fDownload, '_blank');
}

</script>


<div id="uwrapper" style="width: 98.5%; min-width: 800px; margin-left: 10px; padding: 0; padding-top: 10px;">
<table style="width: 98.5%; min-width: 800px;">
<tr>
<td style="text-align: right;">

<?php echo T_("Search");?>: <select id="pfilter" class="default" style="width: 100px;" >
    <option value="1" selected="selected"><?php echo T_("UserID");?></option>
    <option value="2" ><?php echo T_("Name");?></option>
<!--
    <option value="3" ><?php echo T_("Jenis Member");?></option>
-->    
</select>&nbsp;
<input type="text" title="<?php echo $searchPrm;?>" class="default" id="vfilter" style="width: 100px;" />&nbsp;&nbsp;&nbsp;
<input type="button" onclick="cari('1')" value="<?php echo $searchBtn;?>" />
</td>
</tr>
</table>
<div id="iwrapper">
<?php include('member.proof.f.php'); ?>
<br/>
</div>
</div>