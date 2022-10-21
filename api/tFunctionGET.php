<?php

	include_once( "tFunction.php" );

function getBalance( $idAkun ) {
	global $devStatus;
	
	switch( $devStatus ) {
		case "0": 
			$tURL	= "api/mtserver/GetBalance/".$idAkun;
			break;

		case "1": 
			$tURL	= "getResponse.php?a=getbalance&id=".$idAkun;
			break;

	}
	return $tURL;
}