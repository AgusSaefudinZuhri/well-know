<?php
	include_once("tFunction.php");
	include_once("tFunctionGET.php");
//	include_once("tFunctionGETcb.php");
	include_once("tFunctionPOST.php");
//	include_once("tFunctionPOSTcb.php");

//echo md5('http://localhost:61451/api/mtserver/profit/20000003appkye-private-key').'<br/>';
	//getBalance
	/*
	$hasil = get_contentGet( getBalance("25001021") );
	echo $hasil;
	$getBalance = json_decode( $hasil, true );
	if( $getBalance["isSuccess"] ) echo $getBalance["Balance"]; 
*/

	//Create Account

	$crAkun = crAkun( $regGroup, '1234', 'Andri', '200', '62', 'bdg', 'jabar', '40234', '', '999888', 'a@a.com', '');
	echo print_r( $crAkun );
	$hasil  = get_contentPost($crAkun["url"],$crAkun["post"]);
	echo $hasil.'<br/>acc: ';
	$getResult = json_decode( $hasil, true);
	if($getResult["isSuccess"]) echo $getResult["Account"];


	//Create Deposit						  
	//$crDeposit = crDeposit( '10000', 'x', '25001');
	//$hasil = get_contentPost($crDeposit["url"],$crDeposit["post"]);
	//$getResult = json_decode( $hasil, true);
	//if($getResult["isSuccess"]) echo 'success'.$getResult["TradeTransInfo"]["order"].'|'.$getResult["TradeTransInfo"]["Amount"];

	//Create Withdraw						  
	//$crWithdraw = crWithdraw( '10000', 'x', '25001');
	//$hasil = get_contentPost($crWithdraw["url"],$crWithdraw["post"]);
	//$getResult = json_decode( $hasil, true);
	//if($getResult["isSuccess"]) echo 'success'.$getResult["TradeTransInfo"]["order"].'|'.$getResult["TradeTransInfo"]["Amount"];
