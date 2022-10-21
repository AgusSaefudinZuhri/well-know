<?php

	$passkey	= "1NAR7KRA11";
	$tBillCode 	= "23028";

	function intResponse ( $errCode ) {
	$defStatus = 
		array (
			'000'	=>  'Success',
			'001'	=>  'Incomplete/Invalid Parameter(s)',
			'002'	=>  'IP Address not allowed or wrong Cliend ID',
			'003'	=>  'Words not match',
			'004'	=>  'Service not found',
			'005'	=>  'Service not defined',
			'006'	=>  'Invalid Phone Number ID',
			'007'	=>  'Amount not match',
			'008'	=>  'Technical Failure',
			'009'	=>  'Unexpected Error',
			'010'	=>  'Request Timeout',
			'011'	=>  'Billing type does not match billing amount',
			'012'	=>  'Invalid expiry date/time',
			'100'	=>  'Billing has been paid',
			'101'	=>  'Billing not found',
			'102'	=>  'VA Number is in use',
			'103'	=>  'Billing has been expired',
			'104'	=>  'Billing Cancelled',
			'105'	=>  'Duplicate Transaction ID',
			'120'	=>  'Phone Number ID is not recognized',
			'121'	=>  'Phone Number ID is blocked',
			'123'	=>  'Biller Code is not matched',
			'997'	=>  'System is temporary offline',
			'998'	=>  '\"Content-type\" header dot defined as it should be',		
			'999'	=>  'Internal Error'
		
		);	
	
		return $defStatus[$errCode];
		//return $return;
	}

	function cekData($data){
		
		global $passkey;
		
		$timestamp		= explode("T", $data["header"]["timestamp"]);
		$sig			= $data["header"]["sig"];
		$hdrTimestamp	= date('Ymd', strtotime( $timestamp[0] ) ).date('His', strtotime( $timestamp[1] ) );
		$accounttype	= $data["body"]["accounttype"];
		$amount			= $data["body"]["amount"];
		$billerbankname	= $data["body"]["billerbankname"];
		$billerbanknum	= $data["body"]["billerbanknum"];
		$billercode		= $data["body"]["billercode"];
		$billercodename	= $data["body"]["billercodename"];
		$channel		= $data["body"]["channel"];
		$currencycode	= $data["body"]["currencycode"];
		$debittimestamp	= $data["body"]["debittimestamp"];
		$extdata		= $data["body"]["extdata"];
		$nbpsref		= $data["body"]["nbpsref"];
		$payerbankname	= $data["body"]["payerbankname"];
		$payerbanknum	= $data["body"]["payerbanknum"];
		$repeatmsg		= $data["body"]["repeatmsg"];
		$rrn			= $data["body"]["rrn"];
		$rrn2			= $data["body"]["rrn2"];
		
			
		$conData	= $hdrTimestamp.$accounttype.$amount.$billerbankname.$billerbanknum.$billercode.$billercodename.$channel.$currencycode.$debittimestamp.$extdata.$nbpsref.$payerbankname.$payerbanknum.$repeatmsg.$rrn.$rrn2.$passkey;
		//echo $conData."<br/>";
		$sigCheck = base64_encode( hash('sha256', $conData, true) );
		//echo $sigCheck."<br/>";
		if($sig == $sigCheck) return true;
		else return false;
	}