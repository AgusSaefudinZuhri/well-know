<?php
include('includes/config.php'); 
	include_once("../api/tFunction.php");
	include_once("../api/tFunctionPOST.php");

switch($_GET["a"]) {
	
	case "0":
	$fintrxvalue = xNumber($_POST["fintrxvalue"]);
	$crWithdraw = crWithdraw( $fintrxvalue, 'Deposit', $_GET["mid"]);
	$hasil = get_contentPost($crWithdraw["url"],$crWithdraw["post"]);
	//	echo $hasil;
	$getResult = json_decode( $hasil, true);
	if($getResult["isSuccess"]) {
		//echo 'x';
		$error='0';
		$id=$_GET["id"];
		$txt = "
			UPDATE g_wmt4 
			SET status='1',
				kursvalue		= '".xNumber($_POST["kursvalue"])."', 
				fintrxvalue		= '".$fintrxvalue."', 
				approveorder	= '".$getResult["balanceTraderRecord"][0]["order"]."', 
				approveamount	= '".xNumber($getResult["balanceTraderRecord"][0]["amount"])."', 
			
				tglapprove='".date('Y-m-d')."', 
				waktuapprove='".date('H:i:s')."' 
			WHERE id='".$id."'";
			$write1 = mysql_query($txt);
			
		if(!$write1) $error='1';

		if($error=='0') echo 'success';
		else echo $errTxt;		
		
	}
	else if(!$getResult["isSuccess"]) {
		$id=$_GET["id"];
		$txt = "
			UPDATE g_wmt4 
			SET status='99' 
			WHERE id='".$id."'";
			$write1 = mysql_query($txt);
		echo T_("Request is Rejected");
	}
	else echo T_("Send Process is Failed. Please try again later.");
	break;
	
	case "1" :

	$error='0';
	$json = json_decode($_GET['m'], true);

	if(count($json)>0) {
		for ($j=0; $j<count($json); $j++) {
			$id=$json[$j][0];
			
			$write1 = mysql_query("UPDATE g_wmt4 SET status='1', tglapprove='".date('Y-m-d')."', waktuapprove='".date('H:i:s')."' WHERE refno='".$id."'");
			
			if(!$write1) $error='1';
		}

		if($error=='0') echo 'success';
		else echo T_("There are errors in process. If the problem persists, please contact The Administrator");		
	}
	else echo T_("You selected none.");		

	break;

	case "2":
	
		$error='0';
		$id=$_GET["x"];	
			$write1 = mysql_query("UPDATE g_wmt4 SET status='99', tglapprove='".date('Y-m-d')."', waktuapprove='".date('H:i:s')."' WHERE id='".$id."'");
//			echo "UPDATE g_wmt4 SET status='99' WHERE refno='".$id."'";
			
		if(!$write1) $error='1';

		if($error=='0') echo 'success';
		else echo T_("There are errors in process. If the problem persists, please contact The Administrator");		
			
	break;


	case "3" :

	$error='0';
	$json = json_decode($_GET['m'], true);

	if(count($json)>0) {
		for ($j=0; $j<count($json); $j++) {
			$id=$json[$j][0];
			
			$write1 = mysql_query("UPDATE g_wmt4 SET status='99', tglapprove='".date('Y-m-d')."', waktuapprove='".date('H:i:s')."' WHERE refno='".$id."'");
			
			if(!$write1) $error='1';
		}

		if($error=='0') echo 'success';
		else echo T_("There are errors in process. If the problem persists, please contact The Administrator");		
	}
	else echo T_("You selected none.");		

	break;


}

?>