<?php include_once('includes/config.php'); ?>
<script type="application/javascript" language="javascript">

function edit(x) {
	loadingstart();	
	if(cekzzz()) {	
		$('#dialog').dialog({
		title: '<?php echo T_("Edit Template Email"); ?>',
		width: 600,
		height: 500,
		closed: false,
		cache: false,
		href: 'temail.e.php?id='+x,
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
		var	fDownload	= encodeURI( 'f.temail.php?pg='+x+'&pf='+pfilter+'&vf='+vfilter );		
		$('#iwrapper').load( fDownload, function () {loadingend();});
	}
	else  clogout ();
}

</script>


<div id="uwrapper" style="width: 98.5%; min-width: 800px; margin-left: 10px; padding: 0; padding-top: 10px;">
<table style="width: 98.5%; min-width: 800px;">
<tr>
    <td style="width: 30%;">
    <!--<a href="javascript:void(0);" class="tbutton tadd" onclick="tambah();" style="margin-top: 10px;"><?php echo T_("Add Email Template");?></a>-->
    </td>
    <td style="width: 70%; text-align: right;">
    <select id="pfilter" class="default" style="width: 100px;">
        <option value="1" selected="selected"><?php echo T_("Nama Template");?></option>
    </select>&nbsp;&nbsp;&nbsp;
    <input type="text" title="<?php echo $searchPrm;?>" class="default" id="vfilter" style="width: 100px;" />&nbsp;&nbsp;&nbsp;
    <input type="button" onclick="cari('1')" value="<?php echo $searchBtn;?>" />
    </td>
</tr>
</table>
<div id="iwrapper">
<?php include('temail.f.php'); 
?>
</div>
</div>