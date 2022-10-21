<?php 
include_once('includes/config.php');

$txt	= "
		SELECT a.*, b.nmnegara
		FROM g_member a
		LEFT JOIN g_negara b ON a.negara = b.id
		WHERE a.userid = '".$_GET["id"]."'
			";
//echo $txt;
$row	= mysql_fetch_array(mysql_query($txt));


?>

<script type="application/javascript" language="javascript">

</script>

<style>
.dUser td { padding: 5px;  }
</style>

<div style="padding: 10px;">
<span style="font-size: 16px; font-weight: bold;"><?php echo strtoupper(T_("Verify Member")); ?></span>
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
	<td style="width: 150px; vertical-align: middle;"><?php echo T_("Birth Date"); ?></td>	
	<td style="vertical-align: middle;">:</td>
	<td><?php echo date('d M Y', strtotime( $row["tgllahir"] ) ); ?></td>
</tr>

<tr>
	<td style="width: 150px; vertical-align: middle;"><?php echo T_("Email"); ?></td>	
	<td style="vertical-align: middle;">:</td>
	<td><?php echo $row["email"]; ?></td>
</tr>

<tr>
	<td style="width: 150px; vertical-align: middle;"><?php echo T_("Mobile Phone"); ?></td>	
	<td style="vertical-align: middle;">:</td>
	<td><?php echo $row["nohp1"]; ?></td>
</tr>

<tr>
	<td style="width: 150px; vertical-align: middle;"><?php echo T_("ID Card/Passport"); ?></td>	
	<td style="vertical-align: middle;">:</td>
	<td><?php echo $row["noktp"]; ?></td>
</tr>

<tr>
	<td style="width: 150px; vertical-align: middle;"><?php echo T_("Full Address"); ?></td>	
	<td style="vertical-align: middle;">:</td>
	<td><?php echo $row["alamat"]; ?></td>
</tr>

<tr>
	<td style="width: 150px; vertical-align: middle;"><?php echo T_("City"); ?></td>	
	<td style="vertical-align: middle;">:</td>
	<td><?php echo $row["kota"]; ?></td>
</tr>

<tr>
	<td style="width: 150px; vertical-align: middle;"><?php echo T_("Postal Code"); ?></td>	
	<td style="vertical-align: middle;">:</td>
	<td><?php echo $row["kodepos"]; ?></td>
</tr>

<tr>
	<td style="width: 150px; vertical-align: middle;"><?php echo T_("State"); ?></td>	
	<td style="vertical-align: middle;">:</td>
	<td><?php echo $row["propinsi"]; ?></td>
</tr>

<tr>
	<td style="width: 150px; vertical-align: middle;"><?php echo T_("Country"); ?></td>	
	<td style="vertical-align: middle;">:</td>
	<td><?php echo $row["nmnegara"]; ?></td>
</tr>


<tr>
	<td style="width: 150px; vertical-align: top;"><?php echo T_("ID Card Doc."); ?></td>	
	<td style="vertical-align: top;">:</td>
	<td>
		<small>( Double Click on Image to View Larger )</small><br/><br/>
		<a href="javascript: void(0);" ondblclick="window.open('<?php echo $row["ktplink"]; ?>','_blank');"><img src="<?php echo $row["ktplink"]; ?>" style="width: 350px;" ></a>
		</td>
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
       url:'member.proof.act.php?a=0&x=<?php echo $_GET["id"];?>',
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
