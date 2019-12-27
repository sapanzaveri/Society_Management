 <?php
	require_once 'config.php';
	// Create a Query 
	$stmt = $conn->prepare("Select * from event_master");
	//Executing Query
	$stmt->execute();
	
	//Bind result to Query
	$stmt->bind_result($Id, $Title, $From_Date, $To_Date, $Expected_Budget, $Event_Type, $Image, $IsActive);
	
	$event_list = array();
	
	//traversing through all the result
	while($stmt->fetch()){
		$temp = array();
		$temp['Id'] = $Id;
		$temp['Title'] = $Title;
		$temp['From_Date'] = $From_Date;
		$temp['To_Date'] = $To_Date;
		$temp['Expected_Budget'] = $Expected_Budget;
		$temp['Event_Type'] = $Event_Type;
		$temp['Image'] = $Image;
		$temp['IsActive'] = $IsActive;
		array_push($event_list,$temp);
		
	}
	//displaying the result in json
	echo json_encode($event_list);
 ?>