<?php include_once('includes/config.php'); ?>
<script type="application/javascript" language="javascript">


function dwdmt4Req (pfilter, vfilter) {
//	alert('xls.wdmt4req.php?pf='+pfilter+'&vf='+vfilter);
//		window.open('xls.wdmt4req.php?pf='+pfilter+'&vf='+vfilter, '_blank');
}

function s_all(all) {
	if(all.checked) {
      $('.invid').each(function() {
          this.checked = true;
      });
  }
  else {
    $('.invid').each(function() {
          this.checked = false;
      });
  }	
	
}


function bayar (x) {
	loadingstart();	
	if(cekzzz()) {	
		$('#dialog').dialog({
		title: '<?php echo T_("Approve Deposit");?>',
		width: 600,
		height: 500,
		closed: false,
		cache: false,
		href: 'wdmt4.e.php?id='+x,
		modal: true  
		});
		loadingend ();
	}
	else  clogout ();		
}


function hapus (x) {
$.messager.confirm('<?php echo T_(" Confirmation"); ?>','<?php echo T_("Confirm to Reject?"); ?>',function(r0){
	if (r0){
	$.get('wdmt4.act.php?a=2&x='+x, function(e) {
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


function bayar_list () {
$.messager.confirm('<?php echo T_("Payment Confirmation"); ?>','<?php echo T_("Confirm to Pay?"); ?>',function(r0){
	if (r0){
		var warray = [];
		var sukses = 1;
	
		$(".invid:checked").each(function(){   	   
			var invid = $(this).val();
		   warray.push([invid]);
		});
		
		var selected =  JSON.stringify(warray); 

		$.get('wdmt4req.act.php?a=1&m='+selected, function(e) {
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


function reject_list () {
$.messager.confirm('<?php echo T_("Reject Confirmation"); ?>','<?php echo T_("Confirm to Reject?"); ?>',function(r0){
	if (r0){
		var warray = [];
		var sukses = 1;
//		var userid = $('#userid').val();
	
		$(".invid:checked").each(function(){   	   
			var invid = $(this).val();
		   warray.push([invid]);
		});
		
		var selected =  JSON.stringify(warray); 
	//	alert(selected);
		$.get('wdmt4req.act.php?a=3&m='+selected, function(e) {
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

		var pfilter=$("#pfilter").val();	
		var vfilter=$("#vfilter").val();	
		var	fCari	= encodeURI( 'wdmt4req.f.php?pg='+x+'&pf='+pfilter+'&vf='+vfilter);	
		$('#iwrapper').load( fCari, function () {loadingend();});
	}
	else  clogout ();
}

function tDownload() {
	var pfilter		= $("#pfilter").val();	
	var vfilter		= $("#vfilter").val();
	var	fDownload	= encodeURI('xls.wdmt4req.php?pf='+pfilter+'&vf='+vfilter);	
	window.open(fDownload, '_blank');
}
</script>


<div id="uwrapper" style="width: 98.5%; min-width: 800px; margin-left: 10px; padding: 0; padding-top: 10px;">
<table style="width: 98.5%; min-width: 800px;">
<tr>
<td><!--<?php if($_SESSION["x3"]=='1' or $_SESSION['grup_b']=='0') { ?><a href="javascript: void(0);" onclick="bayar_list()" class="tbutton"><?php echo T_("Pay Selected");?></a><?php } ?><!--&nbsp;<a href="javascript: void(0);" onclick="reject_list()" class="tbutton" style="background: red;"><?php echo T_("Reject Selected");?></a>--></td>
<td style="text-align: right;">
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
<?php include('wdmt4req.f.php'); ?>
<br/>
</div>
</div>