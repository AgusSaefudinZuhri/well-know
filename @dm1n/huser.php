<?php include_once('includes/config.php'); ?>
<script type="application/javascript" language="javascript">
function edit(x) {
	loadingstart();	
	if(cekzzz()) {	
		$('#dialog').dialog({
		title: '<?php echo T_("Edit Access Right"); ?>',
		width: 600,
		height: 500,
		closed: false,
		cache: false,
		href: 'huser.e.php?id='+x,
		modal: true  
		});
		loadingend ();
	}
	else  clogout ();			
}

function cari(x) {
	loadingstart();	
	if(cekzzz()) {	
		if(x=='') x=$('#pg').val(); else x=x;
		var pfilter=$("#pfilter").val();	
		var vfilter=$("#vfilter").val();
		var	fDownload	= encodeURI( 'huser.f.php?pg='+x+'&pf='+pfilter+'&vf='+vfilter );		
		$('#iwrapper').load( fDownload, function () {loadingend();});
	}
	else  clogout ();
		
}
</script>

<div id="uwrapper" style="width: 98.5%; margin-left: 10px; padding: 0; padding-top: 10px;">
<table style="width: 100%;">
<tr><td style="width: 50%;"></td>
<td style="width: 50%; text-align: right;">
<select id="pfilter" class="default" >
    <option value="1"><?php echo T_("Group"); ?></option>
</select>&nbsp;&nbsp;&nbsp;
<input type="text" title="<?php echo $searchPrm; ?>" class="default" id="vfilter" />&nbsp;&nbsp;&nbsp;
<input type="button" onclick="cari('1')" value="<?php echo $searchBtn; ?>" />
</td>
</tr>
</table>
<div id="iwrapper">
<?php include('huser.f.php'); ?>
</div>
</div>