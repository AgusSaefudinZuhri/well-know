<?php
	include( 'includes/config.php' );
	
	$hariini	= date( 'Y-m-d H:i:s' );
	$tglaktif	= date( 'Y-m-d', strtotime( $hariini ) );
	$waktuaktif	= date( 'H:i:s', strtotime( $hariini ) );
	$refno		= date( 'YmdHis', strtotime( $hariini ) );

	switch( $_GET["a"] ) {
		case "1" :
			
			$userid 	= $_GET["id"];
			$useridx 	= mysql_real_escape_string( $_POST["useridx"] );
			$trxvalue 	= xNumber( $_POST["trxvalue"] );
			$remark2 	= mysql_real_escape_string( $_POST["remark2"] );

			$cekPassTxt		= "SELECT * FROM g_member WHERE userid='".$_SESSION["userid"]."'";
			$cekPassQry		= mysql_query($cekPassTxt);
			$cekPassRow		= mysql_fetch_array( $cekPassQry );
		
			if(sha1($_POST["password2"])==$cekPassRow["password2"]) {
		
					$insTxt1	= "
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
						  remark2,
						  status		
						)
						VALUES (
						  NULL,
						  '',
						  '".$userid."',
						  '".$userid."',
						  '".$useridx."',
						  '1',
						  '1',
						  '".$trxvalue."',
						  '".$tglaktif."',
						  '".$waktuaktif."',
						  '".$tglaktif."',
						  '".$waktuaktif."',
						  'Transfer to ".$useridx."',
						  '".$remark2."',
						  '1'		
						);
					";
						
					$insQry1	= mysql_query( $insTxt1 );
					
					$id		= mysql_insert_id();
					$refno1	= $refno.$id;
					$updTxt1= "UPDATE g_wfund SET refno='".$refno1."' WHERE id='".$id."'";
					$updQry1= mysql_query( $updTxt1 );

					$insTxt2	= "
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
						  remark2,
						  status		
						)
						VALUES (
						  NULL,
						  '".$refno1."',
						  '".$useridx."',
						  '".$useridx."',
						  '".$userid."',
						  '0',
						  '1',
						  '".$trxvalue."',
						  '".$tglaktif."',
						  '".$waktuaktif."',
						  '".$tglaktif."',
						  '".$waktuaktif."',
						  'Received from ".$useridx."',
						  '".$remark2."',
						  '1'		
						);
					";
				
				$insQry2	= mysql_query( $insTxt2 );

