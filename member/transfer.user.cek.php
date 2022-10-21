<?php
	
	include_once( 'includes/config.php' );
	
	$ckTxt	= "
			SELECT * FROM g_member 
			WHERE 	userid 	= '".$_GET["id"]."'
				AND status	= '1'
				AND blokir	= '0'
				";
	
	$ckQry	= mysqli_query( $ckTxt );
	$ckCount= mysqli_num_rows( $ckQry );
	
	if( $ckCount>0 ) {
		$ckRow	= mysqli_fetch_array( $ckQry );
		$userid	= $ckRow["nmmember"];
		echo "success";
	}
	else echo "UserID tidak valid!!!";