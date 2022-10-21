<?php
include('includes/config.php'); 
include("lib/qr/qrcode.php");
//echo print_r($_REQUEST);

    if(preg_match('/[^a-zA-Z0-9_]/', $_POST["useridx"]) == 0)
    {	

	$tError = 0;
	$regFee = $regFee;

	$hariini		= date('Y-m-d H:i:s'); //
	$tgldaftar		= date('Y-m-d', strtotime($hariini));//
	$waktudaftar	= date('H:i:s', strtotime($hariini));		
	$tglaktif		= '';//
	$waktuaktif		= '';		
	

	$refno			= date('YmdHis', strtotime($hariini));

	$cekPassTxt		= "SELECT * FROM g_member WHERE userid='".$_SESSION["userid"]."'";
	$cekPassQry		= mysqli_query($cekPassTxt);
	$cekPassRow		= mysqli_fetch_array( $cekPassQry );

	if(sha1($_POST["password2"])==$cekPassRow["password2"] or (isset($_GET["x"]) and $_GET["x"]=='1')) {
//		echo 'xxx';
	$cKTPTxt = "
		SELECT * 
		FROM g_member 
		WHERE noktp = '".mysql_escape_string($_POST["noktp"])."'
		";
		
	if( mysqli_num_rows(mysqli_query($cKTPTxt))==0 ) {
		
		
	$cUseridTxt = "
		SELECT * 
		FROM g_member 
		WHERE userid = '".mysql_escape_string($_POST["useridx"])."'
		";
		
	if(mysqli_num_rows(mysqli_query($cUseridTxt))==0 and $_POST["useridx"]!=$company_userid) {
		
		$cParentStatusTxt = "
			SELECT * 
			FROM g_member 
			WHERE userid = '".mysql_escape_string($_POST["sponsordst"])."' 
			AND parentstatus='1' AND status='1'
			";
		//echo $cParentStatusTxt;
		$cParentStatusQry = mysqli_query($cParentStatusTxt);
			
		if(mysqli_num_rows($cParentStatusQry)>0) {

			$rSponsor	= mysqli_fetch_array($cParentStatusQry);
			$unilevel	= $rSponsor["unilevel"]+1;
			
			if($_POST["passwordx"]==$_POST["passwordx2"]) {
				if($_POST["npass2"]==$_POST["kpass2"]) {

// PERSIAPAN DATA DASAR

				$userid		= mysqli_real_escape_string($_POST["useridx"]);
				$password 	= sha1($_POST["passwordx"]);
				$xpass 		= mysqli_real_escape_string($_POST["passwordx"]);
				$password2	= sha1($_POST["npass2"]);
				$xpass2		= mysqli_real_escape_string($_POST["npass2"]);

				$parentid	= $_POST["useridx"];			 //penting; 
				$sponsor	= mysqli_real_escape_string($_POST["sponsordst"]);
				$email		= mysqli_real_escape_string($_POST["email"]);
				
				$initpkg	= $_POST["jpackage"];
				$jpackage	= $_POST["jpackage"];
				$negara		= $_POST["negara"];
				$broker		= ""; //$_POST["broker"];
				$alamat		= mysqli_real_escape_string($_POST["alamat"]);
				$kota		= mysqli_real_escape_string($_POST["kota"]);
				$propinsi	= mysqli_real_escape_string($_POST["propinsi"]);
				$kodepos	= mysqli_real_escape_string($_POST["kodepos"]);
				$nohp1		= mysqli_real_escape_string($_POST["nohp1"]);
				$noktp		= mysqli_real_escape_string($_POST["noktp"]);
				$nmbank		= mysqli_real_escape_string($_POST["nmbank"]); 
				$cabbank	= mysqli_real_escape_string($_POST["cabbank"]);
				$norek		= mysqli_real_escape_string($_POST["norek"]);
				$atasnama	= mysqli_real_escape_string($_POST["atasnama"]);
				$swiftcode	= mysqli_real_escape_string($_POST["swiftcode"]);
				$stsecret	= $_POST["scquestion"];
				$secretanswer= mysqli_real_escape_string($_POST["scquestiontxt"]);
				$ktplink	= mysqli_real_escape_string( str_replace( "|","/", $_POST["ktpdoc"] ) );						
			
		$tgllahir = $_POST["tltahun"]."-".$_POST["tlbulan"]."-".$_POST["tlhari"];
					
			
				$parentstatus = '1';
				$error = '1';

				$mbrlink	.= $userid;
				$mbrqrcode	.=	$userid.'.png';
				$mbrpic		= '';
				
//				$qr = new qrcode();
				

//				$qr->link($mbrlink);
//				copy($qr->get_link(),str_replace( $bsMbrlink, "", $mbrqrcode ) );

				
	
	
	// DATA DASAR SELESAI
	
	

	
	if($tError=='0') {
	// MULAI PROSES INPUTING			


	
			$stxt = "
						INSERT INTO g_member(
							userid,
							xpass,
							password,
							xpass2,
							password2,
							nmmember,
							parentid,
							upline,
							posisi,
							sponsor,
							level,
							unilevel,
							email,
							negara,
							broker,
							alamat,
							kota,
							propinsi,
							kodepos,
							noktp,
							nmbank,
							cabbank,
							norek,
							atasnama,
							swiftcode,
							nohp1,
							tgldaftar,
							waktudaftar,
							tglaktif,
							waktuaktif,
							parentstatus,
							status,
							staktif,
							root,
							blokir,
							spm1,
							bspm1,
							spm2,
							bspm2,
							freeacc,
							mbrlink,
							mbrpic,
							mbrqrcode,
							flogin,
							stsecret,
							secretanswer,
							ktplink,
							tgllahir
							) 
						VALUES(
							'".$userid."',
							'".$xpass."',
							'".$password."',
							'".$xpass2."',
							'".$password2."',
							'".mysqli_real_escape_string($_POST["nmmember"])."',
							'".$parentid."',
							'".$upline."',
							'".$posisi."',
							'".$sponsor."',
							'".$level."',
							'".$unilevel."',
							'".$email."',
							'".$negara."',
							'".$broker."',
							'".$alamat."',
							'".$kota."',
							'".$propinsi."',
							'".$kodepos."',
							'".$noktp."',
							'".$nmbank."',
							'".$cabbank."',
							'".$norek."',
							'".$atasnama."',
							'".$swiftcode."',
							'".$nohp1."',
							'".$tgldaftar."',
							'".$waktudaftar."',
							'".$tglaktif."',
							'".$waktuaktif."',
							'".$parentstatus."',
							'0',
							'0',
							'0',
							'0',
							'0',
							'0.00',
							'0',
							'0.00',
							'0',
							'".$mbrlink."',
							'".$mbrpic."',
							'".$mbrqrcode."',
							'1',
							'".$stsecret."',
							'".$secretanswer."',
							'".$ktplink."',
							'".$tgllahir."'
							)
						";

			$simpan=mysqli_query($stxt);
		
	
	
			$uniQry = mysqli_query("SELECT * FROM g_unilevel WHERE userid='".$sponsor."'");
	
			while($unRow=mysqli_fetch_array($uniQry)) {
				$unilevel0Txt = "
					INSERT INTO g_unilevel (
						userid,
						unplid,
						unpllevel,
						unplreverse,
						unilevel,
						parentstatus,
						parentid,
						tgldaftar,
						waktudaftar,
						tglaktif,
						waktuaktif,
						status
						)
					VALUES (
						'".$userid."',
						'".$unRow["unplid"]."',
						'".$unRow["unpllevel"]."',
						'".($unRow["unplreverse"]+1)."',
						'".$unilevel."',
						'1',
						'".$userid."',
						'".$tgldaftar."',
						'".$waktudaftar."',
						'".$tglaktif."',
						'".$waktuaktif."',
						'0'
					)
				";
//				echo $unilevel0Txt;
				$upline0 = mysqli_query($unilevel0Txt);
				
			}
	
			$unilevelTxt = "
					INSERT INTO g_unilevel (
						userid,
						unplid,
						unpllevel,
						unplreverse,
						unilevel,
						parentstatus,
						parentid,
						tgldaftar,
						waktudaftar,
						tglaktif,
						waktuaktif,
						status
						)
					VALUES (
						'".$userid."',
						'".$sponsor."',
						'".($unilevel-1)."',
						'1',
						'".$unilevel."',
						'1',
						'".$userid."',
						'".$tgldaftar."',
						'".$waktudaftar."',
						'".$tglaktif."',
						'".$waktuaktif."',
						'0'
					)
				";
			$unilevel = mysqli_query($unilevelTxt);
	
			
	// SELESAI PROSES INPUTING
	
	// MULAI PROSES PEMBAYARAN REGISTER WALLET
//			if( $simpan1 and $update1 and $simpan3 and $update3 ) $error='0'; 
//			else $error='1';
	
	// SELESAI PROSES PEMBAYARAN IF WALLET
	
			if($simpan and $tError=='0') {
				
				$hasilStatus = 'success';
				
				echo 'success|'.$userid;
	
//				include_once( 'dKomisi.php' );
				
				/*
				
				$sponsor=mysqli_fetch_array(mysqli_query("SELECT * FROM g_member WHERE userid='".$sponsor."'"));
				
				$msg1=mysqli_fetch_array(mysqli_query("SELECT * FROM g_temail WHERE id='1'"));
	
	
				$to1		= $email;
				$subject1	= T_('New Member Info').' '.mysqli_real_escape_string($_POST["nmmember"]);
				$message1	= nl2br(
					str_replace('[userid]', $userid, 
					str_replace('[password]', $xpass, 
					str_replace("[nmmember]", mysqli_real_escape_string($_POST["nmmember"]), 
					str_replace('[nmsponsor]', $sponsor["nmmember"], 
					str_replace('[mailsponsor]', $sponsor["email"], 
					str_replace('[hpsponsor]', $sponsor["nohp1"],
					str_replace('[urllink]','<a href="'.$bsMbrlink.'">Login Now</a>', 
					
					htmlspecialchars_decode( $msg1["cttemplate"] )
					
					))))))));
	
				$headers1	= 'MIME-Version: 1.0' . "\r\n";
				$headers1	.= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
				$headers1	.= 'From: '.$namaperusahaan.' <info@aoraindonesia.com>' . "\r\n" .
				'Reply-To: info@aoraindonesia.com' . "\r\n" .
				'X-Mailer: PHP/' . phpversion();
				$result1 = mail($to1, $subject1, $message1, $headers1);
	
				*/
			}
			else echo  T_("There are errors in process. If the problem persists, please contact The Administrator");	
	}
//	else echo T_("");	
		}
		else echo T_("The Security password doesn't Match"); //.$jmlpin;
		}
		else echo T_("The Password doesn't Match"); //.$jmlpin;
	}
	else echo T_("The regarding UserID is not valid. Please try other Sponsor ID."); //.$jmlpin;
}
else echo T_("The regarding UserID is already exist. Please try other UserID.");
}
else echo T_("The regarding ID Card / Passport Number is already exist. Please try other  ID Card / Passport Number.");

	}
else echo T_("Your Security Password is wrong.");
	}
	else echo T_("Your UserID contains invalid character/s");

?>