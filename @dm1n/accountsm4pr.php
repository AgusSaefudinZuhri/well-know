<?php include_once('includes/config.php');  ?>
<div class="judulhal"><?php echo strtoupper(T_("Accounts - MT4"));?></div>

<ul id="menu-atas">
<li onclick="tab2('accountsmt4.php',this)" class="selected" ><?php echo strtoupper(T_("Accounts - MT4"));?>
</ul>

<div id="c_content">
<?php //if($_SESSION["x2"]=='1') 
include('accountsmt4.php'); // else include('m.config.php'); ?>
</div>