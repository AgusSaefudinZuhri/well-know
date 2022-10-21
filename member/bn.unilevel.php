<?php
//include_once('includes/config.php');

		$hariini = date('Y-m-d H:i:s');
		$tglinput= date('Y-m-d', strtotime($hariini));
		$waktuinput= date('H:i:s', strtotime($hariini));
		
		$trxvalue = 0;
		//echo print_r($jpackage[$jpackageIni]).'<br/>';
	
			
			$uniTxt = "
				SELECT 
					a.*,
					b.nmmember nmunpl,
					c.cid
				FROM g_unilevel a
				LEFT JOIN g_member b ON a.unplid = b.userid
				LEFT JOIN ( 
					SELECT sponsor, COUNT(userid) cid 
					FROM g_member 
					GROUP BY sponsor ) c ON c.sponsor = a.unplid
				WHERE a.userid='".$dari."'
				GROUP BY a.id
				ORDER BY unplreverse ASC
				LIMIT 0,10
				";
			if($tEcho=='1') echo $uniTxt.'<br/>';
			$uniQry = mysqli_query( $uniTxt );
			
			
			while( $uniRow = mysqli_fetch_array( $uniQry ) ) {
				
				
				for($ju=sizeof($junilevel); $ju>0; $ju-- ) {
					if( $uniRow["cid"] >= $junilevel[$p]["minsponsor"] ) {
						$ketemuUni = 1;
						$uniIni   = $ju;
						break;
					}
					//echo $ketemuPackage.'<br/>';

				}
				
				$trxprc = $junilevel[$uniIni]["lvl".sprintf('%02d', $uniRow["unplreverse"])];
				
				if( $trxprc > '0.00' ) {
				
				$usrprc = $trxprc/100;
				$trxvalue = $usrprc * $profit;
				$remark	= $nmjkomisi;
				

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
							tglinput,
							waktuinput,
							tglapprove,
							waktuapprove,
							remark,
							status,
							orderid
							)
						VALUES (
							NULL,
							'',
							'".$uniRow["unplid"]."',
							'".$uniRow["unplid"]."',
							'".$dari."',
							'0',
							'0',
							'".$jkomisiid."',
							'".$trxprc."',
							'".$trxvalue."',
							'".$tglinput."',
							'".$waktuinput."',
							'".$tglinput."',
							'".$waktuinput."',
							'".$remark."',
							'1',
							'".$orderid."'
							)
						";

			if( $tEcho == '1' ) 				echo $tqry1.'<br/>';
			$simpan1 = mysqli_query($tqry1);
			$xid1	 = mysql_insert_id();
			$refno1	 = $refno.$xid1; 
			$uQry1	 = "UPDATE g_wfund SET refno='".$refno1."' WHERE id='".$xid1."'";
			$update1 = mysqli_query($uQry1);
			if($simpan1 and $update1) $tError = 0; else $tError = 1;
					
				}
	
				}

		
		if($tEcho=='1') {
			if($tError==0) echo 'bn.unilevel.php Successed<br/>';
			else echo 'bn.unilevel.php Failed<br/>';
		}
