<?php

	include_once( "tFunction.php" );

function getBalanceCB( $hasil ) {
	$return = json_decode($hasil, true);
	return $return;
	//return $tURL;
}