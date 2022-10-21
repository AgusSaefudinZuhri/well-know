<?php include_once('includes/config.php');
 ?>
<script type="application/javascript" language="javascript">

function cari(x) {
	loadingstart();	
	if(cekzzz()) {
		if(x=='') x=$('#pg').val(); else x=x;
		var ax = $("#acuanX").val();
		var	fCari	= encodeURI( 'deposit.f.php?pg='+x+'&ax='+ax );		
		$('#iwrapper').load( fCari, function () {loadingend();});
	}
	else  clogout ();
}
	
function pilihGrup( x, y ) {
	$('.btn-selected').removeClass('btn-selected');
	$(x).addClass('btn-selected');
	$('#acuanX').val(y);
	cari('');
}

</script>

 <div class="row">
	<div class="col-lg-12">
		<div class="page-header"><?php echo T_("Deposit");?></div>
	</div>
</div>
<style>
#the_content {min-width: 0;}

	.btn-selected{background: #000 !important;}
 </style>
 

<div id="c_content">
<div class="row">

<div class="col-lg-12 col-md-12 ">
        <section class="panel">
            <div class="panel-body bio-graph-info">
            <input type="hidden" id="acuanX">
            <a href="javascript: void(0);" onclick="pilihGrup(this, '0');" class="btn btn-sm btn-warning btn-selected"><?php echo T_("All");?></a>
            
            <?php
				$gjTxt = "SELECT * FROM g_gjfinance WHERE status='1' ORDER BY id";
				$gjQry = mysql_query( $gjTxt );
				while( $gjRow = mysql_fetch_array( $gjQry ) ) {
			?>		
				
            <a href="javascript: void(0);" onclick="pilihGrup(this, '<?php echo $gjRow["id"];?>');" class="btn btn-sm btn-warning"><?php echo $gjRow["nmgjfinance"];?></a>
							
			<?php		
				}
			?>
			<div class="row" style="margin-top: 10px;">
				<div id="iwrapper">
				<?php include('deposit.f.php'); ?>
				</div>
    		</div>
			</div>
		</section>
</div>


</div>

</div>


</div>
<script>
</script>
