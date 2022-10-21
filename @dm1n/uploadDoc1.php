<?php
include('includes/config.php'); 
$path=$img_path.'csv/';
$parts = explode(".",$_FILES["ximage1"]["name"]);
$end_part = end($parts);

// print_r($_GET);
if (!in_array($end_part, array('csv'))) echo 'System only receives .csv.';
else
{
echo $thefile;
$nmfile	= str_replace(" ", "_", ( str_replace('.'.$end_part, '', $_FILES["ximage1"]["name"]) ) );

if(file_exists($path.$nmfile.'.'.$end_part)) {
	$oke=0;
	$hitung=1;
	while($oke==0) {
		if(!file_exists($path.$nmfile.'_'.$hitung.'.'.$end_part)) {
			$thefile=$path.$nmfile.'_'.$hitung.'.'.$end_part;
			$oke=1;		
		}
		else $hitung++;
	}
}
else $thefile=$path.$nmfile.'.'.$end_part;

if(move_uploaded_file($_FILES["ximage1"]["tmp_name"],$thefile)) {
	// $uploadfile	= explode("/",$thefile);
	$csvTxt	= "
		INSERT INTO g_csv (
			id,
			csvurl,
			tglinput,
			waktuinput,
			byinput,
			status
			)
		VALUES (
			NULL,
			'".$thefile."',
			'".date('Y-m-d')."',
			'".date('H:i:s')."',
			'".$_SESSION["username_b"]."',
			'0'
		)
	";
	if( mysqli_query($csvTxt) ) {
		$csvid = mysql_insert_id();
		if (($handle = fopen($thefile, 'r')) !== FALSE)
		{
			$error = 0;
			while (($data = fgetcsv($handle, 0, ',')) !== FALSE)
			{
				
				$tArray = explode(';', $data[0]);
				//echo $data;
				if($tArray[0]*1>0) {
					
					$csvdtTxt = "
						INSERT INTO g_csvdt (
							id,
							csvid,
							csvdeal,
							csvlogin,
							csvname,
							csvopentime,
							csvtype,
							csvsymbol,
							csvvolume,
							csvopenprice,
							csvclosetime,
							csvcloseprice,
							csvcommission,
							csvtaxes,
							csvagent,
							csvswap,
							csvprofit,
							csvpips,
							csvcomment,
							status
						)
						VALUES (
							NULL,
							'".$csvid."',
							'".$tArray[0]."',
							'".$tArray[1]."',
							'".$tArray[2]."',
							'".$tArray[3]."',
							'".$tArray[4]."',
							'".$tArray[5]."',
							'".$tArray[6]."',
							'".$tArray[7]."',
							'".$tArray[8]."',
							'".$tArray[9]."',
							'".$tArray[10]."',
							'".$tArray[11]."',
							'".$tArray[12]."',
							'".$tArray[13]."',
							'".$tArray[14]."',
							'".$tArray[15]."',
							'".$tArray[16]."',
							'0'
						)
					
					";
					if( !mysqli_query( $csvdtTxt ) ) $error = 1;
				}
			}
			fclose($handle);
			
			if( $error==0 )	echo 'success';
			else echo $errTxt;

		}
		else echo $errTxt;
		
	}
	else echo $errTxt;
}


} ?>