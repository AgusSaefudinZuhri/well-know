<?php 
	
	include_once('includes/config.php');
	$row=mysqli_fetch_array(mysqli_query("SELECT * FROM g_member WHERE userid='".$_GET["id"]."'"));
?>

 <div class="row">
	<div class="col-lg-12">
		<div class="page-header"><?php echo T_("Registration");?></div>
	</div>
</div>

<div id="c_content">


<div class="row">
	<div class="col-lg-12">
		<section class="panel">
			<div class="panel-body" style="font-size: 13px;">

				<div class="form-group row-centered">
				<div class="col-xs-12 col-centered" style="font-weight: bold; color: #F00;text-align: center;" ><?php echo T_("Your Submission is received");?></div>
				</div>

				<div class="form-group row-centered">
				<div class="col-xs-12 text-center" ><?php echo T_("Your Submission is received and waiting for Verification and Approval. We will inform you by email.");?></div>
				</div>


			</div>
		</section>
	</div>
</div>
</div>