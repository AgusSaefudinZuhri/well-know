<?php include_once('includes/config.php'); 
$row=mysql_fetch_array(mysql_query("SELECT * FROM g_excrate WHERE id='".$_GET["id"]."'"));
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
    <td style="width: 150px; vertical-align: middle;"><?php echo T_("Country"); ?></td>	
    <td style="vertical-align: middle;">:</td>
    <td><input class="default" id="negara" name="negara" type="text" style="width: 300px;" value="<?php echo $row["negara"];?>" required /></td>
</tr>

<tr>
    <td style="width: 150px; vertical-align: middle;"><?php echo T_("Sell"); ?></td>	
    <td style="vertical-align: middle;">:</td>
    <td><input class="default" id="jual" name="jual" type="text" style="width: 300px;" value="<?php echo number_format( $row["jual"], 2) ;?>" onchange="cNumber(this, '2');" required /></td>
</tr>

<tr>
    <td style="width: 150px; vertical-align: middle;"><?php echo T_("Buy"); ?></td>	
    <td style="vertical-align: middle;">:</td>
    <td><input class="default" id="beli" name="beli" type="text" style="width: 300px;" value="<?php echo number_format( $row["beli"], 2) ;?>" onchange="cNumber(this, '2');" required /></td>
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
       url:'excRate.act.php?a=1&id=<?php echo $_GET["id"];?>',
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
