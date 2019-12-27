<?php 
include("session_chk.php");

	include("config.php");
if(isset($_GET['did']))
	{
		$Id=$_GET['did'];
		$sql = "Delete from meeting_master where Id=" . $Id;
		$res = mysqli_query($link,$sql);
		if($res)
			{
	echo'<script type="text/javascript">
			alert("Meeting Deleted Successfully");
			window.location.href="Meeting_List.php";
</script>';
	}
		else
		
		echo '<script type="text/javascript">
			alert("Meeting Deleteing Failed.");
			window.location.href="Meeting_List.php";
</script>';

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
    <title>Meeting List</title>
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
    <link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/tables/datatable/datatables.min.css">
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
				<!------ Design of the tables start from here -------------------------------------->
				
<section id="column">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title-wrap bar-success">
                        <h4 class="card-title">Meeting List</h4>
                    </div>
                </div>
                <div class="card-body collapse show">
                    <div class="card-block card-dashboard feather-icons overflow-hidden">
						
                        <div class="table-responsive">
                       
                        <table class="table table-striped table-bordered default-ordering">
                            <thead>
                                <tr>
                             	<th>Title</th>
                             	<th>Date-Time</th>
                             	<th>Purpose</th>
                             	<th>Location</th>
                             	<th>Called by</th>
                                <th>Edit</th>
                                <th>Delete</th>
           			     		</tr>
                            </thead>
                              <tbody>

							<?php
									$sql = "SELECT m.*, mm.Name as uname FROM meeting_master m, member_master mm";
									$sql .= " Where m.Created_By=mm.Id";
									$sql .= " And IsVisible=1";
									$sql .= " order by DOM DESC";
									$res = mysqli_query($link,$sql);
		
									while($row = mysqli_fetch_array($res))
									{
									echo '<tr>';
									echo '<td>' . $row['Title'] . '</td>';
									echo '<td>' . $row['DOM'] . '-' . $row['From_Time'] . '</td>';
									echo '<td>' . $row['Purpose'] . '</td>';
									echo '<td>' . $row['Location'] . '</td>';							
									echo '<td>' . $row['uname'] . '</td>';							
									echo '<td ><a href="Meeting_Entry.php?cid=' . $row['Id'] . '" >
										<div class="fonticon-wrap fonticon-container " style="font-size:1.5em"><i class="ft-edit" ></i></div></a></td>';	
									echo '<td> <a onclick="javascript:deleteconfig(' . $row['Id'] . ');" > <div class="fonticon-wrap fonticon-container " style="font-size:1.5em"><i class="ft-trash-2" style=color:red;>  </i></a></td>';
									echo '</tr>';
							}
								?>
								 
								  
						 </tbody>
                            <tfoot>
                                <tr>
                                <th>Title</th>
                             	<th>Date-Time</th>
                             	<th>Purpose</th>
                             	<th>Location</th>
                             	<th>Called by</th>
                                <th>Edit</th>
                                <th>Delete</th>
                                 </tr>
                            </tfoot>
                        </table>
						
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
	  
	<!---- Record Delete Script ------>  
	  
	  
	  <script type="text/javascript">
    	function deleteconfig(tmp)
    			{
				var x = confirm("Are you sure you want to delete?");
				if (x==true)
				{
			  	window.location="Meeting_List.php?did=" + tmp;
			  	//alert("Record Deleted Sucessful");
				}
         		else
       			{
			  	//alert("Not Record Deleted");
				}
    			}
	</script>
    
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
	  
	   <script src="../app-assets/vendors/js/datatable/datatables.min.js"></script>
    <script src="../app-assets/vendors/js/datatable/dataTables.buttons.min.js"></script>
    <script src="../app-assets/vendors/js/datatable/buttons.flash.min.js"></script>
    <script src="../app-assets/vendors/js/datatable/jszip.min.js"></script>
    <script src="../app-assets/vendors/js/datatable/pdfmake.min.js"></script>
    <script src="../app-assets/vendors/js/datatable/vfs_fonts.js"></script>
    <script src="../app-assets/vendors/js/datatable/buttons.html5.min.js"></script>
    <script src="../app-assets/vendors/js/datatable/buttons.print.min.js"></script>
    <!-- END PAGE VENDOR JS-->
   
 		
    <script src="../app-assets/js/data-tables/column[1]DESC/datatable-basic.js"></script>
    <script src="../app-assets/js/data-tables/datatable-advanced.js"></script>
    <script src="../app-assets/js/data-tables/datatable-styling.js"></script>
	  
	  
	  
	  
	  
    <!-- END PAGE LEVEL JS-->
  </body>

<!-- Mirrored from pixinvent.com/demo/convex-bootstrap-admin-dashboard-template/demo-1/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Sep 2018 10:36:18 GMT -->
</html>