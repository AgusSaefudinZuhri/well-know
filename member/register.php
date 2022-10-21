<?php include_once('includes/config.php'); 
//echo print_r($_REQUEST);
$error = 0;
if( isset($_GET["ref"]) and $_GET["ref"]!='master' ) {
	$rQry = mysqli_query("SELECT * FROM g_member WHERE userid='".$_GET["ref"]."' AND parentstatus='1' ");	
	if(mysqli_num_rows($rQry)=='0') $error = 1;
//	echo "masuk";
}
else $error = 1;

if($error=='1') header('Location: ../');
//else {

//if(isset($_GET["ref"])) $headerlink="../member/"; 
//else $headerlink="";

$headerlink="../member/";
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"  dir="ltr" lang="en-US">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo $namaweb;?> | <?php echo T_("Registration");?></title>
<link href="../images/favicon.ico" rel="shortcut icon">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Web Fonts  -->
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" media="all" href="<?php echo $headerlink;?>includes/easyui/themes/default/easyui.css" />
		<link rel="stylesheet" href="<?php echo $headerlink;?>assets/vendor/bootstrap/css/bootstrap.css" />
		<!-- Theme CSS -->
		<link rel="stylesheet" href="<?php echo $headerlink;?>assets/css/main.css" />
		<link rel="stylesheet" href="<?php echo $headerlink;?>includes/login.css" />


<script type="text/javascript" src="<?php echo $headerlink;?>includes/jquery-1.10.2.js"></script>
<script type="text/javascript" src="<?php echo $headerlink;?>includes/easyui/jquery.easyui.min.js"></script>
<script type="text/javascript" src="<?php echo $headerlink;?>includes/jquery.form.js"></script>
<script type="text/javascript" src="<?php echo $headerlink;?>includes/default2.js"></script>
<script type="text/javascript" src="<?php echo $headerlink;?>includes/default.js"></script>


<!--<link rel="stylesheet" type="text/css" media="all" href="includes/default.css" />-->
</head>

<body class="login">


<script type="application/javascript" language="javascript">
	
	function cekSponsor( x ) {
		//alert('x');
		$.get( "<?php echo $headerlink;?>cekSponsor.php?id="+x, function( data ) {
			  //$( ".result" ).html( data );
			//alert(data.trim());
			var sponsor = (data.trim()).split('|');
			if( sponsor[0] == 'success' ) $('#sponsornm').val(sponsor[1]);
			else {
				$('#sponsordst').val('');
				//$('#sponsordst').focus;
				$.messager.alert('Error in Process', 'The Referral ID is not registered.', 'error');
			}
		});
	}
function cTglLahir() {
	var tltahun = $("#tltahun").val();
	var tlbulan = $("#tlbulan").val();
	var tlhari = $("#tlhari").val();
	if(tltahun!='' && tlbulan!='') {
		var fTxt	= '<?php echo $headerlink;?>cTglLahir.php?y='+tltahun+'&m='+tlbulan+'&d='+tlhari;
		//alert(fTxt);
		loadingstart();
		$('#tlhariWrap').load( fTxt, function() {
			loadingend();
		});
	}
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
		tcontentheight();	}
</script>

<style>
	#the_contentx {min-width: 0;}
</style>

