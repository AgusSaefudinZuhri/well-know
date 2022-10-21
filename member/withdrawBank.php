<script>
	
function calcUSD() {
	var pengali;
	var trxvalue = parseFloat(($("#trxvalue").val()).replace(/\,/g, '')) * 1;
	var kursid = $("#kursid").val();
	var cBalance = parseFloat(($("#cBalance").val()).replace(/\,/g, '')) * 1;
	
	if( trxvalue<=cBalance || trxvalue == 0  ) {
	switch( kursid ) {
	<?php
		$kTxt = "select * from g_kurs WHERE id IN (SELECT * FROM ( SELECT kursid FROM g_jfinancekurs WHERE jfinanceid='".$_GET{"id"}."') x) ORDER BY id";
		$kQry = mysql_query( $kTxt );
		$k =1;
		$kOpt = '';
		$kCur = '';
		while($kRow=mysql_fetch_array($kQry)) {
			
		if($k==1) { $kOpt .= '<option value="'.$kRow["id"].'" selected>'.$kRow["id"].'</option>'; $kCur=$kRow["id"];}
			else $kOpt .= '<option value="'.$kRow["id"].'" >'.$kRow["id"].'</option>';
		?>
		case "<?php echo $kRow["id"];?>" :
			pengali = <?php echo $kRow["excbuy"];?>;
			
			break;
	<?php
		$k++;
		}
	?>
	}
	var total = trxvalue*pengali;
	$('#sTotal').html(total.toFixed(2));
	//	alert(kursid);
	$('.sKurs').html(kursid);
	}
	else if(trxvalue>0){
		$.messager.alert(errProc(),'<?php echo T_("Cannot exceed Available Balance");?>','error')
		$("#trxvalue").val('0');
		$("#trxvalue").trigger('change');
		
	}
}

function cAvailable( x ) {
	
	switch( x ) {
	<?php
		$extTxt = "SELECT * FROM g_extroakun WHERE userid='".$_SESSION["userid"]."'";
		$extQry = mysql_query( $extTxt );
		$ext = 1;
		$available = 0;
		$extOption = '';
		while( $extRow = mysql_fetch_array( $extQry ) ) {
			$extOption .= '<option value="'.$extRow["extakunid"].'">'.$extRow["extakunid"].'</option>';

	$cari = getBalance($extRow["extakunid"]);
	//echo $cari;
	$hasil = get_contentGet( $cari );
	//echo $hasil;
	$getBalance = json_decode( $hasil, true );
	if( $getBalance["isSuccess"] ) $balance = $getBalance["balance"]; else $balance = 0; 
			
			
			if($ext==1) $available =$balance;
	?>
		case "<?php echo $extRow["extakunid"];?>" : $('.sAvail').html('<?php echo $balance*1; ?>'); $('#cBalance').val(<?php echo ($balance*1); ?>); break;
		<?php
			$ext++;
			}
			
			
		?>
			
	}
}
	//subtotal1 += parseFloat(hvalue.replace(/\,/g, ''));
</script>
<table width="100%" cellspacing="0" cellpadding="0">
	<tr>
		<td width="50%">
		<div class="row">
			<div class="col-sm-4">
				<img src="<?php echo $fRow["thumblink"];?>" width="150px;">
				
			</div>
			<div class="col-sm-8" style="margin: auto;">
				<label style="font-size: 18px;vertical-align: middle"><strong><?php echo $fRow["nmjfinance"];?></strong></label>
				
			</div>
		</div>
		
		

		<div class="row x2">

			<div class="col-sm-12 col-md-6">
			<br/>
			<label><?php echo T_("MT4 Account");?></label> <label style="float: right;"><?php echo T_("Available");?>: <?php echo $dcurrency; ?> <span class="sAvail"><?php echo $available *1; ?></php></span></label>
				<select class="default form-control" id="extakunid" name="extakunid" onchange="cAvailable(this.value)" required>
				<?php echo $extOption; ?>
				</select>
			</div>
			<div class="col-sm-6 col-md-3">
			<br/>
			<label><?php echo T_("Jumlah");?></label>
				<input type="text" class="default form-control" id="trxvalue" name="trxvalue" onchange="cNumber(this,'2');calcUSD();" required/>
				<input type="hidden" id="cBalance" value="<?php echo $available*1;?>">
			</div>
			
			<div class="col-sm-6 col-md-3">
			<br/>
			<label><?php echo T_("Currency");?></label>
				<select class="default form-control" id="kursid" name="kursid" onchange="calcUSD();" required>
				<?php echo $kOpt;?>
				</select>
			</div>
			<div class="col-sm-12 col-md-6">
			<br/>
			<label><?php echo T_("Your Account Number");?></label>
				<input type="text" class="default form-control" id="yourbank" name="yourbank" value="" onchange="$('#sAcc').html(this.value)" required/>
			</div>
			
			<div class="col-sm-12 col-md-12">
			<br/>
			<input type="submit" class="form-control btn btn-lg btn-warning" value="<?php echo T_("Submit"); ?>" style="width: 100%;"/> 
			</div>	
		</div>
			
		</td>
		
		<td width="2%"></td>
		<td width="48%" style="background: #e7e7e7;">
			
		<div class="row x2" style="padding: 10px;">
		<div class="col-sm-12">
			<table>
				<tr><td width="50%"><?php echo T_("Process Time");?></td><td width="50%">: <?php echo $fRow["wkproses"];?></td></tr>
				<tr><td><?php echo T_("Comission");?></td><td>: <?php echo $fRow["vlkomisi"];?></td></tr>
				<tr><td><?php echo T_("Currency");?></td><td>: <span class="sKurs"><?php echo $kCur;?></span></td></tr>
				<tr><td><?php echo T_("Your Name");?></td><td>: <span id="sName"><?php echo $_SESSION['nmmember'];?></span></td></tr>
				<tr><td><?php echo T_("Your Account");?></td><td>: <span id="sAcc"></span></td></tr>
				<tr><td><?php echo T_("Date");?></td><td>: <span id="sDate"><?php echo date('Y-m-d');?></span></td></tr>
				<tr><td><?php echo T_("Total");?> (<span class="sKurs"><?php echo $dcurrency;?></span>)</td><td>: <span id="sTotal" style="font-weight: bold;">0</span></td></tr>
				
			</table>

			</div>
		</div>
			
		</td>
		
	</tr>
	
	
</table>


