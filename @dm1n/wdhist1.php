<?php include_once('includes/config.php'); ?>
<script type="application/javascript" language="javascript">

function dwdHist(pfilter, vfilter, mfilter, nfilter) {
		window.open('xls.wdhist1.php?pf='+pfilter+'&vf='+vfilter+'&mf='+mfilter+'&nf='+nfilter, '_blank');
}


function cari(x) {
	loadingstart();	
	if(cekzzz()) {	
		if(x=='') x=$('#pg').val(); else x=x;

		var mfilter=$("#mfilter").val();	
		var nfilter=$("#nfilter").val();	

		var pfilter=$("#pfilter").val();	
		var vfilter=$("#vfilter").val();	
		var	fCari	= encodeURI( 'wdhist1.f.php?pg='+x+'&pf='+pfilter+'&vf='+vfilter+'&mf='+mfilter+'&nf='+nfilter );

		$('#iwrapper').load( fCari, function () {loadingend();});
	}
	else  clogout ();
}

function tDownload() {
		var mfilter=$("#mfilter").val();	
		var nfilter=$("#nfilter").val();	
		var pfilter=$("#pfilter").val();	
		var vfilter=$("#vfilter").val();	
	var	fDownload	= encodeURI('xls.wdhist1.php?pf='+pfilter+'&vf='+vfilter+'&mf='+mfilter+'&nf='+nfilter );	
	window.open(fDownload, '_blank');
}
</script>

<div id="uwrapper" style="width: 98.5%; min-width: 800px; margin-left: 10px; padding: 0; padding-top: 10px;">
<table style="width: 98.5%; min-width: 800px;">
<tr>
<td style="text-align: right;">
<?php echo T_("From");?>:<input type="text" class="default dtpicker1" readonly="readonly" id="mfilter" style="width: 100px;" />&nbsp;
<?php echo T_("To");?>:<input type="text" class="default dtpicker1" readonly="readonly" id="nfilter" style="width: 100px;" />

<?php echo T_("Search");?>: <select id="pfilter" class="default" style="width: 100px;" >
    <option value="0" selected="selected"><?php echo T_("UserID");?></option>
<!--
    <option value="2" ><?php echo T_("Member Name");?></option>
    <option value="3" ><?php echo T_("Member Type");?></option>
    <option value="4" ><?php echo T_("Child of");?></option>
-->    
</select>&nbsp;
<input type="text" title="<?php echo T_("Search Parameter");?>" class="default" id="vfilter" style="width: 100px;" />&nbsp;&nbsp;&nbsp;
<input type="button" onclick="cari('1')" value="<?php echo T_("Search");?>" />
</td>
</tr>
</table>
<div id="iwrapper">
<?php include('wdhist1.f.php'); ?>
<br/>
</div>
</div>


<script>
    $(document).ready(function() 
    {

		$('.dtpicker1').datepicker({
		  changeMonth: true,
		  yearRange: '<?php echo date('Y', strtotime('-1 YEAR')); ?>:<?php echo date('Y'); ?>',
		  dateFormat: 'yy-mm-dd',
		  changeYear: true
		});
	});
</script>