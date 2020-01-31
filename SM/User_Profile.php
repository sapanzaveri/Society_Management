<?php 
include("session_chk.php");

	include("config.php");
?>

<!DOCTYPE html>
<html lang="en" class="loading">
  
<!-- Mirrored from pixinvent.com/demo/convex-bootstrap-admin-dashboard-template/demo-1/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Sep 2018 10:36:18 GMT -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Convex admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Convex admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>User Profile</title>
    <link rel="apple-touch-icon" sizes="60x60" href="../app-assets/img/ico/apple-icon-60.png">
    <link rel="apple-touch-icon" sizes="76x76" href="../app-assets/img/ico/apple-icon-76.html">
    <link rel="apple-touch-icon" sizes="120x120" href="../app-assets/img/ico/apple-icon-120.html">
    <link rel="apple-touch-icon" sizes="152x152" href="../app-assets/img/ico/apple-icon-152.html">
    <link rel="shortcut icon" type="image/x-icon" href="../app-assets/img/titleBarimg/title.png">
    <link rel="shortcut icon" type="image/png" href="../app-assets/img/ico/favicon-32.png">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700,900%7CMontserrat:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../app-assets/fonts/feather/style.min.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/fonts/simple-line-icons/style.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/fonts/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/perfect-scrollbar.min.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/prism.min.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/chartist.min.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/app.css">
	<!-- date picker -->
	<link rel="stylesheet" type="text/css" href="../app-assets/css/daterangepicker.css" />
  </head>
  <body data-col="2-columns" class=" 2-columns ">
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="wrapper">


     <!-- Side BAR-->
	 <?php include "SideBar.php" ?>

     <?php include "Header.php" ?>

      <div class="main-panel">
        <div class="main-content">
          <div class="content-wrapper">
            <div class="container-fluid"><!--Statistics cards Starts-->
				<!----------------------------Entry to the page section --------------------------------->
			<?php 
				
				$sql = "Select m.*, f.Flat_No as Flat, f.Monthly_Maintenance as Maintenance, o.Name as OName";
									$sql .=" from member_master m ,flat_master f , ownership_master o";
									$sql .= " where m.Id=" . $_SESSION['UID'];
									$sql .= " and m.Flat_Id=f.Id"; 
									$sql .= " and m.Ownership_Type=o.Id";
									$profileres = mysqli_query($link , $sql);
									$profilerow = mysqli_fetch_array($profileres);
				
				?>
<!--
<section id="user-profile">
    <div class="row">
        <div class="col-12">
            <div class="card profile-with-cover">
                <div class="card-img-top img-fluid bg-cover height-300" style="background: url('http://localhost:8081/SocietyManagement/SM/<?php //echo $profilerow['Photos']; ?>') 50%;"></div>
                <div class="media profil-cover-details row">
                    <div class="col-5 mr-auto">
                        <div class="align-self-start halfway-fab pl-3 pt-2">
                            <div class="text-left">
                                <h3 class="card-title white"><?php
									
									//echo $profilerow['Name'];
									?></h3>
                            </div>
                        </div>
                    </div>
                </div>
-->
<!-----------------------Not In use ----------------------------
                <div class="profile-cover-buttons">
                    <div class="media-body halfway-fab align-self-end">
                        
                        <div class="text-right d-block d-sm-block d-md-block d-lg-none">
                            <button type="button" class="btn btn-primary mr-2"><i class="fa fa-plus"></i></button>
                            <button type="button" class="btn btn-success mr-3"><i class="fa fa-dashcube"></i></button>
                        </div>
                    </div>
-->
<!--
                </div>
            </div>
        </div>
    </div>
</section>
-->




<!------------------------------------- User Profile  ------------------------------------------------------------------------------------->
<section id="user-area">
 	<div class="row">
        <div class="col-lg-12">
            <div class="card mb-5">
                <div class="card-header">
                    <div class="card-title-wrap bar-primary">
                        <div class="card-title">Personal Information</div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="card-block">
                        <div class="align-self-center halfway-fab text-center">
                            <a class="profile-image">
                                <img src="<?php echo $profilerow['Photos']; ?>" class="rounded-circle img-border gradient-summer width-100" alt="Card image">
                            </a>
                        </div>
                        <div class="text-center">
                            <span class="font-medium-2 text-capitalize"><?php echo $profilerow['Name']; ?></span>
                            <p class="grey font-small-2">Role : <?php echo $profilerow['Role_Id']; ?></p>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <ul class="no-list-style pl-0">
                                    <li class="mb-2">
                                        <span class="text-bold-500 primary"><a><i class="icon-present font-small-3"></i> Birthday:</a></span>
                                        <span class="display-block overflow-hidden"><?php echo $profilerow['DOB']; ?></span>
                                    </li>
