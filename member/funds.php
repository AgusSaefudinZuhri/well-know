<?php include_once('includes/config.php');

$funds=mysqli_fetch_array(mysqli_query("
	SELECT a.*, SUM( IF( a.jtransaksi='0', a.trxvalue,'0' ) ) - SUM( IF( a.jtransaksi='1', a.trxvalue,'0' ) ) jnilai
	FROM g_wfund a
	WHERE a.userid='".$_SESSION["userid"]."' AND a.status IN ('0','1')
	"));
	
	$tSaldo = $funds["jnilai"];

 ?>
<script type="application/javascript" language="javascript">

function cekThis(y) {
	var tCek = parseFloat(y.value);
	if(tCek > <?php echo $tSaldo;?>) {
//		alert('<?php echo T_("The amount must be lower or equal your Current Balance!!!");?>');
		$.messager.alert('<?php echo T_("Not Allowed");?>','<?php echo T_("The amount must be lower or egual your Current Balance!!!");?>', 'error');
		$(y).val('');
//		$(y).focus();
	}
/*	
	else if(tCek < <?php echo $wdMin;?>) {
		$.messager.alert('<?php echo T_("Not Allowed");?>','<?php echo T_("The amount must be greater than ").$syscurrency." ".$wdMin;?>', 'error');
		$(y).val('');
		//$(y).focus();
	}
	*/		
	else {
//		alert( tCek +' * <?php echo  $dConversion; ?> * ( 100 - <?php echo $cashWDadmin; ?>) / 100 ' );
/*		var reqcv	= tCek * ( 100 - <?php echo $cashWDadmin; ?>) / 100;	
		var byadmin	= tCek * ( <?php echo $cashWDadmin; ?>) / 100;	
		$('#vreqcv').val(reqcv);
		$('#byadmin').val(byadmin);
		$('#vreqcv').trigger('change');
		$('#byadmin').trigger('change');
*/		
		cNumber(y,'2');	
		
	}
	
}


function cekUserIDx( x ) {
	var uidx = x.value;
	if( uidx == '<?php echo $_SESSION["userid"];?>' ) {
		$.messager.alert('Error', 'Send to yourself is not allowed!!!', 'error');
		x.value='';
	}
	else {
		loadingstart();
		$.get('transfer.user.cek.php?id='+uidx, function(data) {
			var hasil=data.trim();
			if(hasil!='success') {
				$.messager.alert( errProc(), data, 'error');
				$(x).val('');
				}
			loadingend();
		});
		
		
	}
	
}

function cari(x) {
	loadingstart();	
	if(cekzzz()) {
		if(x=='') x=$('#pg').val(); else x=x;		
//		var pfilter=$("#pfilter").val();	
//		var vfilter=$("#vfilter").val();
		var	fCari	= encodeURI( 'funds.f.php?pg='+x );		
		$('#iwrapper').load( fCari, function () {loadingend();});
	}
	else  clogout ();
}

</script>

 <div class="row">
	<div class="col-lg-12">
		<div class="page-header"><?php echo T_("Manage Funds");?></div>
	</div>
</div>
<style>
#the_content {min-width: 0;}

 #profil td{ padding: 5px; font-size: 14px;}
 #profil td.kiri{ text-align: left; width: 150px;}
 #profil td.tengah{ text-align: center; width: 10px;}
 #profil td.kanan input[type="text"]{ width: 300px; }
 #profil td.kanan textarea{ width: 300px;height: 75px; }

 </style>
 

<div id="c_content">
<div class="row">


<div class="col-lg-12 col-md-12 ">
<p>Your Available Funds: <?php echo $syscurrency." ".number_format( $funds["jnilai"],2 ); ?></p>

    <section class="panel">
        <header class="panel-heading my-header">
            <?php echo T_("Transfer Ammount");?>
        </header>
		<div class="panel-body bio-graph-info">

<form class="form-horizontal" role="form"  id="add_post" name="add_post" method="post">

<div class="col-sm-12">   

	<div class="form-group">
		<label class="col-sm-4 control-label"><?php echo T_("Transfer Amount"); ?> (<?php echo $syscurrency; ?>) <span style="color: #FF0000;"> * </span></label>
		<div class="col-sm-6">
			<input type="text" name="trxvalue" id="trxvalue" class="default form-control" onchange="cekThis(this);"  required />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-4 control-label"><?php echo T_("To Member"); ?> <span style="color: #FF0000;"> * </span></label>
		<div class="col-sm-6">
			<!-- <div class="input-group"> -->
            <input type="text" name="useridx" id="useridx" class="default form-control" onchange="cekUserIDx(this);"  required />
            <!-- <span class="input-group-addon" onclick="cekUserIDx('<?php echo $_SESSION["userid"];?>');" style=" cursor: pointer; " >Cek Member</span> -->
            <!-- </div> -->
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-4 control-label"><?php echo T_("Remarks"); ?></label>
		<div class="col-sm-6">
			<textarea name="remark2" id="remark2" class="default form-control"  ></textarea>
		</div>
	</div>


	<div id="ewpassword" class="form-group">
		<label class="col-sm-4 control-label"><?php echo T_("Security Password"); ?> <span style="color: #FF0000;"> * </span></label>
		<div class="col-sm-6">
			<input type="password" name="password2" id="password2" class="default form-control"  required />
		</div>
	</div>


<div class="form-group">
	<div class="col-sm-offset-4 col-sm-8">
		<input type="submit" value="<?php echo T_("Submit"); //$simpanBtn;?>"/>
	</div>
</div>
</div>
</form>          
</div>
</section>
</div>

<div class="col-lg-12 col-md-12 ">

<p><i class="fa fa-table"></i> Funds Transfer History</p>

	<div id="iwrapper">
	<?php include('funds.f.php'); ?>
    </div>

</div>


</div>

</div>


</div>
<script>
    $(document).ready(function() 
    {

       $("#add_post").ajaxForm({
       url:'transfer.act.php?a=1&id=<?php echo $_SESSION["userid"];?>',
       type:'post',
	   beforeSubmit: function () {
		loadingstart();
		if (!confirm("<?php echo T_("Confirm to Send?"); ?>")) {
			loadingend();
            return false;
        }
		if(!cekzzz()) {clogout(); return false;}
    },
       	success:function(e){
			var hasil = $.trim(e);
		//		alert(hasil);
			if(hasil=="success") {
				$.messager.alert( sucProc(), "<?php echo T_("Transaction is Succesfull");?>!!!","info");
				loadpagez('funds.php');					
			}
			else {
				$.messager.alert( errProc(), hasil,"error");
				loadpagez('funds.php');					
				loadingend();}

	   }
       });	


	   	   	   
    });	
</script>
