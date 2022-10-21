<?php
	
	include_once( 'includes/config.php' );
	
	$ckTxt	= "
			SELECT * FROM g_member 
			WHERE 	userid 	= '".$_GET["id"]."'
				AND status	= '1'
				AND blokir	= '0'
				";
	
	$ckQry	= mysql_query( $ckTxt );
	$ckCount= mysql_num_rows( $ckQry );
	
	if( $ckCount>0 ) {
		$ckRow	= mysql_fetch_array( $ckQry );
		$userid	= $ckRow["nmmember"];
		echo "success|".$userid;
	}
	else echo "UserID tidak valid!!!";