<div class="form-signin" style="max-width: 800px;">

	<div class="text-center">
        <img src="<?php echo $headerlink;?>images/logo-bg.png" height="150" >
	</div>

    <h3 class="text text-warning"><strong>Registration Form</strong></h3>
    <small style="color: #fff;">Please Fill-in with the Correct Information.</small>    
    <hr>
	
	<div id="login" class="tab-pane active" style="" >

		<div id="the_contentx">
			<form id="add_post" name="add_post" method="post" class="form-horizontal">
			<?php
			if( $error==1 ) { 
			?>

				<div class="form-group">

					<div class="col-sm-12">
					<label class="" style="color: #fff;"><?php echo T_("Referral ID"); ?> <span style="color: #FF0000;"> * </span></label>
					<input name="sponsordst" id="sponsordst" type="text" class="default form-control"  size="16" onchange="cekSponsor(this.value)" required />
					</div>

					<div class="col-sm-12">
					<label class="" style="color: #fff;"><?php echo T_("Referral Name"); ?> <span style="color: #FF0000;"> * </span></label>
					<input name="sponsornm" id="sponsornm" type="text" class="default form-control"  size="16" readonly />
					</div>
					
				</div>
				
			<?php  } 
			else { 

				$rRow = mysqli_fetch_array($rQry);
			?>

				<div class="form-group">

					<div class="col-sm-12">
					<label class="" style="color: #fff;"><?php echo T_("Referral ID"); ?> <span style="color: #FF0000;"> * </span></label>
					<label class=" col-sm-12 form-control" style="text-align: left;"><?php echo $rRow["userid"]; ?></label>
						<input name="sponsordst" id="sponsordst" type="hidden" class="default form-control" value="<?php echo $rRow["userid"]; ?>" size="16"  readonly="readonly" required />
					</div>


					<div class="col-sm-12">
					<label class="" style="color: #fff;"><?php echo T_("Referral Name"); ?> <span style="color: #FF0000;"> * </span></label>
					<label class=" col-sm-12  form-control" style="text-align: left;">
					<?php echo $rRow["nmmember"]; ?>
					</label>
					</div>
				</div>
				<?php } ?>	
				
				<div class="form-group">

					<div class="col-sm-12">
					<label class="" style="color: #fff;"><?php echo T_("UserName"); ?> <span style="color: #FF0000;"> * </span></label>
						<input name="useridx" id="useridx" type="text" class="default form-control" size="16" onchange="cekUser()" required/>
					</div>

									
					<div class="col-sm-12">
						<label class="" style="color: #fff;"><?php echo T_("Full Name"); ?> <span style="color: #FF0000;"> * </span></label>
						<input name="nmmember" id="nmmember" type="text" class="default form-control" size="16"  required/>
					</div>
									
					<div class="col-sm-12">
						<label class="" style="color: #fff;"><?php echo T_("Birth Date"); ?> <span style="color: #FF0000;"> * </span></label>
						<div class="row" id="dt-wrapper">
							
							<div class="col-sm-4">
							<input type="text" id="tltahun" name="tltahun" placeholder="<?php echo T_("YEAR");?>" class="form-control"  onchange="cTahun(this)" required />
							</div>
							<div class="col-sm-4">
							<select id="tlbulan" name="tlbulan" class="form-control" onchange="cTglLahir()" required style="height: 45px;" >
								<option value="" disabled selected><?php echo T_("MONTH");?></option>
								<?php 
									//if($row["tgllahir"]!='') $tlbulan = date('m', strtotime( $row["tgllahir"] ) ); 
									//else 
									$tlbulan = '';
									for($i=1; $i<=12; $i++ ) { 
									$monthName = date("F", mktime(0, 0, 0, $i, 10));
								?>
								<option  value="<?php echo sprintf("%02s", $i); ?>" <?php if($tlbulan==sprintf("%02s", $i)) echo 'selected'; ?>><?php echo $monthName; ?></option>	
								<?php
									}
								?>

							</select>
							</div>
							<div class="col-sm-4" id="tlhariWrap">
							<select id="tlhari" name="tlhari" class="form-control" required style="height: 45px;" >
								<option value="" disabled selected><?php echo T_("DAY");?></option>      

							</select>
							</div>
						</div>
					</div>
					
					<div class="col-sm-12">
						<label class="" style="color: #fff;"><?php echo T_("Email"); ?> <span style="color: #FF0000;"> * </span></label>
					<input name="email" id="email" type="email" class="default form-control" size="16"  required/>

					</div>
									
					<div class="col-sm-12">
						<label class="" style="color: #fff;"><?php echo T_("National ID/Passport"); ?> <span style="color: #FF0000;"> * </span></label>
						<input name="noktp" id="noktp" type="text" class="default form-control" size="16"  required/>
					</div>
									
					<div class="col-sm-12">
						<label class="" style="color: #fff;"><?php echo T_("Mobile Phone"); ?> <span style="color: #FF0000;"> * </span></label>
						<input name="nohp1" id="nohp1" type="text" class="default form-control" size="16"  required/>

					</div>
									
					<div class="col-sm-12">
						<label class="" style="color: #fff;"><?php echo T_("Full Address"); ?> <span style="color: #FF0000;"> * </span></label>
						<textarea class="default form-control" id="alamat" name="alamat" type="text" rows="4"  value="<?php echo $row["nmmember"];?>"  required ><?php echo $row["alamat"];?></textarea>
					</div>
									
					<div class="col-sm-12">
						<label class="" style="color: #fff;"><?php echo T_("City"); ?> <span style="color: #FF0000;"> * </span></label>
						<input class="default form-control" id="kota" name="kota" type="text"  value="<?php echo $row["kota"];?>"  required />
					</div>
									
					<div class="col-sm-12">
						<label class="" style="color: #fff;"><?php echo T_("Postal Code"); ?> <span style="color: #FF0000;"> * </span></label>
						<input class="default form-control" id="kodepos" name="kodepos" type="text"  value="<?php echo $row["kodepos"];?>"  required />
					</div>
									
					<div class="col-sm-12">
						<label class="" style="color: #fff;"><?php echo T_("State"); ?> <span style="color: #FF0000;"> * </span></label>
		<input class="default form-control" id="propinsi" name="propinsi" type="text"  value="<?php echo $row["propinsi"];?>"  required />
					</div>
									
					<div class="col-sm-12">
						<label class="" style="color: #fff;"><?php echo T_("Country"); ?> <span style="color: #FF0000;"> * </span></label>
						<select class="default form-control" id="negara" name="negara" type="text" required >
						<option value="" selected="selected" disabled="disabled" ><?php echo T_("Select");?></option>
				<?php 
					$cqry=mysqli_query("SELECT * FROM g_negara WHERE status='1' ORDER BY nmnegara");
					while($crow=mysqli_fetch_array($cqry)) { ?>
							  <option value="<?php echo $crow["id"]; ?>" ><?php echo $crow["nmnegara"];?></option>
					<?php } ?>              
						</select>
					</div>
					
					<div class="col-sm-12" style="padding: 10px 20px;">
						<label style="color: #fff;margin-top: 10px;"><?php echo T_("Secret Question"); ?> <span style="color: #FF0000;"> * </span></label><br/>
					
						<input class="" id="scquestion" name="scquestion" type="radio"  value="1"  required /> <span style="color:#fff"><?php echo T_("Your Mother's Maiden name");?></span>
						<!--
						<input class="" id="scquestion" name="scquestion" type="radio"  value="2"  required /> <span style="color:#fff"><?php echo T_("Your Favorite Color");?></span>
						-->		
					</div>
									
					<div class="col-sm-12">
						<label class="" style="color: #fff;"><?php echo T_("Secret Question Answer"); ?> <span style="color: #FF0000;"> * </span></label>
						<input class="default form-control" id="scquestiontxt" name="scquestiontxt" type="text"  value=""  required />
					</div>
									
					<div class="col-sm-12">
						<label class="" style="color: #fff;"><?php echo T_("ID Card"); ?> <span style="color: #FF0000;"> * </span></label>
						<div class="input-group mb-md">
							<input type="text" class="form-control" id="ktpdoc" name="ktpdoc" value="<?php //if(isset($_GET["pic"])) echo $_GET["pic"]; ?>" readonly="readonly" >
								<span class="input-group-btn">
								<button class="btn btn-warning" type="button" onclick="$('#acuandoc').val('ktpdoc');$('#ximage1').click();" style="height: 44px;margin-top: -9px">Upload</button>
								</span>
						 </div>
					</div>


					<div class="col-sm-12">
					<label class="" style="color: #fff;"><?php echo T_("Login Password"); ?> <span style="color: #FF0000;"> * </span></label>
						<input name="passwordx" id="passwordx" type="password" placeholder="Password" onchange="cekPassword();" class="default form-control" size="16"  required/>
					</div>

					<div class="col-sm-12">
						<input name="passwordx2" id="passwordx2" type="password" placeholder="Re-Type Password" onchange="cekPassword();" class="default form-control" size="16"  required />
					</div>


					<div class="col-sm-12">

						<div id="cekPassword" class="alert alert-danger" style="display:none;">
							<strong><?php echo T_("NOTE!");?></strong> <?php echo T_("Password yang dimasukkan Berbeda.");?>
						</div>

						<div id="cekPassword2" class="alert alert-danger" style="display:none;">
							<strong><?php echo T_("NOTE!");?></strong> <?php echo T_("Panjang Minimum adalah 4 Digits Alphanumeric.");?>
						</div>

						<div id="cekPassword3" class="alert alert-danger" style="display:none;">
							<strong><?php echo T_("NOTE!");?></strong> <?php echo T_("Panjang Maksimum adalah 20 Digits Alphanumeric.");?>
						</div>

						<div id="cekUserID1" class="alert alert-danger" style="display:none;">
							<strong><?php echo T_("NOTE!");?></strong> <?php echo T_("Panjang UserName Minimum adalah 4 Digits.");?>
						</div>

						<div id="cekUserID2" class="alert alert-danger" style="display:none;">
							<strong><?php echo T_("NOTE!");?></strong> <?php echo T_("Pangjang UserName Maksimum adalah 20 Digits.");?>
						</div>

					</div>
					
					<!--
					<div class="col-sm-12">
						<label class="" style="color: #fff;"><?php echo T_("Email"); ?> <span style="color: #FF0000;"> * </span></label>
						<input name="email" id="email" type="email" class="default form-control" size="16"  required/>
					</div>
					-->

	
				</div>
		
