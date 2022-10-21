<?php
	include( 'includes/config.php' );
	
	$hariini	= date( 'Y-m-d H:i:s' );
	$tglaktif	= date( 'Y-m-d', strtotime( $hariini ) );
	$waktuaktif	= date( 'H:i:s', strtotime( $hariini ) );
	$refno		= date( 'YmdHis', strtotime( $hariini ) );

	switch( $_GET["a"] ) {

		case "0" :
			
			$userid 	= $_GET["id"];
			$judul 		= mysql_real_escape_string( $_POST["judul"] );
			$pesan 		= mysql_real_escape_string( $_POST["pesan"] );

		
			$insTxt1	= "
						INSERT INTO g_tiket (
						  id,
						  refno,
						  userid,
						  judul,
						  tglpost,
						  waktupost,
						  tglupdate,
						  waktuupdate,
						  stupdate,
						  status		
						)
						VALUES (
						  NULL,
						  '',
						  '".$userid."',
						  '".$judul."',
						  '".$tglaktif."',
						  '".$waktuaktif."',
						  '".$tglaktif."',
						  '".$waktuaktif."',
						  '0',
						  '1'		
						);
					";
						
					$insQry1	= mysql_query( $insTxt1 );
					
					$id		= mysql_insert_id();
					$refno1	= $refno.$id;
					$updTxt1= "UPDATE g_tiket SET refno='".$refno1."' WHERE id='".$id."'";
					$updQry1= mysql_query( $updTxt1 );

					$insTxt2	= "
						INSERT INTO g_tiketdt (
						  id,
						  tiketid,
						  dari,
						  pesan,
						  tglpost,
						  waktupost,
						  status		
						)
						VALUES (
						  NULL,
						  '".$id."',
						  '".$userid."',
						  '".$pesan."',
						  '".$tglaktif."',
						  '".$waktuaktif."',
						  '1'		
						);
					";
				
				$insQry2	= mysql_query( $insTxt2 );

//				echo $insTxt1. " ". $insTxt2;
				if( $insQry1 and  $insQry2 ) echo 'success';
				else echo T_("There are errors in process. If the problem persists, please contact The Administrator"); 
		
		break; 	

		case "1" :
			
			$userid 	= $_GET["id"];
			$id 		= $_GET["idx"];
			$pesan 		= mysql_real_escape_string( $_POST["pesan"] );

		
			$updTxt1	= "
						UPDATE g_tiket 
						SET
						  tglupdate		= '".$tglaktif."',
						  waktuupdate	= '".$waktuaktif."',
						  stupdate		= '0'	
						WHERE id = '".$id."'
					";
						
					$insQry1	= mysql_query( $updTxt1 );
					

					$insTxt2	= "
						INSERT INTO g_tiketdt (
						  id,
						  tiketid,
						  dari,
						  pesan,
						  tglpost,
						  waktupost,
						  status		
						)
						VALUES (
						  NULL,
						  '".$id."',
						  '".$userid."',
						  '".$pesan."',
						  '".$tglaktif."',
						  '".$waktuaktif."',
						  '1'		
						);
					";
				
				$insQry2	= mysql_query( $insTxt2 );

//				echo $insTxt1. " ". $insTxt2;
				if( $insQry1 and  $insQry2 ) echo 'success';
				else echo T_("There are errors in process. If the problem persists, please contact The Administrator"); 
		
		break; 	

	}
	
	