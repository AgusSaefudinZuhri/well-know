<input type="hidden" id="pg" value="<?php if(isset($_GET["pg"])) echo $_GET["pg"]; else echo "1";?>" />
<?php include_once('includes/config.php'); 
 $perpage = 10000;

	$stDownload	=	'1';

$limit=" ORDER BY a.tgltrx ASC, a.waktutrx ASC ";
//if(isset($_GET["pg"])) $limit.=" LIMIT ".(($_GET["pg"]-1)*$perpage).",".$perpage; 
//else $limit.=" LIMIT 0,".$perpage;

$where="";
/*
if(isset($_GET["pf"])) {
	switch($_GET["pf"]) {
	case "0": $where.=" AND a.userid like '%".$_GET["vf"]."%'"; break;
	}
}
*/

if(isset($_GET["mf"]) and $_GET["mf"]!='')
		$dari 	= $_GET["mf"]; 		
else	$dari 	= date( 'Y-m-d', strtotime( ' - 7 DAYS ' ) );
if(isset($_GET["nf"]) and $_GET["nf"]!='') 
		$sampai	.=	$_GET["nf"];
else	$sampai	.=	date( 'Y-m-d' );

$where	.=	" AND a.tgltrx >= '".$dari."' AND a.tgltrx <= '".$sampai."'";

?>
<div class="wrapper">
<table class="xuser" style="width: 100%; margin: 0;">
<tr class="tHeader" >
<td style="width: 25px !important; text-align:center;"><?php echo T_("No");?></td>
<td style="width: 150px; text-align:center;"><?php echo T_("Date");?></td>
<td style="width: 150px; text-align:center;"><?php echo T_("Description");?></td>
<td style="width: 100px; text-align:center;"><?php echo T_("Type");?></td>
<td style="width: 100px; text-align:center;"><?php echo T_("Debit");?> (<?php echo $syscurrency; ?>)</td>
<td style="width: 100px; text-align:center;"><?php echo T_("Credit");?> (<?php echo $syscurrency; ?>)</td>
<td style="width: 100px; text-align:center;"><?php echo T_("Credit");?> (<?php echo T_("Dollar"); ?>)</td>
<td style="width: 100px; text-align:center;"><?php echo T_("Credit");?> (<?php echo T_("Cash"); ?>)</td>
<td style="width: 100px; text-align:center;"><?php echo T_("Balance");?> (<?php echo $syscurrency; ?>)</td>
</tr>


<?php 

	$bTxt	= "
		SELECT 
			SUM(IF(jtransaksi='0' AND tgltrx<='".$dari."', trxvalue, 0))
			-SUM(IF(jtransaksi='1' AND tgltrx<='".$dari."', trxvalue, 0)) blcAwal,
			SUM(IF(jtransaksi='0' AND tgltrx<='".$sampai."', trxvalue, 0))
			-SUM(IF(jtransaksi='1' AND tgltrx<='".$sampai."', trxvalue, 0)) blcAkhir
		FROM v_ledger ";
	$bQry	= mysqli_query( $bTxt );
	$bRow	= mysqli_fetch_array( $bQry );
	$blcAwal= $bRow["blcAwal"];
	$blcAkhir= $bRow["blcAkhir"];
	
	$balance	= $blcAwal;
	$tDebit		= 0;
	$tCredit	= 0;
	$tqry	= "
			SELECT a.* FROM v_ledger a
			WHERE 1=1
			 ".$where
		 ;
				
$qry0	= mysqli_query($tqry);
$jml0	= mysqli_num_rows($qry0);
$numRows= $jml0;

$pages	= ceil($jml0/$perpage);

$qry=mysqli_query($tqry.$limit);
// echo $tqry.$limit;
if(isset($_GET["pg"])) $x=($_GET["pg"]-1)*$perpage+1; else $x=1;
?>

    <tr class="tContent<?php if(($x-1)%2) echo ' genap';?>" style="font-weight: bold;" >
        <td style="text-align:center;"></td>
        <td style="text-align:center;"></td>
        <td style="text-align:left;"  ><?php echo T_("Opening Balance");?></td>
        <td style="text-align:center;"></td>
        <td style="text-align:center;"></td>
        <td style="text-align:center;"></td>
        <td style="text-align:center;"></td>
        <td style="text-align:center;"></td>
        <td style="text-align:center;"><?php echo number_format($balance,2);?></td>
    </tr>

<?php

while($row=mysqli_fetch_array($qry)) { 
		
		switch( $row["jtransaksi"] ) {
			case "0" : 
				$deskripsi	= "Member ".$row["userid"]." Join"; 
				$type		= "Sales"; 
				$credit		= $row["trxvalue"];
				$register	= $row["trxvaluereg"]; 
				$cash		= $row["trxvaluecash"]; 
				$debit		= '0';
				$balance	+= $credit; 
				break;	
			case "1" : 
				$deskripsi	= "Member ".$row["userid"]." Withdrawal"; 
				$type		= "Withdrawal"; 
				$credit		= '0'; 
				$register	= '0'; 
				$cash		= '0'; 
				$debit		= $row["trxvalue"]; 
				$balance	-= $debit;
				break;				
		}
	$tCredit+= $credit;
	$tDebit	+= $debit;
	$tRegister+= $register;
	$tCash+= $cash;	
		
	?>
    <tr class="tContent<?php if(($x-1)%2) echo ' genap';?>"  >
        <td style="text-align:center;"><?php echo $x; ?></td>
        <td style="text-align:center;"><?php echo date('d M Y H:i:s', strtotime($row["tgltrx"]." ".$row["waktutrx"] ));?></td>
        <td style="text-align:left;"  ><?php echo $deskripsi; ?></td>
        <td style="text-align:center;"><?php echo $type; ?></td>
        <td style="text-align:center;"><?php echo number_format($debit,2);?></td>
        <td style="text-align:center;"><?php echo number_format($credit,2);?></td>
        <td style="text-align:center;"><?php echo number_format($register,2);?></td>
        <td style="text-align:center;"><?php echo number_format($cash,2);?></td>
        <td style="text-align:center;"><?php echo number_format($balance,2);?></td>
    </tr>
<?php $x++; } ?>

    <tr class="tContent<?php if(($x-1)%2) echo ' genap';?>" style="font-weight: bold;" >
        <td style="text-align:center;"></td>
        <td style="text-align:center;"></td>
        <td style="text-align:left;"  ><?php echo T_("Closing Balance");?></td>
        <td style="text-align:center;"></td>
        <td style="text-align:center;"><?php echo number_format($tDebit,2);?></td>
        <td style="text-align:center;"><?php echo number_format($tCredit,2);?></td>
        <td style="text-align:center;"><?php echo number_format($tRegister,2);?></td>
        <td style="text-align:center;"><?php echo number_format($tCash,2);?></td>
        <td style="text-align:center;"><?php echo number_format($balance,2);?></td>
    </tr>

</table>
</div>
<?php include( 'pagez.php' ); ?>