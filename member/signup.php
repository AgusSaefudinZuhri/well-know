<?php 

include_once('includes/config.php');

?>
<script type="application/javascript" language="javascript">
function ewPassword(x) {
	switch(x) {
		case "1" : $("#ewpassword").hide(); 
					$("#password2").attr("required", false); 
					$("#password2").attr("readonly", true); 
				break;	
		case "2" : case "3" :
					$("#ewpassword").show(); 
					$("#password2").attr("required", true); 
					$("#password2").attr("readonly", false); 				
				break;	
		
	}
}

function cPlacement(x) {
	switch (x) {
		case "0": 
			$("#uplinedst").attr("required", true); 
			$("#positiondst").attr("required", true); 
			$("#uplinedst").attr("readonly", false); 
			$("#positiondst").attr("disabled", false);
			break;	
		case "1": 
			$("#uplinedst").attr("required", false); 
			$("#positiondst").attr("required", false); 
			$("#uplinedst").attr("readonly", true); 
			$("#positiondst").attr("disabled", true); 
			$("#uplinedst").val('');
			$("#positiondst").val('');
			break;	

	}
}

	function cekMember( x, y ) {
		var mId	= x.value
		loadingstart();
		$.get('signup.user.cek.php?id='+mId, function(data) {
			var hasil=(data.trim()).split("|");
			if(hasil[0]=='success') {
				$('#'+y).val(hasil[1]);
			}
			else {
				$.messager.alert( errProc(), data, 'error');
				$(x).val('');
				$('#'+y).val('');
				$(x).focus();
			}
			loadingend();
		});
	}


	function cekPassword() {
		 var p1 = $('#passwordx').val();	
		 var p2 = $('#passwordx2').val();	
		
		if(p1!=p2 && p1!='' && p2!='') $('#cekPassword').show(); else $('#cekPassword').hide();
		if(p1.length<4) { 
			$('#cekPassword2').show(); 
			$('#passwordx').focus();
			setTimeout(function() {
				$("#passwordx").focus();
			}, 100);
			$('#passwordx').val('');
		}
		else $('#cekPassword2').hide();

		if(p1.length>20) {
			$('#cekPassword3').show(); 
			setTimeout(function() {
				$("#passwordx").focus();
			}, 100);
			$('#passwordx').val('');
		}
		else $('#cekPassword3').hide();
//		tcontentheight();
	}

	function cekPassword2() {
//		alert('x');
		 var p1 = $('#npass2').val();	
		 var p2 = $('#kpass2').val();	
		
		if(p1!=p2 && p1!='' && p2!='') $('#cekPassworda').show(); else $('#cekPassworda').hide();
		if(p1.length<4) { 
			$('#cekPassword2a').show(); 
			$('#npass2').focus();
			setTimeout(function() {
				$("#npass").focus();
			}, 100);
			$('#npass2').val('');
		}
		else $('#cekPassword2a').hide();

		if(p1.length>20) {
			$('#cekPassword3a').show(); 
			setTimeout(function() {
				$("#npass2").focus();
			}, 100);
			$('#npass2').val('');
		}
		else $('#cekPassword3a').hide();
		tcontentheight();

	}


	function cekUser() {
		 var u1 = $('#useridx').val();	
		
		if(u1.length<4) { 
			$('#cekUserID1').show(); 
			$('#useridx').focus();
			setTimeout(function() {
				$("#useridx").focus();
			}, 100);
			$('#useridx').val('');
		}
		else $('#cekUserID1').hide();

		if(u1.length>20) {
			$('#cekUserID2').show(); 
			setTimeout(function() {
				$("#useridx").focus();
			}, 100);
			$('#useridx').val('');
		}
		else $('#cekUserID2').hide();
		tcontentheight();	
		
		}
	

function cTglLahir() {
	var tltahun = $("#tltahun").val();
	var tlbulan = $("#tlbulan").val();
	var tlhari = $("#tlhari").val();
	if(tltahun!='' && tlbulan!='') {
		var fTxt	= 'cTglLahir.php?y='+tltahun+'&m='+tlbulan+'&d='+tlhari;
		//alert(fTxt);
		loadingstart();
		$('#tlhariWrap').load( fTxt, function() {
			loadingend();
		});
	}
}
	

