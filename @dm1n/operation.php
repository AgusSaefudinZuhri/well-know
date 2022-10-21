<?php include_once('includes/config.php');  ?>
<div class="judulhal"><?php echo strtoupper(T_("Operation"));?></div>

<ul id="menu-atas">
<!--
	<li onclick="tab2('techDoc.php',this)" class="selected"><?php echo T_("Tech Doc");?></li>
	<li onclick="tab2('excRate.php',this)" ><?php echo T_("Exchange Rate");?></li>
-->
	<li onclick="tab2('support.php',this)" class="selected"><?php echo T_("Support");?></li>

</ul>

<div id="c_content">
<?php //if($_SESSION["x2"]=='1') 
include('support.php'); // else include('m.config.php'); ?>
</div>