<?php
	include_once( 'includes/config.php' );
	
	$cTxt	= "
		SELECT a.*, b.trxvalue, b.tglinput, c.roimonthprc
		FROM g_member a
		LEFT JOIN ( SELECT * FROM g_wfund WHERE useridx='buypackage' AND status='1' ) b ON a.userid = b.userid
		LEFT JOIN g_jpackage c ON a.jpackage = c.id
		WHERE a.jpackage!='0' AND a.kontrakid='0'
		"; 
			
	$cQry	= mysqli_query( $cTxt );
	
	while( $cRow = mysqli_fetch_array( $cQry ) ) {
		
		$tqry = "
			INSERT INTO g_kontrak (
				id,
				userid,
				jpackage,
				kontrakvalue,
				kontrakprc,
				kontrakmasa,
				status
				)
			VALUES (
				NULL,
   			  	'". $cRow["userid"] ."',
				'". $cRow["jpackage"] ."',
 			  	'". $cRow["trxvalue"] ."',
			  	'". $cRow["roimonthprc"] ."',
			  	'". $contractPeriod ."',
				'1'			
			);
		";
			
		$insQry	= mysqli_query( $tqry );
		
		$kontrakid		= mysql_insert_id();
		
		$updQry3= mysqli_query( $updTxt3 );

		
		for( $i = 1; $i <= $contractPeriod; $i++ ) {
			
			$roivalue = ( $cRow["roimonthprc"] / 100 ) * $cRow["trxvalue"];
			$roiTxt = "
				INSERT INTO g_roiplan (
					id,
					kontrakid,
					masake,
					tglcair,
					jpackage,
					trxprc,
					trxvalue,
					fundid,
					status
					)
				VALUES (
					NULL,
					'". $kontrakid."',
					'". $i."',
					'". date( 'Y-m-d', strtotime( $cRow["tglinput"]." +".$i." MONTHS") )."',
					'". $cRow["jpackage"]."',
					'". $cRow["roimonthprc"] ."',
					'". $roivalue ."',
					'',
					'0'			
				)
				";
				$roiQry = mysqli_query( $roiTxt );
		}


		$updTxt = "UPDATE g_member SET kontrakid='".$kontrakid."' WHERE userid='".$cRow["userid"]."'";
		$updQry	= mysqli_query( $updTxt );


	}
			
			
