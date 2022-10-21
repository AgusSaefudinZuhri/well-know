<?php
//if(isset($_GET["ref"])) $headerlink="member/"; else 
//$headerlink="";
include('includes/config.php'); 
include('function.php');
//echo $_SESSION['jstokis'];
//echo $_POST["useridx"];

//if( ctype_digit($_POST["useridx"]) ) {
//	$hariini		= date('Y-m-d H:i:s'); //
//	$tgldaftar		= date('Y-m-d', strtotime($hariini));//
//	$waktudaftar	= date('H:i:s', strtotime($hariini));//

	$bonusTxt1	= "
		SELECT 
			(sum(if(jtransaksi IN ('0','2') and a.status='1', a.nilai, '0'))-sum(if(jtransaksi IN ('1','3','5') and a.status='1', a.nilai, '0'))) kom,
			sum(if(jtransaksi IN ('1','3','5') and a.status='0', a.nilai, '0')) req
		FROM g_wcash a
		WHERE a.sthold='0' 
			AND a.parentid='".$_SESSION["userid"]."'
		";
	$bonus1		= mysql_fetch_array(mysql_query($bonusTxt1));
	$balance1	= $bonus1["kom"] - $bonus1["req"];
	$trxvalue	= xNumber( $_POST["trxvalue"] );
	
