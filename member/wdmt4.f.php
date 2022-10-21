<?php 

	include_once('includes/config.php'); 
	include_once("../api/tFunction.php");
	include_once("../api/tFunctionGET.php");

	if( isset($_GET["ax"]) and $_GET["ax"]>'0') $where = " AND a.gjfinanceid = '".$_GET["ax"]."'";

?>
<input type="hidden" id="pg" value="<?php if(isset($_GET["pg"])) echo $_GET["pg"]; else echo "1";?>" />
<div class="mwrapper" style="padding-top: 5px;">


<?php 
$tqry="
	SELECT a.*, c.ckurs	
	FROM g_jfinance a
	LEFT JOIN (
		SELECT x.jfinanceid, GROUP_CONCAT(y.id) ckurs
		FROM g_jfinancekurs x
		LEFT JOIN g_kurs y ON x.kursid = y.id
		GROUP BY x.jfinanceid
		) c ON a.id = c.jfinanceid
	WHERE a.status =  '1' ".$where." 
	ORDER BY a.gjfinanceid, a.nmjfinance ASC
	";

$qry0=mysqli_query($tqry);

$pages=ceil(mysqli_num_rows($qry0)/$perpage);

$qry=mysqli_query($tqry);

// echo $tqry.$limit;

if(isset($_GET["pg"])) $x=($_GET["pg"]-1)*$perpage+1; else $x=1;

while($row=mysqli_fetch_array($qry)) { ?>

	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
		<div class="info-box" onclick="loadpagez('wdmt4.add.php?id=<?php echo $row["id"];?>');" style=" cursor: pointer;">
			<div style="text-align: middle;border: 1px solid #fff;"><img src="<?php echo $row["thumblink"];?>" width="80%" style="display: block;margin: 0 auto 0 auto;"></div>					
		
			<div style="color: #000;text-align:center;background: #e7e7e7; padding: 10px;"><strong><?php echo $row["nmjfinance"];?></strong></div>					
			<div class="title" style="color: #000;margin: 5px;"><?php echo T_("Currency");?>: <?php echo $row["ckurs"];?></div>
			<div class="title" style="color: #000;margin: 5px;"><?php if($row["wkproses"]!='') echo $row["wkproses"];?></div>
			<div class="title" style="color: #000;margin: 5px;"><?php if($row["vlkomisi"]!='') echo $row["vlkomisi"];?></div>
			</div><!--/.info-box-->			
		</div><!--/.col-->

<?php $x++; } ?>

</div>
<div class="pagez"><?php include('pagez.php'); ?></div>