<?php include_once('includes/config.php');  ?>
<div class="judulhal"><?php echo strtoupper(T_("Members"));?></div>

<ul id="menu-atas">
<li onclick="tab2('member.proof.php',this)" class="selected" ><?php echo strtoupper(T_("Verification"));?>
<li onclick="tab2('m.member.php',this)"  ><?php echo strtoupper(T_("Member Management"));?>
<li onclick="tab2('mWallet.php',this)" ><?php echo strtoupper(T_("Info"));?>
<!--
<li onclick="tab2('gjaringan.php',this)" ><?php echo strtoupper(T_("Genealogies"));?>


<li onclick="tab2('onlinereg.php',this)" ><?php echo strtoupper(T_("Online Reg."));?>
<li onclick="tab2('mWallet.php',this)" ><?php echo strtoupper(T_("Wallet"));?>
<li onclick="tab2('gjaringan.php',this)" ><?php echo strtoupper(T_("Genealogies"));?>
<!--
<li onclick="tab2('htransfer.php',this)" ><?php echo strtoupper(T_("Transfer Hist."));?>
<li onclick="tab2('minfo.php',this)" ><?php echo strtoupper(T_("Member Info"));?>
-->
</ul>

<div id="c_content">
<?php //if($_SESSION["x2"]=='1') 
include('member.proof.php'); // else include('m.config.php'); ?>
</div>