//echo $balance1."<".$trxvalue;
if( $balance1>=$trxvalue ) {
	
	$tError = 0;
	
	$serial			= mysql_real_escape_string( $_POST["serial"] );
	
	$hariini		= date('Y-m-d H:i:s'); //
	$tgldaftar		= date('Y-m-d', strtotime($hariini));//
	$waktudaftar	= date('H:i:s', strtotime($hariini));		
	$tglaktif		= $tgldaftar;//
	$waktuaktif		= date('H:i:s', strtotime($hariini));		
	
	$payby			= $_SESSION["userid"];
	$refno			= date('YmdHis', strtotime($hariini));

	$cekPassTxt		= "SELECT * FROM g_member WHERE userid='".$_SESSION["userid"]."'";
	$cekPassQry		= mysql_query($cekPassTxt);
	$cekPassRow		= mysql_fetch_array( $cekPassQry );

	if(sha1($_POST["password2"])==$cekPassRow["password2"]) {
	$cUseridTxt = "
		SELECT * 
		FROM g_member 
		WHERE userid = '".mysql_escape_string($_POST["useridx"])."'
		";
		
	if(mysql_num_rows(mysql_query($cUseridTxt))==0 and $_POST["useridx"]!=$company_userid) {
		
		$cParentStatusTxt = "
			SELECT * 
			FROM g_member 
			WHERE userid = '".mysql_escape_string($_POST["sponsordst"])."' 
			AND parentstatus='1' AND flogin>='10'
			";
		$cParentStatusQry = mysql_query($cParentStatusTxt);
			
		if(mysql_num_rows($cParentStatusQry)>0) {

			$rSponsor	= mysql_fetch_array($cParentStatusQry);
			$unilevel	= $rSponsor["unilevel"]+1;
			
			if($_POST["passwordx"]==$_POST["passwordx2"]) {

// PERSIAPAN DATA DASAR

				$userid			= mysql_real_escape_string($_POST["useridx"]);
				$myUserID		= $userid;
				$password 		= sha1($_POST["passwordx"]);
				$xpass 			= mysql_real_escape_string($_POST["passwordx"]);
				$parentid		= $_POST["useridx"];			 //penting; 
				$sponsor		= mysql_real_escape_string($_POST["sponsordst"]);
				$email			= mysql_real_escape_string($_POST["email"]);
				$nohp1			= mysql_real_escape_string($_POST["nohp1"]);
				$noktp			= mysql_real_escape_string($_POST["noktp"]);
//				$tPayment	= xNumber($_POST["tPayment"]);

				//$needPIN		= xNumber( $_POST["needPIN"] );
				//$needReg		= xNumber( $_POST["needReg"] );
				//$needPV			= xNumber( $_POST["needPV"] );
				//$tBayar			= xNumber( $_POST["tBayar"] );
				$jpaketPr		= explode('|', $_POST["jpaket"]);
				$jpaket			= $jpaketPr[0];
				$stfree			= $_POST["stfree"];
				switch( $stfree ) {
					case "0": $tgllunas = $tglaktif ; break;
					case "1": $tgllunas = '' ; break;
				}

				$jpTxt 		= "SELECT * FROM g_jpaket WHERE id='".$jpaket."'";
				$jpQry		= mysql_query( $jpTxt );
				$jpRow		= mysql_fetch_array( $jpQry );
				$ctrxvalue	= $jpRow["hrgjpaket"];
				$jmlPoint	= $ctrxvalue / $perPoint;

				$jmTxt 		= "SELECT * FROM g_jmember WHERE status='1' ORDER BY rank ASC";
				$jmQry		= mysql_query( $jmTxt );
				$jmRow		= mysql_fetch_array( $jmQry );
				$jmember	= $jmRow["id"];
				

			
				$parentstatus 	= '1';
				$error 			= '1';

				$mbrlink	.= $userid;
//				$mbrqrcode	.=	$userid.'.png';
				$mbrqrcode	= '';
				$mbrpic		= '';
				
//				$jmTxt 		= "SELECT * FROM g_jmember WHERE id = '".$jmember."'";
//				$jmQry		= mysql_query( $jmTxt );
//				$jmRow		= mysql_fetch_array( $jmQry );
				
				$jmlhu		= xNumber( $jpaketPr[1] );
//				$jmlproduk	= xNumber( $_POST["jmlproduk"] );
//				$alamatdelivery = mysql_real_escape_string( $_POST["alamatdelivery"] );
				
//				$qr = new qrcode();
				

//				$qr->link($mbrlink);
//				copy($qr->get_link(),str_replace( $bsMbrlink, "", $mbrqrcode ) );

				
	
	
	// DATA DASAR SELESAI
	
	
	// PROSES PENENTUAN POSISI ACCOUNT BARU
				if($_POST["tPlacement"]=='0') {
	
					$cUplineTxt = "
						SELECT * 
						FROM g_member 
						WHERE 
							userid = '".mysql_escape_string($_POST["uplinedst"])."'
						";
						
					$uplqry = mysql_query($cUplineTxt);
	
					if(mysql_num_rows($uplqry)>0) {
										
						$cx		= caripm ( mysql_escape_string($_POST["uplinedst"]) ,mysql_escape_string($_POST["positiondst"]));
				//			echo $cx;
						$cari	= explode("|",$cx);
						if( $cari[0]=='' ) {
							$upline	= $cari[1];
							$lvTxt	= "SELECT * FROM g_member WHERE userid='".$upline."'";
							$lvQry	= mysql_query( $lvTxt );
							$lvRow	= mysql_fetch_array( $lvQry );
							$level	= $lvRow["level"] + 1;
							$posisi	= mysql_escape_string($_POST["positiondst"]);
							$error	= 0;
						}
						else {
							$error = '1';
							echo T_("The position requested with the regarding Upline ID is already exist. Please try other Position or other Upline ID.");
							
						}
					}
					else {
						$error = '1';
						echo T_("The regarding Upline ID is not exist or you have no sufficient access rights. Please try other Upline ID.");
					}
				}
			else {
					
				$error = '0';
	
	/*
				$cqry="
						SELECT 
							a.*, 
							ifnull(b.xflevel,'0') xflevel, 
							ifnull(b.xclevel,'0') xclevel, 
							ifnull(b.mflevel,'0') mflevel, 
							ifnull(b.mclevel,'0') mclevel 
						FROM g_member a
						LEFT JOIN (
							SELECT 
								uplid, 
								ifnull(max(if(cid>=pid, level, NULL)), '0') xflevel, 
								max(level) xclevel, 
								ifnull(max(if(cid>=pid, clevel, NULL)), '0') mflevel, 
								max(clevel) mclevel 
							FROM (
								SELECT 
									uplid,
									level, 
									(level-upllevel) clevel, 
									count(userid) cid, 
									power(2, (level-upllevel)) pid 
								FROM `g_upline` 
								GROUP BY uplid, clevel
								) x 
							GROUP BY uplid 
						) b ON a.userid=b.uplid
						WHERE
							a.parentstatus = '1'
							AND a.status IN ('0', '1')
							AND a.userid='".$sponsor."' ";
						
				$c0	= mysql_fetch_array(mysql_query($cqry));
					
				if($c0["xflevel"]=='0') {
					$upline		= $sponsor;
					$level		= $c0["level"]+1;
					$chUpline	= "SELECT * FROM g_member WHERE posisi='ki' AND upline='".$upline."'";
					if(mysql_num_rows(mysql_query($chUpline))>0) $posisi='ka'; 
					else $posisi='ki';	
					}
				else {
	
					$tqki = "
							SELECT a.*, ifnull(b.cid,'0') cid, c.tPosisi
							FROM g_upline a
							LEFT JOIN (
								SELECT 
									upline, 
									count(userid) cid 
								FROM g_member 
								GROUP BY upline
								) b ON a.userid=b.upline
							LEFT JOIN (
								SELECT userid, group_concat(uplposisi order by upllevel) tPosisi 
								FROM g_upline 
								GROUP BY userid
								) c on a.userid=c.userid
							WHERE a.uplid='".$sponsor."' AND level='".($c0["xflevel"])."'
							HAVING cid < '2'
							ORDER BY tPosisi DESC, cid DESC, a.tglaktif ASC
							";
			//			echo $tqki;
					$cqki = mysql_query($tqki);
					if(mysql_num_rows($cqki)>0) {
						$rowki=mysql_fetch_array($cqki);
						$upline		= $rowki["userid"];
						$level		= $c0["xflevel"]+1;
						if($rowki["cid"]=='0') $posisi		= 'ki';
						else if($rowki["cid"]=='1') $posisi	= 'ka';
						else $error = '1';
					}
				}
				*/
				
			$crTxt = "
				SELECT 
					a.parentid, 
					ifnull(sum(b.cid),0) jcid, 
					ifnull(sum(b.cki),0) jcki, 
					ifnull(sum(b.cka),0) jcka, 
					c.staktif, 
					c.level
				FROM g_member a
				LEFT JOIN (
					SELECT upline, COUNT(userid) cid, SUM(IF(posisi='ki',1,0)) cki, SUM(IF(posisi='ka',1,0)) cka 
					FROM `g_member` 
					WHERE parentstatus='1' 
					GROUP BY upline
					) b ON b.upline = a.userid
				LEFT JOIN g_member c ON a.parentid = c.userid
                LEFT JOIN ( 
					SELECT userid, GROUP_CONCAT( uplposisi ORDER BY upllevel ) sumposisi
                    FROM g_upline
                    WHERE parentstatus =  '1'
                    GROUP BY userid
				) d ON a.parentid = d.userid
				WHERE c.staktif='1'
				AND ( a.parentid IN ( 
						SELECT * FROM ( 
							SELECT userid FROM g_upline WHERE uplid = '".$sponsor."'
							) x 
						) 
					OR a.parentid='".$sponsor."' )
				GROUP by a.parentid
				HAVING jcid<2
				ORDER BY c.level ASC, d.sumposisi DESC
				";
			$crQry	= mysql_query( $crTxt );
			$crRow	= mysql_fetch_array( $crQry );
			if($crRow["jcki"]=='0') $posisi = 'ki'; 
			else $posisi='ka';
			//	echo $crRow["parentid"].'|'.$posisi;
			$cx		= caripm ($crRow["parentid"],$posisi);
			//echo $cx;
			$cari	= explode("|",$cx);
			if( $cari[0]=='' ) {
				$upline	= $cari[1];
				$lvTxt	= "SELECT * FROM g_member WHERE userid='".$upline."'";
				$lvQry	= mysql_query( $lvTxt );
				$lvRow	= mysql_fetch_array( $lvQry );
				$level	= $lvRow["level"] + 1;
				$posisi	= $posisi;
			}
			else {
				$error = '1';
				echo $errTxt.'001';
			}
			
		}
	
	// SELESAI PROSES PENENTUAN POSISI ACCOUNT BARU
	
	if($error=='0') {
	// MULAI PROSES INPUTING			
	
			$stxt = "
						INSERT INTO g_member(
							userid,
							xpass,
							password,
							nmmember,
							parentid,
							jmember,
							upline,
							posisi,
							sponsor,
							level,
							unilevel,
							email,
							nohp1,
							noktp,
							tgldaftar,
							waktudaftar,
							tglaktif,
							waktuaktif,
							parentstatus,
							status,
							staktif,
							root,
							blokir,
							freeacc,
							mbrlink,
							mbrpic,
							mbrqrcode,
							flogin,
							nmbank,
							cabbank,
							norek,
							atasnama,
							stfree,
							jpaket,
							tgllunas,
							ctrxvalue
							) 
						VALUES(
							'".$userid."',
							'".$xpass."',
							'".$password."',
							'".mysql_real_escape_string($_POST["nmmember"])."',
							'".$parentid."',
							'".$jmember."',
							'".$upline."',
							'".$posisi."',
							'".$sponsor."',
							'".$level."',
							'".$unilevel."',
							'".$email."',
							'".$nohp1."',
							'".$noktp."',
							'".$tgldaftar."',
							'".$waktudaftar."',
							'".$tglaktif."',
							'".$waktuaktif."',
							'".$parentstatus."',
							'1',
							'1',
							'0',
							'0',
							'0',
							'".$mbrlink."',
							'".$mbrpic."',
							'".$mbrqrcode."',
							'10',
							'".mysql_real_escape_string( $_POST["nmbank"] )."',
							'".mysql_real_escape_string( $_POST["cabbank"] )."',
							'".mysql_real_escape_string( $_POST["norek"] )."',
							'".mysql_real_escape_string( $_POST["atasnama"] )."',
							'".$stfree."',
							'".$jpaket."',
							'".$tgllunas."',
							'".$ctrxvalue."'
							)
						";

			$simpan	= mysql_query($stxt);
		
			$vQry	= mysql_query( $vTxt );
			
		
			$uqry = mysql_query("SELECT * FROM g_upline WHERE userid='".$upline."'");
	
			while($urow=mysql_fetch_array($uqry)) {
				$upline0Txt = "
					INSERT INTO g_upline (
						userid,
						uplid,
						upllevel,
						uplposisi,
						uplreverse,
						level,
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
						'".$urow["uplid"]."',
						'".$urow["upllevel"]."',
						'".$urow["uplposisi"]."',
						'".($urow["uplreverse"]+1)."',
						'".$level."',
						'1',
						'".$userid."',
						'".$tgldaftar."',
						'".$waktudaftar."',
						'".$tglaktif."',
						'".$waktuaktif."',
						'1'
					)
				";
				$upline0 = mysql_query($upline0Txt);
				
			}
	
			$uplineTxt = "
					INSERT INTO g_upline (
						userid,
						uplid,
						upllevel,
						uplposisi,
						uplreverse,
						level,
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
						'".$upline."',
						'".($level-1)."',
						'".$posisi."',
						'1',
						'".$level."',
						'1',
						'".$userid."',
						'".$tgldaftar."',
						'".$waktudaftar."',
						'".$tglaktif."',
						'".$waktuaktif."',
						'1'
					)
				";
			$upline = mysql_query($uplineTxt);
	
	
			$uniQry = mysql_query("SELECT * FROM g_unilevel WHERE userid='".$sponsor."'");
	
			while($unRow=mysql_fetch_array($uniQry)) {
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
						'1'
					)
				";
//				echo $unilevel0Txt;
				$upline0 = mysql_query($unilevel0Txt);
				
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
						'1'
					)
				";
			$unilevel = mysql_query($unilevelTxt);

			$sisahu = $jmlhu - 1;
				
			$error = '0';
			if($sisahu>'0') {
				$sisahu = $sisahu / 2;
				$ki		= '1';
				$ka		= $ki + $sisahu;
				if(xinsert ($userid, $jmember, $ki, $sisahu, $sponsor, $userid, $userid, 'ki', ($level+1), $hariini)) $error = 0; 
				else $error=1;
				if(xinsert ($userid, $jmember, $ka, $sisahu, $sponsor, $userid, $userid, 'ka', ($level+1), $hariini)) $error = 0; 
				else $error=1;
				}	
			
/*
		$trTxt	= "
			INSERT INTO g_transaksi (
				id,
				userid,
				pembeliid,
				tgltransaksi,
				waktutransaksi,
				tglapprove,
				waktuapprove,
				alamatdelivery,
				status
			)
			VALUES (
				NULL,
				'".$userid."',
				'".$payby."',
				'".$tglaktif."',
				'".$waktuaktif."',
				'".$tglaktif."',
				'".$waktuaktif."',
				'".$alamatdelivery."',
				'0'
			)		
			";
	
		$trQry	= mysql_query( $trTxt );
		$trID	= mysql_insert_id();
		$jproduk= '1';
		
		$trdTxt	= "
			INSERT INTO g_transaksidetail (
				id,
				transaksiid,
				produkid,
				unitqty,
				status
			)
			VALUES (
				NULL,
				'".$trID."',
				'".$jproduk."',
				'".$jmlproduk."',
				'1'
			)			
			";
	
	$trdQry	= mysql_query( $trdTxt );
*/		
	// SELESAI PROSES INPUTING
	
	// MULAI PROSES PEMBAYARAN 

	//	$needPIN		
	//	$needReg		
	$payTxt		= "
		INSERT INTO g_wcash (
		  id,
		  userid,
		  parentid,
		  jtransaksi,
		  jasal,
		  dari,
		  nilai,
		  tglinput,
		  waktuinput,
		  tglapprove,
		  waktuapprove,
		  sthold,
		  status,
		  remark	
		)
		VALUES (
		  NULL,
		  '".$payby."',
		  '".$payby."',
		  '3',
		  '1',
		  '".$userid."',
		  '".$trxvalue."',
		  '".$tgldaftar."',
		  '".$waktudaftar."',
		  '".$tgldaftar."',
		  '".$waktudaftar."',
		  '0',
		  '1',
		  'Registrasi - ".$userid."'		
		)
	
	";
//echo $payTxt;
	$payQry	= mysql_query( $payTxt );

	if(!$payQry) $error = 1;
	

	$pointTxt		= "
		INSERT INTO g_wpoint (
		  id,
		  userid,
		  parentid,
		  jtransaksi,
		  jasal,
		  dari,
		  nilai,
		  tglinput,
		  waktuinput,
		  tglapprove,
		  waktuapprove,
		  sthold,
		  status,
		  remark	
		)
		VALUES (
		  NULL,
		  '".$userid."',
		  '".$userid."',
		  '0',
		  '0',
		  '".$userid."',
		  '".$jmlPoint."',
		  '".$tgldaftar."',
		  '".$waktudaftar."',
		  '".$tgldaftar."',
		  '".$waktudaftar."',
		  '0',
		  '1',
		  'Registrasi - ".$userid."'		
		)
	
	";
//echo $payTxt;
	$pointQry	= mysql_query( $pointTxt );

	if(!$pointQry) $error = 1;


	// SELESAI PROSES PEMBAYARAN
	
			if($simpan and $error=='0') {
				echo 'success|'.$userid;
				include('dKomisi.php');
				
	
	
				$myUserData=mysql_fetch_array(mysql_query("SELECT * FROM g_member WHERE userid='".$myUserID."'"));
				
				$msg1=mysql_fetch_array(mysql_query("SELECT * FROM g_temail WHERE id='1'"));
	
	
				$to1		= $email;
				$subject1	= T_('New Member Info').' '.mysql_real_escape_string($_POST["nmmember"]);
				$message1	= nl2br(
					str_replace('[userid]', $myUserID, 
					str_replace('[password]', $myUserData["xpass"], 
					str_replace("[nmmember]", mysql_real_escape_string($myUserData["nmmember"]), 
					str_replace('[nmsponsor]', $myUserData["nmmember"], 
					str_replace('[mailsponsor]', $myUserData["email"], 
					str_replace('[hpsponsor]', $myUserData["nohp1"],
					str_replace('[urllink]','<a href="'.$bsMbrlink.'">Login Now</a>', 
					
					$msg1["cttemplate"]
					
					))))))));
	
				$headers1	= 'MIME-Version: 1.0' . "\r\n";
				$headers1	.= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
				$headers1	.= 'From: '.$namaperusahaan.' <info@sejutamobil.com>' . "\r\n" .
				'Reply-To: info@sejutamobil.com' . "\r\n" .
				'X-Mailer: PHP/' . phpversion();
				$result1 = mail($to1, $subject1, $message1, $headers1);
				
				//include("dKomisi.php");
	
			
			}
			else echo $errTxt.'002';	
	}
//	else echo T_("");	
		}
		else echo T_("Password yang dimasukkan Tidak Cocok")."!!!"; //.$jmlpin;
	}
	else echo T_("ID Sponsor salah. Mohon gunakan ID Sponsor lain."); //.$jmlpin;
}
else echo T_("User ID sudah Ada atau tidak valid. Mohon gunakan User ID yang lain.");
}
else echo T_("Password yang Anda Masukkan Salah.");
} else echo T_("Saldo eWallet Tidak Mencukupi.");
//}
//else echo T_("Use Only Numbers for Phone Number ID.");

?>