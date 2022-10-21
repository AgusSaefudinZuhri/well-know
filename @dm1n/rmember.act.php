<?php
include('includes/config.php'); 
include('function.php'); 
//include("lib/qr/qrcode.php");
	
	switch($_GET["a"]) {
		case "0":
		$cqry = mysqli_query("SELECT * FROM g_member WHERE userid='".$_POST["userid"]."'");
		
		if(mysqli_num_rows($cqry)=='0') {
			if($_POST["password"]==$_POST["cpassword"]) {
				$userid		= mysqli_real_escape_string($_POST["userid"]);
				$password 	= sha1($_POST["password"]);
				$xpass 		= $_POST["cpassword"];
				$password2 	= sha1($_POST["password2"]);
//				$xmember	= explode( "|", $_POST["jpackage"] ); //penting;
//				$jpackage	= xNumber( $xmember[0] );	 //penting;
				$jpackage	= 0;
//				$hargapv	= xNumber( $xmember[1] );	 //penting;
//				$hasilpv	= ( xNumber( $xmember[2] ) / 100 ) * $hargapv;	 //penting;
//				$nmPaket	= mysqli_real_escape_string( $xmember[2] );

//				$jmlhu		= $xmember[1];	 //penting;	
//				$jmlproduk	= $xmember[2];	 //penting;				
				$parentid	= $_POST["userid"];			 //penting; 
//				$jpackage	= $_POST["jpackage"];
				$initpackage= $jpackage;

				$upline		= '';
				$posisi		= '';
				$sponsor	= '';
				$level		= '1';
				$unilevel	= '1';
//				$negara		= $_POST["negara"];
//				$rank		= '0';
			
				$hariini	= date('Y-m-d H:i:s');
				$tgldaftar	= date('Y-m-d', strtotime($hariini));
				$waktudaftar= date('H:i:s', strtotime($hariini));
				$tglaktif	= ''; //$tgldaftar;
				$waktuaktif	= ''; //date('H:i:s', strtotime($hariini));
				$parentstatus = '1';

				$mbrlink	.= $userid;
				$mbrqrcode	.=	''; //$userid.'.png';
				$mbrpic		= '';
				
				$jmTxt 		= "SELECT * FROM g_jpackage WHERE id = '".$jpackage."'";
				$jmQry		= mysqli_query( $jmTxt );
				$jmRow		= mysqli_fetch_array( $jmQry );
				
				
				$stxt = "
						INSERT INTO g_member(
							userid,
							xpass,
							password,
							nmmember,
							parentid,
							upline,
							posisi,
							sponsor,
							level,
							unilevel,
							tgldaftar,
							waktudaftar,
							tglaktif,
							waktuaktif,
							parentstatus,
							status,
							staktif,
							root,
							blokir,
							flogin,
							spm1,
							bspm1,
							spm2,
							bspm2,
							freeacc,
							mbrlink,
							mbrpic,
							mbrqrcode
							) 
						VALUES(
							'".$userid."',
							'".$xpass."',
							'".$password."',
							'".mysqli_real_escape_string($_POST["nmmember"])."',
							'".$parentid."',
							'".$upline."',
							'".$posisi."',
							'".$sponsor."',
							'".$level."',
							'".$unilevel."',
							'".$tgldaftar."',
							'".$waktudaftar."',
							'".$tglaktif."',
							'".$waktuaktif."',
							'".$parentstatus."',
							'1',
							'1',
							'1',
							'0',
							'0',
							'0',
							'0.00',
							'0',
							'0.00',
							'0',
							'".$mbrlink."',
							'".$mbrpic."',
							'".$mbrqrcode."'					
							)
						";
//					echo $stxt;
				$simpan=mysqli_query($stxt);

				$error = '0';
//				$error = '0';

/*
			$refno	 = date('YmdHis');
			$toIDx	 = "newmember";
			$tqry3="
					INSERT INTO g_wfn (
						id,
						refno,
						parentid,
						userid,
						useridx,
						jtransaksi,
						jtransaksix,
						pkgvalue,
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
						'".$toIDx."',
						'0',
						'10',
						'".$hargapv."',
						'".$hasilpv."',
						'".$tglaktif."',
						'".$waktuaktif."',
						'".$tglaktif."',
						'".$waktuaktif."',
						'Package - ".$nmPaket."',
						'1'
					)
				";
	
			$simpan3 = mysqli_query($tqry3);
			$xid3	 = mysql_insert_id();
			$refno3	 = $refno.$xid3; 
			$uQry3	 = "UPDATE g_wfn SET refno='".$refno3."' WHERE id='".$xid3."'";
			$update3 = mysqli_query($uQry3);
			if( !$update3 ) $error= 1;
*/
				if($simpan and $error=='0') echo 'success';
				else echo $errTxt;
			}

			else echo T_("The Pasword doesn't Match");
		}
		else echo T_("UserID is already exists. Please choose other UserID");
		
		break;
		
		case "1":
/*			$simpan=mysqli_query("
				UPDATE g_country 
				SET 
					nmcountry	='".mysqli_real_escape_string($_POST["nmcountry"])."', 
					tcurrency	='".mysqli_real_escape_string($_POST["tcurrency"])."', 
					tbuy		='".str_replace(',', '', mysqli_real_escape_string($_POST["tbuy"]))."', 
					tsell		='".str_replace(',', '', mysqli_real_escape_string($_POST["tsell"]))."' 
				WHERE id='".$_GET["id"]."'");
			
			if($simpan) echo 'success';
			else echo T_("There are errors in process. If the problem persists, please contact The Administrator");
			*/		
		break;
	}
?>