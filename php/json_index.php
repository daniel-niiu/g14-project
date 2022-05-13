<?php 
include "../db/dbconnection.php";    
if(isset($_POST['reminder_id'])){
	$obj = $_POST['reminder_id'];
	$sql = "SELECT * FROM reminder WHERE reminder_id = '".$obj."'";
	$result = $conn->query($sql); 
	if ($result->num_rows > 0) {
	// output data of each row
		while($row = $result->fetch_assoc()) {  
			/*
		    echo json_encode(
			      array("message1" => "Hi", 
			      "message2" => "Something else")
			 );
		    */
		    
			echo json_encode(
		      array("reminderID" => $row['reminder_id'], 
		      "reminderDate" => $row['reminder_date'], 
		      "reminderTitle" => $row['title'], 
		      "reminderRemarks" => $row['remarks']) 
		    );
		    
		}
	}
	else{ 
		echo "asd";
	}
 //some php operation
}
?>