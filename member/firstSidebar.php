    <div id="left-sidebar"  >
          <div id="sidebar"  >
              <!-- sidebar menu start-->
              <ul id="left-menu" class="sidebar-menu">                
<!--				<li id="li-firstlogin" class="mAlone selected" onclick="tab1('firstlogin',this, '')"> -->
                <li id="li-dashboard" class="mAlone selected" onclick="tab1('firstlogin',this,'')">                   
                          <i class="icon_house_alt"></i>
                          <span><?php echo T_("Activation");?></span>
                  </li>
              <li id="li-logout" onclick="if(confirm('<?php echo T_("Are you sure want to Quit?");?>')){location.href='logout.php'}">                  
                          <i class="icon_genius"></i>
                          <span><?php echo T_("Log Out");?></span>
                  </li>
    
              </ul>
              <!-- sidebar menu end-->
          </div>
      </div>      <!--sidebar end-->
