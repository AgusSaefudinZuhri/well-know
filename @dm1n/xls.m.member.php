<?php
		include('includes/config.php'); 
		require_once('lib/Worksheet.php');
		require_once('lib/Workbook.php');

		
		function HeaderingExcel($filename) {
		  header("Content-type: application/vnd.ms-excel");
		  header("Content-Disposition: attachment; filename=".$filename);
		  header("Expires: 0");
		  header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
		  header("Pragma: public");
		}
		
		// HTTP headers
		HeaderingExcel(str_replace(" ", "_", "MEMBER LIST - ".date('d M Y His').".xls"));

		 // Creating a workbook
		$workbook = new Workbook();

		// Format for the headings
		$formatot =& $workbook->add_format();
		$formatot->set_size(9);
		$formatot->set_align('centre');
		$formatot->set_align('vcentre');
		$formatot->set_color('white');
		$formatot->set_pattern();
		$formatot->set_fg_color('black');
		$formatot->set_border(1);
		$formatot->set_text_wrap(1);
		$formatot->set_bold(1);

		$formatotA =& $workbook->add_format();
		$formatotA->set_size(9);
		$formatotA->set_align('centre');
		$formatotA->set_align('vcentre');
		$formatotA->set_color('white');
		$formatotA->set_pattern();
		$formatotA->set_fg_color('black');
		$formatotA->set_border(1);
		$formatotA->set_border_color('white');
		$formatotA->set_text_wrap(1);
		$formatotA->set_bold(1);


		$formatotRight =& $workbook->add_format();
		$formatotRight->set_size(9);
		$formatotRight->set_align('right');
		$formatotRight->set_align('vcentre');
		$formatotRight->set_color('white');
		$formatotRight->set_pattern();
		$formatotRight->set_fg_color('black');
		$formatotRight->set_border(1);
		$formatotRight->set_text_wrap(1);
		$formatotRight->set_bold(1);

		// Format for the contents
		$formAll =& $workbook->add_format();
		$formAll->set_border(1);
		$formAll->set_text_wrap(1);
		$formAll->set_align('vcentre');
		$formAll->set_align('centre');
		$formAll->set_num_format(0x31);


		$formLeft =& $workbook->add_format();
		$formLeft->set_border(1);
		$formLeft->set_text_wrap(1);
		$formLeft->set_align('vcentre');
		$formLeft->set_align('left');
		$formLeft->set_num_format(0x31);


		$formRight =& $workbook->add_format();
		$formRight->set_border(1);
		$formRight->set_text_wrap(1);
		$formRight->set_align('vcentre');
		$formRight->set_align('right');
		$formRight->set_num_format(0x31);

		// Creating the first worksheet
		$worksheet1 =& $workbook->add_worksheet("MEMBERS");
		//set hide gridlines
		$worksheet1->hide_gridlines(); 

		$worksheet1->set_column(1,1,5);	
		$worksheet1->set_column(2,2,20);
		$worksheet1->set_column(3,3,30);
		$worksheet1->set_column(4,4,30);
		$worksheet1->set_column(5,5,20);
		$worksheet1->set_column(6,6,20);
		$worksheet1->set_column(7,7,20);
		$worksheet1->set_column(8,8,20);
		$worksheet1->set_column(9,9,20);
		$worksheet1->set_column(10,10,20);
		$worksheet1->set_column(11,13,20);
		

$where="";

if(isset($_GET["pf"])) {
	switch($_GET["pf"]) {
	case "0": $param	 = "UserID";break;		
	case "1": $where	.=" AND a.userid like '%".$_GET["vf"]."%' "; $param="UserID";break;
	case "2": $where	.= " AND a.nmmember like '%".$_GET["vf"]."%'"; $param="Member Name";break;
			
	}
}

if($_GET["vf"]=='') $vf="ALL"; else $vf="%".$_GET["vf"]."%";
//if($_GET["jf"]!='') $where.=" AND a.tgltransaksi = '".$_GET["jf"]."'"; 

