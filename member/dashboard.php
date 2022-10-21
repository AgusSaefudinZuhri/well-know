<?php 
	include_once('includes/config.php'); 	
	?>
<script>

</script>        
<style>
td.pad.space-text {width: 200px;}
</style>
<div class="row" >
	<div class="col-lg-12">
		<div class="page-header" ><?php echo T_("Dashboard");?> - <?php echo T_("Trader");?></div>
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
           
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>


