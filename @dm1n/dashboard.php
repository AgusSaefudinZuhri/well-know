<?php include_once('includes/config.php');?>
<div class="judulhal"><?php echo strtoupper(T_("Dashboard"));?></div>
<script type="application/javascript" language="javascript">
/*
function bwarning(x,y) {
	$('#dialog').dialog({
    title: 'WARNING REWARD',
    width: 600,
    height: 500,
    closed: false,
    cache: false,
    href: 'warning.dt.php?x='+x+'&y='+y,
    modal: true  
	});
} */
</script>
<!--
<script src="chart/Chart.js"></script>
-->
<table style="width: 98.5%; margin: 0 auto;border-collapse:collapse; line-height: 1.1;" cellpadding="0" cellspacing="0"  >
<!--
<tr >
<td colspan="2" style="width: 50%;">
<div style="margin: 5px 2.5px; border: 1px solid #000; min-height: 260px;">
			<div style="text-align: center;padding-top: 10px;">
            <span style="font-size: 14px; color: #000; font-weight: bold; "><?php echo T_("New Member");?></span><br/>
				<canvas id="canvas1" height="220" width="400" style="margin: 0 auto;"></canvas>
			</div>
</div>
</td>
<td colspan="2" style="width: 50%;">
<div style="margin: 5px 2.5px; border: 1px solid #000; min-height: 260px;">
			<div style="text-align: center; padding-top: 10px;">
            <span style="font-size: 14px; color: #000; font-weight: bold; "><?php echo T_("Investment vs. Withdrawal"); //." ( in ".$dcurrency." )";?></span><br/>
				<canvas id="canvas2" height="220" width="400" style="margin: 0 auto;"></canvas>
			</div>
