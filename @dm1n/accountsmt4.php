<?php include_once('includes/config.php'); ?>
<script type="application/javascript" language="javascript">

function edit(x) {
	loadingstart();	
	if(cekzzz()) {	
		$('#dialog').dialog({
		title: '<?php echo T_("Add Account");?>',
		width: 600,
		height: 500,
		closed: false,
		cache: false,
		href: 'accountsmt4.e.php?id='+x,
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
		var	fDownload	= encodeURI( 'accountsmt4.f.php?pg='+x+'&pf='+pfilter+'&vf='+vfilter);

		$('#iwrapper').load( fDownload, function () {loadingend();});
	}
	else  clogout ();
}

function tDownload() {
	var pfilter		= $("#pfilter").val();	
	var vfilter		= $("#vfilter").val();
	var	fDownload	= encodeURI('xls.accountsmt4.php?pf='+pfilter+'&vf='+vfilter);	
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
<?php include('accountsmt4.f.php'); ?>
<br/>
</div>
</div>