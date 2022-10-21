<?php

	include_once( 'includes/config.php' );

	$minSps	= 2;
	//$dt		= $_GET["dt"];
	$tm		= "01:00:00";
	$jkomisi= $komisiid;
	$jenis	= '1';

	$where0	= "";
	$day	= date( 'd', strtotime( $dt ) );	
	$eoMonth= date( 'Y-m-t', strtotime( $dt ) );
	
	if( $dt == $eoMonth )	$where0 .= " AND a.tglro >= '".$day."'";
	else $where0 .= " AND a.tglro = '".$day."'";

	$lastYearMonth	= date('Y-m', strtotime( substr($dt,0,-3)." -1 MONTH " ) );
	$lastMonthEOM	= date('Y-m-t',strtotime($lastYearMonth));
	if( $lastYearMonth."-".$day > $lastMonthEOM ) $tglmulai = $lastMonthEOM;
	else $tglmulai	= $lastYearMonth."-".$day;

	$reqTxt	= "
		SELECT a.*, b.tglinput, c.cid, d.did
		FROM g_member a
		LEFT JOIN g_wfund b ON a.userid = b.userid AND b.useridx = 'buypackage'
		LEFT JOIN (
			SELECT x.sponsor, COUNT(x.userid) cid 
			FROM g_member x
			LEFT JOIN g_wfund y ON x.userid = y.userid AND y.useridx = 'buypackage'
			WHERE x.staktif = '1' AND x.jpackage>'0' AND y.tglinput < '".$dt."'
			GROUP BY x.sponsor
			) c ON a.userid = c.sponsor
		LEFT JOIN (
			SELECT 
				userid, 
				count(id) did
			FROM g_wfund
			WHERE 	jkomisi 		= '".$jkomisi."' AND tglinput = '".$dt."'
			GROUP BY userid
			) d ON a.userid = d.userid
		WHERE a.staktif = '1' AND a.jpackage>'0' AND c.cid >= '".$minSps."' AND b.tglinput < '".$dt."' AND d.did IS NULL
		".$where0;

echo nl2br($reqTxt).'<br/>';

	$reqQry	= mysqli_query( $reqTxt );

