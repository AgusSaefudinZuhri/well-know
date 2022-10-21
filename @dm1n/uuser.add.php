<?php include_once('includes/config.php'); 
?>
<script type="application/javascript" language="javascript">
</script>

<div style="padding: 10px;">
<span style="font-size: 16px; font-weight: bold;"><?php echo strtoupper(T_("Add User")); ?></span>
<form id="add_post" name="add_post" method="post">
<div style="height: 400px;">

<table style="width: 800px;">
<tbody>

<tr>
    <td style="width: 100px; vertical-align: middle;"><?php echo T_("Name"); ?></td>	
    <td style="vertical-align: middle;">:</td>
    <td><input class="default" id="nama" name="nama" type="text" style="width: 300px;" required /><td>
</tr>

<tr>
    <td style="width: 100px; vertical-align: middle;"><?php echo T_("UserName");?></td>	
    <td style="vertical-align: middle;">:</td>
    <td><input class="default" id="username" name="username" type="text" style="width: 300px;" required /><td>
</tr>

<tr>
    <td style="width: 100px; vertical-align: middle;"><?php echo T_("Password");?></td>	
    <td style="vertical-align: middle;">:</td>
    <td><input class="default" id="password" name="password" type="password" style="width: 300px;" required /><td>
</tr>


<tr>
    <td style="width: 150px; vertical-align: middle;"><?php echo T_("Group");?></td>
    <td style="vertical-align: middle;">:</td>
    <td>
        <select id="grup" name="grup" class="default" style="width: 150px;" required >
        <option value="" disabled="disabled" selected="selected"></option>
        <?php 
            $qrz=mysql_query("SELECT * FROM g_guser WHERE status='1' AND id!='0' ORDER BY nama");
            while($zrow=mysql_fetch_array($qrz)) { ?>
        
            <option value="<?php echo $zrow["id"];?>" ><?php echo $zrow["nama"];?></option>
        
        <?php } ?>
        
        </select>
    </td>
</tr>

</tbody>
</table>
</div>

<input type="button" value="<?php echo $batalBtn;?>" onclick="batal()" style="float: right;" />

<input type="submit" value="<?php echo $simpanBtn;?>" style="float: right; margin-right: 10px;"/>
</form>
</div>

<script>
    $(document).ready(function() 
    {
       $("#add_post").ajaxForm({
       url:'uuser.act.php?a=0',
       type:'post',
	   beforeSubmit: function () {
		loadingstart();
		if (!confirm("<?php echo T_("Confirm to Add User?");?>")) {
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
