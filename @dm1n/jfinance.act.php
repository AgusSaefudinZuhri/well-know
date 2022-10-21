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
						'".mysql_real_escape_string($_POST["nmjfinance"])."', 
						'".mysql_real_escape_string($_POST["wkproses"])."', 
						'".mysql_real_escape_string($_POST["vlkomisi"])."', 
						'".mysql_real_escape_string($_POST["nmakun"])."', 
						'".mysql_real_escape_string($_POST["noakun"])."', 
						'".mysql_real_escape_string($_POST["cabakun"])."', 
						'".mysql_real_escape_string($_POST["thumblink"])."', 						
						'1' 
						)
					";
				$simpan=mysql_query( $txt );
				$id = mysql_insert_id();
				//echo $txt;
				if($simpan) {
					for($i=0; $i<sizeof($_POST["kursid"]); $i++) {
						$insert = mysql_query("
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
			$simpan=mysql_query("
				UPDATE g_jfinance 
				SET 
					nmjfinance	= '".mysql_real_escape_string($_POST["nmjfinance"])."', 
					gjfinanceid	= '".$_POST["gjfinanceid"]."', 
					wkproses	= '".mysql_real_escape_string($_POST["wkproses"])."', 
					vlkomisi	= '".mysql_real_escape_string($_POST["vlkomisi"])."', 
					nmakun		= '".mysql_real_escape_string($_POST["nmakun"])."', 
					noakun		= '".mysql_real_escape_string($_POST["noakun"])."', 
					cabakun		= '".mysql_real_escape_string($_POST["cabakun"])."', 
					thumblink	= '".mysql_real_escape_string($_POST["thumblink"])."' 						
				WHERE id='".$_GET["id"]."'");
			
				if($simpan) {
					
					$hapus	= mysql_query("DELETE FROM g_jfinancekurs WHERE jfinanceid = '".$_GET["id"]."'");
					
					for($i=0; $i<sizeof($_POST["kursid"]); $i++) {
						$insert = mysql_query("
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