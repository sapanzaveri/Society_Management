<?php 
include("session_chk.php");
include("config.php");
$message="";
	$Id =0;
	

	if(isset($_POST['btnSubmit']))
	{
		$EventId=($_POST['cmb_event']);
		 $cnt=0;
		if(isset($_POST['chkIsAllowed']))
		{
			$IsAllowed=$_POST['chkIsAllowed'];
			$cnt=1;
		}
		$sql = "Delete from event_participants";
		$sql .=" where Event_Id=" . $_REQUEST['cmb_event'];
		$res = mysqli_query($link,$sql);
		
		
    
			foreach($IsAllowed as $IsA=>$value)
			{
				//echo $value . ":";
				$sql ="Insert into event_participants (Event_Id,Member_Id)Values(";
				$sql .= "'$EventId','$value')";
				
				$resultset = mysqli_query($link,$sql);
				if($resultset)
		{
		?>
		<script type="text/javascript">
			alert("Participants Saved Successfully");
			window.location.href="event_participants.php";
</script>
<?php	
		///header('Location: '.$redirect);
		}
		else 
		{
		?>
		<script type="text/javascript">
			alert("Participants Already Exist");
			window.location.href="event_participants.php";
</script>
<?php	
			//header('Location: '.$redirect);
			
		}
		
		}
		
		
		
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
    <title>Basic Entry Page </title>
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
	 <script language="javascript" type="text/javascript">
		function ComboClick() 
		{

			document.frmEntry.submit();

		}
	</script>
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
						<h4 class="card-title" id="basic-layout-colored-form-control">Event Participants</h4>
					</div>
					<p class="mb-0">Event Participants Entry.</p>
				</div>
				<div class="card-body">
					<div class="px-3">

						<form class="form-horizontal" action="event_participants.php" method="post" id="frmEntry" name="frmEntry" enctype="multipart/form-data">
						 <input type="hidden" name="hdnId" id="hdnId" value="<?php echo $Id; ?>">
							<div class="form-body">
								<h4 class="form-section">
									<i class="icon-direction"> </i> Event Participants Entry
									
								

								</h4>
							
										<div class="col-md-6">
										<div class="form-group">
										<label >Events</label>
										<select class="form-control round"  name="cmb_event" id="cmb_event" onChange="ComboClick();">
										<option value="0">-----Select Event--------</option>
												<?php

														$sql = "Select Id, Title from event_master order by Title";
														$dres = mysqli_query($link,$sql);
														while($drow = mysqli_fetch_array($dres))
														{
														  echo '<Option value="' . $drow['Id'] . '" ';
														  if(isset($_REQUEST['cmb_event']) && $_REQUEST['cmb_event']==$drow['Id'])
															echo '" selected=Selected" ';
														  echo ' >' . $drow['Title'] . '</option>';

														}
													?>
											</select>
										</div>
									</div>
								<?php if(isset($_REQUEST['cmb_event']) && $_REQUEST['cmb_event']<>0)
										{
								?>
								<div align="right">
								<button type="reset" class="btn btn-danger mr-1">
									<i class="icon-trash"></i> Reset
								</button>
								
								<button type="submit" class="btn btn-success" name="btnSubmit" id="btnSubmit">
									<i class="icon-note"></i> Save
								</button>
								</div>
					</div>

						<div class="form-body">
								<h4 class="form-section">
									<i class="fa fa-user"></i>Members</h4>
										<div class="col-md-12">
										<div class="form-group">
										<label >List</label>
						<div class="card-body collapse show">
                    <div class="card-block card-dashboard">
							<div class="table-responsive">
                       
                        <table class="table table-striped table-bordered file-export">
                            <thead>
                                <tr>
                                <th>Flat No</th>
                                <th>Member Name</th>
                               	
                                <th>IsActive</th>
                               
                               
           			     		</tr>
                            </thead>
                              <tbody>
                              
                              <?php
							$sql = "SELECT m.*, m.Id as mid, f.Flat_No as fno, m.Name as mname FROM member_master m, flat_master f";
							$sql .=" Where f.Id=m.Flat_Id ";
						
//							$sql = "SELECT m.*, m.Id as mid, f.Flat_No as fno, m.Name as mname,1 as p,e.Title ";
//							$sql .= " FROM member_master m, flat_master f,Event_Master e,event_participants ep";
//							$sql .=" Where f.Id=m.Flat_Id ";
//							$sql .= " And m.Id=ep.Member_Id";
//							$sql .= " And e.Id=ep.Event_Id";
//							$sql .= " Union ";
//							$sql .= " SELECT m.*, m.Id as mid, f.Flat_No as fno, m.Name as mname,0 as p,e.Title ";
//							$sql .= " FROM member_master m, flat_master f ";
//							$sql .=" Where f.Id=m.Flat_Id ";
//							$sql .= " And m.Id not in (Select Member_Id from event_participants where Event_Id=e.Id)";
//							$sql .= " And e.Id=ep.Event_Id";
//							
							$fres = mysqli_query($link,$sql);
							while($frow = mysqli_fetch_array($fres))
							{
							echo '<tr>';
							echo '<td>' . $frow['fno'] . '</td>';
							echo '<td>' . $frow['mname'] . '</td>';
							echo '<td><input type="checkbox" style= "zoom:2"; value="' . $frow['mid'] . '" id="chkIsAllowed" name="chkIsAllowed[]" ';
							
							echo '</td>';							
							echo '</tr>';
							}
								?>
						 </tbody>
                            <tfoot>
                                <tr>
                             	<th>Flat No</th>
                                <th>Member Name</th>
                               	
                                <th>IsActive</th>
                               
                                 </tr>
                            </tfoot>
                        </table>
						
						</div>
							</div>
											</div>
										</div>
									</div>
								
								
									
							</div>
							<?php }
								else
								{
									echo '</div>';
								}
								?>
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