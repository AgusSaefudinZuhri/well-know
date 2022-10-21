<?php include_once('includes/config.php'); 

function get_option($id, $x) {
	$ncek=mysqli_fetch_array(mysqli_query("SELECT * FROM g_huser WHERE grupid='".$id."' AND pmeter='".$x."'"));
	return $ncek["pvalue"];
}

$row=mysqli_fetch_array(mysqli_query("SELECT * FROM g_guser WHERE id='".$_GET["id"]."'"));
?>
<script type="application/javascript" language="javascript">
</script>

<div style="padding: 10px;">
<span style="font-size: 16px; font-weight: bold;"><?php echo strtoupper(T_("Edit Access Right")); ?></span>
<form id="add_post" name="add_post" method="post">
<div style="height: 375px; overflow-x: hidden; overflow-y: auto;">

<table class="xuser" style="width: 800px;">
<tbody>
<tr><td style="width: 200px; vertical-align: middle;"><?php echo T_("Group"); ?></td>	
<td style="vertical-align: middle;">:</td>
<td><?php echo $row["nama"];?></td></tr>

<!--
<tr>
    <td style="width: 200px; vertical-align: middle;"><?php echo T_("ePIN"); ?></td>	
    <td style="vertical-align: middle;">:</td>
    <td>
    	<input class="default" id="x1" name="x1" type="checkbox" <?php if(get_option($_GET["id"],'x1')=='1') echo 'checked';?> value="yes"/>
    </td>
</tr>
-->
<tr>
    <td style="width: 200px; vertical-align: middle;"><?php echo T_("Member"); ?></td>	
    <td style="vertical-align: middle;">:</td>
    <td>
    	<input class="default" id="x2" name="x2" type="checkbox" <?php if(get_option($_GET["id"],'x2')=='1') echo 'checked';?> value="yes"/>
    </td>
</tr>

<tr>
    <td style="width: 200px; vertical-align: middle;"><?php echo T_("Withdrawal"); ?></td>	
    <td style="vertical-align: middle;">:</td>
    <td>
    	<input class="default" id="x4" name="x4" type="checkbox" <?php if(get_option($_GET["id"],'x4')=='1') echo 'checked';?> value="yes"/>
    </td>
</tr>

<tr><td style="width: 200px; vertical-align: middle;"><?php echo T_("Ledger"); ?></td>	
<td style="vertical-align: middle;">:</td>
<td><input class="default" id="x5" name="x5" type="checkbox" <?php if(get_option($_GET["id"],'x5')=='1') echo 'checked';?> value="yes"/></td></tr>

<!--

-->

<tr><td style="width: 200px; vertical-align: middle;"><?php echo T_("Admin"); ?></td>	
<td style="vertical-align: middle;">:</td>
<td><input class="default" id="x7" name="x7" type="checkbox" <?php if(get_option($_GET["id"],'x7')=='1') echo 'checked';?> value="yes"/></td></tr>

<tr><td style="width: 200px; vertical-align: middle;"><?php echo T_("Edit Member"); ?></td>	
<td style="vertical-align: middle;">:</td>
<td><input class="default" id="x6" name="x6" type="checkbox" <?php if(get_option($_GET["id"],'x6')=='1') echo 'checked';?> value="yes"/></td></tr>


<tr><td style="width: 200px; vertical-align: middle;"><?php echo T_("Approve Member WD"); ?></td>	
<td style="vertical-align: middle;">:</td>
<td><input class="default" id="x3" name="x3" type="checkbox" <?php if(get_option($_GET["id"],'x3')=='1') echo 'checked';?> value="yes"/></td></tr>

<tr><td style="width: 200px; vertical-align: middle;"><?php echo T_("Approve Leader WD"); ?></td>	
<td style="vertical-align: middle;">:</td>
<td><input class="default" id="x8" name="x8" type="checkbox" <?php if(get_option($_GET["id"],'x8')=='1') echo 'checked';?> value="yes"/></td></tr>

<tr><td style="width: 200px; vertical-align: middle;"><?php echo T_("View Password"); ?></td>	
<td style="vertical-align: middle;">:</td>
<td><input class="default" id="x9" name="x9" type="checkbox" <?php if(get_option($_GET["id"],'x9')=='1') echo 'checked';?> value="yes"/></td></tr>

<!--<tr><td style="width: 200px; vertical-align: middle;">Laporan</td>	
<td style="vertical-align: middle;">:</td>
<td><input class="default" id="x12" name="x12" type="checkbox" <?php if(get_option($_GET["id"],'x8')=='1') echo 'checked';?> value="yes"/><td>
</td></tr>-->

</tbody>
</table>
</div>
<br/>
<input type="button" value="<?php echo $batalBtn; ?>" onclick="batal()" style="float: right;" />

<input type="submit" value="<?php echo $simpanBtn; ?>" style="float: right; margin-right: 10px;"/>
</form>
</div>

<script>
    $(document).ready(function() 
    {
       $("#add_post").ajaxForm({
       url:'huser.act.php?id=<?php echo $_GET["id"];?>',
       type:'post',
	   beforeSubmit: function () {
			loadingstart();
			if (!confirm("<?php echo T_("Confirm to Update of Access Right's Information?"); ?>")) {
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
