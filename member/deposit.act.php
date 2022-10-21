<?php
	include( 'includes/config.php' );
	include_once("../api/tFunction.php");
	include_once("../api/tFunctionGET.php");
	
	$hariini	= date( 'Y-m-d H:i:s' );
	$tglaktif	= date( 'Y-m-d', strtotime( $hariini ) );
	$waktuaktif	= date( 'H:i:s', strtotime( $hariini ) );
	$refno		= date( 'YmdHis', strtotime( $hariini ) );

	switch( $_GET["a"] ) {

		case "0" :
			
			$userid 	= $_GET["id"];
			$useridx	= '';
			$fid		= $_GET["fid"];
			$trxvalue	= xNumber($_POST["trxvalue"]);
			$kursid		= $_POST["kursid"];
			$tgltrx		= $_POST["tgltrx"];
			$extakunid	= $_POST["extakunid"];
			$yourname	= mysql_real_escape_string($_POST["yourname"]);
			$yourbank	= mysql_real_escape_string($_POST["yourbank"]);
			$trxdoc		= mysql_real_escape_string( str_replace( "|","/", $_POST["trxdoc"]) );
		
			$insTxt1	= "
						INSERT INTO g_wmt4 (
						  	id,
							parentid,
							userid,
							useridx,
							jtransaksi,
							jtransaksix,
							trxvalue,
							kursid,
							tgltrx,
							tglinput,
							waktuinput,
							remark,
							status,
							extakunid,
							yourname,
							yourbank,
							trxdoc,
							jfinanceid
		
						)
						VALUES (
						  NULL,
						  '".$userid."',
						  '".$userid."',
						  '".$useridx."',
						  '0',
						  '0',
						  '".$trxvalue."',
						  '".$kursid."',
						  '".$tgltrx."',
						  '".$tglaktif."',
						  '".$waktuaktif."',
						  'Deposit',
						  '0',
						  '".$extakunid."',
						  '".$yourname."',
						  '".$yourbank."',
						  '".$trxdoc."',
						  '".$fid."'
						  
						);
					";
					//	echo $insTxt1;
					$insQry1	= mysql_query( $insTxt1 );
					
					$id		= mysql_insert_id();
					$refno1	= $refno.$id;
					$updTxt1= "UPDATE g_wmt4 SET refno='".$refno1."' WHERE id='".$id."'";
					$updQry1= mysql_query( $updTxt1 );


//				echo $insTxt1. " ". $insTxt2;
				if( $insQry1  ) echo 'success';
				else echo T_("There are errors in process. If the problem persists, please contact The Administrator"); 
		
		break; 	

		case "1" :
	$cari = getBalance($_POST["extakunid"]);
	//echo $cari;
	$hasil = get_contentGet( $cari );
	//echo $hasil;
	$getBalance = json_decode( $hasil, true );
	if( $getBalance["isSuccess"] ) $balance = $getBalance["balance"]; 
			else $balance = 0; 
			
			$userid 	= $_GET["id"];
			$useridx	= '';
			$fid		= $_GET["fid"];
			$trxvalue	= xNumber($_POST["trxvalue"]);
			$kursid		= $_POST["kursid"];
			$tgltrx		= $tglaktif;
			$extakunid	= $_POST["extakunid"];
			$yourname	= mysql_real_escape_string($_POST["yourname"]);
			$yourbank	= mysql_real_escape_string($_POST["yourbank"]);
			$trxdoc		= mysql_real_escape_string( str_replace( "|","/", $_POST["trxdoc"]) );
			//echo $trxvalue."<=".$balance;
		if($trxvalue<=$balance ) { //} and $trxvalue!='0') {
			$insTxt1	= "
						INSERT INTO g_wmt4 (
						  	id,
							parentid,
							userid,
							useridx,
							jtransaksi,
							jtransaksix,
							fintrxvalue,
							kursid,
							tgltrx,
							tglinput,
							waktuinput,
							remark,
							status,
							extakunid,
							yourname,
							yourbank,
							trxdoc,
							jfinanceid
		
						)
						VALUES (
						  NULL,
						  '".$userid."',
						  '".$userid."',
						  '".$useridx."',
						  '1',
						  '0',
						  '".$trxvalue."',
						  '".$kursid."',
						  '".$tgltrx."',
						  '".$tglaktif."',
						  '".$waktuaktif."',
						  'Withdrawal',
						  '0',
						  '".$extakunid."',
						  '".$yourname."',
						  '".$yourbank."',
						  '".$trxdoc."',
						  '".$fid."'
						  
						);
					";
					//	echo $insTxt1;
					$insQry1	= mysql_query( $insTxt1 );
					
					$id		= mysql_insert_id();
					$refno1	= $refno.$id;
					$updTxt1= "UPDATE g_wmt4 SET refno='".$refno1."' WHERE id='".$id."'";
					$updQry1= mysql_query( $updTxt1 );


//				echo $insTxt1. " ". $insTxt2;
				if( $insQry1  ) echo 'success';
				else echo T_("There are errors in process. If the problem persists, please contact The Administrator"); 
		} else echo T_("Invalid Value");
		
		break; 	

	}
	
	