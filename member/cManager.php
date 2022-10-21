<?php

	$mgrTxt = "SELECT * FROM g_jmember WHERE status = '1' ORDER BY ( rank * 1 ) ASC";
	$mgrQry = mysql_query( $mgrTxt );
	while( $mgrRow = mysql_fetch_array( $mgrQry ) ) {
		
		$jmemberid = $mgrRow["id"];
		include($mgrRow["reqscript"]);
		
	}