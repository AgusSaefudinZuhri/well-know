<?php
include('includes/config.php'); 

switch($_GET["a"]) {
	
	case "0":
	
		$error='0';
		$id=$_GET["x"];	
			$write1 = mysql_query("UPDATE g_wfund SET status='1', tglapprove='".date('Y-m-d')."', waktuapprove='".date('H:i:s')."' WHERE refno='".$id."'");
			
		if(!$write1) $error='1';

		if($error=='0') echo 'success';
		else echo T_("There are errors in process. If the problem persists, please contact The Administrator");		
			
	break;
	
	case "1" :

	$error='0';
	$json = json_decode($_GET['m'], true);

	if(count($json)>0) {
		for ($j=0; $j<count($json); $j++) {
			$id=$json[$j][0];
			
			$write1 = mysql_query("UPDATE g_wfund SET status='1', tglapprove='".date('Y-m-d')."', waktuapprove='".date('H:i:s')."' WHERE refno='".$id."'");
			
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
			$write1 = mysql_query("UPDATE g_wfund SET status='99', tglapprove='".date('Y-m-d')."', waktuapprove='".date('H:i:s')."' WHERE refno='".$id."'");
//			echo "UPDATE g_wfund SET status='99' WHERE refno='".$id."'";
			
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
			
			$write1 = mysql_query("UPDATE g_wfund SET status='99', tglapprove='".date('Y-m-d')."', waktuapprove='".date('H:i:s')."' WHERE refno='".$id."'");
			
			if(!$write1) $error='1';
		}

		if($error=='0') echo 'success';
		else echo T_("There are errors in process. If the problem persists, please contact The Administrator");		
	}
	else echo T_("You selected none.");		

	break;


}

?>