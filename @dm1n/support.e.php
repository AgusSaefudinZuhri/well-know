<?php include_once('includes/config.php'); 
	$pRow = mysql_fetch_array( mysql_query( "SELECT * FROM g_tiket WHERE id='".$_GET["id"]."'" ) );
//	$updQry = mysql_query( "UPDATE" );
?>
<script type="application/javascript" language="javascript">
</script>

<div style="padding: 10px;">
<span style="font-size: 16px; font-weight: bold;"><?php echo strtoupper(T_("Reply Messages")); ?></span>
<form id="add_post" name="add_post" method="post">
<div style="height: 390px; overflow-x: hidden; overflow-y: auto; margin-bottom: 10px;">

<table class="xuser" style="width: 100%; min-width: 300px;">

<tr class="tContent" style="font-style: bold;" >
<!--<td style="text-align:center;"><?php echo $x; ?></td> -->
<td style="text-align:left; width: 100px;"><?php echo "UserID";?></td>
<td style="text-align:center; width: 10px;">:</td>
<td style="text-align:left;"><?php echo $pRow["userid"];?></td>
</tr>

<tr class="tContent" style="font-style: bold;" >
<!--<td style="text-align:center;"><?php echo $x; ?></td> -->
<td style="text-align:left; width: 100px;"><?php echo "Subject";?></td>
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

$qry0=mysql_query($tqry);
$jmlRow = mysql_num_rows($qry0);
$pages=ceil( $jmlRow/$perpage);

$qry=mysql_query($tqry);

//echo $tqry.$limit;

//if(isset($_GET["pg"])) $x=($_GET["pg"]-1)*$perpage+1; else 

$x=1;

while($row=mysql_fetch_array($qry)) { ?>
<tr class="tContent <?php if(($x)%2) echo 'genap';?>" style=" <?php  if($pRow["stupdate"]=='0' and $x==$jmlRow ) echo 'font-weight: bold; ';?>" >
<!--<td style="text-align:center;"><?php echo $x; ?></td> -->
<td style="text-align:left; width: 100px;"><?php echo $row["dari"];?></td>
<td style="text-align:center; width: 10px;">:</td>
<td style="text-align:left;"><?php echo $row["pesan"];?></td>
</tr>
<?php $x++; } ?>
</table>
<br/>

<table style="width: 600px;">
<tbody>

<tr>
    <td style="width: 100px; vertical-align: top;"><?php echo T_("Message"); ?></td>	
    <td style="vertical-align: top; width: 10px; text-align: center;"></td>
    <td><textarea class="default" id="pesan" name="pesan" style="width: 250px;" required ></textarea></td>
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
       url:'support.act.php?a=1&id=<?php echo $_GET["id"];?>',
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
