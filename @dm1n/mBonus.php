<?php include_once('includes/config.php'); ?>
<script type="application/javascript" language="javascript">

function cari(x) {
	loadingstart();	
	if(cekzzz()) {	
		if(x=='') x=$('#pg').val(); else x=x;
		var ofilter=$("#ofilter").val();	
		var pfilter=$("#pfilter").val();	
		var vfilter=$("#vfilter").val();	

		$.get('gcek.php?id='+vfilter, function(e) {
			var hasil= e.trim();
			if(hasil=='success') {
				var	fCari	= encodeURI( 'mBonus.f.php?pg='+x+'&of='+ofilter+'&pf='+pfilter+'&vf='+vfilter);	
				$('#iwrapper').load( fCari, function () {loadingend();});
			}
			else {
				$.messager.alert('<?php echo T_("Data Validity");?>','<?php echo T_("The UserID is not Valid.");?>','error');
				loadingend();
			}
		});


	}
	else  clogout ();
}

</script>


<div id="uwrapper" style="width: 98.5%; min-width: 800px; margin-left: 10px; padding: 0; padding-top: 10px;">
<table style="width: 98.5%; min-width: 800px;">
<tr>
    <td></td>
    <td style="text-align: right;">
		<?php echo T_("Bonus");?>: <select id="ofilter" class="default" style="width: 100px;" >
		<?php 
			$kTxt="SELECT a.* FROM g_jkomisi a WHERE a.status IN ('0', '1') ".$where;

			$kQry=mysqli_query($kTxt);

			while($kRow=mysqli_fetch_array($kQry)) { ?>

            <option value="<?php echo $kRow["id"];?>" ><?php echo $kRow["nmjkomisi"];?></option>
            
            <?php } ?>
        </select>&nbsp;

		<?php echo T_("Search");?>: <select id="pfilter" class="default" style="width: 100px;" >
            <option value="1" selected="selected"><?php echo T_("UserID");?></option>
        </select>&nbsp;
        <input type="text" title="<?php echo T_("Search Parameter");?>" class="default" id="vfilter" style="width: 100px;" />&nbsp;&nbsp;&nbsp;
        <input type="button" onclick="cari('1')" value="<?php echo T_("Search");?>" />
    </td>
</tr>
</table>
<div id="iwrapper" style="border-top: 1px solid #ccc;">
<?php // include('mBonus.f.php'); ?>
<br/>
</div>
</div>