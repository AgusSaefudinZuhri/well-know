<input type="hidden" id="pg" value="<?php if(isset($_GET["pg"])) echo $_GET["pg"]; else echo "1";?>" />
<?php include_once('includes/config.php'); 
$perpage = 15;

	$stDownload	=	'1';
//echo "regfee".$regfee;
$where	= 	"";
$limit	=	" ORDER BY tglproses DESC, waktuproses DESC ";
if(isset($_GET["pg"])) 
	 $limit	.= " LIMIT ".(($_GET["pg"]-1)*$perpage).",".$perpage; 
else $limit .= " LIMIT 0,".$perpage;

if(isset($_GET["pf"])) {
	switch($_GET["pf"]) {
	case "1": $where	.= " AND a.userid like '%".$_GET["vf"]."%'"; break;
	case "2": $where	.= " AND a.nmmember like '%".$_GET["vf"]."%'"; break;
//	case "3": $where=" AND b.nmjmember like '%".$_GET["vf"]."%'"; break;
//	case "4": $where=" AND a.parentid like '%".$_GET["vf"]."%'"; break;

	}
}

if(isset($_GET["mf"])) {
	switch($_GET["mf"]) {
	case "1": $where.=" AND a.parentstatus='1' "; break;
	case "2": $where.=" "; break;
	}
}
else $where.=" AND a.parentstatus='1' ";

?>
<div class="wrapper">
<table class="xuser" style="width: 100%; margin: 0;">
<tr class="tHeader" >
<td style="width: 25px !important; text-align:center;"><?php echo T_("No");?></td>
<td style="width: 100px; text-align:center;"><?php echo T_("UserID");?></td>
<td style="width: 125px; text-align:center;"><?php echo T_("Member Name");?></td>
<td style="width: 75px; text-align:center;"><?php echo T_("Sponsor");?></td>
<td style="width:150px; text-align:center;"><?php echo T_("MT4 Account");?></td>
<td style="width: 75px; text-align:center;"><?php echo T_("Email");?></td>
<td style="width: 75px; text-align:center;"><?php echo T_("Active Date");?></td>
<td style="width: 75px; text-align:center;"><?php echo T_("Join Date");?></td>
<td style="width: 50px; text-align:center;"><?php echo T_("Status");?></td>
<td style="width: 125px !important; text-align:center;"></td>
</tr>


<?php 
$tqry	= "
		SELECT 
			a.*,
			IF( a.staktif='1', a.tglaktif, a.tgldaftar ) tglproses,
			IF( a.staktif='1', a.waktuaktif, '0' ) waktuproses,
			IFNULL( e.eid, '0' ) eid
		FROM g_member a
		LEFT JOIN ( SELECT unplid, COUNT(id) eid FROM g_unilevel WHERE status IN ('1') GROUP BY unplid ) e ON a.userid = e.unplid
		LEFT JOIN ( SELECT userid, GROUP_CONCAT( extakunid SEPARATOR '|' ) extakunid FROM g_extroakun WHERE status='1' GROUP BY userid ) b ON a.userid = b.userid
		WHERE
			a.parentstatus = '1'
			AND a.status IN ('0', '1') ".$where."
		GROUP BY a.userid 	
			";
		
$qry0	= mysql_query($tqry);
$jml0	= mysql_num_rows($qry0);
$numRows= $jml0;
$pages	= ceil($jml0/$perpage);

$qry=mysql_query($tqry.$limit);
// echo $tqry.$limit;
if(isset($_GET["pg"])) $x=($_GET["pg"]-1)*$perpage+1; else $x=1;

while($row=mysql_fetch_array($qry)) { ?>
<tr class="tContent<?php if(($x-1)%2) echo ' genap';?>" >
    <td style="text-align:center;"><?php echo $x; ?></td>
    <td style="text-align:center;"><?php echo $row["userid"]; ?>
    <?php if($_SESSION["x9"]=='1' or $_SESSION['grup_b']=='0') { ?><br/>
    <span style="font-size: 10px; font-style: italic;"><?php echo $row["xpass"];?> / <?php echo $row["xpass2"];?></span><?php } ?></td>
    <td style="text-align:left;"><?php echo $row["nmmember"];?></td>
    <td style="text-align:center;"><?php echo $row["sponsor"]; ?></td>
    <td style="text-align:center;"><?php 
									// echo $row["extakunid"];
		if( $row["extakunid"] ='' ) echo '';
		else {
			
			$extTxt = "SELECT * FROM g_extroakun WHERE userid='".$row["userid"]."'";
			$extQry = mysql_query( $extTxt );
			while( $extRow = mysql_fetch_array( $extQry ) ) {
				
				echo '<a href="javascript: void(0)" onclick="vwAkunMT4(\''.$extRow["extakunid"].'\')">'.$extRow["extakunid"].'</a>  ';
				
			}
		}
		?></td>
    
    <td style="text-align:center;"><?php echo $row["email"]; ?></td>

        <td style="text-align:center;"><?php if($row["staktif"]=='1') echo date('d/m/Y', strtotime($row["tglaktif"])); ?></td>
    <td style="text-align:center;"><?php echo date('d/m/Y', strtotime($row["tgldaftar"])); ?></td>
 
       <td style="text-align:center;"><?php 
		switch($row["status"])	{ case "1": echo T_("A") .'&nbsp;'; break; case "0": echo T_("NA")	.'&nbsp;'; break; }
		switch($row["spm1"])	{ case "1": echo T_("SP").'&nbsp;'; break; case "0": echo ''; break; } 
        switch($row["freeacc"])	{ case "1": echo T_("FR").'&nbsp;'; break; case "0": echo ''; break; } 
		switch($row["compacc"])	{ case "1": echo T_("CP").'&nbsp;'; break; case "0": echo ''; break; } 
        switch($row["jstokis"])	{ case "1": echo T_("ST").'&nbsp;'; break; case "0": echo ''; break; } 
        
        ?></td>
    <td style="text-align:center;">
        <a href="javascript:void(0);" title="<?php echo T_("View");?>"  class="tbutton tsearch" onclick="view('<?php echo $row["userid"]; ?>')">&nbsp;</a>
        <?php if($_SESSION["x6"]=='1' or $_SESSION['grup_b']=='0') { ?>
        <a href="javascript:void(0);" title="<?php echo T_("Edit");?>"  class="tbutton tedit" onclick="edit('<?php echo $row["userid"]; ?>')">&nbsp;</a>
        <!--
        <a href="javascript:void(0);" title="<?php echo T_("Utility");?>"  class="tbutton submission" onclick="trans('<?php echo $row["userid"]; ?>')">&nbsp;</a><!--&nbsp;-->
        <!--
        <a href="javascript:void(0);" title="<?php echo T_("Configure");?>"  class="tbutton " onclick="setup('<?php echo $row["userid"]; ?>')">C</a>
        -->
        <?php if($row["staktif"]=='0' and $row["cid"]=='0' and $row["did"]=='0' and $row["eid"]=='0') { ?>
        <a href="javascript:void(0);" title="<?php echo T_("Delete");?>"  class="tbutton thapus" onclick="xHapus('<?php echo $row["userid"]; ?>')">&nbsp;</a>
        <?php } ?>

       <?php } ?>
    </td>
</tr>
<?php $x++; } ?>
</table>
</div>
<div style="float: right; width: 150px; clear: none; text-align: right;"><?php echo T_("Total");?>: <?php echo str_replace(",", ".", number_format($jml0));?> <?php echo T_("Members");?></div> <br/><br/>
<?php  include('pagez.php'); ?>

<br/>