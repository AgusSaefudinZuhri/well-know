<?php 
include_once('includes/config.php');

$txt	= "
		SELECT 
			a.*,
			b.nmjfinance,
			b.thumblink,
			c.excbuy
		FROM g_wmt4 a
		LEFT JOIN g_jfinance b ON a.jfinanceid=b.id
		LEFT JOIN g_kurs c ON a.kursid = c.id
		WHERE a.id = '".$_GET["id"]."'
			";
//echo $txt;
$row	= mysqli_fetch_array(mysqli_query($txt));


?>

<script type="application/javascript" language="javascript">
function chValue() {
	var fintrxvalue	= parseFloat(($("#fintrxvalue").val()).replace(/\,/g, ''));
	var kursvalue	= parseFloat(($("#kursvalue").val()).replace(/\,/g, ''));
	var trxvalue	= fintrxvalue * kursvalue;
	$("#trxvalue").val(trxvalue);
	$("#trxvalue").trigger("change");
	
}
</script>

<style>
.dUser td { padding: 5px;  }
</style>

<div style="padding: 10px;">
<span style="font-size: 16px; font-weight: bold;"><?php echo strtoupper(T_("Approve Withdrawal")); ?></span>
<form id="add_post" name="add_post" method="post">
<div style="height: 400px; overflow-x: hidden; overflow-y: auto; margin-bottom: 5px;">

<table class="dUser" style="width: 540px;">
<tr>
	<td colspan="3" style="text-align: center;"><img src="<?php echo $row["thumblink"]; ?>" width="30%"></td>	
</tr>
<tr>
	<td colspan="3" style="text-align: center;"><?php echo $row["nmjfinance"]; ?></td>	
</tr>

<tr>
	<td style="width: 150px; vertical-align: middle;"><?php echo T_("UserID"); ?></td>	
	<td style="vertical-align: middle;">:</td>
	<td><?php echo $row["userid"]; ?></td>
</tr>

<tr>
	<td style="width: 150px; vertical-align: middle;"><?php echo T_("MT4 Account"); ?></td>	
	<td style="vertical-align: middle;">:</td>
	<td><?php echo $row["extakunid"]; ?></td>
</tr>

<tr>
	<td style="width: 150px; vertical-align: middle;"><?php echo T_("Value"); ?> (<?php echo $dcurrency;?>)</td>	
	<td style="vertical-align: middle;">:</td>
	<td><input type="text" class="default" id="fintrxvalue"  name="fintrxvalue" value="<?php echo number_format( $row["fintrxvalue"], 2);?>" onchange="cNumber(this,'2');" readonly /></td>
</tr>


<tr>
	<td style="width: 150px; vertical-align: middle;"><?php echo T_("Exchange Value"); ?></td>	
	<td style="vertical-align: middle;">:</td>
	<td><input type="text" class="default" id="kursvalue"  name="kursvalue" value="<?php echo number_format( $row["excbuy"] );?>" onchange="cNumber(this,'2');chValue();" required/></td>
</tr>

<tr>
	<td style="width: 150px; vertical-align: middle;"><?php echo T_("Currency"); ?></td>	
	<td style="vertical-align: middle;">:</td>
	<td><?php echo $row["kursid"]; ?></td>
</tr>

<tr>
	<td style="width: 150px; vertical-align: middle;"><?php echo T_("Value"); ?></td>	
	<td style="vertical-align: middle;">:</td>
	<td><input type="text" class="default" id="trxvalue"  name="trxvalue" value="<?php echo number_format( $row["fintrxvalue"]*$row["excbuy"], 2);?>" onchange="cNumber(this,'2');" readonly /></td>
</tr>


<tr>
	<td style="width: 150px; vertical-align: middle;"><?php echo T_("Member Account"); ?></td>	
	<td style="vertical-align: middle;">:</td>
	<td><?php echo $row["yourbank"]; ?></td>
</tr>


</table> <br/><br/>
</div>

<input type="button" value="<?php echo $batalBtn; ?>" onclick="batal()" style="float: right;" />

<input type="submit" value="<?php echo T_("Approve"); ?>" style="float: right; margin-right: 10px;"/>
</form>
</div>

<script>
    $(document).ready(function() 
    {

       $("#add_post").ajaxForm({
       url:'wdmt4.act.php?a=0&id=<?php echo $_GET["id"];?>&mid=<?php echo $row["extakunid"];?>',
       type:'post',
	   beforeSubmit: function () {
			loadingstart();
			if (!confirm("<?php echo T_("Confirm to Approve?");?>")) {
				loadingend();
				return false;
			}

			if(!cekzzz()) {clogout(); return false;}
    },
       success:function(e){
		var hasil = $.trim(e);
//		alert(hasil);
        if(hasil=="success") {
			$.messager.alert( sucProc(), dataDisimpan(), 'info');
			cari('');
			batal();
			loadingend();						
   		}
		else {$.messager.alert( errProc(), hasil,"error");loadingend();}
	   }
       });
    });
</script>