<div class="form-group">
					<div class="col-sm-12">
	<input type="hidden" id="acuandoc">
					
						<input type="submit" class="btn btn-lg btn-warning btn-block" value="<?php echo T_("Register"); ?>" style=""/> 
					</div>

			   </div>
			   
		</div>

			</form>
                        <form id="my_formX" action="uploadDoc0.php" target="form_target" method="post" enctype="multipart/form-data" style="width:0px;height:0;overflow:hidden">
                            <input id="ximage1" name="ximage1" type="file" onchange="$('#my_formX').submit();this.value='';">
                        </form>     

		</div>
	
	
	<hr>
	
	<div class="text-center">
	
	<a class="text-white" href="<?php echo $headerlink;?>">Back to Login Page</a>

	</div>
</div>



<script>
    $(document).ready(function() 
    {
       $("#add_post").ajaxForm({
       url:'<?php echo $headerlink;?>signup.act.php?x=1',
       type:'post',
	   beforeSubmit: function () {
		   
			loadingstart();
		   
			if (!confirm("<?php echo T_("Continue Registration?");?>")) {
				loadingend();
				return false;
			}
			if( $("#ktpdoc").val()=='' ) {
				$.messager.alert( errProc(), "<?php echo T_("ID Card Document is empty");?>!!!","error");
				loadingend();
				return false;	
			}
		   
    	},
       success:function(e){
		var hasil = $.trim(e);
		var xhasil = hasil.split("|");
        if(xhasil[0]=="success") {
			$('#the_contentx').load('<?php echo $headerlink;?>signup2.php?id='+xhasil[1],function() {
				loadingend();
				});	
   		}
		else {$.messager.alert("<?php echo T_("Error in Process");?>", hasil,"error");loadingend();}

	   }
       });
		
       $("#my_formX").ajaxForm({
       url:'<?php echo $headerlink;?>uploadDoc0.php',
       type:'post',
	   beforeSubmit: function () {
			loadingstart();
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
		else { $.messager.alert("<?php echo T_("Error in Process");?>", xhasil[0],"error"); loadingend(); }
	   }
       });
		
    });
</script>




</body>
</html>
<?php // } ?>