/*		
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

//	$('#ndReg').html( ( ndReg.toFixed(2) ).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,") );
	$('#needReg').val( ndReg );
//	$('#vreqreg').val( '' );
//	$('#vreqreg').trigger( 'change' );
//	$('#vreqcash').val( '' );

	$("#vreqreg").attr( "required", true ); 
	$("#vreqreg").attr( "readonly", false );	
	$('#fnRcv').html( ( fnRcv.toFixed(2) ).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,") );
	$('#vreq').val( fnRcv );
	$('#nmpaket').val( nmPaket );
}

function cekThis(y) {
	var tCek 	= parseFloat(y.value);
	var tAmount = parseFloat( ( $('#needReg').val() ).replace( /,/g,'') );
	if( tAmount == '' ) { $('#vreq').val('0'); tAmount = 0; }	
	var minReg	= tAmount * <?php echo $reInvRegMin;?> / 100;

	if(tCek > <?php echo $regBal;?> ) {
		$.messager.alert( errProc(),'<?php echo T_("Value cannot exceed Current Dollar Wallet Balance");?>', 'error');
//		$('#jpackage').val('');
		$('#vreqcash').val('');
//		$('#needReg').val( '' );
		$(y).val('');
		$(y).focus();
	}
	else if(tCek < minReg ) {
		$.messager.alert( errProc(),'<?php echo T_("Value cannot below ").$syscurrency;?> '+ minReg, 'error');
		$('#vreqcash').val('');
		$(y).val('');
		$(y).focus();
	}	
	else if( tCek > tAmount ) {
		$.messager.alert( errProc(),'<?php echo T_("Value cannot exceed ").$syscurrency;?> '+ tAmount, 'error');
		$('#vreqcash').val('');
		$(y).val('');
		$(y).focus();
	}			
	else {
		var cCek = tAmount - tCek;
		if(cCek > <?php echo $cashBal;?> ) {
			$.messager.alert( errProc(),'<?php echo T_("Value cannot exceed Current Cash Wallet Balance");?>', 'error');
			$('#vreqcash').val('');
			$(y).val('');
			$(y).focus();
		}
		else {
			$('#vreqcash').val(cCek);
			$('#vreqcash').trigger('change');
			cNumber(y,'2');	
		}
		
	}
}
*/
</script>

 <div class="row">
	<div class="col-lg-12">
		<div class="page-header"><?php echo T_("Register");?></div>
	</div>
</div>

<div id="c_content">

                      

<form id="add_post" name="add_post" method="post" class="form-horizontal">

<div class="row">
	<div class="col-lg-12">

        <header class="panel-heading my-header">
            <?php echo T_("Account Information");?>
        </header>
            
		<section class="panel">
			<div class="panel-body">

	<div class="form-group">
		<label class="control-label col-sm-3"><?php echo T_("User ID"); ?> <span style="color: #FF0000;"> * </span></label>
		<div class="col-sm-5">
			<input name="useridx" id="useridx" type="text" class="default form-control" size="16" onchange="cekUser()" required/>
		</div>
	</div>
    
<div id="cekUserID1" class="alert alert-danger" style="display:none;">
    <strong><?php echo T_("WARNING!");?></strong> <?php echo T_("Minimum Length is 4 Digit.");?>
  </div>

