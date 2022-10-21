<?php include_once('includes/config.php');

$row=mysql_fetch_array(mysql_query("
	SELECT a.*
	FROM g_member a
	WHERE a.userid='".$_SESSION["userid"]."'
	"));

	$tTxt = "
		SELECT a.*, IFNULL( b.jnilai, 0 ) breg
		FROM g_member a
		LEFT JOIN (
			SELECT 
				userid,
				(sum(if(jtransaksi = '0', trxvalue, '0'))
				-sum(if(jtransaksi = '1', trxvalue, '0'))) jnilai
			FROM g_wregister 
			WHERE status in ('0', '1')
			GROUP BY userid
			) b ON a.userid =b.userid
		WHERE a.userid = '".$_SESSION["userid"]."'
	
	";
//	echo $tTxt;
	$tBalance	= mysql_fetch_array(mysql_query($tTxt));
	$cbReg		= $tBalance["breg"];
//echo $_SESSION['firstlogin'];
 ?>
<script type="application/javascript" language="javascript">

	function cekPassword() {
		 var p1 = $('#password2').val();	
		 var p2 = $('#cpassword2').val();	
		
		if(p1!=p2 && p1!='' && p2!='') $('#cekPassword').show(); else $('#cekPassword').hide();
		if(p1.length<4) { 
			$('#cekPassword2').show(); 
			$('#password2').focus();
			setTimeout(function() {
				$("#password2").focus();
			}, 100);
			$('#password2').val('');
		}
		else $('#cekPassword2').hide();

		if(p1.length>20) {
			$('#cekPassword3').show(); 
			setTimeout(function() {
				$("#password2").focus();
			}, 100);
			$('#password2').val('');
		}
		else $('#cekPassword3').hide();
		tcontentheight();
	}
/*
	function cNilai1(x) {
		
		 var wsc = parseFloat(x.value).toFixed(2) ;
		 var y = $('#tadi').val();
		 if(wsc<<?php echo $wscMin2; ?>) {
			 $.messager.alert('Warning', 'Value cannot be below <?php echo $wscMin2; ?>%', 'error');	
			 x.value = y;
		 }
		 else {
			cNumber(x,'2');
			$('#tadi').val(wsc)
			$('#wcash').val((100.00-wsc))
			$('#wcash').trigger('change'); 
		 }
	
	}
*/

function cekJMember( x ) {
	switch(x) {
		<?php 
			$cTxt = "SELECT * FROM g_jpackage WHERE status='1' ORDER BY (hargapv*1)";
			$cQry = mysql_query($cTxt);

			while( $cRow = mysql_fetch_array($cQry)) { ?>
		case "<?php echo $cRow["id"];?>" : 
			var ndReg = <?php echo xNumber(number_format($cRow["hargapv"],2));?>;
			var fnRcv = <?php echo xNumber(number_format($cRow["hargapv"] * ( $cRow["hasilprc"] / 100 ),2));?>;
			var nmPaket = "<?php echo $cRow["nmjpackage"];?>";  
			break;
		<?php } ?>
	}

	$('#ndReg').html( ( ndReg.toFixed(2) ).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,") );
	$('#needReg').val( ndReg );
	$('#fnRcv').html( ( fnRcv.toFixed(2) ).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,") );
	$('#finRcv').val( fnRcv );
	$('#nmpaket').val( nmPaket );
}
	function chValue ( x, y ) {
		//var xvalue = x.value;
		if($(x).is(':checked')) $('#'+y).val('1'); else $('#'+y).val('0');	
		
	}
</script>

<div class="row">
	<div class="col-lg-12">
		<div class="page-header"><?php echo T_("Activation Page");?></div>
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
 <section class="panel">
	<div class="panel-body bio-graph-info">

<form class="form-horizontal" role="form"  id="add_post" name="add_post" method="post">

<div class="form-group">
	<label class="col-sm-4 control-label"><?php echo T_("Full Name");?></label>
    <div class="col-sm-6">
    <label class="col-sm-12 control-label" style="text-align: left;">
		<?php echo $row["nmmember"];?>
</label>
<!--		<input class="default form-control" id="nmmember" name="nmmember" type="text"  value="<?php echo $row["nmmember"];?>"  required /> -->
	</div>
</div>

<div class="form-group">
	<label class="col-sm-4 control-label"><?php echo T_("Member ID / Passport");?></label>
    <div class="col-sm-6">
        <label class="col-sm-12 control-label" style="text-align: left;">
		<?php echo $row["userid"];?>
</label>
	</div>
</div>


<?php
	if( $row["staktif"]=='0') { ?>

<h4><?php echo T_("Activation Information");?></h4>

	<div class="form-group">
		<label class="control-label col-sm-4"><?php echo T_("Package"); ?> <span style="color: #FF0000;"> * </span></label>
		<div class="col-sm-5">
			<select name="jpackage" id="jpackage" class="default form-control" onchange="cekJMember(this.value)" required>
                <option value="" selected="selected" disabled="disabled" ><?php echo T_("Select");?></option>
                <?php 
                $cTxt = "SELECT * FROM g_jpackage WHERE status='1' ORDER BY (hargapv*1)";
                $cQry = mysql_query($cTxt);
                
                while( $cRow = mysql_fetch_array($cQry)) { ?>
                <option value="<?php echo $cRow["id"];?>"><?php echo $cRow["nmjpackage"];?> | <?php echo $syscurrency." ". number_format($cRow["hargapv"],2);?></option>        
                <?php } ?>
            </select>
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-sm-4"><?php echo T_("Register Point needed / Balance"); ?></label>
		<label class="control-label col-sm-5" style="text-align: left;"><span id="ndReg"><?php echo 0; ?></span> / <span><?php echo number_format( $cbReg, 2 ); ?></span></label>
        <input type="hidden" id="needReg" name="needReg"  />        
	</div>

	<div class="form-group">
		<label class="control-label col-sm-4"><?php echo T_("Finance Note Received"); ?></label>
		<label class="control-label col-sm-5" style="text-align: left;"><span id="fnRcv"><?php echo '0.00'; ?></span></label>
        <input type="hidden" id="finRcv" name="finRcv"  /> 
        <input type="hidden" id="nmpaket" name="nmpaket"  />        
	</div>

<?php } ?>

<h4><?php echo T_("Setup");?></h4>

    <div class="form-group">
        <label class="col-sm-4 control-label"><?php echo T_("Sponsor Bonus Auto Withdrawal");?></label>
        <div class="col-sm-6">
    <label class="switch">
      <input type="checkbox" onchange="chValue(this,'autowd')" <?php if($row["autowd"]=='1') echo 'checked="checked"';?>>
      <div class="slider round"></div>
    </label>
    <input type="hidden" id="autowd" name="autowd" readonly="readonly" value="<?php echo $row["autowd"];?>" />
    </div>
    </div>

<h4><?php echo T_("Bank Information");?></h4>

<div class="form-group">
	<label class="col-sm-4 control-label"><?php echo T_("Bank");?> <span style="color: #FF0000;"> * </span></label>
    <div class="col-sm-6">
		<input class="default form-control" id="nmbank" name="nmbank"  type="text" required />
	</div>
</div>

<div class="form-group">
	<label class="col-sm-4 control-label"><?php echo T_("Account No");?> <span style="color: #FF0000;"> * </span></label>
    <div class="col-sm-6">
		<input class="default form-control" id="norek" name="norek"  type="text" required />
	</div>
</div>

<div class="form-group">
	<label class="col-sm-4 control-label"><?php echo T_("Account Holder Name");?> <span style="color: #FF0000;"> * </span></label>
    <div class="col-sm-6">
		<input class="default form-control" id="atasnama" name="atasnama" type="text" required />
	</div>
</div>


<div class="form-group">
	<label class="col-sm-4 control-label"><?php echo T_("Branch");?></label>
    <div class="col-sm-6">
		<input class="default form-control" id="cabbank" name="cabbank" type="text" />
	</div>
</div>


<!--
<h4><?php echo T_("Beneficiary");?></h4>

<div class="form-group">
	<label class="col-sm-4 control-label"><?php echo T_("Beneficiary's Name");?></label>
    <div class="col-sm-6">
		<input class="default form-control" id="ben_name" name="ben_name"  type="text" required />
	</div>
</div>

<div class="form-group">
	<label class="col-sm-4 control-label"><?php echo T_("Beneficiary's NRIC");?></label>
    <div class="col-sm-6">
		<input class="default form-control" id="ben_nric" name="ben_nric" type="text" required />
	</div>
</div>
-->
<h4><?php echo T_("Security Password");?></h4>

<div class="form-group">
	<label class="col-sm-4 control-label"><?php echo T_("Input Password");?> <span style="color: #FF0000;"> * </span></label>
    <div class="col-sm-6">
		<input class="default form-control" id="password2" name="password2"  type="password" onChange="cekPassword();"  required />
	</div>
</div>

<div class="form-group">
	<label class="col-sm-4 control-label"><?php echo T_("Confirm Password");?> <span style="color: #FF0000;"> * </span></label>
    <div class="col-sm-6">
		<input class="default form-control" id="cpassword2" name="cpassword2" type="password" onChange="cekPassword();" required />
	</div>
</div>

<div id="cekPassword" class="alert alert-danger" style="display:none;">
    <strong><?php echo T_("WARNING!");?></strong> <?php echo T_("Passwords is not match.");?>
  </div>

<div id="cekPassword2" class="alert alert-danger" style="display:none;">
    <strong><?php echo T_("WARNING!");?></strong> <?php echo T_("Min Length of Passwords is 4 Digit.");?>
  </div>

<div id="cekPassword3" class="alert alert-danger" style="display:none;">
    <strong><?php echo T_("WARNING!");?></strong> <?php echo T_("Max Length of Passwords is 20 Digit.");?>
  </div>

  
<div class="form-group">
	<div class="col-sm-offset-4 col-sm-6">
		<input type="submit" class="form-control" value="<?php echo T_("Activate");?>"/>
	</div>
</div>

</form>          

</div>
</section>
</div>
<script>
    $(document).ready(function() 
    {

		$('.datepicker2').datepicker({
			container:'.datepickerdiv',
		  format: 'yyyy-mm-dd'
		});
		
		
       $("#add_post").ajaxForm({
       url:'firstlogin.act.php?a=0&id=<?php echo $_SESSION["userid"];?>&staktif=<?php echo $row["staktif"];?>',
       type:'post',
	   beforeSubmit: function () {
		loadingstart();
		if (!confirm("<?php echo T_("Confirm to Activate?"); ?>")) {
			loadingend();
            return false;
        }

		<?php if($row["staktif"]=='0') { ?>

			var balReg	= <?php echo $cbReg; ?>;
			var cekReg = $('#needReg').val();
			cekReg = parseFloat(cekReg);
	
			if( balReg < cekReg) {
				$.messager.alert( errProc(), "<?php echo T_("You don't have sufficient Register Wallet Balance. Contact Administrator or your sponsor.");?>", "error");
				$('#password2').val('');
				$('#cpassword2').val('');
				loadingend();
				return false;
			}
		
		
		<?php } ?>
		
		if($('#password2').val()!=$('#cpassword2').val()) {
			$.messager.alert("<?php echo T_("Passwords is not match.");?>", hasil,"error");
			loadingend();
            return false;			
		}
		
		if(!cekzzz()) {clogout(); return false;}
    },
       	success:function(e){
			var hasil = $.trim(e);
			if(hasil=="success") {
				$.messager.alert("<?php echo T_("Success");?>", "<?php echo T_("Your Account is Activated");?>!!!","info");
				location.reload();						
			}
			else {$.messager.alert("<?php echo T_("Error in Process");?>", hasil,"error");loadingend();}

	   }
       });
    });
</script>
