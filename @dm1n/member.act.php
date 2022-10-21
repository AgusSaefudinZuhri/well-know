<?php
include('includes/config.php'); 
include('function.php'); 
	
	switch($_GET["a"]) {
		case "0":
//
		echo T_("There are errors in process. If the problem persists, please contact The Administrator");
		
		break;
		
		case "1":
		
				$update=mysqli_query("
					UPDATE g_member
					SET 
						nmmember	= '".mysqli_real_escape_string($_POST["nmmember"])."',
						email		= '".mysqli_real_escape_string($_POST["email"])."',
						nohp1		= '".mysqli_real_escape_string($_POST["nohp1"])."',
						nohp2		= '".mysqli_real_escape_string($_POST["nohp2"])."',
						tgllahir	= '".mysqli_real_escape_string($_POST["tgllahir"])."',
						noktp		= '".mysqli_real_escape_string($_POST["noktp"])."',
						jkelamin	= '".$_POST["jkelamin"]."',
						alamat		= '".mysqli_real_escape_string($_POST["alamat"])."',
						telepon		= '".mysqli_real_escape_string($_POST["telepon"])."',
						kota		= '".mysqli_real_escape_string($_POST["kota"])."',
						propinsi	= '".mysqli_real_escape_string($_POST["propinsi"])."',
						kodepos		= '".mysqli_real_escape_string($_POST["kodepos"])."',
						nmbank		= '".mysqli_real_escape_string($_POST["nmbank"])."',
						cabbank		= '".mysqli_real_escape_string($_POST["cabbank"])."',
						norek		= '".mysqli_real_escape_string($_POST["norek"])."',
						atasnama	= '".mysqli_real_escape_string($_POST["atasnama"])."'
					WHERE userid	= '".$_GET["id"]."'
					");

		
		if($_POST["password"]!='' ) {
			if( $_POST["password"]==$_POST["cpassword"]) {
			$password	= sha1($_POST["password"]);
			$xpass		= $_POST["password"];
			$update		= mysqli_query("
				UPDATE g_member
				SET 
					password	= '".$password."',
					xpass		= '".$xpass."'
				WHERE userid	= '".$_GET["id"]."'
				");
			}
		else { echo T_("The New Login Password is not match!!!");	$update = false; }
		}
			
		if($_POST["password2"]!='' ) {
		if( $_POST["password2"]==$_POST["cpassword2"]) {
			$password2	= sha1($_POST["password2"]);
			$xpass2		= $_POST["password2"];
			$update		= mysqli_query("
				UPDATE g_member
				SET 
					password2	= '".$password2."',
					xpass2		= '".$xpass2."'
				WHERE userid	= '".$_GET["id"]."'
				");
		
			}
		else { echo T_("The New e-Wallet Password is not match!!!");	$update = false; }
	}
			
		if($update) echo 'success';
		else echo T_("There are errors in process. If the problem persists, please contact The Administrator");			

		break;

		case "3":
			/*
			$xrow=mysqli_fetch_array(mysqli_query("SELECT * FROM g_member WHERE userid='".$_GET["id"]."'"));
			if($xrow["jstokis"]<$_POST["jstokis"]) {
				$update = mysqli_query("UPDATE g_member SET jstokis='".$_POST["jstokis"]."' WHERE userid='".$_GET["id"]."'");
				$cek = mysqli_fetch_array(mysqli_query("SELECT * FROM g_jstokis WHERE id='".$_POST["jstokis"]."'"));
				
				$transfer = mysqli_query("
					INSERT INTO g_transfer(
						id,
						transferid,
						userid,
						jumlah,
						tgltransfer,
						status
					)
					VALUES (
						NULL,
						'',
						'".$_GET["id"]."',
						'".$cek["jmlepin"]."',
						'".date('Y-m-d')."',
						'1'		
					)
				");
					$id=mysql_insert_id();
					$update=mysqli_query("UPDATE g_transfer SET transferid='TR".(date('siHdmy')+$id)."' WHERE id='".$id."'");
						
				
				if($update and gKartu ($cek["jmlepin"], date('Y-m-d'), $_GET["id"], $id)) echo 'success';
				else echo T_("There are errors in process. If the problem persists, please contact The Administrator");			
			}
			else echo T_("You can't upgrade to this level. For further information, please contact The Administrator");
			*/			
		break;

		case "4":
			$userid = $company_userid;
			$vreq   = xNumber($_POST["nilai"]);
			$dt		= date('Y-m-d');
			$tm		= date('H:i:s');
			$refno	= date('YmdHis');
			$toID	= mysqli_real_escape_string($_GET["id"]);
				
			$cekTxt	= "SELECT * FROM g_member WHERE parentstatus='1' AND blokir='0' AND status='1' AND userid='".$toID."'";
			$cekTo 	= mysqli_num_rows(mysqli_query($cekTxt));

			if($cekTo>0) {		
				$table = 'g_'.$_POST["utype"];
				
					$tqry1="
						INSERT INTO ".$table." (
							id,
							refno,
							parentid,
							userid,
							useridx,
							jtransaksi,
							jtransaksix,
							trxvalue,
							tglinput,
							waktuinput,
							tglapprove,
							waktuapprove,
							remark,
							status
						)
						VALUES (
							NULL,
							'',
							'".$toID."',
							'".$toID."',
							'".$userid."',
							'0',
							'0',
							'".$vreq."',
							'".$dt."',
							'".$tm."',
							'".$dt."',
							'".$tm."',
							'Received from Administrator',
							'1'
						)
					";
//					echo $tqry1;
//				$tqry2 	 = "UPDATE ".$table." SET refno='xrefno' WHERE id='xid'";
				$simpan1 = mysqli_query($tqry1);
				$xid	 = mysql_insert_id();
				$refno	.= $xid;
				$tqry2 	 = "UPDATE ".$table." SET refno='".$refno."' WHERE id='".$xid."'"; 
				$update2 = mysqli_query($tqry2);
				
			if($simpan1) {
					echo 'success';
				}
			else echo T_("There are errors in process. If the problem persists, please contact The Administrator"); 
			}
		else echo T_("The destination user is not existed."); 

		break;
		case "6" :
		
			$userid	= $_GET["id"];
			$freeacc= $_POST["freeacc"];
			$compacc= $_POST["compacc"];
			$spm1	= $_POST["spm1"];
			$bspm1	= xNumber( $_POST["bspm1"] );
			$spm2	= $_POST["spm2"];
			$bspm2	= xNumber( $_POST["bspm2"] );
			$roiblock= $_POST["roiblock"];

/*
			$updTxt	= " UPDATE g_member 
						SET 
							spm1	='".$spm1."', 
							bspm1	='".$bspm1."', 
							spm2	='".$spm2."', 
							bspm2	='".$bspm2."'
						WHERE userid = '".$userid."'
						";		
*/
			$updTxt	= " UPDATE g_member 
						SET 
							freeacc	= '".$freeacc."',
							compacc = '".$compacc."', 
							spm1	= '".$spm1."', 
							spm2	= '".$spm2."',
							roiblock= '".$roiblock."' 
						WHERE userid = '".$userid."'
						";
			$update	= mysqli_query( $updTxt );
			
			if( $update ) echo "success";
			else echo T_("There are errors in process. If the problem persists, please contact The Administrator");
			
		break;

	}
?>