<div id="cekUserID2" class="alert alert-danger" style="display:none;">
    <strong><?php echo T_("WARNING!");?></strong> <?php echo T_("Maximum Length is 20 Digit.");?>
  </div>
  
	<div class="form-group">
		<label class="control-label col-sm-3"><?php echo T_("Sponsor ID"); ?> <span style="color: #FF0000;"> * </span></label>
		<div class="col-sm-5">
			<input name="sponsordst" id="sponsordst" type="text" class="default form-control" value="<?php if(isset($_GET["sponsor"])) echo $_GET["sponsor"]; else echo $_SESSION["userid"]; ?>" size="16"  <?php // if(isset($_GET["sponsor"])) echo 'readonly="readonly"';?> required onchange="cekMember(this,'nmsponsor');" />
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-sm-3"><?php echo T_("Sponsor Name"); ?></label>
		<div class="col-sm-5">
			<input name="nmsponsor" id="nmsponsor" type="text" class="default form-control" value="<?php 
				if(isset($_GET["sponsor"])) {
					$spTxt	= "SELECT * FROM g_member WHERE userid='".$_GET["sponsor"]."'";
					$spQry	= mysql_query( $spTxt );
					$spRow	= mysql_fetch_array( $spQry );
					echo $spRow["nmmember"]; 
				}
				else echo $_SESSION["nmmember"]; 
				?>" size="16"  readonly="readonly" />
		</div>
	</div>



	<div class="form-group">
		<label class="control-label col-sm-3"><?php echo T_("Login Password"); ?> <span style="color: #FF0000;"> * </span></label>
		<div class="col-sm-5">
			<input name="passwordx" id="passwordx" type="password" onchange="cekPassword();" class="default form-control" size="16"  required/>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-sm-3"><?php echo T_("Confirm Login Password"); ?> <span style="color: #FF0000;"> * </span></label>
		<div class="col-sm-5">
			<input name="passwordx2" id="passwordx2" type="password" onchange="cekPassword();" class="default form-control" size="16"  required />
		</div>
	</div>

<div id="cekPassword" class="alert alert-danger" style="display:none;">
    <strong><?php echo T_("WARNING!");?></strong> <?php echo T_("Password is not matched.");?>
  </div>

<div id="cekPassword2" class="alert alert-danger" style="display:none;">
    <strong><?php echo T_("WARNING!");?></strong> <?php echo T_("Min. Password Length is 4 Digit.");?>
  </div>

<div id="cekPassword3" class="alert alert-danger" style="display:none;">
    <strong><?php echo T_("WARNING!");?></strong> <?php echo T_("Max. Password Length is 20 Digit.");?>
  </div>

<div class="form-group">
	<label class="col-sm-3 control-label"><?php echo T_("Security Password");?> <span style="color: #FF0000;"> * </span></label>
    <div class="col-sm-5">
		<input class="default form-control" id="npass2" name="npass2" type="password" onchange="cekPassword2();" required />
	</div>
</div>


<div class="form-group">
	<label class="col-sm-3 control-label"><?php echo T_("Confirm Security Password");?> <span style="color: #FF0000;"> * </span></label>
    <div class="col-sm-5">
		<input class="default form-control" id="kpass2" name="kpass2" type="password" onchange="cekPassword2();" required />
	</div>
</div>

<div id="cekPassworda" class="alert alert-danger" style="display:none;">
    <strong><?php echo T_("WARNING!");?></strong> <?php echo T_("Passwords are not matched..");?>
  </div>

<div id="cekPassword2a" class="alert alert-danger" style="display:none;">
    <strong><?php echo T_("WARNING!");?></strong> <?php echo T_("Min. Length is 4 Digit.");?>
  </div>

<div id="cekPassword3a" class="alert alert-danger" style="display:none;">
    <strong><?php echo T_("WARNING!");?></strong> <?php echo T_("Max. Length 20 Digit.");?>
  </div>

