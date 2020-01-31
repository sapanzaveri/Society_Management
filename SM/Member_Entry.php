<?php 
include("session_chk.php");

$message="";
	$Id = 0;
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
		$UN=($_POST['txt_UN']);
			if(isset($_POST['gender']))
	{
		$gender = $_POST['gender'];
		
}
		$Password=($_POST['txt_pwd']);
		$Address=($_POST['address']);
		if(isset($_POST['is_active']))
		{
			$is_active='1';
		}
		else
		{
			$is_active='0';
		}
		$dob=($_POST['dob']);
		$doa=($_POST['doa']);
		$Ownership=($_POST['cmb_ownership']);
		$Role=($_POST['cmb_role']);
		$Flat=($_POST['cmb_flat']);
		$Email=($_POST['txt_email']);
		$Phone=($_POST['txt_mobile']);

		if(isset($_POST['is_main']))
		{
			$Ismain='1';
		}
		else
		{
			$Ismain='0';
		}
		$hdnId = $_POST['hdnId'];
		if($Ismain=='1')
		{
		$sql = "Select count(*) as cnt from member_master ";
		$sql .= " Where Flat_Id=" . $Flat;
		
		if($hdnId<>0)
			$sql .= " And Id<>" . $hdnId;
		echo $sql;
		$res = mysqli_query($link,$sql);
		$row = mysqli_fetch_array($res);
		$cnt=$row['cnt'];
			
		}
		else
		{
		$cnt=0;
		}
		if($cnt==0 )
			
		{
			
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
			window.location.href="Member_Entry.php";
</script>';
				}
				else
				{
					$myFile = 'images/filename.txt';
					$fh = fopen($myFile, 'r');
					$theData = fread($fh,5);
					fclose($fh);
					
					 $newname = "images/" . $theData . '.' . $extension;
				
				}
			}
		
		if($hdnId==0)
		{
		$sql = "INSERT INTO `member_master`(`User_Name`,`Name`, `Email`, `Gender`, `Password`, `Address`, `Photos`, `IsActive`, `DOB`, `DOA`, `Phone_No`, `Ownership_Type`, `Role_Id`, `Flat_Id`, IsMain) VALUES ('$UN','$Name','$Email','$gender','$Password','$Address','$newname','$is_active','$dob','$doa','$Phone','$Ownership','$Role','$Flat', $Ismain)";
	
		}
		else
		{
			$sql="Update member_master set";
			$sql .= " User_Name='$UN', ";
			$sql .= " Name='$Name', ";
			$sql .= " Email='$Email', ";
			$sql .= " Gender='$gender', ";
			$sql .= " Password='$Password', ";
			$sql .= " Address='$Address', ";
			$sql .= " Email='$Email', ";
			
			if($image<>'')
				$sql .= " Photos='$newname', ";
			$sql .= " IsActive='$is_active', ";
			$sql .= " DOB='$dob', ";
			$sql .= " DOA='$doa', ";
			$sql .= " Phone_No='$Phone', ";
			$sql .= " Ownership_Type='$Ownership', ";
			$sql .= " Role_Id='$Role', ";
			$sql .= " IsMain='$Ismain', ";
			
			$sql .= " Flat_Id='$Flat' ";
			$sql .= " Where Id=" . $hdnId;
			$redirect ='member_list.php';
		
		}  
		$resultset=mysqli_query($link,$sql);
			echo $sql;
		if($resultset)
		{
		?>
		<script type="text/javascript">
			alert("Member Saved Successfully");
			window.location.href="Member_Entry.php";
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
		?>
		<script type="text/javascript">
			alert("Member Already Exist");
			window.location.href="Member_Entry.php";
</script>
<?php	
			header('Location: '.$redirect);
			
		}
		}
		else
		{
			
			
			echo '<script type="text/javascript">
			alert("Main member is Already assigned");
			window.location.href="Member_Entry.php";
</script>';
			
		}
	}

	if(isset($_GET['cid']))
	{
		$Id = $_GET['cid'];
		$sql = "SElect * from member_master where Id=" . $Id;
		$res=mysqli_query($link,$sql);
		$row=mysqli_fetch_array($res);
	
	}
?>
<!DOCTYPE html>
<html lang="en" class="loading">
  