if(isset($_GET["mf"])) {
	switch($_GET["mf"]) {
	case "1": $where.=" AND a.parentstatus='1' "; break;
	case "2": $where.=" "; break;
	}
}
else $where.=" AND a.parentstatus='1' ";

		$tqry="

		SELECT 
			a.*,
			b.nmjpackage,
			IF( a.staktif='1', a.tglaktif, a.tgldaftar ) tglproses,
			IF( a.staktif='1', a.waktuaktif, '0' ) waktuproses,
			IFNULL( c.cid, '0' ) cid,
			IFNULL( d.did, '0' ) did,
			IFNULL( e.eid, '0' ) eid,
			IFNULL( f.inittrf, '0' ) inittrf,
			IFNULL( f.buypackage, '0' ) buypackage
		FROM g_member a
		LEFT JOIN g_jpackage b ON a.jpackage = b.id
		LEFT JOIN ( SELECT userid, COUNT(id) cid FROM g_trfproof WHERE status IN ('0', '1') GROUP BY userid ) c ON a.userid = c.userid
		LEFT JOIN ( SELECT uplid, COUNT(id) did FROM g_upline WHERE status IN ('1') GROUP BY uplid ) d ON a.userid = d.uplid
		LEFT JOIN ( SELECT unplid, COUNT(id) eid FROM g_unilevel WHERE status IN ('1') GROUP BY unplid ) e ON a.userid = e.unplid		 
		LEFT JOIN ( SELECT userid, SUM(IF(useridx='inittrf',trxvalue,'0')) inittrf, SUM(IF(useridx='buypackage',trxvalue,'0')) buypackage FROM g_wfund WHERE status = '1' AND useridx IN ('inittrf','buypackage') GROUP BY userid ) f ON a.userid = f.userid
		WHERE
			a.parentstatus = '1'
			AND a.status IN ('0', '1') ".$where."
		ORDER BY tglproses DESC, waktuproses DESC";
		
		$qry = mysqli_query( $tqry );
		
		$worksheet1->write_string(1,1, "MEMBERS");

		$worksheet1->write_string(2,1, "");
		$worksheet1->write_string(2,3, "");

		$worksheet1->write_string(3,1, $param);
		$worksheet1->write_string(3,3, $vf);

		$worksheet1->write_string(4,1, "");
		$worksheet1->write_string(4,3, "");

		$worksheet1->merge_cells(1,1,1,5);
		$worksheet1->merge_cells(2,1,2,2);
		$worksheet1->merge_cells(2,3,2,5);
		$worksheet1->merge_cells(3,1,3,2);
		$worksheet1->merge_cells(3,3,3,5);
		$worksheet1->merge_cells(4,1,4,2);
		$worksheet1->merge_cells(4,3,4,5);
		
		$worksheet1->write_string(5,1,  "No",$formatotA);
		$worksheet1->write_string(5,2,  "UserID",$formatotA);
		$worksheet1->write_string(5,3,  "Member Name",$formatotA);
		$worksheet1->write_string(5,4,  "Sponsor",$formatotA);
		$worksheet1->write_string(5,5,  "Upline",$formatotA);
		$worksheet1->write_string(5,6,  "Email",$formatotA);
		$worksheet1->write_string(5,7,  "Package",$formatotA);
		$worksheet1->write_string(5,8,  "Buy Package",$formatotA);
		$worksheet1->write_string(5,9,  "Init Transfer",$formatotA);
		$worksheet1->write_string(5,10,  "Active Date",$formatotA);
		$worksheet1->write_string(5,11,  "Join Date",$formatotA);
		$worksheet1->write_string(5,12,  "Status",$formatotA);
		
	
	
		$rowPos	= 5;
		$i		= 1;
		$j      = 1;

		
		while($row=mysqli_fetch_array($qry)) { 

    		if($row["staktif"]=='1') $tglaktif = date('d/m/Y', strtotime($row["tglaktif"])); else $tglaktif = '';
    		$tgldaftar = date('d/m/Y', strtotime($row["tgldaftar"]));
 
			$status = '';
        	
			switch($row["status"])	{ 
				case "1": $status .= T_("A") .' '; break; 
				case "0": $status .= T_("NA").' '; break; }
			switch($row["spm1"])	{ case "1": $status .= T_("SP").' '; break; case "0": $status .= ''; break; } 
			switch($row["freeacc"])	{ case "1": $status .= T_("FR").' ;'; break; case "0": $status .= ''; break; } 
			switch($row["compacc"])	{ case "1": $status .= T_("CP").' '; break; case "0": $status .= ''; break; } 
			switch($row["jstokis"])	{ case "1": $status .= T_("ST").' '; break; case "0": $status .= ''; break; } 

			$worksheet1->write_string($rowPos+$i,1,$i,$formAll);
			$worksheet1->write_string($rowPos+$i,2,$row["userid"],$formAll);
			$worksheet1->write_string($rowPos+$i,3,$row["nmmember"],$formAll);
			$worksheet1->write_string($rowPos+$i,4,$row["sponsor"],$formAll);
			$worksheet1->write_string($rowPos+$i,5,$row["upline"],$formAll);
			$worksheet1->write_string($rowPos+$i,6,$row["email"],$formAll);
			$worksheet1->write_string($rowPos+$i,7,$row["nmjpackage"],$formAll);
			$worksheet1->write_number($rowPos+$i,8,$row["buypackage"],$formRight);
			$worksheet1->write_number($rowPos+$i,9,$row["inittrf"],$formRight);			
			$worksheet1->write_string($rowPos+$i,10,$tglaktif,$formAll);
			$worksheet1->write_string($rowPos+$i,11,$tgldaftar,$formAll);
			$worksheet1->write_string($rowPos+$i,12,$status,$formAll);
			
//			$worksheet1->write_blank($rowPos+$i,7,$formAll);
			$i++;	
		}



		$workbook->close();
		
		
