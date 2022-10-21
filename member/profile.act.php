<?php
include('includes/config.php'); 

//echo print_r( $_GET );		

switch($_GET["a"]) {
	case "0":		

		$cek = mysql_fetch_array(mysql_query("SELECT * FROM g_member WHERE userid='".$_SESSION["userid"]."'"));
		if($cek["password2"]==sha1($_POST["password2"])) {
		
		$tqry="
			UPDATE g_member 
			SET 
				email	='".$_POST["email"]."',
				alamat	='".$_POST["alamat"]."',
				kota	='".$_POST["kota"]."',
				propinsi='".$_POST["propinsi"]."',
				kodepos	='".$_POST["kodepos"]."',
				nohp1	='".$_POST["nohp1"]."'
			WHERE userid='".$_GET["id"]."'
		";
//		echo $tqry;	
		$simpan=mysql_query($tqry);
		if($simpan) { echo 'success'; }
		else echo $salahProses; 
		}
		else echo $eWalletPassWrong;
		break;

	case "1":		
		$cek = mysql_fetch_array(mysql_query("SELECT * FROM g_member WHERE userid='".$_SESSION["userid"]."'"));
//		echo $cek["password2"].'<br/>==<br/>'.sha1($_POST["password2"]);
		if($cek["password2"]==sha1($_POST["password2"])) {
			
		$tqry="
			UPDATE g_member 
			SET 
				nmbank	='".$_POST["nmbank"]."', 
				cabbank	='".$_POST["cabbank"]."',
				norek	='".$_POST["norek"]."',
				atasnama='".$_POST["atasnama"]."',
				swiftcode='".$_POST["swiftcode"]."'
			WHERE userid='".$_GET["id"]."'
		";
//		echo $tqry;	
		$simpan=mysql_query($tqry);
		if($simpan) echo 'success';
		else echo $salahProses; 
		}
		else echo $eWalletPassWrong;

		break;

	case "1A":		
		$tqry="
			UPDATE g_member 
			SET 
				autowd	='".$_POST["autowd"]."'
			WHERE userid='".$_GET["id"]."'
		";
//		echo $tqry;	
		$simpan=mysql_query($tqry);
		if($simpan) echo 'success';
		else echo $salahProses; 

		break;

	case "3":		
		$tqry="
			UPDATE g_member 
			SET 
				mlogo		= '".$_POST["mlogo"]."', 
				mbackground	= '".$_POST["mbackground"]."',
				mcorp		= '".$_POST["mcorp"]."',
				mweb		= '".$_POST["mweb"]."',
				mdesc		= '".$_POST["mdesc"]."'
			WHERE userid='".$_GET["id"]."'
		";
//		echo $tqry;	
		$simpan=mysql_query($tqry);
		if($simpan) echo 'success';
		else echo $salahProses; 

		break;

	case "100":	
		
//echo "SELECT * FROM g_member WHERE userid='".$_GET["id"]."'";
		$cek = mysql_fetch_array(mysql_query("SELECT * FROM g_member WHERE userid='".$_GET["id"]."'"));
		if($cek["password2"]== sha1($_POST["password2"])) {		
//			echo 'xxx';
		$tqry="
			INSERT INTO g_trfproof (
				id,
				userid,
				trfvalue,
				proofdoc,
				ktpdoc,
				walletdoc,
				tglupload,
				waktuupload,
				status
			)
			VALUES (
				NULL,
				'".$_GET["id"]."',
				'".xNumber( $_POST["trfvalue"] )."',
				'".mysql_real_escape_string( str_replace( "|","/", $_POST["proofdoc"] ) )."',
				'".mysql_real_escape_string( str_replace( "|","/", $_POST["ktpdoc"] ) )."',
				'".mysql_real_escape_string( str_replace( "|","/", $_POST["walletdoc"] ) )."',				
				'".date('Y-m-d')."',
				'".date('H:i:s')."',
				'0'
			) 
		";
//		echo $tqry;	
		$simpan=mysql_query($tqry);
		if($simpan) echo 'success';
		else echo $salahProses; 
		}
		else echo $eWalletPassWrong;

		break;

	case "4":	

	$cek = mysql_fetch_array(mysql_query("SELECT * FROM g_member WHERE userid='".$_SESSION["userid"]."'"));
	if($cek["password2"]==sha1($_POST["password2"])) {

		$hariini	= date( 'Y-m-d H:i:s' );
		$tglaktif	= date( 'Y-m-d', strtotime( $hariini ) );
		$tglro		= date( 'd', strtotime( $hariini ) );
		$waktuaktif	= date( 'H:i:s', strtotime( $hariini ) );
		$refno		= date( 'YmdHis', strtotime( $hariini ) );
			
	
		$cTxt		= "SELECT * FROM g_jpackage WHERE id='".$_POST["jpackage"]."'";
		$cQry		= mysql_query( $cTxt );
		$cRow		= mysql_fetch_array( $cQry );
			
		$trfvalue	= xNumber( $_POST["kvalue"][$_POST["jpackage"]] );
		$userid		= $_GET["id"];
		$nmjpackage	= $cRow["nmjpackage"];
		$kontrakmasa = $contractPeriod;
					
		$tqry="
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
			  '".$userid."',
			  '".$userid."',
			  'buypackage',
			  '1',
			  '0',
			  '".$trfvalue."',
			  '".$tglaktif."',
			  '".$waktuaktif."',
			  '".$tglaktif."',
			  '".$waktuaktif."',
			  'Buy Package - ".$nmjpackage."',
			  '1'		
			);
		";
//		echo $tqry;	
		$simpan=mysql_query($tqry);

		$id		= mysql_insert_id();
		$refno1	= $refno.$id;
		$updTxt3= "UPDATE g_wfund SET refno='".$refno1."' WHERE id='".$id."'";
		$updQry3= mysql_query( $updTxt3 );


		$updTxt = "
			UPDATE g_member 
			SET jpackage='".$_POST["jpackage"]."',initpackage='".$_POST["jpackage"]."', tglro='".$tglro."' 
			WHERE userid='".$_GET["id"]."'";
		$updQry	= mysql_query( $updTxt );
		
		if( $simpan and $updQry ) {
			echo 'success';
			include('iKomisi.php');
		}
		else echo $salahProses; 
		}
		else echo $eWalletPassWrong;

		break;		

	case "10":		
		$tqry="
			UPDATE g_member 
			SET 
				tgllahir='".$_POST["tgllahir"]."', 
				jkelamin='".$_POST["jkelamin"]."',
				email	='".$_POST["email"]."',
				alamat	='".$_POST["alamat"]."',
				kota	='".$_POST["kota"]."',
				propinsi='".$_POST["propinsi"]."',
				kodepos	='".$_POST["kodepos"]."',
				negara	='".$_POST["negara"]."',
				nohp1	='".$_POST["nohp1"]."',
				nohp2	='".$_POST["nohp2"]."', 
				nmbank	='".$_POST["nmbank"]."', 
				cabbank	='".$_POST["cabbank"]."',
				norek	='".$_POST["norek"]."',
				atasnama='".$_POST["atasnama"]."',
				ben_name='".$_POST["ben_name"]."',
				ben_nric='".$_POST["ben_nric"]."',
				xpass2	='".$_POST["password2"]."',
				password2='".sha1($_POST["password2"])."',
				flogin	='1'
			WHERE userid='".$_GET["id"]."'
		";
//		echo $tqry;	
		$simpan=mysql_query($tqry);
		if($simpan) {$_SESSION["firstlogin"]='1';echo 'success';}
		else echo $salahProses; 

		break;

}
?>