<?php
//include_once('includes/config.php');
//echo 'xxx';
	if($tEcho=='1') echo "jmember=".$rank."|<br/>";
	if( $rank != '' ) {
		$hariini = date('Y-m-d H:i:s');
		$tglinput= date('Y-m-d', strtotime($hariini));
		$waktuinput= date('H:i:s', strtotime($hariini));
		
		$trxvalue = 0;
		//if($tEcho=='1') echo print_r($jmember[$rank]).'<br/>';
		//if($tEcho=='1') echo "REBATE: ".$jmember[$rank]["rebate"].'<br/>';
		$trxprc = '';
		$trxvalue = $jLot * $jmember[$rank]["lotsbonus"];
		$remark	= $nmjkomisi." - ".$jLot." Lot/s";
		//echo $usrprc;
		
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
							'".$dari."',
							'".$dari."',
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
	
		if($tEcho=='1') echo 'bn.lotsrebate.php Successed<br/>';
	}
	else if($tEcho=='1') echo 'bn.lotsrebate.php Failed<br/>';