<?php 
$hdr="";
for($i=1; $i<=12; $i++) {
	$j=12-$i;
	$hdr 	.=	"'".date('M y', strtotime(date('Y-m-01').' -'.$j.' MONTH'))."',"; 
	$dari		=	date('Y-m-01', strtotime(date('Y-m-01').' -'.$j.' MONTH'));
	$sampai		=	date('Y-m-t', strtotime(date('Y-m-01').' -'.$j.' MONTH'));

	$qty = mysqli_fetch_array(mysqli_query("
		SELECT 
			count( id ) j0,
			SUM(fintrxvalue) jMasuk
		FROM g_wmt4 a
		WHERE tglinput BETWEEN '".$dari."' AND '".$sampai."' AND jtransaksi='0' AND jtransaksi='0' AND status = '1'
	"));

	$bn = mysqli_fetch_array(mysqli_query("
		SELECT sum(idrvalue) byrBonus 
		FROM g_wfund 
		WHERE jtransaksi='1' AND jtransaksix = '3' AND tglinput BETWEEN '".$dari."' AND '".$sampai."' 
		AND status IN ('0','1');
	"));

	$l0		.=	"'".$qty["j0"]."',";
	$jMasuk	.=	"'".xNumber(number_format(($qty["jMasuk"]),2))."',";
	
	$byrBonus.=	"'".xNumber(number_format(($bn["byrBonus"]),2))."',";
}
$hdr=substr($hdr,0,-1);
$l0=substr($l0,0,-1);
$jMasuk=substr($jMasuk,0,-1);
$byrBonus=substr($byrBonus,0,-1);

   ?>        
	<script>
		var lineChartData1 = {
			labels : [<?php echo $hdr; ?>],
			datasets : [
				{
					label: "<?php echo T_("Investment");?>",
					strokeColor : "rgba(220,150,150,1)",
					fillColor : "rgba(220,150,150,0)",					
					pointColor : "rgba(220,150,150,1)",
					pointStrokeColor : "#fff",
					pointHighlightStroke : "rgba(220,150,150,1)",
					data : [<?php echo $l0; ?>]
				}
			]

		}

		var lineChartData2 = {
			labels : [<?php echo $hdr; ?>],
			datasets : [
				{
					label: "<?php echo T_("Investment");?>",
					strokeColor : "rgba(100,150,150,1)",
					fillColor : "rgba(100,150,150,0)",					
					pointColor : "rgba(100,150,150,1)",
					pointStrokeColor : "#fff",
					pointHighlightStroke : "rgba(100,150,150,1)",
					data : [<?php echo $jMasuk; ?>]
				},
				{
					label: "<?php echo T_("Withdrawal");?>",
					strokeColor : "rgba(220,150,150,1)",
					fillColor : "rgba(220,150,150,0)",					
					pointColor : "rgba(220,150,150,1)",
					pointStrokeColor : "#fff",
					pointHighlightStroke : "rgba(100,150,150,1)",
					data : [<?php echo $byrBonus; ?>]
				}

			]

		}

		var ctx1 = document.getElementById("canvas1").getContext("2d");
		window.myLine1 = new Chart(ctx1).Line(lineChartData1, {
			multiTooltipTemplate: "<%= datasetLabel %> - <%= Number(value) %>"

		});

		var ctx2 = document.getElementById("canvas2").getContext("2d");
		window.myLine2 = new Chart(ctx2).Line(lineChartData2, {
			multiTooltipTemplate: "<%= datasetLabel %> - <%= value %>"

		});


	</script>

</div>
</td>
</tr>
-->

<tr style="">

<td style="width: 33%">
<div class="dheader"><?php echo T_("Total Deposit"); ?></div>

<div class="dcontent" style="text-align: center; color: #000; font-weight: bold; ">
<br/>
<?php
	$dpsTxt = "		
		SELECT 
			SUM(fintrxvalue) jMasuk,
			SUM(IF(tglapprove='".date('Y-m-d')."', fintrxvalue,'0')) jMasuk0
		FROM g_wmt4 a
		WHERE jtransaksi='0' AND jtransaksix='0' AND status='1'
			";
	//echo $dpsTxt;
	$dpsQry = mysqli_query($dpsTxt);
	$dpsRow = mysqli_fetch_array($dpsQry);
?>
<span style="font-size: 24px;"><?php echo $dcurrency; ?></span><br/>
<span style="font-size: 36px;"><?php echo number_format($dpsRow["jMasuk0"],2);?></span><br/>
 <span style="font-size: 20px;"> <?php echo T_("Today"); ?></span><br/>
<hr/>
<span style="font-size: 24px;"><?php echo $dcurrency; ?></span><br/>
<span style="font-size: 36px;"><?php echo number_format($dpsRow["jMasuk"],2);?></span><br/>
<span style="font-size: 20px;"><?php echo T_("Total"); ?></span><br/>
</div>
</td>

<td style="width: 33%">
<div class="dheader"><?php echo T_("Withdrawal");?></div>

<div class="dcontent" style="text-align: center; color: #000; font-weight: bold; ">
<br/>
<?php
$wdRow=mysqli_fetch_array(mysqli_query("
		SELECT 
			sum(idrvalue) byrBonus,		
			SUM(IF(tglinput='".date('Y-m-d')."', idrvalue,'0')) byrBonus0
		FROM g_wfund 
		WHERE jtransaksi='1' AND jtransaksix = '3' AND status IN ('0','1')
		"));
?>
<span style="font-size: 24px;"><?php echo $dcurrency; ?></span><br/>
<span style="font-size: 36px;"><?php echo number_format($wdRow["byrBonus0"]);?></span><br/>
 <span style="font-size: 20px;"> <?php echo T_("Today"); ?></span><br/>
<hr/>
<span style="font-size: 24px;"><?php echo $dcurrency; ?></span><br/>
<span style="font-size: 36px;"><?php echo number_format($wdRow["byrBonus"]);?></span><br/>
<span style="font-size: 20px;"><?php echo T_("Total"); ?></span><br/>
</div>
</td>


<td style="width: 33%">
<div class="dheader"><?php echo T_("Investors"); ?></div>

<div class="dcontent" style="text-align: center; color: #000; font-weight: bold; ">
<br/>
<?php
	$mbrTxt = "		
		SELECT
			COUNT(userid) mTotal,
			SUM(IF(staktif='1', '1','0')) mAktif
		FROM g_member a
		WHERE status='1'
			";
	//echo $dpsTxt;
	$mbrQry = mysqli_query($mbrTxt);
	$mbrRow = mysqli_fetch_array($mbrQry);
?>
<span style="font-size: 24px;">&nbsp;</span><br/>
<span style="font-size: 36px;"><?php echo number_format($mbrRow["mAktif"]);?></span><br/>
 <span style="font-size: 20px;"> <?php echo T_("Active"); ?></span><br/>
<hr/>
<span style="font-size: 24px;">&nbsp;</span><br/>
<span style="font-size: 36px;"><?php echo number_format($mbrRow["mTotal"]);?></span><br/>
<span style="font-size: 20px;"><?php echo T_("Total"); ?></span><br/>
</div>
</td>


</tr>
<!--
<tr>
<td colspan="4">
<?php //include('d.warning.php'); ?>
</td>
</tr>
-->
</table>