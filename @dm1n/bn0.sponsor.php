<?php
include_once('includes/config.php');

	$jkomisi = $komisiid;
//	echo $refno;
	
	if( isset( $toDay ) and isset( $dt ) and isset( $toTime ) and isset( $refno ) ) {
	

		$cTxt = "
			SELECT 
				a.*, 
				b.hargavl,
				c.cid
			FROM g_member a
			LEFT JOIN g_jpackage b ON a.jpackage = b.id
			LEFT JOIN (
				SELECT 
					useridx, 
					count(id) cid
				FROM g_wfund
				WHERE 	jkomisi 		= '".$jkomisi."'
				GROUP BY useridx
				) c ON a.userid = c.useridx
			WHERE		a.parentstatus	= '1'
				AND		a.staktif		= '1'
				AND		a.jpackage		!='0'
				AND		a.freeacc		= '0'
				AND		a.status		= '1'
				AND 	c.cid IS NULL
			";
//echo $cTxt.'<br/>';
	if( $tEcho == '1' ) 	echo nl2br($cTxt)."<br/>";

		$cQry = mysqli_query($cTxt);
		
		while( $cRow = mysqli_fetch_array($cQry) ) {
			
			$uniTxt = "
				SELECT 
					a.*,
					c.lvl01, 
					c.lvl02, 
					c.lvl03, 
					c.lvl04, 
					c.lvl05, 
					c.lvl06, 
					c.lvl07 
				FROM g_unilevel a
				LEFT JOIN g_member b ON a.unplid = b.userid
				LEFT JOIN g_jpackage c ON b.jpackage = c.id
				WHERE a.userid='".$cRow["userid"]."'
				ORDER BY unplreverse ASC
				LIMIT 0,7
				";
//			echo $uniTxt.'<br/>';
			$uniQry = mysqli_query( $uniTxt );
			
			
			$j = 1;
			
			while( $uniRow = mysqli_fetch_array( $uniQry ) and $j <= 7 ) {

			$uniPrc[1]	= $uniRow["lvl01"];
			$uniPrc[2]	= $uniRow["lvl02"];
			$uniPrc[3]	= $uniRow["lvl03"];
			$uniPrc[4]	= $uniRow["lvl04"];
			$uniPrc[5]	= $uniRow["lvl05"];
			$uniPrc[6]	= $uniRow["lvl06"];
			$uniPrc[7]	= $uniRow["lvl07"];

				$jenis	= '1';
				$tglinput 	= $cRow["tglaktif"];
				$waktuinput = $cRow["waktuaktif"];
				$userid 	= $uniRow["unplid"];
				$kontrakid	= '';
			
				$toID	= $cRow["userid"];	
		
				
				$trxprc	= $uniPrc[$j];
				
				$vreq		= ( $trxprc /100 ) * $cRow["usdvalue"];
				$kursvalue	= $cRow["kursvalue"];
				$idrvalue	= ( $trxprc /100 ) * $cRow["idrvalue"];
				//$uniPrc	= $uniRow["sponsorprc"];
				$remark	= $nmjkomisi.' Bonus from '.$toID;
//				echo $trxprc;
	if( $trxprc>'0' ) {
				$tqry1 = "
						INSERT INTO g_wfund (
							id,
							refno,
							parentid,
							userid,
							useridx,
							jtransaksi,
							jtransaksix,
							jkomisi,
							trxprc,
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
							'',
							'".$userid."',
							'".$userid."',
							'".$toID."',
							'0',
							'".$jenis."',
							'".$jkomisi."',
							'".$trxprc."',
							'".$vreq."',
							'".$kursvalue."',
							'".$idrvalue."',							
							'".$tglinput."',
							'".$waktuinput."',
							'".$tglinput."',
							'".$waktuinput."',
							'".$remark."',
							'1'
							)
						";

			if( $tEcho == '1' ) 				echo $tqry1.'<br/>';
			$simpan1 = mysqli_query($tqry1);
			$xid1	 = mysql_insert_id();
			$refno1	 = $refno.$xid1; 
			$uQry1	 = "UPDATE g_wfund SET refno='".$refno1."' WHERE id='".$xid1."'";
			$update1 = mysqli_query($uQry1);
			if($simpan1 and $update1) $tError = 0; else $tError = 1;
	
			if($tEcho=='1') echo $sTxt."<br/>";	
				}
			$j++;
			}

		}
		
			if($tEcho=='1') echo $cTxt."<br/>";
		if($tEcho=='1') echo 'bn.sponsor Successed<br/>';
	}
	else if($tEcho=='1') echo 'bn.sponsor Failed<br/>';