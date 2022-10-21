<?php include_once('includes/config.php');


 ?>
<script type="application/javascript" language="javascript">

function loadDetail(x) {
	loadingstart();	
	if( cekzzz() ) {
		loadpagez( 'inboxdt.php?id='+x );
	}
	else  clogout ();
}

function cari(x) {
	loadingstart();	
	if(cekzzz()) {
		if(x=='') x=$('#pg').val(); else x=x;		
//		var pfilter=$("#pfilter").val();	
//		var vfilter=$("#vfilter").val();
		var	fCari	= encodeURI( 'inbox.f.php?pg='+x );		
		$('#iwrapper').load( fCari, function () {loadingend();});
	}
	else  clogout ();
}

</script>

 <div class="row">
	<div class="col-lg-12">
		<div class="page-header"><?php echo T_("Inbox");?></div>
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

<p><i class="fa fa-paper-plane"></i> Messages Inbox</p>

	<div id="iwrapper">
	<?php include('inbox.f.php'); ?>
    </div>
				</section>
</div>


</div>

</div>


</div>
<script>
</script>
