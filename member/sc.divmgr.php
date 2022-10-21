<?php
	include_once("includes/config.php");
	echo "JMEMBERID=".$jmemberid."<BR/>";

	$bsLvl	= '';
	$rTxt	= "
			SELECT a.*, b.cid 
			FROM g_member a
			LEFT JOIN (
				SELECT sponsor, COUNT(userid) cid
				FROM g_member 
				WHERE status='1'
				GROUP BY sponsor
				) b ON a.userid = b.sponsor 
			WHERE 
					a.status 		= '1'
				AND a.parentstatus	= '1'
				AND a.jmemberid		= '".$bsLvl."'
				AND b.cid			>= '3'
				
		";

	if( $tEcho == '1' ) echo $rTxt.'<br/>';

	$rQry	= mysql_query( $rTxt );
	
	while( $rRow = mysql_fetch_array( $rQry ) ) {
		
		$updTxt	= "UPDATE g_member SET jmemberid = '".$jmemberid."' WHERE userid = '".$rRow["userid"]."'";
		$updQry	= mysql_query( $updTxt );
		
		
	}
