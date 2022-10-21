<ul id="left-menu">
<li id="l_dashboard" onclick="tab1('dashboard',this)" class="selected"><?php echo T_("DASHBOARD");?></li>

<?php if($_SESSION["x2"]=='1' or $_SESSION['grup_b']=='0') { ?>
	<li id="l_member" onclick="tab1('member',this)"><?php echo strtoupper( T_("Member") );?></li>
<?php } ?>
<?php if($_SESSION["x4"]=='1' or $_SESSION['grup_b']=='0') { ?>
	<li id="l_accountsmt4pr-pr" onclick="tab1('accountsm4pr',this)"><?php echo strtoupper( T_("Accounts - MT4") );?></li>
<?php } ?>
<?php if($_SESSION["x4"]=='1' or $_SESSION['grup_b']=='0') { ?>
	<li id="l_depositmt4" onclick="tab1('depositmt4',this)"><?php echo strtoupper( T_("Deposit - MT4") );?></li>
<?php } ?>
<?php if($_SESSION["x4"]=='1' or $_SESSION['grup_b']=='0') { ?>
	<li id="l_wdmt4" onclick="tab1('wdmt4',this)"><?php echo strtoupper( T_("Withdrawal - MT4") );?></li>
<?php } ?>
<?php if($_SESSION["x4"]=='1' or $_SESSION['grup_b']=='0') { ?>
	<li id="l_csvmgt" onclick="tab1('csvmgt',this)"><?php echo strtoupper( T_("CSV Mgt.") );?></li>
<?php } ?>

<?php if($_SESSION["x4"]=='1' or $_SESSION['grup_b']=='0') { ?>
	<li id="l_wd" onclick="tab1('wd',this)"><?php echo strtoupper( T_("Withdrawal") );?></li>
<?php } ?>

<?php if($_SESSION["x5"]=='1' or $_SESSION['grup_b']=='0') { ?>
	<li id="l_operation" onclick="tab1('operation',this)"><?php echo strtoupper( T_("Operation") );?></li>
<?php } ?>
<!--
<?php if($_SESSION["x6"]=='1' or $_SESSION['grup_b']=='0') { ?>
	<li id="l_dlv" onclick="tab1('dlv',this)"><?php echo strtoupper( T_("Delivery") );?></li>
<?php } ?>
-->
<?php  if($_SESSION["x7"]=='1' or $_SESSION['grup_b']=='0') { ?>
	<li id="l_admin" onclick="tab1('admin',this)"><?php echo T_("ADMIN");?></li>
<?php  } ?>

<?php if($_SESSION['grup_b']=='0') { ?>
	<li id="l_generator" onclick="tab1('generator',this)"><?php echo T_("GENERATOR");?></li>
<?php  } ?>


</ul>