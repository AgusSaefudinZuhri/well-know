<?php


//Persiapan Data

$bQry = mysql_query("SELECT * FROM g_jkomisi WHERE status='1' AND freqjkomisi='1' ORDER BY id");


	
while($bRow=mysql_fetch_array($bQry)) {
	
	$jkomisi[]	= array(
			"jkomisiid" => $bRow["id"],
			"nmjkomisi" => $bRow["nmjkomisi"],
			"scrjkomisi"=> $bRow["scrjkomisi"]
		);
	
}

//echo print_r($jkomisi);

$pQry = mysql_query("SELECT * FROM g_jpackage WHERE status='1' ORDER BY (minvalue*1) ASC");

	$xjp =1;
while($pRow=mysql_fetch_array($pQry)) {
	
	$jpackage[$xjp]	= array(
			"jpackageid" => $pRow["id"],				
			"nmjpackage" => $pRow["nmjpackage"],		
			"minvalue"	 => $pRow["minvalue"],
			"usrprc" 	 => $pRow["usrprc"],
			"mgrprc"	 => $pRow["mgrprc"],
			"rebate"	 => $pRow["rebate"]
		
		);
	$xjp++;
}

//echo print_r($jpackage);

$uQry = mysql_query("SELECT * FROM g_junilevel WHERE status='1' ORDER BY (minsponsor*1) ASC");

$u = 1;
while($uRow=mysql_fetch_array($uQry)) {
	
	$junilevel[$u]	= array(
			"junilevelid"=> $uRow["id"],				
			"nmjunilevel"=> $uRow["nmjunilevel"],		
			"minsponsor" => $uRow["minsponsor"],
			"lvl01" 	 => $uRow["lvl01"],
			"lvl02" 	 => $uRow["lvl02"],
			"lvl03" 	 => $uRow["lvl03"],
			"lvl04" 	 => $uRow["lvl04"],
			"lvl05" 	 => $uRow["lvl05"],
			"lvl06" 	 => $uRow["lvl06"],
			"lvl07" 	 => $uRow["lvl07"],
			"lvl08" 	 => $uRow["lvl08"],
			"lvl09" 	 => $uRow["lvl09"],
			"lvl10"	 	 => $uRow["lvl10"],
			"rbt01" 	 => $uRow["rbt01"],
			"rbt02" 	 => $uRow["rbt02"],
			"rbt03" 	 => $uRow["rbt03"],
			"rbt04" 	 => $uRow["rbt04"],
			"rbt05" 	 => $uRow["rbt05"],
			"rbt06" 	 => $uRow["rbt06"],
			"rbt07" 	 => $uRow["rbt07"],
			"rbt08" 	 => $uRow["rbt08"],
			"rbt09" 	 => $uRow["rbt09"],
			"rbt10"	 	 => $uRow["rbt10"]
		);
	$u++;
}

//echo print_r($junilevel);


	$jmember = array(
			"DIV" => array( "mgrbonus" => "1.5", "lotsbonus" => "1.0" ),
			"BUS" => array( "mgrbonus" => "3.0", "lotsbonus" => "1.5" ),
			"SNR" => array( "mgrbonus" => "4.5", "lotsbonus" => "2.0" )
		
		);
		
//echo print_r($jmember);
	$start = date('Y.m.d 00:00:00', strtotime($toDay." -1 DAY"));
	$end = date('Y.m.d 23:59:59', strtotime($toDay." -1 DAY"));

	$kmTxt	= "
		SELECT a.*, b.cid 
		FROM g_csv a
		LEFT JOIN ( SELECT csvid, count(id) cid FROM g_csvdt WHERE csvclosetime BETWEEN '".$start."' AND '".$end."' GROUP BY csvid ) b ON a.id = b.csvid
		WHERE a.status = '0'
		GROUP BY a.id
		HAVING b.cid > '0'
		";

