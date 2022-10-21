<?php 
	include_once('includes/config.php');
	$row	= mysql_fetch_array(mysql_query("
	SELECT a.* 
	FROM g_member a
	WHERE a.userid='".$_SESSION["userid"]."'
	"));
 ?>
 <script type="application/javascript" language="javascript">
</script>  
 <div class="row">
	<div class="col-lg-12">
		<div class="page-header"><?php echo T_("New MT4 Account");?></div>
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
        <section class="panel">
            <header class="panel-heading my-header">
                <?php echo T_("Open New MT4 Account");?>
            </header>
            <div class="panel-body bio-graph-info">
<form class="form-horizontal" role="form" id="add_post4" name="add_post4" method="post">

<div class="form-group">
	<label class="col-sm-4 control-label"><?php echo T_("Group");?></label>
    <div class="col-sm-6">
		<select class="default form-control" id="regGroup" name="regGroup" type="text"  required >
			<option value="EGG_REG" selected>EGG_REG</option>
		</select>
	</div>
</div>

<div class="form-group">
	<label class="col-sm-4 control-label"><?php echo T_("Leverage");?></label>
    <div class="col-sm-6">
		<select class="default form-control" id="leverage" name="leverage" type="text"  required >
			<option value="50" selected>1 : 50</option>
			<option value="100" >1 : 100</option>
			<option value="200" >1 : 200</option>
			<option value="400" >1 : 400</option>
			<option value="500" >1 : 500</option>
		</select>
	</div>
</div>


<div class="form-group">
	<label class="col-sm-4 control-label"><?php echo T_("New Account Password");?></label>
    <div class="col-sm-6">
		<input class="default form-control" id="npass" name="npass" type="password" onchange="cekPassword();" required />
	</div>
</div>


<div class="form-group">
	<label class="col-sm-4 control-label"><?php echo T_("Confirm Password");?></label>
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
	<div class="col-sm-offset-4 col-sm-6">
		<input type="submit" value="<?php echo T_("Submit");?>"/>
	</div>
</div>

<div id="cekPassword" class="alert alert-danger" style="display:none;">
    <strong><?php echo T_("WARNING!");?></strong> <?php echo T_("Passwords are not matched.");?>
  </div>
  
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
		
		
       $("#add_post4").ajaxForm({
       url:'account.add.act.php?a=0&id=<?php echo $_SESSION["userid"];?>',
       type:'post',
	   beforeSubmit: function () {
		loadingstart();
		if (!confirm("<?php echo T_("Confirm to Open MT4 Account?"); ?>")) {
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
				$.messager.alert( sucProc(), "<?php echo T_("MT Account is created");?>!!!","info");
				loadpagez('account.add.php');						
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
