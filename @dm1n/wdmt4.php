<?php include_once('includes/config.php');  ?>
<div class="judulhal"><?php echo T_("WITHDRAWAL MT4");?></div>

<ul id="menu-atas">
<li onclick="tab2('wdmt4req.php',this)" class="selected"><?php echo T_("Request");?></li>
<li onclick="tab2('wdmt4hist.php',this)"> <?php echo T_("History");?></li>
</ul>

<div id="c_content">
<?php  include('wdmt4req.php'); ?>
</div>