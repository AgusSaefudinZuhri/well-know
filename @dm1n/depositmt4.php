<?php include_once('includes/config.php');  ?>
<div class="judulhal"><?php echo T_("DEPOSIT MT4");?></div>

<ul id="menu-atas">
<li onclick="tab2('depositmt4req.php',this)" class="selected"><?php echo T_("Request");?></li>
<li onclick="tab2('depositmt4hist.php',this)"> <?php echo T_("History");?></li>
</ul>

<div id="c_content">
<?php  include('depositmt4req.php'); ?>
</div>