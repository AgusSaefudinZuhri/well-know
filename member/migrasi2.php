<?php
	include_once( 'includes/config.php' );
	
	$cTxt	= "
		SELECT a.*
		FROM g_kontrak a
		"; 
			
	$cQry	= mysqli_query( $cTxt );
	
	while( $cRow = mysqli_fetch_array( $cQry ) ) {
		
		$tqry = "
			UPDATE g_member SET kontrakid='".$cRow["id"]."' WHERE userid='".$cRow["userid"]."'";
		$insQry		= mysqli_query( $tqry );
		echo $tqry.'<br/>';
	}
			
			
