<?php include_once('includes/config.php'); ?>
<div id="uwrapper" style="width: 98.5%; margin-left: 10px; padding: 0; padding-top: 10px;">
<div id="iwrapper">
<div class="wrapper">
<form id="add_post" name="add_post" method="post">
<table class="xuser" style="width: 100%; margin: 0;">
<tr class="tHeader">
<td style="width: 50px; text-align:center;"><?php echo T_("No"); ?></td>
<td style="width: 250px; text-align:center;"><?php echo T_("Parameter"); ?></td>
<td style="width: 500px; text-align:center;"><?php echo T_("Value"); ?></td>
</tr>
<?php 
$tqry="SELECT * FROM g_option ORDER BY id";


$qry=mysqli_query($tqry); //  echo $tqry.$limit;

$x=1;

while($row=mysqli_fetch_array($qry)) { ?>
<tr class="tContent<?php if(($x-1)%2) echo ' genap';?>" >
<td style="text-align:center; vertical-align: middle;"><?php echo $x; ?></td>
<td style="text-align:left; vertical-align: middle;"><?php echo T_($row["optheader"]); ?></td>
<td style="text-align:left;">
<input type="text" id="t<?php echo $row["id"]; ?>" name="t<?php echo $row["id"]; ?>" class="default" value="<?php if($row["nstatus"]=='1') echo number_format($row["optvalue"],$row["ndec"]); else echo $row["optvalue"]; ?>" style="width: 450px; padding: 5px;" <?php if($row["nstatus"]=='1') { ?> onchange="cNumber(this, '2')"<?php } ?> />
<input type="hidden" id="n<?php echo $row["id"]; ?>" name="n<?php echo $row["id"]; ?>" value="<?php echo $row["nstatus"]; ?>" />

</td>

</tr>
<?php $x++; } ?>
</table>
<input type="submit" value="<?php echo $simpanBtn; ?>" style="float: right; margin-top: 10px; margin-bottom: 20px; margin-right: 5px; font-size: 14px;"/><br/><br/>
</form>

</div>
</div>
</div>

<script>
    $(document).ready(function() 
    {
       $("#add_post").ajaxForm({
       url:'umum.act.php',
       type:'post',
	   beforeSubmit: function () {
		   loadingstart();
			if (!confirm("<?php echo T_("Konfirmasi Update Konfigurasi Umum?");?>")) {
				return false;
			}
			if(!cekzzz()) {clogout(); return false;}
    },
       success:function(e){
		var hasil = $.trim(e);
//		alert(hasil);
        if(hasil=="success") {
			$.messager.alert( sucProc(), dataDisimpan(), 'info' );
			loadingend();
//			batal();
									
   		}
		else { $.messager.alert( errProc(), hasil, "error" ); loadingend(); }
	   }
       });
    });
</script>