<head>
   
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Convex admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Convex admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Member Entry</title>
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
<!--    DatePicker-->
    <link rel="stylesheet" type="text/css" href="../app-assets/css/daterangepicker.css" />
  </head>
  <body data-col="2-columns" class=" 2-columns ">
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="wrapper">


     
      <?php include "SideBar.php" ?>
       


      <?php include "Header.php" ?>

       <div class="main-panel">
        <div class="main-content">
          <div class="content-wrapper">
            <div class="container-fluid"><!--Statistics cards Starts-->
					<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div class="card-title-wrap bar-warning">
						<h4 class="card-title" id="basic-layout-colored-form-control">Member Registration</h4>
					</div>
					<p class="mb-0">Member registration Form.</p>
				</div>
				<div class="card-body">
					<div class="px-3">

						<form class="form" action="Member_Entry.php" method="post" enctype="multipart/form-data">
						<?php echo $message; ?>
                               <input type="hidden" name="hdnId" id="hdnId" value="<?php echo $Id; ?>">
							<div class="form-body">
								<h4 class="form-section">
									<i class="icon-direction"></i> Member Detail Entry</h4>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label >Name</label>
											<input type="text" id="txt_name" name="txt_name" class="form-control round" placeholder="Enter Member Name" required oninvalid="this.setCustomValidity('Enter proper Name')" onchange="this.setCustomValidity('')" pattern="[a-z A-Z]+"  value="<?php if($Id<>0) echo $row['Name']; ?>">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Mobile</label>
											<input type="number" id="txt_mobile" name="txt_mobile" class="form-control round" placeholder="Enter Member Contact Number" required oninvalid="this.setCustomValidity('Enter Proper Number')" onchange="this.setCustomValidity('')"  value="<?php if($Id<>0) echo $row['Phone_No']; ?>" >
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
										
											<label >Gender</label>
											<div class="input-group">
										
											
										<div class="custom-control custom-radio ">
										
											<input type="radio" name="gender" id="gender" value="Male" <?php if($Id<>0){ if($row['Gender']=='Male') echo "checked"; } else echo "Checked"; ?>> Male
  											<input type="radio" name="gender" id="gender" value="Female" <?php if($Id<>0) if($row['Gender']=='Female') echo "checked";  ?>> Female
										</div>
										
									</div>
										</div>
									</div>
									<div class="col-md-2">
										<div class="form-group">
											<label >Is Main</label>
											<input type="checkbox"  id="is_main" name="is_main" <?php if($Id<>0 && $row['IsMain']==1) echo "Checked=checked ";?>>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label >Email</label>
											<input type="email" id="txt_email" class="form-control round" name="txt_email" placeholder="Enter Member Email-Address" value="<?php if($Id<>0) echo $row['Email']; ?>">
										</div>
									</div>
								</div>
									
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label >User Name</label>
											<input type="text" id="txt_UN" class="form-control round" name="txt_UN" placeholder="Enter Member User-Name" value="<?php if($Id<>0) echo $row['User_Name']; ?>">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label >Password</label>
											<input type="password" id="txt_pwd" class="form-control round" name="txt_pwd" placeholder="Enter Password" value="<?php if($Id<>0) echo $row['Password']; ?>">
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label >Flat</label>
											<select class="form-control round" name="cmb_flat" id="cmb_flat"   value="<?php if($Id<>0) echo $row['Flat_Id']; ?>">
                  <option value="">-----Select Flat--------</option>
                  
                                    <?php
                  
                    $sql = "Select Id, Flat_No from flat_master order by Flat_No";
                    $dres = mysqli_query($link,$sql);
                    while($drow = mysqli_fetch_array($dres))
                    {
                      echo '<Option value="' . $drow['Id'] . '" ';
                      if($Id <>0 && $row['Flat_Id'] == $drow['Id'])
                        echo " Selected=selected ";
                      echo ' >' . $drow['Flat_No'] . '</option>';
                      
                    }
                  ?>
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label >Ownership</label>
											<select class="form-control round" name="cmb_ownership" id="cmb_ownership"   value="<?php if($Id<>0) echo $row['Ownership_Type']; ?>">
                  <option value="">-----Select Ownership--------</option>
                  
                                    <?php
                  
                    $sql = "Select Id, Name from ownership_master order by Name";
                    $dres = mysqli_query($link,$sql);
                    while($drow = mysqli_fetch_array($dres))
                    {
                      echo '<Option value="' . $drow['Id'] . '" ';
                      if($Id <>0 && $row['Ownership_Type'] == $drow['Id'])
                        echo " Selected=selected ";
                      echo ' >' . $drow['Name'] . '</option>';
                      
                    }
                  ?>
											</select>
										</div>
									</div>
								</div>
								
								
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label >Date of Birth</label>
											<input type="text" data-mask="99/99/9999" id="dob" class="form-control round" name="dob" value="<?php if($Id<>0) echo $row['DOB']; ?>">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label >Date of Anniversary</label>
											<input type="text" id="doa" class="form-control round" name="doa" value="<?php if($Id<>0) echo $row['DOA']; ?>">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label >Is Active</label>
											<input type="checkbox" checked="" name="is_active" <?php if($Id<>0 && $row['IsActive']==1) echo "Checked=checked "; ?> >
										</div>
									</div>
								</div>
								
								<div class="row">
								 <div class="col-md-6">
                                      <div class="form-group">	 
                            <label> Image </label>
                                         
                                            
                                                <input type="file" name="fuImage" id="fuImage" placeholder="Enter Image" onChange="readURL(this);">
                                                <!--<img id="blah" src="#" />-->
                                            
											  </div>
                                        </div>
                        
                       
                           
                       
									<div class="col-md-6">
										<div class="form-group">
											<label >Role</label>
											<select class="form-control round" name="cmb_role" id="cmb_role"   value="<?php if($Id<>0) echo $row['Role_Id']; ?>">
                  <option value="">-----Select Role--------</option>
                  
                                    <?php
                  
                    $sql = "Select Id, Name from role_master order by Name";
                    $dres = mysqli_query($link,$sql);
                    while($drow = mysqli_fetch_array($dres))
                    {
                      echo '<Option value="' . $drow['Id'] . '" ';
                      if($Id <>0 && $row['Role_Id'] == $drow['Id'])
                        echo " Selected=selected ";
                      echo ' >' . $drow['Name'] . '</option>';
                      
                    }
                  ?>
											</select>
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
        </div>
       
       <?php include "footer.php" ?>
       
     </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    
     <?php include "Aside.php" ?>

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
    <!-- END PAGE LEVEL JS-->
    
    <!-- DatePicker-->
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
  </body>

<!-- Mirrored from pixinvent.com/demo/convex-bootstrap-admin-dashboard-template/demo-1/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Sep 2018 10:36:18 GMT -->
</html>

