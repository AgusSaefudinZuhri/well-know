<?php include_once('includes/config.php');
$row=mysqli_fetch_array(mysqli_query("
	SELECT a.*, IFNULL( b.cid, '0' ) cid
	FROM g_member a
	LEFT JOIN ( SELECT userid, count(id) cid FROM g_trfproof WHERE status = '0' GROUP BY userid ) b ON a.userid=b.userid
	WHERE a.userid='".$_SESSION["userid"]."'
	"));
 ?>
<script type="application/javascript" language="javascript">
</script>  
 <div class="row">
	<div class="col-lg-12">
		<div class="page-header"><?php echo T_("Proof Upload");?></div>
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
            <?php echo T_("Proof Upload");?>
        </header>
		<div class="panel-body bio-graph-info">

<?php if( $row["staktif"]=='0' and $row["flogin"]=='0' and $row["cid"]=='0' ) { ?>

<form class="form-horizontal" role="form"  id="add_post" name="add_post" method="post">

<div class="col-sm-12">   


<div class="form-group">
	<label class="col-sm-4 control-label"><?php echo T_("Transfer Value");?></label>
    <div class="col-sm-8">
        <input class="default form-control"  id="trfvalue" name="trfvalue" type="text" onchange="cNumber(this,'2')"  value="<?php //if(isset($_GET["trf"])) echo number_format($_GET["trf"],2);?>" required />
	</div>
</div>

<div class="form-group">
	<label class="col-sm-4 control-label"><?php echo T_("Proof File");?></label>
    <div class="col-sm-8">
    <div class="input-group mb-md">
		<input type="text" class="form-control" id="proofdoc" name="proofdoc" value="<?php //if(isset($_GET["pic"])) echo $_GET["pic"]; ?>" readonly="readonly" >
        	<span class="input-group-btn">
			<button class="btn btn-warning" type="button" onclick="$('#acuandoc').val('proofdoc');$('#ximage1').click();">Upload</button>
            </span>
     </div>
	</div>
</div>

<div class="form-group">
	<label class="col-sm-4 control-label"><?php echo T_("ID Card");?></label>
    <div class="col-sm-8">
    <div class="input-group mb-md">
		<input type="text" class="form-control" id="ktpdoc" name="ktpdoc" value="<?php //if(isset($_GET["pic"])) echo $_GET["pic"]; ?>" readonly="readonly" >
        	<span class="input-group-btn">
			<button class="btn btn-warning" type="button" onclick="$('#acuandoc').val('ktpdoc');$('#ximage1').click();">Upload</button>
            </span>
     </div>
	</div>
</div>

<div class="form-group">
	<label class="col-sm-4 control-label"><?php echo T_("Wallet Address");?></label>
    <div class="col-sm-8">
    <div class="input-group mb-md">
		<input type="text" class="form-control" id="walletdoc" name="walletdoc" value="<?php //if(isset($_GET["pic"])) echo $_GET["pic"]; ?>" readonly="readonly" >
        	<span class="input-group-btn">
			<button class="btn btn-warning" type="button" onclick="$('#acuandoc').val('walletdoc'); $('#ximage1').click();">Upload</button>
            </span>
     </div>
	</div>
</div>

<div id="ewpassword" class="form-group">
		<label class="col-sm-4 control-label"><?php echo T_("Security Password"); ?> <span style="color: #FF0000;"> * </span></label>
		<div class="col-sm-8">
			<input type="password" name="password2" id="password2" class="default form-control"  required />
		</div>
	</div>


<div class="form-group">

	<input type="hidden" id="acuandoc">

	<div class="col-sm-offset-4 col-sm-8">
		<input type="submit" value="<?php echo $simpanBtn;?>"/>
	</div>
</div>
</div>
</form>          
                        <form id="my_formX" action="uploadDoc0.php" target="form_target" method="post" enctype="multipart/form-data" style="width:0px;height:0;overflow:hidden">
                            <input id="ximage1" name="ximage1" type="file" onchange="$('#my_formX').submit();this.value='';">
                        </form>     
<?php } else 
	if($row["cid"]>'0') echo '<b>Notification: We are verifying your Proofs.</b>'; 

else { ?>
<b>Notification: Your proofs are already approved.</b>
<?php } ?>
</div>
</section>
</div>

</div>

</div>


</div>

<script type="application/javascript" language="javascript" >
    $(document).ready(function() 
    {
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
			$('#'+$("#acuandoc").val()).val(xhasil[1]);
			loadingend();
   		}
		else $.messager.alert("Kesalahan proses", hasil,"error");
	   }
       });
	   	   	   
    });	
</script>	
<script type="application/javascript" language="javascript" >    $(document).ready(function() 
    {

       $("#add_post").ajaxForm({
       url:'profile.act.php?a=100&id=<?php echo $_SESSION["userid"];?>',
       type:'post',
	   beforeSubmit: function () {
		loadingstart();
		if (!confirm("<?php echo T_("Upload Proof Document?"); ?>")) {
			loadingend();
            return false;
        }
		if( $("#proofdoc").val()=='' ) {
			$.messager.alert( errProc(), "<?php echo T_("Proof Document is empty");?>!!!","error");
			loadingend();
			return false;	
		}
		if( $("#ktpdoc").val()=='' ) {
			$.messager.alert( errProc(), "<?php echo T_("ID Card Document is empty");?>!!!","error");
			loadingend();
			return false;	
		}
		if( $("#walletdoc").val()=='' ) {
			$.messager.alert( errProc(), "<?php echo T_("Wallet Address Document is empty");?>!!!","error");
			loadingend();
			return false;	
		}
		   
		if(!cekzzz()) {clogout(); return false;}
    },
       	success:function(e){
			var hasil = $.trim(e);
		//		alert(hasil);
			if(hasil=="success") {
				$.messager.alert( sucProc(), "<?php echo T_("All Documents are Uploaded");?>!!!","info");
				loadpagez('proof.e.php');					
			}
			else {
				$.messager.alert( errProc(), hasil,"error");
				loadpagez('proof.e.php');					
				loadingend();}

	   		}
       });	

    });	
</script>