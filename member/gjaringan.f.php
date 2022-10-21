<?php 

	include_once('includes/config.php'); 

?>
<input type="hidden" id="pg" value="<?php if(isset($_GET["pg"])) echo $_GET["pg"]; else echo "1";?>" />
<div class="mwrapper" style="padding-top: 5px;">
<table class="xuser" style="width: 100%; min-width: 300px;">
<tr class="tHeader" >
<td rowspan="2" style="width: 100px; text-align:center;vertical-align: middle;"><?php echo T_("Level");?></td>
<td colspan="3" style="width: 150px; text-align:center;vertical-align: middle;"><?php echo T_("#Member");?></td>
<!--<td rowspan="2" style="width: 100px; text-align:center;vertical-align: middle;"><?php echo T_("Total Value");?></td>
<td rowspan="2" style="width: 100px; text-align:center;vertical-align: middle;"><?php echo T_("Comission Received");?></td>-->
</tr>

<tr class="tHeader" >
<td style="width: 50px; text-align:center;"><?php echo T_("Active");?></td>
<td style="width: 50px; text-align:center;"><?php echo T_("Not Active");?></td>
<td style="width: 50px; text-align:center;"><?php echo T_("Total");?></td>
</tr>

<?php 
$tqry="
	SELECT 
		a.unplid,
		a.unplreverse,
		COUNT(a.userid) cid,
		SUM(IF(b.staktif='1' , '1','0')) cxid
	FROM g_unilevel a
	LEFT JOIN g_member b ON a.userid = b.userid
	WHERE a.unplid =  '".$_SESSION["userid"]."'  AND b.status IN ('0','1')
	GROUP BY a.unplid, a.unplreverse
	ORDER BY a.unplreverse ASC
	LIMIT 0,7
	";

$qry0=mysql_query($tqry);

$pages=ceil(mysql_num_rows($qry0)/$perpage);

$qry=mysql_query($tqry.$limit);

 //echo $tqry.$limit;

if(isset($_GET["pg"])) $x=($_GET["pg"]-1)*$perpage+1; else $x=1;

while($row=mysql_fetch_array($qry)) { ?>
<tr class="tContent <?php if(($x-1)%2) echo 'genap';?>" style=" <?php // if($row["jtransaksi"]=='1') echo 'font-style: italic; color: red;';?>" >
<td style="text-align:center;"><a href="javascript: void(0);" onclick="drill('<?php echo $row["unplreverse"];?>')">Level <?php echo $row["unplreverse"];?></a></td>
<td style="text-align:center;"><?php echo number_format( $row["cxid"] );?></td>
<td style="text-align:center;"><?php echo number_format( $row["cid"] - $row["cxid"] );?></td>
<td style="text-align:center;"><?php echo number_format( $row["cid"] );?></td>
<!--
<td style="text-align:center;"><?php echo $syscurrency." ".number_format( $row["jbuy"],2 );?></td>
<td style="text-align:center;"><?php echo $syscurrency." ".number_format( $row["jkom"],2 );?></td>
-->


</tr>
<?php $x++; } ?>
</table>
</div>
<div class="pagez"><?php include('pagez.php'); ?></div>