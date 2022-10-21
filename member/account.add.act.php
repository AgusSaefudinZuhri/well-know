<?php
	set_time_limit(0);
	include('includes/config.php'); 
	include_once("../api/tFunction.php");
	include_once("../api/tFunctionGET.php");
	include_once("../api/tFunctionPOST.php");
		
switch($_GET["a"]) {
	case "0" :
		if($_POST["npass"]==$_POST["kpass"]) {
		
			$txt	= "SELECT * FROM g_member WHERE userid='".$_GET["id"]."'";
			//echo $txt;
			$qry	= mysql_query( $txt );
			$row	= mysql_fetch_array( $qry );
			
			$crAkun = crAkun( $_POST["regGroup"], $_POST["npass"], $row["nmmember"], $_POST["leverage"], $row["negara"], $row["kota"], $row["propinsi"], $row["kodepos"], $row["alamat"], $row["nohp1"], $row["email"], '');
			$hasil  = get_contentPost($crAkun["url"],$crAkun["post"]);
			//echo $hasil;
			$getResult = json_decode( $hasil, true);
			if($getResult["isSuccess"]) {
				$extakunid = $getResult["account"];
				
				$insTxt = "
				INSERT INTO g_extroakun (
						id,
						userid,
						extakunid,
						extgroup,
						extpassword,
						extname,
						extleverage,
						extcountry,
						extcity,
						extstate,
						extzipcode,
						extaddress,
						extphone,
						extemail,
						extcomment,
						status				
					)
					VALUES (
						NULL,
						'".$_GET["id"]."',
						'".$extakunid."',
						'".$_POST["regGroup"]."',
						'".$_POST["npass"]."',
						'".$row["nmmember"]."',
						'".$_POST["leverage"]."',
						'".$row["negara"]."',
						'".$row["kota"]."',
						'".$row["propinsi"]."',
						'".$row["kodepos"]."',
						'".$row["alamat"]."',
						'".$row["nohp1"]."',
						'".$row["email"]."',
						'',
						'1'				
					)";
				
				$msg1=mysql_fetch_array(mysql_query("SELECT * FROM g_temail WHERE id='2'"));
	
				$to1		= $mbrRow["email"];
				$subject1	= T_('New Member Info').' '.mysql_real_escape_string($row["nmmember"]);
				$message1	= nl2br(
					str_replace('[userid]', $_GET["id"], 
					str_replace('[password]', $_POST["password"], 
					str_replace("[nmmember]", mysql_real_escape_string($row["nmmember"]), 
					str_replace('[urllink]','<a href="'.$bsMbrlink.'">Login Now</a>', 
					
					htmlspecialchars_decode( $msg1["cttemplate"] )
					
					)))));
	
				$headers1	= 'MIME-Version: 1.0' . "\r\n";
				$headers1	.= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
				$headers1	.= 'From: '.$namaperusahaan.' <info@extrogate.com>' . "\r\n" .
				'Reply-To: info@extrogate.com' . "\r\n" .
				'X-Mailer: PHP/' . phpversion();
				$result1 = mail($to1, $subject1, $message1, $headers1);
			
				if(mysql_query($insTxt)) echo 'success';
				else echo T_("New MT4 Account Registration is failed. Please try again later. If problem persists please contact Administrator");
				
			}
			else echo T_("New MT4 Account Registration is failed. Please try again later. If problem persists please contact Administrator");
			
		}
		else echo T_("Password is not Matched!!!");
		break;

}

?>