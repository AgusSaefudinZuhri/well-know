<?php
	include('includes/config.php');
	$tglAcuan = $_GET["y"]."-".$_GET["m"]."-01";
?>


		<select id="tlhari" name="tlhari" class="form-control" required style="min-width: 20%;" >
      		<option value="" disabled selected>DAY</option>      
      		<?php 
				$tAkhir = date('t', strtotime( $tglAcuan ) );
				if( $_GET["d"]> $tAkhir) $tlHari	= ""; else $tlHari = $_GET["d"];
				for($j=1; $j<=$tAkhir; $j++ ) { 
				
 			?>
			<option value="<?php echo sprintf("%02s", $j); ?>" <?php if($tlHari==sprintf("%02s", $j)) echo 'selected'; ?>><?php echo sprintf("%02s", $j); ?></option>	
			<?php
				}
			?>
       
		</select>
