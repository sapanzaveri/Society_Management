<?php 

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
    <title>Event Gallery List</title>
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
				<!------ Design of the tables start from here -------------------------------------->
				
<div class="row">
    <div class="col-sm-12">
        <div class="col-md-12">
			<div class="card">
							<div class="card-body">
					<div class="px-3">

						<form class="form" action="Event_GalleryList.php" method="post" enctype="multipart/form-data" id="frmEntry" name="frmEntry">
						
							<div class="form-body">
								
								<h4 class="form-section">
                                    <i class="icon-direction"></i>Event Gallery</h4>
                                
									<div class="col-md-6 ">
										<div class="form-group">
											<label >Events</label>
											<select class="form-control round" name="cmb_event"   id="cmb_event" onChange="ComboClick();">
                  								<option value="">-----Select Event--------</option>
                  
                                    		<?php
                  
													$sql = "Select Id, Title from event_master order by Id";
													$dres = mysqli_query($link,$sql);
													while($drow = mysqli_fetch_array($dres))
													{
													  echo '<Option value="' . $drow['Id'] . '" ';
													  if(isset($_REQUEST['cmb_event']) && $_REQUEST['cmb_event']==$drow['Id'])
														echo " Selected=selected ";
													  echo ' >' . $drow['Title'] . '</option>';

													}
											?>
											</select>
										</div>
									</div>
								
						</form>

					</div>
				</div>
			</div>
		</div>
    </div>
</div>
	<?php
	if(isset($_REQUEST["cmb_event"]) && $_REQUEST["cmb_event"]<>0)
	{
	?>
	<section id="hover-effects" class="card">
  <div class="card-body">
    <div class="card-block my-gallery" itemscope itemtype="http://schema.org/ImageGallery">
	<?php
		$sql = "Select Id, Title from event_master";
		$sql .= " Where Id=".$_REQUEST['cmb_event'];
		
		$dres = mysqli_query($link,$sql);
		$drow = mysqli_fetch_array($dres);
		?>
      <div class="grid-hover">
        <h5 class="text-bold-400 text-uppercase"><strong><?php echo $drow['Title']  ?></strong></h5>
        <hr>
        
			
			<?php
				 
			$sql = "select * from event_gallery where Event_Id='".$_REQUEST['cmb_event']."'";
			$res = mysqli_query($link,$sql);
			if (mysqli_num_rows($res) >= 1)
				{
					echo '<div class="row">';	
			while($row=mysqli_fetch_array($res))
			{
				
			
			echo '<div class="col-md-4 col-12">';
            echo '<figure class="effect-julia">';
				
				?>
              <img src="../app-assets/images/<?php echo $row['Image']?>" alt="img12" />
			
        <?php
			
            echo "</figure>";
      		echo '</div>';
			
			}
					echo '</div>';
				}
		else
		{
			echo '<div class="row">';
		
			echo '<div class="col-md-12 col-12">';
			
			echo '<h1 style="font-size: 6em;"> Image Not Available<h1>';
			echo '</div>';
						echo '</div>';
		}
			
			?>
			 
        
     
      </div>
      
     
   
    </div>
  </div>
</section>			
	<?php } ?>
				
				
				
				
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
	 <!-- <script type="text/javascript">
    function GetEventName(cmb_event) {
        var selectedText = cmb_event.options[cmb_event.selectedIndex].innerHTML;
        var selectedValue = cmb_event.value;
		window.location.href = "Event_GalleryList.php?w1=" + selectedText + "&w2=" + selectedValue;

        //alert("Selected Text: " + selectedText + " Value: " + selectedValue);
    }
</script>-->
	  
	  <script type="text/javascript">
    	function deleteconfig(tmp)
    			{
				var x = confirm("Are you sure you want to delete?");
				if (x==true)
				{
			  	window.location="member_list.php?did=" + tmp;
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
   
 
    <script src="../app-assets/js/data-tables/datatable-advanced.js"></script>
    <script src="../app-assets/js/data-tables/datatable-styling.js"></script>
	  
	  
	  
	  
	  
    <!-- END PAGE LEVEL JS-->
  </body>

<!-- Mirrored from pixinvent.com/demo/convex-bootstrap-admin-dashboard-template/demo-1/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Sep 2018 10:36:18 GMT -->
</html>