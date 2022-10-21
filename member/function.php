<?php
include_once('includes/config.php'); 

function xinsert ($userid, $jmember, $x, $sisahu, $sponsor, $parentid, $upline, $posisi, $level, $hariini ) {
		$tgldaftar	= date('Y-m-d', strtotime($hariini));
		$waktudaftar	= date('H:i:s', strtotime($hariini));
		$tglaktif	= $tgldaftar;
		$waktuaktif	= $waktudaftar;

		$insTxt	= "
					INSERT INTO g_member(
						userid,
						jmember,
						parentid,
						upline,
						posisi,
						sponsor,
						level,
						negara,
						tgldaftar,
						tglaktif,
						waktuaktif,
						parentstatus,
						status,
						blokir
						) 
					VALUES(
						'".$userid.$x."',
						'".$jmember."',
						'".$parentid."',
						'".$upline."',
						'".$posisi."',
						'".$sponsor."',
						'".$level."',
						'".$negara."',
						'".$tgldaftar."',
						'".$tglaktif."',
						'".$waktuaktif."',
						'0',
						'1',
						'0'

						)
					";
//		echo $insTxt;
		
		$insert = mysqli_query( $insTxt );

		$uqry = mysqli_query("SELECT * FROM g_upline WHERE userid='".$upline."'");

		while($urow=mysqli_fetch_array($uqry)) {
			$upline0 = mysqli_query("
				INSERT INTO g_upline (
					userid,
					uplid,
					upllevel,
					uplposisi,
					uplreverse,
					level,
					jmember,
					parentstatus,
					parentid,
					pairingstatus,
					tgldaftar,
					waktudaftar,
					tglaktif,
					waktuaktif,
					status
					)
				VALUES (
					'".$userid.$x."',
					'".$urow["uplid"]."',
					'".$urow["upllevel"]."',
					'".$urow["uplposisi"]."',
					'".($urow["uplreverse"]+1)."',
					'".$level."',
					'".$jmember."',
					'0',
					'".$userid."',
					'0',
					'".$tgldaftar."',
					'".$waktudaftar."',					
					'".$tglaktif."',
					'".$waktuaktif."',					
					'1'
				)
			");
			
		}

			$upline = mysqli_query("
				INSERT INTO g_upline (
					userid,
					uplid,
					upllevel,
					uplposisi,
					uplreverse,
					level,
					jmember,
					parentstatus,
					parentid,
					pairingstatus,
					tgldaftar,
					tglaktif,
					status
					)
				VALUES (
					'".$userid.$x."',
					'".$upline."',
					'".($level-1)."',
					'".$posisi."',
					'1',
					'".$level."',
					'".$jmember."',
					'0',
					'".$userid."',
					'0',
					'".$tgldaftar."',
					'".$tglaktif."',
					'1'
				)
			");

		
		$sisahu = $sisahu - 1;
		$error = '0';
		if($sisahu>'0') {
		$sisahu = $sisahu / 2;
		$ki		= $x+1;
		$ka		= $ki + $sisahu;

			
		if(xinsert ($userid, $jmember, $ki, $sisahu, $sponsor, $userid, $userid.$x, 'ki', ($level+1), $hariini)) $error = 0; else $error = 1;
		if(xinsert ($userid, $jmember, $ka, $sisahu, $sponsor, $userid, $userid.$x, 'ka', ($level+1), $hariini)) $error = 0; else $error = 1;
		}
		if($insert and $error == '0' ) $return = true; else $return = false;

		return $return;
}


function caripm ($id,$pos) {
	$ctxt = "SELECT 
	   a.*
	FROM g_member a 
	WHERE a.upline='".$id."'
	AND a.posisi='".$pos."'
	AND a.status='1'
	";
	$cqry=mysqli_query( $ctxt );

	if(mysqli_num_rows($cqry)>0) {
		$cari=mysqli_fetch_array($cqry);
		if($cari["parentstatus"]!='1') $return = caripm ($cari["userid"],$pos);
		else $return = $cari["userid"]."|".$cari["upline"];
	}
	else $return = "|".$id;
	return $return;
}
