<?php include_once('includes/config.php');
	$pRow = mysqli_fetch_array( mysqli_query( "SELECT * FROM g_tiket WHERE id='".$_GET["id"]."'" ) );
 ?>
<script type="application/javascript" language="javascript">
/*
function cari(x) {
	loadingstart();	
	if(cekzzz()) {
		if(x=='') x=$('#pg').val(); else x=x;		
		var	fCari	= encodeURI( 'compose.f.php?pg='+x );		
		$('#iwrapper').load( fCari, function () {loadingend();});
	}
	else  clogout ();
}
*/
</script>

 <div class="row">
	<div class="col-lg-12">
		<div class="page-header"><?php echo T_("Messages");?></div>
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
<table class="xuser" style="width: 100%; min-width: 300px;">

<tr class="tContent" style="font-style: bold;" >
<!--<td style="text-align:center;"><?php echo $x; ?></td> -->
<td style="text-align:left; width: 150px;"><?php echo "Subject";?></td>
<td style="text-align:center; width: 10px;">:</td>
<td style="text-align:left;"><?php echo $pRow["judul"];?></td>
</tr>


<?php 
$tqry="
	SELECT a.*
	FROM g_tiketdt a
	WHERE  a.tiketid='".$_GET["id"]."' 
	ORDER BY a.id ASC
	";

$qry0=mysqli_query($tqry);
$jmlRow = mysqli_num_rows($qry0);
$pages=ceil( $jmlRow/$perpage);

$qry=mysqli_query($tqry);

//echo $tqry.$limit;

//if(isset($_GET["pg"])) $x=($_GET["pg"]-1)*$perpage+1; else 

$x=1;

while($row=mysqli_fetch_array($qry)) { ?>
<tr class="tContent <?php if(($x)%2) echo 'genap';?>" style=" <?php  if($pRow["stupdate"]=='0' and $x==$jmlRow ) echo 'font-weight: bold; ';?>" >
<!--<td style="text-align:center;"><?php echo $x; ?></td> -->
<td style="text-align:left; width: 150px;"><?php echo $row["dari"];?></td>
<td style="text-align:center; width: 10px;">:</td>
<td style="text-align:left;"><?php echo $row["pesan"];?></td>
</tr>
<?php $x++; } ?>
</table>
<br/><br/>
</div>

<div class="col-lg-12 col-md-12 ">

<form class="form-horizontal" role="form"  id="add_post" name="add_post" method="post">

<div class="col-sm-12">   

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
       url:'support.act.php?a=1&id=<?php echo $_SESSION["userid"];?>&idx=<?php echo $_GET["id"];?>',
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
				loadpagez('inboxdt.php?id=<?php echo $_GET["id"];?>');					
			}
			else {
				$.messager.alert( errProc(), hasil,"error");
				loadpagez('inboxdt.php?id=<?php echo $_GET["id"];?>');					
				loadingend();}

	   }
       });	


	   	   	   
    });	
</script>
