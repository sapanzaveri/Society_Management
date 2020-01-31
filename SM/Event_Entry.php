<?php
include("session_chk.php");

$message="";
	$Id =0;
	include("config.php");
function getExtension($str) 
	{
         $i = strrpos($str,".");
         if (!$i) { return ""; }
         $l = strlen($str) - $i;
         $ext = substr($str,$i+1,$l);
         return $ext;
	 	}

	if(isset($_POST['btnSubmit']))
	{
		$Name=($_POST['txt_name']);				
		$Start_Date=($_POST['start_date']);
		$End_Date=($_POST['end_date']);
		$Budget=($_POST['budget']);
		$Event_Type=($_POST['event_type']);
		if(isset($_POST['is_active']))
		{
			$is_active='1';
		}
		else
		{
			$is_active='0';
		}		
		$newname="";
		$theData = "";
		$image = $_FILES['fuImage']['tmp_name'];
			if($image <>'')
			{
				 $filename = stripslashes($_FILES['fuImage']['name']);
				 $extension = getExtension($filename);
				 $extension = strtolower($extension);
				if (($extension <> "jpg") && ($extension <> "jpeg") && ($extension <> "png") && ($extension <> "gif")) 
				{
					echo '<script type="text/javascript">
			alert("Unkown Extension");
			window.location.href="Event_Entry.php";
</script>';
				}
				else
				{
					$myFile = '../app-assets/images/filename.txt';
					$fh = fopen($myFile, 'r');
					$theData = fread($fh,5);
					fclose($fh);
					
					 $newname = "images/" . $theData . '.' . $extension;
				
				}
			}
		$hdnId = $_POST['hdnId'];
		if($hdnId==0)
		{
		$sql = "INSERT INTO `Event_master`(`Title`, `From_Date`, `To_Date`, `Expected_Budget`, `Event_Type`, `Image`, `IsActive`) VALUES ('$Name','$Start_Date','$End_Date','$Budget','$Event_Type','$newname','$is_active')";
		}
		else
		{
			$sql="Update Event_master set";
			$sql .= " Title ='$Name', ";
			$sql .= " From_Date='$Start_Date', ";
			$sql .= " To_Date='$End_Date', ";
			$sql .= " IsActive='$is_active', ";
			$sql .= " Expected_Budget='$Budget', ";
			
			if($image<>'')
				$sql .= " Image='$newname' ,";	
			$sql .= " Event_Type='$Event_Type' ";
			$sql .= " Where Id=" . $hdnId;
			$redirect ='Event_List.php';
		}
		$resultset=mysqli_query($link,$sql);
		
		if($resultset)
		{
		?>
		<script type="text/javascript">
			alert("Event Saved Successfully");
			window.location.href="Event_Entry.php";
</script>
<?php	
			if($_FILES['fuImage']['name']>'')
					{
						$message = $message . //";In if;";
					 $copied = copy($_FILES['fuImage']['tmp_name'], $newname);
												
						if ($copied)
						{
							$message = $message . //"Coppied done;";
							$fh = fopen($myFile, 'w') or die("cant open file");
							fwrite($fh, $theData + 1);
							fclose($fh);
							
						}
						else
							$message = 'Error while saving Image.' . $sql;
					}
		header('Location: '.$redirect);
		}
		else 
		{
			
		echo '<script type="text/javascript">
			alert("Event Registration Failed.");
			window.location.href="Event_Entry.php";
</script>';
		}
	}

	if(isset($_GET['cid']))
	{
		$Id = $_GET['cid'];
		$sql = "SELECT * from event_master where Id=" . $Id;
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
    <title>Event Entry</title>
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
	<link rel="stylesheet" type="text/css" href="../app-assets/css/daterangepicker.css">
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
						<h4 class="card-title" id="basic-layout-colored-form-control">Event Registration</h4>
					</div>
					<p class="mb-0">Event Registration Form.</p>
				</div>
				<div class="card-body">
					<div class="px-3">

						<form class="form" action="Event_Entry.php" method="post" enctype="multipart/form-data">
						 <input type="hidden" name="hdnId" id="hdnId" value="<?php echo $Id; ?>">
							<div class="form-body">
								<h4 class="form-section">
									<i class="icon-direction"></i> Event Detail Entry</h4>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label >Title</label>
											<input type="text" id="txt_name" name="txt_name" class="form-control round" placeholder="Enter Event Name" value="<?php if($Id<>0) echo $row['Title']; ?>">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label >Is Active</label>
											<br>
											<input type="checkbox"  style="zoom:3" id="is_active" name="is_active" <?php if($Id<>0 && $row['IsActive']==1) echo "Checked=checked ";?>>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label >Start Date</label>
											<input type="text" data-mask="99/99/9999" id="start_date" class="form-control round" name="start_date" value="<?php if($Id<>0) echo $row['From_Date']; ?>">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label >End Date</label>
											<input type="text" id="end_date" class="form-control round" name="end_date" value="<?php if($Id<>0) echo $row['To_Date']; ?>">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label >Expected Budget</label>
											<input type="text" id="budget" name="budget" class="form-control round" placeholder="Enter Expected Budget" value="<?php if($Id<>0) echo $row['Expected_Budget']; ?>">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label >Event Type</label>
											<input type="text" id="event_type" name="event_type" class="form-control round" placeholder="Enter Event Type" value="<?php if($Id<>0) echo $row['Event_Type']; ?>">
										</div>
									</div>
								</div>
								
								<div class="form-group">	 
                            		<label> Image </label>                                            
                                                <input type="file" name="fuImage" id="fuImage" placeholder="Enter Image" onChange="readURL(this);">
                                                <!--<img id="blah" src="#" />-->
											  </div>
											   <?php
											  if($Id<>0)
											  {
												  if($row['Image']<>"")
												  	echo '<img src="' . $row['Image'] . '" height="100" width="100" >';
												  else
													  echo '<img src="../app-assets/images/NoImg.jpeg" height="100" width="100" >';
											  }
											 ?>																	
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
    $('input[name="start_date"]').daterangepicker({
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
    $('input[name="end_date"]').daterangepicker({
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