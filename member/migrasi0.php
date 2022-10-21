<?php

	include_once( 'includes/config.php' );
	
	$cTxt	= "
		SELECT * 
		FROM g_trfproof 
		WHERE userid NOT IN ( SELECT * FROM ( SELECT userid FROM g_wfund WHERE jtransaksi = '0' AND jtransaksix = '0' ) x )
			AND jtransaksi = '0'
			AND status='1'"; 
			
	$cQry	= mysqli_query( $cTxt );
	
	while( $cRow = mysqli_fetch_array( $cQry ) ) {
		
		$tqry = "
			INSERT INTO g_wfund (
			  id,
			  refno,
			  parentid,
			  userid,
			  useridx,
			  jtransaksi,
			  jtransaksix,
			  trxvalue,
			  tglinput,
			  waktuinput,
			  tglapprove,
			  waktuapprove,
			  remark,
			  status		
			)
			VALUES (
			  NULL,
			  '',
			  '".$cRow["userid"]."',
			  '".$cRow["userid"]."',
			  'inittrf',
			  '0',
			  '0',
			  '".$cRow["trfvalue"]."',
			  '".$cRow["tglupload"]."',
			  '".$cRow["waktuupload"]."',
			  '".$cRow["tglupload"]."',
			  '".$cRow["waktuupload"]."',
			  'Initial Transfer',
			  '1'		
			);
		";
			
		$insQry	= mysqli_query( $tqry );
		
		$id		= mysql_insert_id();
		$refno1	= date('YmdHis', strtotime($cRow["tglupload"]." ".$cRow["waktuupload"])).$id;
		$updTxt3= "UPDATE g_wfund SET refno='".$refno1."' WHERE id='".$id."'";
		$updQry3= mysqli_query( $updTxt3 );
	}
			
			
	$cTxt	= "
		SELECT a.*, c.nmjpackage
		FROM g_trfproof a
		LEFT JOIN g_member b ON a.userid = b.userid
		LEFT JOIN g_jpackage c ON b.jpackage = c.id
		WHERE a.userid NOT IN ( SELECT * FROM ( SELECT userid FROM g_wfund WHERE jtransaksi = '1' AND jtransaksix = '0' ) x )
			AND a.jtransaksi = '1'
			AND a.status='1'"; 
			
	$cQry	= mysqli_query( $cTxt );
	
	while( $cRow = mysqli_fetch_array( $cQry ) ) {
		
		$tqry = "
			INSERT INTO g_wfund (
			  id,
			  refno,
			  parentid,
			  userid,
			  useridx,
			  jtransaksi,
			  jtransaksix,
			  trxvalue,
			  tglinput,
			  waktuinput,
			  tglapprove,
			  waktuapprove,
			  remark,
			  status		
			)
			VALUES (
			  NULL,
			  '',
			  '".$cRow["userid"]."',
			  '".$cRow["userid"]."',
			  'buypackage',
			  '1',
			  '0',
			  '".$cRow["trfvalue"]."',
			  '".$cRow["tglupload"]."',
			  '".$cRow["waktuupload"]."',
			  '".$cRow["tglupload"]."',
			  '".$cRow["waktuupload"]."',
			  'Buy Package - ".$cRow["nmjpackage"]."',
			  '1'		
			);
		";
			
		$insQry	= mysqli_query( $tqry );
		
		$id		= mysql_insert_id();
		$refno1	= date('YmdHis', strtotime($cRow["tglupload"]." ".$cRow["waktuupload"])).$id;
		$updTxt3= "UPDATE g_wfund SET refno='".$refno1."' WHERE id='".$id."'";
		$updQry3= mysqli_query( $updTxt3 );
	}		