//		$row 		= $dbConMPS->doQuery($sqlFull);
		
/*		for($i=1; $i<=$counter; $i++) { 
			$worksheet1->write_string($rowPos,0,number_format($i*.1,3), $formAll);
			$worksheet1->write_string($rowPos,1,"", $formAll);
			$worksheet1->write_string($rowPos,2,"", $formAll);
			$worksheet1->write_string($rowPos,3,"", $formAll);

			$rowPos++;
		}

		$worksheet1->write_string($rowPos,0,$row["panjang"],$formAll);
		$worksheet1->write_string($rowPos,1,"",$formAll);
		$worksheet1->write_string($rowPos,2,"",$formAll);
		$worksheet1->write_string($rowPos,3,"",$formAll);









//		echo sizeof($_POST["sta"]);
/*		for($i=0; $i<sizeof($_POST["sta"]); $i++) {
		if(isset($_POST["clat"][$i])) $clatitude=$_POST["clat"][$i]; else $clatitude='';
		if(isset($_POST["clong"][$i])) $clongitude=$_POST["clong"][$i]; else $clongitude='';

		$simpan=mysqli_query("
			INSERT INTO t_gis(
				id, 
				roadid, 
				sta,
				latitude,
				longitude,
				clatitude,
				clongitude,
				l_updater 
				) 
			VALUES(
				'".$id.'-'.$_POST["sta"][$i]."', 
				'".$id."', 
				'".$_POST["sta"][$i]."', 
				'".$_POST["lat"][$i]."', 
				'".$_POST["long"][$i]."', 
				'".$clatitude."', 
				'".$clongitude."', 
				'".$_SESSION['username']."'
				)");
/*		echo "
			INSERT INTO t_gis(
				id, 
				roadid, 
				sta,
				latitude,
				longitude,
				clatitude,
				clongitude,
				l_updater 
				) 
			VALUES(
				'".$id.'-'.$_POST["sta"][$i]."', 
				'".$id."', 
				'".$_POST["sta"][$i]."', 
				'".$_POST["lat"][$i]."', 
				'".$_POST["long"][$i]."', 
				'".$clatitude."', 
				'".$clongitude."', 
				'".$_SESSION['username']."'
				)";*/
			/*	
		if($simpan) $error=$error; else $error='1';
		}
		if($error=='0') echo 'success';
		else {
			$prepare=mysqli_query("DELETE FROM t_gis WHERE roadid='".$id."'");
			echo 'error';
		}
		*/
?>