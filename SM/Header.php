 <nav class="navbar navbar-expand-lg navbar-light bg-faded">
        <div class="container-fluid">
          <div class="navbar-header">
              <p class="d-none">cart</p></a>
            <div class="dropdown ml-1s display-inline-block"><a id="apps" href="#" data-toggle="dropdown" class="nav-link position-relative dropdown-toggle"><i class="ft-edit blue-grey darken-4"></i><span class="mx-1 blue-grey darken-4 text-bold-400">Apps</span></a>
              <div class="apps dropdown-menu">
                <div class="arrow_box"><a href="chat.html" class="dropdown-item py-1"><span>Chat</span></a><a href="taskboard.html" class="dropdown-item py-1"><span>TaskBoard</span></a><a href="calendar.html" class="dropdown-item py-1"><span>Calendar</span></a></div>
              </div>
            </div>
          </div>
          <div class="navbar-container">
            <div id="navbarSupportedContent" class="collapse navbar-collapse">
              <ul class="navbar-nav">
                <li class="nav-item mt-1 navbar-search text-left dropdown"><a id="search" href="#" data-toggle="dropdown" class="nav-link dropdown-toggle"><i class="ft-search blue-grey darken-4"></i></a>
                  <div aria-labelledby="search" class="search dropdown-menu dropdown-menu-right">
                    <div class="arrow_box_right">
                      <form role="search" class="navbar-form navbar-right">
                        <div class="position-relative has-icon-right mb-0">
                          <input id="navbar-search" type="text" placeholder="Search" class="form-control"/>
                          <div class="form-control-position navbar-search-close"><i class="ft-x"></i></div>
                        </div>
                      </form>
                    </div>
                  </div>
                </li>
               
                <li class="dropdown nav-item mt-1"><a id="dropdownBasic2" href="#" data-toggle="dropdown" class="nav-link position-relative dropdown-toggle"><i class="ft-bell blue-grey darken-4"></i><span class="notification badge badge-pill badge-danger"><!--count --></span>
                    <p class="d-none">Notifications</p></a>
                  <div class="notification-dropdown dropdown-menu dropdown-menu-right">
                    <div class="arrow_box_right">
                      <div class="noti-list">
                      <?php
						
						
						  if($_SESSION['UID'] == '6')
						  {
						  ?>
                      
                      <a class="dropdown-item noti-container py-2" href="Complain_List.php"><i class="ft-share info float-left d-block font-medium-4 mt-2 mr-2"></i><span class="noti-wrapper"><span class="noti-title line-height-1 d-block text-bold-400 info">Complain View</span><span class="noti-text">Member Complain List </span></span></a>
                      <?php } else {
						  ?>
                      <a class="dropdown-item noti-container py-2" href="Complain_List.php"><i class="ft-share info float-left d-block font-medium-4 mt-2 mr-2"></i><span class="noti-wrapper"><span class="noti-title line-height-1 d-block text-bold-400 info">Complain View </span><span class="noti-text">Complain List </span></span></a>
                      <?php } ?>
                      
                      
                      <a class="dropdown-item noti-container py-2"><i class="ft-save warning float-left d-block font-medium-4 mt-2 mr-2"></i><span class="noti-wrapper"><span class="noti-title line-height-1 d-block text-bold-400 warning">New User Registered</span><span class="noti-text">Lorem ipsum dolor sit ametitaque in </span></span></a><a class="dropdown-item noti-container py-2"><i class="ft-repeat danger float-left d-block font-medium-4 mt-2 mr-2"></i><span class="noti-wrapper"><span class="noti-title line-height-1 d-block text-bold-400 danger">New Order Received</span><span class="noti-text">Lorem ipsum dolor sit ametest?</span></span></a><a class="dropdown-item noti-container py-2"><i class="ft-shopping-cart success float-left d-block font-medium-4 mt-2 mr-2"></i><span class="noti-wrapper"><span class="noti-title line-height-1 d-block text-bold-400 success">New Item In Your Cart</span><span class="noti-text">Lorem ipsum dolor sit ametnatus aut.</span></span></a><a class="dropdown-item noti-container py-2"><i class="ft-heart info float-left d-block font-medium-4 mt-2 mr-2"></i><span class="noti-wrapper"><span class="noti-title line-height-1 d-block text-bold-400 info">New Sale</span><span class="noti-text">Lorem ipsum dolor sit ametnatus aut.</span></span></a><a class="dropdown-item noti-container py-2"><i class="ft-box warning float-left d-block font-medium-4 mt-2 mr-2"></i><span class="noti-wrapper"><span class="noti-title line-height-1 d-block text-bold-400 warning">Order Delivered</span><span class="noti-text">Lorem ipsum dolor sit ametnatus aut.</span></span></a></div><a class="noti-footer primary text-center d-block border-top border-top-blue-grey border-top-lighten-4 text-bold-400 py-1">Read All Notifications</a>
                    </div>
                  </div>
                </li>
<!--
                <li class="nav-item mt-1 d-none d-lg-block"><a id="navbar-notification-sidebar" href="javascript:;" class="nav-link position-relative notification-sidebar-toggle"><i class="icon-equalizer blue-grey darken-4"></i>
                    <p class="d-none">Notifications Sidebar</p></a></li>
                    
-->
               <?php
				  $sql = "Select Photos from member_master";
				  $sql .= " where Id=" .$_SESSION['UID'];
				  $photores = mysqli_query($link, $sql);
				  $photorow = mysqli_fetch_array($photores);
				  
				  ?>
                <li class="dropdown nav-item mr-0"><a id="dropdownBasic3" href="#" data-toggle="dropdown" class="nav-link position-relative dropdown-user-link dropdown-toggle"><span class="avatar avatar-online"><img id="navbar-avatar" src="<?php echo $photorow['Photos']; ?>" alt="avatar"/></span>
                   
                   
                    <p class="d-none">User Settings</p></a>
                  <div aria-labelledby="dropdownBasic3" class="dropdown-menu dropdown-menu-right">
                    <div class="arrow_box_right"><a href="User_Profile.php" class="dropdown-item py-1"><i class="ft-edit mr-2"></i><span>My Profile</span></a><a href="chat.html" class="dropdown-item py-1"><i class="ft-message-circle mr-2"></i><span>My Chat</span></a><a href="javascript:;" class="dropdown-item py-1"><i class="ft-settings mr-2"></i><span>Settings</span></a>
                      <div class="dropdown-divider"></div><a href="logout.php" class="dropdown-item"><i class="ft-power mr-2"></i><span>Logout</span></a>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </nav>