<?php
	//date_default_timezone_set("UTC");

//	$defURL		= 'http://39.109.122.215:19014/'; //'http://localhost/extrogate/api/'; // ////' 
//	$appKey		= "{0CD660E2-24F2-43AC-8543-E11F5A92FAED}";

	$defURL		= 'http://39.109.122.215:19024/'; //'http://localhost/extrogate/api/'; // ////' 
	$appKey		= "{F5975E73-609E-4694-945D-675192EDD552}";

	$regGroup	= "UFF_REG";
	$devStatus	= 0;


function get_contentPost($url, $post = '') {
	//echo print_r(['1'=>'2','3'=>'4']);
	global $defURL;
	global $appKey;
	$sendURL  = $defURL.$url;
	//echo $sendURL;
	$jsonData = json_encode( $post );
	//echo $jsonData;
	$tEncrypt =  strtoupper( md5($jsonData.$appKey) );
	//echo 'signature:'.$tEncrypt;
	$usecookie= "./cookie.txt";
	$header[] = 'Content-Type: application/json';
	$header[] = "Accept-Encoding: gzip, deflate";
	$header[] = "Cache-Control: max-age=0";
	$header[] = "Connection: keep-alive";
	$header[] = "signature: ".$tEncrypt;
	$header[] = "Accept-Language: en-US,en;q=0.8,id;q=0.6";

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $sendURL);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
	curl_setopt($ch, CURLOPT_HEADER, false);
	curl_setopt($ch, CURLOPT_VERBOSE, false);
	// curl_setopt($ch, CURLOPT_NOBODY, true);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($ch, CURLOPT_ENCODING, true);
	curl_setopt($ch, CURLOPT_AUTOREFERER, true);
	curl_setopt($ch, CURLOPT_MAXREDIRS, 5);

	curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/37.0.2062.120 Safari/537.36");
//echo print_r($post);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
//echo http_build_query($post);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

	$rs = curl_exec($ch);

	if(empty($rs)){
		//var_dump($rs, curl_error($ch));
		curl_close($ch);
		return false;
	}
	//echo "rs".$rs;
	curl_close($ch);
	return $rs;
}

function get_contentGet($url) {
	global $defURL;
	global $appKey;
	$sendURL  = $defURL.$url;
	$tEncrypt =  strtoupper(md5($sendURL.$appKey));
	//echo 'URL:'.$sendURL.'<br/>SIGNATURE:'.$tEncrypt.'<br/>';
	//echo 'URL:'.$sendURL.'<br/>SIGNATURE:'.$tEncrypt.'<br/>';
	
	$usecookie= "./cookie.txt";
	$header[] = 'Content-Type: application/json';
	$header[] = "Accept-Encoding: gzip, deflate";
	$header[] = "Cache-Control: max-age=0";
	$header[] = "Connection: keep-alive";
	$header[] = "signature: ".$tEncrypt;
	$header[] = "Accept-Language: en-US,en;q=0.8,id;q=0.6";

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $sendURL);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
	curl_setopt($ch, CURLOPT_HEADER, false);
	curl_setopt($ch, CURLOPT_VERBOSE, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($ch, CURLOPT_ENCODING, true);
	curl_setopt($ch, CURLOPT_AUTOREFERER, true);
	curl_setopt($ch, CURLOPT_MAXREDIRS, 5);
	curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/37.0.2062.120 Safari/537.36");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

	$rs = curl_exec($ch);

	if(empty($rs)){
		//var_dump($rs, curl_error($ch));
		curl_close($ch);
		return false;
	}
	//echo "rs".$rs;
	curl_close($ch);
	return $rs;
}
