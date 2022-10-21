<?php include_once('includes/config.php');  ?>
<div class="judulhal"><?php echo T_("WITHDRAWAL");?></div>

<ul id="menu-atas">
<li onclick="tab2('wdreq.php',this)" class="selected"><?php echo T_("Request");?></li>
<li onclick="tab2('wdhist.php',this)"> <?php echo T_("History");?></li>
</ul>

<div id="c_content">
<?php  include('wdreq.php'); ?>
</div>