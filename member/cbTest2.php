<?php

	$day	= $_GET["d"];

	$x[1]	= "2018-01-".$day;
	$x[2]	= "2018-02-".$day;
	$x[3]	= "2018-03-".$day;
	$x[4]	= "2018-04-".$day;
	$x[5]	= "2018-05-".$day;
	$x[6]	= "2018-06-".$day;
	$x[7]	= "2018-07-".$day;
	$x[8]	= "2018-08-".$day;
	$x[9]	= "2018-09-".$day;
	$x[10]	= "2018-10-".$day;
	$x[11]	= "2018-11-".$day;
	$x[12]	= "2018-12-".$day;

	for ( $j=1; $j<=12; $j++ ) {
		
		$day			= substr( $x[$j], -2 );
		$lastYearMonth	= date('Y-m', strtotime( substr($x[$j],0,-3)." -1 MONTH " ) );
		$lastMonthEOM	= date('Y-m-t',strtotime($lastYearMonth));
		if( $lastYearMonth."-".$day > $lastMonthEOM ) $tglmulai = $lastMonthEOM;
		else $tglmulai	= $lastYearMonth."-".$day;
		
		echo $tglmulai.'<br/>';
		/*
		//if( date('Y-m-t', strtotime( $x[$j] ) )
		//$min01
		if( $x[$j]>date('Y-m-t', strtotime( substr($x[$j],0,-3) ) ) ) $x[$j] = date('Y-m-t', strtotime( substr($x[$j],0,-3) ));
		//if( date('d', strtotime( $x[$j] ) ) > '28' ) {
		//	$pengurang	= date('t', strtotime( $x[$j] ) )." DAYS ";
		//}
		//else  
			$pengurang = "1 MONTH ";
		if( $x[$j] == date('Y-m-t', strtotime($x[$j])) )
		   		$min1Bulan = date('Y-m-t', strtotime( $x[$j]." -".$pengurang ) );
		 else	$min1Bulan = date('Y-m-d', strtotime( $x[$j]." -".$pengurang ) );
		echo $min1Bulan.'<br/>';
		*/
	}