<?php
	include_once('tFunction.php');
//echo 'masuk';
	$headers	= getallheaders();
	$data		= file_get_contents('php://input');
	$jsonData	= json_decode($data, true);
	//echo print_r($_GET);
//echo $data;
	//echo print_r( json_decode($data,true) );
	//parse_str($data, $post);

//echo print_r(explode($data));
	$signature	= $headers["signature"];
//	echo $headers["signature"].'<br/>';
	$actual_link = "http://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"];


	switch( $_GET["a"] ) {
		case "getbalance" :
			if($signature==strtoupper(md5($actual_link.$appKey))) {
				echo '{"isSuccess":true,"errorMsg":"","Balance": 1000.12}';
			}
			else {
				echo '{"isSuccess":false,"errorMsg":"Not found","Balance": null}';
			}
			break;

		case "create" :
			//echo print_r($data);
			//echo print_r($_POST);
			//echo md5( json_encode( $post ).$appKey ).'<br/>';
			if($signature==strtoupper(md5($data.$appKey))) {
				echo '{"isSuccess":true,"errorMsg":"","Account": "250001"}';
			}
			else {
				echo '{"isSuccess":false,"errorMsg":"","Account": ""}';
			}
			break;

		case "balance" :
			//echo print_r($data);
			//echo print_r($_POST);
			//echo md5( json_encode( $post ).$appKey ).'<br/>';
			//echo $signature." = ".strtoupper(md5($data.$appKey));
			if($signature==strtoupper(md5($data.$appKey))) {
				echo '{"isSuccess":true,"errorMsg":"","TradeTransInfo": {"order": 10001, "amount": '.$jsonData["Amount"].'}}';
			}
			else {
				echo '{"isSuccess":false,"errorMsg":"","TradeTransInfo": ""}';
			}
			break;

			
	}