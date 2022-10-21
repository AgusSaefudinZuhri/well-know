<?php
	include_once( 'includes/config.php' );

	$csTxt	= "
		SELECT * 
		FROM g_member 
		WHERE userid='".$_GET["id"]."' 
			AND parentstatus='1' 
		";
	
	$csQry	= mysqli_query( $csTxt );

	if( mysqli_num_rows( $csQry ) ) {
		$csRow	= mysqli_fetch_array( $csQry );
		echo "success|".$csRow["nmmember"];
	}
	else echo "error";