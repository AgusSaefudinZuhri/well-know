<?php include_once('includes/config.php');
 ?>
<script type="application/javascript" language="javascript">

function cari(x) {
	loadingstart();	
	if(cekzzz()) {
		if(x=='') x=$('#pg').val(); else x=x;		
		var	fCari	= encodeURI( 'accounts.f.php?pg='+x );		
		$('#iwrapper').load( fCari, function () {loadingend();});
	}
	else  clogout ();
}

</script>

 <div class="row">
	<div class="col-lg-12">
		<div class="page-header"><?php echo T_("MT4 Accounts");?></div>
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
<script>
</script>
