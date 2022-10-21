<?php include_once('includes/config.php');  ?>
<div class="judulhal"><?php echo T_("CSV Management");?></div>

<ul id="menu-atas">
<li onclick="tab2('csvmgtdt.php',this)" class="selected"><?php echo T_("CSV");?></li>
</ul>

<div id="c_content">
<?php  include('csvmgtdt.php'); ?>
</div>