//echo $kmTxt.'<br/>';
	$kmQry = mysql_query( $kmTxt );

	while( $kmRow = mysql_fetch_array($kmQry)) {
		
		$tglwaktumulai = date('Y-m-d H:i:s');
		echo $tglwaktumulai.'<br/>';
		
		$dtTxt	= "
			SELECT a.*, IFNULL(b.userid,'null') userid, IFNULL(c.jmemberid,'') trank, IFNULL(d.jdeposit, '0') jdeposit
			FROM g_csvdt a
			LEFT JOIN g_extroakun b ON a.csvlogin = b.extakunid
			LEFT JOIN g_member c ON b.userid = c.userid
			LEFT JOIN ( SELECT userid, SUM(fintrxvalue) jdeposit FROM g_wmt4 WHERE jtransaksi='0' AND jtransaksix='0' GROUP BY userid ) d ON b.userid = d.userid
			WHERE ( a.csvclosetime BETWEEN '".$start."' AND '".$end."' ) AND a.csvid = '".$kmRow["id"]."' AND a.status='0' AND b.userid IS NOT NULL
			";
			//AND b.userid IS NOT NULL
//echo $dtTxt;
		$dtQry	= mysql_query($dtTxt);
		
		while($dtRow = mysql_fetch_array($dtQry)) {
			
			$jkomisiid		= '';
			$nmjkomisi		= '';
			$ketemuPackage  = 0;
			$jpackageIni	= 0;
			$orderid	= $dtRow["csvdeal"];
			$dari		= $dtRow["userid"];
			
			//$dari = 'member01'; // ini cuma utk test

			
			$jLot		= $dtRow["csvvolume"];
			$profit		= $dtRow["csvprofit"];
			$jdeposit	= $dtRow["jdeposit"];
			$rank		= $dtRow["trank"]; 
			
			//$rank	= "DIV"; //ini cuma untuk test
			//echo sizeof($jpackage);
			
			for($p=sizeof($jpackage); $p>0; $p-- ) {
				//echo print_r($jpackage[$p]);
				//echo "Deposit: ".$p." ".$jdeposit .">=". $jpackage[$p]["minvalue"]."<br/>";
				if( $jdeposit >= $jpackage[$p]["minvalue"] ) {
					$ketemuPackage = 1;
					$jpackageIni   = $p;
					break;
				}
				echo "ketemupaket=".$ketemuPackage.'<br/>';
				
			}
			//if( $ketemuPackage == 0 ) $jpackageIni = 1; ///ini untuk ujicoba aja
				
			echo $orderid."|".$jLot."|".$profit."|".$dari."|".$rank."|".$jdeposit."|".'<br/>';
			
			for($k=0; $k<sizeof($jkomisi); $k++) {
				$jkomisiid = $jkomisi[$k]["jkomisiid"];
				$nmjkomisi = $jkomisi[$k]["nmjkomisi"];
				echo $jkomisi[$k]["scrjkomisi"].'<br/><br/>';
				include($jkomisi[$k]['scrjkomisi']);
			}
			
		}

		
		$tglwaktuselesai = date('Y-m-d H:i:s');
		
		$upd1Txt = "
			UPDATE g_csv 
			SET status		= '11',
				tglmulai	= '".date('Y-m-d', strtotime($tglwaktumulai))."',
				waktumulai	= '".date('H:i:s', strtotime($tglwaktumulai))."',
				tglselesai	= '".date('Y-m-d', strtotime($tglwaktuselesai))."',
				waktuselesai= '".date('H:i:s', strtotime($tglwaktuselesai))."'
			WHERE id = '".$kmRow["id"]."'";
		mysql_query($upd1Txt);
		$upd2Txt = "
			UPDATE g_csvdt 
			SET status		= '11'
			WHERE csvid = '".$kmRow["id"]."'";
		mysql_query($upd2Txt);
		
		//echo $tglwaktuselesai.'<br/>';
		
	}
	//echo $kmTxt;
//echo date('Y-m-d H:i:s', strtotime(str_replace(".","-","2019.03.04 03:56:12")));

?>