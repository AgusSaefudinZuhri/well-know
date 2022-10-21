<?php include_once('includes/config.php');

$funds=mysql_fetch_array(mysql_query("
	SELECT a.*, SUM( IF( a.jtransaksi='0', a.trxvalue,'0' ) ) - SUM( IF( a.jtransaksi='1', a.trxvalue,'0' ) ) jnilai
	FROM g_wfund a
	WHERE a.userid='".$_SESSION["userid"]."' AND a.status IN ('0','1') 
	"));
	
	if( is_null($funds["jnilai"]) ) $tSaldo = 0; else $tSaldo = $funds["jnilai"];

	$wdDays = explode( ',', $wdStartDt );
	$payDays = explode( ',', $wdEndDt );
//	print_r( $payDays );
	
	$wdDaysName = '';
	$payDaysName = '';

	for( $i = 0; $i<sizeof($wdDays); $i++ ) $wdDaysName .= date( 'l', strtotime("Sunday +".$wdDays[$i]." days") ).', ';
	for( $j = 0; $j<sizeof($payDays); $j++ ) $payDaysName .= date( 'l', strtotime("Sunday +".$payDays[$j]." days") ).', ';
	$wdDaysName		= substr( $wdDaysName, 0, -1);
	$payDaysName	= substr( $payDaysName, 0, -1);

	
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
	else if(tCek < <?php echo $wdMinFund;?>) {
		$.messager.alert('<?php echo T_("Not Allowed");?>','<?php echo T_("The amount must be greater than ").$dcurrency." ".$wdMinFund;?>', 'error');
		$(y).val('');
		//$(y).focus();
	}
	
	else {
//		alert( tCek +' * <?php echo  $dConversion; ?> * ( 100 - <?php echo $cashWDadmin; ?>) / 100 ' );
		var reqcv	= tCek * ( 100 - <?php echo $adminCharge; ?>) / 100;	
		var byadmin	= tCek * ( <?php echo $adminCharge; ?>) / 100;	
		$('#vreqcv').val(reqcv);
		$('#byadmin').val(byadmin);
		$('#vreqcv').trigger('change');
		$('#byadmin').trigger('change');
		
		cNumber(y,'2');	
		
	}
	
}


</script>

 <div class="row">
	<div class="col-lg-12">
		<div class="page-header"><?php echo T_("Bonus Withdrawal");?></div>
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
<p>
<ul>
<li>Minimum withdrawal request is <?php echo $dcurrency." ".$wdMinFund;?> </li>
<li>Withdrawal will only be available on <?php echo $wdDaysName;?> </li>
<li>Processing time is at least 2 days</li>
<!--<li>Payment will be on <?php echo $payDaysName; ?> at the following week</li>-->
<li>Handling fee for withdrawal is <?php echo $adminCharge;?>%</li>
<li>All withdrawal shall be paid out based on the current exchange rate and subject to local bank charges</li>
</ul>
<!--Total Commissions: <?php echo $dcurrency." ".number_format( $funds["jnilai"],2 ); ?>-->
</p>

<?php 
// print_r( $wdDays );
if( in_array(  date('w'), $wdDays ) ) { ?>
    <section class="panel">
        <header class="panel-heading my-header">
            <?php echo T_("Withdrawal: Cash Ammount");?>
        </header>
		<div class="panel-body bio-graph-info">

<form class="form-horizontal" role="form"  id="add_post" name="add_post" method="post">

<div class="col-sm-12">   
<p style="text-align: center;">
									<strong class="withdraw-funds" >Your Available Funds :<?php echo $dcurrency." ".number_format( $funds["jnilai"],2 ); ?></strong><br/>
									
									<strong class="withdraw-funds" >Withdrawal Fee : <?php echo $adminCharge;?>%</strong><br/>    
</p>
	<div class="form-group">

		<label class="col-sm-4 control-label"><?php echo T_("Withdrawal Amount"); ?> (<?php echo $dcurrency; ?>) <span style="color: #FF0000;"> * </span></label>
		<div class="col-sm-6">
			<input type="text" name="trxvalue" id="trxvalue" class="default form-control" onchange="cekThis(this);"  required /><br/>
           <span>Note: Minimum Withrawed Amount is "<?php echo $dcurrency." ".number_format($wdMinFund,2);?>"</span>
            
		</div>
	</div>

<div class="form-group">
	<label class="col-sm-4 control-label"><?php echo T_("Received Amount")." ( ".$dcurrency." )";?></label>
    <div class="col-sm-6">
    <input type="hidden"  />
		<input class="default form-control" id="vreqcv" name="vreqcv" type="text" value="" onchange="cNumber(this,'2')" readonly  required />
	</div>
</div>

<div class="form-group">
	<label class="col-sm-4 control-label"><?php echo T_("Admin Fee")." ( ".$dcurrency." )";;?></label>
    <div class="col-sm-6">
    <input type="hidden"  />
		<input class="default form-control" id="byadmin" name="byadmin" type="text" value="" onchange="cNumber(this,'2')" readonly  required />
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
<?php } ?>
</div>


</div>

</div>


</div>
<script>
    $(document).ready(function() 
    {

       $("#add_post").ajaxForm({
       url:'transfer.act.php?a=3&id=<?php echo $_SESSION["userid"];?>',
       type:'post',
	   beforeSubmit: function () {
		loadingstart();
		if (!confirm("<?php echo T_("Confirm to Submit?"); ?>")) {
			loadingend();
            return false;
        }
		if(!cekzzz()) {clogout(); return false;}
    },
       	success:function(e){
			var hasil = $.trim(e);
		//		alert(hasil);
			if(hasil=="success") {
				$.messager.alert( sucProc(), "<?php echo T_("Your Request is Submitted");?>!!!","info");
				loadpagez('wd.php');					
			}
			else {
				$.messager.alert( errProc(), hasil,"error");
				loadpagez('wd.php');					
				loadingend();}

	   }
       });	


	   	   	   
    });	
</script>
