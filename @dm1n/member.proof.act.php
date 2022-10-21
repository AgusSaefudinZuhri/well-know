<?php
include('includes/config.php'); 

	$hariini	= date( 'Y-m-d H:i:s' );
	$tglaktif	= date( 'Y-m-d', strtotime( $hariini ) );
	$waktuaktif	= date( 'H:i:s', strtotime( $hariini ) );
	$refno		= date( 'YmdHis', strtotime( $hariini ) );
	$tglro		= date( 'd', strtotime( $hariini ) );


switch($_GET["a"]) {
	
	case "0":
	
		$error	= '0';
		$userid	= $_GET["x"];

		$updTxt1	= "
			UPDATE g_member 
			SET 
				staktif		= '1', 
				status		= '1',
				flogin		= '1', 
				tglaktif	= '".$tglaktif."', 
				waktuaktif	= '".$waktuaktif."'
			WHERE userid='".$userid."'";
		$write1 = mysql_query( $updTxt1 );

		$updTxt2	= "
			UPDATE g_unilevel 
			SET 
				status		= '1',
				tglaktif	= '".$tglaktif."', 
				waktuaktif	= '".$waktuaktif."'
			WHERE userid='".$userid."'";
		$write2 = mysql_query( $updTxt2 );
		
			
		if( !$write1 or !$write2 ) $error='1';

			
	

		if($error=='0') {
			
				$mbrTxt = "SELECT * FROM g_member WHERE userid = '".$userid."'";
				$mbrQry	= mysql_query( $mbrTxt );
				$mbrRow = mysql_fetch_array( $mbrQry );
			
				
				$msg1=mysql_fetch_array(mysql_query("SELECT * FROM g_temail WHERE id='1'"));
	
	
				$to1		= $mbrRow["email"];
				$subject1	= T_('New Member Info').' '.mysql_real_escape_string($_POST["nmmember"]);
				$message1	= nl2br(
					str_replace('[userid]', $userid, 
					str_replace('[password]', $mbrRow["xpass"], 
					str_replace("[nmmember]", mysql_real_escape_string($mbrRow["nmmember"]), 
					str_replace('[urllink]','<a href="'.$bsMbrlink.'">Login Now</a>', 
					
					htmlspecialchars_decode( $msg1["cttemplate"] )
					
					)))));
	
				$headers1	= 'MIME-Version: 1.0' . "\r\n";
				$headers1	.= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
				$headers1	.= 'From: '.$namaperusahaan.' <info@extrogate.com>' . "\r\n" .
				'Reply-To: info@extrogate.com' . "\r\n" .
				'X-Mailer: PHP/' . phpversion();
				$result1 = mail($to1, $subject1, $message1, $headers1);
			
			echo 'success';
			//include('iKomisi.php');
		}
		else echo $errTxt;		
			
	break;
	

	case "2":
	
		$error	= '0';
		$userid	= $_GET["x"];	

		$updTxt1	= "
			UPDATE g_member 
			SET 
				status		= '99'
			WHERE userid='".$userid."'";
		$write1 = mysql_query( $updTxt1 );

		$updTxt2= "UPDATE g_unilevel SET status='99' WHERE userid='".$userid."'";
			
		$write2 = mysql_query( $updTxt2 );
			
		if( !$write1 or !$write2 ) $error='1';

		if( $error == '0' ) echo 'success';
		else echo $errTxt;
	break;



}

?>