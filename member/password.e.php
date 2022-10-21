<?php include_once('includes/config.php'); 
?>
<script type="application/javascript" language="javascript">
	function cekPassword() {
		 var p1 = $('#npass').val();	
		 var p2 = $('#kpass').val();	
		
		if(p1!=p2 && p1!='' && p2!='') $('#cekPassword').show(); else $('#cekPassword').hide();
		if(p1.length<4) { 
			$('#cekPassword2').show(); 
			$('#npass').focus();
			setTimeout(function() {
				$("#npass").focus();
			}, 100);
			$('#npass').val('');
		}
		else $('#cekPassword2').hide();

		if(p1.length>20) {
			$('#cekPassword3').show(); 
			setTimeout(function() {
				$("#npass").focus();
			}, 100);
			$('#npass').val('');
		}
		else $('#cekPassword3').hide();
		tcontentheight();
	
	
	}
</script>

 <div class="row">
	<div class="col-lg-12">
		<div class="page-header"><?php echo T_("Change Login Password");?></div>
	</div>
</div>
<style>
#the_content {min-width: 0;}

 .profil td{ padding: 5px; font-size: 14px;}
 .profil td.kiri{ text-align: left; width: 150px;}
 .profil td.tengah{ text-align: center; width: 10px;}
 .profil td.kanan input[type="text"]{ width: 300px; }
 .profil td.kanan textarea{ width: 300px;height: 75px; }

 </style>
 <div id="c_content">
<section class="panel">
	<div class="panel-body bio-graph-info">
	<h4><?php echo T_("Login Password");?></h4>
 
<form class="form-horizontal" role="form" id="add_post" name="add_post" method="post">

<div class="form-group">
	<label class="col-sm-3 control-label"><?php echo T_("Current Password");?></label>
    <div class="col-sm-6">
		<input class="default form-control" id="cpass" name="cpass" type="password"  required />
	</div>
</div>

<div class="form-group">
	<label class="col-sm-3 control-label"><?php echo T_("New Password");?></label>
    <div class="col-sm-6">
		<input class="default form-control" id="npass" name="npass" type="password" onchange="cekPassword();" required />
	</div>
</div>


<div class="form-group">
	<label class="col-sm-3 control-label"><?php echo T_("Confirm Password");?></label>
    <div class="col-sm-6">
		<input class="default form-control" id="kpass" name="kpass" type="password" onchange="cekPassword();" required />
	</div>
</div>


<div id="cekPassword" class="alert alert-danger" style="display:none;">
    <strong><?php echo T_("WARNING!");?></strong> <?php echo T_("Passwords are not matched.");?>
  </div>

<div id="cekPassword2" class="alert alert-danger" style="display:none;">
    <strong><?php echo T_("WARNING!");?></strong> <?php echo T_("Min. Length is 4 Digit.");?>
  </div>

<div id="cekPassword3" class="alert alert-danger" style="display:none;">
    <strong><?php echo T_("WARNING!");?></strong> <?php echo T_("Max. Length is 20 Digit.");?>
  </div>


<div class="form-group">
	<div class="col-sm-offset-3 col-sm-6">
		<input type="submit" value="<?php echo $simpanBtn;?>"/>
	</div>
</div>

<div id="cekPassword" class="alert alert-danger" style="display:none;">
    <strong><?php echo T_("WARNING!");?></strong> <?php echo T_("Passwords are not matched.");?>
  </div>
  
</form>

</div>
</section>

</div>



<script>
    $(document).ready(function() 
    {
       $("#add_post").ajaxForm({
       url:'password.act.php?a=0&id=<?php echo $_SESSION["userid"];?>',
       type:'post',
	   beforeSubmit: function () {
		loadingstart();
		if (!confirm("<?php echo T_("Confirm to Change Password?"); ?>")) {
			loadingend();
            return false;
        }
		if($("#npass").val()!=$("#kpass").val()) {
			$.messager.alert( errProc(), "<?php echo T_("Passwords are not matched.");?>!!!","error");
			loadingend();
			return false;	
		}
		if(!cekzzz()) {clogout(); return false;}
    },
       	success:function(e){
			var hasil = $.trim(e);
		//		alert(hasil);
			if(hasil=="success") {
				$.messager.alert( sucProc(), "<?php echo T_("Password is changed");?>!!!","info");
				location.reload();						
			}
			else {
				$.messager.alert( errProc(), hasil,"error");
				$("#cpass").val("");
				$("#npass").val("");
				$("#kpass").val("");
				loadingend();}

	   }
       });

    });
</script>
