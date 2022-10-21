<?php include_once('includes/config.php'); 
$row=mysqli_fetch_array(mysqli_query("SELECT * FROM g_kurs WHERE id='".$_GET["id"]."'"));
?>
<script type="application/javascript" language="javascript">
</script>

<div style="padding: 10px;">
<span style="font-size: 16px; font-weight: bold;"><?php echo strtoupper(T_("Edit Rate")); ?></span>
<form id="add_post" name="add_post" method="post">
<div style="height: 390px; overflow-x: hidden; overflow-y: auto; margin-bottom: 10px;">

<table style="width: 600px;">
<tbody>

<tr>
    <td style="width: 150px; vertical-align: middle;"><?php echo T_("ID"); ?></td>	
    <td style="vertical-align: middle;">:</td>
    <td><input class="default" id="id" name="id" type="text" style="width: 100px;" value="<?php echo $row["id"];?>" readonly /></td>
</tr>

<tr>
    <td style="width: 150px; vertical-align: middle;"><?php echo T_("Currency"); ?></td>	
    <td style="vertical-align: middle;">:</td>
    <td><input class="default" id="nmkurs" name="nmkurs" type="text" style="width: 300px;" value="<?php echo $row["nmkurs"];?>" required /></td>
</tr>

<tr>
    <td style="width: 150px; vertical-align: middle;"><?php echo T_("Sell"); ?></td>	
    <td style="vertical-align: middle;">:</td>
    <td><input class="default" id="excsell" name="excsell" type="text" style="width: 300px;" value="<?php echo number_format( $row["excsell"], 2) ;?>" onchange="cNumber(this, '2');" required /></td>
</tr>

<tr>
    <td style="width: 150px; vertical-align: middle;"><?php echo T_("Buy"); ?></td>	
    <td style="vertical-align: middle;">:</td>
    <td><input class="default" id="excbuy" name="excbuy" type="text" style="width: 300px;" value="<?php echo number_format( $row["excbuy"], 2) ;?>" onchange="cNumber(this, '2');" required /></td>
</tr>


</tbody>
</table>
</div>

<input type="button" value="<?php echo $batalBtn; ?>" onclick="batal()" style="float: right;" />

<input type="submit" value="<?php echo $simpanBtn; ?>" style="float: right; margin-right: 10px;"/>
</form>

</div>

<script>
    $(document).ready(function() 
    {
       $("#add_post").ajaxForm({
       url:'kurs.act.php?a=1&id=<?php echo $_GET["id"];?>',
       type:'post',
	   beforeSubmit: function () {
			loadingstart();
			if (!confirm( addEntry() )) {
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
