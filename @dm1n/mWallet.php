<?php include_once('includes/config.php'); ?>
<script type="application/javascript" language="javascript">

function vwBonus(y, x) {
	loadingstart();	
	if(cekzzz()) {	
		$('#dialog').dialog({
		title: '<?php echo T_("Commission"); ?>',
		width: 900,
		height: 600,
		closed: false,
		cache: false,
		href: 'member.vwBonus.php?id='+x+'&j='+y,
		modal: true  
		});
		loadingend ();
	}
	else  clogout ();
}

function vwRanking(x) {
	loadingstart();	
	if(cekzzz()) {	
		$('#dialog').dialog({
		title: '<?php echo T_("Ranking Bonus"); ?>',
		width: 900,
		height: 600,
		closed: false,
		cache: false,
		href: 'member.vwRanking.php?id='+x,
		modal: true  
		});
		loadingend ();
	}
	else  clogout ();
}


function vwWd(x) {
	loadingstart();	
	if(cekzzz()) {	
		$('#dialog').dialog({
		title: '<?php echo T_("Withdrawal"); ?>',
		width: 900,
		height: 600,
		closed: false,
		cache: false,
		href: 'member.vwWd.php?id='+x,
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
		//var ofilter=$("#ofilter").val();	
		var pfilter=$("#pfilter").val();	
		var vfilter=$("#vfilter").val();	

//		$.get('gcek.php?id='+vfilter, function(e) {
//			var hasil= e.trim();
//			if(hasil=='success') {
				var	fCari	= encodeURI( 'mWallet.f.php?pg='+x+'&pf='+pfilter+'&vf='+vfilter);	
				$('#iwrapper').load( fCari, function () {loadingend();});
/*			}
			else {
				$.messager.alert('<?php echo T_("Data Validity");?>','<?php echo T_("The UserID is not Valid.");?>','error');
				loadingend();
			} */
//		});


	}
	else  clogout ();
}

</script>


<div id="uwrapper" style="width: 98.5%; min-width: 800px; margin-left: 10px; padding: 0; padding-top: 10px;">
<table style="width: 98.5%; min-width: 800px;">
<tr>
    <td></td>
    <td style="text-align: right;">
    <!--
		<?php echo T_("Wallet");?>: <select id="ofilter" class="default" style="width: 100px;" >
            <option value="1" selected="selected"><?php echo T_("Fund");?></option>
<!--
                        <option value="2" ><?php echo T_("Register");?></option>
            <option value="3" ><?php echo T_("PV");?></option>
            -->
      <!--  </select>&nbsp; -->

		<?php echo T_("Search");?>: <select id="pfilter" class="default" style="width: 100px;" >
            <option value="1" selected="selected"><?php echo T_("UserID");?></option>
        </select>&nbsp;
        <input type="text" title="<?php echo T_("Search Parameter");?>" class="default" id="vfilter" style="width: 100px;" />&nbsp;&nbsp;&nbsp;
        <input type="button" onclick="cari('1')" value="<?php echo T_("Search");?>" />
    </td>
</tr>
</table>
<div id="iwrapper" style="border-top: 1px solid #ccc;">
<?php  include('mWallet.f.php'); ?>
<br/>
</div>
</div>