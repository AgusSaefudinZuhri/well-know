<?php include_once('includes/config.php');
$row=mysql_fetch_array(mysql_query("
	SELECT a.* 
	FROM g_member a
	WHERE a.userid='".$_SESSION["userid"]."'
	"));
 ?>
 <script type="application/javascript" language="javascript">
function copyToClipboard(element) {
  var $temp = $("<input>");
  $("body").append($temp);
  $temp.val($(element).text()).select();
  document.execCommand("copy");
  $temp.remove();
  $.messager.alert( sucProc(), "<?php echo T_("Link is already copied to your clipboard");?>!!!","info")
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
		<div class="page-header"><?php echo T_("Profile");?></div>
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
<div class="col-lg-6 col-md-12 ">
    <section class="panel">
        <header class="panel-heading my-header">
            <?php echo T_("Account Information");?>
        </header>
		<div class="panel-body bio-graph-info">

<form class="form-horizontal" role="form"  id="add_post" name="add_post" method="post">

	<!--
    <div class="col-sm-4" style="margin-top: 30px;">  

    <div class="profil-qrcode myprofil-info">
    <img width="75%" src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=<?php echo $mbrlink.$_SESSION["userid"];?>&choe=UTF-8" />
    <!--<img src="<?php echo $row["mbrqrcode"];?>" style="width: 60%;"/>-->
    <!--
    </div>
    -->

	<!--
    <div class="profil-link myprofil-info">
    <span id="urlid"><?php echo $mbrlink.$_SESSION["userid"];?></span><br/>
    <input type="button" class="default" onclick="copyToClipboard('#urlid')" value="Copy" />
    </div>
    </div>
	-->
<div class="col-sm-12">   

<div class="form-group">
	<label class="col-sm-4 control-label"><?php echo T_("UserName");?></label>
    <div class="col-sm-8">
        <label class="col-sm-12 control-label" style="text-align: left;">
		<?php echo $row["userid"];?>
</label>
	</div>
</div>

<div class="form-group">
	<label class="col-sm-4 control-label"><?php echo T_("Name");?></label>
    <div class="col-sm-8">
		<label class="col-sm-12 control-label" style="text-align: left;"><?php echo $row["nmmember"];?></label>
	</div>
</div>


<div class="form-group">
	<label class="col-sm-4 control-label"><?php echo T_("Email");?></label>
    <div class="col-sm-8">
        <!--<input class="default form-control"  id="email" name="email" type="email"  value="<?php echo $row["email"];?>"  required />
        -->
        <span class="form-control"><?php echo $row["email"];?></span>
	</div>
</div>

<div class="form-group">
	<label class="col-sm-4 control-label"><?php echo T_("Mobile");?></label>
    <div class="col-sm-8">
		<!--<input class="default form-control"  id="nohp1" name="nohp1" type="text"  value="<?php echo $row["nohp1"];?>"  required />-->
		<span class="form-control"><?php echo $row["nohp1"];?></span>
	</div>
</div>

<div class="form-group">
	<label class="col-sm-4 control-label"><?php echo T_("Full Address");?></label>
    <div class="col-sm-8">
		<textarea class="default form-control" id="alamat" name="alamat"  value="<?php echo $row["nmmember"];?>"  readonly ><?php echo $row["alamat"];?></textarea>
	</div>
</div>

<div class="form-group">
	<label class="col-sm-4 control-label"><?php echo T_("City");?></label>
    <div class="col-sm-8">
		<!--<input class="default form-control" id="kota" name="kota" type="text"  value="<?php echo $row["kota"];?>"  required />-->
		<span class="form-control"><?php echo $row["kota"];?></span>
	</div>
</div>

<div class="form-group">
	<label class="col-sm-4 control-label"><?php echo T_("Postal Code");?></label>
    <div class="col-sm-8">
    	<!--
		<input class="default form-control" id="kodepos" name="kodepos" type="text"  value="<?php echo $row["kodepos"];?>"  required />
		-->
		<span class="form-control"><?php echo $row["kodepos"];?></span>
	</div>
</div>

<div class="form-group">
	<label class="col-sm-4 control-label"><?php echo T_("State");?></label>
    <div class="col-sm-8">
		<!--<input class="default form-control" id="propinsi" name="propinsi" type="text"  value="<?php echo $row["propinsi"];?>"  required />-->
		<span class="form-control"><?php echo $row["propinsi"];?></span>
	</div>
</div>



<!--
    <div class="form-group">
        <label class="col-sm-4 control-label"><?php echo T_("Country");?></label>
        <div class="col-sm-8">
            <select class="default form-control" id="negara" name="negara" type="text" required >
            <?php if($row["negara"]=='0') { ?><option value="" selected="selected" disabled="disabled" ><?php echo T_("Select");?></option><?php } ?>
    <?php 
        $cqry=mysql_query("SELECT * FROM g_country WHERE status='1' ORDER BY nmcountry");
        while($crow=mysql_fetch_array($cqry)) { ?>
                  <option value="<?php echo $crow["id"]; ?>" <?php if($row["negara"]==$crow["id"]) echo 'selected="selected"';?> ><?php echo $crow["nmcountry"];?></option>
        <?php } ?>              
            </select>
        </div>
    </div>
-->
<!--
<div id="ewpassword" class="form-group">
		<label class="col-sm-4 control-label"><?php echo T_("Security Password"); ?> <span style="color: #FF0000;"> * </span></label>
		<div class="col-sm-8">
			<input type="password" name="password2" id="password2" class="default form-control"  required />
		</div>
	</div>


<div class="form-group">
	<div class="col-sm-offset-4 col-sm-8">
		<input type="submit" value="<?php echo $simpanBtn;?>"/>
	</div>
</div>
-->

</div>
</form>          

</div>
</section>
</div>

<div class="col-lg-6 col-md-12 ">
    <section class="panel">
        <header class="panel-heading my-header">
            <?php echo T_("Payment Information");?>
        </header>
		<div class="panel-body bio-graph-info">
 <form class="form-horizontal" role="form"  id="add_post3" name="add_post3" method="post">

<!--
	<div class="alert alert-info">
		Please provide your accurate banking details.
		</div>
-->

<div class="form-group">
	<label class="col-sm-4 control-label"><?php echo T_("Beneficiary Name");?> <span style="color: #FF0000;"> * </span></label>
    <div class="col-sm-8">
    	<?php if( $row["norek"]=='' ) { ?>
		<input class="default form-control" id="atasnama" name="atasnama" type="text"  value="<?php echo $row["atasnama"];?>"  required />
		<?php } else { ?>		
		<span class="form-control"><?php echo $row["atasnama"];?></span>
		<?php } ?>
	</div>
</div>
        
 <div class="form-group">
	<label class="col-sm-4 control-label"><?php echo T_("Bank Name");?> <span style="color: #FF0000;"> * </span></label>
    <div class="col-sm-8">
    	<?php if( $row["norek"]=='' ) { ?>
		<input class="default form-control" id="nmbank" name="nmbank"  type="text"  value="<?php echo $row["nmbank"];?>" required  />
		<?php } else { ?>
		<span class="form-control"><?php echo $row["nmbank"];?></span>
		<?php } ?>
	</div>
</div>

<div class="form-group">
	<label class="col-sm-4 control-label"><?php echo T_("Account No.");?> <span style="color: #FF0000;"> * </span></label>
    <div class="col-sm-8">
    	<?php if( $row["norek"]=='' ) { ?>
		<input class="default form-control" id="norek" name="norek"  type="text"  value="<?php echo $row["norek"];?>"  required />
		<?php } else { ?>
		<span class="form-control"><?php echo $row["norek"];?></span>
		<?php } ?>
	</div>
</div>

<!--
<div class="form-group">
	<label class="col-sm-4 control-label"><?php echo T_("Swift Code");?> <span style="color: #FF0000;"> * </span></label>
    <div class="col-sm-8">
		<input class="default form-control" id="swiftcode" name="swiftcode"  type="text"  value="<?php echo $row["swiftcode"];?>"  required />
	</div>
</div>
-->

<div class="form-group">
	<label class="col-sm-4 control-label"><?php echo T_("Bank Address");?> <span style="color: #FF0000;"> * </span></label>
    <div class="col-sm-8">
    	<?php if( $row["norek"]=='' ) { ?>
		<input class="default form-control" id="cabbank" name="cabbank" type="text"  value="<?php echo $row["cabbank"];?>"  />
		<?php } else { ?>
		<span class="form-control"><?php echo $row["cabbank"];?></span>
		<?php } ?>
	</div>
</div>

    	<?php if( $row["norek"]=='' ) { ?>
<div id="ewpassword" class="form-group">
		<label class="col-sm-4 control-label"><?php echo T_("Security Password"); ?> <span style="color: #FF0000;"> * </span></label>
		<div class="col-sm-8">
			<input type="password" name="password2" id="password2" class="default form-control"  required />
		</div>
	</div>

<div class="form-group">
	<div class="col-sm-offset-4 col-sm-8">
		<input type="submit" value="<?php echo $simpanBtn;?>"/>
	</div>
</div>
<?php } ?>

</form>        
        
        </div>
	</section>
</div>

</div>

</div>
<script>
    $(document).ready(function() 
    {
	
		$('.datepicker2').datepicker({
			container:'.datepickerdiv',
		 	format: 'yyyy-mm-dd'
		});
		
		
       $("#add_post").ajaxForm({
       url:'profile.act.php?a=0&id=<?php echo $_SESSION["userid"];?>',
       type:'post',
	   beforeSubmit: function () {
		loadingstart();
		if (!confirm("<?php echo T_("Confirm to Update Profile?"); ?>")) {
			loadingend();
            return false;
        }
		if(!cekzzz()) {clogout(); return false;}
    },
       	success:function(e){
			var hasil = $.trim(e);
		//		alert(hasil);
			if(hasil=="success") {
				$.messager.alert( sucProc(), "<?php echo T_("Profile is Updated");?>!!!","info");
				location.reload();						
			}
			else {$.messager.alert( errProc(), hasil,"error");loadingend();}

	   }
       });

	
		$('.datepicker2').datepicker({
			container:'.datepickerdiv',
		 	format: 'yyyy-mm-dd'
		});
		
		
       $("#add_post3").ajaxForm({
       url:'profile.act.php?a=1&id=<?php echo $_SESSION["userid"];?>',
       type:'post',
	   beforeSubmit: function () {
		loadingstart();
		if (!confirm("<?php echo T_("Confirm to Update Profile?"); ?>")) {
			loadingend();
            return false;
        }
		if(!cekzzz()) {clogout(); return false;}
    },
       	success:function(e){
			var hasil = $.trim(e);
		//		alert(hasil);
			if(hasil=="success") {
				$.messager.alert( sucProc(), "<?php echo T_("Profile is Updated");?>!!!","info");
				location.reload();						
			}
			else {$.messager.alert( errProc(), hasil,"error");loadingend();}

	   }
       });

    });	
</script>
