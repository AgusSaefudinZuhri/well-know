<?php

	include_once( "tFunction.php" );

function getCreateCB( $hasil ) {
	$return = json_decode($hasil, true);
	return $return;
	//return $tURL;
}