//echo "antara ".$tglmulai." dan ".$dt."<br/>";

	while( $reqRow = mysqli_fetch_array( $reqQry ) ) {
		
		$sponsor= $reqRow["userid"];
		
		$unTxt	= "
			SELECT y.userid, y.sponsor, (IFNULL(x.jtrxvalue,0) + IFNULL(z.trxvalue,0) + IFNULL(xx.vlsisa,0) ) ttlvalue, z.trxvalue 
			FROM g_member y
			LEFT JOIN  (
				SELECT a.unplid, SUM(b.trxvalue) jtrxvalue
				FROM g_unilevel a
				LEFT JOIN g_wfund b 
					ON a.userid = b.userid 
						AND b.useridx='buypackage' 
						AND b.tglinput>='".$tglmulai."' 
						AND b.tglinput<'".$dt."'
				GROUP BY a.unplid
				) x ON x.unplid = y.userid
			LEFT JOIN g_wfund  z 
				ON y.userid = z.userid 
					AND z.useridx='buypackage' 
					AND z.tglinput>='".$tglmulai."' 
					AND z.tglinput<'".$dt."'
			LEFT JOIN g_passnext xx 
				ON y.userid = xx.dari 
					AND y.sponsor = xx.userid 
					AND xx.tglinput>='".$tglmulai."' 
					AND xx.tglinput<'".$dt."'
					AND xx.status	= '0'
			WHERE y.sponsor = '".$sponsor."'
			GROUP BY y.userid
			ORDER BY ttlvalue DESC
			";
//echo nl2br($unTxt).'<br/>';
		
		$unQry	= mysqli_query( $unTxt );
		
		$x	= 1;
		$usUnilevel	= "";
		$vlUnilevel = "";
		$tmpKkKecil = 0;
		$tmpKkBesar = 0;
		$finKkKecil = 0;
		$finKkBesar = 0;
		$tpKkKecil	= 0;
		
		
		
		while( $unRow	= mysqli_fetch_array( $unQry ) ) {
			
			$usUnilevel[$x]	= $unRow["userid"];
			$vlUnilevel[$x]	= $unRow["ttlvalue"];
			if($x>1)$tmpKkKecil += $unRow["ttlvalue"];
			if($x==1) $tmpKkBesar = $unRow["ttlvalue"];
			$x++;
		}
		
		//echo $tmpKkKecil." | ".$tmpKkBesar.'<br/>';
		
		if( $tmpKkKecil>$tmpKkBesar ) {
			$finKkKecil	= $tmpKkBesar;
			$finKkBesar = $tmpKkKecil;
			$tpKkKecil	= 1;
		}
		else {
			$finKkKecil	= $tmpKkKecil;
			$finKkBesar = $tmpKkBesar;
			$tpKkKecil	= 0;
			
		}
		
		//echo $finKkKecil." | ".$finKkBesar.'<br/>';
		
		$jrTxt	= "SELECT * FROM g_jranking WHERE status = '1' ORDER BY (reqvl*1) DESC";
		$jrQry	= mysqli_query( $jrTxt );
		
		$stQualified = 0;
		$vlQualified = 0;
		$prcQualified= 0;
		$trxvalue	 = 0;
		$idQualified = '';
		$ijQualified = 1;
		
		while( $jrRow = mysqli_fetch_array( $jrQry ) and $stQualified==0 ) {
			if( $finKkKecil>=$jrRow["reqvl"] ) {
				$stQualified = 1;
				$vlQualified = $jrRow["reqvl"];
				$idQualified = $jrRow["id"];
				$prcQualified= $jrRow["prcjranking"];
				$vreq	 = ($prcQualified/100) * $finKkKecil;
				$remark		= $nmjkomisi." - ".date('d M Y H:i:s', strtotime( $dt." ".$tm ));
			}
			else $ijQualified++;
		}
		
		
		
		//echo $ijQualified.": ".$stQualified." | ".$vlQualified." | ".$idQualified.'<br/>';
		
		$updPassNextTxt	= "UPDATE g_passnext SET status='1' WHERE userid='".$sponsor."' AND tglinput < '".$dt."'";
		$updPassNextQry = mysqli_query( $updPassNextTxt );

		if( $stQualified == 1 ) {
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
							status,
							jrank
							)
						VALUES (
							NULL,
							'',
							'".$sponsor."',
							'".$sponsor."',
							'',
							'0',
							'".$jenis."',
							'".$jkomisi."',
							'".$prcQualified."',
							'".$vreq."',
							'".$rankExch."',
							'".( $vreq * $rankExch )."',
							'".$dt."',
							'".$tm."',
							'".$dt."',
							'".$tm."',
							'".$remark."',
							'1',
							'".$idQualified."'
							)
						";

			//if( $tEcho == '1' ) 	
		//echo $tqry1.'<br/>';
			$simpan1 = mysqli_query($tqry1);
			$xid1	 = mysql_insert_id();
			$refno1	 = $refno.$xid1; 
			$uQry1	 = "UPDATE g_wfund SET refno='".$refno1."' WHERE id='".$xid1."'";
			$update1 = mysqli_query($uQry1);
			if($simpan1 and $update1) $tError = 0; else $tError = 1;
			if($tEcho=='1') echo $sTxt."<br/>";	
			
			if( $tpKkKecil == 1 ) {
				
			$sisa	= $finKkKecil;
					
			for( $k=sizeof($usUnilevel); $k>=2; $k-- ) {
				//echo $k.'<br/>';
				if( $sisa >= $vlUnilevel[$k] ) {
					$insValue = 0;
					$sisa	  = $sisa - $vlUnilevel[$k];
				}
				else {
					$insValue	= $vlUnilevel[$k] - $sisa;
					$sisa = 0;
				}
				
				if( $ijQualified == 1 ) $insValue = 0; 
				
				if( $insValue>0 ) {
				$pnTxt = "
					INSERT INTO g_passnext (
						id,
						wfundid,
						userid,
						parentid,
						dari,
						tglinput,
						waktuinput,
						vlsisa,
						status
					)
					VALUES (
						NULL,
						'".$xid1."',
						'".$sponsor."',
						'".$sponsor."',
						'".$usUnilevel[$k]."',
						'".$dt."',
						'".$tm."',
						'".xNumber( $insValue )."',
						'0'
					)
					";
				$pnQry	= mysqli_query($pnTxt);
				}
			}
			}
			else if( $tpKkKecil == 0 ) {
				$pnTxt = "
					INSERT INTO g_passnext (
						id,
						wfundid,
						userid,
						parentid,
						dari,
						tglinput,
						waktuinput,
						vlsisa,
						status
					)
					VALUES (
						NULL,
						'".$xid1."',
						'".$sponsor."',
						'".$sponsor."',
						'".$usUnilevel[1]."',
						'".$dt."',
						'".$tm."',
						'".xNumber( $vlUnilevel[1] - $vlQualified  )."',
						'0'
					)
					";
				$pnQry	= mysqli_query($pnTxt);
			}
			
			}		
		else if( $stQualified == 0 ) {
			
			for( $k=1; $k<=sizeof($usUnilevel); $k++ ) {
				if( $vlUnilevel[$k]>0 ) {
				$pnTxt = "
					INSERT INTO g_passnext (
						id,
						wfundid,
						userid,
						parentid,
						dari,
						tglinput,
						waktuinput,
						vlsisa,
						status
					)
					VALUES (
						NULL,
						'0',
						'".$sponsor."',
						'".$sponsor."',
						'".$usUnilevel[$k]."',
						'".$dt."',
						'".$tm."',
						'".xNumber( $vlUnilevel[$k] )."',
						'0'
					)
					";
				$pnQry	= mysqli_query($pnTxt);
				}
			}
			
		}
		
	}