</div>
</section>
</div>

	<div class="col-lg-12">

        <header class="panel-heading my-header">
            <?php echo T_("Personal Information");?>
        </header>
            
		<section class="panel">
			<div class="panel-body">

	<div class="form-group">
		<label class="control-label col-sm-3"><?php echo T_("Full Name"); ?> <span style="color: #FF0000;"> * </span></label>
		<div class="col-sm-5">
			<input name="nmmember" id="nmmember" type="text" class="default form-control" size="16"  required/>
		</div>
	</div>

	<div class="form-group">
		
   	<label class="control-label col-sm-3"><?php echo T_("Birthdate");?> <span style="color: #FF0000;"> * </span></label>
  <div class="col-sm-5 col-xs-12">
      	   	
       	   	<div id="dt-wrapper" class="input-group">
   	
    	<input type="text" id="tltahun" name="tltahun" placeholder="<?php echo T_("YEAR");?>" class="form-control" value="<?php if($row["tgllahir"]!='') echo date('Y', strtotime( $row["tgllahir"] ) ); ?>" onchange="cTahun(this)" required  style="min-width: 20%;" />
        <span class="input-group-addon" style="width: 5px !important;"><!--<i class="fa fa-calendar"></i><--></span>
    	<select id="tlbulan" name="tlbulan" class="form-control" onchange="cTglLahir()" required style="min-width: 20%;" >
      		<option value="" disabled selected><?php echo T_("MONTH");?></option>
      		<?php 
				if($row["tgllahir"]!='') $tlbulan = date('m', strtotime( $row["tgllahir"] ) ); else $tlbulan = '';
				for($i=1; $i<=12; $i++ ) { 
				$monthName = date("F", mktime(0, 0, 0, $i, 10));
 			?>
			<option  value="<?php echo sprintf("%02s", $i); ?>" <?php if($tlbulan==sprintf("%02s", $i)) echo 'selected'; ?>><?php echo $monthName; ?></option>	
			<?php
				}
			?>
       
		</select>
        <span class="input-group-addon" style="width: 5px !important;"><!--<i class="fa fa-calendar"></i><--></span>
        <div id="tlhariWrap">
		<select id="tlhari" name="tlhari" class="form-control" required style="min-width: 20%;" >
      		<option value="" disabled selected><?php echo T_("DAY");?></option>      
       
		</select>
		</div>
	</div>
	</div>
				</div>	

	<div class="form-group">
		<label class="control-label col-sm-3"><?php echo T_("Email"); ?> <span style="color: #FF0000;"> * </span></label>
		<div class="col-sm-5">
			<input name="email" id="email" type="email" class="default form-control" size="16"  required/>
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-sm-3"><?php echo T_("National ID/Passport"); ?> </label>
		<div class="col-sm-5">
			<input name="noktp" id="noktp" type="text" class="default form-control" size="16"  required/>
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-sm-3"><?php echo T_("Mobile"); ?> <span style="color: #FF0000;"> * </span></label>
		<div class="col-sm-5">
			<input name="nohp1" id="nohp1" type="text" class="default form-control" size="16"  required/>
		</div>
	</div>

<div class="form-group">
	<label class="col-sm-3 control-label"><?php echo T_("Full Address");?> <span style="color: #FF0000;"> * </span></label>
    <div class="col-sm-5">
		<textarea class="default form-control" id="alamat" name="alamat" type="text"  value="<?php echo $row["nmmember"];?>"  required ><?php echo $row["alamat"];?></textarea>
	</div>
</div>

<div class="form-group">
	<label class="col-sm-3 control-label"><?php echo T_("City");?> <span style="color: #FF0000;"> * </span></label>
    <div class="col-sm-5">
		<input class="default form-control" id="kota" name="kota" type="text"  value="<?php echo $row["kota"];?>"  required />
	</div>
</div>

<div class="form-group">
	<label class="col-sm-3 control-label"><?php echo T_("Postal Code");?> <span style="color: #FF0000;"> * </span></label>
    <div class="col-sm-5">
		<input class="default form-control" id="kodepos" name="kodepos" type="text"  value="<?php echo $row["kodepos"];?>"  required />
	</div>
</div>

<div class="form-group">
	<label class="col-sm-3 control-label"><?php echo T_("State");?> <span style="color: #FF0000;"> * </span></label>
    <div class="col-sm-5">
		<input class="default form-control" id="propinsi" name="propinsi" type="text"  value="<?php echo $row["propinsi"];?>"  required />
	</div>
</div>

    <div class="form-group">
        <label class="col-sm-3 control-label"><?php echo T_("Country");?> <span style="color: #FF0000;"> * </span></label>
        <div class="col-sm-5">
            <select class="default form-control" id="negara" name="negara" type="text" required >
            <option value="" selected="selected" disabled="disabled" ><?php echo T_("Select");?></option>
    <?php 
        $cqry=mysql_query("SELECT * FROM g_negara WHERE status='1' ORDER BY nmnegara");
        while($crow=mysql_fetch_array($cqry)) { ?>
                  <option value="<?php echo $crow["id"]; ?>" ><?php echo $crow["nmnegara"];?></option>
        <?php } ?>              
            </select>
        </div>
    </div>    
    

