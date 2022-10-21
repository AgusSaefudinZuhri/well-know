<?php
include('includes/config.php'); 
		
	switch($_GET["a"]) {
		
		case "1":
			$userid 	= 'admin';
			$id 		= $_GET["id"];
			$pesan 		= mysqli_real_escape_string( $_POST["pesan"] );

		
			$updTxt1	= "
						UPDATE g_tiket 
						SET
						  tglupdate		= '".$tglaktif."',
						  waktuupdate	= '".$waktuaktif."',
						  stupdate		= '1'
						WHERE id = '".$id."'
					";
						
					$insQry1	= mysqli_query( $updTxt1 );
					

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
				
				$insQry2	= mysqli_query( $insTxt2 );

//				echo $insTxt1. " ". $insTxt2;
				if( $insQry1 and  $insQry2 ) echo 'success';
				else echo T_("There are errors in process. If the problem persists, please contact The Administrator"); 
		break;
	}
?>