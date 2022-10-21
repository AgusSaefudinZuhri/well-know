<?php
include('includes/config.php'); 
	
	$tproduk	= '2';
	
	switch($_GET["a"]) {
		case "0":
				$txt = "
					INSERT INTO g_jfinance(
						id,
						gjfinanceid,
						nmjfinance,
						wkproses,
						vlkomisi,
						nmakun,
						noakun,
						cabakun,
						thumblink,
						status
						) 
					VALUES(
						'".$id."',
						'".$_POST["gjfinanceid"]."', 
						'".mysqli_real_escape_string($_POST["nmjfinance"])."', 
						'".mysqli_real_escape_string($_POST["wkproses"])."', 
						'".mysqli_real_escape_string($_POST["vlkomisi"])."', 
						'".mysqli_real_escape_string($_POST["nmakun"])."', 
						'".mysqli_real_escape_string($_POST["noakun"])."', 
						'".mysqli_real_escape_string($_POST["cabakun"])."', 
						'".mysqli_real_escape_string($_POST["thumblink"])."', 						
						'1' 
						)
					";
				$simpan=mysqli_query( $txt );
				$id = mysql_insert_id();
				//echo $txt;
				if($simpan) {
					for($i=0; $i<sizeof($_POST["kursid"]); $i++) {
						$insert = mysqli_query("
							INSERT INTO g_jfinancekurs (
								id,
								jfinanceid,
								kursid,
								status
							)
							VALUES (
								NULL,
								'".$id."',
								'".$_POST["kursid"][$i]."',
								'1'
							)
						
						
						");
					}
					
					echo 'success';
				}
				else echo $errTxt;		
				
		break;
		
		case "1":
			$simpan=mysqli_query("
				UPDATE g_jfinance 
				SET 
					nmjfinance	= '".mysqli_real_escape_string($_POST["nmjfinance"])."', 
					gjfinanceid	= '".$_POST["gjfinanceid"]."', 
					wkproses	= '".mysqli_real_escape_string($_POST["wkproses"])."', 
					vlkomisi	= '".mysqli_real_escape_string($_POST["vlkomisi"])."', 
					nmakun		= '".mysqli_real_escape_string($_POST["nmakun"])."', 
					noakun		= '".mysqli_real_escape_string($_POST["noakun"])."', 
					cabakun		= '".mysqli_real_escape_string($_POST["cabakun"])."', 
					thumblink	= '".mysqli_real_escape_string($_POST["thumblink"])."' 						
				WHERE id='".$_GET["id"]."'");
			
				if($simpan) {
					
					$hapus	= mysqli_query("DELETE FROM g_jfinancekurs WHERE jfinanceid = '".$_GET["id"]."'");
					
					for($i=0; $i<sizeof($_POST["kursid"]); $i++) {
						$insert = mysqli_query("
							INSERT INTO g_jfinancekurs (
								id,
								jfinanceid,
								kursid,
								status
							)
							VALUES (
								NULL,
								'".$_GET["id"]."',
								'".$_POST["kursid"][$i]."',
								'1'
							)
						
						
						");
					}
					
					echo 'success';
				}
				else echo $errTxt;		
		break;
	}
?>