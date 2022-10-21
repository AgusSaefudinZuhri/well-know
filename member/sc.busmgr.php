<?php
	include_once("includes/config.php");
	echo "JMEMBERID=".$jmemberid."<BR/>";
	$bsLvl		= " ( 'DIV' ) ";
	//$bsLvlInc	= " ( 'SPV', GM', 'GD' ) ";
	$tgtLvl		= 'BUS';

	$rTxt	= "
			SELECT x.unplid, IF(COUNT(x.userid)=3 OR SUM(x.cid)=3, '1','0') cgm
			FROM (

				SELECT a.*, b.jmemberid, IFNULL(c.cid,'0') cid 
				FROM g_unilevel a 
				LEFT JOIN g_member b ON a.userid = b.userid
				LEFT JOIN (
					SELECT x1.unplid, IF(COUNT(x1.id)>0,'1','0') cid 
					FROM g_unilevel x1 
					LEFT JOIN g_member x2 ON x1.userid = x2.userid
					WHERE x2.jmemberid IN ".$bsLvl."
					GROUP by x1.unplid
				) c ON a.userid = c.unplid

				WHERE a.unplreverse='1' AND ( ( b.jmemberid IN ".$bsLvl." ) OR c.cid = '1' )
				) x
			GROUP BY x.unplid
			HAVING cgm='1'
";

	if( $tEcho == '1' ) echo '<br/>'.nl2br($rTxt).'<br/>';

	$rQry	= mysql_query( $rTxt );
	
	while( $rRow = mysql_fetch_array( $rQry ) ) {
		
		$updTxt	= "UPDATE g_member SET jmemberid='".$jmemberid."' WHERE userid='".$rRow["unplid"]."'";
		$updQry	= mysql_query( $updTxt );

	}