//				echo $insTxt1. " ". $insTxt2;
				if( $insQry1 and  $insQry2 ) echo 'success';
				else echo T_("There are errors in process. If the problem persists, please contact The Administrator"); 
			}
		
		break; 	

		case "2" :
			
			$userid 	= $_GET["id"];
			$useridx 	= 'bonuswd';
			$trxvalue 	= xNumber( $_POST["trxvalue"] );
			$remark2 	= '';
			$jkomisi	= $_GET["k"];

			$cekPassTxt		= "SELECT * FROM g_member WHERE userid='".$_SESSION["userid"]."'";
			$cekPassQry		= mysql_query($cekPassTxt);
			$cekPassRow		= mysql_fetch_array( $cekPassQry );
		
			if(sha1($_POST["password2"])==$cekPassRow["password2"]) {
				
				$kTxt	= "SELECT * FROM g_jkomisi WHERE id='".$jkomisi."'";
				$kQry	= mysql_query( $kTxt );
				$kRow	= mysql_fetch_array( $kQry );
				$nmjkomisi = $kRow["nmjkomisi"];

					$insTxt1	= "
						INSERT INTO g_komisi (
						  id,
						  refno,
						  parentid,
						  userid,
						  useridx,
						  jtransaksi,
						  jtransaksix,
						  jkomisi,
						  trxvalue,
						  tgltransaksi,
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
						  '".$useridx."',
						  '1',
						  '2',
						  '".$jkomisi."',
						  '".$trxvalue."',
						  '".$tglaktif."',
						  '".$tglaktif."',
						  '".$waktuaktif."',
						  '".$tglaktif."',
						  '".$waktuaktif."',
						  'Withdrawal - ".$nmjkomisi."',
						  '1'		
						);
					";
						
					$insQry1	= mysql_query( $insTxt1 );
					
					$id		= mysql_insert_id();
					$refno1	= $refno.$id;
					$updTxt1= "UPDATE g_komisi SET refno='".$refno1."' WHERE id='".$id."'";
					$updQry1= mysql_query( $updTxt1 );

					$insTxt2	= "
						INSERT INTO g_wfund (
						  id,
						  refno,
						  parentid,
						  userid,
						  useridx,
						  jtransaksi,
						  jtransaksix,
						  jkomisi,
						  trxvalue,
						  tglinput,
						  waktuinput,
						  tglapprove,
						  waktuapprove,
						  remark,
						  remark2,
						  status		
						)
						VALUES (
						  NULL,
						  '".$refno1."',
						  '".$userid."',
						  '".$userid."',
						  '".$useridx."',
						  '0',
						  '1',
						  '".$jkomisi."',
						  '".$trxvalue."',
						  '".$tglaktif."',
						  '".$waktuaktif."',
						  '".$tglaktif."',
						  '".$waktuaktif."',
						  'Received - ".$nmjkomisi."',
						  '".$remark2."',
						  '1'		
						);
					";
				
				$insQry2	= mysql_query( $insTxt2 );

//				echo $insTxt1. " ". $insTxt2;
				if( $insQry1 and  $insQry2 ) echo 'success';
				else echo T_("There are errors in process. If the problem persists, please contact The Administrator"); 
			}
		
		break; 	

	case "3" :
	
			$userid = $_GET["id"];
			$cekPassTxt		= "SELECT * FROM g_member WHERE userid='".$_SESSION["userid"]."'";
			$cekPassQry		= mysql_query($cekPassTxt);
			$cekPassRow		= mysql_fetch_array( $cekPassQry );
		
			if(sha1($_POST["password2"])==$cekPassRow["password2"]) {
				$vreq   = xNumber($_POST["vreq"]);
				$vreqcv = xNumber($_POST["vreqcv"]);
				$byadmin= xNumber($_POST["byadmin"]);
				$remark2= mysql_real_escape_string( $_POST["remark2"] );

				$dt		= date('Y-m-d');
				$tm		= date('H:i:s');
				$refno	= date('YmdHis');
				$toID1	= 'withdrawal';
				$toID2	= 'admincharge';

					$tqry1="
							INSERT INTO g_wfund (
								id,
								refno,
								parentid,
								userid,
								useridx,
								jtransaksi,
								jtransaksix,
								trxvalue,
								kursvalue,
								idrvalue,
								tglinput,
								waktuinput,
								tglapprove,
								waktuapprove,
								remark,
								remark2,
								status
							)
							VALUES (
								NULL,
								'',
								'".$userid."',
								'".$userid."',
								'".$toID1."',
								'1',
								'3',
								'".xNumber( $vreqcv )."',
								'',
								'',								
								'".$dt."',
								'".$tm."',
								'',
								'',
								'Withdrawal',
								'".$remark2."',
								'0'
							)
						";
//				echo $tqry1;
				
				$simpan1 = mysql_query($tqry1);
				$xid1	 = mysql_insert_id();
				$refno1	= $refno.$xid1; 
				$uQry1	 = "UPDATE g_wfund SET refno='".$refno1."' WHERE id='".$xid1."'";
				$update1 = mysql_query($uQry1);	
									
					$tqry2="
							INSERT INTO g_wfund (
								id,
								refno,
								parentid,
								userid,
								useridx,
								jtransaksi,
								jtransaksix,
								trxvalue,
								kursvalue,
								idrvalue,								
								tglinput,
								waktuinput,
								tglapprove,
								waktuapprove,
								remark,
								status
							)
							VALUES (
								NULL,
								'".$refno1."',
								'".$userid."',
								'".$userid."',
								'".$toID2."',
								'1',
								'3',
								'".$byadmin."',
								'',								
								'',
								'".$dt."',
								'".$tm."',
								'',
								'',
								'Admin Fee',
								'0'
							)
						";
//				echo $tqry1;
				
				$simpan2 = mysql_query($tqry2);

				if( $simpan1 and $update1 and $simpan2 ) {
					echo 'success';
				}
				else echo T_("There are errors in process. If the problem persists, please contact The Administrator"); 
			}
			else echo T_("The Current Pasword is not Match!!!");

		break;
	}
	
	