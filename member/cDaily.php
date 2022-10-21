<?php
include_once('includes/config.php');

if(isset($_GET["dt"])) {
	$toDay	= $_GET["dt"]; 
	$timeOK	= 1;	
}
else {
	$toDay = date('Y-m-d');
	if( date('H') == '01' ) $timeOK	= 1;
	else $timeOK	= 0;	
}

if( $timeOK	== 1 ) {
	$toDayNo= date('d', strtotime( $toDay ));
	$toTime	= '01:00:00'; 
	$refno	= date('YmdHis', strtotime($toDay." ".$toTime));
	$dt 	= $toDay;
	$tEcho 	= '1';



	include("cKomisi.php");
	include("cManager.php");

}

?>