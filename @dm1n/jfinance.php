<?php include_once('includes/config.php'); ?>
<script type="application/javascript" language="javascript">
function tambah() {
	loadingstart();	
	if(cekzzz()) {	
		$('#dialog').dialog({
		title: '<?php echo T_("Add Service"); ?>',
		width: 600,
		height: 500,
		closed: false,
		cache: false,
		href: 'jfinance.add.php',
		modal: true  
		});
		loadingend ();
	}
	else  clogout ();	
}

function edit(x) {
	loadingstart();	
	if(cekzzz()) {	
		$('#dialog').dialog({
		title: '<?php echo T_("Edit Service"); ?>',
		width: 600,
		height: 500,
		closed: false,
		cache: false,
		href: 'jfinance.e.php?id='+x,
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
		$('#iwrapper').load('jfinance.f.php?pg='+x+'&pf='+pfilter+'&vf='+vfilter, function () {loadingend();});
	}
	else  clogout ();
}


function hapus (x1) {
	if(confirm(cDeActivate())) {
		loadingstart();	
		if(cekzzz()) {		
			$.get('nonaktifk.php?t=17&id='+x1, function(e) {
				var hasil= e.trim();
				if(hasil=="success") {
					cari('');
					$.messager.alert(sucProc(), sucDeActivate(),'info');
					loadingend();
				}
				else {
					$.messager.alert(errProc(), hasil,'error');
					loadingend();
				}
			});
		}
	}
}

function aktifk (x1) {
	if(confirm(cActivate())) {
		loadingstart();	
		if(cekzzz()) {		
			$.get('aktifk.php?t=17&id='+x1, function(e) {
				var hasil= e.trim();
				if(hasil=="success") {
					cari('');
					$.messager.alert(sucProc(), sucActivate(),'info');
					loadingend();
				}
				else {
					$.messager.alert(errProc(), hasil,'error');
					loadingend();
				}
			});
		}
	}
}

</script>

<div id="uwrapper" style="width: 98.5%; min-width: 800px; margin-left: 10px; padding: 0; padding-top: 10px;">
<table style="width: 98.5%; min-width: 800px;">
<tr><td style="width: 50%;">
<a href="javascript:void(0);" class="tbutton tadd" onclick="tambah();" style="margin-top: 10px;"><?php echo T_("Add Service");?></a></td>
<td style="width: 50%; text-align: right;">
<select id="pfilter" class="default" >
    <option value="1" selected="selected"><?php echo T_("Service");?></option>
</select>&nbsp;&nbsp;&nbsp;
<input type="text" title="<?php echo T_("Search Parameter");?>" class="default" id="vfilter" />&nbsp;&nbsp;&nbsp;
<input type="button" onclick="cari('1')" value="<?php echo T_("Search");?>" />
</td>
</tr>
</table>
<div id="iwrapper">
<?php include('jfinance.f.php'); ?>
</div>
</div>