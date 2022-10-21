<?php include_once('includes/config.php');  ?>
<div class="judulhal"><?php echo strtoupper(T_("Admin"));?></div>

<ul id="menu-atas">
<?php // if($_SESSION["x2"]=='1') { ?>
	<li onclick="tab2('m.users.php',this)" class="selected"><?php echo T_("User Management");?></li>
<?php // } ?>

<?php // if($_SESSION["x1"]=='1') { ?>
	<li onclick="tab2('m.config.php',this)" <?php   
//if($_SESSION["x2"]!='1') {  echo 'class="selected"';  } ?>><?php echo T_("Configuration");?></li>
<?php // } ?>

<?php // if($_SESSION["x1"]=='1') { ?>
	<li onclick="tab2('m.finance.php',this)" <?php  // if($_SESSION["x2"]!='1') {  class="selected"  } ?>> <?php echo T_("Finance");?></li>
<?php // } ?>

<?php // if($_SESSION["x1"]=='1') { ?>
<!--	<li onclick="tab2('m.template.php',this)" <?php  // if($_SESSION["x2"]!='1') {  class="selected"  } ?>> <?php echo T_("Template");?></li> -->

<?php // } ?>

<?php // if($_SESSION["x1"]=='1') { ?>
	<li onclick="tab2('m-root.php',this)" <?php  // if($_SESSION["x2"]!='1') {  class="selected"  } ?>> <?php echo T_("Root");?></li>

<?php // } ?>
</ul>

<div id="c_content">
<?php //if($_SESSION["x2"]=='1') 
include('m.users.php'); // else include('m.config.php'); ?>
</div>