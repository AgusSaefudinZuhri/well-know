<?php 
	include_once('includes/config.php'); 	
	
	$txt = "
			SELECT a.*
			FROM g_member a
			WHERE a.userid = '".$_SESSION["userid"]."'
			";
//echo $txt;
	$qry = mysql_query( $txt );
	$xRow = mysql_fetch_array( $qry );

	$fTxt = "
			SELECT 
				SUM( IF( a.jtransaksi='0', a.trxvalue,'0' ) ) - SUM( IF( a.jtransaksi='1', a.trxvalue,'0' ) ) jnilai,
				SUM( IF( a.jtransaksi='1' AND useridx!='buypackage', a.trxvalue,'0' ) ) jout				
			FROM g_wfund a
			WHERE a.userid = '".$_SESSION["userid"]."' AND a.status IN ('0', '1')
			";
	$fQry = mysql_query( $fTxt );
	$fRow = mysql_fetch_array( $fQry );

	$kTxt = "
			SELECT 
				SUM( IF( a.jtransaksi='0' AND a.jkomisi='1', a.trxvalue,'0' ) ) - SUM( IF( a.jtransaksi='1' AND a.jkomisi='1', a.trxvalue,'0' ) ) bonus01,
				SUM( IF( a.jtransaksi='0' AND a.jkomisi='2', a.trxvalue,'0' ) ) - SUM( IF( a.jtransaksi='1' AND a.jkomisi='2', a.trxvalue,'0' ) ) bonus02,
				SUM( IF( a.jtransaksi='0' AND a.jkomisi IN ('3','6'), a.trxvalue,'0' ) ) - SUM( IF( a.jtransaksi='1' AND a.jkomisi IN ('3','6'), a.trxvalue,'0' ) ) bonus03,
				SUM( IF( a.jtransaksi='0' AND a.jkomisi IN ('4','5'), a.trxvalue,'0' ) ) - SUM( IF( a.jtransaksi='1' AND a.jkomisi IN ('4','5'), a.trxvalue,'0' ) ) bonus04				
			FROM g_wfund a
			WHERE a.userid = '".$_SESSION["userid"]."' AND a.status IN ( '0', '1' )
			";
	$kQry = mysql_query( $kTxt );
	$kRow = mysql_fetch_array( $kQry );
//	echo $fTxt;
  
	?>
<script>

function copyToClipboard(element) {
  var $temp = $("<input>");
  $("body").append($temp);
  $temp.val($(element).text()).select();
  document.execCommand("copy");
  $temp.remove();
  $.messager.alert("<?php echo T_("Success");?>", "<?php echo T_("Link is already copied to your clipboard");?>!!!","info")
}

function cari(x) {
	loadingstart();	
	if(cekzzz()) {
		if(x=='') x=$('#pg').val(); else x=x;		
//		var pfilter=$("#pfilter").val();	
//		var vfilter=$("#vfilter").val();
		var	fCari	= encodeURI( 'wd.h.f.php?pg='+x );		
		$('#iwrapper').load( fCari, function () {loadingend();});
	}
	else  clogout ();
}


/*
function get_jaringan (z) {
	$('#li-networks').trigger('click');
	$('#li-gjaringan').trigger('click').done(loadpagez('gjaringan.php?id='+z+'&a1=dashboard.php'));
}
*/
</script>        
<style>
td.pad.space-text {width: 200px;}
</style>
<div class="row" >
	<div class="col-lg-12">
		<div class="page-header" ><?php echo T_("Dashboard");?> - <?php echo T_("Partner");?></div>
	</div>
</div>

<div id="c_content">

<div class="row">
  <div class="col-md-12">
    <div>
      <div class="portlet">
        <div class="portlet-title">
          <div class="caption">Welcome to EXTROGATE TRADING</div>
        </div>
        <div class="portlet-body">
          <div class="row">
            <div class="col-md-12">
				<p>Dear <?php echo $_SESSION["nmmember"];?>, EXTROGATE TRADING  provides you with a great opportunity with the industry best brokers! You will be exposed to a variety of financial instruments.</p>
            </div>
