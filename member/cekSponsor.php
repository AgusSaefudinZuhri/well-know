<?php
	include_once( 'includes/config.php' );

	$csTxt	= "
		SELECT * 
		FROM g_member 
		WHERE userid='".$_GET["id"]."' 
			AND parentstatus='1' 
		";
	
	$csQry	= mysql_query( $csTxt );

	if( mysql_num_rows( $csQry ) ) {
		$csRow	= mysql_fetch_array( $csQry );
		echo "success|".$csRow["nmmember"];
	}
	else echo "error";