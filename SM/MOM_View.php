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
    <title>MOM View </title>
    <link rel="apple-touch-icon" sizes="60x60" href="../app-assets/img/ico/apple-icon-60.png">
    <link rel="apple-touch-icon" sizes="76x76" href="../app-assets/img/ico/apple-icon-76.html">
    <link rel="apple-touch-icon" sizes="120x120" href="../app-assets/img/ico/apple-icon-120.html">
    <link rel="apple-touch-icon" sizes="152x152" href="../app-assets/img/ico/apple-icon-152.html">
    <link rel="shortcut icon" type="image/x-icon" href="https://pixinvent.com/demo/convex-bootstrap-admin-dashboard-template/app-assets/img/ico/favicon.ico">
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
  <body data-col="2-columns" class=" 2-columns">
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
						<h4 class="card-title" id="basic-layout-colored-form-control">MOM View</h4>
					</div>
					
				</div>
				<div class="card-body">
					<div class="px-3">

						<form class="form" action="MOM_View.php" method="post" enctype="multipart/form-data" id="frmEntry" name="frmEntry">
						
								<div class="form-body">
								<h4 class="form-section">
									<i class="icon-direction"></i> MOM </h4>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label >Meeting</label>
											<select class="form-control round" name="cmb_meeting" id="cmb_meeting" onChange="ComboClick();">
                 										 <option value="">-----Select Meeting--------</option>
                  
											<?php
														$sql = "Select Id, Title from meeting_master order by DOM";
														$dres = mysqli_query($link,$sql);
														while($drow = mysqli_fetch_array($dres))
														{
														  echo '<Option value="' . $drow['Id'] . '" ';
														  if(isset($_REQUEST['cmb_meeting']) && $_REQUEST['cmb_meeting']==$drow['Id'])
															echo " Selected=selected ";
														  echo ' >' . $drow['Title'] . '</option>';

														}
											 ?>
											</select>
										</div>
									</div>
									
								</div>
								<?php
									if(isset($_REQUEST['cmb_meeting']) && $_REQUEST['cmb_meeting']<>0)
									{
								?>
								<div class="row">
									<div class="col-md-12">
										<table class="table table-striped table-bordered file-export table-striped">
								 <?php
							$sql = "SELECT m.*, mm.Title as mname, me.Name as uname FROM mom m, meeting_master mm, member_master me";
							$sql .= " Where m.Meeting_Id=mm.Id";
							$sql .= " And m.Written_By=me.Id";
							$sql .= " and m.Meeting_Id=" .$_REQUEST['cmb_meeting'];
							$res = mysqli_query($link,$sql);
		
							$row = mysqli_fetch_array($res);
                               echo '<tr>
									     	<td colspan=4 align="center"> Meeting Information  </td>
									     
									     </tr>                 
									<tr>
									<td>Tittle</td>
									<td>'.$row['mname'].'</td>
									<td> Written By </td>
									<td>'.$row['uname'].'</td>
									 </tr>
									 <tr>
									 <td colspan=4 align=center>Conclusion</td>
									 </tr>
									 <tr>
									 <td colspan=4>'.$row['Conclusion'].'</td>
									 </tr>';                 
										
								?>
                             
                            
								  
						
                           
                        </table>
									</div>
										
									</div>
									<?php
									}
									?>
									
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

    <!-- END PAGE LEVEL JS-->
  </body>

<!-- Mirrored from pixinvent.com/demo/convex-bootstrap-admin-dashboard-template/demo-1/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Sep 2018 10:36:18 GMT -->
</html>