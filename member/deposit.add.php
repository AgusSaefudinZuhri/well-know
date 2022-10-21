<?php 
	include_once('includes/config.php');
 ?>
 <script type="application/javascript" language="javascript">
</script>  
 <div class="row">
	<div class="col-lg-12">
		<div class="page-header"><?php echo T_("Add Deposit");?></div>
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
<form class="form-horizontal" role="form" id="add_post4" name="add_post4" method="post">

<?php
	$fTxt = "
		SELECT a.*, b.scdeposit, c.ckurs 
		FROM g_jfinance a 
		LEFT JOIN g_gjfinance b ON a.gjfinanceid=b.id 
		LEFT JOIN (
			SELECT x.jfinanceid, GROUP_CONCAT(y.id) ckurs
			FROM g_jfinancekurs x
			LEFT JOIN g_kurs y ON x.kursid = y.id
			GROUP BY x.jfinanceid
			) c ON a.id = c.jfinanceid
		
		WHERE a.id='".$_GET["id"]."'";
	$fQry = mysql_query($fTxt);
	$fRow = mysql_fetch_array($fQry);
  	include( $fRow["scdeposit"] );
	?>
</form>            
                        <form id="my_formX" action="uploadDoc0.php" target="form_target" method="post" enctype="multipart/form-data" style="width:0px;height:0;overflow:hidden">
                            <input id="ximage1" name="ximage1" type="file" onchange="$('#my_formX').submit();this.value='';">
                        </form>     
            
            </div>
            
       </section>
	</div>


</div>


</div>
<script>
	

    $(document).ready(function() 
    {
	


		$('.dtpicker1').datepicker({
			container:	'#period-wrapper1',
		 	format: 	'yyyy-mm-dd'
		});
		
		
       $("#add_post4").ajaxForm({
       url:'deposit.act.php?a=0&id=<?php echo $_SESSION["userid"];?>&fid=<?php echo $_GET["id"];?>',
       type:'post',
	   beforeSubmit: function () {
		loadingstart();
		if (!confirm("<?php echo T_("Confirm to Submit Deposit?"); ?>")) {
			loadingend();
            return false;
        }
		if(!cekzzz()) {clogout(); return false;}
    },
       	success:function(e){
			var hasil = $.trim(e);
		//		alert(hasil);
			if(hasil=="success") {
				$.messager.alert( sucProc(), "<?php echo T_("Your Deposit Request is Submited");?>!!!","info");
				loadpagez('deposit.php');						
			}
			else {
				$.messager.alert( errProc(), hasil,"error");
				loadingend();}

	   }
       });
       $("#my_formX").ajaxForm({
       url:'uploadDoc0.php',
       type:'post',
       success:function(e){
		var dhasil = $.trim(e);
		 // alert(dhasil);
        var xhasil=dhasil.split("||");
		if(xhasil[0]=="success") {
//			alert('proof.e.php?trf='+$('#trfvalue').val()+'pic='+xhasil[1]);
//			loadpagez('proof.e.php?trf='+$('#trfvalue').val()+'&pic='+encodeURI(xhasil[1]) );
			//alert( '#'+$("#acuandoc").val()+': '+xhasil[1] );
			$('#trxdoc').val(xhasil[1]);
			loadingend();
   		}
		else $.messager.alert(errProc(), hasil,"error");
	   }
       });
	   	   	   
    });	
</script>