<div class="form-group">
	<label class="col-sm-3 control-label"><?php echo T_("Secret Question");?> <span style="color: #FF0000;"> * </span></label>
    <div class="col-sm-5" style="vertical-align: middle;">
		<input class="" id="scquestion" name="scquestion" type="radio"  value="1"  required /> <?php echo T_("Your Mother's Maiden name");?>
		<!--<input class="" id="scquestion" name="scquestion" type="radio"  value="2"  required /> <?php echo T_("Your Favorite Color");?>-->
	</div>
</div>

<div class="form-group">
	<label class="col-sm-3 control-label"><?php echo T_("Secret Question Answer");?> <span style="color: #FF0000;"> * </span></label>
    <div class="col-sm-5">
		<input class="default form-control" id="scquestiontxt" name="scquestiontxt" type="text"  value=""  required />
	</div>
</div>

<div class="form-group">
	<label class="col-sm-3 control-label"><?php echo T_("ID Card");?> <span style="color: #FF0000;"> * </span></label>
    <div class="col-sm-5">
    <div class="input-group mb-md">
		<input type="text" class="form-control" id="ktpdoc" name="ktpdoc" value="<?php //if(isset($_GET["pic"])) echo $_GET["pic"]; ?>" readonly >
        	<span class="input-group-btn">
			<button class="btn btn-warning" type="button" onclick="$('#acuandoc').val('ktpdoc');$('#ximage1').click();">Upload</button>
            </span>
     </div>
	</div>
</div>

    
            
</div>
</section>
</div>

<div class="col-lg-12 col-md-12 ">
    <section class="panel">
        <header class="panel-heading my-header">
            <?php echo T_("Payment Information");?>
        </header>
		<div class="panel-body bio-graph-info">
 
 <div class="form-group">
	<label class="col-sm-3 control-label"><?php echo T_("Bank Name");?> <span style="color: #FF0000;"> * </span></label>
    <div class="col-sm-5">
		<input class="default form-control" id="nmbank" name="nmbank"  type="text"  value="<?php echo $row["nmbank"];?>" required  />
	</div>
</div>

<div class="form-group">
	<label class="col-sm-3 control-label"><?php echo T_("Account Holder Name");?> <span style="color: #FF0000;"> * </span></label>
    <div class="col-sm-5">
		<input class="default form-control" id="atasnama" name="atasnama" type="text"  value="<?php echo $row["atasnama"];?>"  required />
	</div>
</div>


<div class="form-group">
	<label class="col-sm-3 control-label"><?php echo T_("Account No.");?> <span style="color: #FF0000;"> * </span></label>
    <div class="col-sm-5">
		<input class="default form-control" id="norek" name="norek"  type="text"  value="<?php echo $row["norek"];?>"  required />
	</div>
</div>

<!--
<div class="form-group">
	<label class="col-sm-3 control-label"><?php echo T_("Swift Code");?> <span style="color: #FF0000;"> * </span></label>
    <div class="col-sm-5">
		<input class="default form-control" id="swiftcode" name="swiftcode"  type="text"  value="<?php echo $row["swiftcode"];?>"  required />
	</div>
</div>
-->

<div class="form-group">
	<label class="col-sm-3 control-label"><?php echo T_("Bank Address");?> <span style="color: #FF0000;"> * </span></label>
    <div class="col-sm-5">
		<input class="default form-control" id="cabbank" name="cabbank" type="text"  value="<?php echo $row["cabbank"];?>"  />
	</div>
</div>
        
        </div>
	</section>
</div>

