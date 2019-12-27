<?php
	
	require_once 'config.php';

	$response = array();
			
	//getting values 
	$User_Name = $_POST['User_Name'];
	$Password =	$_POST['Password']; 
	
	//creating the query 
	
	$stmt = $conn->prepare("SELECT * FROM member_master WHERE User_Name = ? AND Password = ?");
	$stmt->bind_param("ss",$User_Name, $Password);
	
	$stmt->execute();
	
	$stmt->store_result();
	
	//if the user exist with given credentials 
	if($stmt->num_rows > 0){
	
	
		$stmt->bind_result($Id,$Name,$Role_Id,$User_Name,$Password,$Flat_Id,$Photos,$IsActive,$DOB,$DOA,$Gender,$Email,$Phone_No,$Ownership_Type,$IsMain);
		$stmt->fetch();
		
		$user = array(
			'Id'=>$Id, 
			'Name'=>$Name,
			'Role_Id'=>$Role_Id,
			'User_Name'=>$User_Name,
			'Password'=>$Password,
			'Flat_Id'=>$Flat_Id,
			'Photos'=>$Photos,
			'IsActive'=>$IsActive,
			'DOB'=>$DOB,
			'DOA'=>$DOA,
			'Gender'=>$Gender,
			'Email'=>$Email,
			'Phone_No'=>$Phone_No,
			'Ownership_Type'=>$Ownership_Type,
			'IsMain'=>$IsMain
			
		);
		
		
		$response['error'] = false; 
		$response['message'] = 'Login successfull'; 
		$response['user'] = $user; 
	}else{
		//if the user not found 
		$response['error'] = false; 
		$response['message'] = 'Invalid username or password';
	}
				
			
	

	echo json_encode($response);
	
	
	
?>