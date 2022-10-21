<?php

	include_once( "tFunction.php" );

function crAkun( $group, $password, $name, $leverage, $country, $city, $state, $zipcode, $address, $phone, $email, $comment ) {
	global $devStatus;
	
	switch( $devStatus ) {
		case "0": 
			$tURL	= "api/mtserver/create";
			break;

		case "1": 
			$tURL	= "getResponse.php?a=create";
			break;

	}
	
	$return = array(
	"url" => $tURL,
	"post" => [
		"group" 	=> $group, 
		"password"	=> $password, 
		"name" 		=> $name,
		"leverage"	=> $leverage,
		"country"	=> $country, 
		"city"		=> $city, 
		"state"		=> $state, 
		"zipcode"	=> $zipcode, 
		"address"	=> $address, 
		"phone"		=> $phone, 
		"email"		=> $email, 
		"comment"	=> $comment
		]
	);
	
	return $return;
}

function crDeposit( $amount, $remark, $account ) {
	global $devStatus;
	
	switch( $devStatus ) {
		case "0": 
			$tURL	= "api/mtserver/Balance";
			break;

		case "1": 
			$tURL	= "getResponse.php?a=balance";
			break;

	}
	
	$return = array(
	"url" => $tURL,
	"post" => [
		"Amount" 	=> $amount, 
		"Remark"	=> $remark, 
		"Account"	=> $account
		]
	);
	
	return $return;
}


function crWithdraw( $amount, $remark, $account ) {
	global $devStatus;
	
	switch( $devStatus ) {
		case "0": 
			$tURL	= "api/mtserver/Balance";
			break;

		case "1": 
			$tURL	= "getResponse.php?a=balance";
			break;

	}
	
	$return = array(
	"url" => $tURL,
	"post" => [
		"Amount" 	=> ( -$amount ), 
		"Remark"	=> $remark, 
		"Account"	=> $account
		]
	);
	
	return $return;
}