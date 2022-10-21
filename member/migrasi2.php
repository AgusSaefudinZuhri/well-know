<?php
	include_once( 'includes/config.php' );
	
	$cTxt	= "
		SELECT a.*
		FROM g_kontrak a
		"; 
			
	$cQry	= mysql_query( $cTxt );
	
	while( $cRow = mysql_fetch_array( $cQry ) ) {
		
		$tqry = "
			UPDATE g_member SET kontrakid='".$cRow["id"]."' WHERE userid='".$cRow["userid"]."'";
		$insQry		= mysql_query( $tqry );
		echo $tqry.'<br/>';
	}
			
			