<!--
                                    
-->
                                    <li class="mb-2">
                                        <span class="text-bold-500 primary"><a><i class="ft-user font-small-3"></i> Gender:</a></span>
                                        <span class="display-block overflow-hidden"><?php echo $profilerow['Gender']; ?></span>
                                    </li>
                                    <li class="mb-2">
                                        <span class="text-bold-500 primary"><a><i class="ft-mail font-small-3"></i> Email:</a></span>
                                        <a class="display-block overflow-hidden"><?php echo $profilerow['Email']; ?></a>
                                    </li>
                                    <li class="mb-2">
                                       <span class="text-bold-500 primary"><a><i class="ft-smartphone font-small-3"></i> Phone Number:</a></span>
                                        <span class="display-block overflow-hidden"><?php echo $profilerow['Phone_No']; ?></span>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-12 col-sm-6">
                                <ul class="no-list-style pl-0 ">                                    
                                    <li class="mb-2">
                                        <span class="text-bold-500 primary"><a><i class="ft-home font-small-3"></i> Flat No</a></span>
                                        <a class="display-block overflow-hidden"><?php echo $profilerow['Flat']; ?></a>
                                    </li>
                                    <li class="mb-2">
                                        <span class="text-bold-500 primary"><a><i class="icon-users font-small-3"></i> User Name</a></span>
                                        <span class="display-block overflow-hidden"><?php echo $profilerow['User_Name']; ?></span>
                                    </li>
                                    <li class="mb-2">
                                        <span class="text-bold-500 primary"><a><i class="icon-calculator font-small-3"></i> Monthly Maintance </a></span>
                                        <span class="display-block overflow-hidden"><?php echo $profilerow['Maintenance']; ?></span>
                                    </li>
                                    <li class="mb-2">
                                        <span class="text-bold-500 primary"><a><i class="ft-book font-small-3"></i> OwnerShip Type:</a></span>
                                        <span class="display-block overflow-hidden"><?php echo $profilerow['OName']; ?></span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
		</div>
	</div>
						
</section>
				
				
				
				
				
				
				
				
				
				
				
				
			 </div>
         </div>
      
        </div>

      <!-- Footer File-->
		 <?php include "Footer.php" ?>
      </div>
    </div>
    <!-- Aside Bar////////////////////////////////////-->
    <?php include "Aside.php" ?>
	<!--Theme Side Bar -->
 	<?php include "ThemeSideBar.php" ?>
    <!-- BEGIN VENDOR JS-->
    <script src="../app-assets/vendors/js/core/jquery-3.3.1.min.js"></script>
    <script src="../app-assets/vendors/js/core/popper.min.js"></script>
    <script src="../app-assets/vendors/js/core/bootstrap.min.js"></script>
    <script src="../app-assets/vendors/js/perfect-scrollbar.jquery.min.js"></script>
    <script src="../app-assets/vendors/js/prism.min.js"></script>
    <script src="../app-assets/vendors/js/jquery.matchHeight-min.js"></script>
    <script src="../app-assets/vendors/js/screenfull.min.js"></script>
    <script src="../app-assets/vendors/js/pace/pace.min.js"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="../app-assets/vendors/js/chartist.min.js"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN CONVEX JS-->
    <script src="../app-assets/js/app-sidebar.js"></script>
    <script src="../app-assets/js/notification-sidebar.js"></script>
    <script src="../app-assets/js/customizer.js"></script>
    <!-- END CONVEX JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="../app-assets/js/dashboard-ecommerce.js"></script>
	
	
	<!-- Date Picker JS-->
	  <script type="text/javascript" src="../app-assets/js/jquery.min.js"></script>
	 <script type="text/javascript" src="../app-assets/js/moment.min.js"></script>
    <script type="text/javascript" src="../app-assets/js/daterangepicker.js"></script>
    <script type="text/javascript">
  $(function() {
    $('input[name="dob"]').daterangepicker({
      locale: {
      format: 'YYYY-MM-DD'
    },
        singleDatePicker: true,
        showDropdowns: true
    }, 
    function(start, end, label) {
        
    });
});
		$(function() {
    $('input[name="doa"]').daterangepicker({
      locale: {
      format: 'YYYY-MM-DD'
    },
        singleDatePicker: true,
        showDropdowns: true
    }, 
    function(start, end, label) {
        
    });
});
	</script>
    <!-- END PAGE LEVEL JS-->
  </body>

<!-- Mirrored from pixinvent.com/demo/convex-bootstrap-admin-dashboard-template/demo-1/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Sep 2018 10:36:18 GMT -->
</html>