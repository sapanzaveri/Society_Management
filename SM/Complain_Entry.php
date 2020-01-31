<?php 
include("session_chk.php");
include("config.php");
$message="";
	$Id =0;
	

	if(isset($_POST['btnSubmit']))
	{
		$complaint=($_POST['description']);
		$chk_admin = ($_POST['chk_admin']);
		$hdnId = $_POST['hdnId'];
		if($hdnId==0)
		{
		$sql = "INSERT INTO `complaint_master`(`Description`, `By_Whom`,`SendTo`, `DOC` , `IsActive` ) VALUES ";
		$sql .= "('$complaint',' " .$_SESSION['UID'] ." ','$chk_admin','". date('y-m-d') . "', '1')";
		 
		
		}
		else
		{
			$sql="Update complaint_master set";
			$sql .= " Description='$complaint' ";
			
			$sql .= " Where Id=" . $hdnId;
			$redirect ='Complain_list.php';
		}
		$resultset=mysqli_query($link,$sql);
		
		if($resultset)
		{
		?>
		<script type="text/javascript">
			alert("Complaint Saved Successfully");
			window.location.href="Complain_Entry.php";
</script>
<?php	
		header('Location: '.$redirect);
		}
		else 
		{
		?>
		<script type="text/javascript">
			alert("Complaint Already Exist");
			window.location.href="Complain_Entry.php";
</script>
<?php	
			header('Location: '.$redirect);
			
		}
	}
if(isset($_GET['cid']))
	{
		$Id = $_GET['cid'];
		$sql = "SElect * from complaint_master where Id=" . $Id;
		$res=mysqli_query($link,$sql);
		$row=mysqli_fetch_array($res);
	
	}
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
    <title>Complaint Entry</title>
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
				<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div class="card-title-wrap bar-warning">
						<h4 class="card-title" id="basic-layout-colored-form-control">Complaint Registration</h4>
					</div>
					<p class="mb-0">Complaint Entry Form.</p>
				</div>
				<div class="card-body">
					<div class="px-3">

						<form class="form" action="Complain_Entry.php" method="post" enctype="multipart/form-data">
						 <input type="hidden" name="hdnId" id="hdnId" value="<?php echo $Id; ?>">
							<div class="form-body">
								<h4 class="form-section">
									<i class="icon-direction"></i>Complaint Entry</h4>
								
									<div class="col-md-6">
										<div class="form-group">
											<label>Description</label>
											<textarea class="form-control round" rows="3" name="description" placeholder="Enter Description"><?php if($Id<>0) echo $row['Description'] ?></textarea>
										</div>
									</div>
									<div class="row">
									<div class="col-md-4">
										 <div class="form-group">
											<label>Date of Complaint</label>
											<label id="doc" class="form-control round" name="doc" ><?php if($Id<>0) echo $row['DOC']; else  echo date('yy-m-d') ?></label>
										</div>
								</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										<div class="col-md-4">
										<div class="form-group">
											<label>Send To</label> <br/>
											 <input type="checkbox" style="width:20px;height:20px;" name="chk_admin" id="chk_admin"  value="6" <?php if($Id<>0 && $row['IsActive']==1) echo "Checked=checked ";?>>&nbsp;&nbsp;Admin
										</div>
									</div>
								
									</div>
									
									
							</div>

							<div class="form-actions right">
								<button type="reset" class="btn btn-danger mr-1">
									<i class="icon-trash"></i> Reset
								</button>
								
								<button type="submit" class="btn btn-success" name="btnSubmit" id="btnSubmit">
									<i class="icon-note"></i> Save
								</button>
							</div>
						</form>

					</div>
				</div>
			</div>
		</div>
				
				
				
				
				
				
				
				
				
				
				
				
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