<script>
 $(function()
    {
      $('[id="sdhBayar"]').change(function()
      {
        if ($(this).is(':checked')) {
           $('.x2').show();
           $('.x1').hide();
        }
		else {
           $('.x1').show();
           $('.x2').hide();
		}
		  
      });
    });
	
function calcUSD() {
	var pengali;
	var trxvalue = parseFloat(($("#trxvalue").val()).replace(/\,/g, ''));
	var kursid = $("#kursid").val();
	
	switch( kursid ) {
	<?php
		$kTxt = "select * from g_kurs WHERE id IN (SELECT * FROM ( SELECT kursid FROM g_jfinancekurs WHERE jfinanceid='".$_GET{"id"}."') x) ORDER BY id";
		$kQry = mysqli_query( $kTxt );
		$k =1;
		$kOpt = '';
		$kCur = '';
		while($kRow=mysqli_fetch_array($kQry)) {
			
		if($k==1) { $kOpt .= '<option value="'.$kRow["id"].'" selected>'.$kRow["id"].'</option>'; $kCur=$kRow["id"];}
			else $kOpt .= '<option value="'.$kRow["id"].'" >'.$kRow["id"].'</option>';
		?>
		case "<?php echo $kRow["id"];?>" :
			pengali = <?php echo $kRow["excsell"];?>;
			
			break;
	<?php
		$k++;
		}
	?>
	}
	var total = trxvalue/pengali;
	$('#sTotal').html(total.toFixed(2));
	$('#sKurs').html(kursid);
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
		<div style="height: 50px;width: 100%; vertical-align: middle;display: table; text-align: center; background: #e7e7e7;">
			<span style="display: table-cell;vertical-align:middle;font-size: 18px;"><input id="sdhBayar" type="checkbox" onchange="sdhBayar(this.value)" style="padding: 5px;margin-top: 5px;"> I have paid</span>
		</div>
		
		
		<div class="row x1">
		<div class="col-sm-12">
			<table>
				<tr><td width="50%"><?php echo T_("Account Name");?></td><td width="50%"><?php echo $fRow["nmakun"];?></td></tr>
				<tr><td><?php echo T_("Account No");?></td><td><?php echo $fRow["noakun"];?></td></tr>
				<tr><td><?php echo T_("Branch");?></td><td><?php echo $fRow["cabakun"];?></td></tr>
				<tr><td><?php echo T_("Bank");?></td><td><?php echo $fRow["nmjfinance"];?></td></tr>
			</table>
			</div>
		</div>

		<div class="row x2" style="display: none; ">
			<div class="col-sm-12 col-md-12">
			<br/>
			<label><?php echo T_("Payment Date");?></label>
 					<div id="period-wrapper1" class="input-group">
						<input type="text" id="tgltrx" name="tgltrx" class="form-control dtpicker1" value="<?php echo date('Y-m-d');?>" onchange="$('#sDate').html(this.value)" readonly />
						<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    </div>
			</div>

			<div class="col-sm-12 col-md-6">
			<br/>
			<label><?php echo T_("MT4 Account");?></label>
				<select class="default form-control" id="extakunid" name="extakunid" required>
				<?php
					$extTxt = "SELECT * FROM g_extroakun WHERE userid='".$_SESSION["userid"]."'";
					$extQry = mysqli_query( $extTxt );
					while( $extRow = mysqli_fetch_array( $extQry ) ) {
						?>
					<option value="<?php echo $extRow["extakunid"];?>"><?php echo $extRow["extakunid"];?></option>
				<?php		
					} 
					?>
				</select>
			</div>
			<div class="col-sm-6 col-md-3">
			<br/>
			<label><?php echo T_("Jumlah");?></label>
				<input type="text" class="default form-control" id="trxvalue" name="trxvalue" onchange="cNumber(this,'2');calcUSD();" required/>
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
			<label><?php echo T_("Your Name");?></label>
				<input type="text" class="default form-control" id="yourname" name="yourname" value="<?php echo $_SESSION['nmmember'];?>" onchange="$('#sName').html(this.value)" required/>
			</div>
			
			<div class="col-sm-12 col-md-6">
			<br/>
			<label><?php echo T_("Your Bank");?></label>
				<input type="text" class="default form-control" id="yourbank" name="yourbank" value="<?php echo $fRow['nmjfinance'];?>" onchange="$('#sBank').html(this.value)" required/>
			</div>
			
			
			<div class="col-sm-12 col-md-6">
			<br/>
			<label><?php echo T_("Payment Slip");?></label>
				<div class="input-group mb-md">
					<input type="text" class="form-control" id="trxdoc" name="trxdoc" value="<?php //if(isset($_GET["pic"])) echo $_GET["pic"]; ?>" readonly >
						<span class="input-group-btn">
						<button class="btn btn-warning" type="button" onclick="$('#ximage1').click();">Upload</button>
						</span>
				 </div>
			</div>
			<div class="col-sm-12 col-md-12">

			<input type="submit" class="form-control btn btn-lg btn-warning" value="<?php echo T_("Submit"); ?>" style="width: 100%;"/> 
			</div>	
		</div>
			
		</td>
		
		<td width="2%"></td>
		<td width="48%" style="background: #e7e7e7;">
			
		<div class="row x1" style="padding: 10px;">
		<div class="col-sm-12">
			<table>
				<tr><td width="50%"><?php echo T_("Process Time");?></td><td width="50%"><?php echo $fRow["wkproses"];?></td></tr>
				<tr><td><?php echo T_("Comission");?></td><td><?php echo $fRow["vlkomisi"];?></td></tr>
				<tr><td><?php echo T_("Available Currency");?></td><td><?php echo $fRow["ckurs"];?></td></tr>
				
			</table>
			</div>
		</div>
		
		<div class="row x2" style="display: none; padding: 10px;">
		<div class="col-sm-12">
			<table>
				<tr><td width="50%"><?php echo T_("Process Time");?></td><td width="50%">: <?php echo $fRow["wkproses"];?></td></tr>
				<tr><td><?php echo T_("Comission");?></td><td>: <?php echo $fRow["vlkomisi"];?></td></tr>
				<tr><td><?php echo T_("Currency");?></td><td>: <span id="sKurs"><?php echo $kCur;?></span></td></tr>
				<tr><td><?php echo T_("Your Name");?></td><td>: <span id="sName"><?php echo $_SESSION['nmmember'];?></span></td></tr>
				<tr><td><?php echo T_("Your Bank");?></td><td>: <span id="sBank"><?php echo $fRow['nmjfinance'];?></span></td></tr>
				<tr><td><?php echo T_("Payment Date");?></td><td>: <span id="sDate"><?php echo date('Y-m-d');?></span></td></tr>
				<tr><td><?php echo T_("Total");?> (<?php echo $dcurrency;?>)</td><td>: <span id="sTotal" style="font-weight: bold;">0</span></td></tr>
				
			</table>

			</div>
		</div>
			
		</td>
		
	</tr>
	
	
</table>


