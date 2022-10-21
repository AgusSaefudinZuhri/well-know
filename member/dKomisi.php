<?php
include_once('includes/config.php');

if(isset($_GET["dt"])) $toDay	= $_GET["dt"]; 
else $toDay = date('Y-m-d');

	$toTime	= date('H:i:s'); 
	$refno	= date('YmdHis', strtotime($toDay." ".$toTime));
	$dt 	= $toDay; // date('Y-m-d', strtotime( $toDay.' - 1 DAY'));
	$tEcho 	= '0';
	$komisiid	= 1;
	$nmjkomisi	= "Commission";

include('bn0.sponsor.php');
//include('bLeader.php');


?>