<div class="col-lg-12 col-md-12 ">
        <section class="panel">
            <header class="panel-heading my-header">
                <?php echo T_("MT4 Accounts");?>
            </header>
           
            <div class="panel-body bio-graph-info">

				<div id="iwrapper">
				<?php include('accounts.f.php'); ?>
				</div>
    
			</div>
		</section>
</div>
            
<div class="col-lg-12 col-md-12 ">
        <section class="panel">
            <header class="panel-heading my-header">
                <?php echo T_("Summary");?>
            </header>
           
            <div class="panel-body bio-graph-info">

<div class="set">
  <div data-example-id="simple-table" class="bs-example">
    <table class="table in-phone">
      <caption>
      Account information
      </caption>
      <tbody>
        <tr>
          <td class="pad space-text">Member ID</td>
          <td class="pad"><div class="box-text"><?php echo $xRow["userid"];?></div></td>
        </tr>
        
		 <tr>
          <td class="input-bg pad space-text">Referral Link</td>
          <td class="input-bg pad"><span id="urlid" style="clear:none;"><?php echo $bsLink.'/r/'.$_SESSION["userid"];?></span>  <a href="javascript: void(0);" class="btn btn-success btn-xs" onclick="copyToClipboard('#urlid')">Copy URL</a></td>
        </tr>
        
        <tr>
          <td class="pad space-text">Status</td>
          <td class="pad"><div class="box-text"><?php if($xRow["status"]=='1' ) echo "Active"; else echo "Not Active"; ?></div></td>
        </tr>
        
      </tbody>
    </table>
  </div>
</div>
 
<div class="set">
  <div data-example-id="simple-table" class="bs-example">
    <table class="table in-phone">
      <caption>
      Your Account
      </caption>
      <tbody>
        <tr>
          <td class="pad space-text">Profit Sharing</td>
          <td class="pad"><div class="box-text"><?php echo $dcurrency." ".number_format( $fRow["bonus01"], 2); ?></div></td>
        </tr>
        <tr>
          <td class="pad space-text">Lot Rebate</td>
          <td class="pad"><div class="box-text"><?php echo $dcurrency." ".number_format( $kRow["bonus02"], 2); ?></div></td>
        </tr>
        <tr>
          <td class="input-bg pad space-text">Unilevel Bonus</td>
          <td class="input-bg pad"><div class="box-text"><?php echo $dcurrency." ".number_format( $kRow["bonus03"], 2); ?></div></td>
        </tr>
        
		<tr>
          <td class="pad space-text">Managerial Bonus &nbsp;&nbsp;<i class="glyphicon glyphicon glyphicon-star"></i><i class="glyphicon glyphicon glyphicon-star"></i><i class="glyphicon glyphicon glyphicon-star"></i></td>
          <td class="pad"><div class="box-text"><?php echo $dcurrency." ".number_format( $kRow["bonus04"], 2); ?></div></td>
        </tr>
 		 <tr>
          <td class="input-bg pad space-text">Withdrawal Amount</td>
          <td class="input-bg pad"><div style="background-color: red;color:#fff" class="box-text"><?php echo $dcurrency." ".number_format( $fRow["jout"], 2); ?></div></td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
   
			</div>
		</section>
</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<h5 style="display:none;">Summary</h5>


 <div class="row" style="display:none;">
  <div class="col-lg-12">
    <div class="widget-container fluid-height clearfix table in-phone">
      <caption>
      <p style="font-weight:100;text-transform:uppercase;letter-spacing:2px">Recent Withdrawal History</p>
      </caption>
      <div class="widget-content padded clearfix">

<?php

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
<h4>Withdrawal Terms & Conditions</h4>
<ul>
<li>Minimum withdrawal request is <?php echo $dcurrency." ".$wdMinFund;?> </li>
<li>Withdrawal will only be available on <?php echo $wdDaysName;?> </li>
<li>Processing time is at least 3-5 days</li>
<li>Payment will be on <?php echo $payDaysName; ?> at the following week</li>
<li>Handling fee for withdrawal is <?php echo $adminCharge;?>%</li>
<li>All withdrawal shall be paid out based on the current exchange rate and subject to local bank charges</li>
</ul>
<br/>
	<div id="iwrapper">
	<?php include('wd.h.f.php'); ?>
    </div>

      </div>
    </div>
  </div>
</div>
</div>