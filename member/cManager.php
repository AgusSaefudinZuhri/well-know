<?php

	$mgrTxt = "SELECT * FROM g_jmember WHERE status = '1' ORDER BY ( rank * 1 ) ASC";
	$mgrQry = mysqli_query( $mgrTxt );
	while( $mgrRow = mysqli_fetch_array( $mgrQry ) ) {
		
		$jmemberid = $mgrRow["id"];
		include($mgrRow["reqscript"]);
		
	}