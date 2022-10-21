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
		HeaderingExcel(str_replace(" ", "_", "PROOF UPLOAD - ".date('d M Y His').".xls"));

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
		$worksheet1 =& $workbook->add_worksheet("PROOF");
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
			c.trfvalue,
			c.proofdoc
		FROM g_member a
		LEFT JOIN g_jpackage b ON a.jpackage = b.id
		LEFT JOIN ( SELECT userid, count(id) cid, trfvalue, proofdoc FROM g_trfproof WHERE status = '0' AND jtransaksi='0' GROUP BY id ) c ON a.userid=c.userid
		WHERE
			a.parentstatus = '1'
		 ".$where."
		HAVING cid > 0
		ORDER BY tglproses DESC, waktuproses DESC";
		
		$qry = mysql_query( $tqry );
		
		$worksheet1->write_string(1,1, "PROOF UPLOADS");

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
		$worksheet1->write_string(5,4,  "Transfer Value",$formatotA);
		$worksheet1->write_string(5,5,  "Upload Date",$formatotA);
	
	
		$rowPos	= 5;
		$i		= 1;
		$j      = 1;

		
		while($row=mysql_fetch_array($qry)) { 


			$worksheet1->write_string($rowPos+$i,1,$i,$formAll);
			$worksheet1->write_string($rowPos+$i,2,$row["userid"],$formAll);
			$worksheet1->write_string($rowPos+$i,3,$row["nmmember"],$formAll);
			$worksheet1->write_string($rowPos+$i,4,$row["trfvalue"],$formAll);
			$worksheet1->write_string($rowPos+$i,5,date( 'd M Y H:i:s', strtotime( $row["tglupload"]." ".$row["waktuupload"] )),$formAll);
			
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

		$simpan=mysql_query("
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
			$prepare=mysql_query("DELETE FROM t_gis WHERE roadid='".$id."'");
			echo 'error';
		}
		*/
?>