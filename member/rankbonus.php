<?php include_once('includes/config.php');

$funds=mysql_fetch_array(mysql_query("
	SELECT a.*, SUM( IF( a.jtransaksi='0', a.trxvalue,'0' ) ) - SUM( IF( a.jtransaksi='1', a.trxvalue,'0' ) ) jnilai
	FROM g_wfund a
	WHERE a.userid='".$_SESSION["userid"]."' AND a.status IN ('0','1') AND a.jkomisi='1'
	"));
	
	if( is_null($funds["jnilai"]) ) $tSaldo = 0; else $tSaldo = $funds["jnilai"];

 ?>
<script type="application/javascript" language="javascript">

function cari(x) {
	loadingstart();	
	if(cekzzz()) {
		if(x=='') x=$('#pg').val(); else x=x;		
//		var pfilter=$("#pfilter").val();	
//		var vfilter=$("#vfilter").val();
		var	fCari	= encodeURI( 'rankbonus.h.f.php?pg='+x );		
		$('#iwrapper').load( fCari, function () {loadingend();});
	}
	else  clogout ();
}

</script>

 <div class="row">
	<div class="col-lg-12">
		<div class="page-header"><?php echo T_("Rank Bonus History Records");?></div>
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

<p><i class="fa fa-table"></i> Rank Bonus History Records</p>

	<div id="iwrapper">
	<h1 class="col-md-12 text-center text-danger">UNDER CONSTRUCTION</h1>
	<?php //include('rankbonus.h.f.php'); ?>
    </div>

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
				loadpagez('rankbonus.h.php');					
			}
			else {
				$.messager.alert( errProc(), hasil,"error");
				loadpagez('rankbonus.h.php');					
				loadingend();}

	   }
       });	


	   	   	   
    });	
</script>