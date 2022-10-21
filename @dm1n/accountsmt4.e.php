<?php 
include_once('includes/config.php');

$txt	= "
		SELECT a.*
		FROM g_member a
		WHERE a.userid = '".$_GET["id"]."'
			";
//echo $txt;
$row	= mysqli_fetch_array(mysqli_query($txt));


?>

<script type="application/javascript" language="javascript">

</script>

<style>
.dUser td { padding: 5px;  }
</style>

<div style="padding: 10px;">
<span style="font-size: 16px; font-weight: bold;"><?php echo strtoupper(T_("Create MT4 Account")); ?></span>
<form id="add_post" name="add_post" method="post">
<div style="height: 400px; overflow-x: hidden; overflow-y: auto; margin-bottom: 5px;">

<table class="dUser" style="width: 540px;">
<tr>
	<td style="width: 150px; vertical-align: middle;"><?php echo T_("UserID"); ?></td>	
	<td style="vertical-align: middle;">:</td>
	<td><?php echo $row["userid"]; ?></td>
</tr>

<tr>
	<td style="width: 150px; vertical-align: middle;"><?php echo T_("Full Name"); ?></td>	
	<td style="vertical-align: middle;">:</td>
	<td><?php echo $row["nmmember"]; ?></td>
</tr>


<tr>
	<td style="width: 150px; vertical-align: middle;"><?php echo T_("Group"); ?></td>	
	<td style="vertical-align: middle;">:</td>
	<td>		<select class="default " id="regGroup" name="regGroup" type="text"  required >
			<!--<option value="EGG_REG" selected>EGG_REG</option>-->
			<option value="UFF_REG" selected>UFF_REG</option>

				</select>
</td>
</tr>

<tr>
	<td style="width: 150px; vertical-align: middle;"><?php echo T_("Full Name"); ?></td>	
	<td style="vertical-align: middle;">:</td>
	<td>		<select class="default " id="leverage" name="leverage" type="text"  required >
			<option value="50" selected>1 : 50</option>
			<option value="100" >1 : 100</option>
			<option value="200" >1 : 200</option>
			<option value="400" >1 : 400</option>
			<option value="500" >1 : 500</option>
		</select>
</td>
</tr>

<tr>
	<td style="width: 150px; vertical-align: middle;"><?php echo T_("New Account Password"); ?></td>	
	<td style="vertical-align: middle;">:</td>
	<td><input class="default " id="npass" name="npass" type="password" required /></td>
</tr>


<tr>
	<td style="width: 150px; vertical-align: middle;"><?php echo T_("Confirm Passwor"); ?></td>	
	<td style="vertical-align: middle;">:</td>
	<td><input class="default " id="kpass" name="kpass" type="password" required /></td>
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
       url:'accountsmt4.act.php?a=0&id=<?php echo $_GET["id"];?>',
       type:'post',
	   beforeSubmit: function () {
			loadingstart();
		if (!confirm("<?php echo T_("Confirm to Open MT4 Account?"); ?>")) {
			loadingend();
            return false;
        }
		if($("#npass").val()!=$("#kpass").val()) {
			$.messager.alert( errProc(), "<?php echo T_("Passwords are not matched.");?>!!!","error");
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
