<?php 
include("session_chk.php");
include("config.php");
$message="";
	$Id =0;
	

	if(isset($_POST['btnSubmit']))
	{
		$Block=($_POST['ddlBlock']);
		$Flat=($_POST['txt_flatno']);
		$SqFt=($_POST['txt_sqft']);
		$Description=($_POST['description']);
		$Maintainance=($_POST['txt_maintainance']);
		$hdnId = $_POST['hdnId'];
		if($Block == "Select Block")
		{?>
			<script type="text/javascript">
			alert("Please Select Block");
			window.location.href="Flat_Entry.php";
</script>
		<?php }
		else
		{	
		
		$Flat_No=$Block."-".$Flat;
		if($hdnId==0)
		{
		$sql = "INSERT INTO `flat_master`(`Flat_No`,`Sq_Ft`, `Description`, `Monthly_Maintenance`) VALUES ('$Flat_No','$SqFt','$Description','$Maintainance')";
		 
		
		}
		else
		{
			$sql="Update flat_master set";
			$sql .= " Flat_No='$Flat_No', ";
			$sql .= " Sq_Ft='$SqFt', ";
			$sql .= " Description='$Description', ";
			$sql .= " Monthly_Maintenance='$Maintainance' ";
			$sql .= " Where Id=" . $hdnId;
			$redirect ='Flat_list.php';
		}
		$resultset=mysqli_query($link,$sql);
		if($resultset)
		{
		?>
		<script type="text/javascript">
			alert("Flat Saved Successfully");
			window.location.href="Flat_Entry.php";
</script>
<?php	
		header('Location: '.$redirect);
		}
		else 
		{
		//echo $sql;
		?>
		
		<script type="text/javascript">
			alert("Flat No Already Register");
			window.location.href="Flat_Entry.php";
</script>
<?php	
			header('Location: '.$redirect);
			
		}
	}
	}
	if(isset($_GET['cid']))
	{
		$Id = $_GET['cid'];
		$sql = "SElect * from flat_master where Id=" . $Id;
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
    <title>Flat Entry Page </title>
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
						<h4 class="card-title" id="basic-layout-colored-form-control">Flat Registration</h4>
					</div>
					<p class="mb-0">Flat Entry Form.</p>
				</div>
				<div class="card-body">
					<div class="px-3">

						<form class="form" action="Flat_Entry.php" method="post" enctype="multipart/form-data">
							<input type="hidden" name="hdnId" id="hdnId" value="<?php echo $Id; ?>">
								<div class="form-body">
								<h4 class="form-section">
									<i class="icon-direction"></i> Flat Entry</h4>
								<div class="row">
									<div class="col-xl-2 col-lg-6 col-md-6">
										<fieldset class="form-group">
											<label for="basicSelect">Block</label>
											<select class="form-control round" id="ddlBlock" name="ddlBlock" required>
											  <option>Select Block</option>
											  <option>A</option>
											  <option>B</option>
											  <option>C</option>
											  <option>D</option>
											  <option>E</option>
											  <option>F</option>
											  <option>G</option>
											  <option>H</option>
											  <option>I</option>
											  <option>J</option>
											  <option>K</option>
											  <option>L</option>
											  <option>M</option>
											  <option>N</option>
											  <option>O</option>
											  <option>P</option>
											  <option>Q</option>
											  <option>R</option>
											  <option>S</option>
											  <option>T</option>
											  <option>V</option>
											  <option>W</option>
											  <option>X</option>
											  <option>Y</option>
											  <option>Z</option>
											</select>
										</fieldset>								
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>Flat No:</label>
											<input type="number" id="txt_flatno" name="txt_flatno" class="form-control round" placeholder="Enter Flat Number" value="<?php if($Id<>0) echo $row['Flat_No'] ?>" required>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>Sq. Ft.</label>
											<input type="number" id="txt_sqft" name="txt_sqft" class="form-control round" placeholder="Enter Sq.Ft. of the Flat" value="<?php if($Id<>0) echo $row['Sq_Ft']?>" required>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Description</label>
											<textarea id="description" rows="3" class="form-control round" name="description"  placeholder="Enter Description"><?php if($Id<>0) echo $row['Description'] ?></textarea>
										</div>
									</div>
										<div class="col-md-6">
										<div class="form-group">
											<label>Maintainance</label>
											<input type="number" class="form-control round" id="txt_maintainance" name="txt_maintainance"  placeholder="Enter Monthly Maintainance Amount" value="<?php if($Id<>0) echo $row['Monthly_Maintenance']?>" required>
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