<div class="col-lg-12 col-md-12 ">
    <section class="panel">
        <header class="panel-heading my-header">
            <?php echo T_("Payment Information");?>
        </header>
		<div class="panel-body bio-graph-info">
        
	<div id="ewpassword" class="form-group" >
		<label class="control-label col-sm-3"><?php echo T_("Security Password"); ?> <span style="color: #FF0000;"> * </span></label>
		<div class="col-sm-5">
			<input type="password" name="password2" id="password2" class="default form-control" required  />
		</div>
	</div>
    
	<div class="form-group">
	<input type="hidden" id="acuandoc">
	
		<label class="control-label col-sm-3">&nbsp;</label>
		<div class="col-sm-5">
			<input type="submit" class="btn btn-primary" value="<?php echo T_("Register"); ?>" style=""/> 
		</div>
	</div>
    
 </div>
 </section>
 </div>


</div>
</form>

                        <form id="my_formX" action="uploadDoc0.php" target="form_target" method="post" enctype="multipart/form-data" style="width:0px;height:0;overflow:hidden">
                            <input id="ximage1" name="ximage1" type="file" onchange="$('#my_formX').submit();this.value='';">
                        </form>     

<?php // } ?>

</div>
<div style="clear: both;"></div>


<script>
    $(document).ready(function() 
    {
       $("#add_post").ajaxForm({
       url:'signup.act.php',
       type:'post',
	   beforeSubmit: function () {
			loadingstart();
			
			if (!confirm("<?php echo T_("Confirm to Continue?");?>")) {
				$('#passwordx').val('');
				$('#passwordx2').val('');
				$('#npass2').val('');
				$('#kpass2').val('');
				$('#password2').val('');
				loadingend();
				return false;
			}

			if ( $("#useridx").val()=='' ) {
				$.messager.alert( errProc(), '<?php echo T_("UserID cannot be empty");?>',"error");
				loadingend();
				return false;
			}
		if( $("#ktpdoc").val()=='' ) {
			$.messager.alert( errProc(), "<?php echo T_("ID Card Document is empty");?>!!!","error");
			loadingend();
			return false;	
		}
		   
/*
			var balReg	= <?php echo $cbReg; ?>;
			var cekReg = $('#needReg').val();
			cekReg = parseFloat(cekReg);
	
			alert( balReg+' < '+cekReg);
			if( balReg < cekReg) {
				$.messager.alert( errProc(), "<?php echo T_("You don't have sufficient Register Wallet Balance. Contact Administrator or your sponsor.");?>", "error");
				$('#passwordx').val('');
				$('#passwordx2').val('');
				$('#password2').val('');
				loadingend();
				return false;
			}
*/			
			if(!cekzzz()) {clogout(); return false;}

    },
       success:function(e){
		var hasil = $.trim(e);
		var xhasil = hasil.split("|");
        if(xhasil[0]=="success") {
			var tLoad = 'signup2.php?id='+xhasil[1];
			loadingend();
			loadpagez(tLoad);
//			$.messager.alert( sucProc(), dataDisimpan(), 'info');
   		}
		else {
			$.messager.alert( errProc(), hasil,"error");
			$('#passwordx').val('');
			$('#passwordx2').val('');
				$('#npass2').val('');
				$('#kpass2').val('');			
			$('#password2').val('');			
			loadingend();			
			}
	   }
	});
		
       $("#my_formX").ajaxForm({
       url:'uploadDoc0.php',
       type:'post',
	   beforeSubmit: function () {
			loadingstart();

			if(!cekzzz()) {clogout(); return false;}
      },
       success:function(e){
		var dhasil = $.trim(e);
		 // alert(dhasil);
        var xhasil=dhasil.split("||");
		if(xhasil[0]=="success") {
//			alert('proof.e.php?trf='+$('#trfvalue').val()+'pic='+xhasil[1]);
//			loadpagez('proof.e.php?trf='+$('#trfvalue').val()+'&pic='+encodeURI(xhasil[1]) );
			//alert( '#'+$("#acuandoc").val()+': '+xhasil[1] );
			$('#'+$("#acuandoc").val()).val(xhasil[1]);
			loadingend();
   		}
		else { $.messager.alert(errProc(), xhasil[0],"error"); loadingend(); }
	   }
       });
		
});
</script>
