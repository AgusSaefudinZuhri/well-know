<?php include_once('includes/config.php'); ?>
<script type="application/javascript" language="javascript">

function vwAkunMT4 ( x ) {
	loadingstart();	
	if(cekzzz()) {	
		$('#dialog').dialog({
		title: '<?php echo T_("View MT4 Account"); ?>',
		width: 600,
		height: 500,
		closed: false,
		cache: false,
		href: 'member.vwAkunMT4.php?id='+x,
		modal: true  
		});
		loadingend ();
	}
	else  clogout ();
}
	
function view(x) {
	loadingstart();	
	if(cekzzz()) {	
		$('#dialog').dialog({
		title: '<?php echo T_("View Member"); ?>',
		width: 600,
		height: 500,
		closed: false,
		cache: false,
		href: 'member.v.php?id='+x,
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
		title: '<?php echo T_("Edit Member"); ?>',
		width: 600,
		height: 500,
		closed: false,
		cache: false,
		href: 'member.e.php?id='+x,
		modal: true  
		});
		loadingend ();
	}
	else  clogout ();
}
/*
function trans(x) {
	loadingstart();	
	if(cekzzz()) {	
		$('#dialog').dialog({
		title: '<?php echo T_("Utility"); ?>',
		width: 600,
		height: 300,
		closed: false,
		cache: false,
		href: 'member.u.php?id='+x,
		modal: true  
		});
		loadingend ();
	}
	else  clogout ();
}
*/

function xHapus(x1) {
	if(confirm("<?php echo T_("Confirm to Delete Member?");?>")) {
		loadingstart();
		if(cekzzz()) {	
			$.get('m.member.hapus.php?id='+x1, function(e) {
				var hasil= e.trim();
				if(hasil=="success") {
					cari('');
					$.messager.alert( sucProc(), '<?php echo T_("Member is deleted!");?>','info');
					loadingend();
				}
				else {
					$.messager.alert( errProc(), hasil,'error');
					loadingend();
					}
			});
		}
		else  clogout ();
	}
}

function setup(x) {
	loadingstart();	
	if(cekzzz()) {	
		$('#dialog').dialog({
		title: '<?php echo T_("Configuration"); ?>',
		width: 600,
		height: 400,
		closed: false,
		cache: false,
		href: 'member.conf.php?id='+x,
		modal: true  
		});
		loadingend ();
	}
	else  clogout ();
}

function ustokis(x) {
	loadingstart();	
	if(cekzzz()) {	
		$('#dialog').dialog({
		title: '<?php echo T_("Upgrade Stockist"); ?>',
		width: 450,
		height: 200,
		closed: false,
		cache: false,
		href: 'ustokis.php?id='+x,
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

//		var mfilter=$("#mfilter").val();	
//		var nfilter=$("#nfilter").val();	

		var pfilter=$("#pfilter").val();	
		var vfilter=$("#vfilter").val();	
		var	fDownload	= encodeURI( 'm.member.f.php?pg='+x+'&pf='+pfilter+'&vf='+vfilter);

		$('#iwrapper').load( fDownload, function () {loadingend();});
	}
	else  clogout ();
}

function tDownload() {
	var pfilter		= $("#pfilter").val();	
	var vfilter		= $("#vfilter").val();
	var	fDownload	= encodeURI('xls.m.member.php?pf='+pfilter+'&vf='+vfilter);	
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
<?php include('m.member.f.php'); ?>
<br/>
</div>
</div>