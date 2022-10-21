<?php include_once('includes/config.php');
 ?>
<script type="application/javascript" language="javascript">

function cari(x) {
	loadingstart();	
	if(cekzzz()) {
		if(x=='') x=$('#pg').val(); else x=x;		
//		var pfilter=$("#pfilter").val();	
//		var vfilter=$("#vfilter").val();
		var	fCari	= encodeURI( 'gjaringandt.f.php?l=<?php echo $_GET["l"];?>&pg='+x );		
		$('#iwrapper').load( fCari, function () {loadingend();});
	}
	else  clogout ();
}

</script>

 <div class="row">
	<div class="col-lg-12">
		<div class="page-header"><?php echo T_("Network Detail - Level ").$_GET["l"];?>&nbsp;&nbsp;&nbsp;<a href="javascript: void(0);" onclick="loadpagez('gjaringan.php')" class="btn btn-danger">Back</a></div>
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

<!--
<div class="col-lg-12 col-md-12 ">
<p>Total Commissions: <?php echo $syscurrency." ".number_format( $funds["jnilai"],2 ); ?></p>

</div>
-->
<div class="col-lg-12 col-md-12 ">
        <section class="panel">
            <div class="panel-body bio-graph-info">

	<div id="iwrapper">
	<?php include('gjaringandt.f.php'); ?>
    </div>
			</div>
		</section>

</div>


</div>

</div>


</div>
<script>
    $(document).ready(function() 
    {

       $("#add_post").ajaxForm({
       url:'transfer.act.php?a=2&k=1&id=<?php echo $_SESSION["userid"];?>',
       type:'post',
	   beforeSubmit: function () {
		loadingstart();
		if (!confirm("<?php echo T_("Confirm to Send?"); ?>")) {
			loadingend();
            return false;
        }
		if(!cekzzz()) {clogout(); return false;}
    },
       	success:function(e){
			var hasil = $.trim(e);
		//		alert(hasil);
			if(hasil=="success") {
				$.messager.alert( sucProc(), "<?php echo T_("Transaction is Succesfull");?>!!!","info");
				loadpagez('gjaringandt.php');					
			}
			else {
				$.messager.alert( errProc(), hasil,"error");
				loadpagez('gjaringandt.php');					
				loadingend();}

	   }
       });	


	   	   	   
    });	
</script>
