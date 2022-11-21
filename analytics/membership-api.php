<?php

include "../db/dbconnection.php";  


$method = $_GET['method'];



function getAllMembers(){
	global $conn;
	$stmt = $conn->query("SELECT * FROM member");
	
	$result = [];
	while($row = $stmt->fetch_assoc() ){
		$result[] = $row;
	}
	

	return json_encode($result);
}


if($method == 'allMembers'){
	echo getAllMembers();
}
