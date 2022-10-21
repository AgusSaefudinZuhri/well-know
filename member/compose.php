<?php include_once('includes/config.php');

 ?>
<script type="application/javascript" language="javascript">
function cari(x) {
	loadingstart();	
	if(cekzzz()) {
		if(x=='') x=$('#pg').val(); else x=x;		
		var	fCari	= encodeURI( 'compose.f.php?pg='+x );		
		$('#iwrapper').load( fCari, function () {loadingend();});
	}
	else  clogout ();
}

</script>

 <div class="row">
	<div class="col-lg-12">
		<div class="page-header"><?php echo T_("Compose Message");?></div>
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

<form class="form-horizontal" role="form"  id="add_post" name="add_post" method="post">

<div class="col-sm-12">   

	<div class="form-group">
		<div class="col-sm-6">
			<input type="text" name="judul" id="judul" class="default form-control" placeholder="Subject"   required />
		</div>
	</div>


	<div class="form-group">
		<div class="col-sm-6">
			<textarea name="pesan" id="pesan" class="default form-control" placeholder="Message"  ></textarea>
		</div>
	</div>


<div class="form-group">
	<div class="col-sm-6">
		<input type="submit" value="<?php echo T_("Submit"); //$simpanBtn;?>"/>
	</div>
</div>
</div>
</form>          
</div>
</section>
</div>

<!--
<div class="col-lg-12 col-md-12 ">

<p><i class="fa fa-table"></i> Funds Transfer History</p>

	<div id="iwrapper">
	<?php include('compose.f.php'); ?>
    </div>

</div>
-->

</div>

</div>


</div>
<script>
    $(document).ready(function() 
    {

       $("#add_post").ajaxForm({
       url:'support.act.php?a=0&id=<?php echo $_SESSION["userid"];?>',
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
				loadpagez('compose.php');					
			}
			else {
				$.messager.alert( errProc(), hasil,"error");
				loadpagez('compose.php');					
				loadingend();}

	   }
       });	


	   	   	   
    });	
</script>
