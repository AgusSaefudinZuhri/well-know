<?php
include_once('includes/config.php'); 

/*
function getAirportGrup( $parent, $id, $dStatus, $level ) {
	$agTxt 	= "
		SELECT * FROM g_bandaragrup WHERE parentid='".$parent."'
	";

	$header	= '';
	for($i=1; $i<=$level  ;$i++) $header .= '&nbsp;&nbsp;&nbsp;';

	$agQry	= mysql_query( $agTxt );
	$return	= '';

	while ( $agRow = mysql_fetch_array( $agQry ) ) {
		$chTxt	= "SELECT * FROM g_bandaragrup WHERE parentid='".$agRow["id"]."'";
		$chQry	= mysql_query( $chTxt );
		$chCount= mysql_num_rows( $chQry );
		
		if( $chCount > 0 and $dStatus ) $disabled='disabled="disabled"';
		else $disabled = '';
		
		if( $id == $agRow["id"] ) $selected = 'selected="selected"';
		else $selected = '';
		
		$return .= '<option value="'.$agRow["id"].'" '.$disabled.' '.$selected.'>'.$header.$agRow["nmgrup"].'</option>';
		if( $chCount > 0 ) 	$return .= getAirportGrup( $agRow["id"], $id, $dStatus, $level + 1 ) ;	
	}
	
	return $return;

}
*/

/*
function getPackageGrup( $parent, $id, $dStatus, $level ) {
	$agTxt 	= "
		SELECT * FROM g_tourpgrup WHERE parentid='".$parent."'
	";

	$header	= '';
	for($i=1; $i<=$level  ;$i++) $header .= '&nbsp;&nbsp;&nbsp;';

	$agQry	= mysql_query( $agTxt );
	$return	= '';

	while ( $agRow = mysql_fetch_array( $agQry ) ) {
		$chTxt	= "SELECT * FROM g_tourpgrup WHERE parentid='".$agRow["id"]."'";
		$chQry	= mysql_query( $chTxt );
		$chCount= mysql_num_rows( $chQry );
		
		if( $chCount > 0 and $dStatus ) $disabled='disabled="disabled"';
		else $disabled = '';
		
		if( $id == $agRow["id"] ) $selected = 'selected="selected"';
		else $selected = '';
		
		$return .= '<option value="'.$agRow["id"].'" '.$disabled.' '.$selected.'>'.$header.$agRow["nmgrup"].'</option>';
		if( $chCount > 0 ) 	$return .= getPackageGrup( $agRow["id"], $id, $dStatus, $level + 1 ) ;	
	}
	
	return $return;

}
*/

/*

function pathBandaraGrup($id,$ppath) {
	$cqry=mysql_query("SELECT * FROM g_bandaragrup WHERE parentid='".$id."'");
	if(mysql_num_rows($cqry)>0) {
		while($crow=mysql_fetch_array($cqry)) {
			$npath=$ppath.".".sprintf('%02d',$crow["id"]);
			$ubah=mysql_query("UPDATE g_bandaragrup SET ppath='".$npath."' WHERE id='".$crow["id"]."'");
			pathBandaraGrup($crow["id"],$npath);
		}
	}
}

function pathPackageGrup($id,$ppath) {
	$cqry=mysql_query("SELECT * FROM g_tourpgrup WHERE parentid='".$id."'");
	if(mysql_num_rows($cqry)>0) {
		while($crow=mysql_fetch_array($cqry)) {
			$npath=$ppath.".".sprintf('%02d',$crow["id"]);
			$ubah=mysql_query("UPDATE g_tourpgrup SET ppath='".$npath."' WHERE id='".$crow["id"]."'");
			pathPackageGrup($crow["id"],$npath);
		}
	}
}
*/


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
		
		$insert = mysql_query( $insTxt );

		$uqry = mysql_query("SELECT * FROM g_upline WHERE userid='".$upline."'");

		while($urow=mysql_fetch_array($uqry)) {
			$upline0 = mysql_query("
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

			$upline = mysql_query("
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
	$cqry=mysql_query( $ctxt );

	if(mysql_num_rows($cqry)>0) {
		$cari=mysql_fetch_array($cqry);
		if($cari["parentstatus"]!='1') $return = caripm ($cari["userid"],$pos);
		else $return = $cari["userid"]."|".$cari["upline"];
	}
	else $return = "|".$id;
	return $return;
}

?>