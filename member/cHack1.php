<?php
	include_once("includes/config.php");

/*
	$sTxt = "SELECT * FROM g_wfund";
	$sQry = mysqli_query( $sTxt );

	while( $sRow = mysqli_fetch_array( $sQry ) ) {
		
		echo print_r( $sRow );
		echo '<br/>';
	}

	
	
	$tTxt = "TRUNCATE g_wfund";
	mysqli_query( $tTxt );

	$u1Txt = "UPDATE g_csv SET status='0'";
	mysqli_query( $u1Txt );

	$u2Txt = "UPDATE g_csvdt SET status='0'";
	mysqli_query( $u2Txt );
*/	
	

	$updCsvTxt = "UPDATE g_csv SET tglmulai='2019-03-23', waktumulai='06:35:26', tglselesai='2019-03-23', waktuselesai='06:35:26'";
	mysqli_query( $updCsvTxt );

	$updWFund = "UPDATE g_wfund SET tglinput='2019-03-23', waktuinput='06:35:26', tglapprove='2019-03-23', waktuapprove='06:35:26'";
	mysqli_query( $updWFund );
