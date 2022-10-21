<?php include_once('includes/config.php');
$row=mysqli_fetch_array(mysqli_query("
	SELECT a.*, b.nmjpackage
	FROM g_member a
	LEFT JOIN g_jpackage b ON a.jpackage = b.id
	WHERE a.userid='".$_SESSION["userid"]."'
	"));

$funds=mysqli_fetch_array(mysqli_query("
	SELECT a.*, SUM( IF( a.jtransaksi='0', a.trxvalue,'0' ) ) - SUM( IF( a.jtransaksi='1', a.trxvalue,'0' ) ) jnilai, SUM( IF( a.jtransaksi='0', a.idrvalue,'0' ) ) - SUM( IF( a.jtransaksi='1', a.idrvalue,'0' ) ) ijnilai
	FROM g_wfund a
	WHERE a.userid='".$_SESSION["userid"]."' AND a.status IN ('0','1')
	"));

 ?>
<script type="application/javascript" language="javascript">
function pilihPaket( x ) {

}

function kValue( xx, x, y ) {

}
</script>  
 <div class="row">
	<div class="col-lg-12">
		<div class="page-header"><?php echo T_("Buy Package");?></div>
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
            <?php echo T_("Buy Package");?>
        </header>
		<div class="panel-body bio-graph-info">

<?php if( $row["jpackage"]=='0' ) { ?>

<form class="form-horizontal" role="form"  id="add_post" name="add_post" method="post">

<div class="col-sm-12">   


<div class="form-group">
	<label class="col-sm-4 control-label"><?php echo T_("Available Funds");?></label>
    <div class="col-sm-8">
        <label class="col-sm-12 control-label" style="text-align: left;"><?php echo $syscurrency." ".number_format( $funds["jnilai"], 2);?></label>
	</div>
</div>

<div class="form-group">
	<label class="col-sm-4 control-label"><?php echo T_("Packages");?></label>
    <div class="col-sm-8">
   	<?php 
		$paketTxt = "SELECT *, ( hargavl * 1 ) xval  FROM g_jpackage WHERE status='1' ORDER BY xval";
		$paketQry = mysqli_query( $paketTxt );
		while( $paketRow = mysqli_fetch_array( $paketQry ) ) { ?>
   
        <div class="radio col-sm-12">
			<label class="col-sm-12">
            <input type="radio" name="jpackage" id="jpackage<?php echo $paketRow["id"];?>" value="<?php echo $paketRow["id"];?>" onchange="pilihPaket('<?php echo $paketRow["id"];?>')" <?php if($paketRow["xval"]>$funds["jnilai"]) echo 'disabled="disabled"'; else echo 'required'; ?> >
            <img src="<?php echo $paketRow["iconlink"]; ?>" style="height: 25px; display: inline-block; vertical-align: middle;" />&nbsp;<?php echo $paketRow["nmjpackage"];?>
            </label>
            
            <div class="col-sm-6" style="display:none;">
            <input type="text" class="form-control paketOpt" id='kvalue_<?php echo $paketRow["id"];?>' name="kvalue[<?php echo $paketRow["id"];?>]" value="<?php echo number_format($paketRow["hargavl"]);?>"  readonly="readonly"  />
            </div>
            
		</div>
        
        <?php } ?>
	
    </div>
</div>

<div id="ewpassword" class="form-group">
		<label class="col-sm-4 control-label"><?php echo T_("Security Password"); ?> <span style="color: #FF0000;"> * </span></label>
		<div class="col-sm-8">
			<input type="password" name="password2" id="password2" class="default form-control"  required />
		</div>
	</div>


<div class="form-group">
	<div class="col-sm-offset-4 col-sm-8">
		<input type="submit" value="<?php echo $simpanBtn;?>"/>
	</div>
</div>
</div>
</form>          
<?php } 

else { ?>
		<div class="available-funds"><b>Available Funds :  <?php echo $dcurrency." ".number_format( $funds["ijnilai"], 2);?></b></div>
		<div class="available-package"><b> Current package is <?php echo $row["nmjpackage"];?></b></div>
		<!--
		<div class="available-package"><b> Contract Value is <?php echo $syscurrency." ".number_format( $row["kontrakvalue"] );?></b></div><br/>
-->
<?php } ?>
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
       url:'profile.act.php?a=4&id=<?php echo $_SESSION["userid"];?>',
       type:'post',
	   beforeSubmit: function () {
		loadingstart();
		if (!confirm("<?php echo T_("Confirm to Buy Package?"); ?>")) {
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
				loadpagez('package.php');					
			}
			else {
				$.messager.alert( errProc(), hasil,"error");
				loadpagez('package.php');					
				loadingend();}

	   }
       });	


	   	   	   
    });	
</script>
